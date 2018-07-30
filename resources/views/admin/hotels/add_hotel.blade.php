@extends('admin/layout/index')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('admin/hotel.hotel_add.hotel_table') }}</h4>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
            @endif
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            <form class="forms-sample" method="post" action="{{route('hotels.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">{{ __('admin/hotel.hotel_add.hotel_name') }}</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="{{ __('admin/hotel.hotel_add.hotel_name') }}" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">{{ __('admin/hotel.hotel_add.hotel_address') }}</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="{{ __('admin/hotel.hotel_add.hotel_address') }}" name="address">
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">{{ __('admin/hotel.hotel_add.hotel_city') }}</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="city_id">
                        @foreach ($hotel as $item)
                            <option value="{{$item->city->id}}">{{$item->city->city}}, {{$item->city->country}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status">{{ __('admin/hotel.hotel_add.hotel_enable') }}
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect3">{{ __('admin/hotel.hotel_add.rank_hotel') }}</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="number_star">
                        <option value="1">{{ __('admin/hotel.hotel_add.one_star') }}</option>
                        <option value="2">{{ __('admin/hotel.hotel_add.two_star') }}</option>
                        <option value="3">{{ __('admin/hotel.hotel_add.three_star') }}</option>
                        <option value="4">{{ __('admin/hotel.hotel_add.four_star') }}</option>
                        <option value="5">{{ __('admin/hotel.hotel_add.five_star') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>{{ __('admin/hotel.hotel_add.image_upload') }}</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">{{ __('admin/hotel.hotel_add.hotel_description') }}</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="5" name="descript"></textarea>
                </div>
                <button type="submit" class="btn btn-success mr-2">{{ __('admin/hotel.hotel_add.submit') }}</button>
                <button type="reset" class="btn btn-light">{{ __('admin/hotel.hotel_add.reset') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection