<!DOCTYPE html>
<html lang="en">
@include("pdf.partials.style_admin")
<body>
<div class="container">
    <table style="margin-left: auto; margin-right: auto" width="550">
        <tr>
            <td width="160">
                &nbsp;
            </td>
            <!-- Organization Name / Image -->
            <td align="right">
                {{ config ('app.name') }}
            </td>
        </tr>
        <tr valign="top">
            <td style="font-size:28px;color:#cccccc;">
                <span class="portador">Factura emitida al vendedor</span>
            </td>
            <!-- Organization Name / Date -->
            <td>
                <br><br>
                <strong>To:</strong> {{ $user->name }}
                <br>
                <strong>Date:</strong> {{ \Carbon\Carbon::now()->format('d/m/Y') }}
            </td>
        </tr>
        <tr valign="top">
            <!-- Organization Details -->
            <td style="font-size:9px;">
                Cliente: {{ $user->name }}<br>
                Dirección: {{ $user->address }}<br>
                Correo: {{ $user->email }}<br>
                Teléfono: {{ $user->phone }}

            </td>
            <td>
                <!-- Invoice Info -->
                <p>
                    <strong>Vendedor:</strong> {{ config ('app.name') }}<br>
                    <strong>Nº Factura:</strong> {{rand(1,2000)}}<br>
                </p>

                <br><br>
                @include("pdf.partials.factura")
            </td>
        </tr>
    </table>
</div>
</body>
</html>
