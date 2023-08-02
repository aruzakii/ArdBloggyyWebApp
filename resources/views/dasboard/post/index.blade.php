@extends('dasboard.layouts.main')

@section('isibody')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Post</h1>
</div>
 

<div class="table-responsive col-lg-8">

  @if(session()->has('successpost'))<!-- jika di sessison ada succes -->
  <div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('successpost') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session()->has('successdelete'))<!-- jika di sessison ada succes -->
  <div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('successdelete') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

    <p><a class="btn btn-primary" href="/dasboard/post/create"><span data-feather="plus"></span> New</a></p>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($post as $mpost)
            
       
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $mpost->judul }}</td>
          <td>{{ $mpost->kategori->nama }}</td>
          <td>
            <a href="/dasboard/post/{{ $mpost->slug }}" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>
           
            <a class="badge bg-warning text-decoration-none" href="/dasboard/post/{{ $mpost->slug }}/edit"><span data-feather="edit" class="align-text-bottom"></span></a>

            <form action="/dasboard/post/{{ $mpost->slug }}" method="POST" class="d-inline">
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
