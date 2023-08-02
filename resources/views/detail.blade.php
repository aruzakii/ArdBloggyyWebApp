@extends('layouts.main')

@section('isibody')

    <div class="container ">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <h2>{{ $post->judul }}</h2>
                <h3>{{ $post->author }}</h3>
        
                <p>By <a class="text-decoration-none" href="/blog?author={{ $post->user->username }}">{{ $post->user->name }}</a> in <a class="text-decoration-none" href="/blog?kategori={{ $post->kategori->slug }}">{{ $post->kategori->nama }}</a></p>
                @if ($post->gambar != null)
                <img src="/storage/{{ $post->gambar }}" style="max-height: 350px; overflow:hidden" class="img-fluid" alt="...">
                @else
                
                <img src="/storage/{{ $post->kategori->gambar }}" class="img-fluid" alt="...">
                @endif
                <article class="my-3 ">{!! $post->body !!}</article>
                
                <a href="./"> <button type="button" class="btn btn-primary">Back</button></a>

            </div>
        </div>
    </div>

@endsection