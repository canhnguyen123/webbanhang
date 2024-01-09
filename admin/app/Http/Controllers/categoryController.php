<?php

namespace App\Http\Controllers;
use App\Http\Requests\categoryRequest;
use App\Models\categoryModel;
class categoryController extends Controller
{    
    private $categoryModel;

    public function __construct(CategoryModel $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }
    public function list(){
            $categoryModel = new categoryModel();
            $paginate = $categoryModel->getPagination()->first(); 
            $list_category = $categoryModel->paginate($paginate->pagination_limitDeaful); 
            $check = $list_category->hasMorePages() ? 1 : 0;
            $category=$paginate->pagination_category;
            $nameElement=$paginate->pagination_nameElement;
            $i = 1;
            return view('include.main.page.product.category.lits', compact('list_category', 'i', 'check','category','nameElement'));
        }
    public function add(){
        return view('include.main.page.product.category.add');
    }
    public function post_add(categoryRequest $request){
        $name=$request->nameCategory;
        $check=$this->categoryModel->checkDatabase($name);
        if($check){
            $errorMessage = "Tên danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }else{
            $add= $this->categoryModel->add($name);
            if($add){
                return " <script> alert('Thêm thành công'); window.location = '".route('category_list')."';</script>";
            }
            else{
                $errorMessage = "Thêm thất bại";
                session()->flash('errorMessage', $errorMessage);
                return redirect()->back();
            }
        }
      
    }
    public function update($category_id){
        $item_category =$this->categoryModel->getDeatil($category_id);
        return view('include.main.page.product.category.update',compact('item_category'));
    }
    
    public function post_update(categoryRequest $request,$id){
        $name=$request->nameCategory;
        $check_is= $this->categoryModel->checkDatabase($name,$id);
        if($check_is){
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }else{
            $update=$this->categoryModel->updateCategory($name,$id);
            if($update){
                return " <script> alert('Cập nhâth thành công'); window.location = '".route('category_list')."';</script>";
            }
            else{
                $errorMessage = "Sửa thất bại";
                session()->flash('errorMessage', $errorMessage);
                return redirect()->back();
            }
        }
      
    }
    public function toogle_status($id){
        $getStatus=$this->categoryModel->getDeatil($id);
        $getStatus_now=$getStatus->category_status;
        if($getStatus_now===1){
            $status=0;
        }else{
            $status=1;
        }
        $result = $this->categoryModel->status_toggle($status,$id);
        $message = ($result) ? 'Cập nhật thành công' : 'Cập nhật thất bại';
    
        return "<script> alert('$message'); window.location.href = '" . route('category_list') . "';</script>";      
     }
}
