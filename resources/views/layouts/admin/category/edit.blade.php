@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Kategori {{ $category->name }}</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="{{ route('admin.category') }}">Kategori</a></li>
					<li class="breadcrumb-item active">Edit Kategori</li>
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
						<span class="font-weight-light" style="font-size: 20px;">Edit {{ $category->name }}</span> <button type="submit" form="editCategory" class="btn btn-primary float-right">Simpan</button>
					</div>
					<div class="card-body">
						<form id="editCategory" action="{{ route('admin.category.update', $category->id) }}" method="post">
							@csrf
							<div class="form-row">
								<div class="form-group col">
									<label>Nama Kategori</label>
									<input type="text" name="name" class="form-control" placeholder="*layanan, news, produk" value="{{ $category->name }}">
								</div>
							</div>
						</form>

						<div class="d-flex flex-row mt-3">
							<div class="mr-auto">
								<h6 class="font-weight-bold">Sub kategori</h6>
							</div>
							<div class="ml-auto">
								<button id="btnAddSubCategory" class="btn btn-primary btn-sm">+ Add new</button>
							</div>
						</div>

						<div class="list-group mt-2">
							@foreach($category->categoryItem as $category_item)
								<div class="list-group-item list-group-item-action">
									<div class="d-flex">
										<div class="mr-auto">
											{{ $category_item->name }}
										</div>
										<div class="ml-auto">
											<a id="btnEditSubCategory" href="javascript:void(0)" class="btn btn-outline-info btn-sm" data-id="{{ $category_item->id }}" data-name="{{ $category_item->name }}">edit</a>
											<a id="btnDeleteSubCategory" href="javascript:void(0)" class="btn btn-outline-danger btn-sm" data-id="{{ $category_item->id }}">del</a>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalAddSubCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah sub kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addSubCategory" action="{{ route('admin.category.item.create') }}" method="post">
			@csrf
			<input type="hidden" name="category_id" value="{{ $category->id }}">
        	<div class="form-group">
        		<label>Nama sub kategori</label>
				<input type="text" name="name" value="" placeholder="*produk, kredit, uang" class="form-control">
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button form="addSubCategory" type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEditSubCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditSubCategoryLabel">Edit sub kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editSubCategory" action="{{ route('admin.category.item.update') }}" method="post">
			@csrf
			<input id="edtIdSubCategory" type="hidden" name="id" value="">
			<div class="form-group">
				<label>Nama sub kategori</label>
				<input id="edtNameSubCategory" type="text" name="name" value="" placeholder="*produk, news, kredit" class="form-control">
			</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button form="editSubCategory" type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDeleteSubCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus sub kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Jika anda menghapus sub kategori ini maka konten - konten yang menggunakan kategori ini akan ikut terhapus <br>
		apakah anda yakin untk menghapus ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a id="deleteSubCategory" href="" class="btn btn-danger">Save changes</a>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).on('click', '#btnAddSubCategory', function(){
		$('#modalAddSubCategory').modal('show');
	})

	$(document).on('click', '#btnEditSubCategory', function(){
		$('#edtIdSubCategory').val($(this).data('id'));
		$('#edtNameSubCategory').val($(this).data('name'));
		$('#modalEditSubCategoryLabel').text("Edit sub kategori : " + $(this).data('name'))
		$('#modalEditSubCategory').modal('show');
	})

	$(document).on('click', '#btnDeleteSubCategory', function(){
		$('#deleteSubCategory').attr('href', '/admin/category/item/delete/' + $(this).data('id'))
		$('#modalDeleteSubCategory').modal('show');
	})
</script>
@endsection
