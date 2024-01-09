<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\statisticalModel;
use App\Models\userModel;
use Illuminate\Support\Facades\Log;

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
    public function statisticaluser(){
        $statisticalModel = new statisticalModel();
        $coutnUserAll= $statisticalModel->selectUser()->count();
        $coutnUser1= $statisticalModel->selectUser(1)->count();
        $coutnUser0= $statisticalModel->selectUser(0)->count();
        $getListUser= $statisticalModel->getListUserFormoney()->get();
        $i=1;
        return view('include.main.page.statistical.user.list', compact('coutnUserAll','coutnUser1','coutnUser0','i','getListUser'));
    }
    public function statisticalDeatiluser($user_id){
        $statisticalModel = new statisticalModel();

        $i=1;
        return view('include.main.page.statistical.user.deatil');
    }
    public function statisticalAction(Request $request)
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
    public function productAllAcction(Request $request){
        $statisticalModel = new statisticalModel();
        $value = $request->value;
        $listLable=$statisticalModel->getTime($value);
        $resultList=$statisticalModel->getDataAll($value);
        return response()->json(['status' => "success",'listLable'=>$listLable,'result'=>$resultList]);
    }
    public function paymentAcction(Request $request){
        $statisticalModel = new statisticalModel();
        $value = $request->value;
        $listLable=$statisticalModel->getTime($value);
        $resultListFail=$statisticalModel->getDataPayment($value,5);
        $resultListSuccess=$statisticalModel->getDataPayment($value,6);
        return response()->json(['status' => "success",'listLable'=>$listLable,'resultListFail'=>$resultListFail,'resultListSuccess'=>$resultListSuccess]);
    }
    public function userAcction(Request $request){
        $statisticalModel = new statisticalModel();
        $value = $request->value;
     
        return response()->json(['status' => "success",'listLable'=>1]);
    }
    public function fitterUserBill(Request $request){
   
        $statisticalModel = new statisticalModel();
        $value = $request->input('content');;
        $list=$statisticalModel->getDataUser($value)->get();
        // $count=$statisticalModel->getListUserFormoney()->count();
        $count=1;
        $i=1;
        return response()->json([
            'view' =>view('ohther.ajax.admin.statisticalUser_list')->with('getListUser', $list)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",
       ]);
    }
    public function fitterUserTime(Request $request){
   
        $statisticalModel = new statisticalModel();
        $value = $request->input('content');;
        $list=$statisticalModel->getDataUserTime($value)->get();
        // $count=$statisticalModel->getListUserFormoney()->count();
        $count=1;
        $i=1;
        return response()->json([
            'view' =>view('ohther.ajax.admin.statisticalUser_list')->with('getListUser', $list)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",
       ]);
    }
    public function statisticalchatUser(Request $request){
        $statisticalModel = new statisticalModel();
        $value=$request->input('content');
        $arrChat=[];
        for ($a = 1; $a <= 3; $a++) {
            $arrAccount=$statisticalModel->getDataUserStaticalChart($value,$a)->count();
            array_push($arrChat,$arrAccount);
        };
        return response()->json(['status' => "success",'result'=>$arrChat]);

    }
    public function statisticalchatUsernormal(){
        $arrChat=[];
        for ($a = 1; $a <= 3; $a++) {
            $arrAccount=userModel::where('user_categoryAccount',$a)->count();
            array_push($arrChat,$arrAccount);
        };
        return response()->json(['status' => "success",'result'=>$arrChat]);

    }
}
