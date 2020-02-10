<?php
if(!isset($_SESSION)) {
    session_start();
}
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
            $fechaVencimiento = $auto->getFechaVencimiento();
            $totalAvaluo = $auto->getTotalAvaluo();
            $totalPrestamo = $auto->getTotalPrestamo();
            $totalInteres = $auto->getTotalInteres();
            $sumaInteresPrestamo = $auto->getSumaInteresPrestamo();
            $polizaInteres = $auto->getPolizaSeguroCost();
            $gps = $auto->getGps();
            $pension = $auto->getPension();
            $fechaAlm = $auto->getFechaAlm();
            $estatus = $auto->getEstatus();
            $beneficiario = $auto->getBeneficiario();
            $cotitular = $auto->getCotitular();
            $plazo = $auto->getPlazo();
            $tasa = $auto->getTasa();
            $alm = $auto->getAlm();
            $seguro = $auto->getSeguro();
            $iva = $auto->getIva();
            $dias = $auto->getDias();
            $fechaCreacion = date('Y-m-d H:i:s');
            $fechaModificacion = date('Y-m-d H:i:s');
            $usuario = $_SESSION["idUsuario"];
            $sucursal = $_SESSION["sucursal"];
            $insertaContrato = "INSERT INTO contrato_tbl " .
                "(id_Cliente, fecha_Vencimiento, total_Avaluo, total_Prestamo,total_Interes, suma_InteresPrestamo, polizaSeguro, gps, pension, " .
                "fecha_Alm, id_Estatus,beneficiario, cotitular, plazo,tasa, alm, seguro,iva,dias, fecha_creacion, fecha_modificacion, usuario,sucursal,tipoContrato) VALUES " .
                "('" . $id_Cliente . "', '" . $fechaVencimiento . "', '" . $totalAvaluo . "','" . $totalPrestamo . "','" . $totalInteres . "', '" . $sumaInteresPrestamo . "', '" . $polizaInteres . "','" . $gps . "', '" . $pension .
                "', '" . $fechaAlm . "', '" . $estatus . "','" . $beneficiario . "','" . $cotitular . "','" . $plazo . "','" . $tasa . "','" . $alm . "','" . $seguro . "','" . $iva . "','" . $dias . "','" . $fechaCreacion . "', '" . $fechaModificacion . "', '" . $usuario . "','" . $sucursal . "',2)";

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
                            " tipoPoliza, observaciones, chkTarjeta, chkFactura, chkINE, chkImportacion, chkTenencias, chkPoliza, chkLicencia, fecha_creacion, fecha_modificacion, usuario,sucursal,id_Estatus)" .
                            " VALUES ('" . $idContratoAuto . "', '" . $idTipoVehiculo . "', '" . $idMarca . "', '" . $idModelo . "'," .
                            " '" . $idAnio . "', '" . $idColor . "', '" . $idPlacas . "', '" . $idFactura . "', '" . $idKms . "','" . $idAgencia . "','" . $idMotor . "'," .
                            " '" . $idSerie . "', '" . $idVehiculo . "', '" . $idRepuve . "', '" . $idGasolina . "', '" . $idTarjeta . "','" . $idAseguradora . "','" . $idPoliza . "'," .
                            " '" . $idFecVencimientoAuto . "', '" . $idTipoPoliza . "', '" . $idObservacionesAuto . "', '" . $idCheckTarjeta . "', '" . $idCheckFactura . "','" . $idCheckINE . "'," .
                            " '" . $idCheckImportacion . "', '" . $idCheckTenecia . "', '" . $idCheckPoliza . "', '" . $idCheckLicencia . "', '" . $fechaCreacion . "','" . $fechaModificacion . "','" . $usuario . "','" . $sucursal . "','" . $estatus . "')";

                        if ($ps = $this->conexion->prepare($insertaAuto)) {
                            if ($ps->execute()) {
                                $verdad =  mysqli_stmt_affected_rows($ps);
                            } else {
                                $verdad = -1;
                            }
                        } else {
                            $verdad = -1;
                        }
                    } else {
                        $verdad = -1;
                    }
                } else {
                    $verdad = -1;
                }
            } else {
                $verdad = -1;
            }
        } catch (Exception $exc) {
            $verdad = -1;
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        //return $verdad;
        echo $verdad;

    }
}