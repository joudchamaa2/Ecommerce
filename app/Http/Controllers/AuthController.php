<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function register(){
        return view('auth.register');
    }
    function registerAction(Request $request){
        $field = $request->validate([
            'name'=>['required','string','min:3'],
            'email'=>['required','string','email','unique:users'],
            'password'=>['required','between:5,32','confirmed'],
        ]);
        $user = User::create($field);
        Auth::login($user);
        return redirect()->route('home');
    }
    function login(){
        return view('auth.login');
    }
    function loginAction(Request $request){
        $field = $request->validate([
            'email'=>['required','string','email'],
            'password'=>['required','between:5,32'],
        ]);
        if(Auth::attempt($field)){
            return redirect()->route('home');
        }
        return redirect()->back()->with('error','email or password not found');
    }
    function logout(){
        Auth::logout();
        return redirect()->route('loginPage');
    }
}
