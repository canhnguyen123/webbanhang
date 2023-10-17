<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\categoryRequest;
use Illuminate\Support\Facades\DB;
use App\Models\categoryModel;
class categoryController extends Controller
{    public function list(){
            $categoryModel = new categoryModel();
            $list_category = $categoryModel->paginate(5); 
            $check = $list_category->hasMorePages() ? 1 : 0;
            $i = 1;
            return view('include.main.page.product.category.lits', compact('list_category', 'i', 'check'));
        }
    public function add(){
        return view('include.main.page.product.category.add');
    }
    public function post_add(categoryRequest $request){
        $name=$request->nameCategory;
        $code=$request->codeCategory;
        
        $category= new categoryModel();
        $check=$category->checkDatabase($code);
        if($check){
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }else{
            $add= $category->addCategory($name,$code);
            if($add){
                return " <script> alert('Thêm thành công'); window.location = '".route('category_list')."';</script>";
            }else{
                return " <script> alert('Thêm thất bại'); window.location = '".route('category_list')."';</script>";
            }
        }
      
    }
    public function update($category_id){
        $item_category = DB::table('tbl_category')->where('category_id',$category_id)->get();
         
        return view('include.main.page.product.category.update',compact('item_category'));
    }
    public function post_update(categoryRequest $request,$category_id){
        $name=$request->nameCategory;
        $code=$request->codeCategory;
        $category= new categoryModel();
        $check_is= $category->checkDatabaseIs($code,$category_id);
        if($check_is){
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }else{
            $update= $category->updateCategory($name,$code,$category_id);
           // if($update){
                return " <script> alert('Cập nhật thành công'); window.location = '".route('category_list')."';</script>";
            // }else{
            //     return " <script> alert('Cập nhật thất bại'); window.location = '".route('category_list')."';</script>";
            // }
        }
      
    }
    public function toogle_status($category_id,$category_status){
        $category= new categoryModel();
        $product=DB::table('tbl_category')->where('category_id',$category_id)->first();
        $status=0;
        if($product->category_status==1){
            if($category_status==0){
                $status=1;
            }else{
                $status=0;
            }
        }
         if ($product->category_status == 0) {
            if($category_status==1){
                $status=0;
            }else{
                $status=1;
            }
        }
      
       $category->status_toggle($status,$category_id);
        return " <script> alert('Cập nhật thành công'); window.location = '".route('category_list')."';</script>";
   }
}
