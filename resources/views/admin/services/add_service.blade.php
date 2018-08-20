@extends('admin/layout/index')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title">{{ __('admin/service.service_add.service_table') }}</h4>
    @include('admin/layout/print_error')    
    <form class="forms-sample" action="{{route('services.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/service.service_add.service_name') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{ old('name') }}" name="name" placeholder="{{ __('admin/service.service_add.service_name') }}">
        </div>

        <div class="form-group">
            <label for="exampleInputCity1">{{ __('admin/service.service_add.service_service_type') }}</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="service_type_id">
                @foreach ($serviceTypes as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <div class="form form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="1" checked>{{ __('admin/service.service_add.service_enable') }}
                </label>
            </div>
            <div class="form form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="0">{{ __('admin/service.service_add.service_disable') }}
                </label>
            </div>
        </div>
        
        <button type="submit" class="btn btn-success mr-2">{{ __('admin/service.service_add.service_create') }}</button>
        <button type="reset" class="btn btn-light">{{ __('admin/service.service_add.service_reset') }}</button>
    </form>
    </div>
</div>
</div>
@endsection
