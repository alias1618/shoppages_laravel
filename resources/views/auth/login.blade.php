@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fail') ? ' has-error' : '' }}">
                            <label for="user_account" class="col-md-4 control-label">Account</label>

                            <div class="col-md-6">
                                <input id="user_account" type="text" class="form-control" name="user_account" value="{{ old('user_account') }}" required autofocus>

                                @if ($errors->has('fail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fail') ? ' has-error' : '' }}">
                            <label for="user_password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="user_password" type="password" class="form-control" name="user_password" required>

                                @if ($errors->has('fail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
