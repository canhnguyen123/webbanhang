<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\paginationRequest;
use App\Models\paginationModel;

class paginationController extends Controller
{
    public function list()
    {
        $paginationModel = new paginationModel();
        $paginate = $paginationModel->getPagination()->first(); 
        $list_pagination = DB::table('tbl_pagination')->paginate($paginate->pagination_limitDeaful); 
        $check = $list_pagination->hasMorePages() ? 1 : 0;
        $i = 1;
        $category=$paginate->pagination_category;
        $nameElement=$paginate->pagination_nameElement;
        return view('include.main.page.setting.pagination.lits', compact('list_pagination', 'i', 'check','category','nameElement'));
    }
    public function add()
    {
        $paginationModel = new paginationModel();
        $pagination_Item = $paginationModel->getTable();
        return view('include.main.page.setting.pagination.add', compact('pagination_Item'));
    }
    public function post_add(paginationRequest $request)
    {
        $tbl = $request->pagination_tbl;
        $name = $request->pagination_name;
        $primaryKey = $request->pagination_primaryKey;
        $nameElement = $request->pagination_nameElement;
        $limitDeaful = $request->pagination_limitDeaful;
        $limitAcction = $request->pagination_limitAcction;
        $category = $request->pagination_category;
        $pagination = new paginationModel();
        $check = $pagination->checkDatabase($tbl);
        if ($check) {
            $errorMessage = "Tên bảng";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        } else {
            $add = $pagination->addpagination($tbl, $name, $primaryKey, $nameElement, $limitDeaful,$limitAcction,$category);
            if ($add) {
                return " <script> alert('Thêm thành công'); window.location = '" . route('pagination.list') . "';</script>";
            } else {
                return " <script> alert('Thêm thất bại'); window.location = '" . route('pagination.add') . "';</script>";
            }
        }
    }
    public function update($pagination_id)
    {
        $paginationModel = new paginationModel();
        $pagination_Group = $paginationModel->getTable();
        $item_pagination = $paginationModel->getDeatil($pagination_id)->get();

        return view('include.main.page.setting.pagination.update', compact('item_pagination','pagination_Group'));
    }
    public function deatil($pagination_id)
    {
        $paginationModel = new paginationModel();
        $item_pagination = $paginationModel->getDeatil($pagination_id)->get();

        return view('include.main.page.setting.pagination.deatil', compact('item_pagination'));
    }
    public function post_update(paginationRequest $request, $pagination_id)
    {
       
        $tbl = $request->pagination_tbl;
        $name = $request->pagination_name;
        $primaryKey = $request->pagination_primaryKey;
        $nameElement = $request->pagination_nameElement;
        $limitDeaful = $request->pagination_limitDeaful;
        $limitAcction = $request->pagination_limitAcction;
        $category = $request->pagination_category;
        $pagination = new paginationModel();
        $check = $pagination->checkDatabaseIs($tbl,$pagination_id);
        if ($check) {
            $errorMessage = "Tên bảng";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        } else {
            $add = $pagination->updatepagination($tbl, $name, $primaryKey, $nameElement, $limitDeaful, $limitAcction, $category,$pagination_id);
            if ($add) {
                return " <script> alert('Cập nhật thành công'); window.location = '" . route('pagination.list') . "';</script>";
            } else {
                return " <script> alert('Cập nhật thất bại'); window.location = '" . route('pagination.update',['pagination_id'=>$pagination_id]) . "';</script>";
            }
        }
    }
    public function toogle_status($pagination_id, $pagination_status)
    {
        $pagination = new paginationModel();
        $product = $pagination->getDeatil($pagination_id)->first();
        $status = 0;
        if ($product->pagination_status == 1) {
            if ($pagination_status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
        }
        if ($product->pagination_status == 0) {
            if ($pagination_status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
        }

        $pagination->status_toggle($status, $pagination_id);
        return " <script> alert('Cập nhật thành công'); window.location = '" . route('pagination.list') . "';</script>";
    }
}
