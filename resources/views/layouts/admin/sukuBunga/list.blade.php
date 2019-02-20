@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Suku Bunga</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item active">Suku Bunga</li>
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
						<a href="{{ route('admin.sukuBunga.add') }}" class="btn btn-primary float-right">+ add new</a>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Nilai</th>
									<th>Created@</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($sukuBungas as $key => $sukuBunga)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $sukuBunga->name }}</td>
										<td>{{ $sukuBunga->value }}</td>
										<td>{{ $sukuBunga->created_at }}</td>
										<td>
											<div class="btn-group">
												<a href="{{ route('admin.sukuBunga.edit', $sukuBunga->id) }}" class="btn btn-outline-primary">Edit</a>
												<a id="btnDeleteSukuBunga" href="javascript:void(0)" class="btn btn-outline-danger" data-id="{{ $sukuBunga->id }}">delete</a>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $sukuBungas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="modalDeleteSukuBunga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Suku bunga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Apakah kamu yakin ingin menghapus suku bunga ini ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a id="deleteSukuBunga" href="" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
@endsection


@section('script')
<script type="text/javascript">
	$(document).on('click', '#btnDeleteSukuBunga', function(){
		$('#deleteSukuBunga').attr('href', '/admin/suku-bunga/delete/' + $(this).data('id'))
		$('#modalDeleteSukuBunga').modal('show')
	})
</script>
@endsection
