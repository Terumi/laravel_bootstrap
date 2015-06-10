<!doctype html>
<html lang="en">
<head>
    @include('layouts.partials.meta')

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/jquery.smartmenus.bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}"/>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.smartmenus.js')}}"></script>
    <script src="{{asset('js//jquery.smartmenus.bootstrap.min.js')}}"></script>
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
</html>