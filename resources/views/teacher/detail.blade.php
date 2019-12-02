@extends('layouts.nova')
@section('content')
<h2>Lihat detail guru</h2>
<div class="row">
	<div class="col-md-9">
		<div class="card">
			<div class="card-body pb-0">
				<h3>{{$teacher->nama}}</h3>
			</div>
			<div class="card-body">
				<table class="table table-borderless">
					<tr>
						<th>NIGN</th>
						<th>:</th>
						<td>{{$teacher->nign}}</td>
					</tr>
					<tr>
						<th>Nama Lengkap</th>
						<th>:</th>
						<td>{{$teacher->nama}}</td>
					</tr>
					<tr>
						<th>Pendidikan Terakhir</th>
						<th>:</th>
						<td>{{$teacher->pendidikan_terakhir}}</td>
					</tr>
					<tr>
						<th>Jenis Kelamin</th>
						<th>:</th>
						<td>
							@if ($teacher->jk == 'l')
							Laki-laki
							@else
							Perempuan
							@endif
						</td>
					</tr>
					<tr>
						<th>Kelahiran</th>
						<th>:</th>
						<td>{{$teacher->tempat_lahir}}, {{date('d F Y', strtotime($teacher->tanggal_lahir))}} </td>
					</tr>
					<tr>
						<th>Status Mengajar</th>
						<th>:</th>
						<td>
							@if ($teacher->status == 1)
								Aktif
							@else
								Tidak Aktif
							@endif
						</td>
					</tr>
					<tr>
						<th>Tanggal Aktif</th>
						<th>:</th>
						<td>{{$teacher->tanggal_masuk}}</td>
					</tr>
					<tr>
						<th>Alamat</th>
						<th>:</th>
						<td>{{$teacher->alamat}}</td>
					</tr>
					<tr>
						<th>Telepon</th>
						<th>:</th>
						<td>{{$teacher->telepon}}</td>
					</tr>
					<tr>
						<th>Agama</th>
						<th>:</th>
						<td>{{$teacher->agama}}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				<img src="{{ Storage::url($teacher->photo) }}" alt="" style="width: 150px" class="rounded-circle">
				<br>
			</div>
			<div class="card-footer">
				<a href="{{ route('teacher.edit', $teacher) }}" class="btn btn-primary">Edit data guru</a>
			</div>
		</div>
	</div>
</div>

@endsection