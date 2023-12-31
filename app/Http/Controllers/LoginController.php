<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('guest.login', [
            "title" => "Login"
        ]);
    }

    public function login(Request $request){
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            if(Auth::user()->role === "seller"){
                return redirect()->intended("/dashboard"); //seller.dashboard
            } if(Auth::user()->role === "buyer"){
                return redirect()->intended("/");
            }
        }
        return back()   ->with("loginError", "Login gagal!");
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");   
    }
}
