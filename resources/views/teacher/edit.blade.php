@extends('layouts.nova')

@section('content')
<h2>Edit data guru</h2>
<div class="row">
	<div class="col-md-9">
		<div class="card">
			<div class="card-body pb-0">
				<h3>{{$teacher->nama}}</h3>
			</div>
			<form action="{{ route('teacher.update', $teacher) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="card-body">
					<div class="form-group row">
						<label for="nign" class="col-form-label col-md-3 font-weight-bold">NIGN</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="nign" id="nign" value="{{$teacher->nign}}">
							<small class="form-text text-muted">Nomor Induk Guru Nasional</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama" class="col-form-label col-md-3 font-weight-bold">Nama Guru</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="nama" id="nama" value="{{$teacher->nama}}">
							<small class="form-text text-muted">Nama lengkap guru dan gelar</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="pendidikan_terakhir" class="col-form-label col-md-3 font-weight-bold">Pendidikan Terakhir</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" placeholder="jenjang jurusan universitas" value="{{$teacher->pendidikan_terakhir}}">
							<small class="form-text text-muted">contoh: S1 Sistem Informasi STMIK Borneo Internasional</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="jk" class="col-form-label col-md-3 font-weight-bold">Jenis Kelamin</label>
						<div class="col-md-9">
							<div class="custom-control custom-radio">
								<input type="radio" id="jklaki" name="jk" class="custom-control-input" value="l" @if ($teacher->jk == "l") checked @endif>
								<label class="custom-control-label" for="jklaki">Laki-laki</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="jkperempuan" name="jk" class="custom-control-input" value="p" @if ($teacher->jk == "p") checked @endif>
								<label class="custom-control-label" for="jkperempuan">Perempuan</label>
							</div>
							<small class="form-text text-muted">Jenis Kelamin Guru</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="tempat_lahir" class="col-form-label col-md-3 font-weight-bold">Tempat Lahir</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="" value="{{$teacher->tempat_lahir}}">
							<small class="form-text text-muted">Kota Kelahiran Guru</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="tanggal_lahir" class="col-form-label col-md-3 font-weight-bold">Tanggal Lahir</label>
						<div class="col-md-9">
							<input type="date" class="form-control form-control-inline" id="tanggal_lahir" name="tanggal_lahir" placeholder="" value="{{$teacher->tanggal_lahir}}">
							<small class="form-text text-muted">Tanggal Lahir Guru</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-form-label col-md-3 font-weight-bold">Status</label>
						<div class="col-md-9">
							<select name="status" id="status" class="form-control">
								<option value="1" @if ($teacher->jk == "1") selected @endif>Aktif</option>
								<option value="0" @if ($teacher->jk == "0") selected @endif>Tidak Aktif</option>
							</select>
							<small class="form-text text-muted">Status Keaktifan guru</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="tanggal_masuk" class="col-form-label col-md-3 font-weight-bold">Tanggal Aktif</label>
						<div class="col-md-9">
							<input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" placeholder="" value="{{$teacher->tanggal_masuk}}">
							<small class="form-text text-muted">Tanggal Aktif sebagai pengajar</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="alamat" class="col-form-label col-md-3 font-weight-bold">Alamat</label>
						<div class="col-md-9">
							<textarea  class="form-control" id="alamat" name="alamat">{{$teacher->alamat}}</textarea>
							<small class="form-text text-muted">Alamat lengkap guru</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="telepon" class="col-form-label col-md-3 font-weight-bold">Nomor Telepon Guru</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="telepon" name="telepon" value="{{$teacher->telepon}}">
							<small class="form-text text-muted">Nomor Telepon guru yang aktif</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="agama" class="col-form-label col-md-3 font-weight-bold">Agama</label>
						<div class="col-md-9">
							<select name="agama" id="agama" class="form-control text-capitalize">
								<option value="">--</option>
								<option @if($teacher->agama == 'islam') selected @endif value="islam">islam</option>
								<option @if($teacher->agama == 'kristen') selected @endif value="kristen">kristen</option>
								<option @if($teacher->agama == 'katolik') selected @endif value="katolik">katolik</option>
								<option @if($teacher->agama == 'hindu') selected @endif value="hindu">hindu</option>
								<option @if($teacher->agama == 'budha') selected @endif value="budha">budha</option>
							</select>
							<small class="form-text text-muted">Agama Guru</small>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Simpan data guru</button>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card">
			<div class="card-body text-center">
				@if (!$teacher->photo || $teacher->photo == "default.png")
				<img src="{{ asset('img/default.png') }}" alt="" style="width: 150px;" class="rounded-circle">
				@else
				<img src="{{ Storage::url($teacher->photo) }}" alt="" style="width: 150px;" class="rounded-circle">
				@endif
			</div>
			<div class="card-body">
				<form action="{{ route('teacher.photo.upload', $teacher) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<input type="file" class="form-control-file" name="photo">
					<br>
					<button class="btn btn-primary btn-block">Upload</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection