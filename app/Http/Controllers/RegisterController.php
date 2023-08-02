<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            'judul'=>'register',
            'active'=>''
        ]);
    }

    public function store(Request $request){
        $validasidata = $request->validate([
            'name'=> ['required','max:255'],
            'username'=>['required','min:4','unique:users','max:255'],
            'email'=>['required','email:dns','unique:users'],
            'password'=>['required','min:5','max:255']
        ]);
    
        $validasidata['password'] = bcrypt($validasidata['password']); //atau bisa pakai Hash:make($validsidata('password'))
        User::create($validasidata);

        $request->session()->flash/*keterangan nya error padahal ngak error*/('succes','Registrasi Berhasil Silakan Login');
        return redirect('/login');
    }
}
