@extends('layouts.user.app')
@section('content')
<div class="container">
	<div class="row mt-5">
		<div class="col-md-8 col-12">
			<h1 class="font-weight-light">Materi</h1>
			<br>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>title</th>
						<th>file materi</th>
						<th>jurusan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
			@foreach($Materies as $key => $materi)
						<tr>
							<td>{{ $materi->title }}</td>
							<td>{{ $materi->filemateri }}</td>
							<td>{{ $materi->jurusan }}</td>
							<td>
							<div class="btn-group">
								<a href="{{ asset('img/materi/' . $materi->filemateri)}}" class="btn btn-outline-primary">Download</a>
							</div>
						</td>
						</tr>
			@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<div class="card blue mt-5">
				<div class="card-header">
					Berita Lainnya
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