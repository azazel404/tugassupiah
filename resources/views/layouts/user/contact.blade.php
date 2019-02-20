@extends('layouts.user.app')
@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-md-8 col-12">
			<h1 class="font-weight-bold">Hubungi Kami</h1>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6110759900334!2d106.98659221410954!3d-6.182777145523914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698bec197c772d%3A0x5c8eee1c44eba34!2sPT.+BPR+Pondasi+Niaga+Perdana!5e0!3m2!1sen!2sid!4v1550649491060" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
			<!-- <div class="card blue">
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
			</div> -->

			<div class="card blue mt-5">
				<div class="card-header">
					News & produk
				</div>
				<div class="card-body">
					<div class="list-unstyled">
						@foreach($contents as $content)
							<li class="pt-2 pb-2">
								<div class="d-flex">
									<img src="{{ asset('storage/cover/') . '/' . $content->cover }}" class="img-thumb">
									<div class="ml-3">
										<a href="">
											<h5 class="m-none">{{ $content->title }}</h5>
										</a>
										<span class="text-gray">{{ $content->created_at->diffForHumans() }}</span>
									</div>
								</div>
							</li>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
