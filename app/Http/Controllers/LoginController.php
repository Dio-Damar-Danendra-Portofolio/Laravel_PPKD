<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password'=>'required|min:8'
        ]);

        $email = $request->email;
        $password = $request->password;
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('dashboard')->with('success', 'Success Login');
        } else {
            return back()->withErrors(['email' => 'Please check your credentials'])->withInput();
        }
    }
}
