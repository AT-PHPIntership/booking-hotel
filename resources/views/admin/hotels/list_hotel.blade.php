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
                                    @foreach ($hotel as $item)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$item->id}}</td>
                                        <td>
                                            <img src="upload/hotel/{{$item->image}}" alt="no image" class="rounded">
                                            <p>{{$item->name}}</p>
                                        </td>
                                        <td>{{$item->user->username}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>{{$item->city->city}}, {{$item->city->country}}</td>
                                        <td>{{$item->number_star}} {{ __('admin/hotel.hotel_list.hotel_star') }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                {{ __('admin/hotel.hotel_list.hotel_status_enable') }}
                                            @else
                                                {{ __('admin/hotel.hotel_list.hotel_status_disable') }}
                                            @endif
                                        </td>
                                        <td>{{$item->descript}}</td>
                                        <td>
                                            <a href="{{ route('hotels.edit', $item->id) }}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit">{{ __('admin/hotel.hotel_list.hotel_edit') }}</i></a>
                                        </td>
                                        <td class="center">
                                            <form action="{{route("hotels.destroy", $item->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('admin/hotel.hotel_list.hotel_confirm') }} {{$item->name}}')">
                                                    <i class="fas fa-trash-alt">{{ __('admin/hotel.hotel_list.hotel_delete') }}</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                            {!! $hotel->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
