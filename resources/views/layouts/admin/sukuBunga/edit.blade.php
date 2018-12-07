@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Suku Bunga</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="#">Suku Bunga</a></li>
					<li class="breadcrumb-item active">Edit Suku Bunga</li>
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
						<span class="font-weight-light" style="font-size: 20px;">Edit @{{ nama suku bunga }}</span> <a href="#" class="btn btn-primary float-right">Simpan</a>
					</div>
					<div class="card-body">
						<form>
							<div class="form-row">
								<div class="form-group col">
									<label>Nama</label>
									<input type="text" name="name" class="form-control" placeholder="*kredit">
								</div>
								<div class="form-group col">
									<label>Nilai</label>
									<input type="text" name="contact" class="form-control" placeholder="2.0%">
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