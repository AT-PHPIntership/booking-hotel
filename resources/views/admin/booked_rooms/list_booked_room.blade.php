@extends('admin/layout/index')

@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('admin/booked_room.booked_room_list.booked_room_table') }}</h4>
            @if (session('message'))
                <div class="alert alert-{{ session('status') }}">{{ session('message') }}</div>
            @endif
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{ __('admin/booked_room.booked_room_list.booked_room_id') }}</th>
                    <th>{{ __('admin/booked_room.booked_room_list.booked_room_user') }}</th>
                    <th>{{ __('admin/booked_room.booked_room_list.booked_room_room') }}</th>
                    <th>{{ __('admin/booked_room.booked_room_list.booked_room_date_check_in') }}</th>
                    <th>{{ __('admin/booked_room.booked_room_list.booked_room_date_check_out') }}</th>
                    <th>{{ __('admin/booked_room.booked_room_list.booked_room_status') }}</th>
                    <th>{{ __('admin/booked_room.booked_room_list.booked_room_phone') }}</th>
                    <th>{{ __('admin/booked_room.booked_room_list.booked_room_edit') }}</th>
                    <th>{{ __('admin/booked_room.booked_room_list.booked_room_delete') }}</th>
                </tr>
                </thead>
                <tbody>
                 	@foreach($bookedRooms as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ $item->room->hotel->name }}<br>{{ $item->room->name }}</td>
                        <td>{{ $item->date_in }}</td>
                        <td>{{ $item->date_out }}</td>
                        <td>
                            {{$item->status == config("define.status.enable") ?  __('admin/booked_room.booked_room_list.booked_room_enable') : __('admin/booked_room.booked_room_list.booked_room_disable') }}
                        </td>
                        <td>{{ $item->user->phone }}</td>
                        <td>
                            <a href="{{ route('booked-rooms.edit', $item->id) }}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit">{{ __('admin/booked_room.booked_room_list.booked_room_edit') }}</i></a>
                        </td>
                        <td>
                            <form action="{{ route('booked-rooms.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('admin/booked_room.booked_room_list.booked_room_confirm')  }} {{$item->room->hotel->name}}')">
                                    <i class="fas fa-trash-alt">{{ __('admin/booked_room.booked_room_list.booked_room_delete') }}</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="d-flex justify-content-center mt-2">
                {!! $bookedRooms->links() !!}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
