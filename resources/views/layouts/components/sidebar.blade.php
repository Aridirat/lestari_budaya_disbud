@php
    $menus = [
        (object) [
            "title" => "Dashboard", 
            "path" => "/", 
            "icon" => "fas fa-tachometer-alt",
            "active" => request()->is('/')
        ],
        (object) [
            "title" => "OPK", 
            "path" => "opk", 
            "icon" => "fas fa-book",
            "active" => request()->is('opk*')
        ],
        (object) [
            "title" => "ODCB", 
            "path" => "odcb", 
            "icon" => "fas fa-landmark",
            "active" => request()->is('odcb*')
        ],
        (object) [
            "title" => "Kegiatan", 
            "path" => "kegiatan", 
            "icon" => "fas fa-calendar-alt",
            "active" => request()->is('kegiatan*')
        ]
    ];
@endphp

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

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach ($menus as $menu)
                    <li class="nav-item">
                        <a href="{{ url($menu->path) }}" class="nav-link {{ $menu->active ? 'active' : '' }}">
                            <i class="nav-icon {{ $menu->icon }}"></i>
                            <p>
                                {{ $menu->title }}
                                @if($menu->active && request()->segment(2))
                                    <span class="right badge badge-light text-dark">{{ ucfirst(request()->segment(2)) }}</span>
                                @endif
                            </p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

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
</aside>
