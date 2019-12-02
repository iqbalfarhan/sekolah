@extends('layouts.nova')

@section('content')

<h2>Tambah Siswa Baru</h2>
<form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<div class="form-group row">
						<label for="nis" class="col-form-label col-md-3 font-weight-bold">NIS</label>
						<div class="col-md-9">
							<input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" placeholder="Nomor Induk Peserta Didik di Sekolah" value="{{old('nis')}}">
							@error('nis')<small class="form-text text-danger">{{$message}}</small> @enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-form-label col-md-3 font-weight-bold">Nama Lengkap</label>
						<div class="col-md-9">
							<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap Peserta Didik">
							@error('name')<small class="form-text text-danger">{{$message}}</small> @enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="tahun_masuk" class="col-form-label col-md-3 font-weight-bold">Tahun masuk</label>
						<div class="col-md-9">
							<input type="text" class="form-control @error('tahun_masuk') is-invalid @enderror" id="tahun_masuk" name="tahun_masuk" placeholder="Tahun masuk">
							@error('tahun_masuk')<small class="form-text text-danger">{{$message}}</small> @enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="nis" class="col-form-label col-md-3 font-weight-bold">Jenis Kelamin</label>
						<div class="col-md-9">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="jklaki" name="jk" class="custom-control-input" value="l">
								<label class="custom-control-label" for="jklaki">Laki-laki</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="jkperempuan" name="jk" class="custom-control-input" value="p">
								<label class="custom-control-label" for="jkperempuan">Perempuan</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="jurusan_id" class="col-form-label col-md-3 font-weight-bold">Jurusan</label>
						<div class="col-md-9">
							<select name="jurusan_id" id="jurusan_id" class="form-control">
								<option value="">--</option>
								@foreach ($jurusans as $jurusan)
								<option value="{{$jurusan->id}}">{{$jurusan->jurusan}}</option>
								@endforeach
							</select>
							<small class="form-text text-muted"></small>
						</div>
					</div>
					<div class="form-group row">
						<label for="kelas_id" class="col-form-label col-md-3 font-weight-bold">Kelas</label>
						<div class="col-md-9">
							<select name="kelas_id" id="kelas_id" class="form-control">
								<option value="">--</option>
								@foreach ($kelass as $kelas)
								<option value="{{$kelas->id}}">{{$kelas->siswa->count()}} orang |{{$kelas->grade}} - {{$kelas->jurusan->jurusan}}</option>
								@endforeach
							</select>
							<small class="form-text text-muted"></small>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-form-label col-md-3 font-weight-bold">Status Belajar Siswa</label>
						<div class="col-md-9">
							<select name="status" id="status" class="form-control">
								<option value="">--</option>
								<option selected value="aktif">Aktif Belajar</option>
								<option value="lulus">Lulus</option>
							</select>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-header">
					<h4>Pilih photo siswa</h4>
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