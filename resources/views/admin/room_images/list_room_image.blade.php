@extends('admin/layout/index')

@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('admin/room_image.room_image_list.room_image_table') }}</h4>
            @if (session('message'))
                <div class="alert alert-{{ session('status') }}">{{ session('message') }}</div>
            @endif
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{ __('admin/room_image.room_image_list.room_image_id') }}</th>
                    <th>{{ __('admin/room_image.room_image_list.room_image_image') }}</th>
                    <th>{{ __('admin/room_image.room_image_list.room_image_delete') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roomImages as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><img src="upload/room/{{$item->image}}" alt="no image" alt="Cinque Terre" id="room-image-{{$item->id}}" class="rounded"></td>
                    <td>
                        <form action="{{ route('room-images-delete', $item->id) }}" method="post">
                      		@csrf
                          <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('admin/room_image.room_image_list.room_image_confirm') }}')">
                              <i class="fas fa-trash-alt">{{ __('admin/room_image.room_image_list.room_image_delete') }}</i>
                          </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <div class="d-flex justify-content-center mt-2">
                {!! $roomImages->links() !!}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
