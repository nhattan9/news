<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function check(AdminLoginRequest $request)
    {
        $remember = $request->has('remember-me') ? true  : false;
        $arr = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($arr, $remember)) {
            // Authentication passed...
            return redirect()->route('admin.home');
        } else {
            return redirect()->back()->with('fail','Tài khoản hoặc mất khẩu không chính xác');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}