@extends('layouts.nova')

@section('content')
<h2>Edit Jurusan</h2>
<div class="card">
	<form action="{{ route('jurusan.update', $jurusan) }}" method="post">
		@csrf
		@method('PUT')
		<div class="card-body">
			<div class="form-group row">
				<label for="kode" class="col-form-label col-md-3 font-weight-bold">Kode Jurusan</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="kode" name="kode" placeholder="" value="{{$jurusan->kode}}">
					<small class="form-text text-muted">Kode sebagai ID dari nama Jurusan</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="jurusan" class="col-form-label col-md-3 font-weight-bold">Nama Jurusan</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="" value="{{$jurusan->jurusan}}">
					<small class="form-text text-muted">Nama Jurusan</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="inisial" class="col-form-label col-md-3 font-weight-bold">Inisial</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="inisial" name="inisial" placeholder="" value="{{$jurusan->inisial}}">
					<small class="form-text text-muted">Singkatan dari nama jurusan</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="keterangan" class="col-form-label col-md-3 font-weight-bold">Deskripsi</label>
				<div class="col-md-9">
					<textarea class="form-control" id="keterangan" name="keterangan">{{$jurusan->keterangan}}</textarea>
					<small class="form-text text-muted">isikan apabila ada</small>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary">Simpan</button>
		</div>

	</form>
</div>
@endsection