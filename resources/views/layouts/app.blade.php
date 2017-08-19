<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{--<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
        Laravel.apiToken = "{{ Auth::check() ? 'Bearer '.Auth::user()->api_token : 'Bearer ' }}";
    </script>

    <style>
        #app{


        }
        .search{
            position: relative;
        }
        .img-search{
            position: absolute;
            top: 6px;
            right: 5px;
            z-index: 5;
        }
    </style>
    @yield('style')
</head>
<body>

    <div id="app">
        @if (Auth::check())
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="padding: 10px 0;background-color: #000;border: 0px;" >

            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->

                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>


                </div>
                {{--全文搜索--}}
                <form action="{{url('/search')}}" method="get">
                    {{csrf_field()}}
                    <div class="search pull-left" style="margin-top: 8px">
                        {{--<i class="fa fa-search fa-2x"></i>--}}
                        <input type="image" class="img-search" src="/images/admin/search.png" width="25px" height="25px" alt="">
                        <input type="text" name="query" class="form-control" value="" placeholder="ES全文检索" >
                    </div>
                </form>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">登录</a></li>
                            {{--<li><a href="{{ route('register') }}">注册</a></li>--}}
                        @else
                            <li class="dropdown">
                                <a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            注销
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @endif

        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')

    <script>
        $("#captcha").on('click',function () {

            var captcha = $(this);

            var url = '/captcha/'+captcha.attr('data-captcha-config')+'/?'+Math.random();

            captcha.attr('src',url);
        });
        $(document).ready(function () {
            $('li.tree-toggle > a').click(function () {
                $(this).parent().children('ul').toggle(300);
            });
        });
    </script>
</body>
</html>
