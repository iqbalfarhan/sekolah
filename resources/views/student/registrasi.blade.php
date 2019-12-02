@extends('layouts.nova')

@section('content')
<h2>Edit Data siswa</h2>
<div class="card">
	<div class="card-header card-header-tabs pb-0">
		@include('student.menu_detail')
	</div>
	<form action="{{ route('student.edit.registrasi') }}" method="POST">
		@csrf
		@method('PUT')
		<input type="hidden" name="id" value="{{$student->id}}">
		<div class="card-body">
			<h3>Registrasi Peserta didik</h3>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">1. Kompetensi Keahlian</label>
				<div class="col-md-9">
					<select name="kompetensi_keahlian" id=""  class="form-control">
						<option value="">--</option>
						@foreach ($jurusans as $jurusan)
						<option @if(isset($data['kompetensi_keahlian']) == $jurusan->id) selected @endif value="{{$jurusan->id}}">{{$jurusan->jurusan}}</option>
						@endforeach
					</select>
					<small class="form-text text-primary">Kompetensi yang dipilih peserta didik setelah masu sekolah ini. (Khusus SMK)</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">2. Jenis Pendaftaran</label>
				<div class="col-md-9">
					<select name="jenis_pendaftaran" id="" class="form-control">
						<option value="">--</option>
						<option @if(isset($data['jenis_pendaftaran']) && $data['jenis_pendaftaran'] == "Siswa Baru") selected @endif value="Siswa Baru">01. Siswa Baru</option>
						<option @if(isset($data['jenis_pendaftaran']) && $data['jenis_pendaftaran'] == "Pindahan") selected @endif value="Pindahan">02. Pindahan</option>
						<option @if(isset($data['jenis_pendaftaran']) && $data['jenis_pendaftaran'] == "Kembali Bersekolah") selected @endif value="Kembali Bersekolah">03. Kembali Bersekolah</option>
					</select>
					<small class="form-text text-primary">Status Peserta didik saat pertamakali di terima di sekolah ini</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">3. NIS</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="nis" value="{{$data['nis'] ?? ""}}">
					<small class="form-text text-primary">Nomor induk peserta didik sesuai yang tercantum pada buku induk</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">4. Tanggal Masuk Sekolah</label>
				<div class="col-md-9 form-inline">
					<input type="date" class="form-control" name="tanggal_masuk_sekolah" value="{{$data['tanggal_masuk_sekolah'] ?? ""}}">
					<small class="form-text text-primary">tanggal pertamakali peserta didik diterima di sekolah ini. jika siswa baru, isilah dengan menggunakan tanggal awal tahun pelajaran saat peserta didik masuk. jika siswa muatasi/pindahan, isilah dengan tanggal peserta didik diterima di sekolah ini atau tanggal yang tercantum pada lembar mutasi pada akhir rapor</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">5. Asal Sekolah</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="asal_sekolah" value="{{$data['asal_sekolah'] ?? ""}}">
					<small class="form-text text-primary">Nama sekolah peserta didik sebalumnya. apabila siswa baru isi dengan nama sekolah pada jenjang sebelumnya. apabila siswa mutasi/pindahan, isi dengan nama sekolah sebelumnya.</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">6. Nomor peserta ujian</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="nomor_peserta_ujian" value="{{$data['nomor_peserta_ujian'] ?? ""}}">
					<i class="small">* Nomor 20 DIgit yang tertera pada SKHU (Format Baku 2-12-02-02-001-002-7), diisi bagi peserta didi tingkat SMP</i>
					<small class="form-text text-primary">Nomor peserta ujian saat eserta didik masih di jenjang sebelumnya. forrmatnya adalah (x-xx-xx-xx-xxx-xxx-x) 20 Digit. untuk peserta didik WNA diisi dari luar negri</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">7. No. Seri Ijazah</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="no_ijazah" value="{{$data['no_ijazah'] ?? ""}}">
					<i class="small"> Berjumlah 16 Digit. Tertera di ijazah SD, diisi bagi PD jenang SMP & SMK/SMA</i>
					<small class="form-text text-primary">Nomor ijazah peserta didik pada jenjang sebelumnya</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">8. No. Seri SKHUS</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="no_skhu" value="{{$data['no_skhu'] ?? ""}}">
					<i class="small"> Berjumlah 16 Digit. Tertera di SKHU SD, diisi bagi PD jenang SMP & SMK/SMA</i>
					<small class="form-text text-primary">Nomor SKHU/SHUN peserta didik pada jenjang sebelumnya</small>
				</div>
			</div>

			<button class="btn btn-primary">Simpan data pendaftaran</button>
		</div>

	</form>
</div>
@endsection