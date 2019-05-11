@extends('layouts.user.app')
@section('content')

<div class="container mt-5">
	<div class="row mb-5">
		<div class="col-md-12 col-12">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
					<img class="d-block w-100" src="{{ asset('img/slide1.jpeg') }}" alt="First slide">
					</div>
					<div class="carousel-item">
					<img class="d-block w-100" src="{{ asset('img/slide2.jpeg') }}" alt="Second slide">
					</div>
					<div class="carousel-item">
					<img class="d-block w-100" src="{{ asset('img/slide3.jpeg') }}" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				</div>
		</div>
	</div>

	<div class="row mt-7">
	 	<div class="col-md-12 col-12">
	 		<div class="text-center">
	 			<h2 class="font-weight-light">Selamat Datang di Website Teknik Informatika</h2>
	 		</div>
	 	</div>
	</div>

	<h2 class="mt-7 font-weight-light">Berita Teknik Informatika</h2>
	<div class="row mt-3">
		@foreach($contents as $content)
			<div class="col-md-4 col-12">
				<div class="card">
					<img class="card-img-top" src="{{ url('/storage/cover/' . $content->cover) }}" alt="{{ $content->title }}" style="width:100%;height:190px">
					<div class="card-body">
						<h5 class="card-title">{{ $content->title }}</h5>
						<a href="{{ route('content.detail', $content->slug) }}" class="btn btn-primary btn-block">Lihat Detail</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	</div>
</div>

@endsection
