@extends('admin/layout/index')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('admin/room.room_edit.room_table') }}</h4>
            @include('admin/layout/print_error')
            <form class="forms-sample" method="post" action="{{route('rooms.update', $room->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputName1">{{ __('admin/room.room_edit.room_name') }}</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="{{ __('admin/room.room_edit.room_name') }}" name="name" value="{{ $room->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">{{ __('admin/room.room_edit.room_hotel') }}</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="hotel_id">
                        @foreach ($hotels as $item)
                            <option value="{{$item->id}}" {{ $room->hotel_id == $item->id ? "selected" : '' }}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">{{ __('admin/room.room_edit.room_type') }}</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="room_type_id">
                        @foreach ($roomTypes as $item)
                            <option value="{{$item->id}}" {{ $room->room_type_id == $item->id ? "selected" : '' }}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">{{ __('admin/room.room_edit.room_price') }}</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="{{ __('admin/room.room_edit.room_price') }}" name="price" value="{{ $room->price }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">{{ __('admin/room.room_edit.room_discount') }}</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="{{ __('admin/room.room_edit.room_discount') }}" name="discount" value="{{ $room->discount }}">
                </div>

                <div class="form-group row">
		            <label class="col-sm-3 col-form-label">{{ __('admin/room.room_edit.room_status') }}</label>
		            <div class="col-sm-4">
		                <div class="form-radio">
		                    <label class="form-check-label">
		                        <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="1" {{ $room->status ? "checked" : '' }}> {{ __('admin/room.room_edit.room_enable') }}
		                    </label>
		                </div>
		            </div>
		            <div class="col-sm-5">
		                <div class="form-radio">
		                    <label class="form-check-label">
		                        <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="0" {{ $room->status ? '' : "checked" }}>
		                        {{ __('admin/room.room_edit.room_disable') }}
		                    </label>
		                </div>
		            </div>
			    </div>

                <div class="form-group">
                    <label>{{ __('admin/room.room_edit.image_upload') }}</label>
                    <input type="file" name="image[]" class="form-control" multiple>
                    <input type="text" name="image-delete" class="form-control" hidden id="image-delete">
                    @foreach ($roomImages as $item)
                        <div class="card js-room-image" id="js-room-image-{{$item->id}}" style="width: 50%; display: inline;">
                        	<img src="upload/room/{{$item->image}}" alt="no image" alt="Cinque Terre" style="width: 10%;" id="{{$item->id}}" class="js-room-image-item">
                            <span id='js-delele-{{$item->id}}' style="display: none;">{{ __('admin/room.room_edit.room_delete_image') }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">{{ __('admin/room.room_edit.room_description') }}</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="5" name="descript">{{ $room->descript }}</textarea>
                </div>
                <button type="submit" class="btn btn-success mr-2">{{ __('admin/room.room_edit.room_submit') }}</button>
                <button type="reset" class="btn btn-light">{{ __('admin/room.room_edit.room_reset') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('js/admin/edit_room.js') }}"></script>
@endsection
