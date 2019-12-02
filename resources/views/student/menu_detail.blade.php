<div class="table-responsive mb-4">
	<nav class="nav nav-tabs nav-fill d-flex">
		<div class="nav-item">
			<a class="nav-link @if(Request::query('page')=='data_umum' || Request::query('page')=='') active @endif" href="{{ url()->current() }}?page=data_umum">Data Umum</a>
		</div>
		<div class="nav-item">
			<a class="nav-link @if(Request::query('page')=='data_pribadi') active @endif" href="{{ url()->current() }}?page=data_pribadi">Data Pribadi</a>
		</div>
		<div class="nav-item">
			<a class="nav-link @if(Request::query('page')=='orangtua') active @endif" href="{{ url()->current() }}?page=orangtua">Orangtua dan Wali</a>
		</div>
		<div class="nav-item">
			<a class="nav-link @if(Request::query('page')=='rincian') active @endif" href="{{ url()->current() }}?page=rincian">Rincian</a>
		</div>
		<div class="nav-item">
			<a class="nav-link @if(Request::query('page')=='registrasi') active @endif" href="{{ url()->current() }}?page=registrasi">Data Registrasi</a>
		</div>
		<div class="nav-item">
			<a class="nav-link @if(Request::query('page')=='berkas') active @endif" href="{{ url()->current() }}?page=berkas">Berkas</a>
		</div>
	</nav>
</div>