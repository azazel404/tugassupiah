@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Pengaduan</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item active">Pengaduan</li>
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
				<div class="card">
					<div class="card-header">
						<a href="#" class="btn btn-primary float-right">+ add new</a>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Telepon</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1.</td>
									<td>Fahriansyah</td>
									<td>08956758694</td>
									<td>fachryansyah123@gmail.com</td>
									<td>
										<div class="btn-group">
											<a href="#" class="btn btn-outline-primary">Edit</a>
											<a href="#" class="btn btn-outline-danger">delete</a>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection