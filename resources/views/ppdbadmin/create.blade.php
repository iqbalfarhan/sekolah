@extends('layouts.nova')

@section('content')
<h2>Buat akun untuk pendaftar</h2>
<div class="card">
	<form action="{{ route('ppdbadmin.akun_store') }}" method="POST">
		@csrf
		@method('POST')
		<div class="card-body">
			<div class="form-group row">
				<label for="name" class="col-form-label col-md-3 font-weight-bold">Nama Pendaftar</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ old('name') }}">
					<small class="form-text text-muted">Nama Lengkap pendaftar</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="email" class="col-form-label col-md-3 font-weight-bold">Email Pendaftar</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="email" name="email" placeholder="" value="{{ old('email') }}">
					<small class="form-text text-muted">Email di gunakan pendaftar untuk login ke sistem PPDB</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-form-label col-md-3 font-weight-bold">Password</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="password" name="password" placeholder="" readonly value="abcd1234">
					<small class="form-text text-muted">Password login</small>
				</div>
			</div>
		</div>
		<div class="card-footer pt-0">
			<button class="btn btn-primary">Buat akun</button>
		</div>
	</form>
</div>
@endsection