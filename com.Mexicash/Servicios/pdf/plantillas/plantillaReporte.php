<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once (SQL_PATH."sqlReporteDAO.php");


function getInventario($opc){

    $sql = new sqlReporteDAO();
    $data = array();
    $plantilla = null;


    if($opc == 1){
        $data = $sql->traeInventario($opc);
        $plantilla = '';
    }else{
        if($opc == 2){
            $data = $sql->traeInventario($opc);
            $plantilla = '';
        }else{
            if($opc == 3){
                $data = $sql->traeInventario($opc);
                $plantilla = '';
            }else{
                if($opc == 4){
                    $data = $sql->traeInventario($opc);
                    $plantilla = '';
                }else{
                    if($opc == 5){
                        $data = $sql->traeInventario($opc);
                        $plantilla = '';
                    }
                }
            }
        }
    }

    return $plantilla;
}


function getPlantilla(){

    $plantilla = '<body>
    <header class="clearfix">
      <div id="logo">
        <img src="../../style/Img/LogoCH.jpeg">
      </div>
      <h1>Inventario Fisico</h1>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">C&Oacute;DIGO</th>
            <th class="desc">DESCRIPCI&Oacute;N</th>
            <th>CANTIDAD</th>
            <th>AVALUO</th>
            <th>PR&Eacute;STAMO</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">030224</td>
            <td class="desc">C&aacute;mara digital CASIO</td>
            <td class="unit">1</td>
            <td class="qty">$10000</td>
            <td class="total">$6500.00</td>
          </tr>
          <tr>
            <td class="service">132423</td>
            <td class="desc">Guitarra Fender Squire</td>
            <td class="unit">2</td>
            <td class="qty">$21000</td>
            <td class="total">$10000.00</td>
          </tr>
          <tr>
            <td class="service">732543</td>
            <td class="desc">Teclado rgb inal&aacute;mbrico</td>
            <td class="unit">1</td>
            <td class="qty">$700</td>
            <td class="total">$300.00</td>
          </tr>
          <tr>
            <td class="service">102190</td>
            <td class="desc">Tenis Jordan nuevos</td>
            <td class="unit">1</td>
            <td class="qty">$1300</td>
            <td class="total">$600.00</td>
          </tr>
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$17400.00</td>
          </tr>
          <tr>
            <td colspan="4">IVA 16%</td>
            <td class="total">$2784.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">$14616.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Recuerda desempeñar tus artículos antes de la fecha de vencimiento, ya que de lo contrario pasarán a ser propiedad de Mexicash.</div>
      </div>
    </main>
    <footer>
      Gracias por su preferencia y esperamos su recomendaci&oacute;n.
    </footer>
  </body>';

    return $plantilla;

}

function getReporteCliente($nombre, $curp){

$plantilla = '<body>
<header class="clearfix">
  <div id="logo">
    <img src="../../style/Img/LogoCH.jpeg">
  </div>
  <h1>Contrato de Empeño</h1>
  <div id="company" class="clearfix">
    <div>Mexicash</div>
    <div>725 Jamaica,<br /> GAM 07300, MX</div>
    <div>(+52) 7282-0450</div>
    <div><a href="contacto@mexicash.com">contacto@mexicash.com</a></div>
  </div>
  <div id="project">
    <div><span>PROGRAMA</span> Empeño</div>
    <div><span>CLIENTE</span> Alejandro Jair Ramos Peña</div>
    <div><span>DIRECCION</span> Jacarandas 32 col Centro del Cuauht&eacute;moc 04300 CDMX</div>
    <div><span>EMAIL</span> <a href="yayis-bros@hotmail.com">yayis-bros@hotmail.com</a></div>
    <div><span>FECHA MOVIMIENTO</span> Enero 09, 2020</div>
    <div><span>VENCIMIENTO</span> Marzo 31, 2020</div>
  </div>
</header>
<main>
  <table>
    <thead>
      <tr>
        <th class="service">C&Oacute;DIGO</th>
        <th class="desc">DESCRIPCI&Oacute;N</th>
        <th>CANTIDAD</th>
        <th>AVALUO</th>
        <th>PR&Eacute;STAMO</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="service">030224</td>
        <td class="desc">C&aacute;mara digital CASIO</td>
        <td class="unit">1</td>
        <td class="qty">$10000</td>
        <td class="total">$6500.00</td>
      </tr>
      <tr>
        <td class="service">132423</td>
        <td class="desc">Guitarra Fender Squire</td>
        <td class="unit">2</td>
        <td class="qty">$21000</td>
        <td class="total">$10000.00</td>
      </tr>
      <tr>
        <td class="service">732543</td>
        <td class="desc">Teclado rgb inal&aacute;mbrico</td>
        <td class="unit">1</td>
        <td class="qty">$700</td>
        <td class="total">$300.00</td>
      </tr>
      <tr>
        <td class="service">102190</td>
        <td class="desc">Tenis Jordan nuevos</td>
        <td class="unit">1</td>
        <td class="qty">$1300</td>
        <td class="total">$600.00</td>
      </tr>
      <tr>
        <td colspan="4">SUBTOTAL</td>
        <td class="total">$17400.00</td>
      </tr>
      <tr>
        <td colspan="4">IVA 16%</td>
        <td class="total">$2784.00</td>
      </tr>
      <tr>
        <td colspan="4" class="grand total">TOTAL</td>
        <td class="grand total">$14616.00</td>
      </tr>
    </tbody>
  </table>
  <div id="notices">
    <div>NOTA:</div>
    <div class="notice">Recuerda desempeñar tus artículos antes de la fecha de vencimiento, ya que de lo contrario pasarán a ser propiedad de Mexicash.</div>
  </div>
</main>
<footer>
  Gracias por su preferencia y esperamos su recomendaci&oacute;n.
</footer>
</body>';

return $plantilla;

}

function getReportes($opc){

    }

