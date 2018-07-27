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
                    <th>{{ __('admin/hotel.hotel_list.hotel_address') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_rank') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_status') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_decription') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_action') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Herman Beck</td>
                    <td>Da Nang</td>
                    <td>4</td>
                    <td>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" checked>Display
                        </label>
                      </div>
                    </td>
                    <td>This is Description</td>
                    <td>
                    	<button type="button" class="btn btn-dark btn-fw"><i class="mdi mdi-cloud-download" href="/admin/hotels/edit/1"></i>{{ __('admin/hotel.hotel_list.edit') }}</button>
                      <button type="button" class="btn btn-danger btn-fw"><i class="mdi mdi-alert-outline" href="admin/hotels/delete/1"></i>{{ __('admin/hotel.hotel_list.delete') }}</button>
                    </td>
                  </tr>
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
