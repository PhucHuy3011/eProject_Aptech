<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:250'],
            'address' => ['required', 'string', 'max:250'],
            'birthday' => ['required', 'date',]
        ]);
        $user =  new User();
        $user->name = $request->name;
        $user->birthday = $request->birthday;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $res = $user->save();
        if ($res)
        {
            return redirect('/logins');
        }
        else
        {
            return back()->with('fail', 'Something wrong !');
        }
    }
    public function login()
    {
        return view('login');
    }
    public function loginPost(Request $request)
    {
        $request=[
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($request))
        {
            return redirect('/index')->with('success', 'Login Successfully');
        }
        return back()->with('error','Login Failed');
    }

}
