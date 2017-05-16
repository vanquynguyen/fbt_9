<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Styles -->
    {!! Html::style('css/app.css') !!}
    {!! Html::style('css/sweetalert.css') !!}
    {!! Html::style('css/style.css') !!}
    <!-- Scripts -->
    {!! Html::script('js/jquery.js') !!}
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body >
    <div id="app" class="page1">
        <header>
            <div class="container_12">
                <div class="grid_12">
                  <h1><a href="index.html"><img src="images/logo.png" alt=""></a></h1>
                  <div class="clear"></div>
                </div>
                <div class="menu_block navigation">
                    <nav>
                        <ul class="sf-menu">
                            <li><a href="/">{{trans('messages.home')}}</a></li>
                            <li><a href="{{ route('about') }}">{{trans('messages.about')}}</a></li>
                            <li><a href="{{ route('gallery') }}">{{trans('messages.gallery')}}</a></li>
                            <li><a href="{{ route('tours') }}">{{trans('messages.tour')}}</a></li>
                            <li><a href="{{ route('blog') }}">{{trans('messages.blog')}}</a></li>
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">{{trans('messages.login')}}</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} 
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        @can('access-admin')
                                        <li>
                                            <a href="{{ route('admin.home') }}">{{trans('messages.admin')}}</a>
                                            </li>
                                        @endcan
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">{{trans('messages.logout')}}
                                            </a>
                                            {!! Form::open(['route' => 'logout', 'method' => 'post', 'id' => 'logout-form']) !!}
                                            {!! Form::close() !!}
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </nav>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </header>
        
        <div class="main">
        @yield('content')
        @yield('bottom_block')
        </div>
        @yield('footer')
    </div>

    <!-- Scripts -->
    {!! Html::script('js/app.js') !!}
</body>
</html>
