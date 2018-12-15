@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Kategori</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item active">Kategori</li>
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
						<a href="{{ route('admin.category.add') }}" class="btn btn-primary float-right">+ add new</a>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Created@</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($categories as $key => $category)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $category->name }}</td>
										<td>{{ $category->created_at }}</td>
										<td>
											<div class="btn-group">
												<a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-outline-primary">Edit</a>
												<a href="javascript:void(0)" id="btnDeleteCategory" class="btn btn-outline-danger" data-id="{{ $category->id }}">Delete</a>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $categories->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Modal -->
<div class="modal fade" id="modalDeleteCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Jika anda menghapus kategori ini, maka konten - konten yang menggunakan kategori ini akan ikut terhapus. <br>
		apakah anda yakin ingin menghapus ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a id="deleteCategory" href="" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).on('click', '#btnDeleteCategory', function(){
		$('#deleteCategory').attr('href', '/admin/category/delete/' + $(this).data('id'));
		$('#modalDeleteCategory').modal('show');
	})
</script>
@endsection
