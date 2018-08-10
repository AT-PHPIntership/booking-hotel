@extends('admin/layout/index')

@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('admin/user.user_list.user_table') }}</h4>
            @if (session('message'))
                <div class="alert alert-{{ session('status') }}">{{ session('message') }}</div>
            @endif
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{ __('admin/user.user_list.user_id') }}</th>
                    <th>{{ __('admin/user.user_list.user_name') }}</th>
                    <th>{{ __('admin/user.user_list.user_role') }}</th>
                    <th>{{ __('admin/user.user_list.user_edit') }}</th>
                    <th>{{ __('admin/user.user_list.user_delete') }}</th>
                    <th>{{ __('admin/user.user_list.user_show') }}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <a href="{{ route('users.edit', $item->id) }}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit">{{ __('admin/user.user_list.user_edit') }}</i></a>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('admin/user.user_list.user_confirm') }} {{$item->username}}')">
                                    <i class="fas fa-trash-alt">{{ __('admin/user.user_list.user_delete') }}</i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('users.show', $item->id) }}" class="btn btn-outline-info"><i class="fas fa-edit">{{ __('admin/user.user_list.user_show') }}</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="d-flex justify-content-center mt-2">
                {!! $users->links() !!}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
