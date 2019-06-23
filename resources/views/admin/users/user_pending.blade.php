@extends('layouts.app')
@section('title', 'Pedidos Realizados')
@section('body-class', 'profile-page sidebar-collapse')
@section('content')

    @include('admin.partials.page-header')
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Pedidos del usuario</h2>
                <div class="team">
                    <div class="row justify-content-center">
                        <!-------    TABLA-CRUD PRODUCTS    ----------->
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-md-2">Nombre producto</th>
                                <th class="col-md-2">Cantidad</th>
                                <th class="col-md-4">Nº de Pedido</th>
                                <th class="col-md-4">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $cart)
                                @foreach ($cart->details as $detail)
                                <tr>
                                    <td class="text-center">{{ $detail->product->name }}</td>
                                   <td>{{ $detail->quantity }}</td>
                                   <td>{{ $detail->id }}</td>
                                   <td>{{ $detail->quantity * $detail->product->price }} €</td>
                                    
                                </tr> 
                                @endforeach
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

