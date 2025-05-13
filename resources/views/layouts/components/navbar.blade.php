<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li>
        <div class="nav-item mr-2 mt-1">
          <form action="/logout" method="post">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-outline-danger btn-sm">Log Out</button>
          </form>
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->