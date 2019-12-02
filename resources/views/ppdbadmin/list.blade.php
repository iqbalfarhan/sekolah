@extends('layouts.nova')
@section('content')
<h2>PPDB Online</h2>

<div class="card">
	<div class="card-body">
		<h4>Sesi PPDB Online <a href="{{ route('ppdbadmin.create') }}" class="btn btn-sm btn-link"><i class="icon-settings"></i> Pengaturan</a></h4>
		<div class="row">
			<div class="col-md-3">
				<div class="h5">
					<small>Tanggal mulai:</small><br>
					@isset ($sesi->mulai)
					{{date('d M Y', strtotime($sesi->mulai ?? "-"))}}
					@endisset
				</div>
			</div>
			<div class="col-md-3">
				<div class="h5">
					<small>Tanggal selesai:</small><br>
					@isset ($sesi->selesai)
					{{date('d M Y', strtotime($sesi->selesai ?? "-"))}}
					@endisset
				</div>
			</div>
			<div class="col-md-6">
				<div class="text-truncate">
					<small>Keterangan PPDB:</small><br>
					@isset ($sesi->selesai)
					{{$sesi->keterangan ?? "-"}}
					@endisset
				</div>
			</div>
		</div>
	</div>
</div>
<div class="d-flex flex-wrap my-3">
	<div class="mr-auto">
		<a href="{{ route('ppdbadmin.akun_list') }}" class="btn btn-primary mr-2"><i class="nova-user mr-2"></i>Akun Pendaftar</a>
		<a href="{{ route('ppdbadmin.migrasi') }}" class="btn btn-primary mr-2"><i class="nova-share mr-2"></i>Migrasi</a>
	</div>
	<div class="ml-auto">
		<a href="{{ route('pengumuman.create') }}?ppdb=true" class="btn btn-outline-primary btn-white bt mr-2"><i class="nova-announcement mr-2"></i>Buat Pengumuman</a>
	</div>
</div>
<div class="card">
	@php
	$badge = [
		'persiapan' => 'badge-secondary',
		'mendaftar' => 'badge-success',
		'dikembalikan' => 'badge-warning',
		'terverifikasi' => 'badge-info',
		'diterima' => 'badge-primary',
	];

	$no = 1;
	@endphp
	<div class="table-responsive">
		<table class="table text-truncate">
			<thead>
				<th>#</th>
				<th><a href="?urutkan=tanggal">Tanggal Daftar<i class="nova-exchange-vertical ml-2"></i></a></th>
				<th>Nama Lengkap</th>
				<th><a href="?urutkan=jurusan">Jurusan<i class="nova-exchange-vertical ml-2"></i></a></th>
				<th><a href="?urutkan=status">Status<i class="nova-exchange-vertical ml-2"></i></a></th>
				<th class="text-center"><i class="icon-options"></i></th>
			</thead>
			<tbody>
				@foreach ($data as $row)
				<tr>
					<th>{{$no++}}</th>
					<td>{{date('d M', strtotime($row->tanggal_daftar))}}</td>
					<td>{{$row->nama_lengkap}}</td>
					<td>{{$row->jurusan->jurusan ?? ""}}</td>
					<td>
						<div class="badge {{$badge[$row->status]}} text-capitalize">
							{{$row->status}}
						</div>
					</td>
					<td class="p-2">
						<center>
							<a href="{{ route('ppdbadmin.show', $row->id) }}" class="btn btn-sm btn-primary"><i class="icon-folder"></i></a>
							<a href="{{ route('ppdbadmin.edit', $row->id) }}" class="btn btn-sm btn-success"><i class="icon-pencil"></i></a>
						</center>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection