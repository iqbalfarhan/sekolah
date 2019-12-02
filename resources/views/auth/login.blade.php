<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link href="{{ asset('font/fa/css/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('font/sli/css/simple-line-icons.css') }}" rel="stylesheet">

	<!-- Styles -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="{{ asset('nova/theme.css') }}" rel="stylesheet">
	<link href="{{ asset('nova/animate.min.css') }}" rel="stylesheet">
</head>
<body style="background: linear-gradient(30deg, #8360c3, #2ebf91)">

	<div class="container">
		<div style="height: 10vh"></div>
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card p-4 shadow-sm" id="card">
					<form method="POST" action="{{ route('login') }}">
						<div class="card-body">
							<h3 class="login-heading text-center mb-4">Selamat datang!</h3>
							@csrf
							<div class="form-group">
								<label for="inputEmail" class="p-0 m-0"><small>Username</small></label>
								<input id="inputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="form-group">
								<label for="inputPassword" class="p-0 m-0"><small>Password</small></label>
								<input id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" id="customCheck1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
								<label class="custom-control-label" for="customCheck1">
									{{ __('Remember Me') }}
								</label>
							</div>
						</div>
						<div class="card-footer text-center">
							<button type="submit" class="btn btn-primary btn-block">
								{{ __('Login') }}
							</button>
							<div class="mt-3">
								<a href="{{URL::previous()}}" class="btn btn-link small">Kembali</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<script src="{{ asset('nova/jquery.min.js') }}"></script>
	<script src="{{ asset('nova/jquery-migrate.min.js') }}"></script>
	<script src="{{ asset('nova/popper.min.js') }}"></script>
	<script src="{{ asset('nova/bootstrap.min.js') }}"></script>

	<script>
		
	</script>

</body>
</html>