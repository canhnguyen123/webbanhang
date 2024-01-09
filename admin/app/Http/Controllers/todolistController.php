<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\todolistRequest;
use Illuminate\Support\Facades\DB;
use App\Models\todolistModel;
use App\Models\notificationAdminModel;
use App\Models\staffModel;

class todolistController extends Controller
{
    private $todolistModel;
    private $notificationAdminModel;
    public function __construct(todolistModel $todolistModel,notificationAdminModel $notificationAdminModel)
    {
        $this->todolistModel = $todolistModel;
        $this->notificationAdminModel = $notificationAdminModel;
    }
    public function list()
    {
        $paginate = $this->todolistModel->getPagination()->first();
        $list_todolist = $this->todolistModel
            ->with('staff:staff_id,staff_fullname') // Chỉ chọn cột 'staff_fullname'
            ->paginate($paginate->pagination_limitDeaful);

        $check = $list_todolist->hasMorePages() ? 1 : 0;
        $i = 1;
        $category = $paginate->pagination_category;
        $nameElement = $paginate->pagination_nameElement;
        return view('include.main.todolist.lits', compact('list_todolist', 'i', 'check', 'category', 'nameElement'));
    }
    public function add()
    {
        $staffModel = new staffModel();
        $getStaff = $staffModel->getListTable('tbl_staff', 'staff_status')->get();
        return view('include.main.todolist.add', compact('getStaff'));
    }
    public function post_add(todolistRequest $request)
{
    $content = "";
    $dealine = $request->dealine;
    $mota = $request->name;
    $staff_id = intval($request->staff_id);
    try {
        DB::beginTransaction();
        $add = $this->todolistModel->add($mota, $staff_id, $dealine);
        if ($add) {
            $content = "Quản trị viên đã giao việc cho bạn";
            $this->notificationAdminModel->add($staff_id, $content);
            DB::commit();
           return "<script> alert('Thêm thành công'); window.location = '" . route('todolist.list') . "';</script>";
        } else {
            DB::rollBack();
            $errorMessage = "Thêm thất bại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
    } catch (\Exception $e) {
        DB::rollBack();
        $errorMessage = "Thêm thất bại";
        session()->flash('errorMessage', $errorMessage);
        return redirect()->back();
    }
}

    public function update($todolist_id)
    {
        $getItem = $this->todolistModel->with('staff:staff_id,staff_fullname')->find($todolist_id);
        return view('include.main.todolist.update', compact('getItem'));
    }
    public function deatil($todolist_id)
    {
        $getItem = $this->todolistModel->with('staff:staff_id,staff_fullname')->find($todolist_id);
        return view('include.main.todolist.deatil', compact('getItem'));
    }
    public function post_update(todolistRequest $request, $todolist_id)
    {
        $dealine = $request->dealine;
        $mota = $request->name;
        $staff_id = intval($request->staff_id);
        try {
            DB::beginTransaction();
            $update = $this->todolistModel->updateDB($mota, $staff_id, $dealine,$todolist_id);
            if ($update) {
                $content = "Quản trị viên đã cập nhật việc giao việc cho bạn";
                $this->notificationAdminModel->add($staff_id, $content);
                DB::commit();
               return "<script> alert('Cập nhật thành công'); window.location = '" . route('todolist.list') . "';</script>";
            } else {
                DB::rollBack();
                $errorMessage = "Sửa thất bại";
                session()->flash('errorMessage', $errorMessage);
                return redirect()->back();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $errorMessage = "Sửa thất bại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
    }
    public function toogle_status($id)
    {
        $getStatus = $this->todolistModel->getDeatil($id);
        $getStatus_now = $getStatus->todolist_status;
        if ($getStatus_now === 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $result = $this->todolistModel->status_toggle($status, $id);
        $message = ($result) ? 'Cập nhật thành công' : 'Cập nhật thất bại';

        return "<script> alert('$message'); window.location.href = '" . route('todolist.list') . "';</script>";
    }
}
