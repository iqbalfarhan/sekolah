@extends('layouts.nova')

@section('content')
<h2>PPDB Online</h2>
<div class="card mt-3">
	<div class="card-body pb-0">
		<h4>Pengaturan PPDB Online</h4>
	</div>
	<form action="{{ route('ppdbadmin.store') }}" method="POST">
		@csrf
		<div class="card-body">
			<div class="form-group row">
				<label for="mulai" class="col-form-label col-md-3 font-weight-bold">Tanggal mulai PPDB</label>
				<div class="col-md-9 form-inline">
					<input type="date" class="form-control" id="mulai" name="mulai" placeholder="" value="{{$data->mulai ?? ""}}">
					<small class="form-text text-muted ml-3">tanggal mulai ppdb untuk memuliai session ppdb. peserta tidak dapat melakukan pengisian form pada tanggal sebelum tanggal ini</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="selesai" class="col-form-label col-md-3 font-weight-bold">Tanggal selesai PPDB</label>
				<div class="col-md-9 form-inline">
					<input type="date" class="form-control" id="selesai" name="selesai" placeholder="" value="{{$data->selesai ?? ""}}">
					<small class="form-text text-muted ml-3">Tanggal selesai ppdb untuk meutup sesi ppdb. sistem ppdb akan dimatikan apabila tanggal meewati batas tanggal ini</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="keterangan" class="col-form-label col-md-3 font-weight-bold">Ketentuan</label>
				<div class="col-md-9">
					<small class="form-text text-muted">tulis ketentuan PPDB. apabila ada</small>
					<textarea class="form-control" id="keterangan" name="keterangan" rows="10">{{$data->keterangan ?? ""}}</textarea>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary"><i class="nova-check mr-2"></i>Simpan pengaturan</button>
			<a href="{{ route('ppdbadmin.resetppdb') }}" class="btn btn-info"><i class="nova-back-left mr-2"></i>Reset PPDB</a>
		</div>
	</form>
</div>

@endsection