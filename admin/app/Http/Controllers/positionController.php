<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\positionRequest;
use Illuminate\Support\Facades\DB;
use App\Models\positionModel;

class positionController extends Controller
{
    public function list(){
        $positionModel = new positionModel();
        $paginate = $positionModel->getPagination()->first();
        $list_position = $positionModel->paginate($paginate->pagination_limitDeaful); 
        $check = $list_position->hasMorePages() ? 1 : 0;
        $i = 1;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.page.system.position.lits', compact('list_position', 'i', 'check','category','nameElement'));
    }
public function add(){
    $positionModel = new positionModel();
    $getPemissionGroup=$positionModel->selectTable('tbl_permission__group','permission_group_id','permission_group_status')->get();
    return view('include.main.page.system.position.add',compact('getPemissionGroup'));
}
public function post_add(positionRequest $request){
    $name=$request->nameposition;
    $code=$request->codeposition;
    $pemissionGroup=$request->pemissionGroup;
    $position= new positionModel();
    $check=$position->checkDatabase($code);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $getId= $position->addposition($name,$code);
        if($getId){
            $add= $position->addPemissionGroup($pemissionGroup,$getId);
            if($add){
                return " <script> alert('Thêm thành công'); window.location = '".route('position_list')."';</script>";
            }
            else{
                return " <script> alert('Không thêm được nhóm quyền'); window.location = '".route('position_list')."';</script>";
            }
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('position_list')."';</script>";
        }
    }
  
}
public function update($position_id){
    $item_position = DB::table('tbl_position')->where('position_id',$position_id)->get();
    $positionModel = new positionModel();
    $getPemissionGroup=$positionModel->selectTable('tbl_permission__group','permission_group_id','permission_group_status')->get();
    $getMyPemissionGroup=$positionModel->getDataPemission($position_id)->get();
    return view('include.main.page.system.position.update',compact('item_position','getPemissionGroup','getMyPemissionGroup'));
}
public function post_update(positionRequest $request,$position_id){
    $name=$request->nameposition;
    $code=$request->codeposition;
    $pemissionGroup=$request->pemissionGroup;
    $position= new positionModel();
    $check_is= $position->checkDatabaseIs($code,$position_id);
    if($check_is){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update= $position->updateposition($name,$code,$position_id);
       // if($update){
        $update= $position-> updatePemissionGroup($pemissionGroup,$position_id);
            return " <script> alert('Cập nhật thành công '); window.location = '".route('position_list')."';</script>";
        // }else{
        //     return " <script> alert('Cập nhật thất bại'); window.location = '".route('position_list')."';</script>";
        // }
    }
  
}
public function toogle_status($position_id,$position_status){
    $position= new positionModel();
    $product=DB::table('tbl_position')->where('position_id',$position_id)->first();
    $status=0;
    if($product->position_status==1){
        if($position_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($product->position_status == 0) {
        if($position_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
   $position->status_toggle($status,$position_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('position_list')."';</script>";
}
}
