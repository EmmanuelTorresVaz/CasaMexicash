<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Auto.php");
include_once(BASE_PATH . "Conexion.php");

class sqlAutoDAO
{
    protected $conexion;
    protected $db;


    public function __construct()
    {
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    public function generaContratoAuto($auto)
    {
        // TODO: Implement guardaCiente() method.
        try {

            $id_Cliente = $auto->getIdClienteAuto();
            $id_Interes = $auto->getIdInteres();
            $folio = $auto->getFolio();
            $fechaVencimiento = $auto->getFechaVencimiento();
            $totalAvaluo = $auto->getTotalAvaluo();
            $totalPrestamo = $auto->getTotalPrestamo();
            $abono = $auto->getAbono();
            $interes = $auto->getIdInteres();
            $pago = $auto->getPago();
            $fechaAlm = $auto->getFechaAlm();
            $fechaMovimiento = $auto->getFechaMovimiento();
            $origenFolio = $auto->getOrigenFolio();
            $destFolio = $auto->getDestFolio();
            $estatus = $auto->getEstatus();
            $observaciones = $auto->getObservaciones();
            $usuario = $auto->getUsuario();
            $fechaCreacion = date('d-m-Y');
            $fechaModificacion = date('d-m-Y');

            $insertaContrato = "INSERT INTO contrato_tbl " .
                "(id_Cliente, id_Interes, folio, fecha_Vencimiento, total_Avaluo, total_Prestamo, abono, intereses, pago,  " .
                "fecha_Alm, fecha_Movimiento, origen_Folio, dest_Folio, id_Estatus, observaciones, fecha_creacion, fecha_modificacion, usuario) VALUES " .
                "('" . $id_Cliente . "', '" . $id_Interes . "', '" . $folio . "', '" . $fechaVencimiento . "', '" . $totalAvaluo . "', '" . $totalPrestamo .
                " .', '" . $abono . "', '" . $interes . "', '" . $pago . "', '" . $fechaAlm . "', '" . $fechaMovimiento . "', '" . $origenFolio .
                "', '" . $destFolio . "', '" . $estatus . "', '" . $observaciones . "', '" . $fechaCreacion . "', '" . $fechaModificacion . "', '" . $usuario . "')";

            if ($ps = $this->conexion->prepare($insertaContrato)) {
                if ($ps->execute()) {

                    if (mysqli_stmt_affected_rows($ps) == 1) {
                        $buscar = "select max(id_Contrato) as idContrato  from contrato_tbl ";
                        $statement = $this->conexion->query($buscar);
                        $fila = $statement->fetch_object();

                        $idContratoAuto = $fila->idContrato;
                        $idTipoVehiculo = $auto->getidTipoVehiculo();
                        $idMarca = $auto->getidMarca();
                        $idModelo = $auto->getidModelo();
                        $idAnio = $auto->getidAnio();
                        $idColor = $auto->getidColor();
                        $idPlacas = $auto->getidPlacas();
                        $idFactura = $auto->getidFactura();
                        $idKms = $auto->getidKms();
                        $idAgencia = $auto->getidAgencia();
                        $idMotor = $auto->getidMotor();
                        $idSerie = $auto->getidSerie();
                        $idVehiculo = $auto->getidVehiculo();
                        $idRepuve = $auto->getidRepuve();
                        $idGasolina = $auto->getidGasolina();
                        $idAseguradora = $auto->getidAseguradora();
                        $idTarjeta = $auto->getidTarjeta();
                        $idPoliza = $auto->getidPoliza();
                        $idFecVencimientoAuto = $auto->getidFecVencimientoAuto();
                        $idTipoPoliza = $auto->getidTipoPoliza();
                        $idObservacionesAuto = $auto->getidObservacionesAuto();
                        $idCheckTarjeta = $auto->getidCheckTarjeta();
                        $idCheckFactura = $auto->getidCheckFactura();
                        $idCheckINE = $auto->getidCheckINE();
                        $idCheckImportacion = $auto->getidCheckImportacion();
                        $idCheckTenecia = $auto->getidCheckTenecia();
                        $idCheckPoliza = $auto->getidCheckPoliza();
                        $idCheckLicencia = $auto->getidCheckLicencia();

                        $insertaAuto = "INSERT INTO auto_tbl(id_Contrato, tipo_Vehiculo,marca, modelo, año, color, placas, factura," .
                            " kilometraje, agencia, num_motor, serie_chasis, vin, repuve, gasolina, tarjeta_circulacion, aseguradora, poliza, fechaVencimiento," .
                            " tipoPoliza, observaciones, chkTarjeta, chkFactura, chkINE, chkImportacion, chkTenencias, chkPoliza, chkLicencia, fecha_creacion, fecha_modificacion, usuario)" .
                            " VALUES ('" . $idContratoAuto . "', '" . $idTipoVehiculo . "', '" . $idMarca . "', '" . $idModelo . "'," .
                            " '" . $idAnio . "', '" . $idColor . "', '" . $idPlacas . "', '" . $idFactura . "', '" . $idKms . "','" . $idAgencia . "','" . $idMotor . "'," .
                            " '" . $idSerie . "', '" . $idVehiculo . "', '" . $idRepuve . "', '" . $idGasolina . "', '" . $idTarjeta . "','" . $idAseguradora . "','" . $idPoliza . "'," .
                            " '" . $idFecVencimientoAuto . "', '" . $idTipoPoliza . "', '" . $idObservacionesAuto . "', '" . $idCheckTarjeta . "', '" . $idCheckFactura . "','" . $idCheckINE . "'," .
                            " '" . $idCheckImportacion . "', '" . $idCheckTenecia . "', '" . $idCheckPoliza . "', '" . $idCheckLicencia . "', '" . $fechaCreacion . "','" . $fechaModificacion . "','" . $usuario . "')";

                        if ($ps = $this->conexion->prepare($insertaAuto)) {
                            if ($ps->execute()) {
                                $verdadAuto = mysqli_stmt_affected_rows($ps);
                                if($verdadAuto > 0){
                                    $verdad = true;
                                }
                            } else {
                                $verdad = false;
                            }
                        } else {
                            $verdad = false;
                        }
                    } else {
                        $verdad = false;
                    }
                } else {
                    $verdad = false;
                }
            } else {
                $verdad = false;
            }
        } catch (Exception $exc) {
            $verdad = false;
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        //return $verdad;
        echo $verdad;

    }
}