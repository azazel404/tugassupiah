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
					<li class="breadcrumb-item active">Marketing</li>
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
						<a href="{{ route('admin.marketing.add') }}" class="btn btn-primary float-right">+ add new</a>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Telepon</th>
									<th>Created@</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($marketings as $key => $marketing)
								<tr>
									<td>{{ $key+1 }}.</td>
									<td>{{ $marketing->name }}</td>
									<td>{{ $marketing->telepon }}</td>
									<td>{{ $marketing->created_at }}</td>
									<td>
										<div class="btn-group">
											<a href="{{ route('admin.marketing.edit', $marketing->id) }}" class="btn btn-outline-primary">Edit</a>
											<a href="{{ route('admin.marketing.delete', $marketing->id) }}" class="btn btn-outline-danger">delete</a>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{ $marketings->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection