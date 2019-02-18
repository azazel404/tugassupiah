@extends('layouts.user.app')
@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-md-8 col-12">
			<h1 class="font-weight-bold">Fitur Layanan</h1>

			@if(Session::has('message'))
				<div class="alert alert-success">
					<h4>{{ Session::get('message') }}</h4>
				</div>
			@elseif(Session::has('error'))
				<div class="alert alert-danger">
					<h4>{{ Session::get('error') }}</h4>
				</div>
			@endif

			@if($errors->any())
				<ul class="alert alert-danger">
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif

			<div class="form-group">
				<label>Perihal</label>
				<select id="slcPrihal" class="form-control" on>
					<option value="2">Pengaduan</option>
					<option value="1">Pengajuan Kredit</option>
					<option value="3">Pengajuan Tabungan</option>
				</select>
			</div>

			<form id="formPengaduan" action="{{ route('service.pengaduan') }}" method="post">
				@csrf
				<div class="form-row">
					<div class="form-group col">
						<label>Nama</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group col">
						<label>Email</label>
						<input type="email" name="email" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label>No. Handphone</label>
					<input type="number" name="telephone" class="form-control">
				</div>

				<div class="form-group">
					<label>Pesan</label>
					<textarea cols="3" rows="8" name="message" class="form-control"></textarea>
				</div>

				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</form>

			<form id="formPengajuan" action="{{ route('service.pengajuan') }}" method="post">
				@csrf
				<div class="form-group">
					<label>Tipe Kredit</label>
					<input type="text" name="tipe_kredit" class="form-control" placeholder="Kredit Maha Asyik">
				</div>
				<div class="form-row">
					<div class="form-group col">
						<label>Nama</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group col">
						<label>Email</label>
						<input type="email" name="email" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label>No. Handphone</label>
					<input type="number" name="telephone" class="form-control">
				</div>

				<div class="form-group">
					<label>Alamat</label>
					<textarea cols="3" rows="8" name="address" class="form-control"></textarea>
				</div>

				<button type="submit" class="btn btn-primary btn-block">Kirim</button>
			</form>

			<div id="formPengajuanTabungan" class="mt-5">
				<div class="text-center">
					@foreach($pengajuanTabungans as $pengajuanTabungan)
						<a target="__blank" href="{{ asset('storage/form_tabungan/') . '/' . $pengajuanTabungan->file_pdf }}" class="btn btn-primary btn-lg">Unduh {{ $pengajuanTabungan->name }}</a>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card blue">
				<div class="card-header">
					Search
				</div>
				<div class="card-body">
					<form>
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control" id="validationCustomUsername" placeholder="search.." aria-describedby="inputGroupPrepend" required>
								<div class="invalid-feedback">
									search..
								</div>
								<div class="input-group-prepend">
									<button class="btn btn-primary"><i class="fas fa-search"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="card blue mt-5">
				<div class="card-header">
					News & produk
				</div>
				<div class="card-body">
					<div class="list-unstyled">
						<li class="pt-2 pb-2">
							<div class="d-flex">
								<img src="{{ asset('img/Banner_ATS.jpg') }}" class="img-thumb">
								<div class="ml-3">
									<a href="">
										<h5 class="m-none">Selamat Hari BPR dan BPRS Nasional</h5>
									</a>
									<span class="text-gray">Jul 11, 2018 04:56am</span>
								</div>
							</div>
						</li>
						<li class="pt-2 pb-2">
							<div class="d-flex">
								<img src="{{ asset('img/Banner_ATS.jpg') }}" class="img-thumb">
								<div class="ml-3">
									<a href="">
										<h5 class="m-none">Selamat Hari BPR dan BPRS Nasional</h5>
									</a>
									<span class="text-gray">Jul 11, 2018 04:56am</span>
								</div>
							</div>
						</li>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript">

	$(document).ready(function(){
		showPengaduan()
	})

	$(document).on('change', '#slcPrihal', function(){
		let opt = $('#slcPrihal').val()
		if (opt == 1) {
			showPengajuan()
		}else if (opt == 2) {
			showPengaduan()
		}else if (opt == 3) {
			showPengajuanTabungan()
		}
	})

	function showPengajuan(){
		$('#formPengajuan').show()
		$('#formPengaduan').hide()
		$('#formPengajuanTabungan').hide()
	}

	function showPengaduan(){
		$('#formPengajuan').hide()
		$('#formPengajuanTabungan').hide()
		$('#formPengaduan').show()
	}

	function showPengajuanTabungan() {
		$('#formPengajuan').hide()
		$('#formPengajuanTabungan').show()
		$('#formPengaduan').hide()
	}
</script>
@endsection
