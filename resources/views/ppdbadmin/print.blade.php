@extends('layouts.nova')

@section('content')

<script lang="text/javascript">
	/*window.print()*/
</script>

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header d-flex">
				<img src="@isset ($sekolah->logo) {{Storage::url($sekolah->logo)}} @endisset" alt="" class="" style="width: 120px">
				<div class="pl-4">
					<h4>{{$sekolah->nama_sekolah ?? "Nama Sekolah"}}</h4>
					<p class="m-0">
						Sistem PPDB Online
					</p>
				</div>
			</div>
			<div class="card-body">
				<h4>Print akun PPDB Online</h4>

				<table cellpadding="10px">
					<tr>
						<th>Nama lengkap</th>
						<th>:</th>
						<td>{{$data->name}}</td>
					</tr>
					<tr>
						<th>Email</th>
						<th>:</th>
						<td>{{$data->email}}</td>
					</tr>
					<tr>
						<th>Password</th>
						<th>:</th>
						<td>abcd1234</td>
					</tr>
				</table>

				<hr>
				<ul>
					<li>
						<p>
							<h5><b>Penggunaan</b></h5>
							@php
							$ppdbsetting = App\Ppdb_setting::first();
							@endphp
							Gunakan email dan password diatas untuk login  di <code>{{$ppdbsetting->linkppdb}}</code> dan melengkapi data pada SISTEM PPDB Online
						</p>
					</li>
					<li>
						<p>
							<h5><b>Pelaksanaan PPDB</b></h5>
							{{date('d F Y', strtotime($ppdbsetting->mulai))}} - {{date('d F Y', strtotime($ppdbsetting->selesai))}}
						</p>
					</li>
					<li>
						<p>
							<h5><b>Ketetuan PPDB Online</b></h5>
							@php
							echo nl2br($ppdbsetting->keterangan ?? "");
							@endphp
						</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection