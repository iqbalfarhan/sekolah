@extends('layouts.nova')

@section('content')
<h2>Akun Pendaftar</h2>
<div class="card">
	@if (!Route::has('register'))
	<div class="card-header pb-0">
		<a href="{{ route('ppdbadmin.akun_create') }}" class="btn btn-primary">Buat akun pendaftar</a>
	</div>
	@endif
	<div class="card-body">
		<div class="table-responsive">
			<table class="table text-truncate">
				<thead>
					<th>#</th>
					<th>Nama Pendaftar</th>
					<th>Email</th>
					<th>Dibuat</th>
					<th class="text-center">Password</th>
				</thead>
				<tbody>
					@php
						$no = 1;
					@endphp
					@foreach ($datas as $data)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$data->name}}</td>
							<td>{{$data->email}}</td>
							<td>{{date('d M Y - H:i', strtotime($data->created_at))}}</td>
							<td class="p-2">
								<center>
									<form action="" method="POST" onsubmit="return confirm('anda akan menghapus akun pendaftar ini ?')">
										@csrf
										@method('DELETE')
										<a onclick="return confirm('anda akan mereset password akun ini?')" href="{{ route('ppdbadmin.reset_password', $data) }}" class="btn btn-primary btn-sm"><i class="icon-key"></i> Reset</a>
										<button class="btn btn-danger btn-sm"><i class="icon-trash"></i></button>
										@if (!Route::has('register'))
										<a href="{{ route('ppdbadmin.print', $data) }}" class="btn btn-info btn-sm"><i class="icon-printer"></i></a>
										@endif
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