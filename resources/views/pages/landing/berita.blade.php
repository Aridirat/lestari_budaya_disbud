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
        <h1 class="block font-bold text-gray-800 text-2xl md:text-3xl lg:text-5xl dark:text-neutral-200">
          Berita Kegiatan
          <span class="bg-clip-text bg-linear-to-tl from-cyan-600 via-emerald-400 to-teal-500 text-transparent">Badung</span>
        </h1>
      </div>
      <!-- End Title -->

      {{-- <div class="mt-5 max-w-3xl text-center mx-auto font-quicksand">
        <p class="text-lg text-gray-600 dark:text-neutral-400">Media digital yang memfasilitasi pendaftaran warisan budaya di Kabupaten Badung, memastikan warisan budaya tetap lestari untuk generasi mendatang.</p>
      </div> --}}

      <!-- Buttons -->
      {{-- <div class="mt-8 gap-3 flex justify-center">
        <a class="inline-flex justify-center items-center gap-x-3 text-center bg-linear-to-tl from-cyan-600 to-teal-400 hover:from-teal-400 hover:to-cyan-600 border border-transparent text-white text-sm font-medium rounded-md focus:outline-hidden focus:from-teal-800 focus:to-cyan-800 py-3 px-4" href="#">
          Daftar Sekarang
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </a>
      </div>
      <!-- End Buttons --> --}}

    </div>
  </div>
<!-- End Hero -->

@include('pages.landing.components_landing.footer_landing')

</body>
</html>