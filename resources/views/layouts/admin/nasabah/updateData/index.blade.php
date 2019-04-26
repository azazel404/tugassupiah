@extends('layouts.admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Nasabah</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item active">Nasabah</li>
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
						<h4>Update data nasabah</h4>
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-6">
                                <p>Panel ini berfungsi untuk mengupdate data nasabah seperti data Saldo terakhir, Cicilan dan deposito. diupdate menggunakan data excel Rekapan setiap hari.</p>
                                <a href="#" class="btn btn-primary btn-sm">Download Sample Excel</a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('admin.manage-account.nasabah.update.submit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label>Pilih File Excel</label> <br>
                                        <input type="file" name="excel">
                                    </div>
                                    <button type="submit" class="btn btn-success">Mulai Update</button>
                                </form>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection