<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\todolistRequest;
use Illuminate\Support\Facades\DB;
use App\Models\todolistModel;
use App\Models\staffModel;
class todolistController extends Controller
{
    public function list(){
        $todolistModel = new todolistModel();
        $paginate = $todolistModel->getPagination()->first();
        $list_todolist = $todolistModel->paginate($paginate->pagination_limitDeaful); 
        $check = $list_todolist->hasMorePages() ? 1 : 0;
        $i = 1;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.todolist.lits', compact('list_todolist', 'i', 'check','category','nameElement'));
    }
public function add(){
    $staffModel = new staffModel();
    $getStaff= $staffModel->getListTable('tbl_staff','staff_status')->get();
    return view('include.main.todolist.add',compact('getStaff'));
}
public function post_add(todolistRequest $request){
    $name=$request->nametodolist;
    $mota=$request->motatodolist;
    
    $todolist= new todolistModel();
    $check=$todolist->checkDatabase($name);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $todolist->addtodolist($name,$mota);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('todolist_list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('todolist_list')."';</script>";
        }
    }
  
}
public function update($todolist_id){
    $item_todolist = DB::table('tbl_todolist')->where('todolist_id',$todolist_id)->get();
     
    return view('include.main.todolist.update',compact('item_todolist'));
}
public function post_update(todolistRequest $request,$todolist_id){
    $name=$request->nametodolist;
    $mota=$request->motatodolist;
    $todolist= new todolistModel();
    $check_is= $todolist->checkDatabaseIs($name,$todolist_id);
    if($check_is){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update= $todolist->updatetodolist($name,$mota,$todolist_id);
       // if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('todolist_list')."';</script>";
        // }else{
        //     return " <script> alert('Cập nhật thất bại'); window.location = '".route('todolist_list')."';</script>";
        // }
    }
  
}
public function toogle_status($todolist_id,$todolist_status){
    $todolist= new todolistModel();
    $product=DB::table('tbl_todolist')->where('todolist_id',$todolist_id)->first();
    $status=0;
    if($product->todolist_status==1){
        if($todolist_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($product->todolist_status == 0) {
        if($todolist_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
   $todolist->status_toggle($status,$todolist_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('todolist_list')."';</script>";
}
}
