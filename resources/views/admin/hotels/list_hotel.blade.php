@extends('admin/layout/index')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('admin/hotel.hotel_list.hotel_table') }}</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('admin/hotel.hotel_list.hotel_number') }}</th>
                                        <th>{{ __('admin/hotel.hotel_list.hotel_name') }}</th>
                                        <th>{{ __('admin/hotel.hotel_list.hotel_user_name') }}</th>
                                        <th>{{ __('admin/hotel.hotel_list.hotel_address') }}</th>
                                        <th>{{ __('admin/hotel.hotel_list.hotel_city') }}</th>
                                        <th>{{ __('admin/hotel.hotel_list.hotel_rank') }}</th>
                                        <th>{{ __('admin/hotel.hotel_list.hotel_status') }}</th>
                                        <th>{{ __('admin/hotel.hotel_list.hotel_decription') }}</th>
                                        <th>{{ __('admin/hotel.hotel_list.hotel_delete') }}</th>
                                        <th>{{ __('admin/hotel.hotel_list.hotel_edit') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
