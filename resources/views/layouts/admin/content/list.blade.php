@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Konten</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item active">Konten</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-12">
				<a href="{{ route('admin.marketing.add') }}" class="btn btn-primary float-right">+ add new</a>
			</div>
		</div>
		<div class="row mt-4">
			@foreach($contents as $content)
				<div class="col-md-4 col-12">
					<div class="card">
						<img class="card-img-top" src="{{ asset('storage/cover/') . '/' . $content->cover }}" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">{{ $content->title }}</h5>
							<small class="text-grey">{{ $content->CategoryItem->name }} | {{ $content->created_at->diffForHumans() }}</small>
							<br>
							<a href="#" class="btn btn-info mt-3">Lihat</a>
							<a href="#" class="btn btn-primary mt-3">Edit</a>
							<a href="#" class="btn btn-danger mt-3">Hapus</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
@endsection
