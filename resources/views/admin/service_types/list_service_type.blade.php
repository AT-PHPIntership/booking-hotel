@extends('admin/layout/index')

@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('admin/service_type.service_type_list.service_type_table') }}</h4>
            @if (session('message'))
                <div class="alert alert-{{ session('status') }}">{{ session('message') }}</div>
            @endif
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{ __('admin/service_type.service_type_list.service_type_id') }}</th>
                    <th>{{ __('admin/service_type.service_type_list.service_type_service') }}</th>
                    <th>{{ __('admin/service_type.service_type_list.service_type_hotel') }}</th>
                    <th>{{ __('admin/service_type.service_type_list.service_type_edit') }}</th>
                    <th>{{ __('admin/service_type.service_type_list.service_type_delete') }}</th>
                    <th>{{ __('admin/service_type.service_type_list.service_type_show') }}</th>
                </tr>
                </thead>
                <tbody>
                 	@foreach($service_types as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->service_id }}</td>
                        <td>{{ $item->hotel_id }}</td>
                        <td>
                            <a href="{{ route('service-types.edit', $item->id) }}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit">{{ __('admin/service_type.service_type_list.service_type_edit') }}</i></a>
                        </td>
                        <td>
                            <form action="{{ route('service-types.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('admin/service_type.service_type_list.service_type_confirm') }}')">
                                    <i class="fas fa-trash-alt">{{ __('admin/service_type.service_type_list.service_type_delete') }}</i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('service-types.show', $item->id) }}" class="btn btn-outline-info"><i class="fas fa-edit">{{ __('admin/service_type.service_type_list.service_type_show') }}</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="d-flex justify-content-center mt-2">
                {!! $service_types->links() !!}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
