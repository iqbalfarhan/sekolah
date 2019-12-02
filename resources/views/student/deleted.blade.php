@extends('layouts.nova')

@section('content')

<h2>Data peserta didik terhapus</h2>
<div class="card">
	<div class="card-body pb-0">
		<form action="{{ route('student.forceDelete', 0) }}?forceall=all" method="post" onsubmit="return confirm('Data ini akan dihapus secara permanent')">
			@csrf
			@method('DELETE')
			<a href="{{ route('student.restore', 0) }}?restoreall=all" class="btn btn-primary"><i class="nova-archive mr-2"></i> Restore All</a>
			<button class="btn btn-danger"><i class="nova-trash mr-2"></i>Delete Permanent</button>
		</form>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table text-truncate">
				<thead>
					<th>#</th>
					<th>Photo</th>
					<th>Name</th>
					<th>Kelas</th>
					<th>Jenis Kelamin</th>
					<th>Status</th>
					<th class="text-center"><i class="icon-options"></i></th>
				</thead>
				<tbody>
					@foreach ($students as $student)
					<tr>
						<td>{{$student->id}}</td>
						<td class="p-2">
							@if (!$student->photo || $student->photo == "default.png")
							<img src="{{ asset('img/default.png') }}" alt="" style="width: 50px; height: 50px" class="rounded-circle">
							@else
							<img src="{{ Storage::url($student->photo) }}" alt="" style="width: 50px; height: 50px" class="rounded-circle">
							@endif
						</td>
						<td>
							<a href="{{ route('student.show', $student) }}"><b>{{$student->name}}</b></a><br>
							<small>{{$student->nis}}</small>
						</td>
						<td>{{$student->kelas->grade ?? "-"}} {{$student->kelas->jurusan->inisial ?? ""}} {{$student->kelas->kelompok ?? ""}}</td>
						<td>
							@if ($student->jk == 'l')
							Lak-laki
							@else
							Perempuan
							@endif
						</td>
						<td>{{$student->status}}</td>
						<td class="p-2">
							<center>
								<form action="{{ route('student.forceDelete', $student) }}" method="post" onsubmit="return confirm('Data ini akan dihapus secara permanent')">
									@csrf
									@method('DELETE')
									<a href="{{ route('student.restore', $student) }}" class="btn btn-sm btn-primary"><i class="nova-archive"></i></a>
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