@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Slideshow</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item active">Slideshow</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
	<div class="container-fluid">
		<a href="{{ route('admin.slideshow.add') }}" class="btn btn-primary">+ add new</a>
		<div class="row mt-3">
			@foreach($slideshows as $slideshow)
				<div class="col-md-4 col-12">
					<div class="card">
						<a target="_blank" href="{{ route('content.detail', $slideshow->content->slug) }}">
							<img src="{{ asset('storage/slideshow/') . '/' . $slideshow->image }}" class="img-fluid">
						</a>
						<div class="card-body">
							<a href="" class="btn btn-primary">Edit</a>
							<a href="" class="btn btn-danger">Hapus</a>
						</div>
					</div>
				</div>
			@endforeach
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
		$('#deleteCategory').attr('href', '/admin/slideshow/delete/' + $(this).data('id'));
		$('#modalDeleteCategory').modal('show');
	})
</script>
@endsection
