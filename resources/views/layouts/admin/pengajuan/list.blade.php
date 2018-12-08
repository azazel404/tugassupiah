@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Pengajuan</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item active">Pengajuan</li>
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
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Telepon</th>
									<th>Email</th>
									<th>Alamat</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Fahriansyah</td>
									<td>08956758694</td>
									<td>fachryansyah123@gmail.com</td>
									<td>saya kurang aqua gan</td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info show-detail" data-id="533">
											<i class="fa fa-eye"></i>
											</button>
											<button class="btn btn-xs btn-success mark-read" data-id="533" data-toggle="tooltip" data-placement="top" data-title="Mark as read" data-original-title="" title="">
											<i class="fa fa-check"></i>
											</button>
										</div>
									</td>
								</tr>
								<tr>
									<td>Fahriansyah</td>
									<td>08956758694</td>
									<td>fachryansyah123@gmail.com</td>
									<td>saya kurang aqua gan</td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info show-detail" data-id="533">
											<i class="fa fa-eye"></i>
											</button>
											<button class="btn btn-xs btn-success mark-read" data-id="533" data-toggle="tooltip" data-placement="top" data-title="Mark as read" data-original-title="" title="">
											<i class="fa fa-check"></i>
											</button>
										</div>
									</td>
								</tr>
									<tr>
									<td>Fahriansyah</td>
									<td>08956758694</td>
									<td>fachryansyah123@gmail.com</td>
									<td>saya kurang aqua gan</td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info show-detail" data-id="533">
											<i class="fa fa-eye"></i>
											</button>
											<button class="btn btn-xs btn-success mark-read" data-id="533" data-toggle="tooltip" data-placement="top" data-title="Mark as read" data-original-title="" title="">
											<i class="fa fa-check"></i>
											</button>
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