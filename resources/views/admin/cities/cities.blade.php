@extends('admin/layout/index')

@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('admin/city.cities.cities_table') }}</h4>
            @if (session('message'))
                <div class="alert alert-{{ session('status') }}">{{ session('message') }}</div>
            @endif
            <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>{{ __('admin/city.cities.cities_number') }}</th>
                    <th>{{ __('admin/city.cities.cities_name') }}</th>
                    <th>{{ __('admin/city.cities.country_name') }}</th>
                    <th>{{ __('admin/city.cities.cities_edit') }}</th>
                    <th>{{ __('admin/city.cities.cities_delete') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->city }}</td>
                    <td>{{ $city->country }}</td>
                    <td>
                        <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit">{{ __('admin/city.cities.cities_edit') }}</i></a>
                    </td>
                    <td>
                        <form action="{{ route('cities.destroy', $city->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('admin/city.cities.cities_confirm') }}')">
                                <i class="fas fa-trash-alt">{{ __('admin/city.cities.cities_delete') }}</i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <div class="d-flex justify-content-center mt-2">
                {!! $cities->links() !!}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
