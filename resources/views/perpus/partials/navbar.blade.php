<nav class="navbar navbar-expand-lg navbar-dark bg2 fixed-top shadow">
  <div class="container-fluid px-lg-5">
    <a class="navbar-brand " href="#">
      <img src="../../img/sinau.png" class="rounded-circle" width="50" alt="logosinau">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto fw-bold">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('Perpus') ? 'aktif' : '' }} text-white" aria-current="page" href="/Perpus">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('Perpus/Timeline') ? 'aktif' : '' }} text-white" aria-current="page" href="/Perpus/Timeline">Timeline</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('Perpus/BukuSaya') ? 'aktif' : '' }} text-white" href="/Perpus/BukuSaya?search=&jenis=semua">Buku saya</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('Perpus/Buku') ? 'aktif' : '' }} text-white" href="/Perpus/Buku?search=&jenis=semua">Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('Perpus/Member') ? 'aktif' : '' }} text-white" href="/Perpus/Member">Member</a>
        </li>
      </ul>

      <!-- profil -->
      <ul class="navbar-nav">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="/storage/{{ auth()->user()->foto }}" class="rounded-circle img-thumbnail" style="width: 45px; height:45px;" alt="">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#profil">Profil</a></li>
            <form action="/logout" method="post">
              @csrf
              <li><button class="dropdown-item" >Logout</button></li>
            </form>
          </ul>
        </li>

      </ul>
      <!-- akhir profil -->

    </div>
  </div>
</nav>