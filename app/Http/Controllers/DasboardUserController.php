<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Str;
class DasboardUserController extends Controller
{
    /**
     * Display a listing of the resource./menampilkan list sumberdaya
     */
    public function index()
    {
        return view('dasboard.post.index',[
           'judul'=>'my post',
           'post'=>Post::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource. / menampilkan form untuk create data
     */
    public function create()
    {
        return view('dasboard.post.create',[
            'judul'=>'add post',
            'kategori'=>Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       

        $validasidata =  $request->validate([
            'judul'=>['required','max:255'],
            'slug'=>['required','unique:posts'],
            'kategori_id'=>['required'],
            'gambar'=>['image','file','max:1024'],
            'body'=>['required']
        ]);
 
        if($request->file('gambar')){//jika gambaar yang di upload tidak kosong 
            $validasidata['gambar']=$request->file('gambar')->store('img-post-'.auth()->user()->username);
        }
        $validasidata['user_id']=auth()->user()->id;
        $validasidata['excerpt']=Str::limit(strip_tags($request->body, 200));

        Post::create($validasidata);
        return redirect('/dasboard/post')->with('successpost','Postingan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource./menampilkan detail data postingan
     */
    public function show(Post $post)
    {
        return view('dasboard.post.detailpost',[
            'post'=>$post,
            'judul'=>$post->judul

        ]);
    }

    /**
     * Show the form for editing the specified resource./tampilan form untuk mengedit
     */
    public function edit(Post $post) 
    {
        return view('dasboard.post.edit',[
            'judul'=>'edit post',
            'kategori'=>Kategori::all(),
            'oldvalue'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage./untuk memperbarui data
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'judul'=>['required','max:255'],
            'kategori_id'=>['required'],
            'body'=>['required']
        ];

        if($request->slug != $post->slug){//jika slug yang diperbarui baru/tidak sama dengan yang lama maka akan dilakuka validasi
            $rules['slug']=['required','unique:posts'];
        }

        $validasidata=$request->validate($rules);

        if($request->file('gambar')){//jika ada gambar yang diinputkan
            if($request->gambar_lama != null){//jika mempunya gambar lama
                FacadesStorage::delete($request->gambar_lama);
            }
            $validasidata['gambar'] = $request->file('gambar')->store('img-post-' . auth()->user()->username);
        }
        $validasidata['user_id']=auth()->user()->id;
        $validasidata['excerpt']=Str::limit(strip_tags($request->body, 200));
      

        $post->update($validasidata);

        return redirect('/dasboard/post/'.$post->slug.'/edit')->with('successedit','Postingan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->gambar != null){
        FacadesStorage::delete($post->gambar);
        }
        $post->destroy($post->id);
        return redirect('/dasboard/post')->with('successdelete','Postingan Berhasil Dihapus');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->judul);
        return response()->json(['slug'=> $slug]); 
    }
}
