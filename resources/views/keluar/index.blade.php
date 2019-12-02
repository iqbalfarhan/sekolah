@extends('layouts.nova')

@section('content')
<h2>Peserta didik tidak aktif</h2>
<div class="card">
	<div class="card-body pb-0">
		<a href="{{ route('keluar.create') }}" class="btn btn-primary"><i class="icon-logout mr-2"></i>Pendaftaran Keluar</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table text-truncate">
				<thead>
					<th>#</th>
					<th>Nama</th>
					<th>Tanggal</th>
					<th>Alasan</th>
					<th class="text-center"><i class="icon-options"></i></th>
				</thead>
				<tbody class="table-sm">
					@foreach ($students as $student)
					<tr>
						<td>{{$student->id}}</td>
						<td>
							<a href="{{ route('student.show', $student) }}"><b>{{$student->name}}</b></a><br>
							<small>{{$student->nis}}</small>
						</td>
						<td>{{date('d F Y', strtotime($student->keluar->tanggal))}}</td>
						<td>{{$student->status}}</td>
						<td class="p-2">
							<center>
								<a href="{{ route('keluar.show', $student->id) }}" class="btn btn-sm btn-success"><i class="icon-eye"></i></a>
								<a href="{{ route('keluar.edit', $student->keluar->id) }}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
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