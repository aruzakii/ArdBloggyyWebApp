<header class="navbar navbar-dark sticky-top bg-danger flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/">ArdBloggy</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
    <form class="w-100 rounded-0 border-0" action="/blog" method="GET">
    <input class="form-control form-control-danger w-100 rounded-0 border-0" type="text" name="cari" placeholder="Search" aria-label="Search">
    </form>
    <div class="navbar-nav">

      
      <div class="nav-item text-nowrap">
        <form action="/logout" method="POST">
          @csrf
          <button type="submit"  class="nav-link px-3 bg-danger border-0 text-white">Logout <span class="" data-feather="log-out"></span></button>
  
        </form>
        
      </div>
    </div>
  </header>