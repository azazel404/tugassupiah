@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Admin Account</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="#">Admin Account</a></li>
					<li class="breadcrumb-item active">Tambah Admin Account</li>
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
						<span class="font-weight-light" style="font-size: 20px;">Tambah Admin</span> <button form="addAdmin" type="submit" class="btn btn-primary float-right">Simpan</button>
					</div>
					<div class="card-body">
						@if(Session::has('error'))
							<div class="alert alert-danger">
								{{ Session::get('error') }}
							</div>
						@endif
						@if($errors->any())
							<ul>
								@foreach($errors->all as $error)
									<li class="alert alert-danger">{{ $error }}</li>
								@endforeach
							</ul>
						@endif
						<form id="addAdmin" action="{{ route('admin.manage-account.admin.create') }}" method="post">
							@csrf
							<div class="form-row">
								<div class="form-group col">
									<label>Nama admin</label>
									<input type="text" class="form-control" placeholder="*jeremy" name="name">
								</div>
								<div class="form-group col">
									<label>Email</label>
									<input type="text" class="form-control" placeholder="*email@email.com" name="email">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col">
									<label>Password</label>
									<input type="password" class="form-control" placeholder="******" name="password">
								</div>
								<div class="form-group col">
									<label>Ketik ulang Password</label>
									<input type="password" class="form-control" placeholder="******" name="retype_password">
								</div>
							</div>
							<div class="form-group">
								<input type="checkbox" name="is_super_admin" value="true">
								<label>Super Admin</label>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection