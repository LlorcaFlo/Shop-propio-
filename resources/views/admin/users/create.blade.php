@extends('layouts.app')
@section('title', 'Nuevo Usuario')
@section('body-class', 'profile-page sidebar-collapse')
@section('content')
	@include('admin.partials.page-header')
	<div class="container">
		<div class="row my-3">
			{{--<div class="col-lg-4 order-lg-1 text-center">
				<img src="{{ asset('img/faces/avatar.jpg') }}" class="mx-auto img-fluid rounded-circle w-75 d-block" alt="avatar">
				<label class="custom-file">
					<input type="file" id="file" name="photo" class="custom-file-input">
					<span class="custom-file-control">{{__('Upload a different photo')}}</span>
				</label>
			</div>
			--}}
			<div class="col-lg-8 order-lg-2">
				<div class="tab-content py-4">
					<div class="tab-pane active text-dark" id="profile">
						<h5 class="mb-3">{{ __('New') .' '. __('User') }}</h5>
						<form class="was-validated" action="#" method="post">
							@csrf
							<div class="row">
								<div class="col-md-6">

									<div class="col-sm-12 mb-3">
										<label for="UserName">{{ __('Name') }}</label>
										<input type="text" name="name" class="form-control" id="UserName"
											   value="{{ __('Name') }}">
									</div>

									<div class="col-sm-12 mb-3">
										<label for="UserEmail">{{ __('E-mail Address') }}</label>
										<input type="text" name="email" class="form-control" id="UserEmail"
											   value="{{ __('E-mail Address') }}">
									</div>

									<div class="col-sm-12 mb-3">
										<label for="UserName">{{ __('Name') }}</label>
										<input type="text" name="name" class="form-control" id="UserName"
											   value="{{ __('Name') }}">
									</div>
								</div>
							</div>
							{{--
									<div class="col-sm-12 mb-3">
										<label for="Email">{{ __('E-Mail Address') }}</label>
										<input type="text" name="email" class="form-control" id="Email"
											   value="{{ old('email', $user->email) }}">
									</div>
									<div class="col-sm-12 mb-3">
										<label for="UserName">{{ __('User').' '.__('Name') }}</label>
										<input type="text" name="user_name" class="form-control" id="UserName"
											   value="{{ old('user_name', $user->user_name) }}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="col-sm-12 mb-3">
										<label for="Phone">{{__('Phone')}}</label>
										<input type="text" name="phone" class="form-control" id="Phone"
											   value="{{ old('phone', $user->phone) }}">
									</div>
									<div class="col-sm-12 mb-3">
										<label for="Address">{{__('Address')}}</label>
										<input type="text" name="address" class="form-control" id="Address"
											   value="{{ old('address', $user->address) }}">
									</div>
									<div class="col-sm-12 mb-3">
										<label for="Admin">{{__('Admin')}}</label>
										@if($user->admin)
											<label for="check1"><strong>Si</strong></label>
											<input id="check2" type="checkbox" checked disabled>

											<label for="check2"><strong>No</strong></label>
											<input id="check2" type="checkbox" disabled>
										@else
											<label for="check1"><strong>Si</strong></label>
											<input id="check2" type="checkbox" disabled>

											<label for="check2"><strong>No</strong></label>
											<input id="check2" type="checkbox" checked disabled>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<input type="hidden" name="password" class="form-control"
										   value="{{ old('password', $user->password) }}">
									<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
								</div>
							</div>--}}
						</form>
						<hr>
						<div class="row">
							<div class="col-md-6">
								<a href="{{ route('users.index') }}" class="btn btn-outline-dark">
									<i class="fa fa-arrow-left"></i> Volver</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('partials.footer')
@endsection
{{--	<form class="was-validated" action="{{ route('users.store') }}" method="post">--}}
{{--		@csrf--}}
{{--		@include('admin.partials.alert')--}}
{{--		@include('partials.errors')--}}
{{--		<div class="container mt-3">--}}
{{--			<div class="form-row">--}}

{{--				<div class="col-sm-6 mb-3">--}}
{{--					<label for="UserName">Nombre</label>--}}
{{--					<input type="text" name="name" class="form-control" id="UserName"--}}
{{--						   placeholder="Nombre del Usuario">--}}
{{--				</div>--}}

{{--				<div class="col-sm-6 mb-3">--}}
{{--					<label for="UserEmail">Correo electrónico</label>--}}
{{--					<input type="text" name="email" class="form-control" id="UserEmail"--}}
{{--						   placeholder="Email del Usuario">--}}
{{--				</div>--}}

{{--				<div class="col-sm-6 mb-3">--}}
{{--					<label for="UserPass">Contraseña</label>--}}
{{--					<input type="password" name="password" class="form-control" id="UserPass"--}}
{{--						   placeholder="Password del Usuario">--}}
{{--				</div>--}}

{{--				<div class="col-sm-6 mb-3">--}}
{{--					<label for="UserNick">Nick de Usuario</label>--}}
{{--					<input type="text" name="user_name" class="form-control" id="UserNick"--}}
{{--						   placeholder="Nick de Usuario">--}}
{{--				</div>--}}

{{--				<div class="col-sm-6 mb-3">--}}
{{--					<label for="UserImage">Imagen (por defecto)</label>--}}
{{--					<input name="image" class="form-control is-valid" id="UserImage" value="img/profile.jpg"--}}
{{--						   disabled>--}}
{{--				</div>--}}
{{--			</div>--}}

{{--			<button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i> Agregar</button>--}}
{{--	</form>--}}
{{--	</div>--}}

{{--	<div class="pt-4">--}}
{{--		<a href="{{ route('users.index') }}" class="btn btn-outline-dark"><i class="fas fa-arrow-circle-left"></i> Volver</a>--}}
{{--	</div>--}}

