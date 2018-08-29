@extends('user/layout/index')

@section('content')
<div class="col-md-9">
    <div class="row">
        <div class="wrap-division" id="js-item-list">
            <!-- List Hotels or Rooms -->
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <ul class="pagination js-pagination">
                
            </ul>
        </div>
    </div>
</div>
@endsection

@section('java-script')
    <script src="{{ asset('/js/user/home/slide.js') }}"></script>
    <script src="{{ asset('js/user/auth/home.js') }}"></script>
    <script src="{{ asset('/js/user/home/hotel.js') }}"></script>
    <script src="{{ asset('/js/user/home/city.js') }}"></script>
    <script src="{{ asset('/js/user/home/datepicker.js') }}"></script>
    <script src="{{ asset('/js/user/home/room.js') }}"></script>
    <script src="{{ asset('/js/user/home/booking.js') }}"></script>
@endsection
