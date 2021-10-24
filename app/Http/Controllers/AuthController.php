<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index()
    {
        $pageInfo = [
            "title"=>"Login",
            "route"=>"auth/login"
        ];
        
        return view('auth.create',compact('pageInfo'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            //Session::put('name', $request->email);
            //dd(Auth::user());
            return redirect()->intended('/')
                        ->withSuccess('Signed in');

        }
        return redirect("auth")->withSuccess('Login details are not valid');
    }

    public function logout() 
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}
