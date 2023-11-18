<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\billRequest;
use Illuminate\Support\Facades\DB;
use App\Models\billModel;
use Illuminate\Routing\Route;

class billController extends Controller
{
    public function list()
    {
        $billModel = new billModel();
        $list_payment = $billModel->where('statusPayment_id',1)->paginate(30);
        $check = $list_payment->hasMorePages() ? 1 : 0;
        $statusPayment=$billModel->getDataTabel('tbl_statuspayment','statusPayment_status')->get();
        $i = 1;
        return view('include.main.page.payment.bill.lits', compact('list_payment', 'i', 'check','statusPayment'));
    }
    public function update($bill_id)
    {    $billModel = new billModel();
        $item_bill =$billModel->getList($bill_id)->get();

        return view('include.main.page.payment.bill.update', compact('item_bill'));
    }
    public function deatil($bill_id)
    {    $billModel = new billModel();
        $item_bill =$billModel->getDeatil($bill_id)->get();
        $item_bill_Deatil =$billModel->getPaymentDeatil($bill_id)->get();
        return view('include.main.page.payment.bill.deatil', compact('item_bill','item_bill_Deatil'));
    }
    public function action(Request $request,$bill_id)
    {       $status=intval($request->change_payment);
            $code=$request->codePayment;
            $note=$request->notePayment;
            $localtion=$request->localtionPayment;
            $reason_mess=$request->reason_mess;
            $mess="";
            $router="";
            $billModel = new billModel();
            $paymentDeatil=$billModel->get1($bill_id)->first();
            $user_id=$paymentDeatil->user_id;
            $codepayment=$paymentDeatil->payment_code;
            $messNotification="";
            if($status===2){
                $update_2=$billModel->updateAction($status, $bill_id, $note, $code, $localtion);
                if($update_2){
                    $messNotification="Shop đã xác nhận đơn hàng của bạn";
                    $createNotification=$billModel->createNotification($user_id,$messNotification);
                    $mess="Đã xác nhận tạo đơn";
                    $router=route('payment_list');
                }
                else{
                    $mess="Tạo đơn thất bại";
                }

            }
            elseif($status===3){
                $update_3=$billModel->updateAction($status, $bill_id, $note);
                if($update_3){
                    $messNotification="Shop đã đóng gói đơn hàng có mã ".$codepayment ." của bạn và chuyển cho bên giao hàng ";
                    $createNotification=$billModel->createNotification($user_id,$messNotification);
                    $mess="Đã xác nhận chuyển cho bên giao hàng";
                    $router=route('payment_list');
                }
                else{
                    $mess="Xác nhận thất bại";
                }
            }
            elseif($status===4){
                $update_4=$billModel->updateAction($status, $bill_id, $note);
                if($update_4){
                    $messNotification="Đơn hàng có  mã mã ".$codepayment ." của bạn đã giao thành công ";
                    $createNotification=$billModel->createNotification($user_id,$messNotification);
                    $mess="Đã xác nhận giao hàng thành công";
                    $router=route('payment_list');
                }
                else{
                    $mess="Xác nhận thất bại";
                }
            }
            elseif($status===5){
              
                    $messNotification="Đơn hàng của bạn đã bị hủy bởi lý do : " .$reason_mess;
                    $billModel->createNotification($user_id,$messNotification);
                    $mess="Đã xác nhận hủy đơn hàng";
                    $router=route('payment_list');
               
            }
            elseif($status===6){
                $update_6=$billModel->updateAction($status, $bill_id, $note);
                if($update_6){
                    $messNotification="Đơn hàng có  mã mã ".$codepayment ." của bạn đã chuyển vào mục giao thành công ";
                    $createNotification=$billModel->createNotification($user_id,$messNotification);
                    $mess="Đã xác nhận chuyển đơn vào mục hoàn thành";
                    $router=route('payment_list');
                }
                else{
                    $mess="Xác nhận thất bại";
                }
        }
        return " <script> alert('".$mess."'); window.location = '" . $router . "';</script>";

    }
    public function post_update(Request $request, $bill_id)
    {
        $name = $request->namebill;
        $code = $request->codebill;
        $bill = new billModel();
        $check_is = $bill->checkDatabaseIs($code, $bill_id);
        if ($check_is) {
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        } else {
            $update = $bill->updatebill($name, $code, $bill_id);
            // if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '" . route('bill_list') . "';</script>";
            // }else{
            //     return " <script> alert('Cập nhật thất bại'); window.location = '".route('bill_list')."';</script>";
            // }
        }
    }
    public function toogle_status($bill_id, $bill_status)
    {
        $bill = new billModel();
        $product = DB::table('tbl_bill')->where('bill_id', $bill_id)->first();
        $status = 0;
        if ($product->bill_status == 1) {
            if ($bill_status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
        }
        if ($product->bill_status == 0) {
            if ($bill_status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
        }

        $bill->status_toggle($status, $bill_id);
        return " <script> alert('Cập nhật thành công'); window.location = '" . route('bill_list') . "';</script>";
    }
}
