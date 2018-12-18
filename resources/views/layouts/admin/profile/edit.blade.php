@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Profile perusahaan</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item active">Edit Profile perusahaan</li>
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
						<span class="font-weight-light" style="font-size: 20px;">Edit profile perusahaan</span> <button form="addContent" type="submit" class="btn btn-primary float-right">Simpan</button>
					</div>
					<div class="card-body">
						@if(Session::has('error'))
							<div class="alert alert-danger">
								{{ Session::get('error') }}
							</div>
						@endif
						@if(Session::has('message'))
							<div class="alert alert-success">
								{{ Session::get('message') }}
							</div>
						@endif
						<form id="addContent" action="{{ route('admin.profile.update') }}" method="post">
							@csrf
                            <div class="form-group">
                                <textarea id="content" name="content">{{ $company_profile->content }}</textarea>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#content').summernote({
            height: 300,
            callbacks:{
                onImageUpload: function(files, editor, welEditable){
                    uploadImage(files[0], editor, welEditable);
                }
            }
        });
    });

    function uploadImage(file, editor, welEditable) {
        data = new FormData();
        data.append("file", file);
        $.ajax({
            data: data,
            type: "POST",
            url: "/admin/upload-image",
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                $('#content').summernote('editor.insertImage', url);
            }
        });
    }

</script>
@endsection
