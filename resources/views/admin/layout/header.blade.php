<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="index.html">
      <img src="admin/images/logo.svg" alt="logo" />
    </a>
    <a class="navbar-brand brand-logo-mini" href="index.html">
      <img src="admin/images/logo-mini.svg" alt="logo" />
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
    <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
      <li class="nav-item">
        <a href="#" class="nav-link">{{ __('admin/layout.header.home') }}</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">{{ __('admin/layout.header.contract') }}</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">{{ __('admin/layout.header.description') }}</a>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
      @else
      <li class="nav-item dropdown d-none d-xl-inline-block">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <span class="profile-text">{{ __('admin/layout.header.welcome') }} {{ Auth::user()->name }}</span>
          <img class="img-xs rounded-circle" src="admin/images/faces/face1.jpg" alt="Profile image">
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          
          <a class="dropdown-item mt-2">{{ __('admin/layout.header.manage_accounts') }}</a>
          <a class="dropdown-item">{{ __('admin/layout.header.change_password') }}</a>
          <a class="dropdown-item">{{ __('admin/layout.header.check_inbox') }}</a>
          <div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>
      </li>
      @endguest
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>
