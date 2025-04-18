<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LesBud Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('templates/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('templates/plugins/bootstrap/css/bootstrap.min.css') }}">
  <!-- icheck bootstrap -->
  {{--
  <link rel="stylesheet" href="{{ asset('templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('templates/dist/css/adminlte.min.css') }}">

  <style>
    body {
      font-family: 'Source Sans Pro', sans-serif;
      background: url('{{ asset('assets/img/background_login.png') }}') center center / cover no-repeat fixed;
      position: relative;
      min-height: 100vh;
      overflow-x: hidden;
    }

    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
      z-index: -1;
    }

    body::after {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0.5) 100%);
      z-index: -1;
    }

    .login-container {
      margin-top: 5%;
    }

    .info-panel {
      padding-top: 20px;
      padding-bottom: 20px;
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
      margin-left: 15px;
      overflow: hidden;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .info-panel ul {
      list-style: none;
      padding-left: 0;
    }

    .info-panel ul li {
      margin-bottom: 10px;
      display: flex;
      align-items: center;
    }

    .info-panel ul li i {
      margin-right: 10px;
      color: #00c6ff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004999;
      transform: scale(1.03);
      transition: all 0.2s ease-in-out;
    }

    .btn-secondary:hover {
      background-color: #6c757d;
      border-color: #5a6268;
      transform: scale(1.03);
      transition: all 0.2s ease-in-out;
    }
  </style>
</head>

<body>
  <div class="container login-container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="row shadow-lg rounded" style="background-color: rgba(255, 255, 255, 0.487);">
          <!-- LEFT: FORM LOGIN -->
          <div class="col-md-6 p-5">
            <div class="text-center mb-4">
              <img src="{{ asset('assets/img/logo-lesbud.png') }}" alt="Logo" height="150">
              <h4 class="mt-2 font-weight-bold">Halaman Masuk LesBud</h4>
              <p class="text-muted">Masuk untuk memulai aplikasi</p>
            </div>

            <form action="/login" method="POST">
              @csrf
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                  placeholder="Email">
                @error('email')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>

              <div class="form-group d-flex justify-content-between">
                <a href="/" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Masuk</button>
              </div>
            </form>
          </div>

          <!-- RIGHT: INFO PANEL -->
          <div class="col-md-6 p-0">
            <div class="info-panel h-100 d-flex flex-column justify-content-between bg-white">
              <div class="info-header d-flex align-items-center justify-content-center text-center px-4" style="
                background: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.558)),
                            url('{{ asset('assets/img/Disbud_townhall.jpg') }}') center/cover no-repeat;
                border-top-right-radius: 10px;
                height: 240px;
              ">
                <div>
                  <h5 class="fw-bold text-uppercase text-dark mb-2" style=" font-size: 1.25rem; letter-spacing: 0.5px; font-weight: 900; text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">Selamat Datang di Portal Dinas Kebudayaan Badung</h5>
                  <p class="mb-0 text-secondary" style="font-size: 0.95rem;">Kelola data dan program kebudayaan secara
                    terintegrasi dan berkelanjutan.</p>
                </div>
              </div>

              <!-- Content Body -->
              <div class="p-4 bg-white flex-grow-1 rounded-bottom">
                <p class="mb-3">Dengan login ke sistem ini, Anda dapat:</p>
                <ul class="list-unstyled small text-dark">
                  <li class="mb-2"><i class="fas fa-database text-primary me-2"></i> Mengelola Data Kebudayaan</li>
                  <li class="mb-2"><i class="fas fa-calendar-alt text-success me-2"></i> Menjadwalkan Kegiatan</li>
                  <li class="mb-2"><i class="fas fa-chart-bar text-danger me-2"></i> Pelaporan dan Evaluasi</li>
                </ul>

                <p class="mt-3 small text-muted mb-1">
                  Sistem ini dikelola oleh Dinas Kebudayaan Pemerintah Daerah.
                </p>
                <p class="small text-muted">
                  Bantuan Teknis: <br> <strong>Ida Bagus Adimas Adiningrat</strong> <br> +62 856-1863-537
                </p>
              </div>
            </div>
          </div>
        </div> <!-- /row inner -->
      </div> <!-- /col -->
    </div> <!-- /row outer -->
  </div> <!-- /container -->

  <!-- Scripts -->
  <script src="{{ asset('templates/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('templates/dist/js/adminlte.min.js') }}"></script>
</body>

</html>