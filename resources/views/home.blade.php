<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/home.css">
    <script src="/js/jquery.js"></script>

    <title>Halaman {{ $judul }}</title>
  </head>
  <body>
    @include('partials.navbar')

    
    <div class="container-fluid banner">
      <div class="container text-center">
          <h4 class="bold display-6 selamat-datang" style="display: none;">Selamat Datang di ArdBloggy</h4>
          <h3 class="bold display-4"><span style="color:  #dc3545; display: none;" id="jaskun">Let's</span><span id="com" style="display: none;"> Write</span></h3>
          <a href="#layanan">
              <a href="/dasboard"><button type="button" class="btn btn-danger btn-lg">Write Your Blog</button></a>
          </a>
      </div>
    </div>



    @if ($post->count())<!-- jika postingannya lebih dari 0/jika ada suatu postingan-->
    <div class="container mt-2">
      <h1 class="text-center mt-5">Newest Post</h1>
    <div class="card mt-3 mb-3 text-center " style="border-radius: 15px">
      <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a class="text-decoration-none text-white" href="/blog?kategori={{ $post[0]->kategori->slug }}">{{ $post[0]->kategori->nama }}</a></div>
        <a href="/blog/{{ $post[0]->slug }}">
          @if($post[0]->gambar)
          <div style="max-height: 400px; overflow:hidden">
            <img src="{{ asset('/storage/' . $post[0]->gambar) }}" class="card-img-top" alt="...">
          </div>
              
        @else
          <img   src="{{asset($post[0]->kategori->gambar) }}" class="card-img-top" alt="...">
          @endif
        </a>
        <div class="card-body">
            <a class="text-decoration-none text-dark" href="/blog/{{ $post[0]->slug }}"><h5 class="card-title">{{ $post[0]->judul }}</h5></a>
          <small><p>By <a class="text-decoration-none" href="/blog?author={{ $post[0]->user->username }}">{{ $post[0]->user->name }}</a> {{ $post[0]->updated_at->diffForHumans() }}</p></small>
          <p class="card-text">{{ $post[0]->excerpt }}</p>
          <a href="/blog/{{$post[0]->slug }}"> <button type="button" class="btn btn-primary">Read More</button></a>
          
        </div>
      </div>
    </div>
          
     
    
    <div class="container mt-4">
        <div class="row ">
            @foreach ($post->skip(1) as $postt)
        
            <div class="col-md-4 pb-2">
                <div class="card " style="border-radius: 15px" >
                    <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a class="text-decoration-none text-white" href="/blog?kategori={{ $postt->kategori->slug }}">{{ $postt->kategori->nama }}</a></div>
                    @if ($postt->gambar != null)
                    <img src="/storage/{{ $postt->gambar }}" style="max-height: 350px;  overflow:hidden"  class="card-img-top" alt="...">
                    @else
                    <img src="{{asset($postt->kategori->gambar) }}" class="card-img-top" alt="...">
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
        <div class="text-center mt-3">
        <a  href="/blog"><button type="button" class="btn btn-primary">Go To More Post  <i class="fa-solid fa-arrow-right"></i></button></a>
        </div>
    </div>
    
    @else <p class="text-center fs-4">Not Found.</p>
    @endif



   @include('partials.footer')
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="/js/home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
   
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     --}}

  </body>
</html>