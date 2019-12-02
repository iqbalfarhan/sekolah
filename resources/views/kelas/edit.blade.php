@extends('layouts.nova')

@section('content')
<h2>Edit data kelas <small>{{$kelas->grade}}-{{$kelas->jurusan->inisial ?? ""}} ({{$kelas->jurusan->jurusan ??""}})</small></h2>
<div class="card">
	<form action="{{ route('kelas.update', $kelas) }}" method="POST">
		@csrf
		@method('PUT')
		<input type="hidden" name="id" value="{{$kelas->id}}">
		<div class="card-body">
			<div class="form-group row">
				<label for="grade" class="col-form-label col-md-3 font-weight-bold">Kelas (angka)</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="grade" name="grade" placeholder="" value="{{$kelas->grade}}">
					<small class="form-text text-muted">Kelas dalam angka misal: 10</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="jurusan_id" class="col-form-label col-md-3 font-weight-bold">Pilih Jurusan</label>
				<div class="col-md-9">
					<select name="jurusan_id" id="jurusan_id" class="form-control">
						<option value="">--</option>
						@foreach ($jurusans as $jurusan)
							<option @if($jurusan->id == $kelas->jurusan_id) selected @endif value="{{$jurusan->id}}">{{$jurusan->jurusan}}</option>
						@endforeach
					</select>
					<small class="form-text text-muted"></small>
				</div>
			</div>
			<div class="form-group row">
				<label for="kelompok" class="col-form-label col-md-3 font-weight-bold">Kelompok</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="kelompok" name="kelompok" placeholder="" value="{{$kelas->kelompok}}">
					<small class="form-text text-muted">Pembagian kelas mis: A, B, C, D dst..</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="walikelas" class="col-form-label col-md-3 font-weight-bold">Pilih wali kelas</label>
				<div class="col-md-9">
					<select name="walikelas" id="walikelas" class="form-control">
						<option value="0">--</option>
						@foreach ($teachers as $teacher)
							<option @if ($kelas->walikelas == $teacher->id) selected @endif value="{{$teacher->id}}">{{$teacher->nama}}</option>
						@endforeach
					</select>
					<small class="form-text text-muted"></small>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary">Simpan</button>
		</div>
	</form>
</div>
@endsection