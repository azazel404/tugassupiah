@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Marketing</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="#">Marketing</a></li>
					<li class="breadcrumb-item active">Tambah Marketing</li>
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
						<span class="font-weight-light" style="font-size: 20px;">Tambah marketing</span> <button form="addMarketing" type="submit" class="btn btn-primary float-right">Simpan</button>
					</div>
					<div class="card-body">
						<form id="addMarketing" action="{{ route('admin.marketing.create') }}" method="post">
							@csrf
							<div class="form-row">
								<div class="form-group col">
									<label>Name</label>
									<input type="text" name="name" class="form-control" placeholder="Uzumaki naruto">
								</div>
								<div class="form-group col">
									<label>Contact</label>
									<input type="text" name="telepon" class="form-control" placeholder="098767890 / uzumaki@gmail.com">
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