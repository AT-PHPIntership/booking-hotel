@extends('admin/layout/index')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('admin/room.room_add.room_table') }}</h4>
            @include('admin/layout/print_error')
            <form class="forms-sample" method="post" action="{{route('rooms.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">{{ __('admin/room.room_add.room_name') }}</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="{{ __('admin/room.room_add.room_name') }}" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">{{ __('admin/room.room_add.room_hotel') }}</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="hotel_id">
                        @foreach ($hotels as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">{{ __('admin/room.room_add.room_type') }}</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="room_type_id">
                        @foreach ($roomTypes as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">{{ __('admin/room.room_add.room_price') }}</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="{{ __('admin/room.room_add.room_price') }}" name="price" value="{{ old('price') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">{{ __('admin/room.room_add.room_discount') }}</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="{{ __('admin/room.room_add.room_discount') }}" name="discount" value="{{ old('discount') }}">
                </div>

                <div class="form-group row">
		            <label class="col-sm-3 col-form-label">{{ __('admin/room.room_add.room_status') }}</label>
		            <div class="col-sm-4">
		                <div class="form-radio">
		                    <label class="form-check-label">
		                        <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="1" {{old('status') ? "checked" : '' }}> {{ __('admin/room.room_add.room_enable') }}
		                    </label>
		                </div>
		            </div>
		            <div class="col-sm-5">
		                <div class="form-radio">
		                    <label class="form-check-label">
		                        <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="0" {{ old('status') ? '' : "checked" }}>
		                        {{ __('admin/room.room_add.room_disable') }}
		                    </label>
		                </div>
		            </div>
			    </div>

                <div class="form-group">
                    <label>{{ __('admin/room.room_add.image_upload') }}</label>
                    <input type="file" name="image[]" class="form-control" multiple>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">{{ __('admin/room.room_add.room_description') }}</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="5" name="descript"></textarea>
                </div>

                <button type="submit" class="btn btn-success mr-2">{{ __('admin/room.room_add.room_submit') }}</button>
                <button type="reset" class="btn btn-light">{{ __('admin/room.room_add.room_reset') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
