@extends('layouts.admin.app')
@section('stylesheet')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Berita</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="#">Berita</a></li>
					<li class="breadcrumb-item active">Tambah Berita</li>
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
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<div class="card">
					<div class="card-header">
						<span class="font-weight-light" style="font-size: 20px;">Tambah Berita</span> <button form="addContent" type="submit" class="btn btn-primary float-right">Simpan</button>
					</div>
					<div class="card-body">
						@if(Session::has('error'))
							<div class="alert alert-danger">
								{{ Session::get('error') }}
							</div>
						@endif
						<form id="addContent" action="{{ route('admin.content.create') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-row">
								<div class="form-group col">
									<label>Judul</label>
									<input type="text" name="title" class="form-control" placeholder="">
								</div>
								<div class="form-group col">
									<label>Cover gambar</label>
									<input type="file" name="cover" class="form-control">
								</div>
							</div>
                            <div class="form-group">
                                <label>Berita</label>
                                <div id="progress" class="progress">
									<div id="progress-bar" class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
										<b id="progress-bar-value">25%</b>										
									</div>
								</div>
                                <textarea id="content" name="content" style="display:none;">Hello, World!</textarea>
                                <div id="standalone-container">
                                	<div id="toolbar-container">
                                		<span class="ql-formats">
                                			<select class="ql-font"></select>
                                			<select class="ql-size"></select>
                                		</span>
                                		<span class="ql-formats">
                                			<button class="ql-bold"></button>
                                			<button class="ql-italic"></button>
                                			<button class="ql-underline"></button>
                                			<button class="ql-strike"></button>
                                		</span>
                                		<span class="ql-formats">
                                			<select class="ql-color"></select>
                                			<select class="ql-background"></select>
                                		</span>
                                		<span class="ql-formats">
                                			<button class="ql-script" value="sub"></button>
                                			<button class="ql-script" value="super"></button>
                                		</span>
                                		<span class="ql-formats">
                                			<button class="ql-header" value="1"></button>
                                			<button class="ql-header" value="2"></button>
                                			<button class="ql-blockquote"></button>
                                			<button class="ql-code-block"></button>
                                		</span>
                                		<span class="ql-formats">
                                			<button class="ql-list" value="ordered"></button>
                                			<button class="ql-list" value="bullet"></button>
                                			<button class="ql-indent" value="-1"></button>
                                			<button class="ql-indent" value="+1"></button>
                                		</span>
                                		<span class="ql-formats">
                                			<button class="ql-direction" value="rtl"></button>
                                			<select class="ql-align"></select>
                                		</span>
                                		<span class="ql-formats">
                                			<button class="ql-link"></button>
                                			<button class="ql-image"></button>
                                			<button class="ql-video"></button>
                                			<button class="ql-formula"></button>
                                		</span>
                                		<span class="ql-formats">
                                			<button class="ql-clean"></button>
                                		</span>
                                	</div>
                                	<div id="editor"></div>
                                </div>
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
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/quill-image-upload@0.1.3/image-upload.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
<script type="text/javascript">

    let progress = $('#progress');
    let progressBar = $('#progress-bar');
    let progressBarValue = $('#progress-bar-value');

    // console.log()
    $(document).ready(function(){
    	progress.hide()
    })

	$(document).on('change', '#slcCategory', function(){
		getSubCategory($(this).val())
	});

	function getSubCategory(id) {
		var subCategoryHTML = ""
		$.ajax({
			url : "/admin/category/json/" + id,
			type : "GET",
			success : (res) => {
				res.data.forEach((subCategory) => {
					subCategoryHTML += `
						<option value="${subCategory.id}">${subCategory.name}</option>
					`
				})
				$('#slcSubCategory').html(subCategoryHTML)
			}
		})
	}
	// Quill.register('modules/imageResize', ImageResize);

	let options = {
		modules: {
			toolbar: '#toolbar-container',
			imageUpload: {
	            url: '/admin/upload-image',
	            method: 'POST',
	            name: 'file',
	            withCredentials: false,
	            headers: {},
	            beforeSend: function() {
	            	progress.show()
	            	progressBarValue.text('0%')
	            },
	            uploadProgress: function(event, position, total, percentComplete) {
	            	progressBar.attr('aria-valuenow', percentComplete)
	            },
	            callbackOK: (serverResponse, next) => {
	                next(serverResponse.responseText);
	            },
	            callbackKO: serverError => {
	                alert(serverError);
	            }
	        },
	        imageResize: {
	        	modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
	        }
		},
		// imageHandler: imageHandler,
		theme: 'snow'
	}

	var quill = new Quill('#editor', options);
	var imageResize = quill.getModule('imageResize');

	quill.on('text-change', function() {
	    let html = $('.ql-editor').html();
	    console.log(html);
	    $('#content').val(html);
	});
</script>
@endsection
