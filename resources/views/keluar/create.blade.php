@extends('layouts.nova')

@section('content')
<h2>Peserta didik tidak aktif</h2>
<div class="card">
	<div class="card-body">
		<p>Diisi jika peserta didik sudah keluar</p>
		<form action="{{ route('keluar.store') }}" method="POST">
			@csrf
			<div class="form-group row">
				<label for="siswa_id" class="col-form-label col-md-3 font-weight-bold">Nama siswa</label>
				<div class="col-md-9 form-inline">
					<select name="siswa_id" id="siswa_id" class="form-control">
						<option value="">--</option>
						@foreach ($students as $student)
						<option value="{{$student->id}}">{{$student->name}} &rarr; {{$student->nis}}</option>
						@endforeach
					</select>
					<small class="form-text text-muted"></small>
				</div>
			</div>
			<div class="form-group row">
				<label for="alasan" class="col-form-label col-md-3 font-weight-bold">Keluar karena</label>
				<div class="col-md-9">
					<select name="alasan" id="alasan" class="form-control">
						<option value="">--</option>
						<option value="lulus">1. Lulus</option>
						<option value="mutasi">2. Mutasi</option>
						<option value="dikeluarkan">3. Dikeluarkan</option>
						<option value="mengundurkan diri">4. Mengundurkan diri</option>
						<option value="putus sekolah">5. Putus sekolah</option>
						<option value="wafat">6. Wafat</option>
						<option value="hilang">7. Hilang</option>
						<option value="lainnya">8. Lainnya</option>
					</select>
					<small class="form-text text-muted">
						Alasan utama peserta didik keluar dari sekolah. Pilih Lulus apabila peserta didik telah lulus dari sekolah. Pilih mengundurkan diri apabila peserta didik keluar sekolah karena mengundurkan diri dengan catatan (dibuktikan adanya sirat pengunduran diri). Pilih putuse sekolah apabila peserta didik meniggalkan sekolah tanpa keterangan yang jelas.
					</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="tanggal" class="col-form-label col-md-3 font-weight-bold">Tanggal Keluar</label>
				<div class="col-md-9 form-inline">
					<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="">
					<small class="form-text text-muted ml-3">Tanggal saat peserta didik dicatat/diketahui keluar dari sekolah</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="keterangan" class="col-form-label col-md-3 font-weight-bold">Alasan keluar</label>
				<div class="col-md-9">
					<textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
					<small class="form-text text-muted">Alasan khusus yang melatabelakangi peserta didik keluar dari sekolah</small>
				</div>
			</div>

			<button class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>
@endsection