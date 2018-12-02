@extends('layouts.user.app')
@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-md-8 col-12">
			<h1 class="font-weight-bold">Hubungi Kami</h1>
			<form>
				<div class="form-group">
					<label>Perihal</label>
					<select class="form-control">
						<option>Pertanyaan</option>
						<option>Pengajuan</option>
						<option>Pertanyaan</option>
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
					<input type="number" name="phone" class="form-control">
				</div>

				<div class="form-group">
					<label>Pesan</label>
					<textarea cols="3" rows="8" class="form-control"></textarea>
				</div>
			</form>
		</div>
		<div class="col-md-4 col-12 mt-5">
			<div class="card blue">
				<div class="card-header">
					Search
				</div>
				<div class="card-body">
					<form>
						<div class="form-group">
							<input type="text" name="search" class="form-control-custom">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection