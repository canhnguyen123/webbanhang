<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\staffRequest;
use Illuminate\Support\Facades\DB;
use App\Models\staffModel;
use Illuminate\Support\Facades\File;
class staffController extends Controller
{
    public function list(){
        $staffModel = new staffModel();
        $list_staff = $staffModel->paginate(20); 
        $check = $list_staff->hasMorePages() ? 1 : 0;
        $i = 1;
        return view('include.main.page.system.staff.lits', compact('list_staff', 'i', 'check'));
    }
public function add(){
    $staffModel = new staffModel();
    $listPosition = $staffModel->getListTable('tbl_position', 'position_status')->get();
    return view('include.main.page.system.staff.add',compact('listPosition'));
}
public function post_add(Request $request){
    $fullname=$request->fullname;
    $code=$request->code;
    $username=$request->username;
    $password=$request->password;
    $email=$request->email;
    $phone=$request->phone;
    $codeRecovery=$request->codeRecovery;
    $position_id=$request->position_id;
    $note=$request->note;
    $deatilAddress=$request->deatilAddress;
    $staff_address=$request->staff_address;
    $address = $deatilAddress . ", ".$staff_address ;
    $img = $request->file('imgLink');
    $staff= new staffModel();
    $check=$staff->checkDatabase($code);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $staff->addstaff($fullname,$code,$username,$password,$email,$phone,$codeRecovery, $position_id,$note,$img,$address);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('staff_list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('staff_list')."';</script>";
        }
    }
  
}
public function update($staff_id){
  
    $staffModel = new staffModel();
    $item_staff =$staffModel->getDetail($staff_id);
    $listPosition = $staffModel->getListTable('tbl_position', 'position_status')->get();
    $listPemissionId = $staffModel->getListTable('tbl_permission', 'permission_status')->get();
    $listMyPemissionId = $staffModel->getMyListTable($staff_id)->get();
    return view('include.main.page.system.staff.update',compact('item_staff','listPosition','listPemissionId','listMyPemissionId'));
}
public function deatil($staff_id){
  
    $staffModel = new staffModel();
    $item_staff =$staffModel->getDetail($staff_id);
        return view('include.main.page.system.staff.detail',compact('item_staff'));
}
public function post_update(Request $request,$staff_id){
    $staff=DB::table('tbl_staff')->where('staff_id',$staff_id)->first();
    $fullname=$request->fullname;
    $email=$request->email;
    $phone=$request->phone;
    $position_id=$request->position_id;
    $note=$request->note;
    $deatilAddress=$request->deatilAddress;
    $staff_address=$request->staff_address;
    $pemissionId=$request->pemissionId;
    $address="";
    $img="";
    if(strlen(trim($deatilAddress))===0){
        $address=$staff->staff_address;
    }else{
        $address = $deatilAddress . ", ".$staff_address ;
    }
    $imgLink = $request->file('imgLink');

    if($imgLink&&$imgLink->isValid()){
         $img=$imgLink->getClientOriginalName();
   }
    else{
        $img=$staff->staff_linkimg;
    }
    $staff= new staffModel();
        $update= $staff-> updatestaff($fullname, $email, $phone, $position_id, $note, $img, $address,$staff_id,$pemissionId);
        $staff->updatePemission($pemissionId, $staff_id);
        if($imgLink&&$imgLink->isValid()){
            $uploadPath = public_path('upload');

            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }
            $uploadPath = public_path('upload/BE');
            $imgLink->move($uploadPath, $img);
    
      }
     
      return " <script> alert('Cập nhật thành công '); window.location = '".route('staff_list')."';</script>";

    
}
public function toogle_status($staff_id,$staff_status){
    $staff= new staffModel();
    $product=DB::table('tbl_staff')->where('staff_id',$staff_id)->first();
    $status=0;
    if($product->staff_status==1){
        if($staff_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($product->staff_status == 0) {
        if($staff_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
   $staff->status_toggle($status,$staff_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('staff_list')."';</script>";
}
}
