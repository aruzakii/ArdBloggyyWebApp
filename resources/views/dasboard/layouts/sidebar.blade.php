<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-stiky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ (Request::is('dasboard')) ? 'active' : '' }}" aria-current="page" href="/dasboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{  (Request::is('dasboard/post*')) ? 'active' : ''  }}" href="/dasboard/post">
            <span data-feather="file-text" class="align-text-bottom"></span>
            My Blog
          </a>
        </li>


       
      </ul>
    
   @can('admin'){{--  untuk kodingannya berada di provider/AppServiceProvider --}}
       
  
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>ADMINISTRATOR</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
        <a class="nav-link {{  (Request::is('dasboard/kategori*')) ? 'active' : ''  }}" href="/dasboard/kategori">
          <span data-feather="grid" class="align-text-bottom"></span>
          Kategori
        </a>
      </li>
      </ul>
    @endcan
    </div>
  </nav>