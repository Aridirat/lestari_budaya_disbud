<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Gedog Budaya Badung</title>
</head>
<body class="font-display">

  @include('pages.landing.components_landing.navbar_landing')
  
<!-- Hero -->
    <div class="relative overflow-hidden min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: url(../assets/img/hero_gedog.svg)">
      <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Announcement Banner -->
        <div class="flex justify-center">
          <a class="inline-flex items-center gap-x-2 bg-white border border-gray-200 text-sm text-gray-800 p-1 ps-3 rounded-full transition hover:border-gray-300 focus:outline-hidden focus:border-gray-300 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-200 dark:hover:border-neutral-600 dark:focus:border-neutral-600" href="https://disbud.badungkab.go.id/">
            Website Resmi Kabupaten Badung
            <span class="py-1.5 px-2.5 inline-flex justify-center items-center gap-x-2 rounded-full bg-teal-500 hover:bg-teal-800  font-semibold text-sm text-gray-light dark:bg-neutral-700 dark:text-neutral-400">
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </span>
          </a>
        </div>
        <!-- End Announcement Banner -->

        <!-- Title -->
        <div class="mt-5 max-w-2xl text-center mx-auto font-merienda">
          <h1 class="block font-bold text-gray-800 text-2xl md:text-3xl lg:text-5xl dark:text-neutral-200">
            Gedog Budaya
            <span class="bg-clip-text bg-linear-to-tl from-cyan-600 via-emerald-400 to-teal-500 text-transparent">Badung</span>
          </h1>
        </div>
        <!-- End Title -->

        <div class="mt-5 max-w-3xl text-center mx-auto font-quicksand">
          <p class="text-lg text-gray-600 dark:text-neutral-400">Media digital yang memfasilitasi pendaftaran warisan budaya di Kabupaten Badung, memastikan warisan budaya tetap lestari untuk generasi mendatang.</p>
        </div>

        <!-- Buttons -->
        <div class="mt-8 gap-3 flex justify-center">
          <a class="inline-flex justify-center items-center gap-x-3 text-center bg-linear-to-tl from-cyan-600 to-teal-400 hover:from-teal-400 hover:to-cyan-600 border border-transparent text-white text-sm font-medium rounded-md focus:outline-hidden focus:from-teal-800 focus:to-cyan-800 py-3 px-4" href="#">
            Daftar Sekarang
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </a>
        </div>
        <!-- End Buttons -->

      </div>
    </div>
<!-- End Hero -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Title -->
  <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
    <h2 class="text-2xl font-merienda font-bold md:text-4xl md:leading-tight dark:text-white">Kebudayaan Badung</h2>
    <p class="font-quicksand mt-1 text-gray-600 dark:text-neutral-400">Jelajahi berbagai kebudayaan Benda dan Takbenda yang ditemukan dan dilestarikan di berbagai wilayah Kabupaten Badung.</p>
  </div>
  <!-- End Title -->

  <!-- Takbenta -->
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 font-quicksand">
    @foreach ($takbenda->take(3) as $item)
      <!-- Card -->
      <a class="group hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 rounded-xl p-5 transition dark:hover:bg-white/10 dark:focus:bg-white/10" href="#">
        <div class="aspect-w-16 aspect-h-10">
          <img class="w-100 h-80 object-cover rounded-xl" src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul_opk }}">
        </div>
        <h3 class="font-bold mt-5 text-xl text-gray-800 dark:text-neutral-300 dark:hover:text-white">
          {{ $item->judul_opk }}
        </h3>
        <p class="mt-2 text-sm text-gray-600 truncate dark:text-neutral-400">{{ $item->alamat_tradisi }}</p>
        <p class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold text-teal-500 dark:text-neutral-200">
          Detail
          <svg class="shrink-0 size-4 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </p>
      </a>
      <!-- End Card -->
    @endforeach
  </div>
  <!-- End Takbenda -->

  {{-- Benda --}}
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 my-10 font-quicksand">
  @foreach ($benda->take(3) as $item)
    <!-- Card -->
    <a class="group hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 rounded-xl p-5 transition dark:hover:bg-white/10 dark:focus:bg-white/10" href="#">
      <div class="aspect-w-16 aspect-h-10">
        <img class="w-100 h-80 object-cover rounded-xl" src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_obyek }}">
      </div>
      <h3 class="font-bold mt-5 text-xl text-gray-800 dark:text-neutral-300 dark:hover:text-white">
        {{ $item->nama_obyek }}
      </h3>
      <p class="mt-2 text-sm text-gray-600 truncate dark:text-neutral-400">{{ $item->lokasi_penemuan }}</p>
      <p class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold text-teal-500 dark:text-neutral-200">
        Detail
        <svg class="shrink-0 size-4 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
      </p>
    </a>
    <!-- End Card -->
    @endforeach
  </div>
  {{-- End Benda --}}
  
      {{-- Start Button --}}
      <div class="flex justify-center col-start-2 my-10">   
        <a href="#" type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-teal-500 text-white shadow-2xs hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-teal-bg-teal-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
        Lebih Banyak
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M5 12h14"></path>
          <path d="m12 5 7 7-7 7"></path>
        </svg>
        </a>
      </div>
      {{-- End Button --}}
  <!-- End Grid -->

</div>
<!-- End Card Blog -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Title -->
  <div class="grid grid-cols-5 gap-5">
    <div class="col-span-3 max-w-2xl mb-5">
      <h2 class="font-merienda text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Berita Kegiatan</h2>
      <p class="font-quicksand mt-1 text-gray-600 dark:text-neutral-400">Dapatkan informasi terkini dan menarik seputar kegiatan budaya di Kabupaten Badung.</p>
    </div>
    <div class="col-5 justify-end">
      <div class="flex justify-center col-start-2 my-10">   
        <a href="#" type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-teal-500 text-white shadow-2xs hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-teal-bg-teal-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
        Lebih Banyak
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M5 12h14"></path>
          <path d="m12 5 7 7-7 7"></path>
        </svg>
        </a>
      </div>
    </div>
  </div>
  <!-- End Title -->

<!-- Slider -->
<div data-hs-carousel='{
  "loadingClasses": "opacity-0",
  "dotsItemClasses": "hs-carousel-active:bg-teal-400 hs-carousel-active:border-teal-400 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-500 dark:hs-carousel-active:bg-teal-500 dark:hs-carousel-active:border-teal-500",
  "slidesQty": {
    "xs": 1,
    "lg": 3
  },
  "isCentered": true,
  "isSnap": true
}' class="relative">
  <div class="hs-carousel w-full flex snap-x snap-mandatory overflow-x-auto bg-white rounded-lg dark:bg-neutral-900">
    <div class="hs-carousel-body font-quicksand min-h-72 flex flex-nowrap gap-2 mb-5 transition-transform duration-700 opacity-0">
      
      <!-- Card -->
      @foreach ($kegiatans->take(10) as $item)
      <div class="flex hs-carousel-slide snap-center gap-6 my-5">
        <a class="group hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 rounded-xl p-5 transition dark:hover:bg-white/10 dark:focus:bg-white/10 flex-none w-80" href="{{ route('landing.detailBerita', $item->id) }}">
          <div class="aspect-w-16 aspect-h-9">
            <img class="w-full h-50 object-cover rounded-xl" src="{{ asset($item->gambar) }}" alt="Blog Image">
          </div>
          <h3 class="mt-2 text-lg font-bold text-gray-800 group-hover:text-teal-500 group-focus:text-teal-500 dark:text-neutral-300 dark:group-hover:text-white dark:group-focus:text-white">{{ $item->judul_kegiatan }}</h3>
          <p class="mt-2 text-sm text-gray-400 dark:text-neutral-400">{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->locale('id')->translatedFormat('l, d F Y') }}</p>
        </a>
      </div>
        @endforeach
        <!-- End Card -->
    </div>
  </div>

  <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-11.5 h-full text-gray-800 hover:bg-gray-800/10 focus:outline-hidden focus:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
    <span class="text-2xl" aria-hidden="true">
      <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m15 18-6-6 6-6"></path>
      </svg>
    </span>
    <span class="sr-only">Previous</span>
  </button>
  <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-11.5 h-full text-gray-800 hover:bg-gray-800/10 focus:outline-hidden focus:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
    <span class="sr-only">Next</span>
    <span class="text-2xl" aria-hidden="true">
      <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m9 18 6-6-6-6"></path>
      </svg>
    </span>
  </button>

  <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 gap-x-2"></div>
</div>
<!-- End Slider -->

</div>
<!-- End Card Blog -->

@include('pages.landing.components_landing.footer_landing')

</body>
</html>