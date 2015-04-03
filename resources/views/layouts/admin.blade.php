<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/redactor.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/styles.css')}}"/>
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/redactor.min.js')}}"></script>
	<script src="{{asset('js/admin.js')}}"></script>
</head>
<body>
<div class="container">
	@yield('content')
</div>
</body>
</html>