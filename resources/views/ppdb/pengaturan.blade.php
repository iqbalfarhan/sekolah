@extends('layouts.ppdb')
@section('content')
<div class="row justify-content-center">
	<div class="col-md-9">
		<div class="card p-md-4">
			<form action="{{ route('ppdb.pendaftar.pengaturan.update') }}" method="post">
				@method('PUT')
				@csrf
				<div class="card-body">
					<h4>Pengaturan Login pendaftar</h4>
					<div class="form-group row">
						<label for="name" class="col-form-label col-md-3 font-weight-bold">Nama Pendaftar</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$auth->name}}">
							<small class="form-text text-muted">Nama pendaftar</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-form-label col-md-3 font-weight-bold">Email Address</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="email" name="email" placeholder="" value="{{$auth->email}}">
							<small class="form-text text-muted">Masukan email untuk login</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-form-label col-md-3 font-weight-bold">Password Baru</label>
						<div class="col-md-9">
							<input type="password" class="form-control" id="password" name="password" placeholder="">
							<small class="form-text text-muted">Password login</small>
						</div>
					</div>
					<hr>
					<div class="form-group row">
						<label for="old_password" class="col-form-label col-md-3 font-weight-bold">Konfirmasi Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password" placeholder="">
							@error('old_password')
							<small class="form-text text-danger">{{$message}}</small>
							@else
							<small class="form-text text-muted">Digunakan untuk merubah password</small>
							@enderror
						</div>
					</div>

					<button class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				@if (!$auth->photo || $auth->photo == "default.png")
				<img src="{{ asset('img/default.png') }}" alt="" class="rounded w-100 p-3" data-toggle="modal" data-target="#photo">
				@else
				<img src="{{ Storage::url($auth->photo) }}" alt="" class="rounded w-100 p-3" data-toggle="modal" data-target="#photo">
				@endif

				@error('photo')
				<span class="small text-danger">{{$message}}</span>
				@enderror
				
				<p>
					<h5>{{$auth->name}}</h5>
					{{$auth->email}}
				</p>

				<small>*Tekan photo untuk merubah photo</small>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="{{ route('ppdb.photo.upload') }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ubah Foto profile</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<small class="form-text">Pilih foto untuk digunakan</small>
					<input type="file" name="photo" class="form-control-file">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Upload photo</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection