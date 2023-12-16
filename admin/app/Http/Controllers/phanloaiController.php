<?php
namespace App\Http\Controllers;
use App\Http\Requests\phanloaiRequest;
use Illuminate\Support\Facades\DB;
use App\Models\phanloaiModel;

class phanloaiController extends Controller
{   
    private $phanloaiModel;

    public function __construct(phanloaiModel $phanloaiModel)
    {
        $this->phanloaiModel = $phanloaiModel;
    }
    public function list(){
        $phanloaiModel = new phanloaiModel();
        $paginate = $phanloaiModel->getPagination()->first(); 
        $list_phanloai = $phanloaiModel->paginate($paginate->pagination_limitDeaful); 
        $check = $list_phanloai->hasMorePages() ? 1 : 0;
        $i = 1;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.page.product.phanloai.lits', compact('list_phanloai', 'i', 'check','category','nameElement'));
    }
public function add(){
    return view('include.main.page.product.phanloai.add');
}
public function post_add(phanloaiRequest $request){
    $name=$request->namephanloai;
    $check=$this->phanloaiModel->checkDatabase($name);
    if($check){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add=$this->phanloaiModel->addphanloai($name);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('phanloai_list')."';</script>";
        }
        else{
            $errorMessage = "Thêm thất bại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
    }
  
}
public function update($id){
    $item_phanloai =$this->phanloaiModel->getDeatil($id);
     
    return view('include.main.page.product.phanloai.update',compact('item_phanloai'));
}
public function post_update(phanloaiRequest $request,$id){
    $name=$request->namephanloai;
    $check_is=$this->phanloaiModel->checkDatabase($name,$id);
    if($check_is){
        $errorMessage = "Tên phân loại đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update= $this->phanloaiModel->updatephanloai($name,$id);
        if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('phanloai_list')."';</script>";
        }
        else{
            $errorMessage = "Cập nhật thất bại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
    }
  
}
public function toogle_status($id){
    $getStatus=$this->phanloaiModel->getDeatil($id);
        
    $getStatus_now=$getStatus->phanloai_status;
    if($getStatus_now===1){
        $status=0;
    }else{
        $status=1;
    }
    $result = $this->phanloaiModel->status_toggle($status,$id);
    $message = ($result) ? 'Cập nhật thành công' : 'Cập nhật thất bại';

    return "<script> alert('$message'); window.location.href = '" . route('phanloai_list') . "';</script>";

}
}
