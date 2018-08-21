@extends('admin/layout/index')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title">{{ __('admin/slide.slide_add.slide_table') }}</h4>
    @include('admin/layout/print_error')    
    <form class="forms-sample" action="{{route('slides.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>{{ __('admin/slide.slide_add.slide_upload') }}</label>
            <input type="file" name="image[]" class="form-control" multiple>
        </div>
        
        <button type="submit" class="btn btn-success mr-2">{{ __('admin/slide.slide_add.slide_create') }}</button>
        <button type="reset" class="btn btn-light">{{ __('admin/slide.slide_add.slide_reset') }}</button>
    </form>
    </div>
</div>
</div>
@endsection
