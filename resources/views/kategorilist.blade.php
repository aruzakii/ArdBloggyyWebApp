
@extends('layouts/main')

@section('isibody')
<h4 class="p-2 p-l-4">Kategori List</h4>

  <div class="container">
    <div class="row">
        @foreach ($kategori as $kategori)
        <div class="col-md-4">
            <a href="/blog?kategori={{ $kategori->slug }}">
              <div class="card bg-dark text-white mb-3">
              @if($kategori->gambar !==  null)
              <img src="/storage/{{ $kategori->gambar }}" style="height: 277px" class="card-img" alt="...">
              
                @else
                <img src="https://source.unsplash.com/500x400?{{ $kategori->nama }}" class="card-img" alt="...">
                @endif
              <div class="card-img-overlay d-flex align-items-center p-0">
                <h5 class="card-title p-4 text-center flex-fill" style="background-color: rgba(0, 0, 0, 0.7)"><a class="text-decoration-none text-white fs-3"  href="/blog?kategori={{ $kategori->slug }}">{{ $kategori->nama }}</h5>
              </div>
              </div> 
              </a>  
        </div>
        @endforeach
    </div>
</div>

@endsection
