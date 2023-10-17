<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\bannerRequest;
use Illuminate\Support\Facades\DB;
use App\Models\bannerModel;
class bannerController extends Controller
{
    public function list(){
        $bannerModel = new bannerModel();
        $list_banner = $bannerModel->paginate(5); 
        $check = $list_banner->hasMorePages() ? 1 : 0;
        $i = 1;
        return view('include.main.page.banner.lits', compact('list_banner', 'i', 'check'));
    }
public function add(){
    return view('include.main.page.banner.add');
}
public function post_add(Request $request){
    $name=$request->namebanner;
    $link=$request->linkImg;
    
    $banner= new bannerModel();
   
        $add= $banner->addbanner($name,$link);
        if($add){
            return response()->json([
                'status'=>'success',
                'message' => 'Thêm thành công',
                'redirect' => route('banner_list')
            ]);
        }else{
            return response()->json([
                'status'=>'fail',
                'message' => 'Thêm thất bại',
                'redirect' => route('banner_list')
            ]);
        }
    
  
}
public function update($banner_id){
    $item_banner = DB::table('tbl_banner')->where('banner_id',$banner_id)->get();
     
    return view('include.main.page.banner.update',compact('item_banner'));
}
public function post_update(Request $request,$banner_id){
    $name=$request->namebanner;
    $link=$request->linkImg;
    $banner= new bannerModel();

  
        $update= $banner->updatebanner($name,$link,$banner_id);
        if($update){
            return response()->json([
                'status'=>'success',
                'message' => 'Cập nhật thành công',
                'redirect' => route('banner_list')
            ]);
        }else{
            return response()->json([
                'status'=>'fail',
                'message' => 'Thêm thất bại',
                'redirect' => ''
            ]);
        }
}
public function toogle_status($banner_id,$banner_status){
    $banner= new bannerModel();
    $product=DB::table('tbl_banner')->where('banner_id',$banner_id)->first();
    $status=0;
    if($product->banner_status==1){
        if($banner_status==0){
            $status=1;
        }else{
            $status=0;
        }
    }
     if ($product->banner_status == 0) {
        if($banner_status==1){
            $status=0;
        }else{
            $status=1;
        }
    }
  
   $banner->status_toggle($status,$banner_id);
    return " <script> alert('Cập nhật thành công'); window.location = '".route('banner_list')."';</script>";
}

public function delete($banner_id){
    $banner= new bannerModel();
    $delete=$banner->deletebanner($banner_id);
   if($delete){
    return " <script> alert('Xóathành công'); window.location = '".route('banner_list')."';</script>";
   }else{
    return " <script> alert('Xóa thất bại'); window.location = '".route('banner_list')."';</script>";
   }
}
}
