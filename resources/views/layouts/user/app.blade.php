<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bank Bpr</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

</head>
<body>
	<div class="container-nav">
		<nav class="mt-4 navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">
				<img src="{{ asset('img/logo_bprdn.png') }}" class="img-fluid">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">Tentang Kami</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">News & Promo</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Produk
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Tabungan</a>
							<a class="dropdown-item" href="#">Kredit</a>
							<a class="dropdown-item" href="#">Deposito</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Fitur Layanan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Hubungi Kami</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	@yield('content')
	<footer class="main-footer mt-9">
		<div class="container">
			<div class="row">
				<div class="col-md-6 mt-5">
					<div class="logo">
						<h4 class="">BPR Pondasi</h4>
					</div>
					<div class="contact-details">
						<p>Alamat: Komp. Nagoya City Centre blok E No.12, Lubuk Baja,
						Kota Batam, Kep. Riau</p>
						<p>Telp: (0778) 429199</p>
						<p>Email: <a href="mailto:ptbpragradhana@yahoo.co.id">ptbpragradhana@yahoo.co.id</a></p>

						<ul class="social-menu">
							<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-square facebook"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-twitter-square twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-instagram instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 mt-5">
					<div class="menus d-flex justify-content-end">
						<ul class="list-unstyled">
							<li> <a href="http://bprad.com/laporan-publikasi">Laporan Publikasi</a></li>
							<li> <a href="http://bprad.com/laporan-kelola">Tata Kelola</a></li>
							<li> <a href="http://bprad.com/profile-perusahaan">Profile Perusahaan</a></li>
							<li> <a href="http://bprad.com/karir">News &amp; Promo</a></li>
						</ul>
						<ul class="list-unstyled">
							<li> <a href="http://bprad.com/product/tabungan">Tabungan</a></li>
							<li> <a href="http://bprad.com/product/deposito">Deposito</a></li>
							<li> <a href="http://bprad.com/product/kredit">Kredit</a></li>
							<li> <a href="http://bprad.com/simulasi">simulasi</a></li>
						</ul>
					</div>
				</div>
      	</div>
      </footer>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>