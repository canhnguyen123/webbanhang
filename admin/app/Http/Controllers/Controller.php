<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\statisticalModel;
class Controller extends BaseController
{
    public function home(){
        $statisticalModel=new statisticalModel();
        $listProductTH=$statisticalModel-> getProduct1st(3,true);
        $listProduct10=$statisticalModel-> getProduct1st();
        $countPayment=$statisticalModel->getNoProcess('tbl_payment','statusPayment_id')->count();
        $countRequest_cancellation=$statisticalModel->getNoProcess('tbl_request_cancellation','request_cancellation_status')->count();
        $i=1;
        return view('include.main.home',compact('listProductTH','i','listProduct10','countPayment','countRequest_cancellation'));
    }
    public function login(){
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('login');
    }
}
