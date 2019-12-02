@php
$berkass = ['akta_kelahiran', 'kartu_keluarga' , 'ijazah', 'skhu'];
@endphp
<div class="card-body">
	<h4>Berkas peserta didik</h4>
	<div class="table-responsive">
		<table class="table table-borderless">
			<thead>
				<th>Jenis Berkas</th>
				<th>Nama file</th>
				<th class="text-center">Upload</th>
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
						<a href="{{ Storage::url($datafile[$berkas]) }}" class="btn btn-sm btn-primary"><i class="nova-file mr-2"></i>Llihat berkas</a>
						@endisset
					</td>
					<td class="p-2">

						<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#{{$berkas}}">Pilih file</button>
						
						<!-- Modal -->
						<div class="modal fade" id="{{$berkas}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Upload Berkas {{$berkas}}</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="{{ route('ppdb.berkas.upload', $berkas) }}" method="POST" enctype="multipart/form-data">
										<div class="modal-body">
											@csrf
											<input type="file" class="form-control-file" name="file[{{$berkas}}]" onchange="this.form.submit()">
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Upload berkas</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>