<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container">
    <a class="navbar-brand" href="/">ArdBloggy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ ($active ==="Home") ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  {{ ($active ==="Author") ? 'active' : '' }}" href="/author">Author</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  {{ ($active ==="Blog") ? 'active' : '' }}" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  {{ ($active ==="Kategori") ? 'active' : '' }}" href="/kategori">Kategori</a>
        </li>
        <li class="nav-item dropdown">
         
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
        </li>

        <form class="d-flex" action="/blog">
          @if(request('kategori'))
          <input type="hidden" name="kategori" value="{{ request('kategori') }}">
          @endif
  
          @if(request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
  
          @endif
        </form>
      </ul>
     
      <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back,{{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dasboard"><i class="bi bi-layout-text-window-reverse"></i> My Dasboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-left"></i> Logout</button>
        
              </form>
            </li>
          </ul>
        </li>
        @endauth
        
        @guest
        <li class="nav-item"><a class="text-white text-decoration-none" href="/login"><i  class="bi bi-box-arrow-in-left"></i> Login</a></li>
        @endguest

      </ul>
    </div>
  </div>
</nav>