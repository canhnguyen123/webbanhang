<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\theloaiModel;

class theloaiController extends Controller
{
    public function list()
    {
        $theloaiModel = new theloaiModel();
        $list_theloai = $theloaiModel->getList()->paginate(15);
        $check = $list_theloai->hasMorePages() ? 1 : 0;
        $listCategory = $theloaiModel->getListTable('tbl_category', 'category_status');
        $listPhanLoai = $theloaiModel->getListTable('tbl_phanloai', 'phanloai_status');
        $i = 1;
        return view('include.main.page.product.theloai.lits', compact('list_theloai', 'i', 'check','listCategory','listPhanLoai'));
    }
    public function add()
    {
        $theloaiModel = new theloaiModel();
        $listCategory = $theloaiModel->getListTable('tbl_category', 'category_status');
        $listPhanLoai = $theloaiModel->getListTable('tbl_phanloai', 'phanloai_status');
        return view('include.main.page.product.theloai.add', compact('listCategory', 'listPhanLoai'));
    }
    public function post_add(Request $request)
    {
        $nametheloai = $request->nametheloai;
        $theloaiCode = $request->theloaiCode;
        $category_id = $request->category_id;
        $phanloai_id = $request->phanloai_id;
        $linkImg = $request->linkImg;

        $theloai = new theloaiModel();
        $check = $theloai->checkDatabase($theloaiCode);
        if ($check) {
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        } else {
            $add = $theloai->addtheloai($nametheloai, $theloaiCode,$category_id,$phanloai_id,$linkImg);
            if ($add) {
                return response()->json([
                    'status'=>'success',
                    'message' => 'Thêm thành công',
                    'redirect' => route('theloai_list')
                ]);
            } else {
                return response()->json([
                    'status'=>'fail',
                    'message' => 'Thêm thất bại',
                    'redirect' => route('theloai_list')
                ]);            }
        }
    }
    public function update($theloai_id)
    {  $theloaiModel = new theloaiModel();
        $item_theloai = DB::table('tbl_theloai')
        ->join('tbl_category', 'tbl_theloai.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_phanloai', 'tbl_theloai.phanloai_id', '=', 'tbl_phanloai.phanloai_id')
        ->select('tbl_theloai.*', 'tbl_category.category_name', 'tbl_phanloai.phanloai_name')
        ->where('tbl_theloai.theloai_id', $theloai_id)->get();
        $listCategory = $theloaiModel->getListTable('tbl_category', 'category_status');
        $listPhanLoai = $theloaiModel->getListTable('tbl_phanloai', 'phanloai_status');
        return view('include.main.page.product.theloai.update', compact('item_theloai','listCategory','listPhanLoai'));
    }
    public function post_update(Request $request, $theloai_id)
    {
        $nametheloai = $request->nametheloai;
        $theloaiCode = $request->theloaiCode;
        $category_id = $request->category_id;
        $phanloai_id = $request->phanloai_id;
        $linkImg = $request->linkImg;

        $theloai = new theloaiModel();
        $check = $theloai->checkDatabaseIs($theloaiCode,$theloai_id);
        if ($check) {
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        } else {
            $update = $theloai->updatetheloai($nametheloai, $theloaiCode,$category_id,$phanloai_id,$linkImg,$theloai_id);
           // if ($update) {
                return response()->json([
                    'status'=>'success',
                    'message' => 'Cập nhât thành công',
                    'redirect' => route('theloai_list')
                ]);
            // } else {
            //     return response()->json([
            //         'status'=>'fail',
            //         'message' => 'Cập nhật thất bại',
            //         'redirect' => route('theloai_list')
            //     ]);           
            // }
        }
    }
    public function toogle_status($theloai_id, $theloai_status)
    {
        $theloai = new theloaiModel();
        $product = DB::table('tbl_theloai')->where('theloai_id', $theloai_id)->first();
        $status = 0;
        if ($product->theloai_status == 1) {
            if ($theloai_status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
        }
        if ($product->theloai_status == 0) {
            if ($theloai_status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
        }

        $theloai->status_toggle($status, $theloai_id);
        return " <script> alert('Cập nhật thành công'); window.location = '" . route('theloai_list') . "';</script>";
    }
    public function showHome()
    {  $theloaiModel = new theloaiModel();
    
        $listShowed = $theloaiModel->showHome(1);
        $list_theloai = $theloaiModel->getList()->get();
        return view('include.main.page.product.theloai.showHome', compact('list_theloai','listShowed'));
    }
    public function postShowHome(Request $request){
        $theloaiModel = new theloaiModel();
        $listTheLoai = $request->theloai_id;
        $result = $theloaiModel->updateShowHome($listTheLoai);
        if($result){
            return "<script> alert('Cập nhật thành công '); window.location = '" . route('theloai_showHome') . "';</script>";
        }
    }
    
    public function checkedHome()
    {  $theloaiModel = new theloaiModel();
     
        $listChecked = $theloaiModel->checkedHome(1);
        $list_theloai = $theloaiModel->getList()->get();
        return view('include.main.page.product.theloai.checkedHome', compact('list_theloai','listChecked'));
    }
    public function checkedShowHome(Request $request){
        $theloaiModel = new theloaiModel();
        $listTheLoai = $request->theloai_id;
        $result = $theloaiModel->updateCheckHome($listTheLoai);
        if($result){
            return "<script> alert('Cập nhật thành công '); window.location = '" . route('theloai_checked') . "';</script>";
        }
    }
}
