<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\sizeRequest;
use Illuminate\Support\Facades\DB;
use App\Models\sizeModel;

class sizeController extends Controller
{
    public function list(){
        $sizeModel = new sizeModel();
        $paginate = $sizeModel->getPagination()->first();
        $list_size = $sizeModel->paginate($paginate->pagination_limitDeaful); 
        $check = $list_size->hasMorePages() ? 1 : 0;
        $i = 1;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.page.product.size.lits', compact('list_size', 'i', 'check','category','nameElement'));
    }
public function add(){
    return view('include.main.page.product.size.add');
}
public function post_add(sizeRequest $request){
    $name=$request->namesize;
    $mota=$request->motasize;
    
    $size= new sizeModel();
    $check=$size->checkDatabase($name);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $size->addsize($name,$mota);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('size_list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('size_list')."';</script>";
        }
    }
  
}
public function update($size_id){
    $item_size = DB::table('tbl_size')->where('size_id',$size_id)->get();
     
    return view('include.main.page.product.size.update',compact('item_size'));
}
public function post_update(sizeRequest $request,$size_id){
    $name=$request->namesize;
    $mota=$request->motasize;
    $size= new sizeModel();
    $check_is= $size->checkDatabaseIs($name,$size_id);
    if($check_is){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update= $size->updatesize($name,$mota,$size_id);
       // if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('size_list')."';</script>";
        // }else{
        //     return " <script> alert('Cập nhật thất bại'); window.location = '".route('size_list')."';</script>";
        // }
    }
  
}
public function toogle_status($size_id,$size_status){
    $size= new sizeModel();
    $product=DB::table('tbl_size')->where('size_id',$size_id)->first();
    $status=0;
    if($product->size_status==1){
        if($size_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($product->size_status == 0) {
        if($size_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
   $size->status_toggle($status,$size_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('size_list')."';</script>";
}
}
