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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <style>
        textarea {
            margin:0px 0px;
            padding:5px;
            min-height:300px;
            line-height:16px;
            width:96%;
            display:block;
            margin:0px auto;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('layouts.nav')

        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script defer src="{{asset('js/jquery.timeago.js')}}"></script>
    <script>
        $(document).ready(function() {
            $(".timeago").timeago();
        });
    </script>
</body>
</html>
