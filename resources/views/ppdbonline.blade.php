
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicons -->
	<link rel="shortcut icon" href="{{ asset('icon.png') }}" type="img/png">
	<link href="{{ asset('ppdb_assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

	<!-- Bootstrap CSS File -->
	<link href="{{ asset('ppdb_assets/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Libraries CSS Files -->
	<link href="{{ asset('ppdb_assets/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('ppdb_assets/lib/animate/animate.min.css') }}" rel="stylesheet">
	<link href="{{ asset('ppdb_assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

	<!-- Main Stylesheet File -->
	<link href="{{ asset('ppdb_assets/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: DevFolio
    Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>

<body id="page-top">

	<!--/ Nav Star /-->
	<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll" href="#page-top">
				PPDB Online
			</a>
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
			aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span></span>
			<span></span>
			<span></span>
		</button>
		<div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link js-scroll active" href="#home">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll" href="#about">Tetang PPDB</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll" href="#contact">Pendaftaran</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!--/ Nav End /-->

<!--/ Intro Skew Star /-->
<div id="home" class="intro route bg-image" style="background-image: url({{ asset('ppdb_assets/img/counters-bg.jpg') }})">
	<div class="overlay-mf"></div>
	<div class="intro-content display-table">
		<div class="table-cell">
			<div class="container">
				<!--<p class="display-6 color-d">Hello, world!</p>-->
				<h1 class="intro-title mb-4">PPDB Online</h1>
				<img src="{{Storage::url($sekolah->logo ?? "")}}" alt="" style="height: 80px">
				<p class="intro-subtitle">{{$sekolah->nama_sekolah ?? ""}}</p>
				<!-- <p class="intro-subtitle"><span class="text-slider-items">Pendaftaran Peserta Didik Baru Online</span><strong class="text-slider"></strong></p> -->
				<!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
			</div>
		</div>
	</div>
</div>
<!--/ Intro Skew End /-->

<section id="about" class="about-mf sect-pt4 route">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="box-shadow-full">
					<div class="title-box-2">
						<h5 class="title-left">
							Tentang PPDB Online
						</h5>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h4>Tanggal PPDB</h4>
							<p class="lead">Pendaftaran peserta didik akan di buka pada</p>

							<div class="p-3 pl-4 bg-light mb-3 border-left border-primary">
								<i class="fa fa-calendar mr-2"></i> Tanggal Mulai PPDB
								<h4 class="text-muted">@isset($setting->mulai) {{date('d F Y', strtotime($setting->mulai))}} @else Belum ditentukan @endisset</h4>
							</div>

							<div class="p-3 pl-4 bg-light mb-3 border-left border-primary">
								<i class="fa fa-calendar mr-2"></i> Tanggal Selesai PPDB
								<h4 class="text-muted">@isset($setting->selesai) {{date('d F Y', strtotime($setting->selesai))}} @else Belum ditentukan @endisset</h4>
							</div>
						</div>
						<div class="col-md-6">
							<div class="about-me pt-4 pt-md-0">
								<h4>Ketentuan</h4>
								<p class="lead">
									Pendaftaran peserta didik baru - online (PPDB Online). setelah melakukan pendaftaran pada halaman ini, anda akan melengkapi data pendaftaran anda.
								</p>
								<p class="lead">
									Pada halaman ini anda akan mendaftar dengan mengisi form dibawah ini dengan nama lengkap, email dan password anda.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--/ Section Contact-Footer Star /-->
<section class="paralax-mf footer-paralax bg-image sect-mt4 route" id="contact" style="background-image: url({{ asset('ppdb_assets/img/overlay-bg.jpg') }})">
	<div class="overlay-mf"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-8">
				<div class="contact-mf">
					<div id="contact" class="box-shadow-full">
						<div class="title-box-2">
							<h5 class="title-left">
								Pendaftaran PPDB Online
							</h5>
						</div>
						<div>
							<form action="{{ route('register') }}" method="post" role="form" class="contactForm">
								@csrf
								<div id="errormessage"></div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="name" class="small">Nama Lengkap</label>
											<input id="name" type="text" class="form-control p-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" @error('name') autofocus @enderror>

											@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="inputEmail" class="small">Alamat Email</label>
											<input id="inputEmail" type="email" class="form-control p-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" @error('email') autofocus @enderror>

											@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="small">Password</label>
									<input id="password" type="password" class="form-control p-4 @error('password') is-invalid @enderror" name="password" @error('password') autofocus @enderror>

									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="password_confirm" class="small">Konfirmasi Password</label>
									<input id="password_confirm" type="password" class="form-control p-4 @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
								</div>

								<button type="submit" class="button button-a button-big button-rouded">Mendaftar</button>

								<a href="{{ route('login') }}" class="btn btn-link">Sudah Pernah Mendaftar? Login disini</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="copyright-box">
						<p class="copyright">&copy; Sistem PPDB Online</p>
						<div class="credits"><a href="{{$sekolah->website ?? ""}}">{{$sekolah->nama_sekolah ?? ""}}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</section>
<!--/ Section Contact-footer End /-->
@include('sweetalert::alert')

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src={{ asset('ppdb_assets/lib/jquery/jquery.min.js') }}></script>
<script src={{ asset('ppdb_assets/lib/jquery/jquery-migrate.min.js') }}></script>
<script src={{ asset('ppdb_assets/lib/popper/popper.min.js') }}></script>
<script src={{ asset('ppdb_assets/lib/bootstrap/js/bootstrap.min.js') }}></script>
<script src={{ asset('ppdb_assets/lib/easing/easing.min.js') }}></script>
<script src={{ asset('ppdb_assets/lib/counterup/jquery.waypoints.min.js') }}></script>
<script src={{ asset('ppdb_assets/lib/counterup/jquery.counterup.js') }}></script>
<script src={{ asset('ppdb_assets/lib/owlcarousel/owl.carousel.min.js') }}></script>
<script src={{ asset('ppdb_assets/lib/lightbox/js/lightbox.min.js') }}></script>
<script src={{ asset('ppdb_assets/lib/typed/typed.min.js') }}></script>
<!-- Contact Form JavaScript File -->
<script src={{ asset('ppdb_assets/contactform/contactform.js') }}></script>

<!-- Template Main Javascript File -->
<script src={{ asset('ppdb_assets/js/main.js') }}></script>

</body>
</html>
