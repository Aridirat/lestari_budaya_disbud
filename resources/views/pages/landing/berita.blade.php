<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('../assets/img/logo-lesbud.png') }}"/>
    <title>Berita Kebudayaan</title>
</head>
<body class="font-display">

    @include('pages.landing.components_landing.navbar_landing')
    
<!-- Hero -->
    <div class="relative overflow-hidden min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: url(../assets/img/hero_gedog.svg)">
      <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">

          <!-- Title -->
          <div class="mt-5 max-w-2xl text-center mx-auto font-merienda">
            <h1 class="block font-bold text-gray-800 text-2xl md:text-3xl lg:text-5xl dark:text-neutral-200">
              Berita Kegiatan
              <span class="bg-clip-text bg-linear-to-tl from-cyan-600 via-emerald-400 to-teal-500 text-transparent">Badung</span>
            </h1>
          </div>
          <!-- End Title -->

      </div>
    </div>
<!-- End Hero -->

{{-- Content --}}
<div class="container max-w-screen">
  <div class="grid grid-cols-9 gap-4 m-3 mx-15 font-display">

    {{-- Main content --}}
    <div class="col-start-1 col-end-9 flex items-center font-display">
      <h2 class="font-bold text-3xl font-merienda">Berita Terbaru</h2>
    </div>
    @if ($kegiatans->isNotEmpty())
    @php
      $kegiatan = $kegiatans->first();
    @endphp
    <div class="row-start-2 col-span-5 font-quicksand">
      <img src="{{ asset('storage/uploads/kegiatan/gambar/' . $kegiatan->gambar) }}" class="rounded-md object-cover w-full h-64">
      <span class="text-gray-400 text-sm hidden md:block mt-4"> {{ $kegiatan->tanggal_kegiatan }} </span>
      <h1 class="text-gray-800 text-4xl font-bold mt-2 mb-2 leading-tight font-display">
      {{ $kegiatan->judul_kegiatan }}
      </h1>
      <p class="text-gray-600 mb-4 line-clamp-4 text-justify">
      {{ $kegiatan->deskripsi }}
      </p>
      <a href="{{ route('landing.detailBerita', $kegiatan->id) }}" type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-teal-500 text-white shadow-2xs hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-teal-bg-teal-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
      Baca Selengkapnya
      </a>
    </div>
    <!-- End Main content -->

      {{-- Another --}}
      <div class="row-start-2 col-span-4 overscroll-none overflow-y-scroll h-110 ">
        <!-- post 1 -->
        @foreach ($kegiatans->skip(1)->take(5) as $kegiatan)
        <hr class="border-gray-200 dark:border-white">
        <a href="{{ route('landing.detailBerita', $kegiatan->id) }}">
          <div class="rounded-xl w-full my-2 px-2 flex flex-col md:flex-row py-2 hover:bg-gray-100">
            <img src="{{ asset('storage/uploads/kegiatan/gambar/' . $kegiatan->gambar) }}" class="block md:hidden lg:block rounded-md aspect-3/2 md:h-32 m-4 md:m-0" />
            <div class="rounded px-4">
              <span class="text-gray-400 font-quicksand text-sm hidden md:block"> {{ $kegiatan->tanggal_kegiatan }} </span>
              <div class="md:mt-0 text-gray-800 font-semibold text-lg mb-2">
                {{ $kegiatan->judul_kegiatan }}
              </div>
              <p class=" mt-2 text-gray-600 text-sm font-quicksand line-clamp-3 text-justify">
                {{ $kegiatan->deskripsi }}
              </p>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    <!-- End Another -->
    
    <div class="flex justify-center my-30">
      <hr class="border-2 border-gray-200 dark:border-white w-6xl">
    </div>
    
    <!-- start all news -->
    <div class="grid grid-cols-4 gap-5 mb-50 mx-15 font-quicksand">
      <div class="col-span-full flex items-center font-display pb-10">
        <h2 class="font-bold text-3xl font-merienda">Berita Lainnya</h2>
      </div>
      @foreach ($kegiatans as $kegiatan)
      <div class="row">
          <div class="col">
            <img src="{{ asset('storage/uploads/kegiatan/gambar/' . $kegiatan->gambar) }}" class="rounded aspect-3/2" alt="technology" />
            <div class="p-4 pl-0">
              <span class="text-gray-400 text-sm hidden md:block my-2"> {{ $kegiatan->tanggal_kegiatan }} </span>
              <h2 class="font-bold text-xl text-gray-800 font-display">{{ $kegiatan->judul_kegiatan }} </h2>
              <div class="h-20">
                <p class="text-gray-600 mt-2 line-clamp-3 text-justify">
                  {{ $kegiatan->deskripsi }}
                </p>
              </div>
              <a href="{{ route('landing.detailBerita', $kegiatan->id) }}" class="inline-block font-semibold py-2 rounded text-teal-500 hover:text-teal-700 mt-2 ml-auto"> Baca Selengkapnya </a>
            </div>
          </div>
        </div>
          @endforeach
  </div>
  <!-- end all news -->
    
  @else
  <div class="col-span-full text-center py-10">
    <h2 class="text-2xl font-quicksand text-gray-400">Berita kegiatan belum tersedia</h2>
  </div>
  @endif

</div>
{{-- End Content --}}

@include('pages.landing.components_landing.footer_landing')

</body>
</html>