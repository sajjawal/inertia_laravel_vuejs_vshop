<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthCOntroller extends Controller
{
    public function showLoginForm()
    {
        return Inertia::render('Admin/auth/Login');
    }
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'isAdmin'=> true])) {
            return redirect()->route("admin.dashboard");
            # code...
        }
        return redirect()->route('admin.login')->with('error','inalid credientials');
    }
     public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
