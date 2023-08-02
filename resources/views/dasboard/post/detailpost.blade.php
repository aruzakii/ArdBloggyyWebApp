@extends('dasboard.layouts.main')

@section('isibody')


  <div class="container ">
    <div class="row  my-3">
        <div class="col-lg-8">
            <h2>{{ $post->judul }}</h2>
    
            <div class="mb-3"><a href="/dasboard/post" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my posts</a>
                <a href="/dasboard/post/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
                <form action="/dasboard/post/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Postingan?')" name="delete"><span data-feather="trash-2" class="align-text-bottom"></span></button>
               
                </form>
            </div>
            @if($post->gambar != null)
            <div style="max-height: 350px;  overflow:hidden">
                <img src="{{ asset('storage/' . $post->gambar) }}" class="img-fluid" alt="...">
                

            </div>
            
          
            @else
            <img src="{{ asset($post->kategori->gambar) }}" class="img-fluid" alt="...">
            @endif
            <article class="my-3 ">{!! $post->body !!}</article>
            
            <a href="/dasboard/post"> <button type="button" class="btn btn-primary">Back</button></a>

        </div>
    </div>
</div>



@endsection
