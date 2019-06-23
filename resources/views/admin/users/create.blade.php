@extends('layouts.app')
@section('title', 'Nuevo Usuario')
@section('body-class', 'profile-page sidebar-collapse')
@section('content')

@include('admin.partials.page-header')

<form class="was-validated" action="{{ route('users.store') }}" method="post">
	@csrf
	@include('admin.partials.alert')
	@include('partials.errors')
	<div class="container mt-3">
	<div class="form-row">

		<div class="col-sm-6 mb-3">
			<label for="UserName">Nombre</label>
			<input type="text" name="name" class="form-control" id="UserName"
			placeholder="Nombre del Usuario">
		</div>

		<div class="col-sm-6 mb-3">
			<label for="UserEmail">Correo electrónico</label>
			<input type="text" name="email" class="form-control" id="UserEmail"
			placeholder="Email del Usuario">
		</div>

		<div class="col-sm-6 mb-3">
			<label for="UserPass">Contraseña</label>
			<input type="password" name="password" class="form-control" id="UserPass"
			placeholder="Password del Usuario">	
		</div>

		<div class="col-sm-6 mb-3">
			<label for="UserNick">Nick de Usuario</label>
			<input type="text" name="user_name" class="form-control" id="UserNick"
			placeholder="Nick de Usuario">	
		</div>

		<div class="col-sm-6 mb-3">
			<label for="UserImage">Imagen (por defecto)</label>
			<input name="image" class="form-control is-valid" id="UserImage" value="img/profile.jpg"
			disabled>
		</div>
	</div>
	
	<button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i> Agregar</button>
</form>
</div>

<div class="pt-4">
	<a href="{{ route('users.index') }}" class="btn btn-outline-dark"><i class="fas fa-arrow-circle-left"></i> Volver</a>
</div>


@endsection