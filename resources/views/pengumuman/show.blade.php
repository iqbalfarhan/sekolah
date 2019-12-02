@extends('layouts.nova')

@section('content')
<h2>Pengumuman</h2>
<div class="card">
	<div class="card-body pb-0">
		<h4>{{$data->judul}}</h4>
	</div>
	<div class="card-body">
		<p>
			{{$data->tulisan}}
		</p>
		<a href="{{Storage::url($data->file)}}" class="btn btn-primary btn-sm"><i class="nova-folder mr-2"></i>File Lampiran</a>
	</div>
</div>
@endsection