<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class AdminKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $this->authorize('admin');
        return view('dasboard.kategori.index',[
            'judul'=>'kategori admin',
            'kategoris'=>Kategori::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dasboard.kategori.create',[
         'judul'=>'Admin Edit Kategori'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasidata = $request->validate([
            'nama'=>['required','max:255','unique:kategoris'],
            'slug'=>['required','unique:kategoris'],
            'gambar'=>['image','file','max:1024']
        ]);

        if($request->file('gambar')){
            $validasidata['gambar']=$request->file('gambar')->store('img-kategori-'.$request->nama);
        }

        Kategori::create($validasidata);
        return redirect('dasboard/kategori')->with('successpost','kategori berhasi ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Kategori $kategori)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('dasboard.kategori.edit',[
            'judul'=>'admin edit kategori',
            'kategori'=>$kategori
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $rules = [
        
        ];

        if($request->nama !== $kategori->nama){
            if(strtolower($request->nama) === strtolower($kategori->nama) ){
                $rules['nama'] = ['required','max:255'];
            }
            else{
             $rules['nama'] = ['required','unique:kategoris','max:255'];
            }  
        }
        if($request->slug !== $kategori->slug){
            $rules['slug'] = ['required','unique:kategoris','max:255'];
        }

        $validasidata = $request->validate($rules);

        if($request->file('gambar')){//jika ada gambar dinputkan
            if($kategori->gambar_lama !== null){//cek apakah memiliki gambar lama
                Storage::delete($request->gambar_lama);///jika ya hapus gambar tersebut
            }
         $validasidata['gambar']=$request->file('gambar')->store('img-kategori'. $request->nama);
        }

        $kategori->update($validasidata);
        return redirect('/dasboard/kategori')->with('successupdate','data berhasil di edit');
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        if($kategori->gambar !== null){
            Storage::delete($kategori->gambar);
        }

        $kategori->destroy($kategori->id);
        return redirect('/dasboard/kategori')->with('successdelete','data berhasil di hapus');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Kategori::class, 'slug', $request->nama);
        return response()->json(['slug'=> $slug]); 
    }
}
