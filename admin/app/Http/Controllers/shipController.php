<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\shipRequest;
use Illuminate\Support\Facades\DB;
use App\Models\shipModel;

class shipController extends Controller
{
    public function list(){
        $shipModel = new shipModel();
        $paginate = $shipModel->getPagination()->first(); 
        $list_ship = $shipModel->paginate($paginate->pagination_limitDeaful); 
        $check = $list_ship->hasMorePages() ? 1 : 0;
        $i = 1;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.page.payment.ship.lits', compact('list_ship', 'i', 'check','category','nameElement'));
    }
public function add(){
    return view('include.main.page.payment.ship.add');
}
public function post_add(shipRequest $request){
    $name=$request->shipName;
    $code=$request->shipCode;
    $price=$request->shipPrice;
    $mota=$request->shipNote;
    $ship= new shipModel();
    $check=$ship->checkDatabase($name);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $ship->addship($name,$code,$price, $mota);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('ship.list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('ship.add')."';</script>";
        }
    }
  
}
public function update($ship_id){
    $shipModel= new shipModel();
    $item_ship = $shipModel->getDeatil($ship_id)->get();
      return view('include.main.page.payment.ship.update',compact('item_ship'));
}
public function post_update(shipRequest $request,$ship_id){
    $name=$request->shipName;
    $code=$request->shipCode;
    $price=$request->shipPrice;
    $mota=$request->shipNote;
    $ship= new shipModel();
    $check_is= $ship->checkDatabaseIs($name,$ship_id);
    if($check_is){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update= $ship-> updateship($name,$code,$price, $mota,$ship_id);
                return " <script> alert('Cập nhật thành công'); window.location = '".route('ship.list')."';</script>";
      
    }
  
}
public function toogle_status($ship_id,$ship_status){
    $shipModel= new shipModel();
    $ship=$shipModel->getDeatil($ship_id)->first();
    $status=0;
    if($ship->ship_status==1){
        if($ship_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($ship->ship_status == 0) {
        if($ship_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
   $shipModel->status_toggle($status,$ship_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('ship.list')."';</script>";
}
}
