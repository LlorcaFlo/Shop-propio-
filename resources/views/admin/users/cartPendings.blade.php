@extends('layouts.app')
@section('title', 'Pedidos Realizados')
@section('body-class', 'profile-page sidebar-collapse')
@section('content')

    @include('admin.partials.page-header')
    
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Listado de Usuarios con Pedidos</h2>
                <div class="team">
                    <div class="row justify-content-center">

                        <!------         BUTTON 'NUEVO PRODUCTO'      --------->
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-round mb-4">
                            Nuevo Usuario
                        </a>

                        <!-------    TABLA-CRUD PRODUCTS    ----------->
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-md-2">ID</th>
                                <th class="col-md-2">Nombre</th>
                                <th class="col-md-4">Nº de Pedidos</th>
                                <th class="col-md-4">Total gastado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td>{{ $user->user_name }}</td>
                                    <td>
                                        <a href="{{ route('user_pendings', $user->id) }}"
                                        rel="tooltip" class="btn btn-info btn-sm"
                                        title="Ir a los pedidos">
                                            {{ $user->cart_pending->count() }}
                                        </a>
                                    </td>    
                                    <td>{{ $user->details_carts_pending }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include ('partials.footer')
@endsection

