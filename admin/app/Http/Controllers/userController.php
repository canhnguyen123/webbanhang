<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\userRequest;
use Illuminate\Support\Facades\DB;
use App\Models\userModel;

class userController extends Controller
{
    public function list(){
        $userModel = new userModel();
        $paginate = $userModel->getPagination()->first(); 
        $list_user = $userModel->paginate($paginate->pagination_limitDeaful); 
        $check = $list_user->hasMorePages() ? 1 : 0;
        $i = 1;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.page.user.lits', compact('list_user', 'i', 'check','category','nameElement'));
    }
public function deatil($user_id){
    $userModel= new userModel();
     $deatilItem= $userModel->deatil($user_id)->get();
    return view('include.main.page.user.deatil',compact('deatilItem'));
}

public function toogle_status($user_id,$user_status){
    $userModel= new userModel();
    $product=$userModel->deatil($user_id)->first();
    $status=0;
    if($product->user_status==1){
        if($user_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($product->user_status == 0) {
        if($user_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
   $userModel->status_toggle($status,$user_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('user_list')."';</script>";
}
}
