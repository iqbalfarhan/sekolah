@extends('layouts.nova')
@section('content')
<h2>Edit Data siswa</h2>
<div class="card">
	<div class="card-header card-header-tabs pb-0">
		@include('student.menu_detail')
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-9">
				<form action="{{ route('student.update', $student) }}" method="post">
					@csrf
					@method('PUT')
					<h3>Data umum peserta didik</h3>
					<div class="form-group row">
						<label for="nis" class="col-form-label col-md-3 font-weight-bold">Nomor Induk Siswa</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="nis" name="nis" placeholder="" value="{{$student->nis}}">
							<small class="form-text text-primary">Nomor induk pesreta didik dari sekolah</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="nis" class="col-form-label col-md-3 font-weight-bold">Nama Lengkap Siswa</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="name" value="{{$student->name}}">
							<small class="form-text text-primary"></small>
						</div>
					</div>
					<div class="form-group row">
						<label for="nis" class="col-form-label col-md-3 font-weight-bold">Jenis Kelamin</label>
						<div class="col-md-9">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="jklaki" name="jk" class="custom-control-input" value="l" @if($student->jk == 'l') checked @endif>
								<label class="custom-control-label" for="jklaki">Laki-laki</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="jkperempuan" name="jk" class="custom-control-input" value="p" @if($student->jk == 'p') checked @endif>
								<label class="custom-control-label" for="jkperempuan">Perempuan</label>
							</div>
							<small class="form-text text-primary">Jenis Kelamin Peserta didik</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="tahun_masuk" class="col-form-label col-md-3 font-weight-bold">Tahun masuk</label>
						<div class="col-md-9 form-inline">
							<input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="" value="{{$student->tahun_masuk ?? ""}}">
							<small class="form-text text-muted ml-3">Tahun masuk siswa / tahun angkatan</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="jurusan_id" class="col-form-label col-md-3 font-weight-bold">Jurusan / Kelas</label>
						<div class="col-md-9 form-inline">
							<select name="jurusan_id" id="jurusan_id" class="form-control">
								<option value="">--</option>
								@foreach ($jurusans as $jurusan)
								<option @if($student->jurusan_id == $jurusan->id) selected @endif value="{{$jurusan->id}}">{{$jurusan->jurusan}}</option>
								@endforeach
							</select>
							<select name="kelas_id" id="kelas_id" class="form-control">
								<option value="">--</option>
								@foreach ($kelass as $kelas)
								<option @if($student->kelas_id == $kelas->id) selected @endif value="{{$kelas->id}}">{{$kelas->grade}} - {{$kelas->jurusan->inisial}} {{$kelas->kelompok}}</option>
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
								<option @if($student->status == "aktif") selected @endif value="aktif">Aktif Belajar</option>
								<option @if($student->status == "lulus") selected @endif value="lulus">Lulus</option>
							</select>
							<small class="form-text text-muted"></small>
						</div>
					</div>
					<button class="btn btn-primary">Simpan Perubahan data</button>
				</form>
			</div>
			<div class="col-md-3 text-center">
				<form action="{{ route('student.photo.upload', $student) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<h3>Photo Siswa</h3>
						@if (!$student->photo || $student->photo == "default.png")
						<img src="{{ asset('img/default.png') }}" class="rounded p-3" style="width: 200px">
						@else
						<img src="{{ Storage::url($student->photo) }}" class="rounded p-3" style="width: 200px">
						@endif
						@error('photo')
						<div class="alert alert-warning">
							{{$message}}
						</div>
						@enderror
						<div class="form-group">
							<label for="photo" class="font-weight-bold">Photo Siswa</label>
							<input type="file" class="form-control-file" id="photo" name="photo" placeholder="">
							<small class="form-text text-primary">Upload photo siswa dengan maksimal ukuran file 1 Mb</small>
						</div>
						<button class="btn btn-primary">Upload Photo</button>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection