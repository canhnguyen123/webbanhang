<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\methodPaymentRequest;
use Illuminate\Support\Facades\DB;
use App\Models\methodPaymentModel;

class methodPaymentController extends Controller
{
    public function list(){
        $methodPaymentModel = new methodPaymentModel();
        $list_methodPayment = $methodPaymentModel->paginate(5); 
        $check = $list_methodPayment->hasMorePages() ? 1 : 0;
        $i = 1;
        return view('include.main.page.payment.methodPayment.lits', compact('list_methodPayment', 'i', 'check'));
    }
public function add(){
    return view('include.main.page.payment.methodPayment.add');
}
public function post_add(Request $request){
    $name=$request->namemethodPayment;
    $code=$request->codemethodPayment;
    $category=$request->categorymethodPayment;
    $note=$request->notemethodPayment;
    $methodPayment= new methodPaymentModel();

    $check=$methodPayment->checkDatabase($code);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $methodPayment->addmethodPayment($name,$code,$category,$note);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('methodPayment_list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('methodPayment_list')."';</script>";
        }
    }
  
}
public function update($methodPayment_id){
    $item_methodPayment = DB::table('tbl_methodPayment')->where('methodPayment_id',$methodPayment_id)->get();
     
    return view('include.main.page.payment.methodPayment.update',compact('item_methodPayment'));
}
public function post_update(methodPaymentRequest $request,$methodPayment_id){
    $name=$request->namemethodPayment;
    $code=$request->codemethodPayment;
    $note=$request->notemethodPayment;
    $category=$request->categorymethodPayment;
    $methodPayment= new methodPaymentModel();
    $check_is= $methodPayment->checkDatabaseIs($code,$methodPayment_id);
    if($check_is){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update= $methodPayment->updatemethodPayment($name,$code,$methodPayment_id,$note,$category);
       // if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('methodPayment_list')."';</script>";
        // }else{
        //     return " <script> alert('Cập nhật thất bại'); window.location = '".route('methodPayment_list')."';</script>";
        // }
    }
  
}
public function toogle_status($methodPayment_id,$methodPayment_status){
    $methodPayment= new methodPaymentModel();
    $payment=DB::table('tbl_methodPayment')->where('methodPayment_id',$methodPayment_id)->first();
    $status=0;
    if($payment->methodPayment_status==1){
        if($methodPayment_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($payment->methodPayment_status == 0) {
        if($methodPayment_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
   $methodPayment->status_toggle($status,$methodPayment_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('methodPayment_list')."';</script>";
}
}
