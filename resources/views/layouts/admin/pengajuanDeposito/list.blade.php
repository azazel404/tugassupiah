@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Pengajuan Deposito</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item active">Pengajuan Deposito</li>
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
				@if($errors->any())
					<div class="alert alert-danger">
						<ul class="list-unstyled">
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<div class="card">
					<div class="card-header">
						<a id="btnAddNew" href="javascript:void(0)" class="btn btn-primary float-right">+ add new</a>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Nama File</th>
									<th>Link File</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($pengajuanDepositos as $pengajuanDeposito)
									<tr>
										<td>{{ $pengajuanDeposito->name }}</td>
										<td>
											<a target="__blank" href="{{ asset('storage/form_deposito/') . '/' . $pengajuanDeposito->file_pdf }}">Download</a>
										</td>
										<td>
											<span class="badge {{ $pengajuanDeposito->status == 1 ? 'badge-success' : 'badge-danger' }}">{{ $pengajuanDeposito->status == 1 ? 'AKTIF' : 'TIDAK AKTIF'}}</span>
										</td>
										<td>
											<a href="{{ route('admin.pengajuan.deposito.delete', $pengajuanDeposito->id) }}" class="btn btn-danger">Hapus</a>
											<a id="btnEdit" href="javascript:void(0)" class="btn btn-primary" data-id="{{ $pengajuanDeposito->id }}" data-name="{{ $pengajuanDeposito->name }}">Edit</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $pengajuanDepositos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah pengajuan deposito</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="addPengajuan" method="post" action="{{ route('admin.pengajuan.deposito.add') }}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>Nama File</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>File Pdf</label>
						<input type="file" name="file_pdf" class="form-control">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				<button form="addPengajuan" type="submit" class="btn btn-primary">Tambahkan</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit pengajuan deposito</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formEdit" method="post" action="{{ route('admin.pengajuan.deposito.edit') }}">
					@csrf
					<input id="edtId" type="hidden" name="id">
					<div class="form-group">
						<label>Nama File</label>
						<input id="edtName" type="text" name="name" class="form-control">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
				<button form="formEdit" type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>
@endsection


@section('script')
<script type="text/javascript">
	$(document).on('click', '#btnDonePengajuan', function(){
		$('#donePengajuan').attr('href', '/admin/pengajuan/delete/' + $(this).data('id'))
		$('#modalDonePengajuan').modal('show')
	})

	$(document).on('click', '#btnAddNew', function(){
		$('#modalAdd').modal('show');
	})

	$(document).on('click', '#btnEdit', function(){
		$('#edtId').val($(this).data('id'))
		$('#edtName').val($(this).data('name'))
		$('#modalEdit').modal('show')
	})
</script>
@endsection
