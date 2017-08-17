@extends('layouts.app')

@section('style')
    <style>

        .row{
            margin-top: 100px;
            margin-right:100px;
            filter:alpha(Opacity=80);/*针对ie半透明*/
            -moz-opacity:0.8;/*针对火狐半透明*/
            opacity: 0.9;/*针对除ie外的大多数浏览器半透明*/

        }
        body{
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-image: url("/images/admin/amazing-beautiful-beauty-blue.jpg");
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }

    </style>
@endsection
@section('content')

<div class="row">
    <div class="col-md-4 pull-right">
        <div class="panel panel-default">
            <div class="panel-heading">登录</div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">管理员账号</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">密码</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                        <label for="captcha" class="col-md-4 control-label">验证码</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="captcha">
                            <br>
                            <a id="refresh-captcha">
                                <img src="{{ captcha_src()}}"
                                     alt="验证码"
                                     title="刷新图片"
                                     width="160"
                                     height="46"
                                     id="captcha"
                                     border="0"
                                     data-captcha-config="default"
                                >
                                @if ($errors->has('captcha'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('captcha') }}</strong>
                                </span>
                                @endif
                            </a>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>记住我
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                登录
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                忘记密码?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
