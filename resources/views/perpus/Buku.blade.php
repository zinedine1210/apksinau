@extends('perpus.layouts.main')

@section('container')
<div class="row g-0">

  <div class="col-md-12 p-3">
    <h3 class="fcu2"><i class="fas fa-book me-2"></i>Daftar Buku</h3>
    <hr class="fcu">

    <div class="container">
      <!-- Kepala -->
      <div class="row justify-content-center">
        <div class="col-md-10 border bg2 borderradius shadow">

          <form action="/Perpus/Buku">
            <div class="row justify-content-center g-0 pt-3 pb-3 kepalaBuku">
              <div class="col-md-8">
                <input type="text" class="form-control ps-5" aria-label="Text input with segmented dropdown button" name="search" value="{{ request('search') }}" placeholder="Mau cari buku apa?">
              </div>
              <div class="col-md-3">
                <div class="input-group">
                  <select class="form-select" name="jenis" id="inputGroupSelect02">
                    <option @if(request('jenis') == 'semua') selected @endif value="semua">Semua</option>
                    <option @if(request('jenis') == 'pelajaran') selected @endif value="pelajaran">Pelajaran</option>
                    <option @if(request('jenis') == 'novel') selected @endif value="novel">Novel</option>
                  </select>
                  <button class="btn btn-info text-white" style="border-radius: 0px 20px 20px 0px;"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- Akhir Kepala -->
    </div>

    <section id="halamanbuku">
      <div class="container">
        <div class="row justify-content-center border mt-3 p-3 borderradius bg-light">
          @if($books->count())
          <h5>
            <caption><small class="text-muted">Sortir : @if(request('search')) {{ request('search') }} |@endif @if(request('jenis')) {{ Str::ucfirst(request('jenis')) }} @endif</small></caption>
          </h5>
          <!-- isiannya -->
          @foreach ($books as $book)
              
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
          <!-- Akhir Isiannya -->
          @else
          <div class="container text-center py-5">
            <img src="../img/notfound.png" width="50%" alt="Data Tidak Ditemukan!!">
          </div>
          @endif
        </div>
      </div>
    </section>

  </div>
</div>
@endsection

@section('modal')
    
@endsection