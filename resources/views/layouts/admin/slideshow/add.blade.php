@extends('layouts.admin.app')
@section('stylesheet')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Slideshow</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item active">Slideshow</li>
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
				<div class="card">
					<div class="card-header">
						<button type="submit" form="addSlideshow" class="btn btn-primary float-right">Tambah slide</button>
					</div>
					<div class="card-body">
						<form id="addSlideshow" action="{{ route('admin.slideshow.create') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>Masukkan gambar</label>
								<input type="file" name="image" class="form-control" name="image">
							</div>
							<div class="form-group">
								<label>Pilih Konten</label>
								<select class="js-example-basic-single form-control" name="content_id">
									<option value="0">Tanpa Konten</option>
									@foreach($contents as $content)
										<option value="{{ $content->id }}">{{ $content->title }}</option>
									@endforeach
								</select>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>
@endsection