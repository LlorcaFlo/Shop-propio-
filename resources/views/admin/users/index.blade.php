@extends('layouts.app')
@section('title', 'Listado de Usuarios')
@section('body-class', 'profile-page sidebar-collapse')
@section('content')

    <!-------VISTA LISTADO-CRUD DE PRODUCTOS ----------->
@include('admin.partials.page-header')

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de Usuarios</h2>
            <div class="team">

                <div class="row justify-content-center">

                    <!------         BUTTON 'NUEVO PRODUCTO'          ----------->
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-round mb-4">
                        Nuevo Usuario
                    </a>
                     @include('admin.partials.alert')
                    <!-------    TABLA-CRUD PRODUCTS    ----------->
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="col-md-2">Email</th>
                            <th class="col-md-2">Nombre Usuario</th>
                            <th class="col-md-2">Usuario creado</th>
                            <th class="col-md-2">Ultimo inico de sesión</th>

                            <th class="text-right">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->user_name }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>{{ $user->last_logged_at->diffForHumans()}}</td>
                                <td class="td-actions text-right">

                                <!-------  FORM | ELIMINAR PRODUCTO ( CONTIENE BOTONES CRUD DEL PRODUCTO ) --->
                                <a href="{{ route('users.show', $user->id) }}" rel="tooltip" class="btn btn-info btn-sm" title="Ver usuario"><i class="fa fa-info"></i>
                                </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@include ('partials.footer')
@endsection

