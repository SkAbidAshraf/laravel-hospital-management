<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    public function create()
    {
        return view('admin.auth.login');
    }
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => ['approved', 'superadmin']])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withInput()->with('error', 'Login failed: Invalid email or password.');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
