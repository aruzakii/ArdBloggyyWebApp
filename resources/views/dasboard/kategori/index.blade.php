@extends('dasboard.layouts.main')

@section('isibody')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Kategori</h1>
</div>
 

<div class="table-responsive col-lg-6">

  @if(session()->has('successpost'))<!-- jika di sessison ada succes -->
  <div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('successpost') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  
  @if(session()->has('successupdate'))<!-- jika di sessison ada succes -->
  <div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('successupdate') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session()->has('successdelete'))<!-- jika di sessison ada succes -->
  <div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('successdelete') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

    <p><a class="btn btn-primary" href="/dasboard/kategori/create"><span data-feather="plus"></span> New</a></p>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">nama</th>
          <th class="text-center" scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kategoris as $kategori)
            
       
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $kategori->nama }}</td>
          <td class="text-center">
           
            <a class="badge bg-warning text-decoration-none" href="/dasboard/kategori/{{ $kategori->id }}/edit"><span data-feather="edit" class="align-text-bottom"></span></a>

            <form action="/dasboard/kategori/{{ $kategori->id }}" method="POST" class="d-inline">
              @method('DELETE')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Anda Yakin Ingin Menghapus Postingan?')" name="delete"><span data-feather="trash-2" class="align-text-bottom"></span></button>
       
           </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
