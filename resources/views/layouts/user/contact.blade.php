@extends('layouts.user.app')
@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-md-8 col-12">
			<h1 class="font-weight-bold">Hubungi Kami</h1>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.851669513505!2d106.84972711379898!3d-6.413098995359914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ebb04f6e16fd%3A0xaf59f873ded532c5!2sJl.+H.+Dimun+III%2C+Sukamaju%2C+Cilodong%2C+Kota+Depok%2C+Jawa+Barat+16415!5e0!3m2!1sen!2sid!4v1543848231934" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			<h3 class="mt-4">Marketing</h3>
			<ul class="list-unstyled">
				@foreach($marketings as $marketing)
					<li>
						<h5><b>{{ $marketing->name }} : </b> {{ $marketing->telepon }}</h5>
					</li>
				@endforeach
			</ul>
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
