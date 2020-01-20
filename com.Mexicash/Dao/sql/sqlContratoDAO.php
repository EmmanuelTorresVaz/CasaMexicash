<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Contrato.php");
include_once(BASE_PATH . "Conexion.php");

class sqlContratoDAO
{

    protected $conexion;
    protected $db;


    public function __construct()
    {
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }
    public function guardarContrato(Contrato $contrato)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $idContrato = $contrato->getIdContrato();
            $id_Cliente = $contrato->getIdCliente();
            $id_Interes = $contrato->getIdInteres();
            $folio = $contrato->getFolio();
            $fechaVencimiento = $contrato->getFechaVencimiento();
            $totalAvaluo = $contrato->getTotalAvaluo();
            $totalPrestamo = $contrato->getTotalPrestamo();
            $abono = $contrato->getAbono();
            $interes = $contrato->getIdInteres();
            $pago = $contrato->getPago();
            $fechaAlm = $contrato->getFechaAlm();
            $fechaMovimiento = $contrato->getFechaMovimiento();
            $origenFolio = $contrato->getOrigenFolio();
            $destFolio = $contrato->getDestFolio();
            $estatus = $contrato->getEstatus();
            $observaciones = $contrato->getObservaciones();
            $beneficiario = $contrato->getBeneficiario();
            $cotitular = $contrato->getCotitular();
            $fechaCreacion = date('Y-m-d H:i:s');
            $fechaModificacion = date('Y-m-d H:i:s');
            $usuario = $_SESSION["idUsuario"];

            $insertaContrato = "INSERT INTO contrato_tbl " .
                "(id_Contrato, id_Cliente, id_Interes, folio, fecha_Vencimiento, total_Avaluo, total_Prestamo, abono, intereses, pago,  " .
                "fecha_Alm, fecha_Movimiento, origen_Folio, dest_Folio, id_Estatus, observaciones, cotitular,beneficiario, fecha_creacion, fecha_modificacion, usuario) VALUES ".
                "('" . $idContrato . "', '" . $id_Cliente . "', '" . $id_Interes . "', '" . $folio . "', '" . $fechaVencimiento . "', '" . $totalAvaluo . "', '" . $totalPrestamo .
                " .', '" . $abono . "', '" . $interes . "', '" . $pago . "', '" . $fechaAlm . "', '" . $fechaMovimiento . "', '" . $origenFolio .
                "', '" . $destFolio . "', '" . $estatus . "', '" . $observaciones . "', '" . $beneficiario . "','" . $cotitular . "','" . $fechaCreacion . "', ". "'" . $fechaModificacion . "', '" . $usuario . "')";

            if ($ps = $this->conexion->prepare($insertaContrato)) {
                if ($ps->execute()) {
                    $verdad = true;
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
            $verdad = false;
            $this->db->closeDB();
        }
        //return $verdad;
        echo $verdad;
    }
    public function actualizarArticulo($contrato){
        // TODO: Implement guardaCiente() method.
        try {

            $updateArticulo = "UPDATE articulo_tbl SET id_Contrato='$contrato' WHERE id_ContratoTemp='$contrato'";

            if ($ps = $this->conexion->prepare($updateArticulo)) {
                if ($ps->execute()) {
                    $verdad =  mysqli_stmt_affected_rows($ps);
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
    function buscarContratoTemp()
    {
        try {
            $id = -1;

            $buscar = "select max(id_Contrato) as contratoTemp  from contrato_tbl ";

            $statement = $this->conexion->query($buscar);

            if ($statement->num_rows > 0) {
                $fila = $statement->fetch_object();
                $id = $fila->contratoTemp;
            }

        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        return $id;
    }
    public function articulosObsoletos()
    {
        // TODO: Implement guardaCiente() method.
        try {
            $eliminarArticulo = "DELETE FROM articulo_tbl WHERE id_Contrato <> id_ContratoTemp";

            if ($this->conexion->query($eliminarArticulo) === TRUE) {
                $verdad = 1;
            } else {
                $verdad = 2;
            }
        } catch (Exception $exc) {
            $verdad = 4;
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        //return $verdad;
        echo $verdad;
    }
    public function buscarContrato($contrato, $nombre, $celular)
    {
        $datos = array();
        try {
            $buscar = "";
            if ($nombre == 0) {
                $buscar = "select c.id_Contrato, c.id_Cliente, c.id_Interes, c.folio, c.fecha_creacion, c.fecha_Vencimiento, c.total_Avaluo, c.total_Prestamo, 
                c.abono, c.pago, c.fecha_Alm, c.fecha_Movimiento, c.id_Estatus, a.detalle, c.observaciones, a.cantidad 
                from contrato_tbl as c inner join articulo_tbl as a on c.id_Contrato = a.id_Contrato where c.id_Contrato = " . $contrato . ";";
            }
            if ($contrato == 0) {
                $buscar = "select c.id_Contrato, c.id_Cliente, c.id_Interes, c.folio, c.fecha_creacion, c.fecha_Vencimiento, c.total_Avaluo, c.total_Prestamo, 
                c.abono, c.pago, c.fecha_Alm, c.fecha_Movimiento, c.id_Estatus, a.detalle, c.observaciones, a.cantidad 
                from contrato_tbl as c inner join articulo_tbl as a on c.id_Contrato = a.id_Contrato inner join cliente_tbl as cl on cl.id_Cliente = c.id_Cliente 
                where concat(cl.nombre, ' ', cl.apellido_Pat, ' ', cl.apellido_Mat) = '" . $nombre . "' and cl.celular = " . $celular . ";";

            }

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        //Contrato
                        "id_Contrato" => $row["id_Contrato"],
                        "id_Cliente" => $row["id_Cliente"],
                        "id_Interes" => $row["id_Interes"],
                        "folio" => $row["folio"],
                        "fecha_creacion" => $row["fecha_creacion"],
                        "fecha_vencimiento" => $row["fecha_Vencimiento"],
                        "total_avaluo" => $row["total_Avaluo"],
                        "total_prestamo" => $row["total_Prestamo"],
                        "abono" => $row["abono"],
                        "pago" => $row["pago"],
                        "fecha_alm" => $row["fecha_Alm"],
                        "fecha_movimiento" => $row["fecha_Movimiento"],
                        "id_Estatus" => $row["id_Estatus"],

                        //Articulo
                        "detalle" => $row["detalle"],
                        "observaciones" => $row["observaciones"],
                        "cantidad" => $row["cantidad"]
                    ];

                    array_push($datos, $data);
                }
            } else {
                echo "No se ejecuto buscarContrato-sqlContratoDAO";
            }

        } catch (Exception $exc) {
            $verdad = 4;
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        return $datos;
    }

}