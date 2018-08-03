@extends('admin/layout/index')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title">{{ __('admin/city.city_edit.city_table') }}</h4>
    <form class="forms-sample" action="{{ route('room-types.update', $city->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>{{ __('admin/city.city_edit.city_name') }}</label>
            <input type="text" class="form-control" id="city" value="{{$city->city}}" name="city">
        </div>
        @if($errors->first('city'))
            <div class="text-danger">{{ $errors->first('city') }}</div>
        @endif
        <div class="form-group">
            <label>{{ __('admin/city.city_edit.country_name') }}</label>
            <input type="text" class="form-control" id="country" value="{{$city->country}}" name="country">
        </div>
        @if($errors->first('country'))
            <div class="text-danger">{{ $errors->first('country') }}</div>
        @endif
        <button type="submit" class="btn btn-success mr-2">{{ __('admin/city.city_edit.submit') }}</button>
        <button type="reset" class="btn btn-light">{{ __('admin/city.city_edit.reset') }}</button>
    </form>
    </div>
</div>
</div>
@endsection