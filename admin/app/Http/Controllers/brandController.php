<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\brandRequest;
use Illuminate\Support\Facades\DB;
use App\Models\brandModel;

class brandController extends Controller
{
    public function list(){
        $brandModel = new brandModel();
        $list_brand = $brandModel->paginate(5); 
        $check = $list_brand->hasMorePages() ? 1 : 0;
        $i = 1;
        return view('include.main.page.product.brand.lits', compact('list_brand', 'i', 'check'));
    }
public function add(){
    return view('include.main.page.product.brand.add');
}
public function post_add(brandRequest $request){
    $name=$request->namebrand;
    $code=$request->codebrand;
    
    $brand= new brandModel();
    $check=$brand->checkDatabase($code);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $brand->addbrand($name,$code);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('brand_list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('brand_list')."';</script>";
        }
    }
  
}
public function update($brand_id){
    $item_brand = DB::table('tbl_brand')->where('brand_id',$brand_id)->get();
     
    return view('include.main.page.product.brand.update',compact('item_brand'));
}
public function post_update(brandRequest $request,$brand_id){
    $name=$request->namebrand;
    $code=$request->codebrand;
    $brand= new brandModel();
    $check_is= $brand->checkDatabaseIs($code,$brand_id);
    if($check_is){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update= $brand->updatebrand($name,$code,$brand_id);
       // if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('brand_list')."';</script>";
        // }else{
        //     return " <script> alert('Cập nhật thất bại'); window.location = '".route('brand_list')."';</script>";
        // }
    }
  
}
public function toogle_status($brand_id,$brand_status){
    $brand= new brandModel();
    $product=DB::table('tbl_brand')->where('brand_id',$brand_id)->first();
    $status=0;
    if($product->brand_status==1){
        if($brand_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($product->brand_status == 0) {
        if($brand_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
   $brand->status_toggle($status,$brand_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('brand_list')."';</script>";
}
}
