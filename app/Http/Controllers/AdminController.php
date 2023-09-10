<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin/login');
    }

    public function showRegisterForm()
    {
        return view('admin/register');
    }

    public function register(Request $request)
    {
        $admin = Admin::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('showLoginForm'));
    }

    public function login(Request $request)
    {
//        $admin = Auth::guard('admin')->user()->name;
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return view('admin/layout/cPanel');
//            , compact('admin')
        } else {
            return redirect(route('login'));
        }
    }
}
