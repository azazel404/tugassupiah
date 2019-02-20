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
								@foreach($pengaduans as $pengaduan)
									<tr>
										<td>{{ $pengaduan->name }}</td>
										<td>{{ $pengaduan->telephone }}</td>
										<td>{{ $pengaduan->email }}</td>
										<td>
											<div class="btn-group">
												<a id="btnDetailPengaduan" href="javascript:void(0)" class="btn btn-xs btn-info show-detail"
													data-id="{{ $pengaduan->id }}"
													data-name="{{ $pengaduan->name }}"
													data-telephone="{{ $pengaduan->telephone }}"
													data-email="{{ $pengaduan->email }}"
													data-message="{{ $pengaduan->message }}">
													<i class="fa fa-eye"></i>
												</a>
												<a id="btnDonePengaduan" href="javascript:void(0)" class="btn btn-xs btn-success mark-read" data-id="{{ $pengaduan->id }}">
													<i class="fa fa-check"></i>
												</a>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $pengaduans->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade bd-example-modal-lg" id="modalDetailPengaduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail pengaduan</h5>
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
				<label>Pesan</label>
				<textarea id="edtMessage" rows="4" cols="80" class="form-control" disabled></textarea>
			</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDonePengaduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengaduan selesai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="font-weight-light">Pengaduan ini selesai ?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <a id="donePengaduan" href="" class="btn btn-success">Selesai</a>
      </div>
    </div>
  </div>
</div>
@endsection


@section('script')
<script type="text/javascript">
	$(document).on('click', '#btnDetailPengaduan', function(){
		$('#edtName').val($(this).data('name'))
		$('#edtTelepon').val($(this).data('telephone'))
		$('#edtEmail').val($(this).data('email'))
		$('#edtMessage').val($(this).data('message'))
		$('#modalDetailPengaduan').modal('show')
	})

	$(document).on('click', '#btnDonePengaduan', function(){
		$('#donePengaduan').attr('href', '/admin/pengaduan/delete/' + $(this).data('id'))
		$('#modalDonePengaduan').modal('show')
	})
</script>
@endsection
