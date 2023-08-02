@extends('dasboard.layouts.main')

@section('isibody')
<div class="col-lg-8">
  
  @if(session()->has('successedit'))<!-- jika di sessison ada succes -->
  <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
     {{ session('successedit') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

 <h2 class=" my-3"><a href="/dasboard/post" class=" btn btn-success mt-0"><span data-feather="arrow-left"></span></a> Edit Post</h2>
    <form action="/dasboard/post/{{ $oldvalue->slug }}" method="post" class="mb-5" enctype="multipart/form-data">
      @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="judul"  class="form-label">Judul</label>
          <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{ old('judul',$oldvalue->judul) }}"> 
          @error('judul')
          <div class="invalid-feedback">
              {{ $message /*$message adalah variabel error yang menghasilkan keterangan eror dari usernama yg tidak sesuai validasi di registercontroller*/ }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug"  class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"  value="{{old('slug',$oldvalue->slug) }}"> 
            @error('slug')
            <div class="invalid-feedback">
                {{ $message /*$message adalah variabel error yang menghasilkan keterangan eror dari usernama yg tidak sesuai validasi di registercontroller*/ }}
              </div>
              @enderror
          </div>

          <div class="mb-3">
            <label for="kategori"  class="form-label">Kategori</label>
            <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id">
              @foreach ($kategori as $kateg)
              @if (old('kategori_id',$oldvalue->kategori->id) == $kateg->id)
              <option value="{{ $kateg->id }}" selected>{{ $kateg->nama }}</option>
              @else
              <option value="{{ $kateg->id }}">{{ $kateg->nama }}</option>
              @endif
             
              @endforeach
            </select>
            @error('kategori_id')
            <div class="invalid-feedback">
                {{ $message /*$message adalah variabel error yang menghasilkan keterangan eror dari usernama yg tidak sesuai validasi di registercontroller*/ }}
              </div>
              @enderror
          </div>


          <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar Postingan</label>
            <input type="hidden" name="gambar_lama" value="{{ $oldvalue->gambar }}">
            <input class="form-control @error('gambar')  is-invalid @enderror" type="file" id="gambar"
             name="gambar" onchange="previewImage()">
             @if ($oldvalue->gambar != null)
             <img src="/storage/{{ $oldvalue->gambar }}" class="img-fluid img-preview m-2 mt-3 col-sm-5" alt="">
                 
             @else
            <img class="img-fluid img-preview m-2 mt-3 col-sm-5" alt="">
            @endif
          </div>

          <div class="mb-3">
            <label for="body"  class="form-label">Konten</label>
            <input  id="body" type="hidden" name="body" value="{{ old('body',$oldvalue->body) }}">
            <trix-editor class="@error('kategori_id') is-invalid @enderror" input="body"></trix-editor>
            @error('body')
            <div class="id-feedback text-danger">
                {{ $message /*$message adalah variabel error yang menghasilkan keterangan eror dari usernama yg tidak sesuai validasi di registercontroller*/ }}
              </div>
              @enderror
          </div>

        <button type="submit" class="btn btn-primary">Save</button>
      </form>
</div>


<script>
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    judul.addEventListener('change',function(){
        fetch('/dasboard/post/checkSlug?judul=' + judul.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)

    });


    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    });

    function previewImage(){
    const gambar = document.querySelector('#gambar');
    const gambarPreview = document.querySelector('.img-preview');

    gambarPreview.style.display= 'block';

    const oFReader = new FileReader();

    oFReader.readAsDataURL(gambar.files[0]);

    oFReader.onload = function(oFREvent){
      gambarPreview.src = oFREvent.target.result;
    }
     }
</script>
@endsection