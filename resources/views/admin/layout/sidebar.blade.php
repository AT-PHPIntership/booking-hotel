<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">{{ __('admin/layout.sidebar.dashboard') }}</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-user" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-content-copy"></i>
        <span class="menu-title">{{ __('admin/layout.sidebar.users') }}</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-user">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route("users.index")}}">{{ __('admin/layout.sidebar.list_user') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route("users.create")}}">{{ __('admin/layout.sidebar.add_user') }}</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-hotel" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-content-copy"></i>
        <span class="menu-title">{{ __('admin/layout.sidebar.hotel') }}</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-hotel">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route("hotels.index")}}">{{ __('admin/layout.sidebar.list_hotel') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route("hotels.create")}}">{{ __('admin/layout.sidebar.add_hotel') }}</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="menu-icon mdi mdi-sticker"></i>
        <span class="menu-title">{{ __('admin/layout.sidebar.print_invoice') }}</span>
      </a>
    </li>
  </ul>
</nav>
