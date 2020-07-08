@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('user_account') ? ' has-error' : '' }}">
                            <label for="user_account" class="col-md-4 control-label">登入帳號</label>

                            <div class="col-md-6">
                                <input id="user_account" type="text" class="form-control" name="user_account" value="{{ old('user_account') }}" required autofocus>

                                @if ($errors->has('user_account'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_account') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_email') ? ' has-error' : '' }}">
                            <label for="user_email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="user_email" type="email" class="form-control" name="user_email" value="{{ old('user_email') }}" required>

                                @if ($errors->has('user_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                                <label for="user_name" class="col-md-4 control-label">姓名</label>
    
                                <div class="col-md-6">
                                    <input id="user_name" type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" required>
    
                                    @if ($errors->has('user_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('user_add') ? ' has-error' : '' }}">
                                <label for="user_add" class="col-md-4 control-label">地址</label>
    
                                <div class="col-md-6">
                                    <input id="user_add" type="text" class="form-control" name="user_add" value="{{ old('user_add') }}" required autofocus>
    
                                    @if ($errors->has('user_add'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_add') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('user_phone') ? ' has-error' : '' }}">
                                <label for="user_phone" class="col-md-4 control-label">手機號碼</label>
    
                                <div class="col-md-6">
                                    <input id="user_phone" type="text" class="form-control" name="user_phone" value="{{ old('user_phone') }}" required autofocus>
    
                                    @if ($errors->has('user_phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('user_password') ? ' has-error' : '' }}">
                            <label for="user_password" class="col-md-4 control-label">密碼</label>

                            <div class="col-md-6">
                                <input id="user_password" type="password" class="form-control" name="user_password" required>

                                @if ($errors->has('user_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_password-confirm" class="col-md-4 control-label">確認密碼</label>

                            <div class="col-md-6">
                                <input id="user_password-confirm" type="password" class="form-control" name="user_password_confirmation" required>
                            </div>
                        </div>
                        <input id="role_id" type="hidden" class="form-control" name="role_id" value="{{ '1' }}" required>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
