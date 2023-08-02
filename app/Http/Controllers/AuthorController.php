<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;

class AuthorController extends Controller
{
    public function index(){
        return view('allauthor',[
            "active"=>"Author",
            'judul'=>'Author',
            'author'=>User::all()
        ]);
    }

    // public function author(User $author){
    //     return view('blog',[
    //         "active"=>"Author",
    //         'judul'=>"Author : ".$author->name,
    //         'nama'=>$author->name,
    //         'post'=>$author->post->load(['user','kategori'])
    //     ]);

    // }sudah tidak terpakai
}
