<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route-name" content="{{ request()->route()->getName() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('style')
</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        @include('layouts.partials.navigation')

        @include('layouts.partials.sidebar')

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    @yield('content-header')
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <x-alert/>
                    @yield('content')
                </div>
            </div>

        </div>

{{--        @include('layouts.partials.sidebar-right')--}}

{{--        @include('layouts.partials.footer')--}}

    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
