<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\statusPaymentRequest;
use Illuminate\Support\Facades\DB;
use App\Models\statusPaymentModel;

class statusPaymentController extends Controller
{
    public function list(){
        $statusPaymentModel = new statusPaymentModel();
        $paginate = $statusPaymentModel->getPagination()->first(); 
        $list_statusPayment = $statusPaymentModel->paginate($paginate->pagination_limitDeaful); 
        $check = $list_statusPayment->hasMorePages() ? 1 : 0;
        $i = 1;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.page.payment.statusPayment.lits', compact('list_statusPayment', 'i', 'check','category','nameElement'));
    }
public function add(){
    return view('include.main.page.payment.statusPayment.add');
}
public function post_add(statusPaymentRequest $request){
    $name=$request->namestatusPayment;
    $code=$request->codestatusPayment;
    $note=$request->notestatusPayment;
    $statusPayment= new statusPaymentModel();

    $check=$statusPayment->checkDatabase($code);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $statusPayment->addstatusPayment($name,$code,$note);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('statusPayment_list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('statusPayment_list')."';</script>";
        }
    }
  
}
public function update($statusPayment_id){
    $item_statusPayment = DB::table('tbl_statusPayment')->where('statusPayment_id',$statusPayment_id)->get();
     
    return view('include.main.page.payment.statusPayment.update',compact('item_statusPayment'));
}
public function post_update(statusPaymentRequest $request,$statusPayment_id){
    $name=$request->namestatusPayment;
    $code=$request->codestatusPayment;
    $note=$request->notestatusPayment;
    $statusPayment= new statusPaymentModel();
    $check_is= $statusPayment->checkDatabaseIs($code,$statusPayment_id);
    if($check_is){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update= $statusPayment->updatestatusPayment($name,$code,$statusPayment_id,$note);
       // if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('statusPayment_list')."';</script>";
        // }else{
        //     return " <script> alert('Cập nhật thất bại'); window.location = '".route('statusPayment_list')."';</script>";
        // }
    }
  
}
public function toogle_status($statusPayment_id,$statusPayment_status){
    $statusPayment= new statusPaymentModel();
    $payment=DB::table('tbl_statusPayment')->where('statusPayment_id',$statusPayment_id)->first();
    $status=0;
    if($payment->statusPayment_status==1){
        if($statusPayment_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($payment->statusPayment_status == 0) {
        if($statusPayment_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
   $statusPayment->status_toggle($status,$statusPayment_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('statusPayment_list')."';</script>";
}
}
