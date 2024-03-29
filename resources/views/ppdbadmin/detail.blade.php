@extends('layouts.nova')

@section('content')
<div class="card">
	<div class="card-body">
		<h2>{{$data->nama_lengkap ?? "Not Found"}}</h2>

		<div class="row">
			<div class="col-md-6">
				<div class="text-center">
					<img src="{{ Storage::url($data->photo) }}" alt="" class="m-3 text-center" style="width: 200px">
				</div>

				<table class="table table-sm mb-5">
					<tr class="table-primary">
						<th colspan="3">Data Umum</th>
					</tr>
					<tr>
						<th>NIS</th>
						<th>:</th>
						<td>{{$data->nis ?? ""}}</td>
					</tr>
					<tr>
						<th>Nama Lengkap</th>
						<th>:</th>
						<td>{{$data->nama_lengkap ?? ""}}</td>
					</tr>
					<tr>
						<th>Jenis Kelamin</th>
						<th>:</th>
						<td>
							@if (isset($data->jk) && $data->jk == "l")
							Laki-laki
							@else
							Perempuan
							@endif
						</td>
					</tr>
				</table>

				<table class="table table-sm mb-5">
					<tr class="table-primary">
						<th colspan="3">Data Pribadi</th>
					</tr>
					<tr>
						<th>NISN</th>
						<th>:</th>
						<td>{{$pribadi->nisn ?? ""}}</td>
					</tr>
					<tr>
						<th>NIK</th>
						<th>:</th>
						<td>{{$pribadi->nik ?? ""}}</td>
					</tr>
					<tr>
						<th>Kelahiran</th>
						<th>:</th>
						<td>
							@isset ($pribadi->tempat_lahir)
							{{$pribadi->tempat_lahir ?? ""}}, {{date('d F Y', strtotime($pribadi->tanggal_lahir ?? ""))}}
							@endisset
						</td>
					</tr>
					<tr>
						<th>Nomor Registrasi Akta Kelahiran</th>
						<th>:</th>
						<td>{{$pribadi->nomor_akta ?? ""}}</td>
					</tr>
					<tr>
						<th>Agama</th>
						<th>:</th>
						<td>{{$pribadi->agama ?? ""}}</td>
					</tr>
					<tr>
						<th>Kewarganegaraan</th>
						<th>:</th>
						<td>{{$pribadi->kewarganegaraan ?? ""}}</td>
					</tr>
					<tr>
						<th>Berkebutuhan Khusus</th>
						<th>:</th>
						<td>
							@if ($pribadi->kebutuhan_khusus != "null")
							@isset ($pribadi->kebutuhan_khusus)
							@foreach ($pribadi->kebutuhan_khusus as $kh => $valkh)
							{{$kh}}, 
							@endforeach
							@endisset
							@endif
						</td>
					</tr>
					<tr>
						<th>Alamat</th>
						<th>:</th>
						<td>
							@isset ($pribadi->alamat)
							{{$pribadi->alamat->jalan ?? ""}}
							RT.{{$pribadi->alamat->rt ?? ""}}.
							RW.{{$pribadi->alamat->rw ?? ""}}.
							Dusun.{{$pribadi->alamat->dusun ?? ""}}.
							Kel.{{$pribadi->alamat->kelurahan ?? ""}}.
							Kec.{{$pribadi->alamat->kecamatan ?? ""}}.
							KodePOS {{$pribadi->alamat->kodepos ?? ""}}.<br>
							Lintang .{{$pribadi->alamat->lintang ?? ""}}.
							Bujur .{{$pribadi->alamat->bujur ?? ""}}.
							@endisset
						</td>
					</tr>
					<tr>
						<th>Tempat Tinggal</th>
						<th>:</th>
						<td>{{$pribadi->tempat_tinggal ?? ""}}</td>
					</tr>
					<tr>
						<th>Moda Transportasi</th>
						<th>:</th>
						<td>{{$pribadi->moda_transportasi ?? ""}}</td>
					</tr>
					<tr>
						<th>Nomor KKS</th>
						<th>:</th>
						<td>{{$pribadi->nomor_kks ?? ""}}</td>
					</tr>
					<tr>
						<th>Anak Ke</th>
						<th>:</th>
						<td>{{$pribadi->anak_keberapa ?? ""}}</td>
					</tr>
					<tr>
						<th>Penerima KPS/PKH</th>
						<th>:</th>
						<td>{{$pribadi->penerima_kps ?? ""}}</td>
					</tr>
					<tr>
						<th>Nomor KPS/PKH</th>
						<th>:</th>
						<td>{{$pribadi->no_kps ?? ""}}</td>
					</tr>
					<tr>
						<th>Usulan KIP Sekolah</th>
						<th>:</th>
						<td>{{$pribadi->usulan_kip_sekolah ?? ""}}</td>
					</tr>
					<tr>
						<th>Penerima KIP</th>
						<th>:</th>
						<td>{{$pribadi->penerima_kip ?? ""}}</td>
					</tr>
					<tr>
						<th>Nomor KIP</th>
						<th>:</th>
						<td>{{$pribadi->nomor_kip ?? ""}}</td>
					</tr>
					<tr>
						<th>Nama KIP</th>
						<th>:</th>
						<td>{{$pribadi->nama_kip ?? ""}}</td>
					</tr>
					<tr>
						<th>Terima Fisik KIP</th>
						<th>:</th>
						<td>{{$pribadi->terima_fisik_kip ?? ""}}</td>
					</tr>
					<tr>
						<th>Alasan Layak KIP</th>
						<th>:</th>
						<td>{{$pribadi->alasan_layak_pip ?? ""}}</td>
					</tr>
					<tr>
						<th>Bank</th>
						<th>:</th>
						<td>{{$pribadi->bank ?? ""}}</td>
					</tr>
					<tr>
						<th>Nomor Rekening</th>
						<th>:</th>
						<td>{{$pribadi->no_rekening ?? ""}}</td>
					</tr>
					<tr>
						<th>Nama Rekening</th>
						<th>:</th>
						<td>{{$pribadi->nama_rekening ?? ""}}</td>
					</tr>
				</table>

				<table class="table table-sm mb-5">
					<tr class="table-primary">
						<th colspan="3">Data Pendaftaran</th>
					</tr>
					<tr>
						<th>Kompetensi keahlian</th>
						<th>:</th>
						<td>{{$data->jurusan->jurusan ?? ""}}</td>
					</tr>

					<tr>
						<th>Jenis Pendaftaran</th>
						<th>:</th>
						<td>{{$registrasi->jenis_pendaftaran ?? ""}}</td>
					</tr>
					<tr>
						<th>NIS</th>
						<th>:</th>
						<td>{{$registrasi->nis ?? ""}}</td>
					</tr>
					<tr>
						<th>Asal Sekolah</th>
						<th>:</th>
						<td>{{$registrasi->asal_sekolah ?? ""}}</td>
					</tr>
					<tr>
						<th>Nomor Peserta Ujian</th>
						<th>:</th>
						<td>{{$registrasi->nomor_peserta_ujian ?? ""}}</td>
					</tr>
					<tr>
						<th>Nomor Ijazah</th>
						<th>:</th>
						<td>{{$registrasi->no_ijazah ?? ""}}</td>
					</tr>
					<tr>
						<th>Nomor SKHU</th>
						<th>:</th>
						<td>{{$registrasi->no_skhu ?? ""}}</td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<table class="table table-sm mb-5">
					<tr class="table-primary">
						<th colspan="3">Data Orangtuan - Ayah</th>
					</tr>
					<tr>
						<th style="width: 250px !important">Nama Lengkap</th>
						<th width="3px">:</th>
						<td>{{$orangtua->ayah->nama_lengkap ?? ""}}</td>
					</tr>
					<tr>
						<th>NIK</th>
						<th>:</th>
						<td>{{$orangtua->ayah->nik ?? ""}}</td>
					</tr>
					<tr>
						<th>Tahun Lahir</th>
						<th>:</th>
						<td>{{$orangtua->ayah->tahun_lahir ?? ""}}</td>
					</tr>
					<tr>
						<th>Pendidikan</th>
						<th>:</th>
						<td>{{$orangtua->ayah->pendidikan ?? ""}}</td>
					</tr>
					<tr>
						<th>Pekerjaan</th>
						<th>:</th>
						<td>{{$orangtua->ayah->pekerjaan ?? ""}}</td>
					</tr>
					<tr>
						<th>Penghasilan</th>
						<th>:</th>
						<td>{{$orangtua->ayah->penghasilan ?? ""}}</td>
					</tr>
					<tr>
						<th>Berkebutuhan khusus</th>
						<th>:</th>
						<td>
							@isset ($orangtua->ayah->kebutuhan_khusus)
							@foreach ($orangtua->ayah->kebutuhan_khusus as $akh => $avalkh)
							{{$akh}}, 
							@endforeach
							@endisset
						</td>
					</tr>
				</table>
				<table class="table table-sm mb-5">
					<tr class="table-primary">
						<th colspan="3">Data Orangtua - Ibu</th>
					</tr>
					<tr>
						<th>Nama Lengkap</th>
						<th>:</th>
						<td>{{$orangtua->ibu->nama_lengkap ?? ""}}</td>
					</tr>
					<tr>
						<th>NIK</th>
						<th>:</th>
						<td>{{$orangtua->ibu->nik ?? ""}}</td>
					</tr>
					<tr>
						<th>Tahun Lahir</th>
						<th>:</th>
						<td>{{$orangtua->ibu->tahun_lahir ?? ""}}</td>
					</tr>
					<tr>
						<th>Pendidikan</th>
						<th>:</th>
						<td>{{$orangtua->ibu->pendidikan ?? ""}}</td>
					</tr>
					<tr>
						<th>Pekerjaan</th>
						<th>:</th>
						<td>{{$orangtua->ibu->pekerjaan ?? ""}}</td>
					</tr>
					<tr>
						<th>Penghasilan</th>
						<th>:</th>
						<td>{{$orangtua->ibu->penghasilan ?? ""}}</td>
					</tr>
					<tr>
						<th>Berkebutuhan khusus</th>
						<th>:</th>
						<td>
							@isset ($orangtua->ibu->kebutuhan_khusus)
							@foreach ($orangtua->ibu->kebutuhan_khusus as $ikh => $ivalkh)
							{{$ikh}}, 
							@endforeach
							@endisset
						</td>
					</tr>
				</table>

				@isset ($orangtua->wali->nama_lengkap)

				<table class="table table-sm mb-5">
					<tr class="table-primary">
						<th colspan="3">Data Wali</th>
					</tr>
					<tr>
						<th>Nama Lengkap</th>
						<th>:</th>
						<td>{{$orangtua->wali->nama_lengkap ?? ""}}</td>
					</tr>
					<tr>
						<th>NIK</th>
						<th>:</th>
						<td>{{$orangtua->wali->nik ?? ""}}</td>
					</tr>
					<tr>
						<th>Tahun Lahir</th>
						<th>:</th>
						<td>{{$orangtua->wali->tahun_lahir ?? ""}}</td>
					</tr>
					<tr>
						<th>Pendidikan</th>
						<th>:</th>
						<td>{{$orangtua->wali->pendidikan ?? ""}}</td>
					</tr>
					<tr>
						<th>Pekerjaan</th>
						<th>:</th>
						<td>{{$orangtua->wali->pekerjaan ?? ""}}</td>
					</tr>
					<tr>
						<th>Penghasilan</th>
						<th>:</th>
						<td>{{$orangtua->wali->penghasilan ?? ""}}</td>
					</tr>
				</table>

				@endisset

				<table class="table table-sm mb-5">
					<tr class="table-primary">
						<th colspan="3">Kontak Orangtua / Wali</th>
					</tr>
					<tr>
						<th>Nomor Telepon</th>
						<th>:</th>
						<td>{{$orangtua->telepon ?? ""}}</td>
					</tr>
					<tr>
						<th>hanphone</th>
						<th>:</th>
						<td>{{$orangtua->handphone ?? ""}}</td>
					</tr>
					<tr>
						<th>Email</th>
						<th>:</th>
						<td>{{$orangtua->email ?? ""}}</td>
					</tr>
				</table>

				<table class="table table-sm mb-5">
					<tr class="table-primary">
						<th colspan="3">Data Rincian - Periodik</th>
					</tr>
					<tr>
						<th>Tinggi Badan</th>
						<th>:</th>
						<td>{{$rincian->tinggi_badan ?? ""}} cm</td>
					</tr>
					<tr>
						<th>Berat Badan</th>
						<th>:</th>
						<td>{{$rincian->berat_badan ?? ""}} Kg</td>
					</tr>
					<tr>
						<th>Jarak Tempuh ke Sekolah</th>
						<th>:</th>
						<td>{{$rincian->jarak_sekolah ?? ""}}</td>
					</tr>
					<tr>
						<th>Waktu Tempuh ke Sekolah</th>
						<th>:</th>
						<td>
							@isset ($rincian->waktu_tempuh)
							{{$rincian->waktu_tempuh->jam ?? ""}} jam {{$rincian->waktu_tempuh->menit ?? ""}} menit
							@endisset
						</td>
					</tr>
					<tr>
						<th>Jumlah Saudara</th>
						<th>:</th>
						<td>{{$rincian->jumlah_saudara ?? ""}}</td>
					</tr>
				</table>


				<table class="table table-sm mb-5">
					<tr class="table-primary">
						<th>Data Rincian - Prestasi dan Beasiswa</th>
					</tr>
					<tr>
						<td>
							<b>Prestasi</b>
							<ol>
								@isset ($rincian->prestasi)
								@foreach ($rincian->prestasi as $prestasi)
								@if ($prestasi->nama != "")
								<li>{{$prestasi->nama}} {{$prestasi->jenis}} tahun {{$prestasi->tahun}} diselenggarakan oleh {{$prestasi->penyelenggara}}</li>
								@endif
								@endforeach
								@endisset
							</ol>
						</td>
					</tr>
					<tr>
						<td>
							<b>Beasiswa</b>
							<ol>
								@isset ($rincian->beasiswa)
								@foreach ($rincian->beasiswa as $beasiswa)
								@if ($beasiswa->jenis!= "")
								<li>{{$beasiswa->keterangan}} jenis {{$beasiswa->jenis}} Mulai Tahun {{$beasiswa->tahun_mulai}} sampai {{$beasiswa->tahun_selesai}}</li>
								@endif
								@endforeach
								@endisset
							</ol>
						</td>
					</tr>
					<tr>
						<td>
							<b>Konseling</b>
							<ol>
								@isset ($rincian->konseling)
								@foreach ($rincian->konseling as $konseling)
								@if ($konseling->jenis!= "")
								<li><b>Melakukan {{$konseling->jenis}}.</b> {{$konseling->keterangan}}. kemudian di konseling pada {{$konseling->tanggal}} dengan tindakan {{$konseling->tindakan}}</li>
								@endif
								@endforeach
								@endisset
							</ol>
						</td>
					</tr>
					<tr>
						<td>
							<b>Kesehatan</b>
							<ol>
								@isset ($rincian->kesehatan)
								@foreach ($rincian->kesehatan as $kesehatan)
								@if ($kesehatan->nama_penyakit!= "")
								<li>{{$kesehatan->nama_penyakit}}. diderita selama {{$kesehatan->lama}}. {{$kesehatan->keterangan}}</li>
								@endif
								@endforeach
								@endisset
							</ol>
						</td>
					</tr>
				</table>

				<table class="table table-sm mb-5">
					<tr class="table-primary">
						<th colspan="2">Berkas Peserta-didik</th>
					</tr>
					@foreach ($berkass as $berkas)
						<tr>
							<td>{{str_replace('_', ' ', $berkas->nama_berkas)}}</td>
							<td class="p-2">
								<a href="{{Storage::url($berkas->file_name)}}" class="btn btn-primary btn-sm"><i class="nova-file"></i></a>
							</td>
						</tr>
					@endforeach
					
				</table>
			</div>
		</div>
	</div>
</div>
@endsection