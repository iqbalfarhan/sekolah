@extends('layouts.nova')
@section('content')
<h2>Buat pengumuman baru</h2>
<div class="card">
	<form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="card-body">
			@isset ($data)
			<div class="form-group row">
				<label for="jenis" class="col-form-label col-md-3 font-weight-bold">Jenis Pengumuman</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="jenis" name="jenis" placeholder="" readonly value="{{$data['jenis']}}">
					<small class="form-text text-muted">Masukkan perihal atau judul pengumuman</small>
				</div>
			</div>
			@else
			<input type="hidden" name="jenis" value="umum">
			@endisset
			<div class="form-group row">
				<label for="judul" class="col-form-label col-md-3 font-weight-bold">Judul Pengumuman</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="judul" name="judul" placeholder="">
					<small class="form-text text-muted">Masukkan perihal atau judul pengumuman</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="tulisan" class="col-form-label col-md-3 font-weight-bold">Isi pengumuman</label>
				<div class="col-md-9">
					<textarea class="form-control" id="tulisan" name="tulisan" rows="7"></textarea>
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