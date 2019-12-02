<!DOCTYPE html>
<!-- saved from url=(0077) -->
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Title -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Required Meta Tags Always Come First -->

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('icon.png') }}" type="img/png">

	<!-- Fonts -->
	<link rel="stylesheet" href="{{ asset('nova/css') }}">
	<link rel="stylesheet" href="{{ asset('nova/nova-icon/nova-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('font/sli/css/simple-line-icons.css') }}">

	<!-- CSS Implementing Libraries -->
	<link rel="stylesheet" href="{{ asset('nova/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('nova/jquery.mCustomScrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('nova/flatpickr.min.css') }}">
	<link rel="stylesheet" href="{{ asset('nova/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('nova/chartist.min.css') }}">

	<!-- CSS Nova Template -->
	<link rel="stylesheet" href="{{ asset('nova/theme.css') }}">
	<link rel="stylesheet" href="{{ asset('nova/custom.css') }}">

	<script src="{{ asset('nova/jquery.min.js') }}"></script>
	<script src="{{ asset('nova/jquery.mousewheel.min.js') }}"></script>

</head>

<body class="has-sidebar has-fixed-sidebar-and-header side-nav-full-mode">
	<!-- Header -->
	<header class="header header-light bg-white">
		<nav class="navbar flex-nowrap p-0">
			<div class="navbar-brand-wrapper col-auto text-center text-white" style="background: #1b1f34">
				<!-- Logo For Mobile View -->
				<a class="navbar-brand navbar-brand-mobile text-white mx-auto" href="#">
					@isset (App\Sekolah::first()->logo)
					<img src="{{Storage::url(App\Sekolah::first()->logo)}}" alt="" style="height: 30px">
					@else
					<i class="icon-layers bg-white p-2 text-primary rounded-circle small"></i>
					@endisset
				</a>
				<!-- End Logo For Mobile View -->

				<!-- Logo For Desktop View -->
				<a class="navbar-brand navbar-brand-desktop text-white lead mx-auto" href="#">
					<div class="side-nav-show-on-closed">
						<i class="icon-layers bg-white p-2 text-primary rounded-circle small"></i>
					</div>
					<div class="side-nav-hide-on-closed">
						@isset (App\Sekolah::first()->logo)
						<img src="{{Storage::url(App\Sekolah::first()->logo)}}" alt="" style="height: 30px" class="mr-2">
						@else
						<i class="icon-layers bg-white p-2 text-primary rounded-circle small mr-2"></i>
						@endisset
						App Sekolah
					</div>
				</a>
				<!-- End Logo For Desktop View -->
			</div>

			<div class="header-content col px-md-3 px-md-3">
				<div class="d-flex align-items-center">
					<!-- Side Nav Toggle -->
					<a class="js-side-nav header-invoker mr-md-2" href="#" data-close-invoker="#sidebarClose" data-target="#sidebar" data-target-wrapper="body">
						<i class="nova-align-left"></i>
					</a>
					<!-- End Side Nav Toggle -->

					<!-- Header Search -->
					<div class="js-header-search position-relative" data-search-target="#headerSearchResults" data-search-mobile-invoker="#headerSearchMobileInvoker" data-search-form="#headerSearchForm" data-search-field="#headerSearchField" data-search-clear="#headerSearchResultsClear">
						<a id="headerSearchMobileInvoker" class="header-search-invoker header-invoker" href="#">
							<i class="nova-search"></i>
						</a>

						<form id="headerSearchForm" class="header-search input-group w-18_75rem w-md-22_5rem" action="#" style="" onsubmit="event.preventDefault()">
							<input id="headerSearchField" class="header-search-input form-control form-control-icon-text" type="text" placeholder="Cari pada halaman ini">
							<div class="input-group-append focus-hide">
								<i class="nova-search icon-text icon-text-lg"></i>
							</div>
							<div class="input-group-append focus-show">
								<span id="headerSearchResultsClear">
									<i class="nova-close icon-text icon-text-lg"></i>
								</span>
							</div>
						</form>
					</div>
					<!-- End Header Search -->

					<!-- Header Dropdown -->
					<div class="dropdown ml-auto">
						<a id="messagesInvoker" class="header-invoker" href="#" aria-controls="messages" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#messages" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
							<span class="indicator indicator-bordered indicator-top-right indicator-secondary rounded-circle"></span>
							<i class="nova-email"></i>
						</a>

						<div id="messages" class="dropdown-menu dropdown-menu-center py-0 mt-4 w-18_75rem w-md-22_5rem unfold-css-animation unfold-hidden" aria-labelledby="messagesInvoker" style="animation-duration: 300ms;">
							<div class="card">
								<div class="card-header d-flex align-items-center border-bottom py-3">
									<h5 class="mb-0">Messages</h5>
									<a class="link small ml-auto" href="#">View All</a>
								</div>

								<div class="card-body p-0">
									<div class="list-group list-group-flush">
										<a class="list-group-item list-group-item-action" href="#">
											<div class="media align-items-center">
												<div class="position-relative d-none d-md-block mr-2">
													<span class="indicator indicator-lg indicator-bordered-reverse indicator-top-left indicator-success rounded-circle"></span>
													<img class="avatar-lg rounded-circle" src="{{ asset('nova/img4.jpg') }}" alt="">
												</div>

												<div class="media-body">
													<div class="d-flex">
														<h6 class="font-weight-semi-bold mb-0">Frances James</h6>
														<small class="text-muted ml-auto">just now</small>
													</div>

													<p class="text-truncate mb-0" style="max-width: 250px;">
														Reminder about your Appointment
													</p>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Header Dropdown -->
					<div class="dropdown"></div>

					@guest
					<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					@if (Route::has('register'))
					<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
					@endif
					@else
					<div class="dropdown mx-3 small">
						<a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#profileMenu" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
							@if (Auth::User()->photo == "" || Auth::User()->photo == "default.png")
							<img class="avatar rounded-circle mr-md-2" src="{{ asset('img/'.Auth::User()->photo) }}" alt="">
							@else
							<img class="avatar rounded-circle mr-md-2" src="{{ Storage::url(Auth::User()->photo) }}" alt="">
							@endif
							<span class="d-none d-md-block">{{ Auth::user()->name }}</span>
							<i class="nova-angle-down d-none d-md-block ml-2"></i>
						</a>

						<ul id="profileMenu" class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden" aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
							<li class="unfold-item">
								<a class="unfold-link d-flex align-items-center text-nowrap" href="{{ route('saya') }}">
									<span class="unfold-item-icon mr-3">
										<i class="nova-user"></i>
									</span>
									My Profile
								</a>
							</li>
							<li class="unfold-item unfold-item-has-divider">
								<a class="unfold-link d-flex align-items-center text-nowrap" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									<span class="unfold-item-icon mr-3">
										<i class="nova-power-off"></i>
									</span>
									{{ __('Logout') }}
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>

						</ul>
					</div>
					@endguest

					<!-- Header User Dropdown -->
					<!-- End Header User Dropdown -->
				</div>
			</div>
		</nav>
	</header>
	<!-- End Header -->

	<main class="main">
		<!-- Sidebar Nav -->
		<aside id="sidebar" class="js-custom-scroll side-nav mCustomScrollbar _mCS_2 mCS-autoHide" style="overflow: visible;">
			<div id="mCSB_2" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;">
				<div id="mCSB_2_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
					<ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
						<!-- Sidebar Sub Title -->
						<li class="sidebar-heading h6">Dashboard</li>

						<li class="side-nav-menu-item @if (Request::segment(1) == "home") active @endif">
							<a class="side-nav-menu-link media align-items-center" href="{{ route('home') }}">
								<span class="side-nav-menu-icon d-flex mr-3">
									<i class="nova-dashboard"></i>
								</span>
								<span class="side-nav-fadeout-on-closed media-body">Dashboard</span>
							</a>
						</li>
						<li class="side-nav-menu-item @if (Request::segment(1) == "absensi") active @endif">
							<a class="side-nav-menu-link media align-items-center" href="{{ route('absensi.index') }}">
								<span class="side-nav-menu-icon d-flex mr-3">
									<i class="nova-agenda"></i>
								</span>
								<span class="side-nav-fadeout-on-closed media-body">Absensi</span>
							</a>
						</li>
						<li class="side-nav-menu-item @if (Request::segment(1) == "ppdbadmin") active @endif">
							<a class="side-nav-menu-link media align-items-center" href="{{ route('ppdbadmin.index') }}">
								<span class="side-nav-menu-icon d-flex mr-3">
									<i class="icon-user-follow"></i>
								</span>
								<span class="side-nav-fadeout-on-closed media-body">PPDB Online</span>
							</a>
						</li>
						<li class="side-nav-menu-item @if (Request::segment(1) == "pengumuman") active @endif">
							<a class="side-nav-menu-link media align-items-center" href="{{ route('pengumuman.index') }}">
								<span class="side-nav-menu-icon d-flex mr-3">
									<i class="nova-announcement"></i>
								</span>
								<span class="side-nav-fadeout-on-closed media-body">Pengumuman</span>
							</a>
						</li>

						@if (Auth::user()->role == "admin")
							<li class="sidebar-heading h6">Data Master</li>
							<li class="side-nav-menu-item @if (Request::segment(1) == "student") active @endif">
								<a class="side-nav-menu-link media align-items-center" href="{{ route('student.index') }}">
									<span class="side-nav-menu-icon d-flex mr-3">
										<i class="icon-people"></i>
									</span>
									<span class="side-nav-fadeout-on-closed media-body">Data Siswa</span>
								</a>
							</li>

							<li class="side-nav-menu-item @if (Request::segment(1) == "teacher") active @endif">
								<a class="side-nav-menu-link media align-items-center" href="{{ route('teacher.index') }}">
									<span class="side-nav-menu-icon d-flex mr-3">
										<i class="icon-people"></i>
									</span>
									<span class="side-nav-fadeout-on-closed media-body">Data Guru</span>
								</a>
							</li>

							<li class="side-nav-menu-item @if (Request::segment(1) == "jurusan") active @endif">
								<a class="side-nav-menu-link media align-items-center" href="{{ route('jurusan.index') }}">
									<span class="side-nav-menu-icon d-flex mr-3">
										<i class="nova-light-bulb"></i>
									</span>
									<span class="side-nav-fadeout-on-closed media-body">Jurusan</span>
								</a>
							</li>

							<li class="side-nav-menu-item @if (Request::segment(1) == "kelas") active @endif">
								<a class="side-nav-menu-link media align-items-center" href="{{ route('kelas.index') }}">
									<span class="side-nav-menu-icon d-flex mr-3">
										<i class="icon-grid"></i>
									</span>
									<span class="side-nav-fadeout-on-closed media-body">Kelas</span>
								</a>
							</li>
						@endif

						<li class="sidebar-heading h6">Pengaturan</li>

						<li class="side-nav-menu-item @if (Request::segment(1) == "sekolah") active @endif">
							<a class="side-nav-menu-link media align-items-center" href="{{ route('sekolah.edit') }}">
								<span class="side-nav-menu-icon d-flex mr-3">
									<i class="nova-home"></i>
								</span>
								<span class="side-nav-fadeout-on-closed media-body">Profil Sekolah</span>
							</a>
						</li>
						@if (Auth::User()->role == "admin")
						<li class="side-nav-menu-item @if (Request::segment(1) == "user") active @endif">
								<a class="side-nav-menu-link media align-items-center" href="{{ route('user.index') }}">
									<span class="side-nav-menu-icon d-flex mr-3">
										<i class="icon-people"></i>
									</span>
									<span class="side-nav-fadeout-on-closed media-body">Manajemen User</span>
								</a>
							</li>
						@endif
						<li class="side-nav-menu-item @if (Request::segment(1) == "documentation") active @endif">
							<a class="side-nav-menu-link media align-items-center" href="{{ route('dokumentasi') }}">
								<span class="side-nav-menu-icon d-flex mr-3">
									<i class="nova-file"></i>
								</span>
								<span class="side-nav-fadeout-on-closed media-body">Dokumentasi</span>
							</a>
						</li>
						<li class="side-nav-menu-item">
							<a class="side-nav-menu-link media align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
								<span class="side-nav-menu-icon d-flex mr-3">
									<i class="nova-power-off"></i>
								</span>
								<span class="side-nav-fadeout-on-closed media-body">Logout</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;">
				<div class="mCSB_draggerContainer">
					<div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 270px; max-height: 477px; top: 0px;">
						<div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
					</div>
					<div class="mCSB_draggerRail"></div>
				</div>
			</div>
		</aside>
		<!-- End Sidebar Nav -->

		<div class="content">
			@if (session('message'))
			<div class="alert alert-{{session('message')['type']}} alert-dismissable fade show mb-0">
				<div class="container-fluid">
					<b class="text-capitalize">
						@if(session('message')['type'] == "warning")
						<i class="nova-alert mr-2"></i>
						@elseif(session('message')['type'] == "info")
						<i class="nova-info-alt mr-2"></i>
						@elseif(session('message')['type'] == "danger")
						<i class="nova-close mr-2"></i>
						@else
						<i class="nova-check-box mr-2"></i>
						@endif
						{{session('message')['type']}}
						Message :
					</b>
					{{session('message')['text']}}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			@endif

			<div class="py-4 px-3 px-md-4">
				<!-- Breadcrumb -->
				<nav class="d-none d-md-block" aria-label="breadcrumb">
					<ol class="breadcrumb text-capitalize">
						<li class="breadcrumb-item">
							<a href="#">Beranda</a>
						</li>
						<li class="breadcrumb-item"><a href="#">{{Request::segment(1)}}</a></li>
						<li class="breadcrumb-item active" aria-current="page">{{Request::segment(2)}}</li>
					</ol>
				</nav>
				<!-- End Breadcrumb -->

				<div class="row align-items-center mb-3 mb-md-4">
					<div class="col-md mb-2 mb-md-0">
						@yield('content')
					</div>
				</div>

			</div>

			<!-- Footer -->
			<footer class="small bg-white p-3 px-md-4 mt-auto d-print-none">
				<div class="row justify-content-between">
					<div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
						<ul class="list-dot list-inline mb-0">
							<li class="list-dot-item list-dot-item-not list-inline-item mr-lg-2"><a class="link-dark" href="#">FAQ</a></li>
							<li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Support</a></li>
							<li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Contact us</a></li>
						</ul>
					</div>

					<div class="col-lg text-center mb-3 mb-lg-0">
						<ul class="list-inline mb-0">
							<li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="nova-twitter-alt"></i></a></li>
							<li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="nova-vimeo-alt"></i></a></li>
							<li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="nova-github"></i></a></li>
						</ul>
					</div>

					<div class="col-lg text-center text-lg-right">
						© 2019 Htmlstream. All Rights Reserved.
					</div>
				</div>
			</footer>
			<!-- End Footer -->
		</div>
	</main>


	@yield('modal')


	<!-- JS Global Compulsory -->
	<script src="{{ asset('nova/jquery-migrate.min.js') }}"></script>
	<script src="{{ asset('nova/popper.min.js') }}"></script>
	<script src="{{ asset('nova/bootstrap.min.js') }}"></script>

	<!-- JS Implementing Libraries -->
	<script src="{{ asset('nova/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	<script src="{{ asset('nova/flatpickr.min.js') }}"></script>
	<script src="{{ asset('nova/select2.full.min.js') }}"></script>
	<script src="{{ asset('nova/chartist.min.js') }}"></script>
	<script src="{{ asset('nova/chartist-bar-labels.js') }}"></script>
	<script src="{{ asset('nova/resizeSensor.min.js') }}"></script>

	<!-- JS Nova -->
	<script src="{{ asset('nova/hs.core.js') }}"></script>
	<script src="{{ asset('nova/hs.malihu-scrollbar.js') }}"></script>
	<script src="{{ asset('nova/hs.side-nav.js') }}"></script>
	<script src="{{ asset('nova/hs.unfold.js') }}"></script>
	<script src="{{ asset('nova/hs.flatpickr.js') }}"></script>
	<script src="{{ asset('nova/hs.header-search.js') }}"></script>
	<script src="{{ asset('nova/hs.select2.js') }}"></script>
	<script src="{{ asset('nova/hs.chartist-bar.js') }}"></script>
	<script src="{{ asset('nova/hs.bs-tabs.js') }}"></script>
	<script src="{{ asset('nova/hs.file-attach.js') }}"></script>

	<!-- JS Libraries Init. -->
	<script>
		$(document).on('ready', function () {
			$.HSCore.components.HSMalihuScrollBar.init($('.js-custom-scroll'));

			$.HSCore.components.HSSideNav.init('.js-side-nav');

			$.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
				unfoldHideOnScroll: false,
				afterOpen: function () {
					$.HSCore.components.HSChartistBar.init('#activity .js-bar-chart');

					setTimeout(function() {
						$('#activity .js-bar-chart').css('opacity', 1);
					}, 100);

					$('#headerProjects .accordion-header').on('click', function () {
						var target = $(this).data('target');

						$(target).collapse('show');
					});
				}
			});

			$.HSCore.components.HSFlatpickr.init('#headerRightSidebarDatepicker', {
				locale: {
					weekdays: {
						shorthand: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"]
					}
				},
				nextArrow: '<i class="nova-arrow-right icon-text icon-text-xs"></i>',
				prevArrow: '<i class="nova-arrow-left icon-text icon-text-xs"></i>'
			});

			$.HSCore.components.HSHeaderSearch.init('.js-header-search');

			$.HSCore.components.HSSelect2.init('.js-custom-select');

			$.HSCore.components.HSChartistBar.init('.js-bar-chart');

			$.HSCore.components.HSBSTabs.init('.js-btn-list-to-dropdown');

			$.HSCore.components.HSFileAttach.init('.js-custom-file-attach');

			$('#headerSearchField').on('keyup', function(){
				var value = $(this).val().toLowerCase();
				$('.table tbody tr').filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});

		$(window).on('resize', function () {
			setTimeout(function () {
				$.HSCore.components.HSBSTabs.init('.js-btn-list-to-dropdown');
			}, 200);
		});
	</script>
	@include('sweetalert::alert')
</body>
</html>