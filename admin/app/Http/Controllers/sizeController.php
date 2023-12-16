<?php
namespace App\Http\Controllers;
use App\Http\Requests\sizeRequest;
use Illuminate\Support\Facades\DB;
use App\Models\sizeModel;

class sizeController extends Controller
{   
    private $sizeModel;

    public function __construct(sizeModel $sizeModel)
    {
        $this->sizeModel = $sizeModel;
    }
    public function list(){
        $sizeModel = new sizeModel();
        $paginate = $sizeModel->getPagination()->first();
        $list_size = $sizeModel->paginate($paginate->pagination_limitDeaful); 
        $check = $list_size->hasMorePages() ? 1 : 0;
        $i = 1;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.page.product.size.lits', compact('list_size', 'i', 'check','category','nameElement'));
    }
public function add(){
    return view('include.main.page.product.size.add');
}
public function post_add(sizeRequest $request){
    $name=$request->namesize;
    $mota=$request->motasize;
    $check=$this->sizeModel->checkDatabase($name);
    if($check){
        $errorMessage = "Mã size đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add=$this->sizeModel->addsize($name,$mota);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('size_list')."';</script>";
        }
        else{
            $errorMessage = "Thêm thất bại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
    }
  
}
public function update($id){
    $item_size =$this->sizeModel->getDeatil($id);
    return view('include.main.page.product.size.update',compact('item_size'));
}
public function post_update(sizeRequest $request,$id){
    $name=$request->namesize;
    $mota=$request->motasize;
    $check_is= $this->sizeModel->checkDatabase($name,$id);
    if($check_is){
        $errorMessage = "Mã size đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update=  $this->sizeModel->updateId($name,$mota,$id);
        if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('size_list')."';</script>";
        }
        else{
            $errorMessage = "Cập nhật thất bại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
    }
  
}
public function toogle_status($id){
    $getStatus=$this->sizeModel->getDeatil($id);
        
    $getStatus_now=$getStatus->size_status;
    if($getStatus_now===1){
        $status=0;
    }else{
        $status=1;
    }
    $result = $this->sizeModel->status_toggle($status,$id);
    $message = ($result) ? 'Cập nhật thành công' : 'Cập nhật thất bại';

    return "<script> alert('$message'); window.location.href = '" . route('size_list') . "';</script>";
}
}
