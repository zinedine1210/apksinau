@extends('perpus.layouts.main');

@section('container')

    <div class="row g-0">

      <div class="col-md-12 p-3">
        <h3 class="fcu2"><i class="fas fa-columns me-2 m-2"></i>Timeline</h3>
        <hr class="fcu">

       

        <!-- Timeline -->
        <section id="postingan">

          <!-- Kepala Timeline -->
          <div class="row">
            <div class="col-md-12">
              <div class="card shadow-lg borderradius kplTimeline">
                <div class="card-header fw-bold pt-4 pb-4 text-white display-6" style="background-color: #35495E;">
                  <div class="row justify-content-center">
                    <div class="col-12 text-start">
                      Timeline
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
                        <a class="dropdown-toggle aktif" href="" role="button" id="pilihpostingan" data-bs-toggle="dropdown" aria-expanded="false">
                          Postingan
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="pilihpostingan">
                          <li><a class="dropdown-item" href="/Perpus/AllPost">Semua postingan</a></li>
                          <li><a class="dropdown-item aktif" href="/Perpus/MyPost">Postingan saya</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/Perpus/Notif">Notifikasi</a>
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
            @if ($post->jenis == 'postingan')
            <!-- Postingan User -->
            <span id="postinganuser{{ $post->id }}">
              <div class="col-md-12 mt-2">
                <div class="card borderradius shadow" data-aos="fade-up">
                  <div class="card-header p-3">

                    <div class="row align-items-center">
                      <div class="col-md-1 text-center"><img src="/storage/{{ $post->user->foto }}" class="profil img-thumbnail rounded-circle" alt="{{ $post->user->foto }}"></div>
                      <div class="col-md-10 tengah">
                        <h5 class="fcu2 fw-bold font">{{ $post->user->nama }} <i class="text-muted lead">@<?= $post->user->username?></i></h5>
                        <p class="fcu2"><small><i>{{ $post->created_at->diffForHumans() }}</i></small></p>
                      </div>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="text">
                      <?= $post->body; ?>
                    </div>
                    <?php 
                    $namaFile = $post->lampiran;
                    $explode = explode('.', $namaFile);
                    $cek = end($explode);
                    ?>
                    @if($cek == 'pdf')
                    <hr class="text-muted">
                    <a href="/storage/{{ $post->lampiran }}" target="_blank">
                      <iframe src="{{ asset('storage/' . $post->lampiran) }}#toolbar=0" class="ratio ratio-1x1 px-5 mt-2" title="Lampiran" height="300" frameborder="0" alt="Tidak ada lampiran"></iframe>
                    </a>
                    @elseif($cek == 'png' or $cek == 'jpg' or $cek == 'jpeg' or $cek == 'gif')
                    <hr class="text-muted">
                    <div style="max-height: 500px; overflow:hidden;">
                      <a href="/storage/{{ $post->lampiran }}" target="_blank">
                        <div style="max-height: 300px; overflow:hidden;">
                          <img src="{{ asset('storage/' . $post->lampiran) }}" class="px-5" width="100%" alt="">
                        </div>
                      </a>
                    </div>
                    @endif
                  </div>
                  <div class="card-footer text-muted">
                    <div class="row justify-content-start text-center">
                      <div class="col-2"><a class="fcu2" href="" data-bs-toggle="modal" data-bs-target="#komentar{{ $post->id }}"><i class="fas fa-comments me-2 mt-3"></i>Komen</a></div>
                      <div class="col-2"><a class="fcu2" href="" data-bs-toggle="modal" data-bs-target="#balasPostingan{{ $post->id }}"><i class=" fas fa-share-square me-2 mt-3"></i>Balas</a></div>
                      
                      @if ($post->user->username === auth()->user()->username)
                      <div class="col-2">
                        <form action="/Perpus/Timeline/{{ $post->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="fcu2 hapus text-danger btn-transparent btn" onclick="return confirm('Apakah yakin postingan ini akan dihapus?');"><i class="fas fa-times-circle mt-2 me-2"></i>Hapus</button>
                        </form>
                      </div>
                      @else
                      
                      @endif

                      <form action="/Comment/{{ $post->id }}" method="POST">
                        @csrf
                        <div class="input-group mb-3 mt-3">
                          <input type="text" class="form-control @error('komen') is-invalid @enderror" placeholder="Tuliskan Komentar" autocomplete="off" value="{{ old('comment') }}" name="komen" >
                          <p>@error('komen')
                              {{ $message }}
                          @enderror</p>
                          <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-share me-3 ms-3"></i></button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </span>
            <!-- Akhir Postingan -->
            @else
            <!-- Balas postingan -->
            <span id="balaspostinganuser{{ $post->id }}">
              <div class="col-md-12 mt-2">
                <div class="card borderradius shadow" data-aos="fade-up">
                  <div class="card-header p-3">

                    <div class="row align-items-center">
                      <div class="col-md-1 text-center"><img src="/storage/{{ $post->user->foto }}" class="profil img-thumbnail rounded-circle" alt="fotoprofil"></div>
                      <div class="col-md-10">
                        <h5 class="fcu2 fw-bold font">{{ $post->user->nama }} <i class="text-muted lead">@<?= $post->user->username; ?></i></h5>
                        <p class="fcu2"><small>{{ $post->created_at->diffForHumans() }}</small></p>
                      </div>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="text">
                      <p><?= $post->body; ?></p>
                    </div>
                    <?php 
                    $namaFile = $post->lampiran;
                    $explode = explode('.', $namaFile);
                    $cek = end($explode);
                    ?>
                    @if($cek == 'pdf')
                    <hr class="text-muted">
                    <iframe src="../DataFile/{{ $post->lampiran }}#toolbar=0" class="ratio ratio-1x1 px-5 mt-2" title="Lampiran" height="200" frameborder="0" alt="Tidak ada lampiran"></iframe>
                    @elseif($cek == 'png' or $cek == 'jpg' or $cek == 'jpeg' or $cek == 'gif')
                    <hr class="text-muted">
                    <img src="../DataFile/{{ $post->lampiran }}" class="px-5" width="100%" alt="">
                    @endif

                    <div class="row justify-content-center">
                      <div class="col-md-11" style="border-right: 1px solid gray; border-left:1px solid gray; border-bottom:1px solid gray;">
                        <!-- accordion balas postingan -->

                        <div class="accordion accordion-flush" id="accordionpostinganbalasan">
                          <div class="accordion-item">

                            <h2 class="accordion-header" id="labelpostinganbalasan">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <div class="row justify-content-center">
                                  <div class="col-sm-12">
                                    <h6 class="card-title fw-bold"><small>{{ $post->post->user->nama }}</small></h6>
                                    <p class="card-text"><small class="text-muted">{{ $post->post->created_at->diffForHumans() }}</small></p>
                                  </div>
                                </div>
                              </button>
                            </h2>

                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="labelpostinganbalasan" data-bs-parent="#accordionpostinganbalasan">
                              <div class="accordion-body">
                                <div class="card mb-3" style="border: none;">
                                  <div class="row g-0">
                                    <?php 
                                    $namaFile = $post->post->lampiran;
                                    $explode = explode('.', $namaFile);
                                    $cek = end($explode);
                                    ?>
                                    @if($cek == 'pdf')
                                    <div class="col-md-4">
                                      <div class="gambarpostingan p-3">
                                        <iframe src="../DataFile/{{ $post->post->lampiran }}" class="ratio ratio-1x1" title="Lampiran" height="200" frameborder="0" alt="Tidak ada lampiran"></iframe>
                                      </div>
                                    </div>
                                    @elseif($cek == 'png' or $cek == 'jpg')
                                    <div class="col-md-4">
                                      <div class="gambarpostingan p-3">
                                        <img src="../DataFile/{{ $post->post->lampiran }}" class="img-thumbnail" title="Lampiran" height="200" frameborder="0" alt="Tidak ada lampiran"></img>
                                      </div>
                                    </div>
                                    @endif
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <p class="card-text"><?= $post->post->body; ?></p>
                                        <p class="card-text"><small class="text-muted">{{ $post->post->created_at->diffForHumans() }}</small></p>
                                        <a href="/Perpus/Timeline#postinganuser{{ $post->post->id }}" class="btn btn-info">Lihat postingan asli</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                        <!-- akhir accor balas postingan -->
                      </div>
                    </div>

                  </div>

                  <div class="card-footer text-muted">
                    <div class="row justify-content-start text-center">
                      <div class="col-2"><a class="fcu2" href="" data-bs-toggle="modal" data-bs-target="#komentar{{ $post->id }}"><i class="fas fa-comments me-2 mt-3"></i>Komen</a></div>
                      <div class="col-2">
                        @if ($post->user->username === auth()->user()->username)
                      <div class="col-2">
                        <form action="/Perpus/Timeline/{{ $post->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="fcu2 hapus text-danger btn-transparent btn" onclick="return confirm('Apakah yakin postingan ini akan dihapus?');"><i class="fas fa-times-circle mt-2 me-2"></i>Hapus</button>
                        </form>
                      </div>
                      @else
                      
                      @endif
                      </div>
                    </div>

                    <form action="/Comment/{{ $post->id }}" method="POST">
                        @csrf
                        <div class="input-group mb-3 mt-3">
                          <input type="text" class="form-control @error('komen') is-invalid @enderror" placeholder="Tuliskan Komentar" autocomplete="off" value="{{ old('comment') }}" name="komen" >
                          <p>@error('komen')
                              {{ $message }}
                          @enderror</p>
                          <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-share me-3 ms-3"></i></button>
                        </div>
                      </form>

                  </div>
                </div>
              </div>
            </span>
            <!-- Akhir balas postingan -->
            @endif
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
@endsection




  @section('modal')
    <!-- modal komentar -->
  @foreach ($posts as $post)
      
  <div class="modal fade" id="komentar{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg2">
          <h5 class="modal-title fw-bold display-6 text-white" id="staticBackdropLabel">Komentar Postingan</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          @foreach ($comments as $comment)

            @if ($post->id === $comment->post_id)
            <div class="row justify-content-start align-items-start mb-3" data-aos=" fade-up">
              <div class="col-sm-1 text-start mb-1">
                <img src="/storage/{{ $comment->user->foto }}" class="img-thumbnail img-fluid rounded-pill profil shadow-sm" alt="">
              </div>
              <div class="col-sm-10 card-header fcu2 pt-3 ps-3 pe-3 shadow-sm">
                <figure>
                  <blockquote class="blockquote fw-bold">
                    <p class="font">{{ $comment->user->nama }}</p>
                  </blockquote>
                  <figcaption class="blockquote-footer text-dark">
                    <small class="fs-6">{{ $comment->komen }}</small>
                    <cite title="Hapus komentar ini">
                      @if($comment->user->id == auth()->user()->id)
                      <form action="/HapusComment/{{ $comment->id }}" method="POST">
                        @csrf
                      <button class="ms-3 text-danger btn-transparent btn hapus"><small>{{ $comment->created_at->diffForHumans() }} | <i class="fas fa-trash me-1"></i>Hapus</small></button>
                    </form>
                    @endif
                    </cite>
                  </figcaption>
                </figure>
              </div>
            </div>
          
            @endif

          @endforeach


        </div>
      </div>
    </div>
  </div>
  @endforeach
  <!-- akhir modal komentar -->
     
  @endsection
