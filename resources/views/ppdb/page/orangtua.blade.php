<form action="{{ route('ppdb.edit.datadiri', $page) }}" method="POST">
	@csrf
	@method('PUT')
	<input type="hidden" name="id" value="{{$auth->id ?? ""}}">
	<div class="card-body">
		<h4>Data Ayah Kandung</h4>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Nama ayah kandung</label>
			<div class="col-md-9">
				<input type="text" class="form-control" required name="ayah[nama_lengkap]" value="{{$data['ayah']['nama_lengkap'] ?? ""}}">
				<small class="form-text text-primary">Nama yah kandung peserta didik sesuai dengan dokumen resmi yang berlaku. hindari penggunaan nama gelar akademik atau sosial (seperti Alm., Dr., Drs., S.Pd, dan H) </small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">NIK</label>
			<div class="col-md-9">
				<input type="text" class="form-control" required name="ayah[nik]" value="{{$data['ayah']['nik'] ?? ""}}">
				<small class="form-text text-primary">Nomor induk kkepedudukan yang tercantum dalam NIK atau Kartu keluarga ayah peserta didik</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Tahun Lahir</label>
			<div class="col-md-9">
				<input type="text" class="form-control" required name="ayah[tahun_lahir]" value="{{$data['ayah']['tahun_lahir'] ?? ""}}">
				<small class="form-text text-primary">Tahun lahir ayah peserta didik</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Pendidikan</label>
			<div class="col-md-9 form-inline">
				<select required name="ayah[pendidikan]" id="" class="form-control">
					<option value="">--</option>
					<option @if(isset($data['ayah']['pendidikan']) && $data['ayah']['pendidikan'] == "Tidak Sekolah") selected @endif value="Tidak Sekolah">Tidak Sekolah</option>
					<option @if(isset($data['ayah']['pendidikan']) && $data['ayah']['pendidikan'] == "Putus SD") selected @endif value="Putus SD">Putus SD</option>
					<option @if(isset($data['ayah']['pendidikan']) && $data['ayah']['pendidikan'] == "SD Sederajat") selected @endif value="SD Sederajat">SD Sederajat</option>
					<option @if(isset($data['ayah']['pendidikan']) && $data['ayah']['pendidikan'] == "SMP Sederajat") selected @endif value="SMP Sederajat">SMP Sederajat</option>
					<option @if(isset($data['ayah']['pendidikan']) && $data['ayah']['pendidikan'] == "SMA Sederajat") selected @endif value="SMA Sederajat">SMA Sederajat</option>
					<option @if(isset($data['ayah']['pendidikan']) && $data['ayah']['pendidikan'] == "D1") selected @endif value="D1">D1</option>
					<option @if(isset($data['ayah']['pendidikan']) && $data['ayah']['pendidikan'] == "D2") selected @endif value="D2">D2</option>
					<option @if(isset($data['ayah']['pendidikan']) && $data['ayah']['pendidikan'] == "D3") selected @endif value="D3">D3</option>
					<option @if(isset($data['ayah']['pendidikan']) && $data['ayah']['pendidikan'] == "D4/S1") selected @endif value="D4/S1">D4/S1</option>
					<option @if(isset($data['ayah']['pendidikan']) && $data['ayah']['pendidikan'] == "S2") selected @endif value="S2">S2</option>
					<option @if(isset($data['ayah']['pendidikan']) && $data['ayah']['pendidikan'] == "S3") selected @endif value="S3">S3</option>
				</select>
				<small class="form-text text-primary">Pendidkan terakhir ayah kandung peserta didik</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Perkerjaan</label>
			<div class="col-md-9 form-inline">
				<select required name="ayah[pekerjaan]" id="" class="form-control">
					<option value="">--</option>
					<option @if(isset($data['ayah']['pekerjaan']) && $data['ayah']['pekerjaan'] == "Tidak Bekerja") selected @endif value="Tidak Bekerja">Tidak Bekerja</option>
					<option @if(isset($data['ayah']['pekerjaan']) && $data['ayah']['pekerjaan'] == "Nelayan") selected @endif value="Nelayan">Nelayan</option>
					<option @if(isset($data['ayah']['pekerjaan']) && $data['ayah']['pekerjaan'] == "Petani") selected @endif value="Petani">Petani</option>
					<option @if(isset($data['ayah']['pekerjaan']) && $data['ayah']['pekerjaan'] == "Peternak") selected @endif value="Peternak">Peternak</option>
					<option @if(isset($data['ayah']['pekerjaan']) && $data['ayah']['pekerjaan'] == "PNS/TNI/Polri") selected @endif value="PNS/TNI/Polri">PNS/TNI/Polri</option>
					<option @if(isset($data['ayah']['pekerjaan']) && $data['ayah']['pekerjaan'] == "Karyawan Swasta") selected @endif value="Karyawan Swasta">Karyawan Swasta</option>
					<option @if(isset($data['ayah']['pekerjaan']) && $data['ayah']['pekerjaan'] == "Pedagang Kecil") selected @endif value="Pedagang Kecil">Pedagang Kecil</option>
					<option @if(isset($data['ayah']['pekerjaan']) && $data['ayah']['pekerjaan'] == "Wiraswasta") selected @endif value="Wiraswasta">Wiraswasta</option>
					<option @if(isset($data['ayah']['pekerjaan']) && $data['ayah']['pekerjaan'] == "Wirausaha") selected @endif value="Wirausaha">Wirausaha</option>
					<option @if(isset($data['ayah']['pekerjaan']) && $data['ayah']['pekerjaan'] == "Buruh") selected @endif value="Buruh">Buruh</option>
					<option @if(isset($data['ayah']['pekerjaan']) && $data['ayah']['pekerjaan'] == "Pensiunan") selected @endif value="Pensiunan">Pensiunan</option>
					<option @if(isset($data['ayah']['pekerjaan']) && $data['ayah']['pekerjaan'] == "Lainnya") selected @endif value="Lainnya">Lainnya</option>
					<option @if(isset($data['ayah']['pekerjaan']) && $data['ayah']['pekerjaan'] == "Meninggal dunia") selected @endif value="Meninggal dunia">Meninggal dunia</option>
				</select>
				<small class="form-text text-primary">Pekerjaan utama ayah andunng peserta didik. pilih meninggal dunia apabila ayah kandung peserta didik meninggal dunia.</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Penghasilan Bulanan</label>
			<div class="col-md-9">
				<select required name="ayah[penghasilan]" id="" class="form-control">
					<option value="">--</option>
					<option @if(isset($data['ayah']['penghasilan']) && $data['ayah']['penghasilan'] == "Kurang dari 500.000") selected @endif value="Kurang dari 500.000">Kurang dari 500.000</option>
					<option @if(isset($data['ayah']['penghasilan']) && $data['ayah']['penghasilan'] == "500.000 - 999.999") selected @endif value="500.000 - 999.999">500.000 - 999.999</option>
					<option @if(isset($data['ayah']['penghasilan']) && $data['ayah']['penghasilan'] == "1.000.000 - 1.999.999") selected @endif value="1.000.000 - 1.999.999">1.000.000 - 1.999.999</option>
					<option @if(isset($data['ayah']['penghasilan']) && $data['ayah']['penghasilan'] == "2.000.000 - 5.999.999") selected @endif value="2.000.000 - 5.999.999">2.000.000 - 5.999.999</option>
					<option @if(isset($data['ayah']['penghasilan']) && $data['ayah']['penghasilan'] == "5.000.000 - 20.999.999") selected @endif value="5.000.000 - 20.999.999">5.000.000 - 20.999.999</option>
					<option @if(isset($data['ayah']['penghasilan']) && $data['ayah']['penghasilan'] == "Lebih dari 20.000.000") selected @endif value="Lebih dari 20.000.000">Lebih dari 20.000.000</option>
				</select>
				<small class="form-text text-primary">Rentang penghasilan ayah andung peserta didik. Kosongkan kolom ini apabila ayah kandung peserta didik telah meninggal dunia.</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">10. Berkebutuhan Khusus</label>
			<div class="col-md-9" style="columns: 2">
				@foreach ($kebutuhan_khusus as $key => $value)
				<div class="custom-control custom-checkbox">
					<input class="custom-control-input" id="ayah_{{$key}}" type="checkbox" name="ayah[kebutuhan_khusus][{{$value}}]"
					@if(isset($data['ayah']['kebutuhan_khusus'][$value]) == "on") checked @endif>
					<label class="custom-control-label" for="ayah_{{$key}}">
						{{$value}}
					</label>
				</div>
				@endforeach
				<small class="form-text text-primary">Kebutuhan khusus yang disandang oleh peserta didik, dapat dipilih lebih dari satu</small>
			</div>
		</div>
	</div>

	<div class="card-body">
		<h4>Data Ibu Kandung</h4>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Nama ibu kandung</label>
			<div class="col-md-9">
				<input type="text" class="form-control" required name="ibu[nama_lengkap]" value="{{$data['ibu']['nama_lengkap'] ?? ""}}">
				<small class="form-text text-primary">Nama yah kandung peserta didik sesuai dengan dokumen resmi yang berlaku. hindari penggunaan nama gelar akademik atau sosial (seperti Alm., Dr., Drs., S.Pd, dan H) </small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">NIK</label>
			<div class="col-md-9">
				<input type="text" class="form-control" required name="ibu[nik]" value="{{$data['ibu']['nik'] ?? ""}}">
				<small class="form-text text-primary">Nomor induk kkepedudukan yang tercantum dalam NIK atau Kartu keluarga ibu peserta didik</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Tahun Lahir</label>
			<div class="col-md-9">
				<input type="text" class="form-control" required name="ibu[tahun_lahir]" value="{{$data['ibu']['tahun_lahir'] ?? ""}}">
				<small class="form-text text-primary">Tahun lahir ibu peserta didik</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Pendidikan</label>
			<div class="col-md-9 form-inline">
				<select required name="ibu[pendidikan]" id="" class="form-control">
					<option value="">--</option>
					<option @if(isset($data['ibu']['pendidikan']) && $data['ibu']['pendidikan'] == "Tidak Sekolah") selected @endif value="Tidak Sekolah">Tidak Sekolah</option>
					<option @if(isset($data['ibu']['pendidikan']) && $data['ibu']['pendidikan'] == "Putus SD") selected @endif value="Putus SD">Putus SD</option>
					<option @if(isset($data['ibu']['pendidikan']) && $data['ibu']['pendidikan'] == "SD Sederajat") selected @endif value="SD Sederajat">SD Sederajat</option>
					<option @if(isset($data['ibu']['pendidikan']) && $data['ibu']['pendidikan'] == "SMP Sederajat") selected @endif value="SMP Sederajat">SMP Sederajat</option>
					<option @if(isset($data['ibu']['pendidikan']) && $data['ibu']['pendidikan'] == "SMA Sederajat") selected @endif value="SMA Sederajat">SMA Sederajat</option>
					<option @if(isset($data['ibu']['pendidikan']) && $data['ibu']['pendidikan'] == "D1") selected @endif value="D1">D1</option>
					<option @if(isset($data['ibu']['pendidikan']) && $data['ibu']['pendidikan'] == "D2") selected @endif value="D2">D2</option>
					<option @if(isset($data['ibu']['pendidikan']) && $data['ibu']['pendidikan'] == "D3") selected @endif value="D3">D3</option>
					<option @if(isset($data['ibu']['pendidikan']) && $data['ibu']['pendidikan'] == "D4/S1") selected @endif value="D4/S1">D4/S1</option>
					<option @if(isset($data['ibu']['pendidikan']) && $data['ibu']['pendidikan'] == "S2") selected @endif value="S2">S2</option>
					<option @if(isset($data['ibu']['pendidikan']) && $data['ibu']['pendidikan'] == "S3") selected @endif value="S3">S3</option>
				</select>
				<small class="form-text text-primary">Pendidkan terakhir ibu kandung peserta didik</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Perkerjaan</label>
			<div class="col-md-9 form-inline">
				<select required name="ibu[pekerjaan]" id="" class="form-control">
					<option value="">--</option>
					<option @if(isset($data['ibu']['pekerjaan']) && $data['ibu']['pekerjaan'] == "Tidak Bekerja") selected @endif value="Tidak Bekerja">Tidak Bekerja</option>
					<option @if(isset($data['ibu']['pekerjaan']) && $data['ibu']['pekerjaan'] == "Nelayan") selected @endif value="Nelayan">Nelayan</option>
					<option @if(isset($data['ibu']['pekerjaan']) && $data['ibu']['pekerjaan'] == "Petani") selected @endif value="Petani">Petani</option>
					<option @if(isset($data['ibu']['pekerjaan']) && $data['ibu']['pekerjaan'] == "Peternak") selected @endif value="Peternak">Peternak</option>
					<option @if(isset($data['ibu']['pekerjaan']) && $data['ibu']['pekerjaan'] == "PNS/TNI/Polri") selected @endif value="PNS/TNI/Polri">PNS/TNI/Polri</option>
					<option @if(isset($data['ibu']['pekerjaan']) && $data['ibu']['pekerjaan'] == "Karyawan Swasta") selected @endif value="Karyawan Swasta">Karyawan Swasta</option>
					<option @if(isset($data['ibu']['pekerjaan']) && $data['ibu']['pekerjaan'] == "Pedagang Kecil") selected @endif value="Pedagang Kecil">Pedagang Kecil</option>
					<option @if(isset($data['ibu']['pekerjaan']) && $data['ibu']['pekerjaan'] == "Wiraswasta") selected @endif value="Wiraswasta">Wiraswasta</option>
					<option @if(isset($data['ibu']['pekerjaan']) && $data['ibu']['pekerjaan'] == "Wirausaha") selected @endif value="Wirausaha">Wirausaha</option>
					<option @if(isset($data['ibu']['pekerjaan']) && $data['ibu']['pekerjaan'] == "Buruh") selected @endif value="Buruh">Buruh</option>
					<option @if(isset($data['ibu']['pekerjaan']) && $data['ibu']['pekerjaan'] == "Pensiunan") selected @endif value="Pensiunan">Pensiunan</option>
					<option @if(isset($data['ibu']['pekerjaan']) && $data['ibu']['pekerjaan'] == "Lainnya") selected @endif value="Lainnya">Lainnya</option>
					<option @if(isset($data['ibu']['pekerjaan']) && $data['ibu']['pekerjaan'] == "Meninggal dunia") selected @endif value="Meninggal dunia">Meninggal dunia</option>
				</select>
				<small class="form-text text-primary">Pekerjaan utama ibu andunng peserta didik. pilih meninggal dunia apabila ibu kandung peserta didik meninggal dunia.</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Penghasilan Bulanan</label>
			<div class="col-md-9">
				<select required name="ibu[penghasilan]" id="" class="form-control">
					<option value="">--</option>
					<option @if(isset($data['ibu']['penghasilan']) && $data['ibu']['penghasilan'] == "Kurang dari 500.000") selected @endif value="Kurang dari 500.000">Kurang dari 500.000</option>
					<option @if(isset($data['ibu']['penghasilan']) && $data['ibu']['penghasilan'] == "500.000 - 999.999") selected @endif value="500.000 - 999.999">500.000 - 999.999</option>
					<option @if(isset($data['ibu']['penghasilan']) && $data['ibu']['penghasilan'] == "1.000.000 - 1.999.999") selected @endif value="1.000.000 - 1.999.999">1.000.000 - 1.999.999</option>
					<option @if(isset($data['ibu']['penghasilan']) && $data['ibu']['penghasilan'] == "2.000.000 - 5.999.999") selected @endif value="2.000.000 - 5.999.999">2.000.000 - 5.999.999</option>
					<option @if(isset($data['ibu']['penghasilan']) && $data['ibu']['penghasilan'] == "5.000.000 - 20.999.999") selected @endif value="5.000.000 - 20.999.999">5.000.000 - 20.999.999</option>
					<option @if(isset($data['ibu']['penghasilan']) && $data['ibu']['penghasilan'] == "Lebih dari 20.000.000") selected @endif value="Lebih dari 20.000.000">Lebih dari 20.000.000</option>
				</select>
				<small class="form-text text-primary">Rentang penghasilan ibu andung peserta didik. Kosongkan kolom ini apabila ibu kandung peserta didik telah meninggal dunia.</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">10. Berkebutuhan Khusus</label>
			<div class="col-md-9" style="columns: 2">
				@foreach ($kebutuhan_khusus as $key => $value)
				<div class="custom-control custom-checkbox">
					<input class="custom-control-input" id="ibu_{{$key}}" type="checkbox" name="ibu[kebutuhan_khusus][{{$value}}]"
					@if(isset($data['ibu']['kebutuhan_khusus'][$value]) == "on") checked @endif>
					<label class="custom-control-label" for="ibu_{{$key}}">
						{{$value}}
					</label>
				</div>
				@endforeach
				<small class="form-text text-primary">Kebutuhan khusus yang disandang oleh ibu peserta didik, dapat dipilih lebih dari satu</small>
			</div>
		</div>
	</div>

	<div class="card-body">
		<h4>Data Wali</h4>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Nama wali kandung</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="wali[nama_lengkap]" value="{{$data['wali']['nama_lengkap'] ?? ""}}">
				<small class="form-text text-primary">Nama yah kandung peserta didik sesuai dengan dokumen resmi yang berlaku. hindari penggunaan nama gelar akademik atau sosial (seperti Alm., Dr., Drs., S.Pd, dan H) </small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">NIK</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="wali[nik]" value="{{$data['wali']['nik'] ?? ""}}">
				<small class="form-text text-primary">Nomor induk kkepedudukan yang tercantum dalam NIK atau Kartu keluarga wali peserta didik</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Tahun Lahir</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="wali[tahun_lahir]" value="{{$data['wali']['tahun_lahir'] ?? ""}}">
				<small class="form-text text-primary">Tahun lahir wali peserta didik</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Pendidikan</label>
			<div class="col-md-9 form-inline">
				<select name="wali[pendidikan]" id="" class="form-control">
					<option value="">--</option>
					<option @if(isset($data['wali']['pendidikan']) && $data['wali']['pendidikan'] == "Tidak Sekolah") selected @endif value="Tidak Sekolah">Tidak Sekolah</option>
					<option @if(isset($data['wali']['pendidikan']) && $data['wali']['pendidikan'] == "Putus SD") selected @endif value="Putus SD">Putus SD</option>
					<option @if(isset($data['wali']['pendidikan']) && $data['wali']['pendidikan'] == "SD Sederajat") selected @endif value="SD Sederajat">SD Sederajat</option>
					<option @if(isset($data['wali']['pendidikan']) && $data['wali']['pendidikan'] == "SMP Sederajat") selected @endif value="SMP Sederajat">SMP Sederajat</option>
					<option @if(isset($data['wali']['pendidikan']) && $data['wali']['pendidikan'] == "SMA Sederajat") selected @endif value="SMA Sederajat">SMA Sederajat</option>
					<option @if(isset($data['wali']['pendidikan']) && $data['wali']['pendidikan'] == "D1") selected @endif value="D1">D1</option>
					<option @if(isset($data['wali']['pendidikan']) && $data['wali']['pendidikan'] == "D2") selected @endif value="D2">D2</option>
					<option @if(isset($data['wali']['pendidikan']) && $data['wali']['pendidikan'] == "D3") selected @endif value="D3">D3</option>
					<option @if(isset($data['wali']['pendidikan']) && $data['wali']['pendidikan'] == "D4/S1") selected @endif value="D4/S1">D4/S1</option>
					<option @if(isset($data['wali']['pendidikan']) && $data['wali']['pendidikan'] == "S2") selected @endif value="S2">S2</option>
					<option @if(isset($data['wali']['pendidikan']) && $data['wali']['pendidikan'] == "S3") selected @endif value="S3">S3</option>
				</select>
				<small class="form-text text-primary">Pendidkan terakhir wali kandung peserta didik</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Perkerjaan</label>
			<div class="col-md-9 form-inline">
				<select name="wali[pekerjaan]" id="" class="form-control">
					<option value="">--</option>
					<option @if(isset($data['wali']['pekerjaan']) && $data['wali']['pekerjaan'] == "Tidak Bekerja") selected @endif value="Tidak Bekerja">Tidak Bekerja</option>
					<option @if(isset($data['wali']['pekerjaan']) && $data['wali']['pekerjaan'] == "Nelayan") selected @endif value="Nelayan">Nelayan</option>
					<option @if(isset($data['wali']['pekerjaan']) && $data['wali']['pekerjaan'] == "Petani") selected @endif value="Petani">Petani</option>
					<option @if(isset($data['wali']['pekerjaan']) && $data['wali']['pekerjaan'] == "Peternak") selected @endif value="Peternak">Peternak</option>
					<option @if(isset($data['wali']['pekerjaan']) && $data['wali']['pekerjaan'] == "PNS/TNI/Polri") selected @endif value="PNS/TNI/Polri">PNS/TNI/Polri</option>
					<option @if(isset($data['wali']['pekerjaan']) && $data['wali']['pekerjaan'] == "Karyawan Swasta") selected @endif value="Karyawan Swasta">Karyawan Swasta</option>
					<option @if(isset($data['wali']['pekerjaan']) && $data['wali']['pekerjaan'] == "Pedagang Kecil") selected @endif value="Pedagang Kecil">Pedagang Kecil</option>
					<option @if(isset($data['wali']['pekerjaan']) && $data['wali']['pekerjaan'] == "Wiraswasta") selected @endif value="Wiraswasta">Wiraswasta</option>
					<option @if(isset($data['wali']['pekerjaan']) && $data['wali']['pekerjaan'] == "Wirausaha") selected @endif value="Wirausaha">Wirausaha</option>
					<option @if(isset($data['wali']['pekerjaan']) && $data['wali']['pekerjaan'] == "Buruh") selected @endif value="Buruh">Buruh</option>
					<option @if(isset($data['wali']['pekerjaan']) && $data['wali']['pekerjaan'] == "Pensiunan") selected @endif value="Pensiunan">Pensiunan</option>
					<option @if(isset($data['wali']['pekerjaan']) && $data['wali']['pekerjaan'] == "Lainnya") selected @endif value="Lainnya">Lainnya</option>
					<option @if(isset($data['wali']['pekerjaan']) && $data['wali']['pekerjaan'] == "Meninggal dunia") selected @endif value="Meninggal dunia">Meninggal dunia</option>
				</select>
				<small class="form-text text-primary">Pekerjaan utama wali andunng peserta didik. pilih meninggal dunia apabila wali kandung peserta didik meninggal dunia.</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Penghasilan Bulanan</label>
			<div class="col-md-9">
				<select name="wali[penghasilan]" id="" class="form-control">
					<option value="">--</option>
					<option @if(isset($data['wali']['penghasilan']) && $data['wali']['penghasilan'] == "Kurang dari 500.000") selected @endif value="Kurang dari 500.000">Kurang dari 500.000</option>
					<option @if(isset($data['wali']['penghasilan']) && $data['wali']['penghasilan'] == "500.000 - 999.999") selected @endif value="500.000 - 999.999">500.000 - 999.999</option>
					<option @if(isset($data['wali']['penghasilan']) && $data['wali']['penghasilan'] == "1.000.000 - 1.999.999") selected @endif value="1.000.000 - 1.999.999">1.000.000 - 1.999.999</option>
					<option @if(isset($data['wali']['penghasilan']) && $data['wali']['penghasilan'] == "2.000.000 - 5.999.999") selected @endif value="2.000.000 - 5.999.999">2.000.000 - 5.999.999</option>
					<option @if(isset($data['wali']['penghasilan']) && $data['wali']['penghasilan'] == "5.000.000 - 20.999.999") selected @endif value="5.000.000 - 20.999.999">5.000.000 - 20.999.999</option>
					<option @if(isset($data['wali']['penghasilan']) && $data['wali']['penghasilan'] == "Lebih dari 20.000.000") selected @endif value="Lebih dari 20.000.000">Lebih dari 20.000.000</option>
				</select>
				<small class="form-text text-primary">Rentang penghasilan wali andung peserta didik. Kosongkan kolom ini apabila wali kandung peserta didik telah meninggal dunia.</small>
			</div>
		</div>
	</div>

	<div class="card-body">
		<h4>Data Kontak</h4>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Nomor Telpon Rumah</label>
			<div class="col-md-9">
				<input type="text" class="form-control" required name="telepon" value="{{$data['telepon'] ?? ""}}">
				<small class="form-text text-primary">Diisi nomor telepon peserta didik (milik pribadi, orangtua / wali) yang dapat di hubungi</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Nomor Handphone</label>
			<div class="col-md-9">
				<input type="text" class="form-control" required name="handphone" value="{{$data['handphone'] ?? ""}}">
				<small class="form-text text-primary">Diisi nomor Hanphone peserta didik (milik pribadi, orangtua / wali) yang dapat di hubungi</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Email</label>
			<div class="col-md-9">
				<input type="text" class="form-control" required name="email" value="{{$data['email'] ?? ""}}">
				<small class="form-text text-primary">Diisi Suret (surat elektronik) (milik pribadi, orangtua / wali) yang dapat di hubungi</small>
			</div>
		</div>
		<button class="btn btn-primary">Simpan data orangtua</button>
	</div>

</form>