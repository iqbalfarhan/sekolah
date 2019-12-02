@extends('layouts.ppdb')

@section('content')

<div class="card p-md-4">
	<div class="card-body pb-0">
		<h4>Pengumuman PPDB</h4>

		<div class="table-responsive">
			<table class="table">
				<thead class="text-truncate">
					<th>Tanggal</th>
					<th>Judul pengumuman</th>
					<th>lampiran</th>
					<th class="text-center"><i class="icon-options"></i></th>
				</thead>
				<tbody>
					@foreach ($datas as $data)
					<tr>
						<td>{{$data->created_at}}</td>
						<td>{{$data->judul}}</td>
						<td class="p-2">
							@if ($data->file)
							<a href="{{Storage::url($data->file)}}" class="btn btn-link"><i class="nova-files mr-2"></i>Lihat lampiran</a>
							@endif
						</td>
						<td class="p-2">
							
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pengumuamn{{$data->id}}">
								<i class="icon-eye"></i> Detail
							</button>
							
							<!-- Modal -->
							<div class="modal fade" id="pengumuamn{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">{{$data->judul}}</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											{{$data->tulisan}}
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary">Save changes</button>
										</div>
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
</div>

@endsection