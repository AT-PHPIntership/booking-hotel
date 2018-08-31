@extends('admin/layout/index')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('admin/hotel.hotel_edit.hotel_table') }}</h4>
            @include('admin/layout/print_error')
            <form class="forms-sample" method="post" action="{{ route('hotels.update', $hotel->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputName1">{{ __('admin/hotel.hotel_edit.hotel_name') }}</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="{{$hotel->name}}" name="name">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">{{ __('admin/hotel.hotel_edit.hotel_address') }}</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="{{$hotel->address}}" name="address">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputCity1">{{ __('admin/hotel.hotel_edit.hotel_city') }}</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="city_id">
                        @foreach($city as $item)
                            @if($hotel->city_id == $item->id)
                                <option value="{{$item->id}}" selected="selected">{{$item->city}}, {{$item->country}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->city}}, {{$item->country}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" checked="{{$hotel->status}}">{{ __('admin/hotel.hotel_edit.hotel_enable') }}
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect3">{{ __('admin/hotel.hotel_edit.rank_hotel') }}</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="number_star">
                        @for($i = 1; $i <=5; $i++)
                            @if($hotel->number_star == $i)
                                <option value="{{$i}}" selected="selected">{{$i}} {{ __('admin/hotel.hotel_list.hotel_star') }}</option>
                            @else
                                <option value="{{$i}}">{{$i}} {{ __('admin/hotel.hotel_list.hotel_star') }}</option>
                            @endif
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect3">{{ __('admin/hotel.hotel_add.service_hotel') }}</label>
                    <div class="form-check">
                        @foreach ($service as $item)
                            <label>{{$item->name}}</label>
                            @if(in_array($item->id, $servicesHotel))
                                <input type="checkbox" name="services[]" value="{{$item->id}}" checked>
                            @else
                                <input type="checkbox" name="services[]" value="{{$item->id}}">
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __('admin/hotel.hotel_edit.image_upload') }}</label>
                    <p>
                        <img src="upload/hotel/{{$hotel->image}}" alt="no image" alt="Cinque Terre" width="200">
                    </p>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">{{ __('admin/hotel.hotel_edit.hotel_description') }}</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="5" name="descript">{{$hotel->descript}}</textarea>
                </div>
                <button type="submit" class="btn btn-success mr-2">{{ __('admin/hotel.hotel_edit.submit') }}</button>
                <button type="reset" class="btn btn-light">{{ __('admin/hotel.hotel_edit.reset') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
