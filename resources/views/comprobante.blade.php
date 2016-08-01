<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0"/>
    <link rel="stylesheet" href="css/print.css"/>
    <title>Recibo de Caja</title>
</head>
<body class="comprobante">
<main class="ed-container">
    <div class="ed-item">
        @for($i = 1; $i <= 2; $i++)
        <div class="comprobante">
            <table class="bodycontainer">
                <tr class="bodycontainer__row">
                    <td class="bodycontainer__col"><img src="img/logo.png"/></td>
                    <td class="bodycontainer__col bodycontainer--title">RECIBO DE CAJA</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="bodycontainer__serie"><p>N° {{ str_pad($venta[0]->id_venta, 6, "0", STR_PAD_LEFT) }}</p></td>
                </tr>
            </table>
            <table class="maincontainer">
                <tr>
                    <td class="maincontainer__title">FECHA:</td>
                    <td>{{ $venta[0]->fecha }}</td>
                    <td class="maincontainer__title">VALOR:</td>
                    <td>U$D {{ $venta[0]->precio }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="maincontainer__title">RECIBI DE:</td>
                    <td colspan="2">{{ $venta[0]->ra }} {{ $venta[0]->rn }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="maincontainer__title">LA CANTIDAD DE:</td>
                    <td colspan="2">Doce dólares 0/100</td>
                </tr>
                <tr>
                    <td colspan="2" class="maincontainer__title">POR CONCEPTO DE:</td>
                    <td colspan="2">{{ $venta['0']->detalle }}</td>
                </tr>
            </table>
            <table class="footercontainer">
                <tr class="footercontainer__firma">
                    <td>Firma</td>
                    <td>Firma</td>
                </tr>
                <tr>
                    <td class="footercontainer__title">ENTREGUE CONFORME</td>
                    <td class="footercontainer__title">RECIBI CONFORME</td>
                </tr>
            </table>
        </div>
        @endfor
    </div>
</main>
</body>
</html>