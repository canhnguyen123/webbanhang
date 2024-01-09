<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\theloaiModel;

class theloaiController extends Controller
{   
    private $theloaiModel;

    public function __construct(theloaiModel $theloaiModel)
    {
        $this->theloaiModel = $theloaiModel;
    }
    public function list()
    {
        $theloaiModel = new theloaiModel();
        $paginate = $theloaiModel->getPagination()->first();
        $list_theloai = $theloaiModel->getTheLoai()->paginate($paginate->pagination_limitDeaful);
        $check = $list_theloai->hasMorePages() ? 1 : 0;
        $listCategory = $theloaiModel->getListTable('tbl_category', 'category_status');
        $listPhanLoai = $theloaiModel->getListTable('tbl_phanloai', 'phanloai_status');
        $i = 1;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.page.product.theloai.lits', compact('list_theloai', 'i', 'check','listCategory','listPhanLoai','category','nameElement'));
    }
    public function add()
    {
        $listCategory = $this->theloaiModel->getListTable('tbl_category', 'category_status');
        $listPhanLoai = $this->theloaiModel->getListTable('tbl_phanloai', 'phanloai_status');
        return view('include.main.page.product.theloai.add', compact('listCategory', 'listPhanLoai'));
    }
    public function post_add(Request $request)
    {
        $nametheloai = $request->nametheloai;
        $theloaiCode = $request->theloaiCode;
        $category_id = $request->category_id;
        $phanloai_id = $request->phanloai_id;
        $linkImg = $request->linkImg;
        $check = $this->theloaiModel->checkDatabase($theloaiCode);
        if ($check) {
            return response()->json([
                'status'=>'fail',
                'message' => 'Mã thể loại đã tồn tại'
            ]);  
        } else {
            $add = $this->theloaiModel->add($nametheloai, $theloaiCode,$category_id,$phanloai_id,$linkImg);
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
    public function update($id)
    {  
        $item_theloai =$this->theloaiModel->getDeatil($id);
        $listCategory = $this->theloaiModel->getListTable('tbl_category', 'category_status');
        $listPhanLoai = $this->theloaiModel->getListTable('tbl_phanloai', 'phanloai_status');
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
        $check = $theloai->checkDatabase($theloaiCode,$theloai_id);
        if ($check) {
            $errorMessage = "Mã thể loại đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        } else {
            $update = $theloai->updatetheloai($nametheloai, $theloaiCode,$category_id,$phanloai_id,$linkImg,$theloai_id);
           if ($update) {
                return response()->json([
                    'status'=>'success',
                    'message' => 'Cập nhât thành công',
                    'redirect' => route('theloai_list')
                ]);
            } else {
                return response()->json([
                    'status'=>'fail',
                    'message' => 'Cập nhật thất bại',
                    'redirect' => route('theloai_list')
                ]);           
            }
        }
    }
    public function toogle_status($id)
    {
        $getStatus=$this->theloaiModel->getDeatil($id);
        
        $getStatus_now=$getStatus->theloai_status;
        if($getStatus_now===1){
            $status=0;
        }else{
            $status=1;
        }
        $result = $this->theloaiModel->status_toggle($status,$id);
        $message = ($result) ? 'Cập nhật thành công' : 'Cập nhật thất bại';
    
        return "<script> alert('$message'); window.location.href = '" . route('theloai_list') . "';</script>";
    }
    public function showHome()
    {  $theloaiModel = new theloaiModel();
    
        $listShowed = $theloaiModel->showHome(1);
        $list_theloai = $theloaiModel->getTheLoai()->get();
        return view('include.main.page.product.theloai.showHome', compact('list_theloai','listShowed'));
    }
    public function postShowHome(Request $request){
        $listTheLoai = $request->theloai_id;
        $result = $this->theloaiModel->updateShowHome($listTheLoai);
        if($result){
            return "<script> alert('Cập nhật thành công '); window.location = '" . route('theloai_showHome') . "';</script>";
        }
    }
    
    public function checkedHome()
    {  $theloaiModel = new theloaiModel();
     
        $listChecked = $theloaiModel->checkedHome(1);
        $list_theloai = $theloaiModel->getTheLoai()->get();
        return view('include.main.page.product.theloai.checkedHome', compact('list_theloai','listChecked'));
    }
    public function checkedShowHome(Request $request){
        $listTheLoai = $request->theloai_id;
        $result = $this->theloaiModel->updateCheckHome($listTheLoai);
        if($result){
            return "<script> alert('Cập nhật thành công '); window.location = '" . route('theloai_checked') . "';</script>";
        }
    }
}
