<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function logon()
    {
        return view('admin/login/index');
    }
    public function postlogon(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role'=>1]))
        {
            return redirect('admin/index');
        }
        else if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role'=>0]))
        {
            return redirect('index');
        }
    }
    public function signOut()
    {
        Auth::logout();
        return redirect()->route('admin.logon');
    }
}
