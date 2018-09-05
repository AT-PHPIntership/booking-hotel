@extends('admin/layout/index')

@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('admin/slide.slide_list.slide_table') }}</h4>
            @if (session('message'))
                <div class="alert alert-{{ session('status') }}">{{ session('message') }}</div>
            @endif
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{ __('admin/slide.slide_list.slide_id') }}</th>
                    <th>{{ __('admin/slide.slide_list.slide_image') }}</th>
                    <th>{{ __('admin/slide.slide_list.slide_delete') }}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($slides as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                          <img src="upload/slide/{{$item->image}}" alt="no image" class="rounded">      
                        <td>
                            <form action="{{ route('slides.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('admin/slide.slide_list.slide_confirm') }} {{ $item->image }}')">
                                    <i class="fas fa-trash-alt">{{ __('admin/slide.slide_list.slide_delete') }}</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="d-flex justify-content-center mt-2">
                {!! $slides->links() !!}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
