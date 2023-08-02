<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use App\Models\User;

use function GuzzleHttp\Promise\all;

class PostController extends Controller{

    // public function index(Post $post){
    //     return view('blog',[
    //         "judul"=>"Blog",
    //         "post"=>$post->all()
    //     ]);
    // }

    
    public function index(Post $post){
        $judul='';
        if(request('kategori')){
            $kategori = Kategori::firstWhere('slug',request('kategori'))->nama;//cari kategori yang slug nya sama dengan request('kategori)
            $judul='All Post in ' . $kategori;
        }
         
        if(request('author')){
            $author = User::firstWhere('username',request('author'))->username;//cari kategori yang slug nya sama dengan request('kategori)
            $judul='All Post by ' . $author;
        }

        if(request('cari')){
            $judul='Results for '.request('cari');
        }

        return view('blog',[
            "active"=>"Blog",
            "judul"=>$judul,
            "post"=>Post::latest()->Filter(request(['cari','kategori','author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post){
    return view('detail',[
        "active"=>"Blog",
       "judul"=>"Blog ". $post->judul,
        "post"=>$post
    ]); 

    }

    // public function bykategori(Kategori $kategori){
    //     return view('blog',[
    //         "active"=>"Kategori",
    //         "judul"=>"Kategori : ". $kategori->nama,
    //         "post"=>$kategori->post->load(['user','kategori']),//pangil post dulu lalu sekalian load user dan kategori ini merupakan lazy eager loading
    //         "kategori"=>$kategori->nama
    //     ]);
    // }sudah tidak terpakai

    public function allkategori(Kategori $kategori){
        return view('kategorilist',[
            "active"=>"Kategori",
            "judul"=>"Kategori List",
            "kategori"=>Kategori::all()

        ]);
    }


}