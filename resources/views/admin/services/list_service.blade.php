@extends('admin/layout/index')

@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('admin/service.service_list.service_table') }}</h4>
            @if (session('message'))
                <div class="alert alert-{{ session('status') }}">{{ session('message') }}</div>
            @endif
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{ __('admin/service.service_list.service_id') }}</th>
                    <th>{{ __('admin/service.service_list.service_name') }}</th>
                    <th>{{ __('admin/service.service_list.service_service_type') }}</th>
                    <th>{{ __('admin/service.service_list.service_user_id') }}</th>
                    <th>{{ __('admin/service.service_list.service_edit') }}</th>
                    <th>{{ __('admin/service.service_list.service_delete') }}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($services as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->serviceType->name }}</td>
                        <td>{{ $item->user->username }}</td>
                        <td>
                            <a href="{{ route('services.edit', $item->id) }}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit">{{ __('admin/service.service_list.service_edit') }}</i></a>
                        </td>
                        <td>
                            <form action="{{ route('services.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('admin/service.service_list.service_confirm') }} {{ $item->name }}')">
                                    <i class="fas fa-trash-alt">{{ __('admin/service.service_list.service_delete') }}</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="d-flex justify-content-center mt-2">
                {!! $services->links() !!}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
