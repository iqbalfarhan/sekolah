<div class="card-body">

	@if (
		$data == null||
		$data['data_pribadi'] == null || $data['orangtua_wali'] == null || $data['registrasi'] == null || $data['rincian'] == null || $data['photo'] == null ||
		$data['data_pribadi'] == "" || $data['orangtua_wali'] == "" || $data['registrasi'] == "" || $data['rincian'] == "" || $data['photo'] == "" || 
		App\Ppdb_berkas::where('ppdb_id', $data['id'])->count() == 0
	)
	<div class="alert alert-warning">
		<h5><i class="nova-alert mr-2"></i>Data pendaftaran belum lengkap</h5>
		<p>Anda dapat melakukan pendaftaran setelah anda melengkapi semua data yang di butuhkan dalam sistem PPDB Online ini.</p>
	</div>
	<table cellpadding="10px">
		<tr>
			<td>Data pribadi</td>
			<td>:</td>
			<td>
				@if (isset($data['data_pribadi']) || !empty($data['data_pribadi']))
					<i class="nova-check h4"></i>
				@endif
			</td>
		</tr>
		<tr>
			<td>Data orang tua dan wali</td>
			<td>:</td>
			<td>
				@if (isset($data['orangtua_wali']) || !empty($data['orangtua_wali']))
					<i class="nova-check h4"></i>
				@endif
			</td>
		</tr>
		<tr>
			<td>Data Pendaftaran</td>
			<td>:</td>
			<td>
				@if (isset($data['registrasi']) || !empty($data['registrasi']))
					<i class="nova-check h4"></i>
				@endif
			</td>
		</tr>
		<tr>
			<td>Data Rincian</td>
			<td>:</td>
			<td>
				@if (isset($data['rincian']) || !empty($data['rincian']))
					<i class="nova-check h4"></i>
				@endif
			</td>
		</tr>
		<tr>
			<td>Berkas</td>
			<td>:</td>
			<td>
				@if (App\Ppdb_berkas::where('ppdb_id', $data['id'] ?? "")->count() != 0)
					<i class="nova-check h4"></i>
				@endif
			</td>
		</tr>
		<tr>
			<td>Upload Photo</td>
			<td>:</td>
			<td>
				@if (isset($data['photo']) || !empty($data['photo']))
					<i class="nova-check h4"></i>
				@endif
			</td>
		</tr>
	</table>
	@else
	<h4>Selesai melengkapi data.</h4>
	<p class="">Setelah melakukan pendaftar, anda tidak dapat lagi mengubah data anda. Pastikan anda sudah mengisi data pribadi, orang tua, rincian, pendaftaran dan berkas-berkas anda dengan benar. Apabila terjadi kesalahan data anda dapat melaporkan kepada pihah sekolah.</p>
	<p class="">isikan konfirmasi password anda untuk membuktikan bahwa anda sendiri yang telah melakukan pendaftaran</p>

	<form action="{{ route('ppdb.mendaftar') }}" method="POST">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="password" class="col-form-label col-md-3 font-weight-bold">Konfirmasi Password</label>
			<div class="col-md-9">
				<input type="password" class="form-control" id="password" name="password" placeholder="">
				<small class="form-text text-muted">Konfirmasi password</small>
			</div>
		</div>
		<button class="btn btn-primary">
			<i class="icon-check"></i>
			Mendaftar
		</button>
	</form>
	@endif

</div>