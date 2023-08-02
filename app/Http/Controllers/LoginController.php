<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index',[
            'judul'=>'login',
            'active'=>''
        ]);
    }

    public function loginauth(Request $request){
        $validasi = $request->validate([
            'username'=>['required'],
            'password'=>['required']

        ]);

        if(Auth::attempt($validasi)){
            $request->session()->regenerate();//untuk keaamanan mencegah teknik hacking pura-pura mengunakan sesion yang sama
             return redirect()->intended('/dasboard')->with('succeslog','Login Berhasil, Selamat Datang');

        }
        return back()->with('loginfail','Gagal Login');

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }
}
