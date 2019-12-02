@extends('layouts.ppdb')

@section('content')
		
<div class="card p-md-4">
	<div class="card-body pb-0">
		<h4>Data pendaftar</h4>
		<p>Isilah data calon peserta didik dengan benar dan teliti</p>
	</div>
	<div class="card-header bg-white">
		<ul class="nav nav-tabs nav-justify nav-fill card-header-tabs d-flex">
			<li class="nav-item"><a href="{{ route('ppdb.edit', 'pribadi') }}" class="nav-link @if ($page == 'pribadi') active @endif">1. Pribadi</a></li>
			<li class="nav-item"><a href="{{ route('ppdb.edit', 'orangtua') }}" class="nav-link @if ($page == 'orangtua') active @endif">2. Orangtua</a></li>
			<li class="nav-item"><a href="{{ route('ppdb.edit', 'rincian') }}" class="nav-link @if ($page == 'rincian') active @endif">3. Rincian</a></li>
			<li class="nav-item"><a href="{{ route('ppdb.edit', 'pendaftaran') }}" class="nav-link @if ($page == 'pendaftaran') active @endif">4. Pendaftaran</a></li>
			<li class="nav-item"><a href="{{ route('ppdb.edit', 'berkas') }}" class="nav-link @if ($page == 'berkas') active @endif">5. Berkas</a></li>
			<li class="nav-item"><a href="{{ route('ppdb.edit', 'final') }}" class="nav-link @if ($page == 'final') active @endif">6. Daftar sekarang</a></li>
		</ul>
	</div>
	@switch($page)
	    @case("orangtua")
	        @include('ppdb.page.orangtua')
	        @break

		@case("rincian")
	        @include('ppdb.page.rincian')
	        @break

		@case("pendaftaran")
	        @include('ppdb.page.pendaftaran')
	        @break

	    @case("berkas")
	        @include('ppdb.page.berkas')
	        @break

		@case("final")
	        @include('ppdb.page.final')
	        @break
	
	    @default
	        @include('ppdb.page.pribadi')
	@endswitch
</div>
@endsection