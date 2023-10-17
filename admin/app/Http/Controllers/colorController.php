<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\colorRequest;
use Illuminate\Support\Facades\DB;
use App\Models\colorModel;


class colorController extends Controller
{
    public function list(){
        $colorModel = new colorModel();
        $list_color = $colorModel->paginate(5); 
        $check = $list_color->hasMorePages() ? 1 : 0;
        $i = 1;
        return view('include.main.page.product.color.lits', compact('list_color', 'i', 'check'));
    }
public function add(){
    return view('include.main.page.product.color.add');
}
public function post_add(colorRequest $request){
    $name=$request->namecolor;
    $code=$request->color_code;
    
    $color= new colorModel();
    $check=$color->checkDatabase($code);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $color->addcolor($name,$code);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('color_list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('color_list')."';</script>";
        }
    }
  
}
public function update($color_id){
    $item_color = DB::table('tbl_color')->where('color_id',$color_id)->get();
     
    return view('include.main.page.product.color.update',compact('item_color'));
}
public function post_update(colorRequest $request,$color_id){
    $name=$request->namecolor;
    $code=$request->color_code;
    $color= new colorModel();
    $check_is= $color->checkDatabaseIs($code,$color_id);
    if($check_is){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update= $color->updatecolor($name,$code,$color_id);
       // if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('color_list')."';</script>";
        // }else{
        //     return " <script> alert('Cập nhật thất bại'); window.location = '".route('color_list')."';</script>";
        // }
    }
  
}
public function toogle_status($color_id,$color_status){
    $color= new colorModel();
    $product=DB::table('tbl_color')->where('color_id',$color_id)->first();
    $status=0;
    if($product->color_status==1){
        if($color_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($product->color_status == 0) {
        if($color_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
   $color->status_toggle($status,$color_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('color_list')."';</script>";
}
}
