@extends('admin/layout/index')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title">{{ __('admin/city.city_add.city_table') }}</h4>
    <form class="forms-sample" action="{{ route('cities.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label>{{ __('admin/city.city_add.city') }}</label>
            <input type="text" class="form-control" id="city" placeholder="{{ __('admin/city.city_add.city_name') }}" name="city">
        </div>
        @if($errors->first('city'))
            <div class="text-danger">{{ $errors->first('city') }}</div>
        @endif
        <div class="form-group">
            <label>{{ __('admin/city.city_add.country') }}</label>
            <input type="text" class="form-control" id="country" placeholder="{{ __('admin/city.city_add.country_name') }}" name="country">
        </div>
        @if($errors->first('country'))
            <div class="text-danger">{{ $errors->first('country') }}</div>
        @endif
        <button type="submit" class="btn btn-success mr-2">{{ __('admin/city.city_add.submit') }}</button>
        <button type="reset" class="btn btn-light">{{ __('admin/city.city_add.reset') }}</button>
    </form>
    </div>
</div>
</div>
@endsection
