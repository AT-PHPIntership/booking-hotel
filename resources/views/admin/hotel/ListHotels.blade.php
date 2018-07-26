@extends('admin/layout/index')

@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ __('admin/hotel.hotel_list.hotel_table') }}
                <small>{{ __('admin/hotel.hotel_list.hotel_header') }}</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>{{ __('admin/hotel.hotel_list.hotel_number') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_name') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_city') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_rank') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_status') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_image') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_edit') }}</th>
                    <th>{{ __('admin/hotel.hotel_list.hotel_delete') }}</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($hotel as $ht)
              <tr class="odd gradeX" align="center">
                  <td>{{$ht->id}}</td>
                  <td>{{$ht->name}}</td>
                  <td>{{$ht->address}}</td>
                  <td>{{$ht->number_star}}</td>
                  <td>
                    @if ($ht->status == 1)
                      Enable
                    @else
                      Disable
                    @endif
                  </td>
                  <td><img src="{{$ht->image}}" alt="no image"></td>
                  <td class="center">
                    <form action="admin/hotel/{{$ht->id}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                  </td>
                  <td class="center"><a href="admin/hotel/{{$ht->id}}"><button type="submit" class="btn btn-outline-primary">Edit</button></a></td>
              </tr>
              @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
@endsection
