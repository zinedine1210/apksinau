<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- MY CSS -->
  <link rel="stylesheet" href="../style.css">

  <!-- favicon -->
  <link rel="shortcut icon" href="../img/logo.png">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <title>Sinau</title>
</head>

<body class="body">
  <!-- navbar -->
  @include('perpus.partials.navbar')
  <!-- akhir navbar -->

  <!-- random -->
  <section class="random pb-5 mb-4">
    <h1></h1>
  </section>
  <!-- random -->

  <!-- Halaman utama -->
  <div class="container-fluid">
    <div class="row g-0">

      <div class="col-md-12 p-3">
        <h3 class="fcu2"><i class="fas fa-columns me-2 m-2"></i>Timeline</h3>
        <hr class="fcu">

        <!-- Timeline -->
        <section id="postingan">

          <!-- Kepala Timeline -->
          <div class="row">
            <div class="col-md">
              <div class="card shadow-lg borderradius kplTimeline">
                <div class="card-header fw-bold pt-4 pb-4 text-white display-6" style="background-color: #35495E;">
                  <div class="row justify-content-center">
                    <div class="col-10">
                      Timeline
                    </div>
                    <div class="col-1 text-end">
                      <a href=""><i class="fas fa-plus text-white"></i></a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <ul class="nav justify-content-center fw-bold">
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="/Perpus/Timeline">Semua</a>
                    </li>
                    <li class="nav-item">
                      <div class="dropdown nav-link dropup">
                        <a class="dropdown-toggle" href="" role="button" id="pilihpostingan" data-bs-toggle="dropdown" aria-expanded="false">
                          Postingan
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="pilihpostingan">
                          <li><a class="dropdown-item" href="/Perpus/AllPost">Semua postingan</a></li>
                          <li><a class="dropdown-item" href="/Perpus/MyPost">Postingan saya</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link aktif" href="/Perpus/Notif">Notifikasi</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- akhir Kepala timeline -->

          <!-- ISII -->

          <div class="container">
          @if($posts->count())
            @foreach ($posts as $post)
           <!-- Notifikasi -->
           <span id="notifikasi">
            <div class="col-md-12 mt-2">
              <div class="card borderradius shadow" data-aos="fade-up">
                <div class="card-header p-3">

                  <div class="row align-items-center">
                    <div class="col-md-1 text-center"><img src="/storage/{{ $post->user->foto }}" class="profil img-thumbnail rounded-circle" alt="{{ $post->user->nama }}"></div>
                    <div class="col-md-10">
                      <h5 class="fcu2 fw-bold font">{{ $post->user->nama }}</h5>
                      <p class="fcu2"><small>{{ $post->created_at->diffForHumans() }}</small></p>
                    </div>
                  </div>

                </div>
                <div class="card-body">
                  <div class="text">
                    <p>{{ $post->user->nama }} baru saja mengupload buku. Yuk cek bukunya!</p>
                  </div>
                  <div class="card">
                    <a href="/Perpus/BukuSaya/{{ $post->book->id }}" class="text-dark">
                      <div class="row g-0">
                        <div class="col-md-4 potong">
                          <img src="/storage/{{ $post->book->cover }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title display-6 fw-bold">{{ $post->book->judul }}</h5>
                            <p class="card-text">{{ $post->book->penulis }}</p>
                            <p class="card-text"><small class="text-muted">{{ $post->book->deskripsi }}</small></p>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

              </div>
            </div>
          </span>
          <!-- Akhir Notifikasi -->
            @endforeach
          @else
            <div class="container text-center py-5">
            <img src="../img/notfound.png" width="50%" alt="Data Tidak Ditemukan!!">
            </div>
          @endif
            <!-- Akhir ISI -->
          </div>
        </section>
      </div>
      <!-- Akhir Timeline -->

    </div>
  </div>

  </div>
  <!-- Akhir Halaman utama -->



  <!-- footer -->
  <footer class="bg2 pt-5 pb-5">
    <div class="footer text-center text-white">
      <small>
        <h6>Copyright <i class="far fa-copyright"></i> 2021 - Team Sinau. All Right Reserved.</h6>
      </small>
    </div>
  </footer>
  <!-- akhir footer -->



  <!-- Javascript -->
  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/TextPlugin.min.js"></script>
  <!-- AOS -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

  <!-- Script.js -->
  <script src="/js/script.js"></script>
  <!-- Akhir Javascript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>