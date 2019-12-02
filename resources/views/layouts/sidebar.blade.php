<div class="card border-0 shadow-sm sidebar sticky-top">
	<div class="scroll-y" style="max-height: 93vh">
		<div class="list-group list-group-flush">
			<a href="{{ route('home') }}" class="list-group-item @if (Request::segment(1) == "home") active @endif">
				<i class="icon-speedometer mr-2"></i>
				Dashboard
			</a>
		</div>
		<hr>
		<div class="list-group list-group-flush" id="accordion">
			<a href="{{ route('attendance.index') }}" class="list-group-item @if (Request::segment(1) == "absensi") active @endif">
				<i class="icon-book-open mr-2"></i>
				Absensi
			</a>
			<a href="{{ route('jadwal.index') }}" class="list-group-item @if (Request::segment(1) == "jadwal") active @endif">
				<i class="icon-calendar mr-2"></i>
				Jadwal Pelajaran
			</a>

			<a href="#" class="list-group-item @if (Request::segment(1) == "ppdbonline") active @endif" data-toggle="collapse" data-target="#m3">
				<i class="icon-user-follow mr-2"></i>
				PPDB Online
			</a>
			<div class="list-group collapse small submenu" id="m3" data-parent="#accordion">
				<a class="list-group-item" href="">Pengaturan PPDB</a>
				<a class="list-group-item" href="">Data Pendaftar</a>
				<a class="list-group-item" href="">Download Data</a>
			</div>
		</div>
		<hr>
		<div class="list-group list-group-flush" id="accordion2">
			<a href="{{ route('teacher.index') }}" class="list-group-item @if (Request::segment(1) == "teacher") active @endif">
				<i class="icon-people mr-2"></i>
				Guru & Pengajar
			</a>
			<a href="{{ route('student.index') }}" class="list-group-item @if (Request::segment(1) == "student") active @endif">
				<i class="icon-people mr-2"></i>
				Data siswa
			</a>
			<a href="{{ route('subject.index') }}" class="list-group-item @if (Request::segment(1) == "subject") active @endif">
				<i class="icon-briefcase mr-2"></i>
				Mata Pelajaran
			</a>
			<a href="{{ route('jurusan.index') }}" class="list-group-item @if (Request::segment(1) == "jurusan") active @endif">
				<i class="icon-directions mr-2"></i>
				Jurusan
			</a>
			<a href="{{ route('kelas.index') }}" class="list-group-item @if (Request::segment(1) == "kelas") active @endif">
				<i class="icon-grid mr-2"></i>
				Kelas
			</a>
		</div>
		<hr>
		<div class="list-group list-group-flush">
			<a href="{{ route('teacher.index') }}" class="list-group-item">
				<i class="icon-lock mr-2"></i>
				Logout
			</a>
		</div>
	</div>
</div>