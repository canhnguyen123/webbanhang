<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\productRequest;
use App\Http\Requests\productUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\Models\productModel;

class productController extends Controller
{

    public function list()
    {
        $productModel = new productModel();
        $paginate = $productModel->getPagination()->first(); 
        $list_product = $productModel->paginate($paginate->pagination_limitDeaful);
        $check = $list_product->hasMorePages() ? 1 : 0;
        $i = 1;
        $listCategory = $productModel->getListTable('tbl_category', 'category_status');
        $listPhanLoai = $productModel->getListTable('tbl_phanloai', 'phanloai_status');
        $listSize = $productModel->getListTable('tbl_size', 'size_status');
        $listColor = $productModel->getListTable('tbl_color', 'color_status');
        $listBrand = $productModel->getListTable('tbl_brand', 'brand_status');
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.page.product.product.lits', 
         compact('list_product', 'i', 'check','listCategory','listPhanLoai','listSize',
         'listColor','listBrand','category','nameElement'));
    }
    public function add()
    {
        $productModel = new productModel();
        $listCategory = $productModel->getListTable('tbl_category', 'category_status');
        $listPhanLoai = $productModel->getListTable('tbl_phanloai', 'phanloai_status');
        $listSize = $productModel->getListTable('tbl_size', 'size_status');
        $listColor = $productModel->getListTable('tbl_color', 'color_status');
        $listBrand = $productModel->getListTable('tbl_brand', 'brand_status');
        $listMaterial = $productModel->getListTable('tbl_material', 'material_status');
        return view('include.main.page.product.product.add', compact('listCategory', 'listPhanLoai', 'listSize', 'listColor', 'listBrand','listMaterial'));
    }
    
    public function post_add(productRequest $request){
        $theloai_id = $request->theloai_id;
        $product_name = $request->product_name;
        $product_code = $request->product_code;
        $brand_product = $request->brand_product;
        $baoquan_product = $request->baoquan_product;
        $mota_product = $request->mota_product;
        $dacdiem_product = $request->dacdiem_product;
        $listImg = $request->listImg;
        $materialId = $request->materialId;
        $listQuantity = json_decode($request->listQuantity);
        $product= new productModel();
        // $errors = $request->validator->errors();
        // if($errors){
        //      return response()->json(['status'=>'fail', 'mess' => $errors]);

        // }       
        try {
            // Kiểm tra mã sản phẩm tồn tại trong database
            $check = DB::table('tbl_product')->where('product_code', $product_code)->exists();
            if ($check) {
                return response()->json([
                    'status' => 'fail',
                    'errPosition' => 'product_code',
                    'mess' => 'Mã sản phẩm đã tồn tại',
                    'route' => ''
                ]);
            } else {
                $result=$product->addproduct($theloai_id,$product_name,$product_code,$brand_product,$baoquan_product,$mota_product,$dacdiem_product,$listImg,$listQuantity,$materialId);
                $resultImg= $product->addImg($listImg, $result);
           
                $resultQuantity= $product->addProductQuantity($listQuantity, $result);
                $resultMaterial= $product->addMaterial($materialId, $result);
                if($result&&$resultImg&&$resultQuantity&&$resultMaterial){
                    return response()->json([
                        'status' => 'success',
                        'mess' => 'Thêm thành công ',
                        'route' => route('product_list')
                    ]);
                }
               else{
                return response()->json([
                    'status' => 'fail',
                    'errPosition' => 'all',
                    'mess' => 'Thêm thất bại',
                    'route' => ''
                ]);
               }
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'errPosition' => 'all',
                'mess' => 'Thêm thất bại',
                'route' => ''
            ]);
        }
    }

    public function update($product_id)
    {
        $productModel = new productModel();
        $listCategory = $productModel->getListTable('tbl_category', 'category_status');
        $listPhanLoai = $productModel->getListTable('tbl_phanloai', 'phanloai_status');
        $listSize = $productModel->getListTable('tbl_size', 'size_status');
        $listColor = $productModel->getListTable('tbl_color', 'color_status');
        $listBrand = $productModel->getListTable('tbl_brand', 'brand_status');
        $item_product = $productModel->getDeatil($product_id);
        $item_product_Material = $productModel->getDeatilMaterial($product_id);
        $listMaterial = $productModel->getListTable('tbl_material', 'material_status');
        return view('include.main.page.product.product.update', compact('listCategory', 'listPhanLoai', 'listSize', 'listColor', 'listBrand','item_product','item_product_Material','listMaterial'));
    }
    public function deatil($product_id)
    {
        $productModel = new productModel();
        $item_product = $productModel->getDeatil($product_id);
        $item_product_Quantity = $productModel->getQuantity($product_id);
        $item_product_Img = $productModel->getDeatilImg($product_id);
        $item_product_Material = $productModel->getDeatilMaterial($product_id);
        return view('include.main.page.product.product.detail', compact('item_product','item_product_Quantity','item_product_Img','item_product_Material'));

    }
    public function deatil_Quantity($product_id)
    {
        $productModel = new productModel();

        $item_product_Quantity = $productModel->getQuantity($product_id);
        $listSize = $productModel->getListTable('tbl_size', 'size_status');
        $listColor = $productModel->getListTable('tbl_color', 'color_status');
        $product_id=$product_id;
        return view('include.main.page.product.product.quantity', compact('item_product_Quantity','listSize','listColor','product_id'));

    }
    public function deatil_img($product_id)
    {
        $productModel = new productModel();
        $i=1;
        $item_product_Img = $productModel->getDeatilImg($product_id);
       
        $product_id=$product_id;
        return view('include.main.page.product.product.img', compact('item_product_Img','product_id','i'));

    }
    public function post_add_quantity(Request $request, $product_id)
    {
        $size = $request->size;
        $color = $request->color;
        $quantity = $request->quantity;
        $priceout = $request->priceout;
        $priceInt = $request->priceInt;
        $product = new productModel();
        $check_is = $product->checkDatabaseQuantity($size,$color, $product_id);
        if ($check_is) {
            return response()->json([
                'status' => 'fail',
                'mess' => 'Size và màu sắc này đã có mời nhập lại',
                'route' => route('product_deatil_Quantity',['product_id'=>$product_id])
            ]);
        } else {
           
            $add= $product->addProductQuantityDeatil($size,$color,$quantity,$priceInt,$priceout, $product_id);
       
            if($add){
                return response()->json([
                    'status' => 'success',
                    'mess' => 'Thêm thành công',
                    'route' => route('product_deatil_Quantity',['product_id'=>$product_id])
                ]);
            }
            else{
                return response()->json([
                    'status' => 'fail',
                    'mess' => 'Thêm thất bại',
                    'route' => route('product_deatil_Quantity',['product_id'=>$product_id])
                ]);
            }
        }
    }
    public function post_update_quantity(Request $request,$product_id, $productQuantity_id)
    {
        $size = $request->size;
        $color = $request->color;
        $quantity = $request->quantity;
        $priceout = $request->priceout;
        $priceInt = $request->priceInt;
        $product = new productModel();
        $check_is = $product->checkDatabaseIsQuantity($size,$color, $product_id,$productQuantity_id);
        if ($check_is) {
            return response()->json([
                'status' => 'fail',
                'mess' => 'Size và màu sắc này đã có mời nhập lại',
                'route' => route('product_deatil_Quantity',['product_id'=>$product_id])
            ]);
        } else {
           
            $update= $product->updateProductQuantityDeatil($size,$color,$quantity,$priceInt,$priceout,  $productQuantity_id);
       
            if($update){
                return response()->json([
                    'status' => 'success',
                    'mess' => 'Cập nhật thành công',
                    'route' => route('product_deatil_Quantity',['product_id'=>$product_id])
                ]);
            }
            else{
                return response()->json([
                    'status' => 'fail',
                    'mess' => 'Cập nhật thất bại',
                    'route' => route('product_deatil_Quantity',['product_id'=>$product_id])
                ]);
            }
        }
    }
    public function post_update(Request $request, $product_id)
    {
        $theloai_id = $request->theloai_id;
        $product_name = $request->nameProduct;
        $product_code = $request->product_code;
        $brand_product = $request->brand_product;
        $baoquan_product = $request->baoquan_product;
        $mota_product = $request->mota_product;
        $dacdiem_product = $request->dacdiem_product;
        $materialId = $request->materialId;
        $product = new productModel();
        $check_is = $product->checkDatabaseIs($product_code, $product_id);
        if ($check_is) {
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        } else {
            $update = $product->updateproduct($theloai_id, $product_name,$product_code,$brand_product,$baoquan_product,$mota_product,$dacdiem_product, $product_id);
            $product->updateMaterial($materialId, $product_id);
            return " <script> alert('Cập nhật thành công'); window.location = '" . route('product_list') . "';</script>";

        }
    }
    public function toogle_status($product_id, $product_status)
    {
       
        $product = DB::table('tbl_product')->where('product_id', $product_id)->first();
        $status = 0;
        if ($product->product_status == 1) {
            if ($product_status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
        }
        if ($product->product_status == 0) {
            if ($product_status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
        }
        $product = new productModel();
        $product->status_toggle($status, $product_id);
        return " <script> alert('Cập nhật thành công'); window.location = '" . route('product_list') . "';</script>";
    }
    
    public function post_toggle_img($product_id, $productImg_id,$status_img)
    {
        
        $img = DB::table('tbl_product_img')->where('productImg_id', $productImg_id)->first();
        $status = 0;
        if ($img->productImg_status== 1) {
            if ($status_img == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
        }
        if ($img->productImg_status == 0) {
            if ($status_img == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
        }
        $product = new productModel();
        $update=$product->status_toggleImg($status, $productImg_id);
        if($update){
            return "<script> alert('Cập nhật thành công'); window.location = '" .  route('product_deatil_img',['product_id'=>$product_id]) . "';</script>";
        }
        else{
            return "<script> alert('Cập nhật thất bại'); window.location = '" .  route('product_deatil_img',['product_id'=>$product_id]) . "';</script>";
        }
       
    }
    public function toogle_statusQuantity($product_id,$productQuantity_id, $productQuantity_status)
    {
       
        $product = DB::table('tbl_product_quantity')->where('productQuantity_id', $productQuantity_id)->first();
        $status = 0;
        if ($product->productQuantity_status == 1) {
            if ($productQuantity_status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
        }
        if ($product->productQuantity_status == 0) {
            if ($productQuantity_status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
        }
        $product = new productModel();
        $product->status_toggleQuantity($status, $productQuantity_id);
        return "<script> alert('Cập nhật thành công'); window.location = '" . route('product_deatil_Quantity', ['product_id' => $product_id]) . "';</script>";
    }
    public function post_add_img(Request $request, $product_id)
    {
        
     
        $listImg = $request->listImg;
     
        $product= new productModel();
        try {
            $add=$product->addProductImg($listImg, $product_id);
            if($add){
                    return response()->json([
                        'status' => 'success',
                        'mess' => 'Thêm thành công ',
                        'route' => route('product_deatil_img',['product_id'=>$product_id])
                    ]);
                }
               else{
                return response()->json([
                    'status' => 'fail',
                    'errPosition' => 'all',
                    'mess' => 'Thêm thất bại',
                    'route' => ''
                ]);
               }
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'errPosition' => 'all',
                'mess' => 'Thêm thất bại -- ' . $e->getMessage(),
                'route' => ''
            ]);
        }
    }
    public function delete_img($product_id,$productImg_id)
    {
       
        $product = new productModel();
        $delete=$product->deleteImg($productImg_id);
        if($delete){
            return "<script> alert('Xóa thành công'); window.location = '" .  route('product_deatil_img',['product_id'=>$product_id]) . "';</script>";
        }
        else{
            return "<script> alert('Xóa thất bại'); window.location = '" .  route('product_deatil_img',['product_id'=>$product_id]) . "';</script>";
        }
       
    }
    public function showHome()
    {  $theloaiModel = new productModel();
        $listCategory = $theloaiModel->getListTable('tbl_category', 'category_status');
        $listPhanLoai = $theloaiModel->getListTable('tbl_phanloai', 'phanloai_status');
        $listShowed = $theloaiModel->showHome(1);
        $list_product = $theloaiModel->getList()->get();
        return view('include.main.page.product.product.showHome', compact('listCategory','listPhanLoai','list_product','listShowed'));
    }
    public function postShowHome(Request $request){
        $productModel = new productModel();
        $listProduct = $request->product_id;
        $result = $productModel->updateShowHome($listProduct);
        if($result){
            return "<script> alert('Cập nhật thành công '); window.location = '" . route('product_showHome') . "';</script>";
        }
    }
}
