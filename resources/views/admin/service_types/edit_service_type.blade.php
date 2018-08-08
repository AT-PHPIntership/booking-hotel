@extends('admin/layout/index')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title">{{ __('admin/service_type.service_type_edit.service_type_table') }}</h4>
    @include('admin/layout/print_error')    
    <form class="forms-sample" action="{{ route('service-types.update', $serviceType->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/service_type.service_type_edit.service_type_service') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{$serviceType->name}}" name="name">
        </div>
        <button type="submit" class="btn btn-success mr-2">{{ __('admin/service_type.service_type_edit.service_type_edit') }}</button>
        <button type="reset" class="btn btn-light">{{ __('admin/service_type.service_type_edit.service_type_reset') }}</button>
    </form>
    </div>
</div>
</div>
@endsection
