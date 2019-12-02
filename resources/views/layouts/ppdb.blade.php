<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('icon.png') }}" type="img/png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('font/fa/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('font/sli/css/simple-line-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('nova/nova-icon/nova-icons.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/timeline.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('nova/animate.min.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-white navbar-light shadow-sm py-3">
            <div class="container">
                <a class="navbar-brand" href="{{ route('ppdb.index') }}">
                    @isset (App\Sekolah::first()->logo)
                    <img src="{{Storage::url(App\Sekolah::first()->logo)}}" alt="" style="height: 40px" class="mr-2">
                    @else
                    <i class="icon-layers mr-2"></i>
                    @endisset
                    PPDB Online
                </a>
                <button class="navbar-toggler border-0 p-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if (Auth::User()->photo == "" || Auth::User()->photo == "default.png")
                                <img class="rounded-circle mr-2" src="{{ asset('img/'.Auth::User()->photo) }}" style="width: 30px; height: 30px">
                                @else
                                <img class="rounded-circle mr-2" src="{{ Storage::url(Auth::User()->photo) }}" style="width: 30px; height: 30px">
                                @endif
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <div class="dropdown-header d-flex">
                                    @if (Auth::User()->photo == "" || Auth::User()->photo == "default.png")
                                    <img class="rounded-circle mr-2" src="{{ asset('img/'.Auth::User()->photo) }}" style="width: 40px; height: 40px">
                                    @else
                                    <img class="rounded-circle mr-2" src="{{ Storage::url(Auth::User()->photo) }}" style="width: 40px; height: 40px">
                                    @endif
                                    <div>
                                        <h6 class="m-0 p-0">{{ Auth::user()->name }}</h6>
                                        <span>{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('ppdb.pendaftar.pengaturan') }}" class="dropdown-item"><i class="nova-settings mr-2"></i>Pengaturan</a>
                                <a class="dropdown-item" href="{{ route('logout', 'ppdbonline') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="nova-power-off mr-2"></i>{{ __('Logout') }}</a>

                                <form id="logout-form" action="{{ route('logout', 'ppdbonline') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @if (App\Ppdb_setting::count() != 0 && App\Ppdb_setting::first()->mulai < now() && App\Ppdb_setting::first()->selesai > now() )
        <div class="collapse navbar-collapse d-md-block" id="navbarSupportedContent">

            <nav class="navbar navbar-expand-md bg-white navbar-light shadow-sm">
                <div class="container">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto font-weight-bold">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a href="{{ route('ppdb.index') }}" class="nav-link @if (Request::segment(2) == null) active @endif">
                                <i class="nova-home mr-2"></i> Beranda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ppdb.edit', 'pribadi') }}" class="nav-link @if (Request::segment(3) == "edit") active @endif">
                                <i class="nova-files mr-2"></i> Formulir pendaftaran
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ppdb.edit', 'final') }}" class="nav-link @if (Request::segment(2) == "final") active @endif">
                                <i class="nova-export mr-2"></i> Setor berkas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ppdb.create') }}" class="nav-link @if (Request::segment(2) == "create") active @endif">
                                <i class="nova-tag mr-2"></i> Status
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ppdb.show', 'lihatdata') }}" class="nav-link @if (Request::segment(2) == "lihatdata") active @endif">
                                <i class="nova-user mr-2"></i> Profile saya
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ppdb.pengumuman') }}" class="nav-link @if (Request::segment(2) == "pengumuman") active @endif">
                                <i class="nova-announcement mr-2"></i> Pengumuman
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>
        </div>
        @endif

        @if (session('message'))
        <div class="alert alert-{{session('message')['type']}} alert-dismissible fade show" role="alert">
            <b class="">
                @if(session('message')['type'] == "warning")
                <i class="nova-alert mr-1"></i>
                @elseif(session('message')['type'] == "info")
                <i class="nova-info-alt mr-1"></i>
                @elseif(session('message')['type'] == "danger")
                <i class="nova-close mr-1"></i>
                @else
                <i class="nova-check-box mr-1"></i>
                @endif
                {{session('message')['type']}} Message:
            </b>
            {{session('message')['text']}}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <main class="py-4">
            <div class="container">

                @yield('content')
            </div>
        </div>
    </main>

    <footer class="footer bg-light my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                    <p class="mb-0">
                        <h5>{{App\Sekolah::first()->nama_sekolah ?? ""}}</h5>
                        {{App\Sekolah::first()->alamat ?? ""}}
                        Telp. {{App\Sekolah::first()->telepon ?? ""}}
                        Website. <a href="{{App\Sekolah::first()->website ?? ""}}">{{App\Sekolah::first()->website ?? ""}}</a>
                    </p>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Sistem PPDB Online</p>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>