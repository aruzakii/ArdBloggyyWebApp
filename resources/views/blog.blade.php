
@extends('layouts/main')

@section('isibody')

<h3 class="text-center mb-2">{{ $judul }}</h3>
<div class="row"> 
  <div class="col-md-3 py-2"> 
    <a class="" href="/kategori"><button type="button" class="btn btn-danger text-white">Kategori</button></a>
  </div>
  <div class="col-md-6">
    <form action="/blog">
      @if (request('kategori'))<!--kalo ada kategori di url!-->
      <input type="hidden" name="kategori" value="{{ request('kategori') }}">
      @endif

      @if (request('author'))<!--kalo ada author di url!-->
      <input type="hidden" name="author" value="{{ request('author') }}">
      @endif


      <div class="input-group py-2">
        <input type="text" class="form-control" placeholder="Seacrch" name="cari"  aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ request('cari') }}">
        <button class="btn btn-danger" type="submit" id="button-addon2">Search</button>
      </div>
      </form>

  </div>
</div>


@if ($post->count())<!-- jika postingannya lebih dari 0/jika ada suatu postingan-->
<div class="card mt-3 mb-3 text-center " style="border-radius: 15px">
  <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a class="text-decoration-none text-white" href="/blog?kategori={{ $post[0]->kategori->slug }}">{{ $post[0]->kategori->nama }}</a></div>
    <a href="/blog/{{ $post[0]->slug }}">
      @if($post[0]->gambar)
      <div style="max-height: 400px; overflow:hidden">
        <img  src="{{ asset('storage/' . $post[0]->gambar) }}" class="card-img-top" alt="...">
      </div>
          
    @else
    <div style="max-height: 500px; overflow:hidden">
      <img   src="{{ asset('storage/' . $post[0]->kategori->gambar) }}" class="card-img-top" alt="...">
      @endif
    </div>
    </a>
    <div class="card-body">
        <a class="text-decoration-none text-dark" href="/blog/{{ $post[0]->slug }}"><h5 class="card-title">{{ $post[0]->judul }}</h5></a>
      <small><p>By <a class="text-decoration-none" href="/blog?author={{ $post[0]->user->username }}">{{ $post[0]->user->name }}</a> {{ $post[0]->updated_at->diffForHumans() }}</p></small>
      <p class="card-text">{{ $post[0]->excerpt }}</p>
      <a href="/blog/{{$post[0]->slug }}"> <button type="button" class="btn btn-primary">Read More</button></a>
      
    </div>
  </div>
      
 

<div class="container">
    <div class="row ">
        @foreach ($post->skip(1) as $postt)
    
        <div class="col-md-4 pb-2">
            <div class="card " style="border-radius: 15px" >
                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a class="text-decoration-none text-white" href="/blog?kategori={{ $postt->kategori->slug }}">{{ $postt->kategori->nama }}</a></div>
                @if ($postt->gambar != null)
                <img src="/storage/{{ $postt->gambar }}" style="max-height: 350px;  overflow:hidden"  class="card-img-top" alt="...">
                @else
                <img src="{{ $postt->kategori->gambar }}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <a class="text-decoration-none text-dark" href="/blog/{{ $postt->slug }}"><h5 class="card-title">{{ $postt->judul }}</h5></a>
                    <small><p>By <a class="text-decoration-none" href="/blog?author={{ $postt->user->username }}">{{ $postt->user->name }}</a> {{ $postt->created_at->diffForHumans() }}</p></small>
                    <p class="card-text">{{ $postt->excerpt }}</p>
                  <a href="/blog/{{$postt->slug }}"> <button type="button" class="btn btn-primary">Read More</button></a>
                </div>
              </div>

        </div>
        @endforeach
    </div>
    {{ $post->links() }}
</div>

@else 
<div>
<p class="text-center fs-4 mb-4">Not Found.</p>
</div>
@endif

@endsection


