@extends('layouts.nova')

@section('content')
<h2>Edit data pendaftaran keluar</h2>
<div class="card">
	<div class="card-body">
		<form action="{{ route('keluar.update', $data) }}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group row">
				<label for="alasan" class="col-form-label col-md-3 font-weight-bold">Keluar karena</label>
				<div class="col-md-9">
					<select name="alasan" id="alasan" class="form-control">
						<option value="">--</option>
						<option @if($data->alasan == "lulus") selected @endif value="lulus">1. Lulus</option>
						<option @if($data->alasan == "mutasi") selected @endif value="mutasi">2. Mutasi</option>
						<option @if($data->alasan == "dikeluarkan") selected @endif value="dikeluarkan">3. Dikeluarkan</option>
						<option @if($data->alasan == "mengundurkan diri") selected @endif value="mengundurkan diri">4. Mengundurkan diri</option>
						<option @if($data->alasan == "putus sekolah") selected @endif value="putus sekolah">5. Putus sekolah</option>
						<option @if($data->alasan == "wafat") selected @endif value="wafat">6. Wafat</option>
						<option @if($data->alasan == "hilang") selected @endif value="hilang">7. Hilang</option>
						<option @if($data->alasan == "lainnya") selected @endif value="lainnya">8. Lainnya</option>
					</select>
					<small class="form-text text-muted">
						Alasan utama peserta didik keluar dari sekolah. Pilih Lulus apabila peserta didik telah lulus dari sekolah. Pilih mengundurkan diri apabila peserta didik keluar sekolah karena mengundurkan diri dengan catatan (dibuktikan adanya sirat pengunduran diri). Pilih putuse sekolah apabila peserta didik meniggalkan sekolah tanpa keterangan yang jelas.
					</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="tanggal" class="col-form-label col-md-3 font-weight-bold">Tanggal Keluar</label>
				<div class="col-md-9 form-inline">
					<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="" value="{{$data->tanggal}}">
					<small class="form-text text-muted ml-3">Tanggal saat peserta didik dicatat/diketahui keluar dari sekolah</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="keterangan" class="col-form-label col-md-3 font-weight-bold">Alasan keluar</label>
				<div class="col-md-9">
					<textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{$data->keterangan}}</textarea>
					<small class="form-text text-muted">Alasan khusus yang melatabelakangi peserta didik keluar dari sekolah</small>
				</div>
			</div>

			<button class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>
@endsection