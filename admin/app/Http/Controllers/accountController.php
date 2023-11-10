<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staffModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

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
            // Auth::loginUsingId(3);
            Auth::user()->id = $staff->staff_id;
            $request->session()->put('fullname', $staff->staff_fullname);
            $request->session()->put('img', $staff->staff_linkimg);
            $request->session()->put('expire_time', now()->addDays(30));
            return "<script>alert('Đăng nhập thành công'); window.location = '" . route('home') . "';</script>";
        } else {
            return "<script>alert('Đăng nhập thất bại'); window.location = '" . route('login') . "';</script>";
        }
    }
    public function logout()
    {
        Auth::logout();
        return "<script>alert('Đăng xuất thành công'); window.location = '" . route('login') . "';</script>";
    }
    public function infro($user_id)
    {
        $staffModel = new staffModel();
        $infroDeatil = $staffModel->getDetail($user_id);
        return view('include.main.page.banner.lits', compact('infroDeatil'));
    }
}
