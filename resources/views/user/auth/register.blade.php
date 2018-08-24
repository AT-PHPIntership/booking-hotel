@extends('user.layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('user/layout.app.register') }}</div>

                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('user/layout.app.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('user/layout.app.email_address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="" required>

                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('user/layout.app.address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="" required autofocus>

                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('user/layout.app.phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('user/layout.app.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('user/layout.app.confirm_password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btn-submit">
                                    {{ __('user/layout.app.register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('js/user/auth/register.js') }}"></script>
@endsection
