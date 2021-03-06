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
				<h1 class="m-0 text-dark">Berita {{ $content->title }}</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="{{ route('admin.content') }}">Berita</a></li>
					<li class="breadcrumb-item active">Edit Berita</li>
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
						<span class="font-weight-light" style="font-size: 20px;">Edit Berita</span> <button form="addContent" type="submit" class="btn btn-primary float-right">Simpan</button>
					</div>
					<div class="card-body">
						@if(Session::has('error'))
							<div class="alert alert-danger">
								{{ Session::get('error') }}
							</div>
						@endif
						<form id="addContent" action="{{ route('admin.content.update', $content->id) }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-row">
								<div class="form-group col">
									<label>Judul</label>
									<input type="text" name="title" class="form-control" placeholder="" value="{{ $content->title }}">
								</div>
								<div class="form-group col">
									<label>Cover gambar</label>
									<br>
									<img src="{{ asset('img/blog/') . '/' . $content->cover }}" alt="{{ $content->title }}" style="width: 300px; height:300px">
									<input type="file" name="cover" class="form-control mt-2">
								</div>
							</div>
                            <div class="form-group">
                                <label>Berita</label>
                                <!-- <div id="progress" class="progress">
									<div id="progress-bar" class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
										<b id="progress-bar-value">25%</b>										
									</div>
								</div> -->
                                <textarea id="content" name="content" style="display:none;">{{ $content->content }}</textarea>
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
                                	<div id="editor">
                                		{!! $content->content !!}
                                	</div>
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
<script type="text/javascript">

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
