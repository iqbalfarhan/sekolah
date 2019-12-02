@extends('layouts.nova')

@section('content')
<h2>Buat jurusan baru</h2>

<div class="card">
	<form action="{{ route('jurusan.store') }}" method="post">
		@csrf
		<div class="card-body">
			<div class="form-group row">
				<label for="kode" class="col-form-label col-md-3 font-weight-bold">Kode Jurusan</label>
				<div class="col-md-9">
					<input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="kode" name="kode" placeholder="" value="{{old('kode')}}">
					<small class="form-text text-muted">
						@error('kode')
						{{$message}}
						@else
						Kode sebagai ID dari nama Jurusan
						@enderror
					</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="jurusan" class="col-form-label col-md-3 font-weight-bold">Nama Jurusan</label>
				<div class="col-md-9">
					<input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" placeholder="" value="{{old('jurusan')}}">
					<small class="form-text text-muted">
						@error('jurusan')
						{{$message}}
						@else
						Nama Jurusan
						@enderror
					</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="inisial" class="col-form-label col-md-3 font-weight-bold">Inisial</label>
				<div class="col-md-9">
					<input type="text" class="form-control @error('inisial') is-invalid @enderror" id="inisial" name="inisial" placeholder="" value="{{old('inisial')}}">
					<small class="form-text text-muted">
						@error('inisial')
						{{$message}}
						@else
						Singkatan dari nama jurusan
						@enderror
					</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="keterangan" class="col-form-label col-md-3 font-weight-bold">Deskripsi</label>
				<div class="col-md-9">
					<textarea class="form-control" id="keterangan" name="keterangan"></textarea>
					<small class="form-text text-muted">isikan apabila ada</small>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary">Simpan</button>
		</div>
	</form>
</div>
@endsection