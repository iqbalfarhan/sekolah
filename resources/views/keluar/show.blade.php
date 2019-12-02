@extends('layouts.nova')

@section('content')
<h2>Detail peserta didik tidak aktif</h2>
<div class="card">
	<div class="card-body">
		<table class="table table-borderless">
			<tr>
				<th>Nama Siswa</th>
				<th>:</th>
				<td>{{$data->name}}</td>
			</tr>
			<tr>
				<th>NIS</th>
				<th>:</th>
				<td>{{$data->nis}}</td>
			</tr>
			<tr>
				<th>Jenis kelamin</th>
				<th>:</th>
				<td>{{$data->jk}}</td>
			</tr>
			<tr>
				<th>Jurusan</th>
				<th>:</th>
				<td>{{$data->jurusan->jurusan}}</td>
			</tr>
			<tr>
				<th>Alasan Nonaktif</th>
				<th>:</th>
				<td>{{$data->status}}</td>
			</tr>
			<tr>
				<th>Tanggal Nonaktif</th>
				<th>:</th>
				<td>{{$data->keluar->tanggal}}</td>
			</tr>
			<tr>
				<th>Keterangan</th>
				<th>:</th>
				<td>{{$data->keluar->keterangan}}</td>
			</tr>
		</table>
	</div>
</div>
@endsection