@extends('layouts/main')

@section('isibody')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-signin w-100 m-auto">
          @if(session()->has('succes'))<!-- jika di sessison ada succes -->
          <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{ session('succes') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if(session()->has('loginfail'))<!-- jika di sessison ada loginfail -->
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginfail') }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         @endif
      
            <h1 class="h3 mb-4 mt-3 fw-normal text-center">Please sign in</h1>
            <form action="/login" method="POST">
               @csrf
              <div class="form-floating">
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Masukkan Username" value="{{ old('username') }}" required>
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message /*$message adalah variabel error yang menghasilkan keterangan eror dari usernama yg tidak sesuai validasi di registercontroller*/ }}
                  </div>
                  @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message /*$message adalah variabel error yang menghasilkan keterangan eror dari password yg tidak sesuai validasi di registercontroller*/ }}
                  </div>
                  @enderror
              </div>
          
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>
              <button  class="w-100 btn btn-lg btn-primary mb-2" type="submit">Login</button>
    
            </form>
            <small class="d-block text-center" >Not registered? <a href="/register">Register Now!</a></small>
          </main>
    </div>
</div>

  

@endsection