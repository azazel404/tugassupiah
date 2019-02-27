@extends('layouts.user.app')
@section('content')

<div class="container mt-5">
	<div class="row mb-5">
		<div class="col-md-12 col-12">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					@foreach($slideshows as $key => $slideshow)
						<li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
					@endforeach
				</ol>
				<div class="carousel-inner">
					@foreach($slideshows as $key => $slideshow)
						<div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
							<a target="_blank" href="{{ (isset($slideshow->content->slug) ? route('content.detail', $slideshow->content->slug) : route('content.notfound')) }}">
								<img src="{{ asset('storage/slideshow/') . '/' . $slideshow->image }}" class="d-block w-100">
							</a>
						</div>
					@endforeach
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>

	<div class="row mt-7">
	 	<div class="col-md-12 col-12">
	 		<div class="text-center">
	 			<h2 class="font-weight-light">Selamat Datang di Website BPR PONDASI, <br> Kami siap melayani kebutuhan finansial Anda.</h2>
	 		</div>
	 	</div>
	</div>

	<div class="row mt-5">
		<div class="col-md-4 col-12">
			<div class="text-center p-4">
				<img src="{{ asset('img/icon/kredit.png') }}" class="img-icon">
				<h4 class="mt-3 font-weight-bold">Kredit</h4>
				<p>Kami menghadirkan Produk Jasa Kredit dan Pembiayaan untuk segala kebutuhan anda di BPR Pondasi.</p>
			</div>
		</div>
		<div class="col-md-4 col-12">
			<div class="text-center p-4">
				<img src="{{ asset('img/icon/deposit.png') }}" class="img-icon">
				<h4 class="mt-3 font-weight-bold">Deposito</h4>
				<p>Produk jasa Deposito, memberikan keuntungan aman karena Simpanan anda di BPR Pondasi.</p>
			</div>
		</div>
		<div class="col-md-4 col-12">
			<div class="text-center p-4">
				<img src="{{ asset('img/icon/tabungan.png') }}" class="img-icon">
				<h4 class="mt-3 font-weight-bold">Tabungan</h4>
				<p>Kami juga menghadirkan berbagai variasi Tabungan dengan bunga yang sangat menguntungkan.</p>
			</div>
		</div>
	</div>


	<h2 class="mt-7 font-weight-light">News & Promo</h2>
	<div class="row mt-3">
		@foreach($contents as $content)
			<div class="col-md-4 col-12">
				<div class="card">
					<img class="card-img-top" src="{{ url('/storage/cover/' . $content->cover) }}" alt="{{ $content->title }}" style="width:100%;height:190px">
					<div class="card-body">
						<h5 class="card-title">{{ $content->title }}</h5>
						<a href="{{ route('content.detail', $content->slug) }}" class="btn btn-primary">Read more.</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>

	<div class="row mt-7">
		<div class="col-md-12 col-12">
			
		</div>
	</div>

	<div class="row mt-2">
		<div class="col-md-3 col-5 brand-responsive">
			<h6>BPR PONDASI terdaftar dan diawasi oleh:</h6>
			<div class="card">
				<div class="card-body">
					<a href="https://www.ojk.go.id/id/Default.aspx">
						<img class="img-fluid d-block mx-auto" src="{{ asset('img/OJK-logo-baru.jpg') }}" alt="">
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-5 brand-responsive mt-3">
			<h6>Simpanan BPR Pondasi dijamin oleh :</h6>
			<div class="card">
				<div class="card-body">
					<a href="http://www.lps.go.id/">
						<img class="img-fluid d-block mx-auto" src="{{ asset('img/LPS-logo-baru.png') }}" alt="">
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-5 brand-responsive mt-5">
			<div class="card">
				<div class="card-body">
					<a href="https://www.bi.go.id/id/Default.aspx">
						<img class="img-fluid d-block mx-auto" src="{{ asset('img/lobo-bi-baru.png') }}" alt="">
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-5 brand-responsive mt-5">
			<div class="card">
				<div class="card-body">
					<a href="http://ayokebank.com/">
						<img class="img-fluid d-block mx-auto" src="{{ asset('img/logo-ayo-ke-bank.png') }}" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
