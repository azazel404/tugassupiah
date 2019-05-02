@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Materi</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="#">Materi</a></li>
					<li class="breadcrumb-item active">Edit Materi</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-12">
				@if($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<div class="card">
					<div class="card-header">
						<span class="font-weight-light" style="font-size: 20px;">Edit <span class="font-weight-normal">{{ $materi->name }}</span></span> <button form="editMateri" type="submit" class="btn btn-primary float-right">Simpan</button>
					</div>
					<div class="card-body">
					@if(Session::has('error'))
							<div class="alert alert-danger">
								{{ Session::get('error') }}
							</div>
						@endif
						<form id="editMateri" action="{{ route('admin.materi.update', $materi->id) }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group row">
									<label style="margin-right:50px">title</label>
									<div class="col-sm-10">
									<input type="text" name="title" class="form-control" placeholder=""  value="{{ $materi->title }}">
									</div>
								</div>
								<div class="form-group row">
									<label style="margin-right:28px">jurusan</label>
									<div class="col-sm-10">
									<input type="text" name="jurusan" class="form-control" placeholder=""  value="{{ $materi->jurusan }}">
									</div>
								</div>	
								<div class="form-group row">
									<label style="margin-right:5px">File Materi</label>
									<div class="col-sm-10">
									<input type="file" name="filemateri" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<label>description</label>
									<div class="col-sm-10">
									<textarea type="text" name="description" class="form-control" placeholder="">{{ $materi->description }}</textarea>
									</div>
								</div>
								
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection