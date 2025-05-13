<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite('resources/css/app.css')
  <title>Admin Aplikasi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('templates/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <link rel="stylesheet" href="assets/css/style.css">

  <!-- AdminLTE & Argon Tailwind -->
  <link rel="stylesheet" href="{{ asset('templates/dist/css/adminlte.min.css') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="{{ asset('../assets/img/logo-lesbud.png') }}"/>
  <link href="assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker.min.css">

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker-full.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  {{-- Bootstrap CSS --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- ChartJS --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  {{-- Full Calendar --}}
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/tippy.js@6/dist/tippy-bundle.umd.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tippy.js@6/animations/scale.css"/>

</head>

<body class="hold-transition sidebar-mini layout-fixed min-h-screen flex flex-col bg-gray-100 text">
<div class="wrapper flex-grow">

  @include('layouts.components.navbar')
  @include('layouts.components.sidebar')

  <div class="content-wrapper bg-white">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              @php
                $pageTitle = strtoupper(request()->segment(1) ?? 'DASHBOARD');
                $subPageRaw = request()->segment(2);

                $subPage = match (true) {
                    $subPageRaw === 'create' => 'TAMBAH',
                    is_numeric($subPageRaw) => 'EDIT',
                    $subPageRaw !== null => strtoupper($subPageRaw),
                    default => null
                };
            @endphp
              {{ $pageTitle }}
              @if ($subPage)
                <small class="text-muted">/ {{ $subPage }}</small>
              @endif
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="/" class="text-decoration-none text-teal">BERANDA</a>
              </li>
              @if(request()->segment(1))
                <li class="breadcrumb-item">
                  <a href="{{ url(request()->segment(1)) }}" class="text-decoration-none text-teal">{{ strtoupper(request()->segment(1)) }}</a>
                </li>
              @endif
              @if($subPage)
                <li class="breadcrumb-item active">{{ $subPage }}</li>
              @endif
            </ol>
            
          </div>
        </div>
        @yield('header')
      </div>
    </section>

    <section class="content pb-5">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>

  <footer class="main-footer bg-white border-t text-center py-3 mt-auto">
    <div class="float-right d-none d-sm-inline">
      <b>Version</b> 1.0
    </div>
    <strong>&copy; {{ date('Y') }} <a href="#" class="text-decoration-none">Dinas Kebudayaan</a>.</strong> All rights reserved.
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<!-- Scripts -->
<script src="{{ asset('/templates/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/templates/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/templates/dist/js/adminlte.min.js') }}"></script>
{{-- <script src="{{ asset('/templates/dist/js/demo.js') }}"></script> --}}
<script src="../assets/js/plugins/chartjs.min.js" async></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
</body>
</html>
