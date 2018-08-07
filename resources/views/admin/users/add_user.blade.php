@extends('admin/layout/index')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title">{{ __('admin/user.user_add.user_table') }}</h4>
    @include('admin/layout/print_error')    
    <form class="forms-sample" action="{{route('users.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_add.user_name') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{ old('name') }}" name="username" placeholder="{{ __('admin/user.user_add.user_name') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_add.user_email') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{ old('email') }}" name="email" placeholder="{{ __('admin/user.user_add.user_email') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_add.user_address') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{ old('address') }}" name="address" placeholder="{{ __('admin/user.user_add.user_address') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_add.user_phone') }}</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{ old('phone') }}" name="phone" placeholder="{{ __('admin/user.user_add.user_phone') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_add.user_role') }}</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="role">
                <option value="user">{{ __('admin/user.user_add.user_role_user') }}</option>
                <option value="admin">{{ __('admin/user.user_add.user_role_admin') }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_add.user_password') }}</label>
            <input type="password" class="form-control" id="exampleInputName1" value="" name="password">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">{{ __('admin/user.user_add.user_password_confirm') }}</label>
            <input type="password" class="form-control" id="exampleInputName1" value="" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-success mr-2">{{ __('admin/user.user_add.user_create') }}</button>
        <button type="reset" class="btn btn-light">{{ __('admin/user.user_add.user_reset') }}</button>
    </form>
    </div>
</div>
</div>
@endsection
