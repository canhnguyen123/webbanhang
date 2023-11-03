<?php

namespace App\Http\Controllers;
use App\Http\Requests\materiaalRequest;
use App\Models\materialModel;

class materialController extends Controller
{
    public function list(){
        $materialModel = new materialModel();
        $list_material = $materialModel->paginate(5); 
        $check = $list_material->hasMorePages() ? 1 : 0;
        $i = 1;
        return view('include.main.page.product.material.lits', compact('list_material', 'i', 'check'));
    }
public function add(){
    return view('include.main.page.product.material.add');
}
public function post_add(materiaalRequest $request){
    $name=$request->materialName;
    $material= new materialModel();
    $check=$material->checkDatabase($name);
    if($check){
        $errorMessage = "Tên danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $material->addmarerial($name);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('material.list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('material.add')."';</script>";
        }
    }
  
}
public function update($material_id){
    $material= new materialModel();
    $item_material = $material->getDeatil($material_id)->get();
     
    return view('include.main.page.product.material.update',compact('item_material'));
}
public function post_update(materiaalRequest $request,$material_id){
    $name=$request->materialName;
    $material= new materialModel();
    $check_is= $material->checkDatabaseIs($name,$material_id);
    if($check_is){
        $errorMessage = "Tên danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update= $material->updateMaterial($name,$material_id);
       // if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('material.list')."';</script>";
        // }else{
        //     return " <script> alert('Cập nhật thất bại'); window.location = '".route('material_list')."';</script>";
        // }
    }
  
}
public function toogle_status($material_id,$material_status){
    $material= new materialModel();
    $product=$material->getDeatil($material_id)->first();
    $status=0;
    if($product->material_status==1){
        if($material_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($product->material_status == 0) {
        if($material_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
    $material->status_toggle($status,$material_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('material.list')."';</script>";
}
}
