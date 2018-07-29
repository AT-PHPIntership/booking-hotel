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
                    <th>{{ __('admin/hotel.hotel_list.hotel_position') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_rank') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_status') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_decription') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_action') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($hotel as $item)
                  <tr class="odd gradeX" align="center">
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->number_star}}</td>
                    <td>
                      @if ($item->status == 1)
                        Enable
                      @else
                        Disable
                      @endif
                    </td>
                    <td><img src="{{$item->image}}" alt="no image"></td>
                    <td class="center">
                      <form action="admin/hotel/{{$item->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">{{ __('admin/hotel.hotel_list.hotel_delete') }}</button>
                      </form>
                      <a href="admin/hotel/{{$item->id}}"><button type="submit" class="btn btn-outline-primary">{{ __('admin/hotel.hotel_list.hotel_edit') }}</button></a>
                    </td>
                  </tr>
                  @endforeach
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
