@extends('layouts.ppdb')

@section('content')

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card p-md-4">
			<div class="card-body">
				@php
					$stat = $data->status ?? "";
				@endphp
				<h4>Status pendaftaran peserta didik</h4>
				<table class="table table-borderless">
					<tr class="@if($stat == "persiapan" || $stat == 'mendaftar' || $stat == 'terverifikasi' || $stat == 'diterima') table-success @endif">
						<td>1.</td>
						<td>Persiapan Data</td>
						<td>
							@if($stat == "persiapan" || $stat == 'mendaftar' || $stat == 'terverifikasi' || $stat == 'diterima')
							<i class="icon-check text-success"></i>
							@endif
						</td>
					</tr>
					<tr class="@if($stat == 'mendaftar' || $stat == 'terverifikasi' || $stat == 'diterima') table-success @endif">
						<td>2.</td>
						<td>Mendaftar</td>
						<td>
							@if($stat == 'mendaftar' || $stat == 'terverifikasi' || $stat == 'diterima')
							<i class="icon-check text-success"></i>
							@endif
						</td>
					</tr>
					<tr class="@if($stat == 'terverifikasi' || $stat == 'diterima') table-success @endif">
						<td>3.</td>
						<td>Berkas Pendaftaran terverifikasi</td>
						<td>
							@if($stat == 'terverifikasi' || $stat == 'diterima')
							<i class="icon-check text-success"></i>
							@endif
						</td>
					</tr>
					<tr class="@if($stat == 'diterima') table-success @endif">
						<td>4.</td>
						<td>Diterima</td>
						<td>
							@if($stat == 'diterima')
							<i class="icon-check text-success"></i>
							@endif
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection