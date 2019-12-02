@extends('layouts.nova')

@section('content')
<h2>Guru & Pengajar</h2>
<div class="card">
	<div class="card-body pb-0">
		<div class="row">
			<div class="col-md-9">
				<a href="{{ route('teacher.create') }}" class="btn btn-primary">Tambah Baru</a>
			</div>
			<div class="col-md-3 text-right">
				<div class="dropdown">
					<a id="dropdownPosition" class="dropdown-toggle btn btn-outline-primary" href="#" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
						<span class="align-middle"><i class="nova-menu mr-2"></i>Menu</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right small" aria-labelledby="dropdownPosition">
						<h6 class="dropdown-header">Pengaturan Data</h6>
						<a class="dropdown-item" href="{{ route('teacher.export') }}"><i class="nova-cloud-down mr-2"></i>Download data guru</a>
						<a class="dropdown-item" href="{{ route('teacher.import') }}"><i class="nova-import mr-2"></i>Import data guru</a>
						<div class="dropdown-divider"></div>
						<h6 class="dropdown-header">Lainnya</h6>
						<a class="dropdown-item" href="{{ route('teacher.deleted') }}">Data guru terhapus</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table">
				<thead class="font-weight-bold">
					<th>#</th>
					<th>Photo</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Status</th>
					<th>Tanggal Aktif</th>
					<th class="text-center"><i class="icon-options"></i></th>
				</thead>
				<tbody>
					@foreach ($teachers as $teacher)
					<tr>
						<td>{{$teacher->id}}</td>
						<td class="p-2">
							@if (!$teacher->photo || $teacher->photo == "default.png")
							<img src="{{ asset('img/default.png') }}" alt="" style="width: 50px; height: 50px" class="rounded-circle">
							@else
							<img src="{{ Storage::url($teacher->photo) }}" alt="" style="width: 50px; height: 50px" class="rounded-circle">
							@endif
						</td>
						<td>
							<a href="{{ route('teacher.show', $teacher) }}"><b>{{$teacher->nama}}</b></a><br>
							<small>{{$teacher->nign}}</small>
						</td>
						<td>{{$teacher->telepon}}</td>
						<td>
							@if ($teacher->status == 1)
							Aktif
							@else
							Tidak aktif
							@endif
						</td>
						<td>{{date('d F Y', strtotime($teacher->tanggal_masuk))}}</td>
						<td class="p-2 text-truncate">
							<center>
								<form action="{{ route('teacher.destroy', $teacher) }}" method="post" onsubmit="return confirm('apakah anda yakin akan menghapus dataini')">
									@csrf
									@method('DELETE')
									<a href="{{ route('teacher.edit', $teacher) }}" class="btn btn-sm btn-success"><i class="icon-pencil"></i></a>
									<button class="btn btn-sm btn-danger"><i class="icon-trash"></i></button>
								</form>
							</center>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		{{$teachers->links()}}
	</div>
</div>

<script>
	$('#headerSearchField').focus();
</script>
@endsection