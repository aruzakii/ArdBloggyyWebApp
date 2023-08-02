@extends('dasboard.layouts.main')

@section('isibody')
<div class="col-lg-8">
    <h2 class="mt-2">Create New Kategori</h2>
    <form action="/dasboard/kategori" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama"  class="form-label">Nama/Jenis</label>
          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}"> 
          @error('nama')
          <div class="invalid-feedback">
              {{ $message /*$message adalah variabel error yang menghasilkan keterangan eror dari usernama yg tidak sesuai validasi di registercontroller*/ }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug"  class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"  value="{{ old('slug') }}"> 
            @error('slug')
            <div class="invalid-feedback">
                {{ $message /*$message adalah variabel error yang menghasilkan keterangan eror dari usernama yg tidak sesuai validasi di registercontroller*/ }}
              </div>
              @enderror
          </div>

         
 
          <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar Untuk Kategori</label>
            <input class="form-control @error('gambar')  is-invalid @enderror" type="file" id="gambar" name="gambar"
            onchange="previewImage()">
            <img class="img-preview img-fluid m-2 mt-3 col-sm-5">

            @error('gambar')
            <div class="invalid-feedback">
                {{ $message /*$message adalah variabel error yang menghasilkan keterangan eror dari usernama yg tidak sesuai validasi di registercontroller*/ }}
              </div>
              @enderror
          </div>
          
           

        <button type="submit" class="btn btn-primary">Add Kategori</button>
      </form>
</div>


<script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change',function(){
        fetch('/dasboard/kategori/checkSlug?nama=' + nama.value)
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