@extends('store.store')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						{!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Logradouro</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="street" value="{{ old('street') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Numero</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="number" value="{{ old('number') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Complemento</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="complement" value="{{ old('complement') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Bairro</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="neighborh" value="{{ old('neighborh') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Cidade</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="city" value="{{ old('city') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Estado</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="uf" value="{{ old('uf') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">CEP</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="cep" value="{{ old('cep') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Telefone</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
