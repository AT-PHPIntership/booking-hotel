@extends('user.layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('user/layout.app.register') }}</div>

                <div class="card-body">
                    <form method="post">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('user/layout.app.name') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
=======

>>>>>>> master
                                <input id="username" type="text" class="form-control" name="username" required autofocus>
                                <span class="invalid-feedback" role="alert" id="js-feedback-username">
                                    <strong id="js-error-username"></strong>
                                </span>
<<<<<<< HEAD
=======

>>>>>>> master
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('user/layout.app.email_address') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
=======

>>>>>>> master
                                <input id="text" type="text" class="form-control" name="email" required>

                                <span class="invalid-feedback" role="alert" id="js-feedback-email">
                                    <strong id="js-error-email"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('user/layout.app.address') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
=======

>>>>>>> master
                                <input id="address" type="text" class="form-control" name="address" required autofocus>

                                    <span class="invalid-feedback" role="alert" id="js-feedback-address">
                                        <strong id="js-error-address"></strong>
<<<<<<< HEAD
=======

>>>>>>> master
                                    </span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('user/layout.app.phone') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
=======

>>>>>>> master
                                <input id="phone" type="text" class="form-control" name="phone" required autofocus>

                                <span class="invalid-feedback" role="alert" id="js-feedback-phone">
                                    <strong id="js-error-phone"></strong>
<<<<<<< HEAD
=======

>>>>>>> master
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('user/layout.app.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <span class="invalid-feedback" role="alert" id="js-feedback-password">
                                    <strong id="js-error-password"></strong>
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
