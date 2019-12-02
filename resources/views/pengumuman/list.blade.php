@extends('layouts.nova')

@section('content')
<h2>Pengumuman</h2>
<div class="card">
	<div class="card-body pb-0">
		<a href="{{ route('pengumuman.create') }}" class="btn btn-primary">Tambah baru</a>
	</div>
	<div class="card-body">
		@php
			$no = 1;
		@endphp
		<table class="table">
			<thead>
				<th>#</th>
				<th>Jenis</th>
				<th>Judul Pengumuman</th>
				<th>Lampiran</th>
				<th class="text-center"><i class="icon-options"></i></th>
			</thead>
			<tbody>
				@foreach ($datas as $data)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$data->jenis}}</td>
						<td>{{$data->judul}}</td>
						<td>
							@isset ($data->file)
							    <a href="{{Storage::url($data->file)}}" target="prevframe" class="btn btn-sm btn-secondary" onclick="$('#openmodal').modal()"><i class="nova-dekstop mr-2"></i>lihat lampiran</a>
							@endisset
						</td>
						<td class="p-2 text-truncate">
							<form action="{{ route('pengumuman.destroy', $data) }}" method="POST" onsubmit="return confirm('anda yakin akan menghapus data ini?')">
								@csrf
								@method('DELETE')
								<center>
									<a href="{{ route('pengumuman.show', $data) }}" class="btn btn-primary btn-sm"><i class="icon-eye"></i></a>
									<a href="{{ route('pengumuman.edit', $data) }}" class="btn btn-sm btn-success"><i class="icon-pencil"></i></a>
									<button class="btn btn-sm btn-danger"><i class="icon-trash"></i></button>
								</center>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection

@section('modal')
	<!-- Modal -->
<div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Lampiran Pengumuman</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<iframe src="" name="prevframe" frameborder="0" class="w-100" style="overflow: hidden;"></iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
@endsection