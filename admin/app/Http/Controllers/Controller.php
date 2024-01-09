<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Models\statisticalModel;
use App\Models\todolistModel;
use App\classProperties\todoListReturn;
class Controller extends BaseController
{
    public function home(){
        $statisticalModel=new statisticalModel();
        $listProductTH=$statisticalModel-> getProduct1st(3,true);
        $listProduct10=$statisticalModel-> getProduct1st();
        $countPayment=$statisticalModel->getNoProcess('tbl_payment','statusPayment_id')->count();
        $countRequest_cancellation=$statisticalModel->getNoProcess('tbl_request_cancellation','request_cancellation_status')->count();
        $i=1;
        return view('include.main.home',compact('listProductTH','i','listProduct10','countPayment','countRequest_cancellation'));
    }
    public function login(){
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('login');
    }
    public function myTodolist()
    {
        $staff_id = Auth::id();
        $list = TodolistModel::where('staff_id', $staff_id)->paginate(30);
        return response()->json([
            'status' => 'success', 
            'results' => view('ohther.ajax.admin.listTodoList')->with('list_myTodo', $list)->render()
        ]);
    }

    public function updateStatusTodoList($id)
    {
        $deatil = TodolistModel::find($id);
        $status=0;
        if($deatil->todolist_status===0){
            $status=1;
        }
        $data=[
            'todolist_status' =>$status     
        ];
        $update = TodolistModel::where('todolist_id', $id)->update($data);
        $mess=$update?"Cập nhật thành công":"Cập nhật thất bại";
        return response()->json([
            'status' => 'success', 
            'mess' => $mess, 
            // 'results' => view('ohther.ajax.admin.listTodoList')->with('list_myTodo', $list)->render()
        ]);
    }

}
