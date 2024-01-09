<?php
namespace App\Http\Controllers;
use App\Http\Requests\colorRequest;
use App\Models\colorModel;


class colorController extends Controller
{   
    private $colorModel;

    public function __construct(colorModel $colorModel)
    {
        $this->colorModel = $colorModel;
    }
    public function list(){
        $colorModel = new colorModel();
        $paginate = $colorModel->getPagination()->first(); 
        $list_color = $colorModel->paginate($paginate->pagination_limitDeaful); 
        $check = $list_color->hasMorePages() ? 1 : 0;
        $i = 1;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.page.product.color.lits', compact('list_color', 'i', 'check','category','nameElement'));
    }
public function add(){
    return view('include.main.page.product.color.add');
}
public function post_add(colorRequest $request){
    $name=$request->namecolor;
    $code=$request->color_code;
    $check=$this->colorModel->checkDatabase($code);
    if($check){
        $errorMessage = "Mã màu đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add=$this->colorModel->add($name,$code);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('color_list')."';</script>";
        }
        else{
            $errorMessage = "Thêm thất bại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
    }
  
}
public function update($id){
    $item_color =$this->colorModel->getDeatil($id);
    return view('include.main.page.product.color.update',compact('item_color'));
}
public function post_update(colorRequest $request,$id){
    $name=$request->namecolor;
    $code=$request->color_code;
    $check_is= $this->colorModel->checkDatabase($code,$id);
    if($check_is){
        $errorMessage = "Mã màu đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update=$this->colorModel->updateId($name,$code,$id);
        if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('color_list')."';</script>";
        }
        else{
            $errorMessage = "Cập nhật thất bại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
    }
  
}
public function toogle_status($id){
    $getStatus=$this->colorModel->getDeatil($id);
    $getStatus_now=$getStatus->color_status;
    if($getStatus_now===1){
        $status=0;
    }else{
        $status=1;
    }
    $result = $this->colorModel->status_toggle($status,$id);
    $message = ($result) ? 'Cập nhật thành công' : 'Cập nhật thất bại';
   return "<script> alert('$message'); window.location.href = '" . route('color_list') . "';</script>";
}
}
