<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function register()
    {

    }
    
    public function login()
    {
        return view('auth.login');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $dataLogin = ['email' => $email, 'password' => $password];

        if(Auth::attempt($dataLogin)) {
           return redirect('/student');
        }   

        return redirect()->back()->with("error", "Gagal login"); 
    }

    public function logout()
    {

    }

}
