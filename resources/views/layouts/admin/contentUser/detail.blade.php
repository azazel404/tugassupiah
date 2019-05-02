@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
</div>
<!-- /.content-header -->

<section class="content">
	<div class="container-fluid">
        <div class="card">
                <div class="card-body">
                        <div class="row mt-4">
                                <div class="col-md-6 col-12">
                                            <h1 class="font-weight-light mt-5"><b>{{ $content->title }}</b></h1>
                                            <img class="img-fluid mt-3" style="width:400px;height:300px" src="{{ asset('img/blog/') . '/' . $content->cover }}" alt="{{ $content->title }}">
                                            <br><br>
                                            <span class="text-gray">tanggal dibuat : {{ $content->created_at }}</span>
                                    </div>
                                    <div class="col-md-6">
                                    <div style="margin-top:129px;text-align:justify">
                                        {!! $content->content !!}
                                    </div>
                                    </div>
                        </div>
              
                 </div>
        </div>
	</div>
</section>
@endsection

@section('script')
<script type="text/javascript">
	$(document).on('click', '#btnDeleteContent', function(){
		$('#deleteContent').attr('href', '/admin/content/delete/' + $(this).data('id'))
		$('#modalDeleteContent').modal('show');
	})
</script>
@endsection
