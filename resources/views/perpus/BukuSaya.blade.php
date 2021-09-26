@extends('perpus.layouts.main')

@section('container')
<div class="row g-0">

  <div class="col-md-12 p-3">
    <h3 class="fcu2"><i class="fas fa-book-open me-2"></i>Buku Saya</h3>
    <hr class="fcu">

    <!-- kepala -->
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow-lg borderradius kplTimeline">
          <div class="card-header fw-bold pt-4 pb-4 text-white display-6" style="background-color: #35495E;">
            <div class="row justify-content-center">
              <div class="col-10 text-start">
                Daftar buku saya
              </div>
              <div class="col-2 text-center">
                <a href="" data-bs-target="#tambahBuku" data-bs-toggle="modal"><i class="fas fa-plus text-white"></i></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row justify-content-end">
              <div class="col-4">
                <form action="/Perpus/BukuSaya" method="GET">
                <div class="input-group mb-3">
                  <input type="text" name="search" class="form-control" placeholder="Penulis / ID / Judul" value="{{ request('search') }}" aria-describedby="button-addon2">
                  <select class="form-select bg2 text-white" name="jenis" id="inputGroupSelect01">
                    <option @if(request('jenis') == 'semua') selected @endif value="semua">Semua</option>
                    <option @if(request('jenis') == 'pelajaran') selected @endif value="pelajaran">Pelajaran</option>
                    <option @if(request('jenis') == 'novel') selected @endif value="novel">Novel</option>
                  </select>
                  <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- akhir kepala -->


    <!-- daftar buku saya -->
    <div class="container">
      <div class="table-responsive">
        <table class="table table-striped table-hover table-borderless text-center fs-5 mt-3 align-middle caption-top">
          <caption><small>Sortir : @if(request('search')) {{ request('search') }} |@endif @if(request('jenis')) {{ Str::ucfirst(request('jenis')) }} @endif</small></caption>
          @if($books->count())
          <thead class="bg2 text-white borderradius">
            <tr>
              <th scope="col" class="font ps-5 pe-5 pt-4 pb-4">NO</th>
              <th scope="col" class="font pt-4 pb-4">ID</th>
              <th scope="col" class="font ps-5 pe-5 pt-4 pb-4">Judul</th>
              <th scope="col" class="font ps-5 pe-5 pt-4 pb-4">Aksi</th>
            </tr>
          </thead>
          
          <tbody>
            @foreach ($books as $book)
          
            <tr data-aos="fade-up">
              <th>{{ $loop->iteration }}</th>
              <td>
                {{ $book->id }}
              </td>
              <td>{{ $book->judul }}</td>
              <td>
              <form action="/Perpus/BukuSaya/{{ $book->id }}" class="d-inline" method="post">
                @csrf
                @method('delete')
                <button onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger p-1 text-white"><i class="fas fa-trash-alt"></i></button>
              </form>
                <a href="" data-bs-target="#editBuku{{ $book->id }}" data-bs-toggle="modal" class="btn btn-info p-1 text-white"><i class="fas fa-edit"></i></a>
                <a href="/Perpus/BukuSaya/{{ $book->id }}" class="btn btn-warning p-1 text-white"><i class="fas fa-eye"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
          @else
          <div class="container text-center py-5">
            <img src="../img/notfound.png" width="50%" alt="Data Tidak Ditemukan!!">
          </div>
          @endif
        </table>
      </div>
    </div>
    <!-- akhir daftar buku saya -->
  </div>
</div>
@endsection

@section('modal')
    <!-- modal tambahBuku -->

  <div class="modal fade" id="tambahBuku" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg2">
          <h5 class="modal-title fw-bold display-6 text-white" id="staticBackdropLabel">Tambah Buku</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/Perpus/BukuSaya" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" required value="{{ old('judul') }}" class="form-control mb-2 lead font fw-bold fs-3 border-bottom border-4" style="border: none;" autocomplete="off" placeholder="Masukkan judul disini..." name="judul" id="judul" aria-describedby="judul">

            <!-- identitas buku -->
            <h4 class="fw-bold mt-3 bg2 text-white pt-3 pb-3 ps-2 mb-3 fcu2"><i class="fas fa-grip-lines-vertical me-2"></i>Identitas Buku</h4>


            <label for="penulis" class="form-label font fcu2 fw-bold">Penulis</label>
            <input type="text" required value="{{ old('penulis') }}" class="form-control mb-2" autocomplete="off" placeholder="Tuliskan nama penulis buku" name="penulis" id="penulis" aria-describedby="penulis">

            <label for="penerbit" class="form-label font fcu2 fw-bold">Penerbit</label>
            <input type="text" value="{{ old('penerbit') }}" class="form-control mb-2" autocomplete="off" placeholder="Tuliskan nama penerbit buku" name="penerbit" id="penerbit" aria-describedby="penerbit">

            <div class="row jutify-content-center">
              <div class="col-md-6">
                <label for="tahunTerbit" class="form-label font fcu2 fw-bold">Tahun Terbit</label>
                <input type="number" max="2050" value="{{ old('tahunTerbit') }}" class="form-control mb-2" autocomplete="off" placeholder="Cth: 2020" name="tahunTerbit" id="tahunTerbit" aria-describedby="tahunTerbit">
              </div>
              <div class="col-md-6">
                <label for="nomorISBN" class="form-label font fcu2 fw-bold">Nomor ISBN</label>
                <input type="number" value="{{ old('ISBN') }}" class="form-control mb-2" autocomplete="off" placeholder="Cth: 989239923729" name="ISBN" id="nomorISBN" aria-describedby="nomorISBN">
              </div>
            </div>

            <div class="form-floating mb-2">
              <textarea class="form-control" placeholder="" id="deskripsiBuku" name="deskripsi" style="height: 100px">{{ old('deskripsi') }}</textarea>
              <label for="deskripsiBuku">Deskripsi Buku</label>
            </div>

            <!-- Kategori -->
            <h4 class="fw-bold mt-3 bg2 text-white pt-3 pb-3 ps-2 mb-3 fcu2"><i class="fas fa-grip-lines-vertical me-2"></i>Kategori Buku</h4>

            <div class="container">
              <div class="row justify-content-center fcu2 fw-bold">
                <div class="col-md-6">
                  <label for="mapelTerkait" class="form-label">Jenis Buku</label>
                  <select class="form-select" name="jenis" aria-label="Default select example">
                    <option value="pelajaran">Pelajaran</option>
                    <option value="novel">Novel</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="mapelTerkait" class="form-label">Mata Pelajaran Terkait</label>
                  <input class="form-control" value="{{ old('mapel') }}" list="datalistOptions" name="mapel" id="mapelTerkait" placeholder="Berikan kata kunci">
                  <datalist id="datalistOptions">
                    <option value="Matematika">
                    <option value="Bahasa Indonesia">
                    <option value="Bahasa Inggris">
                    <option value="Pendidikan Kewarganegaraan">
                    <option value="Fisika">
                    <option value="Lainnya">
                  </datalist>
                </div>
              </div>
            </div>

            <!-- Buku -->
            <h4 class="fw-bold mt-3 bg2 text-white pt-3 pb-3 ps-2 mb-3 fcu2"><i class="fas fa-grip-lines-vertical me-2"></i>Buku</h4>
            <div class="container">
              <div class="row justify-content-center fcu2 fw-bold">
                <div class="col-md-6">
                  <label for="fileBuku" class="form-label">Upload file buku</label>
                  <input class="form-control" name="buku" type="file" id="fileBuku">
                </div>
                <div class="col-md-6">
                  <label for="coverBuku" class="form-label">Upload cover buku</label>
                  <input class="form-control" name="cover" type="file" id="coverBuku">
                </div>
              </div>
            </div>


          <div class="modal-footer mt-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-upload me-2"></i>Upload</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- akhir modal tambahBuku -->


  <!-- modal editBuku -->
  @foreach ($books as $book)
      
  <div class="modal fade" id="editBuku{{ $book->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg2">
          <h5 class="modal-title fw-bold display-6 text-white" id="staticBackdropLabel">Edit Buku</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/Perpus/BukuSaya/{{ $book->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="text" required class="form-control mb-2 lead font fw-bold fs-3 border-bottom border-4" style="border: none;" value="{{ $book->judul, old('judul') }}" autocomplete="off" placeholder="Masukkan judul disini..." name="judul" id="judul" aria-describedby="judul">

            <!-- identitas buku -->
            <h4 class="fw-bold mt-3 bg2 text-white pt-3 pb-3 ps-2 mb-3 fcu2"><i class="fas fa-grip-lines-vertical me-2"></i>Identitas Buku</h4>


            <label for="penulis" class="form-label font fcu2 fw-bold">Penulis</label>
            <input type="text" required class="form-control mb-2" autocomplete="off" placeholder="Tuliskan nama penulis buku" name="penulis" value="{{ $book->penulis, old('penulis') }}" id="penulis" aria-describedby="penulis">

            <label for="penerbit" class="form-label font fcu2 fw-bold">Penerbit</label>
            <input type="text" class="form-control mb-2" autocomplete="off" placeholder="Tuliskan nama penerbit buku" name="penerbit" value="{{ $book->penerbit, old('penerbit') }}" id="penerbit" aria-describedby="penerbit">

            <div class="row jutify-content-center">
              <div class="col-md-6">
                <label for="tahunTerbit" class="form-label font fcu2 fw-bold">Tahun Terbit</label>
                <input type="number" max="2050" class="form-control mb-2" autocomplete="off" placeholder="Cth: 2020" name="tahunTerbit" id="tahunTerbit" value="{{ $book->tahunterbit, old('tahunTerbit') }}" aria-describedby="tahunTerbit">
              </div>
              <div class="col-md-6">
                <label for="nomorISBN" class="form-label font fcu2 fw-bold">Nomor ISBN</label>
                <input type="text" class="form-control mb-2" autocomplete="off" placeholder="Cth: 989239923729" name="ISBN" value="{{ $book->ISBN, old('ISBN') }}" id="nomorISBN" aria-describedby="nomorISBN">
              </div>
            </div>

            <div class="form-floating mb-2">
              <textarea class="form-control" placeholder="" name="deskripsi" id="deskripsiBuku" style="height: 100px">{{ $book->deskripsi, old('deskripsi') }}</textarea>
              <label for="deskripsiBuku">Deskripsi Buku</label>
            </div>


            <!-- Kategori -->
            <h4 class="fw-bold mt-3 bg2 text-white pt-3 pb-3 ps-2 mb-3 fcu2"><i class="fas fa-grip-lines-vertical me-2"></i>Kategori Buku</h4>

            <div class="container">
              <div class="row justify-content-center fcu2 fw-bold">
                <div class="col-md-6">
                  <label for="mapelTerkait" class="form-label">Jenis Buku</label>
                  <select class="form-select" name="jenis" aria-label="Default select example">
                    <option <?php if($book->jenis == 'pelajaran'){echo "selected";} ?> value="pelajaran">Pelajaran</option>
                    <option value="novel" <?php if($book->jenis == 'novel'){echo "selected";} ?>>Novel</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="mapelTerkait" class="form-label">Mata Pelajaran Terkait</label>
                  <input class="form-control" list="datalistOptions" name="mapel" id="mapelTerkait" placeholder="Berikan kata kunci" value="{{ $book->mapel }}">
                  <datalist id="datalistOptions">
                    <option value="Matematika">
                    <option value="Bahasa Indonesia">
                    <option value="Bahasa Inggris">
                    <option value="Pendidikan Kewarganegaraan">
                    <option value="Fisika">
                    <option value="Lainnya">
                  </datalist>
                </div>
              </div>
            </div>

            <!-- Buku -->
            <h4 class="fw-bold mt-3 bg2 text-white pt-3 pb-3 ps-2 mb-3 fcu2"><i class="fas fa-grip-lines-vertical me-2"></i>Buku</h4>
            <div class="container">
              <div class="row justify-content-center fcu2 fw-bold">
                <div class="col-md-6">
                  <label for="fileBuku" class="form-label">Upload file buku</label>
                  <input class="form-control" name="buku" type="file" id="fileBuku">
                </div>
                <div class="col-md-6">
                  <label for="coverBuku" class="form-label">Upload cover buku</label>
                  <input class="form-control" name="cover" type="file" id="coverBuku">
                </div>
              </div>
            </div>

          <div class="modal-footer mt-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-upload me-2"></i>Upload</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  
  @endforeach
  <!-- akhir modal editBuku -->
@endsection

