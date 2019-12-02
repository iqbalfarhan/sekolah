@extends('layouts.nova')

@section('content')

<h2>Data Guru</h2>
<div class="card">
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
								<form action="{{ route('teacher.forceDelete', $teacher) }}" method="post" onsubmit="return confirm('apakah anda yakin akan menghapus dataini')">
									@csrf
									@method('DELETE')
									<a href="{{ route('teacher.restore', $teacher) }}" class="btn btn-sm btn-primary"><i class="nova-archive"></i></a>
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

<script>
	$('#headerSearchField').focus();
</script>

@endsection