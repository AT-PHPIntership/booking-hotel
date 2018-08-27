@extends('user/layout/index')

@section('content')
<div class="col-md-9">
    <div class="row">
        <div class="wrap-division" id="js-hotel-list">
            <!-- List Hotels -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <ul class="pagination">
                <li class="disabled"><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('java-script')
    <script src="{{ asset('js/user/auth/home.js') }}"></script>
    <script src="{{ asset('/js/user/home/hotel.js') }}"></script>
    <script src="{{ asset('/js/user/home/slide.js') }}"></script>
    <script src="{{ asset('/js/user/home/city.js') }}"></script>
    <script src="{{ asset('/js/user/home/datepicker.js') }}"></script>
@endsection
