@extends('layouts.nova')

@section('content')
<h2>Manajemen User</h2>
<div class="card">
	<div class="card-body pb-0">
		<div class="row">
			<div class="col-md-9">
				<a href="{{ route('user.create') }}" class="btn btn-primary mr-3 no-wrap"><i class="icon-user-follow mr-2"></i>Tambah Baru</a>
			</div>
			<div class="col-md-3 text-right">
				<div class="dropdown">
					<a id="dropdownPosition" class="dropdown-toggle btn btn-outline-primary" href="#" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
						<span class="align-middle"><i class="nova-menu mr-2"></i>Menu</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table text-truncate">
				<thead>
					<th>#</th>
					<th>Photo</th>
					<th>Nama</th>
					<th>Akses</th>
					<th>Created@</th>
					<th class="text-center"><i class="icon-options"></i></th>
				</thead>
				<tbody class="table-sm">
					@php
						$no = 1;
					@endphp
					@foreach ($users as $user)
					<tr>
						<td>{{$no++}}</td>
						<td class="p-2">
							@if (!$user->photo || $user->photo == "default.png")
							<img src="{{ asset('img/default.png') }}" alt="" style="width: 50px; height: 50px" class="rounded-circle">
							@else
							<img src="{{ Storage::url($user->photo) }}" alt="" style="width: 50px; height: 50px" class="rounded-circle">
							@endif
						</td>
						<td>
							<b>{{$user->name}}</b><br>
							<small>{{$user->email}}</small>
						</td>
						<td>{{$user->role}}</td>
						<td>{{$user->created_at}}</td>
						<td class="p-2">
							<center>
								<form action="{{ route('user.destroy', $user) }}" method="post" onsubmit="return swal('Hapus data', 'Data siswa akan di pindahkan ke tempat sampah (tidak permanen). Suatu saat, anda dapat mengembalikan data ini. Apakah anda yakin?', 'warning')">
									@csrf
									@method('DELETE')
									<a href="{{ route('user.edit', $user) }}" class="btn btn-sm btn-success"><i class="icon-pencil"></i></a>
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