@extends('layouts.nova')

@section('content')
<h2>Buat guru baru</h2>
<form action="{{ route('teacher.store') }}" method="post" enctype="multipart/form-data">
	
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					@csrf
					<div class="form-group row">
						<label for="nign" class="col-form-label col-md-3 font-weight-bold">NIGN</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="nign" id="nign" value="{{old('nign')}}">
							<small class="form-text text-muted">Nomor Induk Guru Nasional</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama" class="col-form-label col-md-3 font-weight-bold">Nama Guru</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="nama" id="nama" value="{{old('nama')}}">
							<small class="form-text text-muted">Nama lengkap guru dan gelar</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="pendidikan_terakhir" class="col-form-label col-md-3 font-weight-bold">Pendidikan Terakhir</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" value="{{old('pendidikan_terakhir')}}">
							<small class="form-text text-muted">contoh: S1 Sistem Informasi STMIK Borneo Internasional</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="jk" class="col-form-label col-md-3 font-weight-bold">Jenis Kelamin</label>
						<div class="col-md-9">
							<div class="custom-control custom-radio">
								<input type="radio" id="jklaki" name="jk" class="custom-control-input" value="l" checked>
								<label class="custom-control-label" for="jklaki">Laki-laki</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="jkperempuan" name="jk" class="custom-control-input" value="p">
								<label class="custom-control-label" for="jkperempuan">Perempuan</label>
							</div>
							<small class="form-text text-muted">Jenis Kelamin Guru</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="tempat_lahir" class="col-form-label col-md-3 font-weight-bold">Tempat Lahir</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="" value="{{old('tempat_lahir')}}">
							<small class="form-text text-muted">Kota Kelahiran Guru</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="tanggal_lahir" class="col-form-label col-md-3 font-weight-bold">Tanggal Lahir</label>
						<div class="col-md-9">
							<input type="date" class="form-control form-control-inline" id="tanggal_lahir" name="tanggal_lahir" placeholder="">
							<small class="form-text text-muted">Tanggal Lahir Guru</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-form-label col-md-3 font-weight-bold">Status</label>
						<div class="col-md-9">
							<select name="status" id="status" class="form-control">
								<option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
							</select>
							<small class="form-text text-muted">Status Keaktifan guru</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="tanggal_masuk" class="col-form-label col-md-3 font-weight-bold">Tanggal Aktif</label>
						<div class="col-md-9">
							<input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" placeholder="">
							<small class="form-text text-muted">Tanggal Aktif sebagai pengajar</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="alamat" class="col-form-label col-md-3 font-weight-bold">Alamat</label>
						<div class="col-md-9">
							<textarea  class="form-control" id="alamat" name="alamat"></textarea>
							<small class="form-text text-muted">Alamat lengkap guru</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="telepon" class="col-form-label col-md-3 font-weight-bold">Nomor Telepon Guru</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="telepon" name="telepon" value="{{old('telepon') ?? "08"}}">
							<small class="form-text text-muted">Nomor Telepon guru yang aktif</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="agama" class="col-form-label col-md-3 font-weight-bold">Agama</label>
						<div class="col-md-9">
							<select name="agama" id="agama" class="form-control">
								<option value="">--</option>
								<option value="islam">islam</option>
								<option value="kristen">kristen</option>
								<option value="katolik">katolik</option>
								<option value="hindu">hindu</option>
								<option value="budha">budha</option>
							</select>
							<small class="form-text text-muted">Agama Guru</small>
						</div>
					</div>
					<hr>
					<button class="btn btn-primary">Simpan data guru</button>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-header">
					<h4>Pilih photo guru</h4>
				</div>
				<div class="card-body">
					<img src="{{ asset('img/default.png') }}" alt="" style="width: 150px" class="rounded-circle">
				</div>
				<div class="card-footer">
					<input type="file" name="photo" class="form-control-file">
				</div>
			</div>
		</div>
	</div>
</form>
@endsection