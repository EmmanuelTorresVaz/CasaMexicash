<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .letraNormalNegrita {
            font-size: 1.2em;
            font-weight: bold;
        }

        .letraGrandeNegrita {
            font-size: 1.6em;
            font-weight: bold;
        }

        .letraChicaNegrita {
            font-size: .8em;
            font-weight: bold;
        }

        .letraNormal {
            font-size: 1.2em;
        }

        .letraGrande {
            font-size: 1.6em;
        }

        .letraChica {
            font-size: .8em;
        }
    </style>
</head>
<body>
<form>
    <table width="100%" border="1">
        <tbody>
        <tr>
            <td colspan="12" align="right">
                <label class="letraGrandeNegrita"> Contrato No. ' . $idContrato . '</label>
            </td>
        </tr>
        <tr>
            <td colspan="12">
                <label class="letraChica">
                    Fecha de celebración del contrato: CIUDAD DE MEXICO NA a ' . $FechaCreacion . '
                </label>
                <label class="letraChicaNegrita">
                    CONTRATO DE MUTUO CON INTERÉS Y GARANTÍA PRENDARIA (PRESTAMO),</label>
                <label class="letraChica">
                    que celebran: MIRIAM GAMA VAZQUEZ,
                    "EL PROVEEDOR", con
                    domicilio en: AV. AZTECAS 4380 CIUDAD DE MEXICO NA , R.F.C.: GAVM800428KQ3, Tel.: 5525252125, correo
                    electrónico: na, y el "EL CONSUMIDOR",
                    ' . $NombreCompleto . ' que se identifica con:
                    número: ' . $NumIde . ' con domicilio en:
                    ' . $Direccion . '
                    Tel.: ' . $Telefono . ' y Cel: ' . $Celular . 'correo electrónico:' . $Correo . '
                    quien designa como cotitular a:' . $Cotitular . '
                    y beneficiario a: ' . $Beneficiario . '
                </label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><label class="letraNormalNegrita">Cat Costo Anual Total </label></td>
            <td colspan="2"><label class="letraNormalNegrita">TASA DE INTERES ANUAL </label></td>
            <td colspan="2"><label class="letraNormalNegrita">MONTO DEL PRETAMO(MUTUO) </label></td>
            <td colspan="2"><label class="letraNormalNegrita">MONTO TOTAL A PAGAR </label></td>
            <td colspan="4"><label class="letraNormalNegrita">COMISIONES Montos y cláusulas </label></td>
        </tr>
        <tr>
            <td colspan="2"><label class="letraNormal">Para fines
                    informativos
                    y de comparación
                    155.70 %???
                    FIJO SIN IVA
            </td>
            <td colspan="2">
                <label class="letraNormal">
                    36.00 % ????
                    TASA FIJA
                </label>
            </td>
            <td colspan="2"><label class="letraNormal">' . $MontoPrestamo . '
                    Moneda Nacional
                </label>
            </td>
            <td colspan="2"><label class="letraNormal">' . $MontoTotal . '
                    Estimado al plazo máximo de desempeño
                    o refrendo.
                </label>
            </td>
            <td colspan="4">
                <label class="letraChica">
                    Comisión por Almacenaje:' . $Almacenaje . ' % (Claus. 11 a)
                    Comisión por Avalúo $ 0.00 ??(Claus. 11 b)
                    Comisión por Comercialización: 10.00% ??(Claus. 11
                    c)
                    Comisión por reposición de contrato $ 0.00 ??(Claus. 11 d)
                    Desempeño Extemporáneo: 0.00% ??(Claus. 11 e)
                    Gastos de Administración $ 0.00 ???(Claus 11 f)
                </label>

            </td>
        </tr>
        <tr>
            <td colspan="12">
                <label class="letraChica">
                    METODOLOGIA DE CALCULO DE INTERES: TASA DE INTERES FIJA DIVIDIDA ENTRE 360 DIAS POR EL
                    IMPORTE DEL SALDO INSOLUTO DEL PRESTAMO POR EL
                    NUMERO DE DIAS EFECTIVAMENTE TRANSCURRIDOS.
                </label>
            </td>
        </tr>
        <tr>
            <td colspan="12">
                <label class="letraChica">
                    PLAZO DEL PRESTAMO (Fecha limite para el refrendo o desempeño):' . $FechaAlmoneda . '.
                    Total de
                    refrendos aplicables:
                    Su pago sera: ' . $diasLabel . '. Metodos de pago aceptado: efectivo, tarjetas de credito y
                    debito,
                    transferencias. En caso de que el vencimiento sea en dia inhabil, se
                    considerara el dia habil siguiente.
                </label>
            </td>
        </tr>
        <tr>
            <td colspan="12">
                <label class="letraNormal">
                    Opciones de pago
                    para refrendo o
                    desempeño
                </label>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <label class="letraNormal">
                    MONTO
                </label>
            </td>
            <td colspan="6">
                <label class="letraNormal">
                    TOTAL A PAGAR
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <label class="letraNormal">
                    NÚMERO
                </label>
            </td>
            <td colspan="2">
                <label class="letraNormal">
                    IMPORTE MUTUO
                </label>
            </td>
            <td>
                <label class="letraNormal">
                    INTERESES
                </label>
            </td>
            <td>
                <label class="letraNormal">
                    ALMACENAJE
                </label>
            </td>
            <td><label class="letraNormal">
                    IVA
                </label>
            </td>
            <td colspan="2">
                <label class="letraNormal">
                    POR REFRENDO
                </label>
            </td>
            <td colspan="2">
                <label class="letraNormal">
                    POR DESEMPEÑO
                </label>
            </td>
            <td colspan="2">
                <label class="letraNormal">
                    CUANDO SE
                    REALIZAN LOS
                    PAGOS
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <label class="letraNormal">
                    1
                </label>
            </td>
            <td colspan="2">
                <label class="letraNormal">
                    '. $MontoPrestamo .'
                </label>
            </td>
            <td>
                <label class="letraNormal">
                    ' .$calculaALm. '
                </label>
            </td>
            <td>
                <label class="letraNormal">
                    ' .$calculaInteres. '
                </label>
            </td>
            <td><label class="letraNormal">
                    ' .$calculaIva. '
                </label>
            </td>
            <td colspan="2">
                <label class="letraNormal">
                    ' .$Intereses. '
                </label>
            </td>
            <td colspan="2">
                <label class="letraNormal">
                    ' .$MontoTotal. '
                </label>
            </td>
            <td colspan="2">
                <label class="letraNormal">
                    ' .$FechaVenc. '
                </label>
            </td>
        </tr>
        <tr>
            <td colspan="6"><label class="letraNormalNegrita"> COSTO MENSUAL TOTAL</label></td>
            <td colspan="6"><label class="letraNormalNegrita"> COSTO DIARIO TOTAL</label></td>
        </tr>
        <tr>
            <td colspan="6"><label class="letraNormalNegrita"> Para fines informativos y de comparación:
                    '.$tasaIvaTotal.'% FIJO SIN IVA</label>
            </td>
            <td colspan="6"><label class="letraNormalNegrita"> Para fines informativos y de comparación:
                    '.$tasaDiaria.'% FIJO SIN IVA</label>
            </td>
        </tr>
        <tr>
            <td colspan="12">
                <label class="letraChicaNegrita">
                    "Cuide su capacidad de pago, generalmente no debe de exceder del 35% de sus ingresos".
                    "Si usted no paga en tiempo y forma corre el riesgo de perder sus prendas".
                </label>
            </td>
        </tr>
        <tr>
            <td colspan="12">
                <label class="letraChicaNegrita">
                    GARANTÍA: Para garantizar el pago de este prestamo, EL CONSUMIDOR deja en garantia el bien que se
                    describe a continuacion:
                </label>
            </td>
        </tr>
        <tr>
            <td colspan="12">
                <label class="letraNormalNegrita">
                    DESCRIPCION DE LA PRENDA
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <label class="letraNormalNegrita">DESCRIPCIÓN
                    GENÉRICA
                </label>
            </td>
            <td colspan="5"><label class="letraNormalNegrita">CARACTERISTICAS</label></td>
            <td colspan="2"><label class="letraNormalNegrita">AVALÚO</label></td>
            <td colspan="2"><label class="letraNormalNegrita">PRÉSTAMO</label></td>
            <td colspan="2"><label class="letraNormalNegrita">%PRÉSTAMO SOBRE
                    AVALÚO</label>
            </td>
        </tr>