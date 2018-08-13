@extends('admin/layout/index')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title">{{ __('admin/service.service_edit.service_table') }}</h4>
    @include('admin/layout/print_error')    
    <form class="forms-sample" action="{{ route('services.update', $service->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/service.service_edit.service_name') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{$service->name}}" name="name" placeholder="{{ __('admin/service.service_edit.service_name') }}">
        </div>

        <div class="form-group">
            <label for="exampleInputCity1">{{ __('admin/service.service_edit.service_service_type') }}</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="service_type_id">
                @foreach ($serviceTypes as $item)
                	@if($item->id == $service->service_type_id)
                		<option value="{{$item->id}}" selected="selected">{{$item->name}}</option>
                	@endif
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
        	@if($service->status == 1)
	            <div class="form form-check">
	                <label class="form-check-label">
	                    <input type="radio" class="form-check-input" name="status" value="1" checked>{{ __('admin/service.service_edit.service_enable') }}
	                </label>
	            </div>
	            <div class="form form-check">
	                <label class="form-check-label">
	                    <input type="radio" class="form-check-input" name="status" value="0">{{ __('admin/service.service_edit.service_disable') }}
	                </label>
	            </div>
            @else
	            <div class="form form-check">
	                <label class="form-check-label">
	                    <input type="radio" class="form-check-input" name="status" value="1">{{ __('admin/service.service_edit.service_enable') }}
	                </label>
	            </div>
	            <div class="form form-check">
	                <label class="form-check-label">
	                    <input type="radio" class="form-check-input" name="status" value="0" checked>{{ __('admin/service.service_edit.service_disable') }}
	                </label>
	            </div>
            @endif
        </div>
        
        <button type="submit" class="btn btn-success mr-2">{{ __('admin/service.service_edit.service_edit') }}</button>
        <button type="reset" class="btn btn-light">{{ __('admin/service.service_edit.service_reset') }}</button>
    </form>
    </div>
</div>
</div>
@endsection
