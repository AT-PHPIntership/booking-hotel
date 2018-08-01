@extends('admin/layout/index')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title">{{ __('admin/room_type.room_type_edit.room_type_table') }}</h4>
    <form class="forms-sample" action="{{ route('room-types.update', $roomType->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/room_type.room_type_edit.room_type_name') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{$roomType->name}}" name="name">
        </div>
        @if($errors->first('name'))
            <div class="text-danger">{{ $errors->first('name') }}</div>
        @endif
        <button type="submit" class="btn btn-success mr-2">{{ __('admin/room_type.room_type_edit.submit') }}</button>
        <button type="reset" class="btn btn-light">{{ __('admin/room_type.room_type_edit.reset') }}</button>
    </form>
    </div>
</div>
</div>
@endsection