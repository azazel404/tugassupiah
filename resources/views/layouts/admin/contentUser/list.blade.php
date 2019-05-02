@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Konten</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item active">Berita</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
	<div class="container-fluid">
		<div class="row mt-4">
			@foreach($contents as $content)
				<div class="col-md-4 col-12 mt-2">
					<div class="card">
						<img class="card-img-top" src="{{ asset('img/blog/') . '/' . $content->cover }}" alt="Card image cap" style="width:100%;height:190px">
						<div class="card-body">
							<h5 class="card-title">{{ $content->title }}</h5>
							<br>
							<a href="{{ route('admin.berita.detail', $content->id) }}" class="btn btn-primary btn-block mt-3">detail</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		{{ $contents->links() }}
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalDeleteContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus kontent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus konten ini ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a id="deleteContent" href="" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).on('click', '#btnDeleteContent', function(){
		$('#deleteContent').attr('href', '/admin/content/delete/' + $(this).data('id'))
		$('#modalDeleteContent').modal('show');
	})
</script>
@endsection
