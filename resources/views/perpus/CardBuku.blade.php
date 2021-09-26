@extends('perpus.layouts.main')
<link rel="stylesheet" href="../../style.css">
<!-- favicon -->
<link rel="shortcut icon" href="../../img/logo.png">

@section('container')
<div class="row g-0">

  <div class="col-md-12 p-3">
    <h3 class="fcu2"><i class="fas fa-bookmark me-2"></i>Identitas Buku</h3>
    <hr class="fcu">

    <div class="container">
      @foreach($books as $book)
      <div class="card mb-3 shadow">
        <div class="row g-0">
          <div class="card-header text-white bg2">
            <h1 class="display-6 ms-2 fw-bold font">{{ $book->judul }}</h1>
            <p><small class="lead ms-2">{{ $book->penulis }}<i class="fas fa-feather-alt ms-2"></i></small></p>
          </div>
          <div class="col-md-3 text-center">
            <a href="/storage/{{ $book->cover }}" target="_blank">
            <img src="/storage/{{ $book->cover }}" class="img-fluid rounded-start p-3" alt="fotoprofil">
            </a>
          </div>
          <div class="col-md-9 detailmember">
            <div class="card-body fcu2">

              <div class="row mb-3 lead fs-6 justify-content-center">
                <div class="col-md-3 fw-bold fcu font">
                  Jenis
                </div>
                <div class="col-md-9 font">
                  {{ Str::ucfirst($book->jenis) }}
                </div>
              </div>
              <div class="row mb-3 lead fs-6 justify-content-center">
                <div class="col-md-3 fw-bold fcu font">
                  Penerbit
                </div>
                <div class="col-md-9 font">
                  {{ Str::ucfirst($book->penerbit) }}
                </div>
              </div>
              <div class="row mb-3 lead fs-6 justify-content-center">
                <div class="col-md-3 fw-bold fcu font">
                  Tahun Terbit
                </div>
                <div class="col-md-9 font">
                  {{ $book->tahunterbit }}
                </div>
              </div>
              <div class="row mb-3 lead fs-6 justify-content-center">
                <div class="col-md-3 fw-bold fcu font">
                  Ukuran Buku
                </div>
                <div class="col-md-9 font">
                  {{ round($book->ukuran/1024, 2) }} MB
                </div>
              </div>
              <div class="row mb-3 lead fs-6 justify-content-center">
                <div class="col-md-3 fw-bold fcu font">
                  ISBN
                </div>
                <div class="col-md-9 font">
                  {{ $book->ISBN }}
                </div>
              </div>
              <div class="row mb-3 lead fs-6 justify-content-center">
                <div class="col-md-3 fw-bold fcu font">
                  Deskripsi
                </div>
                <div class="col-md-9 font">
                  {{ $book->deskripsi }}
                </div>
              </div>

              <p><small class="font fcu2 fw-bold fst-italic">Diposting oleh {{ $book->user->nama }} - {{ $book->created_at->diffForHumans() }}</small></p>
            </div>
          </div>


          <div class="card-footer cardBukuFooter">
            <div class="row justify-content-start text-center">
              <div class="col-2">
                <button class="btn bg2 text-white w-100" data-bs-toggle="collapse" data-bs-target="#komentar{{ $book->id }}"><i class="fas fa-comments me-2"></i>Komentar Buku</button>
              </div>
              <div class="col-2">
                <button class="btn bg2 text-white w-100" data-bs-toggle="modal" data-bs-target="#buku{{ $book->id }}"><i class="fas fa-book-reader me-2"></i>Baca Buku</button>
              </div>
              <div class="col-md-2">
                <button class="btn bg2 text-white w-100"><i class="fas fa-download me-2"></i>Download Buku</button>
              </div>
            </div>

            <!-- Collapse komentar -->
            <div class="collapse mt-3 mb-3" id="komentar{{ $book->id }}">
              <div class="card card-header">
                <h3 class="lead fw-bold fcu2"><i class="fas fa-comments me-2"></i> Komentar</h3>
              </div>

              <div class="card card-body">
                @if($comments->count())
                @foreach($comments as $comment)
                <div class="row justify-content-start align-items-start mb-3">
                  <div class="col-sm-1 text-start mb-1">
                    <img src="/storage/{{ $comment->user->foto }}" class="img-thumbnail img-fluid rounded-pill profil shadow-sm" alt="">
                  </div>
                  <div class="col-sm-10 card-header fcu2 pt-3 ps-3 pe-3 shadow-sm">
                    <figure>
                      <blockquote class="blockquote fw-bold">
                        <p class="font">{{ $comment->user->nama }}</p>
                      </blockquote>
                      <figcaption class="blockquote-footer text-dark">
                        <small>{{ $comment->komen }}</small>
                        @if($comment->user->id == auth()->user()->id)
                      <form action="/HapusComment/{{ $comment->id }}" method="POST">
                        @csrf
                      <button class="ms-3 text-danger btn-transparent btn hapus"><small>{{ $comment->created_at->diffForHumans() }} | <i class="fas fa-trash me-1"></i>Hapus</small></button>
                    </form>
                    @endif
                      </figcaption>
                    </figure>
                  </div>
                </div>
                @endforeach
                @else
                <div class="text-center">
                  <p>Tidak ada komentar</p>
                </div>
                @endif
              </div>

            </div>
            <!-- form kasih komentar -->
            <form action="/CommentBuku/{{ $book->id }}" method="POST">
              @csrf
              <div class="input-group mb-3 mt-3">
                <input type="text" class="form-control @error('komen') is-invalid @enderror" placeholder="Tuliskan Komentar" autocomplete="off" value="{{ old('comment') }}" name="komen" >
                <p>@error('komen')
                    {{ $message }}
                @enderror</p>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-share me-3 ms-3"></i></button>
              </div>
            </form>
            <!-- Akhir form kasih komentar -->
            <!-- akhir collapse komentar -->

          </div>

        </div>
      </div>
      @endforeach
    </div>

  </div>
</div>
@endsection

@section('modal')
@foreach($books as $book)
<div class="modal fade" id="buku{{ $book->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg2">
        <h5 class="modal-title fw-bold display-6 text-white" id="staticBackdropLabel">Baca Buku</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe src="/storage/{{ $book->buku }}" frameborder="0" width="100%" height="700"></iframe>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection

<script src="../js/script.js"></script>
