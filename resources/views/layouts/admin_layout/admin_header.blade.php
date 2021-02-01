<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('dashboard')}}" class="nav-link">{{trans('admin.home') }}</a>
    </li>

  </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-globe"></i>
          {{trans('admin.lang') }}
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="{{ route('lang','ar') }}" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <div class="media-body">

              <h3 class="dropdown-item-title">
              <i class="fa fa-flag"></i>   عربي

              </h3>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('lang','en') }}" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                <i class="fa fa-flag"></i>   English
              </h3>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        </a>

      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="{{route('logout')}}" >
       {{trans('admin.logout') }}
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
