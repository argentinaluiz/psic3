@extends('layouts.login')

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="logo-name">{{trans('auth.login')}}</h1>

        </div>

        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                 <div class="row form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-md-4 control-label" style="text-align: right;">User</label>

                    <div class="col-md-8">
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label" style="text-align: right;">{{trans('auth.password')}}</label>

                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row" style="float: right;">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{trans('auth.rememberme')}}
                            </label>

                        </div>
                    </div>
                </div>
                <div class="cleaner_h1"></div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-sm btn-block btn-primary">
                            {{trans('auth.login')}}
                        </button>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-sm btn-block btn-link" href="{{ route('password.request') }}">
                            {{trans('auth.forgotYourPassword?')}}
                        </a>
                    </div>
                </div>
            </form>
            <form class="row form-inline" method="post" action="{{ url('/login/social') }}">
                {{ csrf_field() }}
                <div class="col-md-12 text-center">

                    <button type="submit" class="btn btn-sm btn-danger" value="google" name="social_type">
                        {{trans('auth.loginwithgoogle?')}} 
                    </button>

                    <button type="submit" class="btn btn-sm" value="github" name="social_type">
                        {{trans('auth.loginwithgithub?')}} 
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
