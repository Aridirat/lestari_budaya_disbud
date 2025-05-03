@extends('layouts.main')

@section('header')
    {{-- <div class="row mb-2">
        <div class="col-sm-6">
                <h1 class="text-l font-bold tracking-tight text-gray-900">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item text-secondary">Dashboard</li>
          </ol>
        </div>
    </div> --}}
@endsection

@section('content')
  <div class="w-full px-6 py-6 mx-auto">
    <!-- row 1 -->
    <div class="flex flex-wrap -mx-3">

      <!-- card1 -->
      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full ">
                <div>
                  <p class="mb-0 font-sans text-xs font-semibold leading-normal uppercase dark:text-black dark:opacity-60">OPK</p>
                <h5 class="mb-2 font-bold dark:text-black">{{ $opkCount }}</h5>
                  {{-- <p class="mb-0 dark:text-black dark:opacity-60">
                    <span class="text-sm font-bold leading-normal text-emerald-500">+55%</span>
                    since yesterday
                  </p> --}}
                </div>
              </div>
              <div class="text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                  <i class="fas fa-theater-masks text-lg relative top-3 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- card2 -->
      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full ">
                <div>
                  <p class="mb-0 font-sans text-xs font-semibold leading-normal uppercase dark:text-black dark:opacity-60">ODCB</p>
                  <h5 class="mb-2 font-bold dark:text-black">{{ $odcbCount }}</h5>
                  {{-- <p class="mb-0 dark:text-black dark:opacity-60">
                    <span class="text-sm font-bold leading-normal text-emerald-500">+3%</span>
                    since last week
                  </p> --}}
                </div>
              </div>
              <div class=" text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                  <i class="fas fa-landmark text-lg relative top-3 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- card3 -->
      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full ">
                <div>
                  <p class="mb-0 font-sans text-xs font-semibold leading-normal uppercase dark:text-black dark:opacity-60">Kegiatan</p>
                  <h5 class="mb-2 font-bold dark:text-black">{{ $kegiatanCount }}</h5>
                  {{-- <p class="mb-0 dark:text-black dark:opacity-60">
                    <span class="text-xs font-bold leading-normal text-red-600">-2%</span>
                    since last quarter
                  </p> --}}
                </div>
              </div>
              <div class=" text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                  <i class="fas fa-calendar-alt text-lg relative top-3 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- card4 -->
      {{-- <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full ">
                <div>
                  <p class="mb-0 font-sans text-xs font-semibold leading-normal uppercase dark:text-black dark:opacity-60">Sales</p>
                  <h5 class="mb-2 font-bold dark:text-black">$103,430</h5>
                  
                </div>
              </div>
              <div class=" text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                  <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
    

    <!-- cards row 2 -->
    <div class="flex flex-wrap mt-6 -mx-3">
      <div class="w-full max-w-full px-3 mt-0 lg:w-12/12 lg:flex-none">
        <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
          {{-- <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
            <h6 class="capitalize dark:text-black">Sales overview</h6>
            <p class="mb-0 text-sm leading-normal dark:text-black dark:opacity-60">
              <i class="fa fa-arrow-up text-emerald-500"></i>
              <span class="font-semibold">4% more</span> in 2021
            </p>
          </div> --}}
          <div class="flex-auto p-4">
            <div>
              <form method="GET" class="mb-4 flex gap-4">
                <select name="view" onchange="this.form.submit()" class="border rounded p-2">
                  <option value="daily" {{ $viewType === 'daily' ? 'selected' : '' }}>Hari Ini</option>
                  <option value="monthly" {{ $viewType === 'monthly' ? 'selected' : '' }}>Bulanan</option>
                  <option value="yearly" {{ $viewType === 'yearly' ? 'selected' : '' }}>Tahunan</option>
                </select>
              
                @if($viewType === 'monthly')
                  <select name="month" onchange="this.form.submit()" class="border rounded p-2">
                    @foreach(range(1,12) as $m)
                      <option value="{{ $m }}" {{ $m == $selectedMonth ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $m)->format('F') }}
                      </option>
                    @endforeach
                  </select>
                @endif
              
                @if($viewType === 'monthly' || $viewType === 'yearly')
                  <select name="year" onchange="this.form.submit()" class="border rounded p-2">
                    @foreach(range(date('Y')-5, date('Y')+1) as $y)
                      <option value="{{ $y }}" {{ $y == $selectedYear ? 'selected' : '' }}>{{ $y }}</option>
                    @endforeach
                  </select>
                @endif
              </form>
              
              
              <div style="width: 100%; max-width: 100%; height: 400px;">
                <canvas id="chart-line" style="width: 100%; height: 100%;"></canvas>
              </div>
              
              
              
            </div>
          </div>
        </div>
      </div>

      <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
        <div slider class="relative w-full h-full  rounded-2xl">
          
          <div id='calendar'></div>
          

          <script>
            document.addEventListener('DOMContentLoaded', function () {
              var calendarEl = document.getElementById('calendar');
              var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($kegiatanDates),
                eventClick: function(info) {
                  if (info.event.url) {
                    window.location.href = info.event.url;
                    info.jsEvent.preventDefault();
                  }
                },
                eventColor: 'green',
                headerToolbar: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'dayGridMonth'
                },
              });
              calendar.render();
            });
          </script>

          <style>
            #calendar {
              margin-top: 2rem;
              background: white;
              padding: 1rem;
              border-radius: 1rem;
              box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            }
          </style>
          

      </div>
    </div>

    <!-- cards row 3 -->

    <div class="flex flex-wrap mt-6 -mx-3">
      <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
          <div class="p-4 pb-0 mb-0 rounded-t-4">
            <div class="flex justify-between">
              <h6 class="mb-2 dark:text-white">Sales by Country</h6>
            </div>
          </div>
          <div class="overflow-x-auto">
            <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
              <tbody>
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                    <div class="flex items-center px-2 py-1">
                      <div>
                        <img src="../assets/img/icons/flags/US.png" alt="Country flag" />
                      </div>
                      <div class="ml-6">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Country:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-black">United States</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                    <div class="text-center">
                      <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Sales:</p>
                      <h6 class="mb-0 text-sm leading-normal dark:text-black">2500</h6>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                    <div class="text-center">
                      <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Value:</p>
                      <h6 class="mb-0 text-sm leading-normal dark:text-black">$230,900</h6>
                    </div>
                  </td>
                  <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                    <div class="flex-1 text-center">
                      <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Bounce:</p>
                      <h6 class="mb-0 text-sm leading-normal dark:text-black">29.9%</h6>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                    <div class="flex items-center px-2 py-1">
                      <div>
                        <img src="../assets/img/icons/flags/DE.png" alt="Country flag" />
                      </div>
                      <div class="ml-6">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Country:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-black">Germany</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                    <div class="text-center">
                      <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Sales:</p>
                      <h6 class="mb-0 text-sm leading-normal dark:text-black">3.900</h6>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                    <div class="text-center">
                      <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Value:</p>
                      <h6 class="mb-0 text-sm leading-normal dark:text-black">$440,000</h6>
                    </div>
                  </td>
                  <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                    <div class="flex-1 text-center">
                      <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Bounce:</p>
                      <h6 class="mb-0 text-sm leading-normal dark:text-black">40.22%</h6>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                    <div class="flex items-center px-2 py-1">
                      <div>
                        <img src="../assets/img/icons/flags/GB.png" alt="Country flag" />
                      </div>
                      <div class="ml-6">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Country:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-black">Great Britain</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                    <div class="text-center">
                      <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Sales:</p>
                      <h6 class="mb-0 text-sm leading-normal dark:text-black">1.400</h6>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                    <div class="text-center">
                      <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Value:</p>
                      <h6 class="mb-0 text-sm leading-normal dark:text-black">$190,700</h6>
                    </div>
                  </td>
                  <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                    <div class="flex-1 text-center">
                      <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Bounce:</p>
                      <h6 class="mb-0 text-sm leading-normal dark:text-black">23.44%</h6>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="p-2 align-middle bg-transparent border-0 w-3/10 whitespace-nowrap">
                    <div class="flex items-center px-2 py-1">
                      <div>
                        <img src="../assets/img/icons/flags/BR.png" alt="Country flag" />
                      </div>
                      <div class="ml-6">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Country:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-black">Brasil</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-0 whitespace-nowrap">
                    <div class="text-center">
                      <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Sales:</p>
                      <h6 class="mb-0 text-sm leading-normal dark:text-black">562</h6>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-0 whitespace-nowrap">
                    <div class="text-center">
                      <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Value:</p>
                      <h6 class="mb-0 text-sm leading-normal dark:text-black">$143,960</h6>
                    </div>
                  </td>
                  <td class="p-2 text-sm leading-normal align-middle bg-transparent border-0 whitespace-nowrap">
                    <div class="flex-1 text-center">
                      <p class="mb-0 text-xs font-semibold leading-tight dark:text-black dark:opacity-60">Bounce:</p>
                      <h6 class="mb-0 text-sm leading-normal dark:text-black">32.14%</h6>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
        <div class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
          <div class="p-4 pb-0 rounded-t-4">
            <h6 class="mb-0 dark:text-black">Categories</h6>
          </div>
          <div class="flex-auto p-4">
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
              <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-t-lg rounded-xl text-inherit">
                <div class="flex items-center">
                  <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                    <i class="text-white ni ni-mobile-button relative top-0.75 text-xxs"></i>
                  </div>
                  <div class="flex flex-col">
                    <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-black">Devices</h6>
                    <span class="text-xs leading-tight dark:text-black/80">250 in stock, <span class="font-semibold">346+ sold</span></span>
                  </div>
                </div>
                <div class="flex">
                  <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-black"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                </div>
              </li>
              <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-xl text-inherit">
                <div class="flex items-center">
                  <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                    <i class="text-white ni ni-tag relative top-0.75 text-xxs"></i>
                  </div>
                  <div class="flex flex-col">
                    <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-black">Tickets</h6>
                    <span class="text-xs leading-tight dark:text-black/80">123 closed, <span class="font-semibold">15 open</span></span>
                  </div>
                </div>
                <div class="flex">
                  <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-black"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                </div>
              </li>
              <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-b-lg rounded-xl text-inherit">
                <div class="flex items-center">
                  <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                    <i class="text-white ni ni-box-2 relative top-0.75 text-xxs"></i>
                  </div>
                  <div class="flex flex-col">
                    <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-black">Error logs</h6>
                    <span class="text-xs leading-tight dark:text-black/80">1 is active, <span class="font-semibold">40 closed</span></span>
                  </div>
                </div>
                <div class="flex">
                  <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-black"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                </div>
              </li>
              <li class="relative flex justify-between py-2 pr-4 border-0 rounded-b-lg rounded-xl text-inherit">
                <div class="flex items-center">
                  <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                    <i class="text-white ni ni-satisfied relative top-0.75 text-xxs"></i>
                  </div>
                  <div class="flex flex-col">
                    <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-black">Happy users</h6>
                    <span class="text-xs leading-tight dark:text-black/80"><span class="font-semibold">+ 430 </span></span>
                  </div>
                </div>
                <div class="flex">
                  <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-black"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      
    </div>
    </div>
    </div>

    <footer class="pt-4">
      <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
          
          
        </div>
      </div>
    </footer>
  </div>
  <!-- end cards -->

  

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const ctx = document.getElementById('chart-line').getContext('2d');
  
      const chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: @json($labels),
          datasets: [
            {
              label: 'OPK',
              data: @json($opkData),
              borderColor: 'rgba(54, 162, 235, 1)',
              backgroundColor: 'rgba(54, 162, 235, 0.1)',
              pointBackgroundColor: 'rgba(54, 162, 235, 1)',
              fill: false,
              tension: 0.3
            },
            {
              label: 'ODCB',
              data: @json($odcbData),
              borderColor: 'rgba(255, 99, 132, 1)',
              backgroundColor: 'rgba(255, 99, 132, 0.1)',
              pointBackgroundColor: 'rgba(255, 99, 132, 1)',
              fill: false,
              tension: 0.3
            }
            // ,
            // {
            //   label: 'Kegiatan',
            //   data: @json($kegiatanData),
            //   borderColor: 'rgba(75, 192, 192, 1)',
            //   backgroundColor: 'rgba(75, 192, 192, 0.1)',
            //   pointBackgroundColor: 'rgba(75, 192, 192, 1)',
            //   fill: false,
            //   tension: 0.3
            // }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            title: {
              display: true,
              text: 'Grafik Statistik'
            },
            legend: {
              position: 'top'
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                precision: 0,
                stepSize: 1
              }
            }
          }
        }
      });
    });
  </script>

{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  let chartInstance = null;

  window.addEventListener("load", function () {
    const canvas = document.getElementById('chart-line');
    if (!canvas) {
      console.warn('Canvas #chart-line tidak ditemukan!');
      return;
    }

    const ctx = canvas.getContext('2d');

    // ✅ Destroy chart lama jika sudah ada
    if (chartInstance) {
      chartInstance.destroy();
    }

    chartInstance = new Chart(ctx, {
      type: 'line',
      data: {
        labels: @json($labels),
        datasets: [
          {
            label: 'OPK',
            data: @json($opkData),
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.1)',
            pointBackgroundColor: 'rgba(54, 162, 235, 1)',
            fill: false,
            tension: 0.3
          },
          {
            label: 'ODCB',
            data: @json($odcbData),
            borderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.1)',
            pointBackgroundColor: 'rgba(255, 99, 132, 1)',
            fill: false,
            tension: 0.3
          },
          {
            label: 'Kegiatan',
            data: @json($kegiatanData),
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.1)',
            pointBackgroundColor: 'rgba(75, 192, 192, 1)',
            fill: false,
            tension: 0.3
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          title: {
            display: true,
            text: 'Grafik Statistik'
          },
          legend: {
            position: 'top'
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              precision: 0,
              stepSize: 1
            }
          }
        }
      }
    });
  });
</script> --}}


@endsection

