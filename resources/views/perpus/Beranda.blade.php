@extends('perpus.layouts.main')

@section('container')
<div class="row g-0">

  <div class="col-md-12 p-3">
    <h3 class="fcu2"><i class="fas fa-columns me-2 m-2"></i>Beranda</h3>
    <hr class="fcu">

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid fcu mb-5 pb-2">
      <div class="container">

        <div class="row pb-2 align-items-center">
          <div class="col-md-3 text-center">
            <img src="img/logo.png" width="200px" class="img-fluid text-center" alt="">
          </div>
          <div class="col-md-9 mt-2 border bg-light bg-gradient shadow border-light border-3 borderradius ps-3 pt-3">
            <div class="row justify-content-center">
              <div class="col-md-1">
                <h1><i class="fas fa-quote-left"></i></h1>
              </div>
              <div class="col-10">
                <h1 class="display-5 fw-bold">Halo, Selamat Datang {{ auth()->user()->nama }}</h1>
                <p class="font lead">Forum dan Perpustakaan Sinau</p>
              </div>
              <div class="col-md-1 text-end">
                <h1><i class="fas fa-quote-right"></i></h1>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- Akhir Jumbotron -->

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-4 iconinfo mt-2">
          <div class="card bg-info">
            <div class="card-body-icon">
              <i class="fas fa-users"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title">Member</h5>
              <div class="display-4 fw-bold">{{ $users }}</div>
              <a href="Perpus/Member">
                <p class="card-text">Lihat Detail <i class="fas fa-angle-double-right"></i></p>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-4 iconinfo mt-2">
          <div class="card bg-warning">
            <div class="card-body-icon">
              <i class="fas fa-stream rounded-pill"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title">Postingan</h5>
              <div class="display-4 fw-bold">{{ $posts }}</div>
              <a href="/Perpus/Timeline">
                <p class="card-text">Lihat Detail <i class="fas fa-angle-double-right"></i></p>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-4 iconinfo mt-2">
          <div class="card bg-success">
            <div class="card-body-icon">
              <i class="fas fa-book"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title">Buku</h5>
              <div class="display-4 fw-bold">{{ $books }}</div>
              <a href="/Perpus/Buku?search=&jenis=semua">
                <p class="card-text">Lihat Detail <i class="fas fa-angle-double-right"></i></p>
              </a>
            </div>
          </div>
        </div>

        <div class="progress mt-2">
          <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: {{ $Pusers }}%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{ $Pposts }}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: {{ $Pbooks }}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>


        <div class="row mb-5 mt-3">
          <div class="col" data-aos="zoom-in" data-aos-duration="2000">
            <h3 class="lead fw-bold">Buku Pelajaran</h3>
            <div class="progress" style="height: 40px;">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width:{{ round($Ppelajaran, 2) }}%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">{{ round($Ppelajaran, 2) }}%</div>
            </div>
            <h3 class="lead fw-bold pt-3">Buku Novel</h3>
            <div class="progress" style="height: 40px;">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ round($Pnovel, 2) }}%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">{{ round($Pnovel, 2) }}%</div>
            </div>
          </div>
        </div>


      </div>
      <!-- Akhir Timeline -->

    </div>
  </div>

</div>
@endsection
<!-- Akhir Halaman utama -->


<!-- modal -->


<!-- akhir modal -->