@extends('perpus.layouts.main')

@section('container')
<div class="row g-0">

  <div class="col-md-12 p-3">
    <h3 class="fcu2"><i class="fas fa-book-reader me-2"></i>Daftar Member</h3>
    <hr class="fcu">

    <div class="container">
      <div class="jumbotron jumbotron-fluid fcu py-5">
        <div class="container">

          <div class="row align-items-center mb-5">
            <div class="col-md-3 text-center">
              <img src="../img/perpus.png" class="img-fluid text-center" alt="">
            </div>
            <div class="col-md-9 mt-2 border bg-light bg-gradient shadow border-light border-3 borderradius ps-3 pt-3 mb-5">
              <div class="row justify-content-center">
                <div class="col-md-1">
                  <h1><i class="fas fa-quote-left"></i></h1>
                </div>
                <div class="col-10 jumbot">
                  <h1 class="display-5 fw-bold"></h1>
                  <p class="font fw-bold lead"><a class="hapus" data-bs-toggle="offcanvas" data-bs-target="#lihatmember" aria-expanded="false" aria-controls="lihatmember">Lihat Daftar Member<i class="ms-2 fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></a></p>
                </div>
                <div class="col-md-1 text-end">
                  <h1><i class="fas fa-quote-right"></i></h1>
                </div>
              </div>
            </div>
          </div>
        @foreach($users as $user)
          <div class="collapse" id="member{{ $user->id }}">
            <div class="card card-body bg-transparent">
                  <div class="row justify-content-center mt-3">
                    <div class="col-md-12">
              
                      <div class="card">
                        <h5 class="card-header bg2 text-white p-4 fw-bold display-6 lead font">{{ $user->nama }}</h5>
              
                        <ul class="nav nav-tabs fw-bold lead fs-5">
                          <li class="nav-item">
                            <a class="nav-link active" href="#profil" data-bs-toggle="collapse" data-bs-target="#profil{{ $user->id }}" aria-expanded="true">Profil</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" href="#postingan" data-bs-toggle="collapse" data-bs-target="#postingan{{ $user->id }}" aria-expanded="true">Postingan</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" href="#buku" data-bs-toggle="collapse" data-bs-target="#buku{{ $user->id }}" aria-expanded="true">Buku</a>
                          </li>
                        </ul>
                        <div class="card-body">
                          <!-- Accordion proofil -->
                          <div class="accordion-collapse collapse show" id="profil{{ $user->id }}">
              
                            <div class="card mb-3 detailmember">
                              <div class="row g-0">
                                <div class="col-md-4 text-center">
                                  <a href="/storage/{{ $user->foto }}" target="_blank">
                                    <img src="/storage/{{ $user->foto }}" class="img-fluid rounded-start p-3" alt="fotoprofil">
                                  </a>
                                </div>
                                <div class="col-md-8">
                                  <div class="card-header bg2">
                                    <h1 class="display-6 text-white fw-bold font">Profil</h1>
                                  </div>
                                  <div class="card-body fcu2">
                                    <div class="row mb-3 lead fs-6 justify-content-center">
                                      <div class="col-md-3 fw-bold fcu font">
                                        <i class="fas fa-graduation-cap me-1"></i>Sekolah
                                      </div>
                                      <div class="col-md-9 font">
                                        {{ Str::ucfirst($user->sekolah) }}
                                      </div>
                                    </div>
                                    <div class="row mb-3 lead fs-6 justify-content-center mt-1">
                                      <div class="col-md-3 fw-bold fcu font">
                                        <i class="fas fa-map-marked-alt me-1"></i>Alamat
                                      </div>
                                      <div class="col-md-9 font">
                                        {{ Str::ucfirst($user->alamat) }}
                                      </div>
                                    </div>
                                    <div class="row mb-3 lead fs-6 justify-content-center mt-1">
                                      <div class="col-md-3 fw-bold fcu font">
                                        <i class="fas fa-birthday-cake me-1"></i>TTL
                                      </div>
                                      <div class="col-md-9 font">
                                        {{ Str::ucfirst($user->tempat) }}, {{ $user->tanggallahir }}
                                      </div>
                                    </div>
                                    <div class="row mb-3 lead fs-6 justify-content-center mt-1">
                                      <div class="col-md-3 fw-bold fcu font">
                                        <i class="fas fa-file-signature me-1"></i>Tgl Gabung
                                      </div>
                                      <div class="col-md-9 font">
                                        {{ $user->join }}
                                      </div>
                                    </div>
                                    <div class="row mb-3 lead fs-6 justify-content-center mt-1">
                                      <div class="col-md-3 fw-bold fcu font">
                                        <i class="fas fa-address-card me-1"></i>Bio
                                      </div>
                                      <div class="col-md-9 font">
                                        {{ Str::ucfirst($user->bio) }}
                                      </div>
                                    </div>
                                  </div>
                                </div>
              
                                <div class="card-footer">
                                  <div class="row justify-content-center">
                                    <div class="col-md-12">
              
                                      <div class="row justify-content-center text-center align-items-center fs-3">
                                        <div class="col-2 p-2">
                                          <a href="https://{{ Str::lower($user->website) }}" target="_blank"><i data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->website }}" class="fas fa-globe"></i></a>
                                        </div>
                                        <div class="col-2 p-2">
                                          <a href="https://fb.me/{{ Str::lower($user->facebook) }}" target="_blank"><i data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->facebook }}" class="fab fa-facebook"></i></a>
                                        </div>
                                        <div class="col-2 p-2">
                                          <a href="https://www.instagram.com/{{ Str::lower($user->instagram) }}" target="_blank"><i data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->instagram }}" class="fab fa-instagram-square"></i></a>
                                        </div>
                                        <div class="col-2 p-2">
                                          <a href="https://twitter.com/{{ Str::lower($user->twitter) }}" target="_blank"><i data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->twitter }}" class="fab fa-twitter"></i></a>
                                        </div>
                                        <div class="col-2 p-2">
                                          <a href="https://wa.me/{{ $user->whatsapp }}?text=Hallo Teman Sinau" target="_blank"><i data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->whatsapp }}" class="fab fa-whatsapp-square"></i></a>
                                        </div>
                                        <div class="col-2 p-2">
                                          <a href="https://t.me/{{ Str::lower($user->telegram) }}" target="_blank"><i data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->telegram }}" class="fab fa-telegram"></i></a>
                                        </div>
                                      </div>
                                    </div>
              
                                  </div>
                                </div>
              
                              </div>
                            </div>
              
                          </div>
                          <!-- aakhir accordion profil -->
              
                          <!-- accordion postingan -->
                          <div class="accordion-collapse collapse mt-3" id="postingan{{ $user->id }}">
                            <!-- postingan -->
                            <?php 
                            $data = $posts->where('user_id',  $user->id);
                            ?>
                            @if($data->count() > 0)
                            @foreach ($data as $post)
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
                
                            @elseif($post->jenis == 'balaspostingan')
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
                            <div class="text-center">
                               <p><i><strong>Tidak ada Postingan</strong></i></p>
                            </div>
                            @endif
                            
                          </div>
                          <!-- Akhir accordion postingan -->
              
                          <!-- accordion buku -->
                          <div class="accordion-collapse collapse mt-3" id="buku{{ $user->id }}">
                            <div class="row justify-content-center">
                              <?php 
                                $data = $books->where('user_id', $user->id);
                                ?>
                              @if($data->count() > 0)
                              @foreach($data as $book)
                              <div data-aos="zoom-in" class="col-md-4 pt-2">
                                <a href="/Perpus/BukuSaya/{{ $book->id }}">
                                  <div class="card bg2 text-white borderradius shadow">
                                    <div class="potong">
                                      <img src="/storage/{{ $book->cover }}" style="border-radius:20px 20px 0px 0px;" class="card-img-bottom" alt="...">
                                    </div>
                                    <div class="card-body">
                                      <h5 class="card-title fs-4 fw-bold" style="white-space: nowrap; overflow:hidden;text-overflow:ellipsis; ">{{ $book->judul }}</h5>
                                      <p class="card-text font fs-6" style="white-space: nowrap; overflow:hidden;text-overflow:ellipsis; ">{{ $book->penulis }}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item" style="white-space: nowrap; overflow:hidden;text-overflow:ellipsis; ">Penerbit : {{ $book->penerbit }}</li>
                                      <li class="list-group-item" style="white-space: nowrap; overflow:hidden;text-overflow:ellipsis; ">Tahun : {{ $book->tahunterbit }}</li>
                                      <li class="list-group-item" style="white-space: nowrap; overflow:hidden;text-overflow:ellipsis; ">Jenis : {{ Str::ucfirst($book->jenis) }}</li>
                                    </ul>
                                    <div class="card-body">
                                      <img src="../FotoProfil/{{ $book->user->foto }}" style="height:50px; width:50px;" class="rounded-pill img-thumbnail me-2" alt=""> <small class="font fs-6">{{ $book->user->nama }}</small>
                                    </div>
                                    <div class="card-footer" style="border-top: 1px solid white;">
                                      <div class="font"><small>{{ $book->created_at->diffForHumans() }}</small></div>
                                    </div>
                                  </div>
                                </a>
                              </div>
                              @endforeach
                              @else
                              <div class="text-center">
                                <p><i><strong>Tidak ada Buku</strong></i></p>
                              </div>
                              @endif
                            </div>
                          </div>
                          <!-- akhir accordion buku -->
                        </div>
                      </div>
              
                    </div>
                  </div>
             </div>
          </div>
        </div>
        @endforeach

      </div>
      <!-- Akhir Jumbotron -->

    </div>

    

  </div>
</div>
@endsection

@section('modal')

<!-- modal balasPostingan -->
@foreach ($posts as $post)
      
<div class="modal fade" id="balasPostingan{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg2">
        <h5 class="modal-title fw-bold display-6 text-white" id="staticBackdropLabel">Balas Postingan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label class="form-label fcu2 fw-bold"><i class="fas fa-reply-all me-2"></i>Postingan yang anda balas</label>
        <!-- accordion info postingan asli -->
        <div class="accordion accordion-flush mb-3" id="accordionpostinganbalasan{{ $post->id }}">
          <div class="accordion-item">

            <h2 class="accordion-header" id="labelpostinganbalasan">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                <div class="row justify-content-center">
                  <div class="col-sm-12">
                    <h6 class="card-title fw-bold"><small>{{ $post->user->nama }}</small></h6>
                    <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                  </div>
                </div>
              </button>
            </h2>

            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="labelpostinganbalasan" data-bs-parent="#accordionpostinganbalasan{{ $post->id }}">
              <div class="accordion-body">
                <div class="card mb-3" style="border: none;">
                  <div class="row g-0">
                    <?php 
                    $namaFile = $post->lampiran;
                    $explode = explode('.', $namaFile);
                    $cek = end($explode);
                    ?>
                    @if($cek == 'pdf')
                    <div class="col-md-4">
                      <div class="gambarpostingan p-3">
                        <iframe src="../DataFile/{{ $post->lampiran }}" class="ratio ratio-1x1" title="Lampiran" height="200" frameborder="0" alt="Tidak ada lampiran"></iframe>
                      </div>
                    </div>
                    @elseif($cek == 'png' or $cek == 'jpg')
                    <div class="col-md-4">
                      <div class="gambarpostingan p-3">
                        <img src="../DataFile/{{ $post->lampiran }}" class="img-thumbnail" title="Lampiran" height="200" frameborder="0" alt="Tidak ada lampiran"></img>
                      </div>
                    </div>
                    @endif
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="card-text"><?= $post->body; ?></p>
                        <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <hr>

        <form action="/Perpus/Balas/{{ $post->id }}" method="post" enctype="multipart/form-data">
          @csrf

          <label for="balasan" class="form-label fcu2 fw-bold">Tuliskan balasan anda</label>
          @error('balasan')
              <p class="text-danger">{{ $message }}</p>
          @enderror
          <div class="form-floating">
              <input id="balasan" type="hidden" name="balasan" onfocus required>
              <trix-editor input="balasan"></trix-editor>
          </div>
          <div class="mb-3 mt-2">
            <label for="lampiran" class="form-label fcu2 fw-bold"><i class="fas fa-paperclip me-2"></i>Lampiran</label>
            <input class="form-control" type="file" name="lampiran" id="lampiran">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-upload me-2"></i>Upload</button>
          </form>
        </div>
      </div>
        
    </div>
  </div>
</div>
@endforeach
<!-- akhir modal balasPostingan -->

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

    <!-- OffCanvas -->
  <!-- OffCanvas Member -->
  <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="lihatmember" aria-labelledby="lihatmember">
    <div class="offcanvas-header bg2">
      <h5 class="offcanvas-title display-6 text-white lead fw-bold" id="lihatmember">Daftar Member</h5>
      <button type="button" class="btn-close text-reset btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" style="background-color: #e4fde3;">
      <form class="d-flex" action="" method="POST">
        <input class="form-control me-2" type="search" name="keyword" placeholder="Mau cari siapa?" aria-label="Search">
        <button class="btn btn-outline-info" name="search" type="submit">Cari</button>
      </form>

      <nav class="nav flex-column p-3 bg-light shadow borderradius mt-2">
        @if($users->count())
        @foreach($users as $user)
        <div class="row justify-content-center align-items-center g-0 mt-3">
          <div class="col-2">
            <img src="/storage/{{ $user->foto }}" class="rounded-circle shadow" style="width: 45px; height:45px;" alt="">
          </div>
          <div class="col-10">
            <a class="nav-link text-start shadow border-primary bg2 text-white fw-bold fs-6 font mt-2" style="border-radius: 0px 20px 20px 0px; white-space: nowrap; overflow:hidden;text-overflow:ellipsis;" href="/Perpus/Member/{{ $user->id }}"  data-bs-toggle="collapse" data-bs-target="#member{{ $user->id }}" aria-expanded="false">{{ $user->nama }}</a>
          </div>
        </div>
        @endforeach
        @else
          <div class="text-center">
            <p>Member tidak ditemukan</p>
          </div>
        @endif
      </nav>
    </div>
  </div>
  <!-- Akhir OC Member -->
  <!-- Akhir Offcanvas -->
@endsection

