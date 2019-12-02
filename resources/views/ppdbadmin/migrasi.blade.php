@extends('layouts.nova')

@section('content')
<h2>Migrasi calon peserta didik</h2>
<div class="card">
	<div class="card-body">
		<p>Pindahkan semua data calon peserta didik dengan status diterima ke data siswa</p>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Nama Lengkap</th>
					<th>Tanggal Mendaftar</th>
					<th class="text-center">Status</th>
				</thead>
				<tbody>
					@php
						$no = 1;
					@endphp
					@foreach ($data as $row)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$row->nama_lengkap}}</td>
							<td>{{$row->tanggal_daftar}}</td>
							<td class="p-2">
								<form action="{{ route('ppdbadmin.migrasi_store', $row->id) }}" method="POST">
									<center>
										@csrf
										@method('POST')
										<button class="btn btn-primary btn-sm"><i class="icon-check"></i></button>
									</center>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<form action="{{ route('ppdbadmin.migrasi_store', 'all') }}" method="POST" onsubmit="return confirm('Akan membutuhkan sedikit waktu untuk melakukan proses ini')">
			@csrf
			@method('POST')
			<button class="btn btn-primary">Migrasi semua data</button>
		</form>
	</div>
</div>
@endsection