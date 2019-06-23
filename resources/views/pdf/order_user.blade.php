<!DOCTYPE html>
<html>
<head>
    <style>
        .margen{
            padding: 40px;
            border-radius: 20px;
        }
        .cabecera div{
            background-color:grey;
            color:white;
            border-radius: 10px;
            margin: auto;
            width: 200;
            text-align: center;
            padding: 4px;

        }
        .cabecera h6{
            text-align: center;
        }
        .cabecera h4{
            float: right;
            text-align: center;
            color:rgb(30,144,255);
            padding: 10px;
        }
        .total {
            float: right;
            list-style: none;
            margin: 5px;
        }
        table{
            padding: 4px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="margen">
    <div class="cabecera">
        <div>Llorca-Shop</div>
        <h6>Su pedido se ha realizado correctamente el día: {{$cart->order_date->format('d-m-Y')}}</h6>
        <h4>Ejemplar para el comprador</h4>
    </div>
    @include("pdf.partials.factura")
</div>
</body>
</html>