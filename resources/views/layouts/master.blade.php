<!doctype html>
<html lang="en">
<head>
	@if(isset($page))
        @include('layouts.partials.meta')
	@endif
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/jquery.smartmenus.bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}"/>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.smartmenus.js')}}"></script>
    <script src="{{asset('js/jquery.smartmenus.bootstrap.min.js')}}"></script>
</head>
<body>
<div id="fb-root"></div>
<div class="container">
    @yield('content')
</div>
<script src="{{asset('js/socials.js')}}"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
</body>
</html>