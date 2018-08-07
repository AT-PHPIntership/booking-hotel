@extends('admin/layout/index')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title">{{ __('admin/user.user_edit.user_table') }}</h4>
    <form class="forms-sample" action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_edit.user_name') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{$user->username}}" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_edit.user_email') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{$user->email}}" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_edit.user_address') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{$user->address}}" name="address">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_edit.user_phone') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{$user->phone}}" name="phone">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_edit.user_role') }}</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="role">
                <option value="{{$user->role}}" selected="selected">{{$user->role}}</option>
                @if($user->role == 'admin')
                    <option value="user">user</option>
                @else
                    <option value="admin">admin</option>
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_edit.user_new_password') }}</label>
            <input type="password" class="form-control" id="exampleInputName1" value="{{ old('password') }}" name="password">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_edit.user_confirm_password') }}</label>
            <input type="password" class="form-control" id="exampleInputName1" value="" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-success mr-2">{{ __('admin/user.user_edit.user_edit') }}</button>
        <button type="reset" class="btn btn-light">{{ __('admin/user.user_edit.user_reset') }}</button>
    </form>
    </div>
</div>
</div>
@endsection
