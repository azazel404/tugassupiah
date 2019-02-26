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
					<div class="card-header">
						<a href="{{ route('admin.tipeKredit') }}" class="btn btn-primary float-right">Tambah Jenis Kredit</a>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Telepon</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($pengajuans as $pengajuan)
									<tr>
										<td>{{ $pengajuan->name }}</td>
										<td>{{ $pengajuan->telephone }}</td>
										<td>{{ $pengajuan->email }}</td>
										<td>
											<div class="btn-group">
												<a id="btnDetailPengajuan" class="btn btn-xs btn-info show-detail text-white"
													data-id="{{ $pengajuan->id }}"
													data-telephone="{{ $pengajuan->telephone }}"
													data-name="{{ $pengajuan->name }}"
													data-email="{{ $pengajuan->email }}"
													data-address="{{ $pengajuan->address }}">
													<i class="fa fa-eye"></i>
												</a>
												<a id="btnDonePengajuan" class="btn btn-xs btn-success mark-read text-white" data-id="{{ $pengajuan->id }}">
													<i class="fa fa-check"></i>
												</a>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $pengajuans->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="modal fade bd-example-modal-lg" id="modalDetailPengajuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengajuan selesai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <div class="modal-body">
        <form>
			<div class="form-row">
				<div class="form-group col">
					<label>Nama lengkap</label>
					<input id="edtName" type="text" value="" class="form-control" disabled>
				</div>
				<div class="form-group col">
					<label>Telepon</label>
					<input id="edtTelepon" type="text" value="" class="form-control" disabled>
				</div>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input id="edtEmail" type="text" value="" class="form-control" disabled>
			</div>
			<div class="form-group col">
				<label>Alamat</label>
				<textarea id="edtAddress" rows="4" cols="80" class="form-control" disabled></textarea>
			</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalDonePengajuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengajuan selesai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="font-weight-light">Pengajuan ini selesai ?</h5>
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
	$(document).on('click', '#btnDonePengajuan', function(){
		$('#donePengajuan').attr('href', '/admin/pengajuan/delete/' + $(this).data('id'))
		$('#modalDonePengajuan').modal('show')
	})

	$(document).on('click', '#btnDetailPengajuan', function(){
		$('#edtName').val($(this).data('name'))
		$('#edtTelepon').val($(this).data('telephone'))
		$('#edtEmail').val($(this).data('email'))
		$('#edtAddress').val($(this).data('address'))
		$('#modalDetailPengajuan').modal('show');
	})
</script>
@endsection
