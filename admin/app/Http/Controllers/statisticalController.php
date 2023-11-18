<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\statisticalModel;

class statisticalController extends Controller
{
    public function statistical(){
       
        return view('include.main.page.statistical.statistical');
    }
    public function statisticalProduct(){
        $statisticalModel = new statisticalModel();
        $countProductSoid=$statisticalModel->selectProduct('tbl_payment_deatil','product_id')->count();
        $countProductAll=$statisticalModel->selectProduct('tbl_product','product_id')->count();
        $list_productSoid=$statisticalModel->productSoid()->get();
        $i=1;
        return view('include.main.page.statistical.product.table', compact('countProductSoid','countProductAll','list_productSoid','i'));
    }
    public function productDeatil($product_id){
        $statisticalModel = new statisticalModel();
        $deatilTable=$statisticalModel->productSoidDeatil($product_id)->get();
        $total=$statisticalModel->productSoidDeatilTotal($product_id);
        $i=1;
       
        return view('include.main.page.statistical.product.deatil', compact('deatilTable','i','total','product_id'));
    }
    public function productDeatilAcction($product_id,Request $request){
        $statisticalModel = new statisticalModel();
        $listLable="";
        $resultList="";
        $value = $request->value;
        if($value=="6Mouth"){
            $listLable=$statisticalModel->sixMonth();
            $resultList=$statisticalModel->sixMonthQuantity($product_id);
        }
        else if($value=="yearNow"){
            $listLable=$statisticalModel->yearNow();
            $resultList=$statisticalModel->yearNowQuantity($product_id);
        }
        else if($value=="yearAgo"){
            $listLable=$statisticalModel->lastYear();
            $resultList=$statisticalModel->lastYearQuantity($product_id);
        }
        return response()->json(['status' => "success",'listLable'=>$listLable,'result'=>$resultList]);
    }
   
}
