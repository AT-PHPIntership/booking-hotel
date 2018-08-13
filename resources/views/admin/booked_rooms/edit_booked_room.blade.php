@extends('admin/layout/index')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title">{{ __('admin/booked_room.booked_room_edit.booked_room_table') }}</h4>
    @include('admin/layout/print_error')    
    <form class="forms-sample" action="{{ route('booked-rooms.update', $bookedRoom->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/booked_room.booked_room_edit.booked_room_user') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{$bookedRoom->user->username}}" name="user_id" disabled>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/booked_room.booked_room_edit.booked_room_hotel') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{$bookedRoom->room->hotel->name}}" name="room_id" disabled>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/booked_room.booked_room_edit.booked_room_date_in') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{$bookedRoom->date_in}}" name="date_in" disabled>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/booked_room.booked_room_edit.booked_room_date_out') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{$bookedRoom->date_out}}" name="date_out" disabled>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">{{ __('admin/booked_room.booked_room_edit.booked_room_status') }}</label>
            <div class="col-sm-4">
                <div class="form-radio">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="1" {{$bookedRoom->status == config("define.status.enable") ? "checked" : '' }}> {{ __('admin/booked_room.booked_room_edit.booked_room_enable') }}
                    </label>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-radio">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="0" {{$bookedRoom->status == config("define.status.disable") ? "checked" : '' }}>
                        {{ __('admin/booked_room.booked_room_edit.booked_room_disable') }}
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success mr-2">{{ __('admin/booked_room.booked_room_edit.booked_room_edit') }}</button>
        <button type="reset" class="btn btn-light">{{ __('admin/booked_room.booked_room_edit.booked_room_reset') }}</button>
    </form>
    </div>
</div>
</div>
@endsection
