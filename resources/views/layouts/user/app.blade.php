<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kampus Ku</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

</head>
<body>
	<div class="container-nav">
		<nav class="mt-4 navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="{{route('home')}}">
				<img src="{{ asset('img/logo.png') }}" class="img-fluid" style="width:300px;height:80px">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('pelajaran.list')}}">Materi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('content.list')}}">Berita</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('calendarmahasiswa.list')}}">Calendar Mahasiswa</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	@yield('content')
	
	<footer class="main-footer mt-9">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mt-5" style="text-align:center;">
					<div class="logo">
						<h4 class="">Teknik Informatika Website</h4>
					</div>
					<div class="contact-details">
						<p>It is a long established fact page when looking at its layout. </p>
						<p>Email: <a href="mailto:test@gmail.com">supiahanatasya@gmail.com</a></p>
						<ul class="social-menu" style="margin-right:30px">
							<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-square facebook"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-twitter-square twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-instagram instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
      	</div>
      </footer>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	@yield('script')
</body>
</html>
