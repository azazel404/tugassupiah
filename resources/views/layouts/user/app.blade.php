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
			<a class="navbar-brand" href="{{route('home')}}">
				<img src="{{ asset('img/logo-full.png') }}" class="img-fluid" style="width:300px;">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('profile') }}">Tentang Kami</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('sukubunga') }}">Suku Bunga</a>
					</li>
					@foreach($categories as $category)
						<li class="nav-item {{ ($category->categoryItem ? 'dropdown' : '') }}">
							<a class="nav-link {{ (count($category->categoryItem) > 0 ? 'dropdown-toggle' : '') }}" href="{{ (count($category->categoryItem) > 0 ? '#' : route('content.category', $category->id)) }}" id="{{ $category->id }}" data-toggle="{{ (count($category->categoryItem) > 0 ? 'dropdown' : '') }}">
								{{ $category->name }}
							</a>
							@if(count($category->categoryItem) > 0)
								<div class="dropdown-menu" aria-labelledby="{{ $category->id }}">
									@foreach($category->categoryItem as $category_item)
										<a class="dropdown-item" href="{{ route('content.subCategory', $category_item->id) }}">{{ $category_item->name }}</a>
									@endforeach
								</div>
							@endif
						</li>
					@endforeach
					<li class="nav-item">
						<a class="nav-link" href="{{ route('service') }}">Fitur Layanan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('contact') }}">Hubungi Kami</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	@yield('content')
	<footer class="main-footer mt-9">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mt-5" style="text-align:center">
					<div class="logo">
						<h4 class="">BPR Pondasi Niaga Perdana</h4>
					</div>
					<div class="contact-details">
						<p>Alamat: Ruko Permata Harapan Baru  Blok H/30,
						Jl. Raya Pejuang Jaya,  Harapan Indah, Bekasi Barat  17.131</p>
						<p>Call Center: 021-8897.4058 -  021-8888.0699</p>
						<p>Email: <a href="mailto:test@gmail.com">bank_pondasi@yahoo.com</a></p>
						<p style="margin-top:-20px">Email adm: <a href="mailto:test@gmail.com">adm.bank.pondasi@gmail.com</a></p>
						<ul class="social-menu" style="margin-right:30px">
							<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-square facebook"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-twitter-square twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-instagram instagram"></i></a></li>
						</ul>
					</div>
				</div>
      	</div>
      </footer>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	@yield('script')
</body>
</html>
