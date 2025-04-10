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
      
      <!-- End Announcement Banner -->

      <!-- Title -->
      <div class="mt-5 max-w-2xl text-center mx-auto font-merienda">
        <h1 class="block font-bold  text-gray-800 text-2xl md:text-3xl lg:text-5xl dark:text-neutral-200">
          Kebudayaan Benda dan Takbenda
          <span class="bg-clip-text bg-linear-to-tl from-cyan-600 via-emerald-400 to-teal-500 text-transparent">Badung</span>
        </h1>
      </div>
      <!-- End Title -->

      {{-- <div class="mt-5 max-w-3xl text-center mx-auto font-quicksand">
        <p class="text-lg text-gray-600 dark:text-neutral-400">Media digital yang memfasilitasi pendaftaran warisan budaya di Kabupaten Badung, memastikan warisan budaya tetap lestari untuk generasi mendatang.</p>
      </div> --}}

      {{-- <!-- Buttons -->
      <div class="mt-8 gap-3 flex justify-center">
        <a class="inline-flex justify-center items-center gap-x-3 text-center bg-linear-to-tl from-cyan-600 to-teal-400 hover:from-teal-400 hover:to-cyan-600 border border-transparent text-white text-sm font-medium rounded-md focus:outline-hidden focus:from-teal-800 focus:to-cyan-800 py-3 px-4" href="#">
          Daftar Sekarang
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </a>
      </div>
      <!-- End Buttons --> --}}

    </div>
  </div>
<!-- End Hero -->
{{-- Content --}}
<div class="container max-w-screen">
  <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
    <h2 class="text-2xl font-merienda font-bold md:text-4xl md:leading-tight dark:text-white">Kebudayaan Takbenda</h2>
    <p class="font-quicksand mt-1 text-gray-600 dark:text-neutral-400">Warisan takbenda yang kaya akan nilai, tradisi, dan kearifan lokal yang telah ditemukan di Kabupaten Badung.</p>
  </div>
  <div class="grid grid-cols-3 gap-4 m-10 font-quicksand">
      @foreach ($takbenda as $item)
      <div class="card hover:bg-gray-100 rounded-xl">
        <div class="card-body p-2 flex justify-center">
          <img class="aspect-3/2 rounded-xl" src="{{ asset('storage/' . $item->foto) }}" alt="Card Image">
        </div>
        <div class="p-4 md:p-5">
          <h3 class="text-2xl font-bold text-gray-800 dark:text-white pb-2">
            {{ $item->judul_opk }}
          </h3>
          <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">{{ $item->alamat_tradisi }}</p>
          <a class="my-5 py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-600 text-white hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
            Detail
          </a>
        </div>
      </div>
      @endforeach
    </div>
    
</div>
{{-- End Content --}}
{{-- Content --}}
<div class="container max-w-screen py-20">
  <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
    <h2 class="text-2xl font-merienda font-bold md:text-4xl md:leading-tight dark:text-white">Kebudayaan Benda</h2>
    <p class="font-quicksand mt-1 text-gray-600 dark:text-neutral-400">Warisan benda yang menjadi kearifan lokal yang telah ditemukan di Kabupaten Badung.</p>
  </div>
    <div class="grid grid-cols-3 gap-4 m-10 font-quicksand">
        @foreach ($benda as $item)
        <div class="card hover:bg-gray-100 rounded-xl">
          <div class="card-body p-2 flex justify-center">
            <img class="aspect-3/2 rounded-xl" src="{{ asset('storage/' . $item->foto) }}" alt="Card Image">
          </div>
          <div class="p-4 md:p-5">
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white pb-2">
              {{ $item->nama_obyek }}
            </h3>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">{{ $item->lokasi_penemuan }}</p>
            <a class="my-5 py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-600 text-white hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
              Detail
            </a>
          </div>
        </div>
        @endforeach
    </div>
    
</div>
{{-- End Content --}}

@include('pages.landing.components_landing.footer_landing')

</body>
</html>