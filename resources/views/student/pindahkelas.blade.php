@extends('layouts.nova')
@section('content')
<h2>Pindah kelas peserta didik</h2>
<form action="{{ route('student.kelasChange.update') }}" method="POST">
	@csrf
	@method('PUT')
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<p class="">Pilih nama siswa yang kelasnya akan di ganti pada kolom bagian kiri, pilih kelas pada kolom bagian kanan kemudian pilih <span class="badge badge-primary">ubah kelas</span></p>
					@error('pilih')
						<b class="text-danger">
							{{$message}} Setidaknya pilih satu dari nama siswa berikut
						</b>
					@enderror
					<div class="table-responsive">
						<span id="testing"></span>
						<table class="table text-truncate">
							<thead>
								<th>
									Pilih Siswa
									<!-- <div class="custom-control custom-checkbox">
										<input class="custom-control-input" id="pilih_all" type="checkbox" name="" onchange="check_all(this)">
										<label class="custom-control-label" for="pilih_all">
											<span class="ml-3">
												Pilih Siswa
											</span>
										</label>
									</div> -->
								</th>
								<th>Tahun masuk</th>
								<th>Jurusan</th>
								<th>Kelas sekarang</th>
								<th></th>
							</thead>
							<tbody>
								@php
									$no = 1;
								@endphp
								@foreach ($students as $student)
								<tr data="{{$student->id}}">
									<td>
										<div class="custom-control custom-checkbox" >
											<input class="custom-control-input pilih" id="pilih_{{$student->id}}" type="checkbox" name="pilih[]" value="{{$student->id}}">
											<label class="custom-control-label" for="pilih_{{$student->id}}">
												<span class="ml-3">
													{{$student->name}}
												</span>
											</label>
										</div>
									</td>
									<td>{{$student->tahun_masuk}}</td>
									<td>{{$student->jurusan->inisial ?? "-"}}</td>
									<td>{{$student->kelas->grade ?? "tidak ada"}} {{$student->kelas->jurusan->inisial ?? ""}} {{$student->kelas->kelompok ?? ""}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card sticky-top">
				<div class="card-body">
					<div class="form-group">
						<label for="kelas_id" class="col-form-label font-weight-bold">Pilih kelas</label>
						<select name="kelas_id" id="kelas_id" class="form-control" required>
							<option value="">--</option>
							@foreach ($kelas as $kel)
							<option value="{{$kel->id}}">{{$kel->grade}} {{$kel->jurusan->inisial ?? ""}} {{$kel->kelompok}}</option>
							@endforeach
							<option value="0">Kosongkan Kelas</option>
						</select>
						<small class="form-text text-muted"></small>
					</div>
				</div>
				<div class="card-footer pt-0">
					<button class="btn btn-primary">Ubah Kelas</button>
				</div>
			</div>
		</div>
	</div>
	
</form>

<script>
	$('#headerSearchField').focus();

	function check_all(elem) {
		if ($(elem).is(':checked')) {
			$('input.pilih[type=checkbox]').prop('checked', true)
		}
		else{
			$('input.pilih[type=checkbox]').prop('checked', false)
		}
	}
</script>
@endsection