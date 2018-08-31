@extends('admin/layout/index')

@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('admin/room.room_list.room_table') }}</h4>
            @if (session('message'))
                <div class="alert alert-{{ session('status') }}">{{ session('message') }}</div>
            @endif
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{ __('admin/room.room_list.room_id') }}</th>
                    <th>{{ __('admin/room.room_list.room_name') }}</th>
                    <th>{{ __('admin/room.room_list.room_type') }}</th>
                    <th>{{ __('admin/room.room_list.room_hotel') }}</th>
                    <th>{{ __('admin/room.room_list.room_edit') }}</th>
                    <th>{{ __('admin/room.room_list.room_delete') }}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->roomTypes->name }}</td>
                        <td>{{ $item->hotel->name }}</td>
                        <td>
                            <a href="{{ route('rooms.edit', $item->id) }}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit">{{ __('admin/room.room_list.room_edit') }}</i></a>
                        </td>
                        <td>
                            <form action="{{ route('rooms.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('admin/room.room_list.room_confirm') }} {{ $item->name }}')">
                                    <i class="fas fa-trash-alt">{{ __('admin/room.room_list.room_delete') }}</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="d-flex justify-content-center mt-2">
                {!! $rooms->links() !!}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
