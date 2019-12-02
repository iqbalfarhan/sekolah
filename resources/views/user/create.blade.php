@extends('layouts.nova')

@section('content')
<h2>Tambah user baru</h2>
<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<div class="form-group row">
						<label for="name" class="col-form-label col-md-3 font-weight-bold">Nama Lengkap</label>
						<div class="col-md-9">
							<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap User Baru">
							@error('name')<small class="form-text text-danger">{{$message}}</small> @enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-form-label col-md-3 font-weight-bold">Email</label>
						<div class="col-md-9">
							<input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
							@error('email')<small class="form-text text-danger">{{$message}}</small> @enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-form-label col-md-3 font-weight-bold">password</label>
						<div class="col-md-9">
							<input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
							@error('password')<small class="form-text text-danger">{{$message}}</small> @enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="role" class="col-form-label col-md-3 font-weight-bold">Role Akses</label>
						<div class="col-md-9">
							<select name="role" id="role" class="form-control">
								<option value="">--</option>
								<option value="admin">Administrator</option>
								<option value="ppdb">Panitia PPDB</option>
								<option value="register">Pendaftar PPDB</option>
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
					<img src="{{ asset('img/default.png') }}" alt="" style="width: 150px" class="rounded-circle">
				</div>
				<div class="card-footer">
					<input type="file" name="photo" class="form-control-file">
				</div>
			</div>
		</div>
	</div>
</form>
@endsection