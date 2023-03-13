<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/mahasiswa*') ? 'active' : '' }}" href="/dashboard/mahasiswa">
            <span data-feather="user" class="align-text-bottom"></span>
            Mahasiswa
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/buku*') ? 'active' : '' }}" href="/dashboard/buku">
              <span data-feather="book" class="align-text-bottom"></span>
              Buku
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/category*') ? 'active' : '' }}" href="/dashboard/category">
              <span data-feather="clipboard" class="align-text-bottom"></span>
              Category
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/pinjamkembali*') ? 'active' : '' }}" href="/dashboard/pinjamkembali">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Pinjam
            </a>
          </li>
      </ul>

    </div>
  </nav>