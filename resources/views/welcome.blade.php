<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Bootstrap core CSS -->
	<!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->



	<!-- Custom styles for this template -->
	<link rel="shortcut icon" href="{{ asset('icon.png') }}" type="img/png">
	<link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<!-- Fonts  -->
	<link rel="stylesheet" href="{{ asset('nova/nova-icon/nova-icons.css') }}">
	<link href="{{ asset('font/sli/css/simple-line-icons.css') }}" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top"><i class="icon-layers mr-2"></i>SIMDS</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#about">Tentang SIMDS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#services">PPDB Online</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
					</li>
					@if (Route::has('login'))
					@auth
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/home') }}">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
					</li>
					@else
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">Login</a>
					</li>
					@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">Register</a>
					</li>
					@endif
					@endauth
					@endif
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>	
				</ul>
			</div>
		</div>
	</nav>

	<header class="bg-primary text-white">
		<div class="container text-center p-5">
			<div class="p-5">
				<h1>Sistem informasi manajemen data sekolah</h1>
				<p class="lead">Selamat datang di sisem informasi sekolah</p>
			</div>
		</div>
	</header>

	<section id="about" class="p-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<h2>Tentang SIMDS</h2>
					<p class="lead">SIMDS: Sistem informasi management sekolah, merupakan sistem yang digunakan untuk mempermudah mengolah data yang berkaitan dengan proses belajar mengajar di sekolah. Mengolah data-data tersebut sangatlah mudah.</p>
					<ul>
						<li>Clickable nav links that smooth scroll to page sections</li>
						<li>Responsive behavior when clicking nav links perfect for a one page website</li>
						<li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar</li>
						<li>Minimal custom CSS so you are free to explore your own unique design options</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section id="services" class="bg-secondary p-5 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-10 mx-auto text-center">
					<h2>Fitur-fitur</h2>
					<div class="row justify-content-center">
						<div class="col-md-4 py-4">
							<h1><i class="icon-user-follow"></i></h1>
							<h4 class="font-weight-bold">PPDB Online</h4>
							<p class="lead">tersedia sistem Pendaftaran peserta didik baru</p>
						</div>
						<div class="col-md-4 py-4">
							<h1><i class="icon-people"></i></h1>
							<h4 class="font-weight-bold">Data pengajar</h4>
							<p class="lead">Pengolahan data pengajar menjadi lebih mudah</p>
						</div>
						<div class="col-md-4 py-4">
							<h1><i class="icon-people"></i></h1>
							<h4 class="font-weight-bold">Data siswa</h4>
							<p class="lead">Pengolahan data siswa menjadi lebih mudah</p>
						</div>
						<div class="col-md-4 py-4">
							<h1><i class="icon-people"></i></h1>
							<h4 class="font-weight-bold">Data Kelas dan jurusan</h4>
							<p class="lead">Pengolahan Kelas dan jurusan siswa</p>
						</div>
						<div class="col-md-4 py-4">
							<h1><i class="nova-announcement"></i></h1>
							<h4 class="font-weight-bold">Pengumuman</h4>
							<p class="lead">Pengumuman tentang acara dan kegiatan sekolah</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="contact" class="p-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<h2>Contact us</h2>
					<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="py-5 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
		</div>
		<!-- /.container -->
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

	<!-- Plugin JavaScript -->
	<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

	<!-- Custom JavaScript for this theme -->
	<script src="{{ asset('js/scrolling-nav.js') }}"></script>
	@include('sweetalert::alert')
</body>

</html>
