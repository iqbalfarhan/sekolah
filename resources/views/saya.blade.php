@extends('layouts.nova')

@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="card text-center mb-3 mb-md-0">
			<div class="card-header">
				@if (!$auth->photo || $auth->photo == "default.png")
					<img class="img-fluid rounded-circle" style="width: 200px" src="{{ asset('img/'.$auth->photo) }}" alt="Image description">
				@else
					<img class="img-fluid rounded-circle" style="width: 200px" src="{{ Storage::url($auth->photo) }}" alt="Image description">
				@endif
			</div>

			<div class="card-body p-3 p-md-4">
				<h5 class="font-weight-semi-bold mb-0">{{$auth->name}}</h5>
				<p class="mb-3 mb-lg-4">{{$auth->email}}</p>

				<form action="{{ route('akun.upload_photo') }}" method="post" enctype="multipart/form-data">
					@csrf
					<input type="file" name="photo" class="form-control-file" onchange="this.form.submit()">
					<button class="btn btn-primary btn-block mt-3">Upload</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="card">
			<div class="card-body pb-0">
				<h4>Pengaturan Login</h4>
			</div>
			<form action="{{ route('saya.update') }}" method="post">
				@csrf
				@method('POST')
				<div class="card-body">
					<div class="form-group row">
						<label for="name" class="col-form-label col-md-3 font-weight-bold">Nama Pengguna</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="name" name="name" placeholder="" value="{{Auth::User()->name}}">
							<small class="form-text text-muted">Nama pengguna yang digunakan</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-form-label col-md-3 font-weight-bold">Email</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="email" name="email" placeholder="" value="{{Auth::User()->email}}">
							<small class="form-text text-muted">Ubah email untuk login</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="password_baru" class="col-form-label col-md-3 font-weight-bold">Password Baru</label>
						<div class="col-md-9">
							<input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="">
							<small class="form-text text-muted">* Kosongkan apabila tidak ingin merubah password</small>
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
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Ubah login</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection