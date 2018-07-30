@extends('admin/layout/index')

@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('admin/room_type.room_type_list.room_type_table') }}</h4>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{ __('admin/room_type.room_type_list.room_type_number') }}</th>
                    <th>{{ __('admin/room_type.room_type_list.user_created') }}</th>
                    <th>{{ __('admin/room_type.room_type_list.room_type_name') }}</th>
                    <th>{{ __('admin/room_type.room_type_list.room_type_edit') }}</th>
                    <th>{{ __('admin/room_type.room_type_list.room_type_delete') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roomType as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user->username }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('room-types.edit', $item->id) }}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit">{{ __('admin/room_type.room_type_list.room_type_edit') }}</i></a>
                    </td>
                    <td>
                        <form action="{{ route('room-types.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('admin/room_type.room_type_list.room_type_confirm') }}')">
                                <i class="fas fa-trash-alt">{{ __('admin/room_type.room_type_list.room_type_delete') }}</i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <div class="d-flex justify-content-center mt-2">
                {!! $roomType->links() !!}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
