<?php

namespace App\Http\Controllers;
use App\Http\Requests\materiaalRequest;
use App\Models\materialModel;

class materialController extends Controller
{   
    private $materialModel;

    public function __construct(materialModel $materialModel)
    {
        $this->materialModel = $materialModel;
    }
    public function list(){
      
        $materialModel = new materialModel();
        $paginate = $materialModel->getPagination()->first(); 
        $list_material = $materialModel->paginate($paginate->pagination_limitDeaful); 
        $check = $list_material->hasMorePages() ? 1 : 0;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        $i = 1;
        return view('include.main.page.product.material.lits', compact('list_material', 'i', 'check','category','nameElement'));
    }
public function add(){
    return view('include.main.page.product.material.add');
}
public function post_add(materiaalRequest $request){
    $name=$request->materialName;
    $check=$this->materialModel->checkDatabase($name);
    if($check){
        $errorMessage = "Tên chất liệu đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $this->materialModel->add($name);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('material.list')."';</script>";
        }
        else{
            $errorMessage = "Thêm thất bại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
    }
  
}
public function update($id){
    $item_material = $this->materialModel->getDeatil($id);
    return view('include.main.page.product.material.update',compact('item_material'));
}
public function post_update(materiaalRequest $request,$id){
    $name=$request->materialName;
    $check_is= $this->materialModel->checkDatabase($name,$id);
    if($check_is){
        $errorMessage = "Tên chất liệu đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update=$this->materialModel->updateId($name,$id);
        if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('material.list')."';</script>";
        }
        else{
            $errorMessage = "Cập nhật thất bại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
    }
  
}
public function toogle_status($id){
    $getStatus=$this->materialModel->getDeatil($id);
    $getStatus_now=$getStatus->material_status;
    if($getStatus_now===1){
        $status=0;
    }else{
        $status=1;
    }
    $result =$this->materialModel->status_toggle($status,$id);
    $message = ($result) ? 'Cập nhật thành công' : 'Cập nhật thất bại';
   return "<script> alert('$message'); window.location.href = '" . route('material.list') . "';</script>";
}
}
