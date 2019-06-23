<br>
<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Fecha del pedido</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$cart->order_date->format('d-m-Y')}}</td>
    </tr>
    </tbody>
</table>
<hr>
<div class="cabecera">
    <div>Detalles del pedido</div>
</div>
<table>
    <thead>
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cart->details as $detail)
        <tr>
            <td>{{ $detail->product->name }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>{{ $detail->quantity * $detail->product->price }}€</td>
        </tr>
    @endforeach
</table>
<br>
<hr>
<div class="producto">
    <ol class="total">
        <li><strong>Total(Sin Iva): </strong> {{ $cart->total }}€</li>
        <li><strong>Iva: </strong>21%</li>
        <li><strong>Importe a Pagar(Con Iva): </strong> {{ $cart->total * (1.21) }}€</li>
    </ol>
</div>