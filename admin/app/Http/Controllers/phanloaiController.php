<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\phanloaiRequest;
use Illuminate\Support\Facades\DB;
use App\Models\phanloaiModel;

class phanloaiController extends Controller
{
    public function list(){
        $phanloaiModel = new phanloaiModel();
        $list_phanloai = $phanloaiModel->paginate(5); 
        $check = $list_phanloai->hasMorePages() ? 1 : 0;
        $i = 1;
        return view('include.main.page.product.phanloai.lits', compact('list_phanloai', 'i', 'check'));
    }
public function add(){
    return view('include.main.page.product.phanloai.add');
}
public function post_add(phanloaiRequest $request){
    $name=$request->namephanloai;
    $code=$request->codephanloai;
    
    $phanloai= new phanloaiModel();
    $check=$phanloai->checkDatabase($code);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $phanloai->addphanloai($name,$code);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('phanloai_list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('phanloai_list')."';</script>";
        }
    }
  
}
public function update($phanloai_id){
    $item_phanloai = DB::table('tbl_phanloai')->where('phanloai_id',$phanloai_id)->get();
     
    return view('include.main.page.product.phanloai.update',compact('item_phanloai'));
}
public function post_update(phanloaiRequest $request,$phanloai_id){
    $name=$request->namephanloai;
    $code=$request->codephanloai;
    $phanloai= new phanloaiModel();
    $check_is= $phanloai->checkDatabaseIs($code,$phanloai_id);
    if($check_is){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update= $phanloai->updatephanloai($name,$code,$phanloai_id);
       // if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('phanloai_list')."';</script>";
        // }else{
        //     return " <script> alert('Cập nhật thất bại'); window.location = '".route('phanloai_list')."';</script>";
        // }
    }
  
}
public function toogle_status($phanloai_id,$phanloai_status){
    $phanloai= new phanloaiModel();
    $product=DB::table('tbl_phanloai')->where('phanloai_id',$phanloai_id)->first();
    $status=0;
    if($product->phanloai_status==1){
        if($phanloai_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($product->phanloai_status == 0) {
        if($phanloai_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
   $phanloai->status_toggle($status,$phanloai_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('phanloai_list')."';</script>";
}
}
