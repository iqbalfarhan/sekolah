@extends('layouts.nova')
@section('content')
<h2>Edit Data siswa</h2>
<div class="card">
	<div class="card-header card-header-tabs pb-0">
		@include('student.menu_detail')
	</div>
	<form action="{{ route('student.edit.datadiri') }}" method="POST">
		@csrf
		@method('PUT')
		<input type="hidden" name="id" value="{{$student->id}}">
		<div class="card-body">
			<h3>Data pribadi peserta didik</h3>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">1. Nama lengkap</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="nama_lengkap" value="{{$data->nama_lengkap ?? $student->name}}">
					<small class="form-text text-primary">Nama Peserta didik sesuai dokumen resmi yang berlaku (Akta atau Ijazah sebelumnya). Hanya bisa di ubah melalui <a href="">http://vervalpd.data.kemendikbud.go.id</a></small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">2. Jenis Kelamin</label>
				<div class="col-md-9">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="jklaki" name="jenis_kelamin" class="custom-control-input" value="l" @if($student->jk == 'l') checked @endif>
						<label class="custom-control-label" for="jklaki">Laki-laki</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="jkperempuan" name="jenis_kelamin" class="custom-control-input" value="p" @if($student->jk == 'p') checked @endif>
						<label class="custom-control-label" for="jkperempuan">Perempuan</label>
					</div>
					<small class="form-text text-primary">Jenis Kelamin Peserta didik</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">3. NISN</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="nisn" value="{{$data['nisn'] ?? ""}}">
					<small class="form-text text-primary">Nomor Induk Siswa Nasional (jika Memiliki). jika belum memiliki maka wajib kosongkan. NISN memilik format 10 digit angka. contoh: 0009321234. untuk memeriksa NISN, dapat mengunjungi laman <a href="">http://niisn.data.kemendikbud.go.id/page/data</a></small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">4. NIK/ No.Kitas (Untuk WNA)</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="nik" value="{{$data['nik'] ?? ""}}">
					<small class="form-text text-primary">
						Nomor induk kependudukan yang tercantum pada kkartu keluarga, kartu identitas anak atau KTP (jika sudah Memiliki) bagi WNI. NIK memiliki format 16 digit angka. Contoh 64710419019600xx
					</small>
					<small class="form-text text-primary">
						pastikan NIK tidak tertukar dengan Nomor Kartu Keluarga karena keduanya memiliki format yang sama. bBagi WNA, diisi dengan nomor kartu izin tinggal sementara (KITAS)
					</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">5. Tempat Lahir</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="tempat_lahir" value="{{$data['tempat_lahir'] ?? ""}}">
					<small class="form-text text-primary">Tempat lahir peserta didik sesuai dengan dokumen resmi yang berlaku</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">6. Tanggal Lahir</label>
				<div class="col-md-9">
					<input type="date" class="form-control" name="tanggal_lahir" value="{{$data['tanggal_lahir'] ?? ""}}">
					<small class="form-text text-primary">Tanggal lahir peserta didik sesuai dengan dokumen resmi peserta didik. Hanya bisa di ubah melalui <a href="">http://vervalpd.data.kemendikbud.go.id</a></small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">7. No Registrasi Akta Kelahiran</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="nomor_akta" value="{{$data['nomor_akta'] ?? ""}}">
					<small class="form-text text-primary">Nomor registrasi akta kelahiran. Nomor registras iyang dimaskud umumnya tercantum pada bagian tengah atas lembar kutipan akta kelahiran.</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">8. Agama</label>
				<div class="col-md-9">
					<select name="agama" id="" class="form-control">
						<option value="">--</option>
						<option @if($data['agama'] == 'islam') selected @endif value="islam">islam</option>
						<option @if($data['agama'] == 'kristen') selected @endif value="kristen">Kristen/Protestan</option>
						<option @if($data['agama'] == 'katholik') selected @endif value="katholik">Katholik</option>
						<option @if($data['agama'] == 'hindu') selected @endif value="hindu">Hindu</option>
						<option @if($data['agama'] == 'budha') selected @endif value="budha">Budha</option>
					</select>
					<small class="form-text text-primary">Agama Peserta didik </small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">9. Kewarganegaraan</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="kewarganegaraan" value="Indonesia" value="{{$data['kewarganegaraan'] ?? ""}}">
					<small class="form-text text-primary">Kewarganegaraan peserta didik </small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">10. Berkebutuhan Khusus</label>
				<div class="col-md-9" style="columns: 2">
					@foreach ($kebutuhan_khusus as $key => $value)
					<div class="custom-control custom-checkbox">
						<input class="custom-control-input" id="{{$key}}" type="checkbox" name="kebutuhan_khusus[{{$value}}]"
						@if(isset($data['kebutuhan_khusus'][$value]) == "on") checked @endif>
						<label class="custom-control-label" for="{{$key}}">
							{{$value}}
						</label>
					</div>
					@endforeach
					<small class="form-text text-primary">Kebutuhan khusus yang disandang oleh peserta didik, dapat dipilih lebih dari satu</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">11. Alamat</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="alamat[jalan]" value="{{$data['alamat']['jalan'] ?? ""}}">
					<small class="form-text text-primary">Jalur tempat tinggal peserta didik, terdiri atas Gang, kompleks, blok, nomor rumah, dan sebagainya selain informasi yang diminta oleh kolom-kolom yang lain pada bagian ini. sebagai contoh, peserta didik tinggal di sebuah Kompleks Perumahan Griya Adam yang berada pada Jl. Kemanggisan, dengan nomor rumah 4-C, di lingkungan RT.005 dan RW.011 Dusun Cempaka, Desa Salatiga maka dapat diisi dengan Jl. Kemanggisan, komp Griya Adam No 4-C</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">12. RT</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="alamat[rt]" value="{{$data['alamat']['rt'] ?? ""}}">
					<small class="form-text text-primary">Nomor RT tempat peserta didik tinggal saat ini. Dari contoh diatas, misalnya dapat di isi dengan 5</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">13. RW</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="alamat[rw]" value="{{$data['alamat']['rw'] ?? ""}}">
					<small class="form-text text-primary">Nomor RW tempat peserta didik tinggal saat ini. Dari contoh diatas, misalnya dapat di isi dengan 11</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">14. Nama Dusun</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="alamat[dusun]" value="{{$data['alamat']['dusun'] ?? ""}}">
					<small class="form-text text-primary">Nama dusun tempat peserta didik tinggal saat ini. Dari contoh diatas, misalnya dapat di isi dengan cempaka</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">15. Nama Kelurahan/Desa</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="alamat[kelurahan]" value="{{$data['alamat']['kelurahan'] ?? ""}}">
					<small class="form-text text-primary">Nama Kelurahan/ desa tempat peserta didik tinggal saat ini. Dari contoh diatas, misalnya dapat di isi dengan salatiga</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">16. Kecamatan</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="alamat[kecamatan]" value="{{$data['alamat']['kecamatan'] ?? ""}}">
					<small class="form-text text-primary">Nama kecamatan tempat peserta didik tinggal saat ini.</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">17. Kode Pos</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="alamat[kodepos]" value="{{$data['alamat']['kodepos'] ?? ""}}">
					<small class="form-text text-primary">Kode POS tempat peserta didik tinggal saat ini.</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">18. Lintang</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="alamat[lintang]" value="{{$data['alamat']['lintang'] ?? ""}}">
					<small class="form-text text-primary">Titik koordinat tempat tinggal siswa</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">19. Bujur</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="alamat[bujur]" value="{{$data['alamat']['bujur'] ?? ""}}">
					<small class="form-text text-primary">Titik koordinat tempat tinggal siswa</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">20. Tempat tinggal</label>
				<div class="col-md-9">
					<select name="tempat_tinggal" id="" class="form-control">
						<option value="">--</option>
						<option @if(isset($data['tempat_tinggal']) && $data['tempat_tinggal'] == "Bersama Orang Tua") selected @endif value="Bersama Orang Tua">Bersama Orang Tua</option>
						<option @if(isset($data['tempat_tinggal']) && $data['tempat_tinggal'] == "Wali") selected @endif value="Wali">Wali</option>
						<option @if(isset($data['tempat_tinggal']) && $data['tempat_tinggal'] == "Kos") selected @endif value="Kos">Kos</option>
						<option @if(isset($data['tempat_tinggal']) && $data['tempat_tinggal'] == "Asrama") selected @endif value="Asrama">Asrama</option>
						<option @if(isset($data['tempat_tinggal']) && $data['tempat_tinggal'] == "Panti Asuhan") selected @endif value="Panti Asuhan">Panti Asuhan</option>
						<option @if(isset($data['tempat_tinggal']) && $data['tempat_tinggal'] == "Lainnya") selected @endif value="Lainnya">Lainnya</option>
					</select>
					<small class="form-text text-primary">Kepemilikan tempat tinggal peserta didik saat ini (yang telah di isikan dengan kolom-kolom sebelunya diatas)</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">21. Moda Transportasi</label>
				<div class="col-md-9">
					<select name="moda_transportasi" id="" class="form-control">
						<option value="">--</option>
						<option @if(isset($data['moda_transportasi']) && $data['moda_transportasi'] == "Jalan Kaki") selected @endif value="Jalan Kaki">Jalan Kaki</option>
						<option @if(isset($data['moda_transportasi']) && $data['moda_transportasi'] == "Kendaraan Pribadi") selected @endif value="Kendaraan Pribadi">Kendaraan Pribadi</option>
						<option @if(isset($data['moda_transportasi']) && $data['moda_transportasi'] == "Kendaraan Umum") selected @endif value="Kendaraan Umum">Kendaraan Umum</option>
						<option @if(isset($data['moda_transportasi']) && $data['moda_transportasi'] == "Jemputan Sekolah") selected @endif value="Jemputan Sekolah">Jemputan Sekolah</option>
						<option @if(isset($data['moda_transportasi']) && $data['moda_transportasi'] == "Kereta Api") selected @endif value="Kereta Api">Kereta Api</option>
						<option @if(isset($data['moda_transportasi']) && $data['moda_transportasi'] == "Ojek") selected @endif value="Ojek">Ojek</option>
						<option @if(isset($data['moda_transportasi']) && $data['moda_transportasi'] == "Andong/Dokar/Delman/Becak/Bendi/Sado") selected @endif value="Andong/Dokar/Delman/Becak/Bendi/Sado">Andong/Dokar/Delman/Becak/Bendi/Sado</option>
						<option @if(isset($data['moda_transportasi']) && $data['moda_transportasi'] == "Perahu Penyebranga/Rakit/Getek") selected @endif value="Perahu Penyebranga/Rakit/Getek">Perahu Penyebranga/Rakit/Getek</option>
						<option @if(isset($data['moda_transportasi']) && $data['moda_transportasi'] == "Lainnya") selected @endif value="Lainnya">Lainnya</option>
					</select>
					<small class="form-text text-primary">Mode transportasi utama atau yang paling sering digunakan peserta didik untuk pergi ke sekolah </small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">22. Nomor KKS (Kartu Keluarga Sejahtera)</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="nomor_kks" placeholder="6 digit angka" value="{{$data['nomor_kks'] ?? ""}}">
					<small class="form-text text-primary">Nomor kartu keluarga sejahtera (jika memiliki). Nomor yang dimaksud adalah 6 digit kode yang tertera pada Sisi belakang kiri atas kartu (di bawah lambang Garuda Pancasila).<br><br>Peserta didik dinyatakan sebagai anggota KKS apabila tercantum di dalam kartu keluarga dengan kepala keluarga pemegang KKS. Sebagai contoh, peserta didik tercantum pada KK dengan kepala keluarga adalah kakek. Apabila kakek peserta didik tersebut pemegang KKS, maka nomor KKS milik kakek peserta didik yang bersangkutan dapat diisikan pada kolom ini</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">23. Anak Keberapa</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="anak_keberapa" value="{{$data['anak_keberapa'] ?? ""}}">
					<small class="form-text text-primary">Cukup Jelas </small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">24. Penerima KPS/PKH</label>
				<div class="col-md-9">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="penerima_kps_ya" name="penerima_kps" class="custom-control-input" value="ya" @if (isset($data['penerima_kps']) && $data['penerima_kps'] == 'ya') checked @endif>
						<label class="custom-control-label" for="penerima_kps_ya">Ya</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="penerima_kps_no" name="penerima_kps" class="custom-control-input" value="tidak" @if (isset($data['penerima_kps']) && $data['penerima_kps'] == 'tidak') checked @endif>
						<label class="custom-control-label" for="penerima_kps_no">Tidak</label>
					</div>
					<small class="form-text text-primary">status peserta didik sebagai penerima manfaat KPS(Kartu  Perlindungan Sosial) atau PKH (Program Keluarga Harapan). Peserta didik dinyatakan sebagai penerima KPS/PKH apabila tercantum di dalam kartu keluarga dengan kepala keluarga pemegang KPS/PKH. Sebagai contoh, peserta didik tercantum pada KK dengan kepala keluarganya adalah kakek. Apabila kakek peserta didik tersebut pemegang KPS/PKH maka, peserta didik yang bersangkutan dinyatakan penerima KPS/PKH.</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">25. No. KPS/PKH (Apabila menerima)</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="no_kps" value="{{$data['no_kps'] ?? ""}}">
					<small class="form-text text-primary">Nomor KPS atau PKH yang masih berlaku sebelumnya dipilh sebagai penerima KPS/PKH</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">26. Usulan dari sekolah (Layak PIP)</label>
				<div class="col-md-9">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="kip_ya" name="usulan_kip_sekolah" class="custom-control-input" value="ya" @if(isset($data['usulan_kip_sekolah']) && $data['usulan_kip_sekolah'] == "ya") checked @endif>
						<label class="custom-control-label" for="kip_ya">Ya</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="kip_no" name="usulan_kip_sekolah" class="custom-control-input" value="tidak" @if(isset($data['usulan_kip_sekolah']) && $data['usulan_kip_sekolah'] == "tidak") checked @endif>
						<label class="custom-control-label" for="kip_no">Tidak</label>
					</div>
					<small class="form-text text-primary">pilih ya apabila peserta didik layak diajukan sebagai penerima manfaat program Indonesia Pintar (seperti BSM dan sejenisnya). Pilih tidak jika tidak memenuhi kriteria. Opsi ini khusus bagi peserta didik yang tidak memiliki KIP. peserta didik yang memiliki KIP silakan dipilih tidak</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">27. Penerima KIP (Kartu Indonesia Pintar)</label>
				<div class="col-md-9">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="pnerima_kip_ya" name="penerima_kip" class="custom-control-input" value="ya" @if(isset($data['penerima_kip']) && $data['penerima_kip'] == 'ya') checked @endif>
						<label class="custom-control-label" for="pnerima_kip_ya">Ya</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="penerima_kip_no" name="penerima_kip" class="custom-control-input" value="tidak" @if(isset($data['penerima_kip']) && $data['penerima_kip'] == 'tidak') checked @endif>
						<label class="custom-control-label" for="penerima_kip_no">Tidak</label>
					</div>
					<small class="form-text text-primary">Pilih Ya apabila peserta didik memiliki kartu KIP. pilih tidak apabila tida memiliki</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">28. Nomor KIP</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="nomor_kip" value="{{$data['nomor_kip'] ?? ""}}">
					<small class="form-text text-primary">Nomor KIP milik peserta didik apabila sebelumnya telah dipilih sebgai penerima KIP. Nomor yang dimaksud adalah 6 digit kode yang tertera pada sisi belakang kanan atas kartu (dibawah lambang toga)</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">29. Nama Tertera di KIP</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="nama_kip" value="{{$data['nama_kip'] ?? ""}}">
					<small class="form-text text-primary">Nama Yang Tertera pada KIP milik peserta didik</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">30. Terima fisik kartu</label>
				<div class="col-md-9">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="terima_fisik_kip_ya" name="terima_fisik_kip" class="custom-control-input" value="ya" @if(isset($data['terima_fisik_kip']) && $data['terima_fisik_kip'] == 'ya') checked @endif>
						<label class="custom-control-label" for="terima_fisik_kip_ya">Ya</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="terima_fisik_kip_no" name="terima_fisik_kip" class="custom-control-input" value="tidak" @if(isset($data['terima_fisik_kip']) && $data['terima_fisik_kip'] == 'tidak') checked @endif>
						<label class="custom-control-label" for="terima_fisik_kip_no">Tidak</label>
					</div>
					<small class="form-text text-primary">Status bahwa peserta didik sudah menerima atau beum menerima Kartu Indonesia Pintar secara fisik  </small>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">31. Alasan Layakk PIP</label>
				<div class="col-md-9">
					<select name="alasan_layak_pip" id="" class="form-control">
						<option value="">--</option>
						<option @if(isset($data['alasan_layak_pip']) && $data['alasan_layak_pip']== 'Pemegang PKH/KPS/KIP') selected @endif value="Pemegang PKH/KPS/KIP">Pemegang PKH/KPS/KIP</option>
						<option @if(isset($data['alasan_layak_pip']) && $data['alasan_layak_pip']== 'Penerima BSM 2014') selected @endif value="Penerima BSM 2014">Penerima BSM 2014</option>
						<option @if(isset($data['alasan_layak_pip']) && $data['alasan_layak_pip']== 'Yatim Piatu/ Panti Asuhan/ Panti Sosial') selected @endif value="Yatim Piatu/ Panti Asuhan/ Panti Sosial">Yatim Piatu/ Panti Asuhan/ Panti Sosial</option>
						<option @if(isset($data['alasan_layak_pip']) && $data['alasan_layak_pip']== 'Dampak Bencana Alam') selected @endif value="Dampak Bencana Alam">Dampak Bencana Alam</option>
						<option @if(isset($data['alasan_layak_pip']) && $data['alasan_layak_pip']== 'Pernah Drop Out') selected @endif value="Pernah Drop Out">Pernah Drop Out</option>
						<option @if(isset($data['alasan_layak_pip']) && $data['alasan_layak_pip']== 'Siswa Miskin/Rentan Miskin') selected @endif value="Siswa Miskin/Rentan Miskin">Siswa Miskin/Rentan Miskin</option>
						<option @if(isset($data['alasan_layak_pip']) && $data['alasan_layak_pip']== 'Daerah Konflik') selected @endif value="Daerah Konflik">Daerah Konflik</option>
						<option @if(isset($data['alasan_layak_pip']) && $data['alasan_layak_pip']== 'Keluarga Terpidana') selected @endif value="Keluarga Terpidana">Keluarga Terpidana</option>
						<option @if(isset($data['alasan_layak_pip']) && $data['alasan_layak_pip']== 'Kelainan fisik') selected @endif value="Kelainan fisik">Kelainan fisik</option>
					</select>
					<small class="form-text text-primary">alasan utama peserta didik jika layak menerima manfaat PIP. Kolom ini akan muncul apabila di pilih ya untuk mengisi kolom usulan dari sekolah (layak PIP)</small>
				</div>
			</div>

			<!-- Bank -->
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">32. Bank</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="bank" value="{{$data['bank'] ?? ""}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">33. No. Rekening bank</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="no_rekening" value="{{$data['no_rekening'] ?? ""}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-md-3">34. Rekening Atas Nama</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="nama_rekening" value="{{$data['nama_rekening'] ?? ""}}">
					<small class="form-text text-primary">Data pada Bagian ini diisi oleh Kemendikbud</small>
				</div>
			</div>
			<button class="btn btn-primary">Simpan data</button>
		</div>
	</form>
</div>
@endsection