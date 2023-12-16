<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staffModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
class accountController extends Controller
{
    protected $staffModel;

    public function __construct(StaffModel $staffModel)
    {
        $this->staffModel = $staffModel;
    }
    public function postLogin(Request $request)
    {
        $username = $request->input('staff_username');
        $password = $request->input('staff_password');
    
        $staffModel = new staffModel();
        $staff = $staffModel->checkLoginCredentials($username, $password);
    
        if ($staff) {
            Auth::login($staff, true);
    
            $minutes = 30 * 24 * 60; // 30 ngày
            $response = new Response('...');
            $response->withCookie(Cookie::make('fullname', $staff->staff_fullname, $minutes));
            $response->withCookie(Cookie::make('img', $staff->staff_linkimg, $minutes));
    
            return $response->setContent("<script>alert('Đăng nhập thành công'); window.location = '" . route('home') . "';</script>");
        } else {
            return "<script>alert('Đăng nhập thất bại'); window.location = '" . route('login') . "';</script>";
        }
    }
    
    public function logout()
    {
        $response = new Response('...');
        $response->withCookie(Cookie::forget('fullname'));
        $response->withCookie(Cookie::forget('img'));
    
        Auth::logout();
    
        return $response->setContent("<script>alert('Đăng xuất thành công'); window.location = '" . route('login') . "';</script>");
    }
    public function infro()
    {   $staff_id=Auth::id();
        $staffModel = new staffModel();
        $infroDeatil = $staffModel->getDetail($staff_id);
        $getMypemisstion = $staffModel->getMyListTable($staff_id)->get();
        return view('include.main.auth.myAccount', compact('infroDeatil','getMypemisstion'));
    }
    public function updatePass()
    {  
    
        return view('include.main.auth.update');
    }
    public function updatePassPut(Request $request){
        $staff_id=Auth::id();
        $oldpass=$request->input('oldpass');
        $newpass=$request->input('newpass');
        $anewpass=$request->input('anewpass');
        $staffModel = new staffModel();
        if($newpass!==$anewpass){
            $errorANewPasss = "Xác nhận mật khẩu không trùng với mật khẩu mới";
            session()->flash('errorANewPasss', $errorANewPasss);
            return redirect()->back();
        }else{
            $checkPass = $staffModel->checkPassword($staff_id, $oldpass);
            if($checkPass){
                $updatePass = $staffModel->updatePass($staff_id,$newpass);
                if($updatePass){
                    return " <script> alert('Đổi  thành công'); window.location = '".route('home')."';</script>";
                }else{
                    $errorUpdate = "Sai mật khẩu";
                    session()->flash('errorUpdate', $errorUpdate);
                    return redirect()->back();
                }
            }else{
                $erroroldPasss = "Sai mật khẩu";
                session()->flash('errorANewPasss', $erroroldPasss);
                return redirect()->back();
            }
        }
      
        
    }
    public function restorePassword(){
        return view('include.main.auth.restore');
    }
    public function restorePasswordPut(Request $request){
        $staff_id=Auth::id();
        $restore=$request->input('restore');
        $staffModel = new staffModel();
            $getCodeRecovery = $staffModel->deatil($staff_id)->first()->staff_codeRecovery;
            if($restore===$getCodeRecovery){
                $updaterestore = $staffModel->restorePass($staff_id,$staffModel->deatil($staff_id)->first()->staff_odlPass);
                if($updaterestore){
                    return " <script> alert('Đã khôi phục '); window.location = '".route('home')."';</script>";
                }else{
                    $errorrestore = "Sai mã khôi phục";
                    session()->flash('errorrestore', $errorrestore);
                    return redirect()->back();
                }
        }
    }
}
