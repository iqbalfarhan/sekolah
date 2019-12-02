@extends('layouts.nova')

@section('content')
<h2>Impor data guru</h2>
<div class="card">
	<div class="card-body">
		<p>Fasilitas impor data guru digunakan untuk menambahkan guru dengan jumlah banyak ke database. digunakan dengan cara mendownload format file dibawah ini, mengisi format file tersebut dan mengupload kembali file tersebut pada form dibawah ini.</p>

		<a href="{{Storage::url('formatTeachers.xlsx')}}" class="btn btn-success"><i class="nova-cloud-down mr-2"></i>Download format (*.xlsx)</a>
	</div>
	<form action="{{ route('teacher.import.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="card-body">
			<h4>Form upload</h4>
			<div class="form-group row">
				<label for="file" class="col-form-label col-md-3 font-weight-bold">Upload format file</label>
				<div class="col-md-9">
					<input type="file" class="form-control" id="file" name="file" placeholder="">
					<small class="form-text text-muted">upload format bentuk excel yang telah di download</small>
				</div>
			</div>
		</div>

		<div class="card-footer pt-0">
			<button class="btn btn-primary"><i class="nova-import mr-2"></i>Import data guru</button>
		</div>
	</form>
</div>
@endsection