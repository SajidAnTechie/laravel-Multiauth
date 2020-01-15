<?php

namespace App\Http\Controllers\Adminauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showloginform()
    {

        return view('admin.login');
    }

    public function Login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // if(Auth::guard('admin'->attempt($credianls))){
        //     return redirect()->intended(route('admin.dashboard'));

        // }


        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::guard('admin')->logout();


        return  redirect(route('admin.loginform'));
    }
}
