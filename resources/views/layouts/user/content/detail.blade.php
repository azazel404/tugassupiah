@extends('layouts.user.app')
@section('content')
<div class="container">
	<div class="row mt-5">
		<div class="col-md-8 col-12">
			<h1 class="font-weight-light mt-5">{{ $content->title }}</h1>
			<img class="img-fluid mt-3" src="{{ url('/storage/cover/' . $content->cover) }}" alt="{{ $content->title }}">
			<div class="mt-5">
				{!! $content->content !!}
			</div>
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
