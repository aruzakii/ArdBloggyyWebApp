@extends('layouts/main')

@section('isibody')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-register w-100 m-auto">
            
            <h1 class="h3 mb-3 fw-normal text-center mb-4 mt-3">Registrasi</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="nama" placeholder="nama" value="{{ old('nama') }}"> 
                    <label for="nama">Nama</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message /*$message adalah variabel error yang menghasilkan keterangan eror dari nama yg tidak sesuai validasi di registercontroller*/ }}
                      </div>
                      @enderror
                  </div>

                  <div class="form-floating">
                    <input type="text"  name="username" class="form-control  @error('username') is-invalid @enderror" id="username" placeholder="username" value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message /*$message adalah variabel error yang menghasilkan keterangan eror dari username yg tidak sesuai validasi di registercontroller*/ }}
                      </div>
                      @enderror
                  </div>

              <div class="form-floating">
                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message /*$message adalah variabel error yang menghasilkan keterangan eror dari email yg tidak sesuai validasi di registercontroller*/ }}
                  </div>
                  @enderror
              </div>

              <div class="form-floating">
                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="Password">
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
              <button class="w-100 btn btn-lg btn-primary mb-2" type="submit">Register</button>
    
            </form>
            <small class="d-block text-center" >Have registered? <a href="/login">Login Now!</a></small>
          </main>
    </div>
</div>

  

@endsection