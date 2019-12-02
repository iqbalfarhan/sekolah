<form action="{{ route('ppdb.edit.datadiri', $page) }}" method="POST">
	@csrf
	@method('PUT')
	<input type="hidden" name="id" value="{{$auth->id ?? ""}}">
	<div class="card-body">
		<h4>Data Periodik</h4>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">1. Tinggi Badan</label>
			<div class="col-md-9 form-inline">
				<div class="input-group mr-3">
					<input type="text" required name="tinggi_badan" class="form-control" value="{{$data['tinggi_badan'] ?? ""}}">
					<div class="input-group-append">
						<span class="input-group-text">Cm</span>
					</div>
				</div>
				<small class="form-text text-primary">Tinggi Badan peserta didik dalan satuan sentimeter</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">2. Berat Badan</label>
			<div class="col-md-9 form-inline">
				<div class="input-group mr-3">
					<input type="text" required name="berat_badan" class="form-control" value="{{$data['berat_badan'] ?? ""}}">
					<div class="input-group-append">
						<span class="input-group-text">Kg</span>
					</div>
				</div>
				<small class="form-text text-primary">Berat Badan peserta didik dalan satuan Kilogram</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">3. Jarak tempat tinggal ke sekolah</label>
			<div class="col-md-9">
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" @if(isset($data['jarak_sekolah']) && $data['jarak_sekolah'] == "Kurang dari 1 Km") checked @endif id="jklaki" required name="jarak_sekolah" class="custom-control-input" value="Kurang dari 1 Km">
					<label class="custom-control-label" for="jklaki">Kurang dari 1 Km</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" @if(isset($data['jarak_sekolah']) && $data['jarak_sekolah'] == "Lebih dari 1 Km") checked @endif id="jkperempuan" name="jarak_sekolah" class="custom-control-input" value="Lebih dari 1 Km">
					<label class="custom-control-label" for="jkperempuan">Lebih dari 1 Km</label>
				</div>
				<small class="form-text text-primary">Jarak Rumah peserta didik ke sekolah, kurang dari 1 Km atau Lebih dari 1 Km</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">4. Sebutkan (dalam Kilometer)</label>
			<div class="col-md-9 form-inline">
				<div class="input-group mr-3">
					<input type="text" required="" name="jauh_sekolah" class="form-control" value="{{$data['jauh_sekolah'] ?? ""}}">
					<div class="input-group-append">
						<span class="input-group-text">Km</span>
					</div>
				</div>
				<small class="form-text text-primary">Apabila jarak rumah peserta didik ke sekolah lebih dari 1 Km, isikan dengan angka jarak yang sebenarnya pada kolom ini dalam satuan kilometer. diisi dengan bilang bulat (bukan pecahan)</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">5. Waktu tempuh ke sekolah</label>
			<div class="col-md-9">
				<div class="row">
					<div class="col-sm-3">
						<div class="input-group">
							<input type="text" required name="waktu_tempuh[jam]" class="form-control" value="{{$data['waktu_tempuh']['jam'] ?? ""}}">
							<div class="input-group-append">
								<div class="input-group-text">jam</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<input type="text" required name="waktu_tempuh[menit]" class="form-control" value="{{$data['waktu_tempuh']['menit'] ?? ""}}">
							<div class="input-group-append">
								<div class="input-group-text">menit</div>
							</div>
						</div>
					</div>
				</div>
				<small class="form-text text-primary">Lama tempuh peserta didik ke sekolah. kolom kiri adalah jam dan kolom kanan diisi dengan menit. sebagai contoh apabila peserta didik memerlukan waktu 1 jam 15 menit untuk pergi ke sekolah, maka kolom kiri di isi dengan 1 dan kolom kana diisi dengan 15. apabila memerlukan waktu 25 menit maka kolom kiri diisi dengan 0 dan kolomm kanan diisi dengan 25</small>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">6. Jumlah Saudara Kandung</label>
			<div class="col-md-9 form-inline">
				<input type="text" required name="jumlah_saudara" class="form-control" value="{{$data['jumlah_saudara'] ?? ""}}">
				<small class="form-text text-primary">Jumlah saudara kandung peserta didik. tidak termasuk hitungan dengan peserta didik. atau bisa dihitung dengan jumlah kakak ditambah jumlah adik. apabila peserta didik anak tunggal maka kolom di isi dengan 0</small>
			</div>
		</div>
	</div>

	<div class="card-body">
		<h4>Prestasi</h4>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Jenis</th>
					<th>Tingkat</th>
					<th>Nama Prestasi</th>
					<th>Tahun</th>
					<th>Penyelenggara</th>
				</thead>
				<tbody>
					@for($i = 0; $i <3; $i++)
					<tr>
						<td>{{$i+1}}</td>
						<td class="p-0">
							<select name="prestasi[{{$i}}][jenis]" id="" class="form-control border-0 m-0">
								<option value="">--</option>
								<option value="Sains">Sains</option>
								<option value="Seni">Seni</option>
								<option value="Olahraga">Olahraga</option>
								<option value="Lainnya">Lainnya</option>
							</select>
						</td>
						<td class="p-0">
							<select name="prestasi[{{$i}}][tingkat]" id="" class="form-control border-0 m-0">
								<option value="">--</option>
								<option value="Sekolah">Sekolah</option>
								<option value="Kecamatan">Kecamatan</option>
								<option value="Kabupaten">Kabupaten</option>
								<option value="Provinsi">Provinsi</option>
								<option value="Nasional">Nasional</option>
								<option value="Internasional">Internasional</option>
							</select>
						</td>
						<td class="p-0">
							<input type="text" name="prestasi[{{$i}}][nama]" class="form-control border-0 m-0" placeholder="--">
						</td>
						<td class="p-0">
							<input type="text" name="prestasi[{{$i}}][tahun]" class="form-control border-0 m-0" placeholder="--">
						</td>
						<td class="p-0">
							<input type="text" name="prestasi[{{$i}}][penyelenggara]" class="form-control border-0 m-0" placeholder="--">
						</td>
					</tr>
					@endfor
				</tbody>
			</table>
		</div>
		<ul class="list-unstyled small text-primary">
			<li><b>Jenis prestasi :</b> Jenis prestasi yang pernah diraih oleh peserta didik</li>
			<li><b>Tingkat prestasi :</b> Tingkat penyelenggaraan prestasi yang pernah diraih oleh peserta didik</li>
			<li><b>Nama prestasi :</b> Nama pencapaian prestasi yang didapatkan peserta didik. sesuai an dengan piagam yang di dapat</li>
			<li><b>Tahun prestasi :</b> tahun kegiatan acara prestasi yang pernah diraih oleh peserta didik</li>
			<li><b>Penyelenggara :</b> diisi nama penyelenggara kegiatan acara prestasi yang pernah diraih oleh peserta didik. sesuaikan dengan piagam yang di dapat</li>
			<li><b>Peringkat :</b> Jenis prestasi yang pernah diraih oleh peserta didik</li>
		</ul>
	</div>

	<div class="card-body">
		<h4>Beasiswa</h4>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Jenis</th>
					<th>Keterangan</th>
					<th>Tahun Mulai</th>
					<th>Tahun selesai</th>
				</thead>
				<tbody>
					@for($i = 0; $i <3; $i++)
					<tr>
						<td>{{$i+1}}</td>
						<td class="p-0">
							<select name="beasiswa[{{$i}}][jenis]" id="" class="form-control border-0 m-0">
								<option value="">--</option>
								<option value="Anak Berprestasi">Anak Berprestasi</option>
								<option value="Anak Miskin">Anak Miskin</option>
								<option value="Pendidikan">Pendidikan</option>
								<option value="Unggulan">Unggulan</option>
								<option value="Lainnya">Lainnya</option>
							</select>
						</td>
						<td class="p-0">
							<input type="text" name="beasiswa[{{$i}}][keterangan]" class="form-control border-0 m-0" placeholder="--">
						</td>
						<td class="p-0">
							<input type="text" name="beasiswa[{{$i}}][tahun_mulai]" class="form-control border-0 m-0" placeholder="--">
						</td>
						<td class="p-0">
							<input type="text" name="beasiswa[{{$i}}][tahun_selesai]" class="form-control border-0 m-0" placeholder="--">
						</td>
					</tr>
					@endfor
				</tbody>
			</table>
		</div>
		<ul class="list-unstyled small text-primary">
			<li><b>Jenis beasiswa :</b> Jenis beasiswa yang pernah diterima peserta didik</li>
			<li><b>Keterangan :</b> Keterangan beasiswa dapat diisi dengan nama beasiswa, misalkan beasiswa anak berprestasi tahun 2017 atau keterangan lain yang relevan</li>
			<li><b>Tahun Mulai :</b> Tahun peserta didik menerima beasiswa</li>
			<li><b>Tahun Selesai :</b> Aapabila beasiswa hanya di terima sekali maka, diisi sama dengan tahun mulai</li>
		</ul>
		<button class="btn btn-primary">Simpan data rincian</button>
	</div>

</form>