{{--
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
</div>--}}

<!-- Invoice Table -->
<table width="100%" class="table" border="0">
    <tr>
        <th align="left">Nombre</th>
        <th align="right">Precio</th>
        <th align="right">Unidades</th>
        <th align="right">Subtotal</th>
    </tr>

    @foreach ($cart->details as $detail)
        <tr>
            <td>{{ $detail->product->name }}</td>
            <td>{{ $detail->price }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>{{ $detail->subtotal }}</td>
        </tr>
@endforeach

<!-- Display The Final Total -->
    <tr style="border-top:2px solid #000;">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="text-align: right;"><strong>Subtotal</strong></td>
        <td>{{ $cart->total }}</td>
    </tr>
    <tr style="border-top:2px solid #000;">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="text-align: right;"><strong>IVA 21%</strong></td>
        <td>21%</td>
    </tr>
    <tr style="border-top:2px solid #000;">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="text-align: right;"><strong>Total</strong></td>
        <td>{{ $cart->total * (1.21) }}€</td>
    </tr>
</table>
