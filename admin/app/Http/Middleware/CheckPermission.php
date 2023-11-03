<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckPermission
{
  
    public function handle($request, Closure $next, $permission)
    {   
     
            $staff_id = Auth::id();
            if($staff_id!==1){
                $requestedRoute = $request->route()->getName();
        
                $hasPermission = DB::table('tbl_staff_permission')
                    ->join('tbl_permission', 'tbl_staff_permission.permission_id', '=', 'tbl_permission.permission_id')
                    ->where('tbl_staff_permission.staff_id', $staff_id)
                    ->where('tbl_permission.permission_router', $requestedRoute)
                    ->where('tbl_permission.permission_status', 1)
                    ->where('tbl_staff_permission.staff_permission_status', 1)
                    ->exists();
            
                if ($hasPermission) {
                    return $next($request);
                }
            
                abort(403, 'Bạn không có quyền truy cập');
            }
            else{
                return $next($request);
            }
        
      
    }
    
}
