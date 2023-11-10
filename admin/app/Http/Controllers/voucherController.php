<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\voucherRequest;
use Illuminate\Support\Facades\DB;
use App\Models\voucherModel;

class voucherController extends Controller
{
    public function list(){
        $voucherModel = new voucherModel();
        $paginate = $voucherModel->getPagination()->first(); 
        $list_voucher = $voucherModel->paginate($paginate->pagination_limitDeaful); 
        $check = $list_voucher->hasMorePages() ? 1 : 0;
        $i = 1;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.page.voucher.lits', compact('list_voucher', 'i', 'check','category','nameElement'));
    }
public function add(){
    return view('include.main.page.voucher.add');
}
public function post_add(voucherRequest $request){
    $name=$request->voucher_name;
    $code=$request->voucher_code;
    $isLimit=$request->voucher_isLimit;
    $unit=$request->voucher_unit;
    $condition=$request->voucher_condition;
    $quantity=$request->voucher_quantity;
    $number=$request->voucher_number;
    $voucher_category=$request->voucher_category;
    $number_condition=$request->voucher_number_condition;
    $startTime=$request->voucher_startTime;
    $endTime=$request->voucher_endTime;
    $note=$request->voucher_note;
    $voucher= new voucherModel();
    $check=$voucher->checkDatabase($code);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $voucher->addvoucher($name, $code,$isLimit,$unit,$voucher_category,$condition,$quantity,$number,$number_condition,$startTime,$endTime,$note)    ;
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('voucher_list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('voucher_list')."';</script>";
        }
    }
  
}
public function update($voucher_id){
    $item_voucher = DB::table('tbl_voucher')->where('voucher_id',$voucher_id)->get();
     
    return view('include.main.page.voucher.update',compact('item_voucher'));
}
public function deatil($voucher_id){
    $item_voucher = DB::table('tbl_voucher')->where('voucher_id',$voucher_id)->get();
     
    return view('include.main.page.voucher.deatil',compact('item_voucher'));
}

public function post_update(voucherRequest $request,$voucher_id){
    $name=$request->voucher_name;
    $code=$request->voucher_code;
    $isLimit=$request->voucher_isLimit;
    $unit=$request->voucher_unit;
    $condition=$request->voucher_condition;
    $quantity=$request->voucher_quantity;
    $number=$request->voucher_number;
    $voucher_category=$request->voucher_category;
    $number_condition=$request->voucher_number_condition;
    $startTime=$request->voucher_startTime;
    $endTime=$request->voucher_endTime;
    $note=$request->voucher_note;
    $voucher= new voucherModel();
    $check=$voucher->checkDatabaseIs($code,$voucher_id);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $voucher->updatevoucher($name, $code, $isLimit, $unit, $voucher_category, $condition, $quantity, $number, $number_condition, $startTime, $endTime, $note,$voucher_id) ;
        if($add){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('voucher_list')."';</script>";
        }else{
            return " <script> alert('Cập nhật thất bại'); window.location = '".route('voucher_post_update',['voucher_id'=>$voucher_id])."';</script>";
        }
    }
  
}
public function toogle_status($voucher_id,$voucher_status){
    $voucher= new voucherModel();
    $product=DB::table('tbl_voucher')->where('voucher_id',$voucher_id)->first();
    $status=0;
    if($product->voucher_status==1){
        if($voucher_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($product->voucher_status == 0) {
        if($voucher_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
   $voucher->status_toggle($status,$voucher_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('voucher_list')."';</script>";
}
}
