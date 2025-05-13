<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="{{ asset('../assets/img/logo-lesbud.png') }}"/>
    <title>Kebudayaan Benda</title>
</head>
<body>
    @include('pages.landing.components_landing.navbar_landing')

      <!-- Hero -->
<div class="relative overflow-hidden min-h-90 flex items-center justify-center bg-cover bg-center bg-no-repeat">
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
      <!-- Announcement Banner -->
      
      <!-- End Announcement Banner -->

      <!-- Title -->
      <div class="mt-5 max-w-2xl text-center mx-auto font-merienda">
        <h1 class="block font-bold text-gray-800 text-4xl dark:text-neutral-200">
          <p class="bg-clip-text py-5 bg-linear-to-tl from-cyan-600 via-emerald-400 to-teal-500 md:text-3xl lg:text-5xl text-transparent">Kebudayaan Benda</p>
        </h1>
      </div>
      <!-- End Title -->
    </div>
</div>
<!-- End Hero -->

<div class="min-h-screen font-display">
  <!-- Blog Article -->
  <div class="max-w-[85rem] px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto">

    <!-- Content -->
      <div class="grid grid-cols-9 gap-x-10 gap-y-2 px-3 w-full">
        <div class="col-span-6">
          <div class="space-y-5 md:space-y-8">
              <a class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline focus:outline-hidden focus:underline dark:text-blue-500" href="/">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                Kembali ke Halaman Utama
              </a>
              <div class="space-y-2">
                <h2 class="text-2xl font-bold md:text-5xl dark:text-white">{{ $benda->nama_obyek }}</h2>
                
                <div class="flex items-center gap-x-5 py-3">
                  <p class="text-xs sm:text-sm text-gray-500 dark:text-neutral-200 mb-1">Ditemukan di <span class="text-gray-800">{{ $benda->lokasi_penemuan }}</span></p>
                  <div class="block h-3 border-e border-gray-300 mx-3 dark:border-neutral-600"></div>
                  <p class="text-xs sm:text-sm text-gray-500 dark:text-neutral-200 mb-1"><span class="m-0.5 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-teal-200 text-gray-800">{{ $benda->kategori }}</span></p>
                  <div class="block h-3 border-e border-gray-300 mx-3 dark:border-neutral-600"></div>
                  <p class="text-xs sm:text-sm text-gray-500 dark:text-neutral-200 mb-1"><span class="m-0.5 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-teal-200 text-gray-800">{{ $benda->status_pemilik }}</span></p>
                </div>
              </div>
              
              
              <figure>
                <img class="w-full object-cover rounded-xl" src="{{ asset('storage/' . $benda->foto) }}" alt="Blog Image">
                <figcaption class="mt-3 text-sm text-center text-gray-500 dark:text-neutral-500">
                  Foto: {{ $benda->nama_obyek }}.
                </figcaption>
              </figure>
              <div class="flex items-center gap-x-3">
                <p class="text-xs sm:text-sm text-gray-500 dark:text-neutral-200 mb-1">Pemilik: {{ $benda->nama_pemilik }}</p>
                <div class="block h-3 border-e border-gray-300 mx-3 dark:border-neutral-600"></div>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-neutral-200 mb-1">{{ $benda->alamat_pemilik }}</p>
              </div>
              
              <p class="text-lg text-gray-800 dark:text-neutral-200">{{ $benda->deskripsi }}</p>
              <div>
                  <a class="m-0.5 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="{{ asset('storage/' . $benda->dokumen_kajian) }}" target="_blank">
                      Dokumen Kegiatan
                </a>
              </div>
              <div>
                <figure>
                <img class="w-full object-cover rounded-xl" src="{{ asset('storage/' . $benda->foto_galeri) }}" alt="Blog Image">
              </figure>
          
            </div>
            {{-- <figure>
              <img class="w-full object-cover rounded-xl" src="https://images.unsplash.com/photo-1670272498380-eb330b61f3cd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
            </figure> --}}
          </div>
        </div>

        {{-- Side Content --}}
          <div class="col-end-10 col-span-3 lg:w-full lg:h-full lg:bg-linear-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent dark:from-neutral-800">
            <div class="sticky top-0 start-0 py-8 lg:ps-8">
              <div class="group flex items-center gap-x-3 border-b border-gray-200 pb-8 mb-8 dark:border-neutral-700">
      
                  <h1 class="text-xl font-semibold text-gray-800  dark:text-neutral-200">
                    Kebudayaan lainnya
                  </h1>
      
                <div class="grow">
                  <div class="flex justify-end">
                  </div>
                </div>
              </div>
      
              <div class="space-y-6">
                <!-- Media -->
                @foreach ($allBenda->take(5) as $item)
                    @if ($item->id !== $benda->id)
                        <a class="group flex items-center gap-x-6 focus:outline-hidden" href="{{ route('landing.detailOdcb', $item->id) }}">
                            <div class="shrink-0 relative rounded-lg overflow-hidden size-20">
                                <img class="size-full absolute top-0 start-0 object-cover rounded-lg" src="{{ asset('storage/' . $item->foto) }}" alt="Blog Image">
                            </div>
                            <div class="grow">
                                <span class="text-sm font-bold text-gray-800 group-hover:text-teal-600 group-focus:text-teal-600 dark:text-neutral-200 dark:group-hover:text-teal-500 dark:group-focus:text-teal-500">
                                    {{ $item->nama_obyek }}
                                </span>
                                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">{{ $item->lokasi_penemuan }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach
                <!-- End Media -->
              </div>
            </div>
          </div>
        {{-- End Side Content --}}
      </div>
    <!-- End Content -->
  </div>
<!-- End Blog Article -->

</div>

@include('pages.landing.components_landing.footer_landing')
</body>
</html>