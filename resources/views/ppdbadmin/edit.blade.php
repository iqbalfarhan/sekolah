@extends('layouts.nova')

@section('content')
<h2>Edit status peserta didik</h2>
<div class="card">
	<form action="{{ route('ppdbadmin.update', $data->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="card-body">
			<div class="form-group row">
				<label for="nama" class="col-form-label col-md-3 font-weight-bold">Nama Peserta didik</label>
				<div class="col-md-9">
					<input type="hidden" name="ppdb_id" value="{{$data->id}}">
					<input type="text" class="form-control" disabled id="nama" name="nama" placeholder="" value="{{$data->nama_lengkap}}">
					<small class="form-text text-muted">Nama Peserta didik</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="status" class="col-form-label col-md-3 font-weight-bold">Status pendaftaran</label>
				<div class="col-md-9">
					<select name="status" id="status" class="form-control" autofocus>
						<option value="">--</option>
						<option value="persiapan" @if($data->status == "persiapan") selected @endif>persiapan</option>
						<option value="mendaftar" @if($data->status == "mendaftar") selected @endif>mendaftar</option>
						<option value="terverifikasi" @if($data->status == "terverifikasi") selected @endif>terverifikasi</option>
						<option value="diterima" @if($data->status == "diterima") selected @endif>diterima</option>
					</select>
					<small class="form-text text-muted">Pilih status pendaftaran</small>
				</div>
			</div>
			<div class="small">
				<b>Keterangan status</b>
				<p class="m-0">
					<span class="badge badge-secondary">Persiapan</span>
					Peserta sedang melengkapi data
				</p>
				<p class="m-0">
					<span class="badge badge-success">Mendaftar</span>
					Melakukan pendaftaran
				</p>
				<p class="m-0">
					<span class="badge badge-warning">Dikembalikan</span>
					admin mengembalikan berkas peserta apabila terdapat data yang kurang
				</p>
				<p class="m-0">
					<span class="badge badge-info">Terverifikasi</span>
					admin sudah melakukan pengecekan data pendaftar
				</p>
				<p class="m-0">
					<span class="badge badge-primary">Diterima</span>
					peserta di terima
				</p>
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary">Simpan</button>
		</div>
	</form>
</div>
@endsection