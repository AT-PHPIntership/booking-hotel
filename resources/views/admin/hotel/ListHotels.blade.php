@extends('admin/layout/index')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{ __('admin/hotel.Hotel_List.Hotel_Table') }}</h4>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>{{ __('admin/hotel.Hotel_List.Hotel_Number') }}</th>
                    <th>{{ __('admin/hotel.Hotel_List.Hotel_Name') }}</th>
                    <th>{{ __('admin/hotel.Hotel_List.Hotel_Position') }}</th>
                    <th>{{ __('admin/hotel.Hotel_List.Hotel_Rank') }}</th>
                    <th>{{ __('admin/hotel.Hotel_List.Hotel_Status') }}</th>
                    <th>{{ __('admin/hotel.Hotel_List.Hotel_Decription') }}</th>
                    <th>{{ __('admin/hotel.Hotel_List.Hotel_Action') }}</th>
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
                    	<button type="button" class="btn btn-dark btn-fw"><i class="mdi mdi-cloud-download" href="/admin/hotels/edit/1"></i>Edit</button>
                      <button type="button" class="btn btn-danger btn-fw"><i class="mdi mdi-alert-outline" href="admin/hotels/delete/1"></i>Delete</button>
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
