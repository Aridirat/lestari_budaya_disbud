<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    @include('pages.landing.components_landing.navbar_landing')

      <!-- Hero -->
<div class="relative overflow-hidden min-h-90 flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: {{ asset($kegiatans->gambar) }}">
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
      <!-- Announcement Banner -->
      
      <!-- End Announcement Banner -->

      <!-- Title -->
      <div class="mt-5 max-w-2xl text-center mx-auto font-merienda">
        <h1 class="block font-bold text-gray-800 text-4xl dark:text-neutral-200">
          <p class="bg-clip-text py-5 bg-linear-to-tl from-cyan-600 via-emerald-400 to-teal-500 md:text-3xl lg:text-5xl text-transparent">Berita Kegiatan</p>
        </h1>
      </div>
      <!-- End Title -->
    </div>
</div>
<!-- End Hero -->

<!-- Blog Article -->
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6">
      <!-- Content -->
      <div class="lg:col-span-2">
        <div class="py-8 lg:pe-8">
          <div class="space-y-5 lg:space-y-8">
            <a class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline focus:outline-hidden focus:underline dark:text-blue-500" href="/">
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
              Kembali ke Halaman Utama
            </a>

            <p class="text-xs sm:text-sm text-gray-500 dark:text-neutral-200 mb-1">{{ \Carbon\Carbon::parse($kegiatans->tanggal_kegiatan)->locale('id')->translatedFormat('l, d F Y') }}</p>
            <h2 class="text-3xl font-bold lg:text-5xl dark:text-white">{{ old('judul_kegiatan', $kegiatans->judul_kegiatan) }}</h2>

            <div class="flex items-center gap-x-5">
              <a class="inline-flex items-center gap-1.5 py-1 px-3 sm:py-2 sm:px-4 rounded-full text-xs sm:text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
                Berita Kegiatan
              </a>
              <div class="block h-3 border-e border-gray-300 mx-3 dark:border-neutral-600"></div>
              <p class="text-xs sm:text-sm text-gray-800 dark:text-neutral-200">{{ old('lokasi_kegiatan', $kegiatans->lokasi_kegiatan) }}</p>

            </div>
            <div class="text-center">
              <div class="grid lg:grid-cols-2 gap-3">
                <div class="grid grid-cols-2 lg:grid-cols-1 gap-3">
                  <figure class="relative w-full h-60">
                    <img class="size-full absolute top-0 start-0 object-cover rounded-xl" src="{{ asset($kegiatans->gambar) }}" alt="Blog Image">
                  </figure>
                  <figure class="relative w-full h-60">
                    <img class="size-full absolute top-0 start-0 object-cover rounded-xl" src="https://images.unsplash.com/photo-1671726203638-83742a2721a1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
                  </figure>
                </div>
                <figure class="relative w-full h-72 sm:h-96 lg:h-full">
                  <img class="size-full absolute top-0 start-0 object-cover rounded-xl" src="https://images.unsplash.com/photo-1671726203394-491c8b574a0a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
                </figure>
              </div>
            </div>
  
            <p class="text-lg text-gray-800 dark:text-neutral-200">{{ old('deskripsi', $kegiatans->deskripsi) }}</p>
  
            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-y-5 lg:gap-y-0">
              <!-- Badges/Tags -->
              <div>
                <a class="m-0.5 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="{{ asset($kegiatans->dokumen_kajian) }}" target="_blank">
                    Dokumen Kegiatan
                  </a>
              </div>
              <!-- End Badges/Tags -->
  
              <div class="flex justify-end items-center gap-x-1.5">
                <!-- Button -->
  
                <!-- Button -->
                <div class="hs-dropdown relative inline-flex">
                  <button id="hs-blog-article-share-dropdown" type="button" class="hs-dropdown-toggle flex items-center gap-x-2 text-sm text-gray-500 hover:text-gray-800 focus:outline-hidden focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/></svg>
                    Share
                  </button>
                  <div class="hs-dropdown-menu w-auto transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mb-1 z-10 bg-gray-900 shadow-md rounded-xl p-2 dark:bg-black" role="menu" aria-orientation="vertical" aria-labelledby="hs-blog-article-share-dropdown">
                    <input type="text" value="{{ url()->current() }}" id="myInput" hidden>
                    <button class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-400 hover:bg-white/10 focus:outline-hidden focus:bg-white/10 dark:text-neutral-400 dark:hover:bg-neutral-900 dark:focus:bg-neutral-900" onclick="myFunction()">
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                      Copy link
                    </button>
                  </div>
                </div>
                <!-- Button -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Content -->
  
      <!-- Sidebar -->
      <div class="lg:col-span-1 lg:w-full lg:h-full lg:bg-linear-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent dark:from-neutral-800">
        <div class="sticky top-0 start-0 py-8 lg:ps-8">
          <div class="group flex items-center gap-x-3 border-b border-gray-200 pb-8 mb-8 dark:border-neutral-700">
  
              <h1 class="text-xl font-semibold text-gray-800  dark:text-neutral-200">
                Berita Lainnya
              </h1>
  
            <div class="grow">
              <div class="flex justify-end">
              </div>
            </div>
          </div>
  
          <div class="space-y-6">
            <!-- Media -->
            @foreach ($allKegiatans->take(5) as $kegiatan)
                @if ($kegiatan->id !== $kegiatans->id)
                    <a class="group flex items-center gap-x-6 focus:outline-hidden" href="{{ route('landing.detailBerita', $kegiatan->id) }}">
                        <div class="shrink-0 relative rounded-lg overflow-hidden size-20">
                            <img class="size-full absolute top-0 start-0 object-cover rounded-lg" src="{{ asset($kegiatan->gambar) }}" alt="Blog Image">
                        </div>
                        <div class="grow">
                            <span class="text-sm font-bold text-gray-800 group-hover:text-teal-600 group-focus:text-teal-600 dark:text-neutral-200 dark:group-hover:text-teal-500 dark:group-focus:text-teal-500">
                                {{ $kegiatan->judul_kegiatan }}
                            </span>
                        </div>
                    </a>
                @endif
            @endforeach
            <!-- End Media -->
          </div>
        </div>
      </div>
      <!-- End Sidebar -->
    </div>
  </div>
  <!-- End Blog Article -->

    
    @include('pages.landing.components_landing.footer_landing')

    <script>
        function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
}
    </script>
</body>
</html>