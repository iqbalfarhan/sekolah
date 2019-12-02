<!DOCTYPE html>
<!-- saved from url=(0077) -->
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Title -->
	<title>{{ config('APP_NAME', 'Sistem Sekolah') }}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Required Meta Tags Always Come First -->

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('nova/logo-mini.png') }}" type="img/png">

	<!-- Fonts -->
	<link rel="stylesheet" href="{{ asset('nova/css') }}">
	<link rel="stylesheet" href="{{ asset('nova/nova-icon/nova-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('font/sli/css/simple-line-icons.css') }}">

	<!-- CSS Nova Template -->
	<link href="{{ asset('ppdb_assets/lib/animate/animate.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('nova/theme.css') }}">
	<link rel="stylesheet" href="{{ asset('nova/dokumentasi.css') }}">

	<script src="{{ asset('nova/jquery.min.js') }}"></script>
	<script src="{{ asset('nova/jquery.mousewheel.min.js') }}"></script>

</head>

<body>

	<nav class="navbar navbar-expand-md bg-primary navbar-dark shadow-sm font-weight-bold" id="top">
		<div class="container">
			<a class="navbar-brand" href="{{ route('dokumentasi') }}">
				<i class="icon-layers bg-white p-2 text-primary rounded-circle small"></i> Dokumentasi
			</a>
			<button class="navbar-toggler border-0 p-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<!-- Right Side Of Navbar -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a href="{{ route('home') }}" class="nav-link"><i class="nova-arrow-circle-left mr-2"></i>Kembali</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<main class="container mt-5">
		<a href="#top" class="sticky-top btn btn-primary btn-sm mb-3 d-md-none" onclick="$('#sidebarmenu').toggleClass('d-none d-md-block')"><i class="nova-menu"></i> Menu</a>
		<div class="row">
			<div class="col-md-3 d-none d-md-block" id="sidebarmenu">
				<div class="input-group">
					<span class="input-group-append">
						<i class="nova-search text-muted"></i>
					</span>
					<input type="text" class="form-control shadow-sm" id="formcari" placeholder="Search">
				</div>
				<nav class="menu sticky-top py-4 mt-4" id="menu_parent" style="overflow-y: scroll; max-height: 100vh;">
					<a href="#memulai" class="js-scroll-trigger">
						<h5><b class="font-weight-bold mr-2">#</b>Memulai</h5>
					</a>
					<ul class="list-unstyled ml-4">
						<li><a href="#perkenalan" class="js-scroll-trigger">Perkenalan</a></li>
						<li><a href="#pemasangan" class="js-scroll-trigger">Pemasangan</a></li>
						<li><a href="#fungsi_umum" class="js-scroll-trigger">Fungsi umum</a></li>
					</ul>

					<a href="#konfigurasi" class="js-scroll-trigger">
						<h5><b class="font-weight-bold mr-2">#</b>Konfigurasi</h5>
					</a>
					<ul class="list-unstyled ml-4">
						<li><a href="#profil_sekolah" class="js-scroll-trigger">Profile sekolah</a></li>
						<li><a href="#jurusan" class="js-scroll-trigger">Data jurusan</a></li>
						<li><a href="#kelas" class="js-scroll-trigger">Data kelas</a></li>
					</ul>

					<a href="#guru" class="js-scroll-trigger">
						<h5><b class="font-weight-bold mr-2">#</b>Data Guru</h5>
					</a>
					<ul class="list-unstyled ml-4">
						<li><a href="#tambah_guru" class="js-scroll-trigger">Menambah data guru</a></li>
						<li><a href="#impor_guru" class="js-scroll-trigger">Import data guru</a></li>
						<li><a href="#edit_guru" class="js-scroll-trigger">Merubah data guru</a></li>
						<li><a href="#hapus_guru" class="js-scroll-trigger">Menghapus data guru</a></li>
					</ul>

					<a href="#siswa" class="js-scroll-trigger">
						<h5><b class="font-weight-bold mr-2">#</b>Data Siswa</h5>
					</a>
					<ul class="list-unstyled ml-4">
						<li><a href="#tambah_siswa" class="js-scroll-trigger">Menambah data siswa</a></li>
						<li><a href="#impor_siswa" class="js-scroll-trigger">Import data siswa</a></li>
						<li><a href="#pindah_siswa" class="js-scroll-trigger">Pindah kelas siswa</a></li>
						<li><a href="#edit_siswa" class="js-scroll-trigger">Merubah data siswa</a></li>
						<li><a href="#hapus_siswa" class="js-scroll-trigger">Menghapus data siswa</a></li>
					</ul>

					<a href="#ppdb" class="js-scroll-trigger">
						<h5><b class="font-weight-bold mr-2">#</b>PPDB Online</h5>
					</a>
					<ul class="list-unstyled ml-4">
						<li><a href="#mulai_ppdb" class="js-scroll-trigger">Memulai PPDB Online</a></li>
						<li><a href="#akun_ppdb" class="js-scroll-trigger">Akun pendaftar</a></li>
						<li><a href="#status_ppdb" class="js-scroll-trigger">Status Pendaftaran</a></li>
						<li><a href="#migrasi_ppdb" class="js-scroll-trigger">Migrasi ke data siswa</a></li>
						<li><a href="#pengumuman_ppdb" class="js-scroll-trigger">Pengumuman PPDB</a></li>
					</ul>

					<a href="#lainnya" class="js-scroll-trigger">
						<h5><b class="font-weight-bold mr-2">#</b>Lainnya</h5>
					</a>
					<ul class="list-unstyled ml-4">
						<li><a href="#pengaturan_login" class="js-scroll-trigger">Pengaturan Login</a></li>
					</ul>

				</nav>
			</div>
			<div class="col-md-9" data-spy="scroll" data-target="#menu_parent" data-offset="0">
				<section id="memulai">
					<h2><b class="mr-2">#</b>Memulai</h2>
					<hr>
					<div class="card shadow p-md-4">
						<div class="card-body" id="perkenalan">
							<h4>Perkenalan</h4>
							<p>Program ini digunakan untuk mengolah data siswa, guru, jurusan keahlian, kelas dan sistem PPDB Online. Program ini dibuat dengan: </p>
							<ul>
								<li>Bahasa pemrogramman PHP versi 7.2.19</li>
								<li>Framework Laravel versi 6.2</li>
								<li>Bootstrap 4.3 CSS Framework</li>
								<li>Framework Javascript Jquery + pluginnya dan</li>
								<li>Database MySQL versi 5.7.24.0.</li>
							</ul>
						</div>
						<div class="card-body" id="pemasangan">
							<h4>Pemasangan</h4>
							<p>
							Aplikasi ini bersifat Online (dapat diakses dari internet) karena terdapat Fitur PPDB Online, Sehingga untuk memasang aplikasi ini anda memrlukan hosting dan domain dengan minimal hosting 1 Gb.</p>
							<p>Upload semua file aplikasi ke hosting dan lakukan beberapa konfigurasi pada file .env. ubah value <code>APP_URL</code> menjadi domain aplikasi sekarang, value <code>ASSET_URL</code> menjadi domain aplikasi + /public, ubah pengaturan <code>DB_DATABASE</code>, <code>DB_USERNAME</code> dan <code>DB_PASSWORD</code> sesuai dengan konfigurasi dataase hosting anda.
								<div class="p-3 text-monospace bg-dark text-white small overflow-auto">
									<div class="text-truncate">
										APP_URL=http://domain-aplikasi.com<br>
										ASSET_URL=http://domain-aplikasi.com/public<br><br>
										DB_DATABASE=localhost<br>
										DB_USERNAME=username_database<br>
										DB_PASSWORD=password_database<br>
									</div>
								</div>
							</p>
						</div>
						<div class="card-body" id="fungsi_umum">
							<h4>Penggunaan fungsi umum</h4>
							<p>secara umum tampilan aplikasi ini memiliki list data denga tombol tambah data di sebelah kiri atas dan untuk merubah dan menghapu data menggunakan dua tombol berwarna hijau dan merah <span class="badge badge-success"><i class="icon-pencil"></i></span>, <span class="badge badge-danger"><i class="icon-trash"></i></span> pada setiap kanan list data</p>

						</div>
					</div>
				</section>

				<section id="konfigurasi">
					<h2><b class="mr-2">#</b>Konfigurasi</h2>
					<hr>
					<div class="card shadow p-md-4">
						<div class="card-body" id="profil_sekolah">
							<h4>Profile Sekolah</h4>
							<p>Profile sekolah digunakan untuk menyimpan informasi sekolah yang akan digunakan aplikasi untuk ditampilkan di beberapa halaman tertentu. Seperti pada halaman PPDB Online, profile sekolah untuk menunjukkan bahwa PPDB Online yang digunakan adalah milik sekolah.</p>
							<p>Konfigurasi ini dapat dilakukan pada menu profile sekolah yang terletak di halaman aplikasi. atau anda bisa klik pada menu ini
								<a href="{{ route('sekolah.edit') }}" class="badge badge-primary">Profile sekolah</a>.
							</p>
							<p>Lengkapi isian yang disediakan pada form tersebut dengan data yang benar kemudian tekan simpan. Setelah itu, upload logo sekolah dengan ukuran file tidak lebih dari 1Mb. Maka, profile sekolah akan tersimpan dan konfigurasi ini telah selesai.</p>
						</div>

						<div class="card-body" id="jurusan">
							<h4>Data Jurusan</h4>
							<p>
								Pengisian data jurusan dapat dilakukan pada menu data jurusan. Untuk menambahkan jurusan baru, anda hanya perlu menekan menu <span class="badge badge-primary">Tambah baru</span> pada pojok kiri atas data jurusan. Pada halaman tersebut anda diminta untuk melengkapi data jurusan baru yaitu:
							</p>
							<ul>
								<li><b>Kode Jurusan :</b> Field ini bersifat unique atau tidak boleh sama dengan kode jurusan yang lainnya. anda bisa mengisi field tersebut dengan J001 atau kode yang sudah ditetapkan sekolah.</li>
								<li><b>Nama Jurusan :</b> Isi dengan nama jurusan yang sebenarnya. sebagai contoh isi dengan nama jurusan <b><q>Rekayasa Perangkat Lunak</q></b></li>
								<li><b>Inisial :</b> Diisi dengan inisial jurusan atau dengan singkatan dari nama jurusan. sebagai contoh apabila nama jurusan Rekayasa Perangkat Lunak maka, anda dapat mengisi dengan <b><q>RPL</q></b></li>
								<li><b>Deskripsi :</b> Diisi dengan Deskripsi atau keterangan jurusan. apabila tidak ada, anda dapat melewati field ini (dikosongkan)</li>
							</ul>
							<p>Setelah melengkapi field di atas anda dapat menekan tombol simpan pada bagian bawah untuk menyimpan data jurusan baru tersebut.</p>
							<p>
								Untuk melakukan perubahan data jurusan anda dapat menekan tombol dengan icon pensil berwarna hijau <span class="badge badge-success"><i class="icon-pencil"></i></span> pada sebelah kanan list jurusan dan lakukan hal yang sama pada proses tambah data jurusan. dan untuk menghapus data jurusan anda dapat menekan menu dengan icon tempat sampah berwarna merah <span class="badge badge-danger"><i class="icon-trash"></i></span> pada sebelah tombol edit. setelah anda menghapus suatu data jurusan, anda tidak dapat mengembalikannya lagi.
							</p>
						</div>

						<div class="card-body" id="kelas">
							<h4>Data Kelas</h4>
							<p>
								data kelas dapat diisi pada menu kelas pada halaman aplikasi. Untuk menambah kelas baru, anda hanya perlu menekan menu <span class="badge badge-primary">Tambah baru</span> pada pojok kiri atas data kelas. Pada halaman tersebut anda diminta untuk melengkapi data kelas baru yaitu:
							</p>
							<ul>
								<li><b>Kelas (angka) :</b> Diisi dengan tingkat kelas. misalkan pada Sekolah Menengah Atas terdapat 3 tingkat kelas yaitu kelas 10, 11 dan 12. maka isi dengan tingkat kelas tersebut. apabila pada sekolah menggunakan tingkat kelas 1, 2 dan 3 maka isi dengan angka tersebut.</li>
								<li><b>Pilih Jurusan :</b> pilih jurusan untuk kelas tersebut. data jurusan yang telah di inputkan sebelumnya akan ditampilkan pada field ini. apabila kelas tidak memiliki jurusan, anda bisa melewati field tersebut (dikosongkan)</li>
								<li><b>Kelompok :</b> Diisi dengan kelompok kelas. misalkan di sekolah terdapat kelas 10 RPL A, maka isi fiel ini dengan hutuf <b><q>A</q></b>. apabila kelas dengan nama 10 RPL 1, maka isi field tersebut dengan <b><q>1</q></b></li>
								<li><b>walikelas :</b> Walikelas diisi dengan nama guru yang terdaftar pada app sekolah ini. anda dapat melewati field ini apabila tidak ada atau belum menginputkan guru.</li>
							</ul>
							<p>
								Untuk mengubah dan menghapus data kelas, anda dapat menggunakan tombol <span class="badge badge-success"><i class="icon-pencil"></i></span> <span class="badge badge-danger"><i class="icon-trash"></i></span> yang terletak pada sebelah kanan setiap list kelas. Setelah menghapus data kelas, anda tidak dapat mengembalikannya lagi.
							</p>
						</div>
					</div>
				</section>

				<section id="guru">
					<h2><b class="mr-2">#</b>Data Guru</h2>
					<hr>
					<div class="card shadow p-md-4">
						<div class="card-body" id="list_guru">
							<h4>List / Daftar Guru</h4>
							<p>Data list guru terletak pada menu data guru pada halaman aplikasi. Halaman tersebut menampilkan tambah data guru baru, menu lainnya tentang guru, list guru yang berisi NIGN, nama guru, photo guru, telepon, status mengajar, tanggal aktif dan berikut tombol edit dan hapus guru.</p>
						</div>
						<div class="card-body" id="tambah_guru">
							<h4>Menambah data guru</h4>
							<p>Anda dapat menambah data guru pada tombol <span class="badge badge-primary">tambah data</span> pada bagian atas kiri data list guru. pada halaman tersebut anda akan melengkapi data berikut:</p>
							<ul>
								<li><b>NIGN: </b> Nomor induk guru nasional</li>
								<li><b>Nama Guru: </b>Diisi dengan nama lengkap guru beserta gelar akademiknya.</li>
								<li><b>Pendidikan terakhir: </b> Field ini diisi dengan jenjang terakhir, jurusan dan Perguruan tinggi guru tersebut. sebagai contoh: <b><q>S1 Sistem Informasi STMIK Borneo Internasional</q></b></li>
								<li><b>Jenis kelamin: </b>Laki-laki/Perempuan.</li>
								<li><b>Tempat lahir guru: </b>Tuliskan kota lahir guru.</li>
								<li><b>Tanggal lahir guru: </b>Anda dapat memilih tanggal dengan menekan tanda segitiga kebawah pada field ini.</li>
								<li><b>Status mengajar guru: </b>Status mengajar guru aktif/tidak aktif.</li>
								<li><b>Tanggal aktif mengajar/ diterima: </b>Tanggal guru mulai mengajar atau diterima.</li>
								<li><b>Alamat: </b>Alamat lengkap guru.</li>
								<li><b>Nomor Telepon: </b>Nomor telepon aktif guru yang bisa di hubungi.</li>
								<li><b>Agama: </b>Terdapat pilihan agama dengan mengklik tanda segitiga kebawah pada field ini.</li>
							</ul>
						</div>
						<div class="card-body" id="impor_guru">
							<h4>Import data guru</h4>
							<p>
								Pada menu lainnya yang terletak di sebelah kanan atas daftar guru terdapat menu import data guru. menu ini akan menampilkan panduan untuk mengimpor data guru. anda diharuskan mendownload format dengan menekan tombol berwarna hijau <span class="badge badge-success">Download format(XLSX)</span> kemudian mengisikan data-data guru yang akan di import pada file ini. anda tidak diperbolehkan merubah format header pada file ini, aplikasi hanya akan membaca format header pada file ini.
							</p>
							<p>
								Kemudian Upload file format yang telah diisi dengan data guru ke form pada bagian bawah halaman import guru ini.
							</p>
						</div>
						<div class="card-body" id="edit_guru">
							<h4>Merubah data guru</h4>
							<p>
								tombol untuk merubah data guru terdapat pada sebelah kanan list data pada setiap guru. toombol berwarna hijau digunakan untuk merubah data. lakukan hal yang sama seperti menambahkan data guru. kemudian tekan simpan
							</p>
							<p>
								Upload photo guru terletak pada halaman edit guru. masuk dengan menekan tombol edit. pada kolom bagian kana terdapat field upload photo yang digunakan untuk memilih photo guru. pilih photo guru dan tekan upload. maka photo guru akan terganti
							</p>
						</div>
						<div class="card-body" id="hapus_guru">
							<h4>Hapus data guru</h4>
							<p>
								Hapus data guru menggunakan tombol berwarna merah dengan icon tempat-sampah. akan muncul konfirmasi sebelum anda menghapus data guru. menghapus dengan menghapus data guru sementara (Memindahkan ke tempat sampah). anda dapat menghapus permanen data tersebut dengan pergi ke menu lainnya > <span class="badge badge-primary">data guru terhapus</span>
							</p>
							<p>
								pada halaman data guru terhapus, anda dapat melihat data guru2 yang telah terhapus. anda bisa melakukan restore atau mengembalikan ke data guru dengan menean tombol <span class="badge badge-info"><i class="nova-archive"></i></span>, atau menghapusnya secara permanent dengan tombol <span class="badge badge-danger"><i class="nova-trash"></i></span> di sapingnya.
							</p>
						</div>
					</div>
				</section>

				<section id="siswa">
					<h2><b class="mr-2">#</b>Data Siswa</h2>
					<hr>
					<div class="card shadow p-md-4">
						<div class="card-body" id="list_siswa">
							<h4>List / Daftar Siswa</h4>
							<p>Data list siswa terletak pada menu data siswa pada halaman aplikasi. Halaman tersebut menampilkan tambah data siswa baru, menu lainnya tentang siswa, list siswa yang berisi NIGN, nama siswa, photo siswa, telepon, status mengajar, tanggal aktif dan berikut tombol edit dan hapus siswa.</p>
						</div>
						<div class="card-body" id="tambah_siswa">
							<h4>Menambah data siswa</h4>
							<p>Anda dapat menambah data siswa pada tombol <span class="badge badge-primary">tambah data</span> pada bagian atas kiri data list siswa. pada halaman tersebut anda akan melengkapi data berikut:</p>
							<ul>
								<li><b>NIS: </b></li>
								<li><b>Nama lengkap: </b></li>
								<li><b>Tahun masuk:</b></li>
								<li><b>Jenis kelamin: </b></li>
								<li><b>Jurusan: </b></li>
								<li><b>Kelas: </b></li>
								<li><b>Status belajar: </b></li>
							</ul>
						</div>
						<div class="card-body" id="impor_siswa">
							<h4>Import data siswa</h4>
							<p>
								Pada menu lainnya yang terletak di sebelah kanan atas daftar siswa terdapat menu import data siswa. menu ini akan menampilkan panduan untuk mengimpor data siswa. anda diharuskan mendownload format dengan menekan tombol berwarna hijau <span class="badge badge-success">Download format(XLSX)</span> kemudian mengisikan data-data siswa yang akan di import pada file ini. anda tidak diperbolehkan merubah format header pada file ini, aplikasi hanya akan membaca format header pada file ini.
							</p>
							<p>
								Kemudian Upload file format yang telah diisi dengan data siswa ke form pada bagian bawah halaman import siswa ini.
							</p>
						</div>
						<div class="card-body" id="pindah_siswa">
							<h4>Pindah kelas siswa</h4>
							<p>Pindah kelas siswa dapat dilakukan dengan 3 cara, untuk mempermudah mengolah kelas siswa terdapat menu khusus yang dibuat untuk memindahkan kelas lebih dari satu siswa. cara kedua menekan tombol kelas pada pada halaman list siswa, dan cara ketiga adalah dengan merubah kelas pada halaman edit siswa.</p>
						</div>
						<div class="card-body" id="edit_siswa">
							<h4>Merubah data siswa</h4>
							<p>
								tombol untuk merubah data siswa terdapat pada sebelah kanan list data pada setiap siswa. toombol berwarna hijau digunakan untuk merubah data. lakukan hal yang sama seperti menambahkan data siswa. kemudian tekan simpan
							</p>
							<p>
								Upload photo siswa terletak pada halaman edit siswa. masuk dengan menekan tombol edit. pada kolom bagian kana terdapat field upload photo yang digunakan untuk memilih photo siswa. pilih photo siswa dan tekan upload. maka photo siswa akan terganti
							</p>
						</div>
						<div class="card-body" id="hapus_siswa">
							<h4>Hapus data siswa</h4>
							<p>
								Hapus data siswa menggunakan tombol berwarna merah dengan icon tempat-sampah. akan muncul konfirmasi sebelum anda menghapus data siswa. menghapus dengan menghapus data siswa sementara (Memindahkan ke tempat sampah). anda dapat menghapus permanen data tersebut dengan pergi ke menu lainnya > <span class="badge badge-primary">data siswa terhapus</span>
							</p>
							<p>
								pada halaman data siswa terhapus, anda dapat melihat data siswa2 yang telah terhapus. anda bisa melakukan restore atau mengembalikan ke data guru dengan menean tombol <span class="badge badge-info"><i class="nova-archive"></i></span>, atau menghapusnya secara permanent dengan tombol <span class="badge badge-danger"><i class="nova-trash"></i></span> di sapingnya.
							</p>
						</div>
					</div>
				</section>

				<section id="ppdb">
					<h2><b class="mr-2">#</b>PPDB Online</h2>
					<hr>
					<div class="card shadow p-md-4">
						<div class="card-body" id="mulai_ppdb">
							<h4>Memulai PPDB Online</h4>
							<p>Sistem PPDB dapat di aktifkan pada menu pengaturan sesi ppdb online pada halaman menu <span class="badge badge-primary">PPDB Online</span>. anda harus mengisikan tanggal mulai, tanggal selesai, dan keterangan PPDB</p>
							<p>Para peserta dapat membuat akun pendaftaran tetapi tidak dapat membuka halaman pengisian formulir PPDB online saat Sistem PPDB belum diaktifkan, belum sampai pada tanggal mulai ppdb dan melewati tanggal selesai ppdb.</p>
						</div>
						<div class="card-body" id="akun_ppdb">
							<h4>Akun pendaftar</h4>
							<p>Anda dapat melihat data akun peserta PPDB pada menu akun pendaftar. Email yang terdaftar, kapan email itu di buat, dan nama pemilik akun ini. Namun anda hanya dapat mereset atau menghapus akun pendaftar, demi keamanan privasi password akun pendaftar</p>
							<p>Anda dapat mereset password akun tersebut apabila pengguna lupa password dengan cara menekan tombol <span class="badge badge-primary"><i class="nova-key"></i>Reset</span> dan <span class="badge badge-danger"><i class="icon-trash"></i></span> untuk menghapus akun.</p>
							<p>Apabila anda menghapus akun tersebut. data pendaftaran akan ikut terhapus.</p>
						</div>
						<div class="card-body" id="status_ppdb">
							<h4>Status pendaftaran</h4>
							<p>Terdapat 4 jenis status pendaftaran bagi para pendaftar yaitu:</p>
							<ul>
								<li><b>Persiapan: </b> berarti peserta pendaftaran sedang melakukan persiapan dan sedang mengisi form untuk setor pendaftaran.</li>
								<li><b>Mendaftar: </b> berarti peserta telah selesai melakukan pengisian data berkas perlengkapan.</li>
								<li><b>Terverifikasi: </b> berarti anda telah memverifikasi berkas pendaftaran perndaftar.</li>
								<li><b>diterima: </b> berarti pendaftar telah berhasil diterima di sekolah</li>
							</ul>
							<p>Anda diharapkan berhati-hati dan teliti dalam melakukan perubahan status pendaftaran siswa.</p>
						</div>
						<div class="card-body" id="migrasi_ppdb">
							<h4>Migrasi ke data siswa</h4>
							<p>Migrasi pendaftaran berarti memindahkan data peserta PPDB dengan status di terima ke tabel siswa. anda dapat melakukan migrasi data tersebut pada menu <span class="badge badge-primary">Migrasi</span>. anda dapat melakukan melakukan migrasi satu-persatu dengan klik pada icon <span class="badge badge-primary"><i class="icon-check"></i></span> di sebelah kanan data pendaftar. Ataupun melakukan migrasi untuk semua data dengan mengklik <span class="badge badge-primary">Migrasi semua data</span> di bawah list data pendaftar.</p>
						</div>
						<div class="card-body" id="pengumuman_ppdb">
							<h4>Pengumuman PPDB</h4>
							<p>Pada halaman awal PPDB terdapat menu pengumuman PPDB <span class="badge badge-primary">Buat pengumuman</span> yang dimaksudkan untuk memberikan pengumuman seputar PPDB. Pada halaman tersebut, terdapat 3 field yang harus diisi yaitu judul pengumuman, isi pengumuman, dan file lampiran pengumuman. tapi apabila tidak ada file lampiran dalam pegumuman tersebut, field file lampiran dapat di kosongkan saja.</p>
							<p>Sebagai contoh: pada tahap akhir PPDB Online yaitu pengumuman pendaftar yang diterima anda mengisikan:</p>
							<ul>
								<li><b>Judul pengumuman :</b> Pengumuman peserta PPDB Online yand diterima</li>
								<li><b>isi pengumuman :</b> Salam. berikut ini, hasil seleksi PPDB Online Sekolah yang telah diterima berdasarkan keputusan dari pihak sekolah bahwa, nama-nama yang terdapat pada lampiran berikut ini telah lolos seleksi dan diterima. peserta diharapkan datang ke sekolah pada tanggal 19 januari 2020 untuk melaksanakan pengenalan lingkungan sekolah seperti yang tertulis pada SK dalam lampiran berikut ini:</li>
								<li><b>file lampiran:</b> upload file lampiran pengumuman yang berisi nama peserta yang diterima dan SK.</li>
							</ul>
						</div>
					</div>
				</section>

				<section id="lainnya">
					<h2><b class="mr-2">#</b>Lainnya</h2>
					<hr>
					<div class="card shadow p-md-4">
						<div class="card-body" id="pengaturan_login">
							<h4>Pengaturan login</h4>
							<p>Anda dapat merubah pengaturan login anda pada menu pojok kanan atas yang terdapat foto dan nama pengguna. pada halaman tersebut, anda dapat merubah data Nama pengguna, email login, password login dan photo pengguna. terdapat pula konfirmasi password yang harus diisi untuk setiap merubah data.</p>

							<p>Isikan field password baru apabila anda ingin merubah password.</p>
						</div>
					</div>
				</section>
			</div>
		</div>
	</main>

	<script src="{{ asset('nova/jquery-migrate.min.js') }}"></script>
	<script src="{{ asset('nova/popper.min.js') }}"></script>
	<script src="{{ asset('nova/bootstrap.min.js') }}"></script>

	<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

	<!-- Custom JavaScript for this theme -->
	<script src="{{ asset('js/scrolling-nav.js') }}"></script>
	<script>
		$(document).on('ready', function () {
			$('#formcari').on('keyup', function(){
				var value = $(this).val().toLowerCase();
				$('.menu ul li, .menu h5').filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
				});
			});
		});
	</script>
</body>
</html>