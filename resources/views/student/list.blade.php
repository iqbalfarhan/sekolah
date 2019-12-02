@extends('layouts.nova')

@section('content')

<h2>Data peserta didik</h2>

<div class="card">
	<div class="card-body pb-0">
		<div class="row">
			<div class="col-md-9">
				<a href="{{ route('student.create') }}" class="btn btn-primary mr-3 no-wrap"><i class="icon-user-follow mr-2"></i>Tambah Baru</a>
				<a href="{{ route('student.kelasChange') }}" class="btn btn-primary no-wrap"><i class="icon-grid mr-2"></i>Pindah Kelas</a>
			</div>
			<div class="col-md-3 text-right">
				<div class="dropdown">
					<a id="dropdownPosition" class="dropdown-toggle btn btn-outline-primary" href="#" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
						<span class="align-middle"><i class="nova-menu mr-2"></i>Menu</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right small" aria-labelledby="dropdownPosition">
						<h6 class="dropdown-header">Pengaturan Data</h6>
						<a class="dropdown-item" href="{{ route('student.export') }}"><i class="nova-cloud-down mr-2"></i>Download data siswa</a>
						<a class="dropdown-item" href="{{ route('student.import') }}"><i class="nova-import mr-2"></i>Import data siswa</a>
						<div class="dropdown-divider"></div>
						<h6 class="dropdown-header">Lainnya</h6>
						<a class="dropdown-item" href="{{ route('student.deleted') }}"><i class="nova-trash mr-2"></i>Data siswa terhapus</a>
						<a class="dropdown-item" href="{{ route('keluar.index') }}"><i class="nova-close mr-2"></i>Data siswa tidak aktif</a>
						<a class="dropdown-item" href="{{ route('keluar.create') }}"><i class="icon-logout mr-2"></i>Pendaftaran Keluar</a>
					</div>
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
					<th>Tahun masuk</th>
					<th>Jurusan</th>
					<th>Kelas</th>
					<th>Jenis Kelamin</th>
					<th class="text-center"><i class="icon-options"></i></th>
				</thead>
				<tbody class="table-sm">
					@php
						$no = 1;
					@endphp
					@foreach ($students as $student)
					<tr>
						<td>{{$no++}}</td>
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
						<td>{{$student->tahun_masuk}}</td>
						<td>{{$student->jurusan->inisial ?? ""}}</td>
						<td>
							@isset ($student->kelas)
							{{$student->kelas->grade ?? "-"}} {{$student->kelas->jurusan->inisial ?? ""}} {{$student->kelas->kelompok ?? ""}}
							@else
							<button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#pilkelas" data-nama="{{$student->name}}" data-id="{{$student->id}}" onclick="kelas(this)">Pilih kelas</button>
							@endisset
						</td>
						<td>
							@if ($student->jk == 'l')
							Lak-laki
							@else
							Perempuan
							@endif
						</td>
						<td class="p-2">
							<center>
								<form action="{{ route('student.destroy', $student) }}" method="post" onsubmit="return swal('Hapus data', 'Data siswa akan di pindahkan ke tempat sampah (tidak permanen). Suatu saat, anda dapat mengembalikan data ini. Apakah anda yakin?', 'warning')">
									@csrf
									@method('DELETE')
									<a href="{{ route('student.edit', $student) }}" class="btn btn-sm btn-success"><i class="icon-pencil"></i></a>
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

@section('modal')

<script>
	$('#headerSearchField').focus();
	function kelas(e) {
		var kode = $(e).attr('data-id');
		var nama = $(e).attr('data-nama');
		$('input#pilih').val(kode);
		$('#namasiswa').html(nama);
	}
</script>
	<!-- Modal -->
<div class="modal fade" id="pilkelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="namasiswa"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ route('student.kelasChange.update') }}" method="POST">
				@csrf
				@method('PUT')
				<div class="modal-body">
					<input type="hidden" id="pilih" name="pilih[]" required>
					<div class="form-group">
						<label for="kelas_id" class="col-form-label font-weight-bold">Pilih Kelas</label>
						<select name="kelas_id" id="kelas_id" class="form-control" required>
							<option value="">--</option>
							@foreach ($kelass as $kelas)
								<option value="{{$kelas->id}}">{{$kelas->grade}} - {{$kelas->jurusan->inisial}} {{$kelas->kelompok}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Pindah kelas</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection