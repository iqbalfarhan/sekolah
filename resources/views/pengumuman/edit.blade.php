@extends('layouts.nova')
@section('content')
<h2>Edit pengumuman</h2>
<div class="card">
	<form action="{{ route('pengumuman.update', $pengumuman) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="card-body">
			<div class="form-group row">
				<label for="judul" class="col-form-label col-md-3 font-weight-bold">Judul Pengumuman</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="judul" name="judul" placeholder="" value="{{$pengumuman->judul ?? ""}}">
					<small class="form-text text-muted">Masukkan perihal atau judul pengumuman</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="tulisan" class="col-form-label col-md-3 font-weight-bold">Isi pengumuman</label>
				<div class="col-md-9">
					<textarea class="form-control" id="tulisan" name="tulisan">{{$pengumuman->judul ?? ""}}</textarea>
					<small class="form-text text-muted">keteragan pengumuman</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="file" class="col-form-label col-md-3 font-weight-bold">File Lampiran</label>
				<div class="col-md-9">
					<input type="file" class="form-control-file" id="file" name="file" placeholder="">
					<small class="form-text text-muted">* bila ada</small>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary">Buat Pengumuman</button>
		</div>
	</form>
</div>
@endsection