@extends('layouts.app')
@section('body-class', 'signup-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}'); background-size: cover; background-position: top center;">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<div class="card card-signup">
					<form method="POST" action="{{ route('register') }}">
						@csrf
						<div class="header header-primary text-center">
							<h4>Registro</h4>
						</div>
						<div class="content">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">face</i>
								</span>
								<input id="name" placeholder="Nombre" placeholder="Nombre" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
							</div>
							
							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">fingerprint</i>
								</span>
								<input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
							</div>

							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">lock_outline</i>
								</span>
								<input id="password" placeholder="Contraseña" type="password" class="form-control" name="password" required>
							</div>

							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">lock_outline</i>
								</span>
								<input id="password-confirm" placeholder="Confirmar Contraseña" type="password" class="form-control" name="password_confirmation" required>
							</div>

							<div class="footer text-center">
                            <button type="submit" class="btn btn-simple btn-primary btn-lg">Registar</a>
                        </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	@endsection