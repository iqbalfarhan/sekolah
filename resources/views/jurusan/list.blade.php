@extends('layouts.nova')
@section('content')
<h2>Data jurusan</h2>
<div class="card">
	<div class="card-body pb-0">
		<a href="{{ route('jurusan.create') }}" class="btn btn-primary">Tambah Baru</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			@php
				$no=1;
			@endphp
			<table class="table">
				<thead>
					<th>#</th>
					<th>Kode</th>
					<th>Jurusan</th>
					<th>Inisial</th>
					<th>Keterangan</th>
					<th class="text-center"><i class="icon-options"></i></th>
				</thead>
				<tbody>
					@foreach ($jurusans as $jurusan)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$jurusan->kode}}</td>
							<td>{{$jurusan->jurusan}}</td>
							<td>{{$jurusan->inisial}}</td>
							<td>
								<div style="max-width: 400px" class="text-truncate">
									{{$jurusan->keterangan}}
								</div>
							</td>
							<td class="p-2 text-truncate">
								<center>
									<form action="{{ route('jurusan.destroy', $jurusan) }}" method="POST" onsubmit="return confirm('Anda Yakin menghapus?')">
										@csrf
										@method('DELETE')
										<a href="{{ route('jurusan.edit', $jurusan) }}" class="btn btn-sm btn-success"><i class="icon-pencil"></i></a>
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