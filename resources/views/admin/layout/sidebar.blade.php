<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
    <li class="nav-item">
    <a class="nav-link" href="{{route("admin")}}">
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
    <a class="nav-link" data-toggle="collapse" href="#ui-room-type" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-content-copy"></i>
        <span class="menu-title">{{ __('admin/layout.sidebar.room_types') }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-room-type">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item">
            <a class="nav-link" href="{{route("room-types.index")}}">{{ __('admin/layout.sidebar.list_room_type') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route("room-types.create")}}">{{ __('admin/layout.sidebar.add_room_type') }}</a>
        </li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-room" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-content-copy"></i>
        <span class="menu-title">{{ __('admin/layout.sidebar.rooms') }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-room">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item">
            <a class="nav-link" href="{{route("rooms.index")}}">{{ __('admin/layout.sidebar.list_room') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route("rooms.create")}}">{{ __('admin/layout.sidebar.add_room') }}</a>
        </li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-service-type" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-content-copy"></i>
        <span class="menu-title">{{ __('admin/layout.sidebar.service_types') }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-service-type">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item">
            <a class="nav-link" href="{{route("service-types.index")}}">{{ __('admin/layout.sidebar.list_service_type') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route("service-types.create")}}">{{ __('admin/layout.sidebar.add_service_type') }}</a>
        </li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-city" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-content-copy"></i>
        <span class="menu-title">{{ __('admin/layout.sidebar.cities') }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-city">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item">
            <a class="nav-link" href="{{route("cities.index")}}">{{ __('admin/layout.sidebar.list_cities') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route("cities.create")}}">{{ __('admin/layout.sidebar.add_city') }}</a>
        </li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-service" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-content-copy"></i>
        <span class="menu-title">{{ __('admin/layout.sidebar.services') }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-service">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item">
            <a class="nav-link" href="{{route("services.index")}}">{{ __('admin/layout.sidebar.list_services') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route("services.create")}}">{{ __('admin/layout.sidebar.add_service') }}</a>
        </li>
        </ul>
    </div>
    <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-booked-room" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-content-copy"></i>
        <span class="menu-title">{{ __('admin/layout.sidebar.booked_rooms') }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-booked-room">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item">
            <a class="nav-link" href="{{route("booked-rooms.index")}}">{{ __('admin/layout.sidebar.list_booked_rooms') }}</a>
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
