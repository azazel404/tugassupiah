@extends('layouts.user.app')
@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-md-8 col-12">
			<h1 class="font-weight-bold">Fitur Layanan</h1>

			<div class="alert alert-success">
				<h5>test</h5>
			</div>

			<div class="form-group">
				<label>Perihal</label>
				<select id="slcPrihal" class="form-control" on>
					<option value="1">Pengajuan</option>
					<option value="2">Pertanyaan</option>
				</select>
			</div>

			<form id="formPengaduan">
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
					<input type="number" name="phone" class="form-control">
				</div>

				<div class="form-group">
					<label>Pesan</label>
					<textarea cols="3" rows="8" name="message" class="form-control"></textarea>
				</div>
			</form>

			<form id="formPengajuan">
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
					<input type="number" name="phone" class="form-control">
				</div>

				<div class="form-group">
					<label>Alamat</label>
					<textarea cols="3" rows="8" name="address" class="form-control"></textarea>
				</div>
			</form>
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

	$(document).on('change', '#slcPrihal', function(){
		let opt = $('#slcPrihal').val()
		if (opt == 1) {
			showPengajuan()
		}else if (opt == 2) {
			showPengaduan()
		}
	})

	function showPengajuan(){
		$('#formPengajuan').show()
		$('#formPengaduan').hide()
	}

	function showPengaduan(){
		$('#formPengajuan').hide()
		$('#formPengaduan').show()
	}
</script>
@endsection
