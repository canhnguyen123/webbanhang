<?php
namespace App\Http\Controllers;
use App\Http\Requests\brandRequest;
use App\Models\brandModel;

class brandController extends Controller
{   
    private $brandModel;

    public function __construct(brandModel $brandModel)
    {
        $this->brandModel = $brandModel;
    }
    public function list(){
        $brandModel = new brandModel();
        $paginate = $brandModel->getPagination()->first(); 
        $list_brand = $brandModel->paginate($paginate->pagination_limitDeaful); 
        $check = $list_brand->hasMorePages() ? 1 : 0;
        $i = 1;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.page.product.brand.lits', compact('list_brand', 'i', 'check','category','nameElement'));
    }
public function add(){
    return view('include.main.page.product.brand.add');
}
public function post_add(brandRequest $request){
    $name=$request->namebrand;
    $code=$request->codebrand;
    $check=$this->brandModel->checkDatabase($code);
    if($check){
        $errorMessage = "Mã thương hiệu đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $add= $this->brandModel->add($name,$code);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('brand_list')."';</script>";
        }
        else{
            $errorMessage = "Thêm thất bại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
    }
  
}
public function update($id){
    $item_brand =$this->brandModel->getDeatil($id);
    return view('include.main.page.product.brand.update',compact('item_brand'));
}
public function post_update(brandRequest $request,$id){
    $name=$request->namebrand;
    $code=$request->codebrand;
    $check_is=$this->brandModel->checkDatabase($code,$id);
    if($check_is){
        $errorMessage = "Mã danh mục đã tồn tại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }else{
        $update= $this->brandModel->updateId($name,$code,$id);
        $mess= $update?"Cập nhật thành công":"Cập nhật thất bại";
        $route=$update?route('brand_list'):route('brand_update',['color_id'=>$id]);
        return " <script> alert('".$mess."'); window.location = '".$route."';</script>";
    }
  
}
public function toogle_status($id){
    $getStatus=$this->brandModel->getDeatil($id);
    $getStatus_now=$getStatus->brand_status;
    if($getStatus_now===1){
        $status=0;
    }else{
        $status=1;
    }
    $result =$this->brandModel->status_toggle($status,$id);
    $message = ($result) ? 'Cập nhật thành công' : 'Cập nhật thất bại';
   return "<script> alert('$message'); window.location.href = '" . route('brand_list') . "';</script>";
}
}
