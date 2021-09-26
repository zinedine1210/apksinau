<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <title>Sinau| Daftar Member</title>
  <link rel="shortcut icon" href="images/sinau1.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="reg_siswa.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <meta name="generator" content="Nicepage 3.22.0, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Croissant+One:400">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "Sinau",
      "logo": "images/sinau1.png"
    }
  </script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="reg_siswa">
  <meta property="og:description" content="">
  <meta property="og:type" content="website">
</head>

<body class="u-body">
  <header class="u-clearfix u-header u-header" id="sec-8ee2">
    <div class="u-clearfix u-sheet u-sheet-1">
      <a href="/" data-page-id="50336443" class="u-image u-logo u-image-1" title="Portal" data-image-width="1076" data-image-height="915">
        <img src="images/sinau1.png" class="u-logo-image u-logo-image-1">
      </a>
      <p class="u-custom-font u-text u-text-custom-color-3 u-text-default u-text-1">Si​nau </p>
    </div>
  </header>
  <section class="u-align-center u-clearfix u-section-1" id="sec-92af">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-border-1 u-border-custom-color-2 u-container-style u-group u-radius-50 u-shape-round u-group-1">
        <div class="u-container-layout u-container-layout-1">
          <h3 class="u-align-center u-custom-font u-text u-text-default-lg u-text-default-md u-text-default-sm u-text-default-xl u-text-font u-text-1">Selamat Datang di<br>E-Perpustakaan
          </h3>
          <p class="u-small-text u-text u-text-custom-color-3 u-text-default u-text-variant u-text-2">Silahkan gunakan Nama lengkap Anda</p>
          <div class="u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xl u-form u-login-control u-form-1">
            
            <form action="/MemberDaftar" method="POST" class="u-clearfix u-form-custom-backend u-form-spacing-35 u-form-vertical u-inner-form" source="custom" name="form-2" style="padding: 10px;">
              @csrf

              <div class="u-form-group u-form-name">
                <label for="nama-708d" class="u-form-control-hidden u-label"></label>
                <input type="text" value="{{ old('nama') }}" placeholder="Nama Lengkap" id="nama-708d" name="nama" class="u-grey-5 u-input u-input-rectangle @error('nama') is-invalid @enderror" autofocus>
                @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="u-form-group u-form-name">
                <label for="username-708d" class="u-form-control-hidden u-label"></label>
                <input type="text" value="{{ old('username') }}" placeholder="Username" id="username-708d" name="username" class="u-grey-5 u-input u-input-rectangle @error('username') is-invalid @enderror">
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="u-form-group u-form-name">
                <label for="email" class="u-form-control-hidden u-label"></label>
                <input type="email" value="{{ old('email') }}" placeholder="Email" id="email" name="email" class="u-grey-5 u-input u-input-rectangle @error('email') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="u-form-group u-form-password">
                <label for="password-708d" class="u-form-control-hidden u-label"></label>
                <input type="password" placeholder="Password" id="password-708d" name="password" class="u-grey-5 u-input u-input-rectangle @error('password') is-invalid @enderror" >
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="u-form-group u-form-group-3">
                <label for="text-a2d2" class="u-form-control-hidden u-label"></label>
                <input type="password" placeholder="Tuliskan Kembali Password" id="text-a2d2" name="password2" class="u-grey-5 u-input u-input-rectangle @error('password2') is-invalid @enderror">
                @error('password2')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
             
              <div class="u-align-center u-form-group u-form-submit">
                <button class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-2 u-hover-custom-color-3 u-radius-40 u-btn-1">Daftarkan</button>
                <input type="submit" value="submit" class="u-form-control-hidden">
              </div>
              <input type="hidden" value="" name="recaptchaResponse">
            </form>
          </div>
          @auth
   
            <a href="/MemberMasuk" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="navlink dropdown-toggle u-align-center u-border-none u-btn u-button-style u-login-control u-login-forgot-password u-none u-text-custom-color-2 u-text-hover-custom-color-3 u-btn-2">
              Masuk sebagai {{ auth()->user()->nama }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/Perpus">My Dashboard <i class="fas fa-columns"></i></a></li>
              <li><hr class="dropdown-divider"></li>
              <form action="/logout" method="post">
                @csrf
                <li><button class="dropdown-item" >Logout <i class="fas fa-sign-out-alt"></i></button></li>
              </form>
            </ul>
     
              @else
              <a href="/MemberMasuk" class="u-align-center u-border-none u-btn u-button-style u-login-control u-login-forgot-password u-none u-text-custom-color-2 u-text-hover-custom-color-3 u-btn-2">Sudah punya akun</a>
          @endauth
        </div>
      </div>
      <img class="u-image u-image-contain u-image-1" src="images/loginsiswa.png" data-image-width="5014" data-image-height="2635">
    </div>
  </section>


  <footer class="u-align-center u-clearfix u-custom-color-3 u-footer u-footer" id="sec-6c7e">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <p class="u-small-text u-text u-text-variant u-text-1">Powered By .Team Sinau 2021</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    @if (session()->has('berhasil'))
    toastr.success("{{ session('berhasil') }}")
    @endif

    @if (session()->has('gagal'))
    toastr.error("{{ session('gagal') }}")
    @endif

    @if (session()->has('login'))
    toastr.error("{{ session('login') }}")
    @endif
    
  </script>
</body>

</html>