<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\statisticalModel;

class statisticalController extends Controller
{
    public function statistical(){
        $statisticalModel = new statisticalModel();
        $allMoney=$statisticalModel->allMoney();
        $list=$statisticalModel->getRecentMonths();
        $i=1;
        return view('include.main.page.statistical.revenue.table', compact('list','i','allMoney'));
    }
    public function statisticalProduct(){
        $statisticalModel = new statisticalModel();
        $countProductSoid=$statisticalModel->selectProduct('tbl_payment_deatil','product_id')->count();
        $countProductAll=$statisticalModel->selectProduct('tbl_product','product_id')->count();
        $list_productSoid=$statisticalModel->productSoid()->get();
        $i=1;
        return view('include.main.page.statistical.product.table', compact('countProductSoid','countProductAll','list_productSoid','i'));
    }
    public function statisticalProductAction(Request $request)
    {
        $value = $request->value;
        $statisticalModel = new statisticalModel();
      
        $list = $statisticalModel->getRecentMonths($value);
        $lableChart = $statisticalModel->getTime($value);
        $dataChart = $statisticalModel->getDataRevenue($value);
        $listArray = json_decode(json_encode($list), true);
        $i = 1;
        $perPage = 20; 
        $totalPages = ceil(count($listArray) / $perPage);
    
        return response()->json([
            'status' => "success",
            'view' => view('ohther.ajax.admin.revenue_list')->with('list', $list)->with('i', $i)->render(),
            'lableChart'=>$lableChart,
            'dataChart'=>$dataChart,
        ]);
    }
    
    
    public function productDeatil($product_id){
        $statisticalModel = new statisticalModel();
        $selectList=$statisticalModel->selectProductList();
        $deatilTable=$statisticalModel->productSoidDeatil($product_id)->get();
        $total=$statisticalModel->productSoidDeatilTotal($product_id);
        $i=1;
       
        return view('include.main.page.statistical.product.deatil', compact('deatilTable','i','total','product_id','selectList'));
    }
    public function productDeatilAcction($product_id,Request $request){
        $statisticalModel = new statisticalModel();
        $listLable="";
        $resultList="";
        $value = $request->value;
        $comparison_Id = isset($request->comparison_Id) ? $request->comparison_Id : null;
         if($value==="compare"){
            $listLable=[];
            $resultList=$statisticalModel->compareProduct($product_id,$comparison_Id,1);
        }
        else{
            $listLable=$statisticalModel->getTime($value);
            $resultList=$statisticalModel->getData($value,$product_id);
        }
        return response()->json(['status' => "success",'listLable'=>$listLable,'result'=>$resultList]);
    }
   
}
