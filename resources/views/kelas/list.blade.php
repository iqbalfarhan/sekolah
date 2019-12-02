@extends('layouts.nova')

@section('content')
<h2>Data Kelas</h2>
<div class="card">
	<div class="card-body pb-0">
		<a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah Baru</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table text-truncate">
				<thead>
					<th>#</th>
					<th>Nama Kelas</th>
					<th>Jurusan</th>
					<th>Walikelas</th>
					<th>Siswa</th>
					<th class="text-center"><i class="icon-options"></i></th>
				</thead>
				<tbody>
					@php
					$no = 1;
					@endphp
					@foreach ($kelass as $kelas)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$kelas->grade}} {{$kelas->jurusan->inisial ?? ""}} {{$kelas->kelompok}}</td>
						<td>{{$kelas->jurusan->jurusan ?? ""}}</td>
						<td>{{$kelas->teacher->nama ?? ""}}</td>
						<td class="p-2">
							<a href="{{ route('student.index') }}?kelas={{$kelas->id}}" class="btn btn-sm btn-primary">
								{{$kelas->siswa->count()}}
							</a>
						</td>
						<td class="p-2">
							<center>
								<form action="{{ route('kelas.destroy', $kelas) }}" method="POST" onsubmit="return confirm('Anda Yakin menghapus?')">
									@csrf
									@method('DELETE')
									<a href="{{ route('kelas.edit', $kelas) }}" class="btn btn-sm btn-success"><i class="icon-pencil"></i></a>
									<button class="btn btn-sm btn-danger"><i class="icon-trash"></i></button>
								</form>
							</center>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection