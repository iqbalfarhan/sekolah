@extends('layouts.nova')
@section('content')
<h2>Profile Sekolah</h2>

<div class="row">
	<div class="col-md-9">
		<div class="card">
			<form action="{{ route('sekolah.update') }}" method="post">
				@csrf
				@method('PUT')
				<div class="card-body">
					<h4>Isi data profile sekolah</h4>
					<div class="form-group row">
						<label for="nama_sekolah" class="col-form-label col-md-3 font-weight-bold">Nama Sekolah</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" placeholder="" value="{{$data->nama_sekolah ?? old('nama_sekolah')}}">
							<small class="form-text text-muted"></small>
						</div>
					</div>
					<div class="form-group row">
						<label for="npsm" class="col-form-label col-md-3 font-weight-bold">NPSM</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="npsm" name="npsm" placeholder="" value="{{$data->npsm ?? old('npsm')}}">
							<small class="form-text text-muted">Nomor Pokok Sekolah Nasional</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="website" class="col-form-label col-md-3 font-weight-bold">Website sekolah</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="website" name="website" placeholder="" value="{{$data->website ?? old('website')}}">
							<small class="form-text text-muted"></small>
						</div>
					</div>
					<div class="form-group row">
						<label for="telepon" class="col-form-label col-md-3 font-weight-bold">Nomor Telepon</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="telepon" name="telepon" placeholder="" value="{{$data->telepon ?? old('telepon')}}">
							<small class="form-text text-muted">Nomor telepon sekolah</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-form-label col-md-3 font-weight-bold">Alamat email</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="email" name="email" placeholder="" value="{{$data->email ?? old('email')}}">
							<small class="form-text text-muted">Alamat email sekolah</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="alamat" class="col-form-label col-md-3 font-weight-bold">Alamat Sekolah</label>
						<div class="col-md-9">
							<textarea class="form-control" id="alamat" name="alamat" placeholder="">{{$data->alamat ?? old('alamat')}}</textarea>
							<small class="form-text text-muted"></small>
						</div>
					</div>
				</div>
				<div class="card-footer pt-0">
					<input type="hidden" name="id" value="{{$data->id ?? 0}}">
					<button class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card">
			<form action="{{ route('sekolah.upload') }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('POST')
				<div class="card-body">
					<h4>Logo sekolah</h4>
					<img src="{{Storage::url($data->logo ?? "")}}" alt="" class="w-100 p-5">
					<input type="file" name="logo" class="form-control-file">
				</div>
				<div class="card-footer">
					<button class="btn btn-primary btn-block">Upload</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection