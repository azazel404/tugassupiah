@extends('layouts.user.app')
@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-md-8 col-12">
			<h1 class="font-weight-bold">Fitur Layanan</h1>
			<div class="alert alert-primary">
					<i>"Mohon isi data - data dibawah ini agar petugas kami dapat menghubungi Anda, terima kasih"</i>
			</div>
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
					<option value="1">Pengajuan Permohonan Kredit / Pinjaman</option>
					<option value="3">Pengajuan Pembukaan Rekening Tabungan</option>
					<option value="4">Pengajuan Pembukaan Rekening Deposito</option>
					<option value="2">Pengaduan</option>
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

				<button type="submit" class="btn btn-primary btn-block">Kirim</button>
			</form>

			<form id="formPengajuan" action="{{ route('service.pengajuan') }}" method="post">
				@csrf
				<div class="form-group">
					<label>Tipe Kredit</label>
					<select class="form-control" name="tipe_kredit">
						@foreach($tipeKredits as $tipeKredit)
							<option value="{{ $tipeKredit->name }}">{{ $tipeKredit->name }}</option>
						@endforeach
					</select>
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
				{{ $pengajuanTabungans->links() }}
			</div>

			<div id="formPengajuanDeposito" class="mt-5">
				<div class="text-center">
					@foreach($pengajuanDepositos as $pengajuanDeposito)
						<a target="__blank" href="{{ asset('storage/form_deposito/') . '/' . $pengajuanDeposito->file_pdf }}" class="btn btn-primary btn-lg">Unduh {{ $pengajuanDeposito->name }}</a>
					@endforeach
				</div>

				{{ $pengajuanDepositos->links() }}
			</div>
		</div>
		<div class="col-md-4">
			<!-- <div class="card blue">
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
			</div> -->

			<div class="card blue mt-5">
				<div class="card-header">
					News & produk
				</div>
				<div class="card-body">
					<div class="list-unstyled">
						@foreach($contents as $content)
							<li class="pt-2 pb-2">
								<div class="d-flex">
									<img src="{{ asset('storage/cover/') . '/' . $content->cover }}" class="img-thumb">
									<div class="ml-3">
										<a href="">
											<h5 class="m-none">{{ $content->title }}</h5>
										</a>
										<span class="text-gray">{{ $content->created_at->diffForHumans() }}</span>
									</div>
								</div>
							</li>
						@endforeach
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
		}else if(opt == 4){
			showPengajuanDeposito()
		}
	})

	function showPengajuan(){
		$('#formPengajuan').show()
		$('#formPengaduan').hide()
		$('#formPengajuanTabungan').hide()
		$('#formPengajuanDeposito').hide()
	}

	function showPengaduan(){
		$('#formPengajuan').hide()
		$('#formPengajuanTabungan').hide()
		$('#formPengaduan').show()
		$('#formPengajuanDeposito').hide()
	}

	function showPengajuanTabungan() {
		$('#formPengajuan').hide()
		$('#formPengajuanTabungan').show()
		$('#formPengaduan').hide()
		$('#formPengajuanDeposito').hide()
	}

	function showPengajuanDeposito() {
		$('#formPengajuan').hide()
		$('#formPengajuanTabungan').hide()
		$('#formPengajuanDeposito').show()
		$('#formPengaduan').hide()
	}
</script>
@endsection
