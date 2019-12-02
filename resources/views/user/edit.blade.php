@extends('layouts.nova')

@section('content')
<h2>Tambah user baru</h2>
<form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<div class="form-group row">
						<label for="name" class="col-form-label col-md-3 font-weight-bold">Nama Lengkap</label>
						<div class="col-md-9">
							<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap User Baru" value="{{$user->name}}">
							@error('name')<small class="form-text text-danger">{{$message}}</small> @enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-form-label col-md-3 font-weight-bold">Email</label>
						<div class="col-md-9">
							<input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{$user->email}}">
							@error('email')<small class="form-text text-danger">{{$message}}</small> @enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-form-label col-md-3 font-weight-bold">Password</label>
						<div class="col-md-9 pt-2">
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" id="reset_yes" name="password_reset" class="custom-control-input">
								<label class="custom-control-label" for="reset_yes">Reset Password</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="role" class="col-form-label col-md-3 font-weight-bold">Role Akses</label>
						<div class="col-md-9">
							<select name="role" id="role" class="form-control">
								<option value="">--</option>
								<option @if($user->role == 'admin') selected @endif value="admin">Administrator</option>
								<option @if($user->role == 'ppdb') selected @endif value="ppdb">Panitia PPDB</option>
								<option @if($user->role == 'register') selected @endif value="register">Pendaftar PPDB</option>
							</select>
							<small class="form-text text-muted"></small>
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
					<h4>Pilih photo user</h4>
				</div>
				<div class="card-body">
					@if ($user->photo == "" || $user->photo == "default.png")
					<img src="{{ asset('img/default.png') }}" alt="" style="width: 150px" class="rounded-circle">
					@else
					<img src="{{ Storage::url($user->photo) }}" alt="" style="width: 150px" class="rounded-circle">
					@endif
				</div>
				<div class="card-footer">
					<input type="file" name="photo" class="form-control-file">
				</div>
			</div>
		</div>
	</div>
</form>
@endsection