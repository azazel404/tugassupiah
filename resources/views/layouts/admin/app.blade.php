<!DOCTYPE html>
<html>
<head>
	<title>Admin | Bpr Pundi</title>
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
	@yield('stylesheet')
</head>
<body>

	<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="index3.html" class="nav-link">Home</a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="#" class="nav-link">Contact</a>
			</li>
		</ul>

		<!-- SEARCH FORM -->
		<form class="form-inline ml-3">
			<div class="input-group input-group-sm">
				<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-navbar" type="submit">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>
		</form>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
		<li class="nav-item"><a href="{{ route('logout') }}" class="nav-link logout">Logout &nbsp<i class="fa fa-sign-out"></i></a></li>
		</ul>
	</nav>

	<aside class="main-sidebar sidebar-dark-primary elevation-4"class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="index3.html" class="brand-link">
			<img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
			style="opacity: .8">
			<span class="brand-text font-weight-light">AdminLTE 3</span>
		</a>

		<!-- Sidebar -->
	    <div class="sidebar">
	      <!-- Sidebar user panel (optional) -->
	      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
	        <div class="image">
	          <img src="{{ asset('img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
	        </div>
	        <div class="info">
	          <a href="#" class="d-block">Alexander Pierce</a>
	        </div>
	      </div>

	      <!-- Sidebar Menu -->
	      <nav class="mt-2">
	      	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
	          <!-- Add icons to the links using the .nav-icon class
	          	with font-awesome or any other icon font library -->
	          	<li class="nav-item">
	          		<a href="{{ route('admin.marketing') }}" class="nav-link">
	          			<i class="nav-icon fa fa-th"></i>
	          			<p>
	          				Marketing
	          			</p>
	          		</a>
	          	</li>
	          	<li class="nav-item has-treeview">
	          		<a href="#" class="nav-link">
	          			<i class="nav-icon fa fa-pie-chart"></i>
	          			<p>
	          				Suku Bunga
	          			</p>
	          		</a>
	          	</li>
	          	<li class="nav-item">
	          		<a href="{{ route('admin.content') }}" class="nav-link">
	          			<i class="nav-icon fa fa-tree"></i>
	          			<p>
	          				Content
	          			</p>
	          		</a>
	          	</li>
	          	<li class="nav-item has-treeview">
	          		<a href="#" class="nav-link">
	          			<i class="nav-icon fa fa-edit"></i>
	          			<p>
	          				Category
	          			</p>
	          		</a>
	          	</li>
	          <li class="nav-header">Management Keluhan</li>
	          	<li class="nav-item has-treeview">
	          		<a href="{{ route('admin.pengaduan') }}" class="nav-link">
	          			<i class="nav-icon fa fa-table"></i>
	          			<p>
	          				Pengaduan
	          			</p>
	          		</a/>
	          	</li>
	          	<li class="nav-item has-treeview">
	          		<a href="#" class="nav-link">
	          			<i class="nav-icon fa fa-table"></i>
	          			<p>
	          				Pengajuan Kredit
	          			</p>
	          		</a/>
	          	</li>
	          	<li class="nav-header">Management Account</li>
	          	<li class="nav-item">
	          		<a href="pages/calendar.html" class="nav-link">
	          			<i class="nav-icon fa fa-calendar"></i>
	          			<p>
	          				Account Nasabah
	          				<span class="badge badge-info right">2</span>
	          			</p>
	          		</a>
	          	</li>
	          	<li class="nav-item has-treeview">
	          		<a href="{{ route('admin.manage-account.admin') }}" class="nav-link">
	          			<i class="nav-icon fa fa-envelope-o"></i>
	          			<p>
	          				Admin
	          			</p>
	          		</a>
	          	</li>
	          	<li class="nav-header">Virtual Account</li>
	          		<li class="nav-item has-treeview">
	          		<a href="#" class="nav-link">
	          			<i class="nav-icon fa fa-file"></i>
	          			<p>
	          				Upload File
	          				<i class="fa fa-angle-left right"></i>
	          			</p>
	          		</a>
	          		<ul class="nav nav-treeview">
	          			<li class="nav-item">
	          				<a href="pages/UI/general.html" class="nav-link">
	          					<i class="fa fa-circle-o nav-icon"></i>
	          					<p>Daftar Tabungan</p>
	          				</a>
	          			</li>
	          			<li class="nav-item">
	          				<a href="pages/UI/icons.html" class="nav-link">
	          					<i class="fa fa-circle-o nav-icon"></i>
	          					<p>Jadwal Angsuran</p>
	          				</a>
	          			</li>
						  <li class="nav-item">
	          				<a href="pages/UI/icons.html" class="nav-link">
	          					<i class="fa fa-circle-o nav-icon"></i>
	          					<p>Nominatif Deposito</p>
	          				</a>
	          			</li>
	          		</ul>
	          	</li>
	          </ul>
	      </nav>
	      <!-- /.sidebar-menu -->
	    </div>
    	<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		@yield('content')
	</div>

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
	@yield('script')
</body>
</html>
