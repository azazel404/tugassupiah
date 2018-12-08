<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
	<!-- Morris chart -->
	<link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
	<!-- jvectormap -->
	<link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body>

	<!-- Content Wrapper. Contains page content -->
	@yield('content')

	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	<!-- Morris.js charts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
	<!-- daterangepicker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
	<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
	<!-- datepicker -->
	<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
	<!-- Slimscroll -->
	<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
	<!-- FastClick -->
	<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('js/adminlte.js') }}"></script>
</body>
</html>