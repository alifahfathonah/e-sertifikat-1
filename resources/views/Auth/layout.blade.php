<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hello</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('assets/login-assets/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-assets/vendor/bootstrap/css/bootstrap.min.css')}} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-assets/vendor/animate/animate.css')}} ">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-assets/vendor/css-hamburgers/hamburgers.min.css')}} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-assets/vendor/animsition/css/animsition.min.css')}} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-assets/vendor/select2/select2.min.css')}} ">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-assets/vendor/daterangepicker/daterangepicker.css')}} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-assets/css/util.css')}} ">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-assets/css/main.css')}} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziToast.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziToast.min.css') }}">

	@yield('css')

</head>
<body>
	
	@yield('content')
	
<!--===============================================================================================-->
	<script src="{{asset('assets/login-assets/vendor/jquery/jquery-3.2.1.min.js')}} "></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login-assets/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login-assets/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('assets/login-assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login-assets/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login-assets/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('assets/login-assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login-assets/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login-assets/js/main.js')}}"></script>

	<script src="{{ asset('assets/js/iziToast.js') }}"></script>
	<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	  
	@yield('js')

</body>
</html>