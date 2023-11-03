<?php
namespace App\Http\Controllers;
use App\Http\Requests\permissionGroupRequest;
use App\Models\permissionGroupModel;
class permissionGroupController extends Controller
{
    public function list(){
        $permissionGroupModel = new permissionGroupModel();
        $list_permissionGroup = $permissionGroupModel->paginate(15); 
        $check = $list_permissionGroup->hasMorePages() ? 1 : 0;
        $i = 1;
        return view('include.main.page.system.permissionGroup.lits', compact('list_permissionGroup', 'i', 'check'));
    }
public function add(){
    return view('include.main.page.system.permissionGroup.add');
}
public function post_add(permissionGroupRequest $request){
    $name=$request->permissionGroupName;
    $code=$request->permissionGroupCode;
    $note=$request->permissionGroupNote;
    $permissionGroup= new permissionGroupModel();
    $check=$permissionGroup->checkDatabase($code);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $permissionGroup->addpermissionGroup($name,$code,$note);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('permission.Group.list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('permission.Group.add')."';</script>";
        }
    }
  
}
public function update($permissionGroup_id){
    $permissionGroup= new permissionGroupModel();
    $item_permissionGroup = $permissionGroup->getDeatil($permissionGroup_id)->get();
     
    return view('include.main.page.system.permissionGroup.update',compact('item_permissionGroup'));
}
public function post_update(permissionGroupRequest $request,$permissionGroup_id){
    $name=$request->permissionGroupName;
    $code=$request->permissionGroupCode;
    $note=$request->permissionGroupNote;
    $permissionGroup= new permissionGroupModel();
    $check_is= $permissionGroup->checkDatabaseIs($code,$permissionGroup_id);
    if($check_is){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update= $permissionGroup->updatepermissionGroup($name,$code,$note,$permissionGroup_id);
       // if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('permission.Group.list')."';</script>";
        // }else{
        //     return " <script> alert('Cập nhật thất bại'); window.location = '".route('permissionGroup_list')."';</script>";
        // }
    }
  
}
public function toogle_status($permissionGroup_id,$permission_group_status){
    $permissionGroup= new permissionGroupModel();
    $product=$permissionGroup->getDeatil($permissionGroup_id)->first();
    $status=0;
    if($product->permission_group_status==1){
        if($permission_group_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($product->permission_group_status == 0) {
        if($permission_group_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
    $permissionGroup->status_toggle($status,$permissionGroup_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('permission.Group.list')."';</script>";
}
}
