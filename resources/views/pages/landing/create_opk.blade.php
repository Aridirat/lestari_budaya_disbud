<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="{{ asset('../assets/img/logo-lesbud.png') }}"/>
    <title>Daftar Kebudayaan Benda</title>
</head>
<body>

    
  @include('pages.landing.components_landing.navbar_landing')

  <!-- Hero -->
<div class="relative overflow-hidden min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: url(../assets/img/hero_gedog.svg)">
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
      <!-- Announcement Banner -->
      
      <!-- End Announcement Banner -->

      <!-- Title -->
      <div class="mt-5 max-w-2xl text-center mx-auto font-merienda">
        <h1 class="block font-bold  text-gray-800 text-2xl md:text-3xl lg:text-5xl dark:text-neutral-200">
            Formulir Pendaftaran Benda
          <span class="bg-clip-text bg-linear-to-tl from-cyan-600 via-emerald-400 to-teal-500 text-transparent">Badung</span>
        </h1>
      </div>
      <!-- End Title -->
    </div>
</div>
<!-- End Hero -->

<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto font-display">

    <div class="bg-white rounded-xl shadow-xs dark:bg-neutral-900">
        <div class="pt-0 p-4 sm:pt-0 sm:p-7">
            <form action="{{ route('landing.create_opk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="form-group">
                    <input type="text" name="kunci_token" id="kunci_token" class="form-control @error('kunci_token') is-invalid @enderror" hidden>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                      const randomString = localStorage.getItem('randomString');
                      if (randomString) {
                          document.getElementById('kunci_token').value = randomString;
                      }
                        });
                    </script>
                    @error('kunci_token')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group pt-5">
                    <label for="judul_opk" class="block text-sm/6 font-medium text-gray-900">Judul OPK</label>
                    <div class="mt-2">
                      <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-teal-600">
                        <input type="text" name="judul_opk" id="judul_opk" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Nama tradisi" required>
                      </div>
                    </div>
                </div>
            
                <div class="form-group pt-5">
                    <label for="alamat_tradisi" class="block text-sm/6 font-medium text-gray-900">Alamat Tradisi</label>
                    <div class="mt-2">
                      <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-teal-600">
                        <input type="text" name="alamat_tradisi" id="alamat_tradisi" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Alamat tradisi berasal" required>
                      </div>
                    </div>
                </div>
            
                <div class="form-group pt-5">
                    <label for="lokasi_tradisi" class="block text-sm/6 font-medium text-gray-900">Lokasi Tradisi/Pementasan</label>
                    <div class="mt-2">
                      <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-teal-600">
                        <input type="text" name="lokasi_tradisi" id="lokasi_tradisi" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Lokasi dipentaskannya tradisi" required>
                      </div>
                    </div>
                </div>
            
                <div class="form-group pt-5">
                    <label for="nama_narasumber" class="block text-sm/6 font-medium text-gray-900">Nama Narasumber</label>
                    <div class="mt-2">
                      <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-teal-600">
                        <input type="text" name="nama_narasumber" id="nama_narasumber" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Nama narasumber" required>
                      </div>
                    </div>
                </div>
            
                <div class="form-group pt-5">
                    <label for="alamat_narasumber" class="block text-sm/6 font-medium text-gray-900">Alamat Narasumber</label>
                    <div class="mt-2">
                      <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-teal-600">
                        <input type="text" name="alamat_narasumber" id="alamat_narasumber" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Alamat narasumber" required>
                      </div>
                    </div>
                </div>
            
                <div class="form-group pt-5">
                    <label for="no_hp" class="block text-sm/6 font-medium text-gray-900">Nomor HP/Telp.</label>
                    <div class="mt-2">
                      <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-teal-600">
                        <input type="text" name="no_hp" id="no_hp" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Nomor HP/Telp. narasumber" required>
                      </div>
                    </div>
                </div>
                
                <div class="form-group pt-5">
                    <label for="kode_pos" class="block text-sm/6 font-medium text-gray-900">Kode Pos</label>
                    <div class="mt-2">
                      <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-teal-600">
                        <input type="text" name="kode_pos" id="kode_pos" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Kode Pos alamat narasumber" required>
                      </div>
                    </div>
                </div>
                
                <div class="form-group pt-5">
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                    <div class="mt-2">
                      <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-teal-600">
                        <input type="text" name="email" id="email" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Email narasumber" required>
                      </div>
                    </div>
                </div>
             
                <div class="form-group pt-5">
                    <label for="deskripsi" class="block text-sm/6 font-medium text-gray-900">Deskripsi</label>
                    <div class="mt-2">
                        <textarea name="deskripsi" id="deskripsi" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-teal-600 sm:text-sm/6" required></textarea>
                    </div>
                    <p class="mt-3 text-sm/6 text-gray-600">Isilah dengan deskripsi tradisi.</p>
                </div>
            
                <div class="form-group pt-5">
                    <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Foto</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <img id="image-preview" class="mx-auto mb-4 hidden max-h-40" alt="Preview Foto" onload="hideSVG()">
                            <svg id="image-placeholder" class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                            </svg>
                        <div class="mt-4 flex justify-center text-sm/6 text-gray-600">
                            <p class="pr-1">Klik untuk </p>
                            <label for="foto" class="relative cursor-pointer rounded-md bg-white font-semibold text-teal-600 focus-within:ring-2 focus-within:ring-teal-600 focus-within:ring-offset-2 focus-within:outline-hidden hover:text-teal-500">
                            <span> Upload foto</span>
                            <input id="foto" name="foto" type="file" class="sr-only" onchange="previewImage(event)">
                            </label>
                        </div>
                        <p class="text-xs/5 text-gray-600">File PNG atau JPG maksimal 10MB</p>
                        </div>
                    </div>
                </div>
            
                <div class="form-group pt-5">
                    <label for="video" class="block text-sm/6 font-medium text-gray-900">Video (YouTube / Google Drive)</label>
                    <div class="mt-2">
                      <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-teal-600">
                        <input type="text" name="video" id="video" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Masukkan link video YouTube atau Google Drive pementasan" value="{{ old('no_video') }}" required>
                      </div>
                    </div>
                </div>
            
                <div class="form-group pt-5">
                    <label for="cover-photo" class="block text-sm font-medium text-gray-900">Dokumen Kajian (Opsional)</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                        <div id="file-display" class="hidden mt-4 border rounded-md px-4 py-2 bg-gray-100 text-left relative">
                            <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-800" id="display-name">File Name</p>
                                <p class="text-xs text-gray-500" id="display-size">File Size</p>
                            </div>
                            <div class="flex gap-2">
                                <a id="download-link" class="text-indigo-600 hover:text-indigo-800" download>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"/>
                                </svg>
                                </a>
                                <button onclick="removeFile()" class="text-red-600 hover:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                </button>
                            </div>
                            </div>
                        </div>
                    
                            <i id="file-placeholder" class='bx bx-cloud-upload text-6xl text-gray-300 mt-4'></i>
                    
                        <div class="mt-4 flex justify-center text-sm text-gray-600">
                            <p class="pr-1">Klik untuk </p>
                            <label for="dokumen_kajian" class="relative cursor-pointer rounded-md bg-white font-semibold text-teal-600 focus-within:ring-2 focus-within:ring-teal-600 focus-within:ring-offset-2 hover:text-teal-500">
                            <span>Upload file</span>
                            <input id="dokumen_kajian" name="dokumen_kajian" type="file" class="sr-only" onchange="displayFile(event)">
                            </label>
                        </div>
                        <p class="text-xs/5 text-gray-600">File PDF maksimal 2MB</p>
                        </div>
                    </div>
                </div>

                {{-- <div class="pt-7">
                    <p class="text-sm/6 text-gray-400">Sisa token Anda: <span id="remaining-tokens">3</span></p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 mt-2">
                        <div id="token-progress" class="bg-teal-500 h-2.5 rounded-full" style="width: 100%;"></div>
                    </div>
                    <button id="reset-token" class="mt-3 py-2 px-4 bg-red-500 text-white rounded-lg hover:bg-red-700">Reset Token</button>
                </div> --}}
            
                <div class="pt-3 flex gap-5 justify-end">
                    <a href="{{ route('landing.index') }}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-gray-500 text-white hover:bg-gray-700 focus:outline-hidden focus:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none">Batal</a>
                    <button type="submit" class="py-3 px-8 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-500 text-white hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>

    @include('pages.landing.components_landing.footer_landing')

<script>

    const randomString = localStorage.getItem('randomString');
    if (randomString) {
        console.log('Random String:', randomString);
    } else {
        localStorage.setItem('randomString', '{{ $randomString }}');
    }

    function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('image-preview');
    const placeholder = document.getElementById('image-placeholder');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
        placeholder.style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
        }
      }

    function hideSVG() {
      const placeholder = document.getElementById('image-placeholder');
      const fileName = document.getElementById('file-name');
      placeholder.style.display = 'none';
    }

  function displayFile(event) {
  const file = event.target.files[0];
  if (!file) return;

  const fileDisplay = document.getElementById('file-display');
  const placeholder = document.getElementById('file-placeholder');
  const displayName = document.getElementById('display-name');
  const displaySize = document.getElementById('display-size');
  const downloadLink = document.getElementById('download-link');

  placeholder.style.display = 'none';
  fileDisplay.classList.remove('hidden');
  
  displayName.textContent = file.name;
  displaySize.textContent = `Size: ${(file.size / (1024 * 1024)).toFixed(2)} MB`;

  const reader = new FileReader();
  reader.onload = function(e) {
    downloadLink.href = e.target.result;
    downloadLink.download = file.name;
  };
  reader.readAsDataURL(file);
}

    function removeFile() {
    document.getElementById('dokumen_kajian').value = "";
    document.getElementById('file-display').classList.add('hidden');
    document.getElementById('file-placeholder').style.display = 'block';
    }

    // document.addEventListener('DOMContentLoaded', function () {
    //     const tokenUsage = localStorage.getItem('tokenUsage') ? JSON.parse(localStorage.getItem('tokenUsage')) : {};
    //     const currentDate = new Date().toISOString().split('T')[0];
    //     const kunciToken = document.getElementById('kunci_token').value;

    //     if (!tokenUsage[currentDate]) {
    //         tokenUsage[currentDate] = {};
    //     }

    //     if (!tokenUsage[currentDate][kunciToken]) {
    //         tokenUsage[currentDate][kunciToken] = 0;
    //     }

    //     const maxTokens = 3;
    //     const usedTokens = tokenUsage[currentDate][kunciToken];
    //     const remainingTokens = maxTokens - usedTokens;

    //     document.getElementById('remaining-tokens').textContent = remainingTokens;
    //     const progressPercentage = (remainingTokens / maxTokens) * 100;
    //     document.getElementById('token-progress').style.width = `${progressPercentage}%`;

    //     if (remainingTokens <= 0) {
    //         document.querySelector('button[type="submit"]').disabled = true;
    //     }

    //     document.querySelector('form').addEventListener('submit', function (event) {
    //         event.preventDefault(); // Prevent default form submission

    //         const form = event.target;
    //         const formData = new FormData(form);

    //         fetch(form.action, {
    //             method: form.method,
    //             body: formData,
    //             headers: {
    //                 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
    //             }
    //         })
    //         .then(response => {
    //             if (response.ok) {
    //                 tokenUsage[currentDate][kunciToken]++;
    //                 localStorage.setItem('tokenUsage', JSON.stringify(tokenUsage));

    //                 const updatedRemainingTokens = maxTokens - tokenUsage[currentDate][kunciToken];
    //                 document.getElementById('remaining-tokens').textContent = updatedRemainingTokens;
    //                 document.getElementById('token-progress').style.width = `${(updatedRemainingTokens / maxTokens) * 100}%`;

    //                 if (updatedRemainingTokens <= 0) {
    //                     document.querySelector('button[type="submit"]').disabled = true;
    //                 }

    //                 alert('Form submitted successfully!');
    //                 window.location.href = "{{ route('landing.kebudayaan') }}";
    //             } else {
    //                 alert('Failed to submit the form. Please try again.');
    //             }
    //         })
    //         .catch(error => {
    //             console.error('Error:', error);
    //             alert('An error occurred. Please try again.');
    //         });
    //     });

    //     // document.getElementById('reset-token').addEventListener('click', function () {
    //     //     if (confirm('Are you sure you want to reset your tokens?')) {
    //     //         delete tokenUsage[currentDate][kunciToken];
    //     //         localStorage.setItem('tokenUsage', JSON.stringify(tokenUsage));
    //     //         document.getElementById('remaining-tokens').textContent = maxTokens;
    //     //         document.getElementById('token-progress').style.width = '100%';
    //     //         document.querySelector('button[type="submit"]').disabled = false;
    //     //         alert('Tokens have been reset.');
    //     //     }
    //     // });

    //     // Reset usage at midnight
    //     setInterval(() => {
    //         const now = new Date();
    //         if (now.getHours() === 0 && now.getMinutes() === 0) {
    //             localStorage.removeItem('tokenUsage');
    //         }
    //     }, 60000); // Check every minute
    // });

</script>
</body>
</html>