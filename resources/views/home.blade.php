@extends('layouts.nova')

@section('content')

<div class="row mb-2">
	<div class="col-md-3">
		<a href="{{ route('student.index') }}" class="card flex-row align-items-center p-3 p-md-4 mb-3 text-primary">
			<div class="icon icon-lg bg-primary rounded-circle mr-3">
				<i class="icon-people icon-text d-inline-block text-white"></i>
			</div>
			<div>
				<h4 class="lh-1 mb-1">{{App\Student::where('status', 'aktif')->count()}}</h4>
				<h6 class="mb-0">Siswa aktif</h6>
			</div>
			<span class="d-flex text-primary ml-auto"><i class="nova-help-alt icon-text"></i></span>
		</a>
	</div>
	<div class="col-md-3">
		<a href="{{ route('teacher.index') }}" class="card flex-row align-items-center p-3 p-md-4 mb-3 text-danger">
			<div class="icon icon-lg bg-danger rounded-circle mr-3">
				<i class="icon-people icon-text d-inline-block text-white"></i>
			</div>
			<div>
				<h4 class="lh-1 mb-1">{{App\Teacher::all()->count()}}</h4>
				<h6 class="mb-0">Data Guru</h6>
			</div>
			<span class="d-flex text-danger ml-auto"><i class="nova-help-alt icon-text"></i></span>
		</a>
	</div>
	<div class="col-md-3">
		<a href="{{ route('kelas.index') }}" class="card flex-row align-items-center p-3 p-md-4 mb-3 text-warning">
			<div class="icon icon-lg bg-warning rounded-circle mr-3">
				<i class="icon-people icon-text d-inline-block text-white"></i>
			</div>
			<div>
				<h4 class="lh-1 mb-1">{{App\Kelas::all()->count()}}</h4>
				<h6 class="mb-0">Data Kelas</h6>
			</div>
			<span class="d-flex text-warning ml-auto"><i class="nova-help-alt icon-text"></i></span>
		</a>
	</div>
	<div class="col-md-3">
		<a href="{{ route('jurusan.index') }}" class="card flex-row align-items-center p-3 p-md-4 mb-3 text-success">
			<div class="icon icon-lg bg-success rounded-circle mr-3">
				<i class="icon-people icon-text d-inline-block text-white"></i>
			</div>
			<div>
				<h4 class="lh-1 mb-1">{{App\Jurusan::all()->count()}}</h4>
				<h6 class="mb-0">Keahlian / Jurusan</h6>
			</div>
			<span class="d-flex text-success ml-auto"><i class="nova-help-alt icon-text"></i></span>
		</a>
	</div>
</div>
<div class="row">
	<div class="col-md-9 mb-4">
		<div class="card" style="background: linear-gradient(45deg, #8360c3, #2ebf91)">
			<div class="card-body">
				<div class="row col-md-12">
					<a href="#" class="text-white h5">PPDB Online</a>
				</div>
				<div class="row">
					<div class="col-md-4 text-center">
						<a href="{{ route('ppdbadmin.create') }}" class="text-white">
							<i class="icon-settings h1"></i>
							<h5>Pengaturan PPDB</h5>
							<p class="small">Atur tanggal mulai, tanggal selesai dan keterangan PPDB</p>
							<i class="nova-arrow-circle-right h3"></i>
						</a>
					</div>
					<div class="col-md-4 text-center">
						<a href="{{ route('ppdbadmin.akun_list') }}" class="text-white">
							<i class="nova-user h1"></i>
							<h5>Akun Pendaftar</h5>
							<p class="small">Atur akun pendaftar, dan lihat detail berkas pendaftaran mereka</p>
							<i class="nova-arrow-circle-right h3"></i>
						</a>
					</div>
					<div class="col-md-4 text-center">
						<a href="{{ route('pengumuman.create', ['ppdb' => 'true']) }}" class="text-white">
							<i class="nova-announcement h1"></i>
							<h5>Pengummuman</h5>
							<p class="small">Posting pemberitahuan seputar tentang PPDB kepada pendaftar</p>
							<i class="nova-arrow-circle-right h3"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-3 mb-4">
		<div class="card" style="border: 5px !important">
			@if (App\Sekolah::count() == 0)
				<div class="card-body text-center">
					<i class="nova-alert text-warning h1"></i>
					<p>Harap segera melakukan konfigurasi profile sekolah</p>
					<a href="{{ route('sekolah.edit') }}" class="btn btn-primary btn-block">Profil sekolah</a>
				</div>
			@endif
		</div>
	</div>
	
</div>


<!-- Modal -->


@endsection