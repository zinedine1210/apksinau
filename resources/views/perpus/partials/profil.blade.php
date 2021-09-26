  <!-- modal profil -->
  <div class="modal fade" id="profil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg2">
          <h5 class="modal-title display-6 fw-bold text-white" id="staticBackdropLabel">
            Profil
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <h4 class="fw-bold"><i class="far fa-address-card me-2"></i>Tentang</h4>
            <hr>

            <form action="/Profil/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="join" value="<?= date('d F Y') ?>">
              <div class="row justify-content-center text-center">
                <div class="col-md-12">
                  <label for="foto" class="form-label font fcu2 fw-bold hapus"><img src="/storage/{{ auth()->user()->foto }}" alt="" class="rounded-circle @error('foto') border border-danger border-4 @enderror" style="width: 200px; height:200px;"></label>
                  <input class="form-control form-control-lg d-none" id="foto" type="file" name="foto">
                </div>
              </div>

              <div class="form-floating mb-2 mt-2">
                <textarea class="form-control" placeholder="-" name="bio" id="text" style="height: 100px">{{ auth()->user()->bio }}</textarea>
                <label for="text">BIO</label>
              </div>

              <label for="nama" class="form-label font fcu2 fw-bold">Nama Lengkap</label>
              <input type="text" class="form-control mb-2" autocomplete="off" placeholder="Sekolah" name="nama" value="{{ auth()->user()->nama }}" id="nama" aria-describedby="nama">

              <label for="sekolah" class="form-label font fcu2 fw-bold">Sekolah</label>
              <input type="text" class="form-control mb-2" autocomplete="off" placeholder="Sekolah" name="sekolah" value="{{ auth()->user()->sekolah }}" id="sekolah" aria-describedby="sekolah">

              <label for="alamat" class="form-label font fcu2 fw-bold">Alamat</label>
              <input type="text" class="form-control mb-2" autocomplete="off" placeholder="Alamat" name="alamat" value="{{ auth()->user()->alamat }}" id="alamat" aria-describedby="alamat">

              <label for="ttl" class="form-label font fcu2 fw-bold">Tempat, Tanggal Lahir</label>
              <div class="input-group mb-2">
                <input type="text" class="form-control" value="{{ auth()->user()->tempat }}" name="tempat" autocomplete="off" id="ttl">
                <input type="date" placeholder="Tanggal Lahir" value="{{ auth()->user()->tanggallahir }}" autocomplete="off" name="tanggallahir" class="form-control">
              </div>

              <!-- Sosmed -->
              <h4 class="fw-bold mt-3 "><i class="fas fa-hashtag me-2"></i>Sosmed</h4>
              <hr>
              <div class="row jutify-content-center">
                <div class="col-md-4">
                  <label for="instagram" class="form-label font fcu2 fw-bold"><i class="fab fa-instagram me-2"></i>Instagram</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" id="instagram" class="form-control" name="instagram" placeholder="Cth: zine.zf" value="{{ auth()->user()->instagram }}" aria-label="Instagram" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="facebook" class="form-label font fcu2 fw-bold"><i class="fab fa-facebook me-2"></i>Facebook</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" id="facebook" class="form-control" name="facebook" placeholder="Cth: zinedineziddan *tidak menggunakan spasi" value="{{ auth()->user()->facebook }}" aria-label="Facebook" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="twitter" class="form-label font fcu2 fw-bold"><i class="fab fa-twitter me-2"></i>Twitter</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" id="twitter" class="form-control" name="twitter" placeholder="Cth: zizifa" value="{{ auth()->user()->twitter }}" aria-label="Twitter" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="website" class="form-label font fcu2 fw-bold"><i class="fas fa-globe me-2"></i>Website</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">https://</span>
                    <input type="text" id="website" class="form-control" name="website" placeholder="Cth: sinau.com" value="{{ auth()->user()->website }}" aria-label="Website" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="whatsapp" class="form-label font fcu2 fw-bold"><i class="fab fa-whatsapp me-2"></i>Whatsapp</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">+62</span>
                    <input type="number" id="whatsapp" class="form-control" name="whatsapp" placeholder="Cth: 895XXXXXXXX" value="{{ auth()->user()->whatsapp }}" aria-label="Whatsapp" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="telegram" class="form-label font fcu2 fw-bold"><i class="fab fa-telegram me-2"></i>Telegram</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" id="telegram" class="form-control" name="telegram" placeholder="Cth: zizifa" value="{{ auth()->user()->telegram }}" aria-label="Telegram" aria-describedby="basic-addon1">
                  </div>
                </div>
              </div>

              {{-- <!-- Akun -->
              <h4 class="fw-bold mt-3"><i class="fas fa-user-cog me-2"></i>Akun</h4>
              <hr>
              <div class="row justify-content-center mb-2">
                <div class="col-6">
                  <label for="username" class="form-label font fcu2 fw-bold"><i class="fas fa-user me-1"></i>Username</label>
                  <input type="text" class="form-control mb-2" autocomplete="off" placeholder="Masukkan username anda..." name="username" value="{{ auth()->user()->username }}" id="username" aria-describedby="username">
                </div>
                <div class="col-6">
                  <label for="ttl" class="form-label font fcu2 fw-bold"><i class="fas fa-envelope me-1"></i>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Username Email" value="{{ auth()->user()->email }}" aria-label="username">
                    
                </div>

                <label for="ubahpassword" class="form-label font fcu2 fw-bold"><i class="fas fa-unlock-alt me-1"></i>Ubah Password</label>
                <div class="col-6">
                  <div class="input-group mb-3">
                    <div class="input-group-text">
                      <input class="form-check-input mt-0" type="checkbox" value="lihat" aria-label="password">
                    </div>
                    <input type="password" name="password" placeholder="Masukkan Password Lama" class="form-control" aria-label="password">
                  </div>
                </div>
                <div class="col-6">
                  <div class="input-group mb-3">
                    <div class="input-group-text">
                      <input class="form-check-input mt-0" type="checkbox" value="lihat" aria-label="password2">
                    </div>
                    <input type="password" name="password2" placeholder="Masukkan Password Baru" class="form-control" aria-label="password2">
                  </div>
                </div>
              </div> --}}

            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- akhir modal profil -->