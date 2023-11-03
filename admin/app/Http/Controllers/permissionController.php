<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\permissionRequest;
use App\Models\permissionModel;

class permissionController extends Controller
{

    public function list()
    {
        $permissionModel = new permissionModel();
        $list_permission = DB::table('tbl_permission')->paginate(30); 
        $check = $list_permission->hasMorePages() ? 1 : 0;
        $i = 1;
        return view('include.main.page.system.permission.lits', compact('list_permission', 'i', 'check'));
    }
    public function add()
    {
        $permissionModel = new permissionModel();
        $permission_Item = $permissionModel->getTable();
        return view('include.main.page.system.permission.add', compact('permission_Item'));
    }
    public function post_add(permissionRequest $request)
    {
        $name = $request->permissionName;
        $code = $request->permissionCode;
        $router = $request->permissionRouter;
        $GroupId = $request->permissionGroupId;
        $note = $request->permissionNote;
        $permission = new permissionModel();
        $check = $permission->checkDatabase($code);
        if ($check) {
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        } else {
            $add = $permission->addpermission($name, $code, $router, $GroupId, $note);
            if ($add) {
                return " <script> alert('Thêm thành công'); window.location = '" . route('permission.list') . "';</script>";
            } else {
                return " <script> alert('Thêm thất bại'); window.location = '" . route('permission.add') . "';</script>";
            }
        }
    }
    public function update($permission_id)
    {
        $permissionModel = new permissionModel();
        $permission_Group = $permissionModel->getTable();
        $item_permission = $permissionModel->getDeatil($permission_id)->get();

        return view('include.main.page.system.permission.update', compact('item_permission','permission_Group'));
    }
    public function deatil($permission_id)
    {
        $permissionModel = new permissionModel();
        $item_permission = $permissionModel->getDeatil($permission_id)->get();

        return view('include.main.page.system.permission.deatil', compact('item_permission'));
    }
    public function post_update(permissionRequest $request, $permission_id)
    {
        $name = $request->permissionName;
        $code = $request->permissionCode;
        $router = $request->permissionRouter;
        $GroupId = $request->permissionGroupId;
        $note = $request->permissionNote;
        $permission = new permissionModel();
        $check_is = $permission->checkDatabaseIs($code, $permission_id);
        if ($check_is) {
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        } else {
            $update = $permission->updatepermission($name,$code,$router,$GroupId,$note,$permission_id);
            // if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '" . route('permission.list') . "';</script>";
            // }else{
            //     return " <script> alert('Cập nhật thất bại'); window.location = '".route('permission_list')."';</script>";
            // }
        }
    }
    public function toogle_status($permission_id, $permission_status)
    {
        $permission = new permissionModel();
        $product = $permission->getDeatil($permission_id)->first();
        $status = 0;
        if ($product->permission_status == 1) {
            if ($permission_status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
        }
        if ($product->permission_status == 0) {
            if ($permission_status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
        }

        $permission->status_toggle($status, $permission_id);
        return " <script> alert('Cập nhật thành công'); window.location = '" . route('permission.list') . "';</script>";
    }
}
