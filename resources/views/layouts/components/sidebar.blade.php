<!-- Main Sidebar Container -->

@php
  $menus =[
    (Object)[
      "title" => "Dashboard",
      "path" => "/",
      "icon" => "fas fa-home",
    ],

    (Object)[
      "title" => "OPK/WBTB",
      "path" => "opk",
      "icon" => "fas fa-theater-masks ",
    ],

    (Object)[
      "title" => "ODCB/CB",
      "path" => "odcb",
      "icon" => "fas fa-landmark",
    ],

    (Object)[
      "title" => "KEGIATAN",
      "path" => "kegiatan",
      "icon" => "fas fa-briefcase",
    ],
];
@endphp

<aside class="main-sidebar sidebar-dark-teal elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-decoration-none">
      <img src="{{ asset ('templates/dist/img/icon_disbud.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold text-balance">Gedog CB Badung</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @foreach ($menus as $menu )
          <li class="nav-item">
            <a href="{{$menu->path[0]!== '/' ? '/' . $menu->path : $menu->path }}" class="nav-link {{ request()->path() === $menu->path ? 'active' : ''  }}">
              <i class="nav-icon {{ $menu->icon }}"></i>
              <p>
                {{ $menu->title }}
              </p>
            </a>
          </li>
          @endforeach

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>