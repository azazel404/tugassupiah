]@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Tipe Kredit</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
					<li class="breadcrumb-item active">Tipe Kredit</li>
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
						<a id="btnAdd" href="javascript:void(0)" class="btn btn-primary float-right">+ add new</a>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Created@</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($tipeKredits as $tipeKredit)
									<tr>
										<td>{{ $tipeKredit->name }}</td>
										<td>{{ $tipeKredit->created_at }}</td>
										<td>
											<button id="btnEdit" class="btn btn-primary" data-id="{{ $tipeKredit->id }}" data-name="{{ $tipeKredit->name }}">Edit</button>
											<a href="{{ route('admin.tipeKredit.delete', $tipeKredit->id) }}" class="btn btn-danger">Hapus</a>
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

<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formAdd" action="{{ route('admin.tipeKredit.add') }}" method="post">
					@csrf
					<div class="form-group">
						<label>Nama Tipe Kredit</label>
						<input type="text" name="name" class="form-control">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				<button form="formAdd" type="submit" class="btn btn-success">Tambah</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pengajuan selesai</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formAdd" action="{{ route('admin.tipeKredit.edit') }}" method="post">
					@csrf
					<input id="edtId" type="hidden" name="id">
					<div class="form-group">
						<label>Nama Tipe Kredit</label>
						<input id="edtName" type="text" name="name" class="form-control">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
				<a id="donePengajuan" href="" class="btn btn-success">Selesai</a>
			</div>
		</div>
	</div>
</div>
@endsection


@section('script')
<script type="text/javascript">

	$(document).on('click', '#btnAdd', function(){
		$('#modalAdd').modal('show')
	})

	$(document).on('click', '#btnEdit', function(){
		$('#edtId').val($(this).data('id'))
		$('#edtName').val($(this).data('name'))
		$('#modalEdit').modal('show');
	})
</script>
@endsection
