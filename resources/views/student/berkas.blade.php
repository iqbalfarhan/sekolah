@extends('layouts.nova')

@section('content')

@php
$berkass = ['akta_kelahiran', 'kartu_keluarga' , 'ijazah', 'skhu'];
@endphp

<h2>Edit Data siswa</h2>
<div class="card">
	<div class="card-header card-header-tabs pb-0">
		@include('student.menu_detail')
	</div>
	<div class="card-body">
		<h3>Berkas Siswa</h3>
		<p>Sebelum melakukan upload berkas, anda diharuskan mengisi data pribadi terlebih dahulu. berkas yang di perbolehkan hanya berkas dalam format: PDF, JPG dan PNG dengan ukuran kurang dari 1 Mb.</p>
		<table class="table">
			<thead>
				<th>Nama Berkas</th>
				<th>File</th>
				<th>Upload</th>
			</thead>
			@php
			foreach ($data as $key => $value) {
				$datafile[$value['nama_berkas']] = $value['file_name'];
			}
			@endphp
			<tbody>
				@foreach ($berkass as $berkas)
				<tr>
					<td>{{str_replace('_', ' ', $berkas)}}</td>
					<td class="p-2">
						@isset ($datafile[$berkas])
						<a href="{{ Storage::url($datafile[$berkas]) }}" class="btn btn-sm btn-primary" target="_blank"><i class="nova-file mr-2"></i>Llihat berkas</a>

						<a onclick="return confirm('hapus berkas ini ?')" href="{{ route('student.berkas.hapus', ['siswa_id' => $student->id, 'berkas' => $berkas]) }}" class="btn btn-danger btn-sm"><i class="icon-trash"></i></a>
						@endisset
					</td>
					<td class="p-2">
						<form action="{{ route('student.berkas.upload', $berkas) }}" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="siswa_id" value="{{$student->id}}">
							<input type="file" class="form-control-file small" name="file[{{$berkas}}]" onchange="this.form.submit()">
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection