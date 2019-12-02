@extends('layouts.ppdb')

@section('content')
<div class="row">
	<div class="col-md-3 mb-4 d-none d-md-block">
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
				<button class="btn btn-primary" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</button>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="card mb-4 p-md-4">
			<div class="card-body">
				<h4 class="card-title">{{$auth->name}}</h4>
				<p class="lead">
					Status pendaftaran anda saat ini : <span class="alert-warning">{{$data->status ?? ""}}</span>
				</p>
				<hr>

				<h4>Pelaksanaan PPDB</h4>

				<div class="row">
					<div class="col-md-6">
						<div class="p-3 pl-4 bg-light mb-3 border-left border-primary">
							<i class="fa fa-calendar mr-2"></i> Tanggal Mulai PPDB
							<h4 class="text-muted">@isset($info->mulai) {{date('d F Y', strtotime($info->mulai))}} @else Belum ditentukan @endisset</h4>
						</div>
					</div>
					<div class="col-md-6">
						<div class="p-3 pl-4 bg-light mb-3 border-left border-primary">
							<i class="fa fa-calendar mr-2"></i> Tanggal Selesai PPDB
							<h4 class="text-muted">@isset($info->selesai) {{date('d F Y', strtotime($info->selesai))}} @else Belum ditentukan @endisset</h4>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div class="card p-md-4">
			<div class="card-body">
				<h4>Selamat datang,</h4>
				<p>
					langkah-langkah yang harus anda lalui dalam sistem ppdb online ini adalah sebagai berikut:
					<ul>
						<li>
							<h5>Mengisi formulir pendaftaran</h5>
							anda dapat mengisi formulir pendaftaran pada menu form pendaftaran. data yang diisi berupa informasi calon peserta didik, data orangtua dan wali, data rincian dan data pendaftaran. harap isi formulir terserbut dengan data yang sebenar-benarnya.
						</li>
						<li>
							<h5>Melengkapi berkas pendaftaran</h5>
							Berkas pendaftaran terdapat pada formulir pendaftaran pada point nomor 5. anda diharuskan mengisi berkas akta kelahiran, kartu keluarga, ijazah terakhir dan SKHU. upload file tersebut menggunakan format gambar atau PDF dengan ukuran file tidak lebih dari 1 Mb setiap filenya.
						</li>
						<li>
							<h5>Mengganti photo profile</h5>
							Photo profile akan dikirimkan sebagai berkas pendaftaran juga, harap menggunakan seragam atau pakaian yang rapi.
						</li>
						<li>
							<h5>Melakukan setor berkas</h5>
							setor berkas ada pada menu setor berkas, anda hanya dapat melakukan setor berkas apabila anda telah melengkapi formulir pendaftaran, berkas dan photo profile. harap mengecek kembali data-data tersebut sebelum melakukan setor berkas. setelah itu anda tidak dapat melakukan perubahan data.
						</li>
						<li>
							<h5>Melihat status pendaftaran</h5>
							lihat status pendaftaran anda pada menu status, lihat pula pengumuman pada menu pengumuman.
						</li>
					</ul>
				</p>

				<h4>Ketentuan PPDB online</h4>
				{{$info->keterangan ?? "Masa PPDB Belum ditentukan"}}
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

