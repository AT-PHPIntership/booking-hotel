@extends('admin/layout/index')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">{{ __('admin/hotel.hotel_add.hotel_table') }}</h4>
      <form class="forms-sample">
        <div class="form-group">
          <label for="exampleInputName1">{{ __('admin/hotel.hotel_add.hotel_name') }}</label>
          <input type="text" class="form-control" id="exampleInputName1" placeholder="Name Hotel" name="{{ __('admin/hotel.Hotel_Add.Hotel_Name') }}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail3">{{ __('admin/hotel.hotel_add.position') }}</label>
          <input type="email" class="form-control" id="exampleInputEmail3" placeholder="{{ __('admin/hotel.Hotel_Add.Position') }}" name="Position">
        </div>
        <div class="form-group">
          <label for="exampleInputCity1">{{ __('admin/hotel.hotel_add.city') }}</label>
          <input type="text" class="form-control" id="exampleInputCity1" placeholder="{{ __('admin/hotel.Hotel_Add.City') }}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect3">{{ __('admin/hotel.hotel_add.rank_hotel') }}</label>
          <select class="form-control form-control-sm" id="exampleFormControlSelect3">
            <option>{{ __('admin/hotel.hotel_add.one_star') }}</option>
            <option>{{ __('admin/hotel.hotel_add.two_star') }}</option>
            <option>{{ __('admin/hotel.hotel_add.three_star') }}</option>
            <option>{{ __('admin/hotel.hotel_add.four_star') }}</option>
            <option>{{ __('admin/hotel.hotel_add.five_star') }}</option>
          </select>
        </div>
        <div class="form-group">
          <label>{{ __('admin/hotel.hotel_add.image_upload') }}</label>
          <input type="file" name="img[]" class="file-upload-default">
          <div class="input-group col-xs-12">
            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
            <span class="input-group-append">
              <button class="file-upload-browse btn btn-info" type="button">{{ __('admin/hotel.hotel_add.upload_button') }}</button>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleTextarea1">{{ __('admin/hotel.hotel_add.hotel_description') }}</label>
          <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
        </div>
        <button type="submit" class="btn btn-success mr-2">{{ __('admin/hotel.hotel_add.submit') }}</button>
        <button class="btn btn-light">{{ __('admin/hotel.hotel_add.reset') }}</button>
      </form>
    </div>
  </div>
</div>
@endsection
