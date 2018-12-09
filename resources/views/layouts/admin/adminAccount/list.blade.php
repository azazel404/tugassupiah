@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Manage Akun Admin</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item active">Manage Account Admin</li>
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
				@if(Session::has('message'))
					<div class="alert alert-success">
						{{ Session::get('message') }}
					</div>
				@elseif(Session::has('error'))
					<div class="alert alert-success">
						{{ Session::get('error') }}
					</div>
				@endif
				<div class="card">
					<div class="card-header">
						<a href="{{ route('admin.manage-account.admin.add') }}" class="btn btn-primary float-right">+ add new</a>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Email</th>
									<th>Super Admin</th>
									<th>Aktif</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($admins as $key => $admin)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $admin->name }}</td>
										<td>{{ $admin->email }}</td>
										<td>
											@if($admin->is_super_admin)
												<span class="badge badge-success">YES</span>
											@else
												<span class="badge badge-danger">NO</span>
											@endif
										</td>
										<td>
											@if($admin->is_active)
												<span class="badge badge-success">YES</span>
											@else
												<span class="badge badge-danger">NO</span>
											@endif
										</td>
										<td>
											<div class="btn-group">
												@if(!$admin->is_super_admin)
													<a href="{{ route('admin.manage-account.admin.edit', $admin->id) }}" class="btn btn-outline-primary">Edit</a>
													@if($admin->is_active)
														<a href="{{ route('admin.manage-account.admin.banned', $admin->id) }}" class="btn btn-danger">Banned</a>
													@else
														<a href="{{ route('admin.manage-account.admin.activate', $admin->id) }}" class="btn btn-success">Aktifkan</a>
													@endif
												@endif
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection