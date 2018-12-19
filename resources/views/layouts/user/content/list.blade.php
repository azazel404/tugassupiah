@extends('layouts.user.app')
@section('content')
<div class="container">
	<div class="row mt-5">
		<div class="col-md-8 col-12">
			<h1 class="font-weight-light">{{ $categoryName }}</h1>

			<div class="row mt-5">
				@foreach($contents as $content)
					<div class="col-md-6 col-12">
						<div class="card">
							<img class="card-img-top" src="{{ url('/storage/cover/' . $content->cover)  }}" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">{{ $content->title }}</h5>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<div class="col-md-4">
			<div class="card blue">
				<div class="card-header">
					Search
				</div>
				<div class="card-body">
					<form>
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control" id="validationCustomUsername" placeholder="search.." aria-describedby="inputGroupPrepend" required>
								<div class="invalid-feedback">
									search..
								</div>
								<div class="input-group-prepend">
									<button class="btn btn-primary"><i class="fas fa-search"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="card blue mt-5">
				<div class="card-header">
					News & produk
				</div>
				<div class="card-body">
					<div class="list-unstyled">
						<li class="pt-2 pb-2">
							<div class="d-flex">
								<img src="{{ asset('img/Banner_ATS.jpg') }}" class="img-thumb">
								<div class="ml-3">
									<a href="">
										<h5 class="m-none">Selamat Hari BPR dan BPRS Nasional</h5>
									</a>
									<span class="text-gray">Jul 11, 2018 04:56am</span>
								</div>
							</div>
						</li>
						<li class="pt-2 pb-2">
							<div class="d-flex">
								<img src="{{ asset('img/Banner_ATS.jpg') }}" class="img-thumb">
								<div class="ml-3">
									<a href="">
										<h5 class="m-none">Selamat Hari BPR dan BPRS Nasional</h5>
									</a>
									<span class="text-gray">Jul 11, 2018 04:56am</span>
								</div>
							</div>
						</li>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
