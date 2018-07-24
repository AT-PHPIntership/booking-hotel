<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">{{ __('admin/admin.dashboard') }}</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-user" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-content-copy"></i>
        <span class="menu-title">{{ __('admin/admin.Users') }}</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-user">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="/admin/users/list">{{ __('admin/admin.List_User') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/users/add">{{ __('admin/admin.Add_User') }}</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-hotel" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-content-copy"></i>
        <span class="menu-title">{{ __('admin/admin.dashboard') }}</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-hotel">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="/admin/hotels/list">{{ __('admin/admin.List_Hotels') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/hotels/add">{{ __('admin/admin.Add_Hotel') }}</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="menu-icon mdi mdi-sticker"></i>
        <span class="menu-title">{{ __('admin/admin.Print_Invoice') }}</span>
      </a>
    </li>
  </ul>
</nav>
