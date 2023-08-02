@extends('dasboard.layouts.main')

@section('isibody')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
</div>

@if ($post->count())
    
<div class="container mt-4 mb-4">
  <h3 class="text-center mb-3">Your Recent Post</h3>
  <div class="row ">
      @foreach ($post as $postt)

      <div class="col-md-4 pb-2">
          <div class="card " style="border-radius: 15px" >
              <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a class="text-decoration-none text-white" href="/blog?kategori={{ $postt->kategori->slug }}">{{ $postt->kategori->nama }}</a></div>
              @if ($postt->gambar != null)
              <img src="/storage/{{ $postt->gambar }}" style="height: 260px;  overflow:hidden"  class="card-img-top" alt="...">
              @else
              <img src="https://source.unsplash.com/500x400?{{ $postt->kategori->nama }}" class="card-img-top" alt="...">
              @endif
              <div class="card-body">
                  <a class="text-decoration-none text-dark" href="/dasboard/post/{{ $postt->slug }}"><h5 class="card-title">{{ $postt->judul }}</h5></a>
                  <small> {{ $postt->created_at->diffForHumans() }}</p></small>
                  <p class="card-text">{{ $postt->excerpt }}</p>
                <a href="/dasboard/post/{{$postt->slug }}"> <button type="button" class="btn btn-primary">Read More</button></a>
              </div>
            </div>
      </div>
      @endforeach
  </div>
  <div class="mt-2 text-center">
    <a href="/dasboard/post/create" class="mt-2"><button type="button" class="btn btn-primary btn-lg">New</button></a>
    </div>
</div>

@else
<div class="mt-5 text-center">
<h3 class="text-center">You Have No Posts</h3>
<a href="/dasboard/post/create" class="mt-2"><button type="button" class="btn btn-danger btn-lg">Write Your Post</button></a>
</div>
@endif

@endsection
