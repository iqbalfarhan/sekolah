@extends('layouts.ppdb')

@section('content')
<div class="jumbotron">
	<h1>{{$pesan ?? "Sistem PPDB Belum diatur"}}</h1>
	<p class="lead">
		Selamat datang di sistem PPDB Online sekolah {{App\Sekolah::first()->nama_sekolah ?? "-"}}. Saat ini anda belum dapat  mengakses sistem PPDB ini dikarenakan {{$pesan ?? "Sistem PPDB Belum diatur"}}.
	</p>
</div>
@endsection