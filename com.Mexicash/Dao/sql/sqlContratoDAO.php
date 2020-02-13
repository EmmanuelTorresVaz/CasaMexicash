<?php
if(!isset($_SESSION)) {
    session_start();
}
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


            $id_Cliente = $contrato->getIdCliente();
            $fechaVencimiento = $contrato->getFechaVencimiento();
            $totalAvaluo = $contrato->getTotalAvaluo();
            $totalPrestamo = $contrato->getTotalPrestamo();
            $totalInteres = $contrato->getTotalInteres();
            $sumaInteresPrestamo= $contrato->getSumaInteresPrestamo();
            $fechaAlm = $contrato->getFechaAlm();
            $estatus = $contrato->getEstatus();
            $beneficiario = $contrato->getBeneficiario();
            $cotitular = $contrato->getCotitular();
            $plazo = $contrato->getPlazo();
            $tasa= $contrato->getTasa();
            $alm = $contrato->getAlm();
            $seguro = $contrato->getSeguro();
            $iva = $contrato->getIva();
            $dias = $contrato->getDias();
            $fechaCreacion = date('Y-m-d H:i:s');
            $fechaModificacion = date('Y-m-d H:i:s');
            $usuario = $_SESSION["idUsuario"];
            $sucursal = $_SESSION["sucursal"];


            $insertaContrato = "INSERT INTO contrato_tbl " .
                "(id_Cliente,  fecha_Vencimiento, total_Avaluo, total_Prestamo,total_PrestamoInicial, total_Interes,suma_InteresPrestamo,  " .
                "fecha_Alm, id_Estatus, cotitular,beneficiario, plazo,tasa,alm,seguro,iva,dias, fecha_creacion, fecha_modificacion, usuario,sucursal,tipoContrato) VALUES ".
                "('" . $id_Cliente . "', '" . $fechaVencimiento . "', '" . $totalAvaluo . "', '" . $totalPrestamo . "', '" . $totalPrestamo .
                "', '" . $totalInteres . "', '" . $sumaInteresPrestamo . "',  '" . $fechaAlm .
                "', '" .  $estatus . "', '" . $cotitular . "','" . $beneficiario . "','" . $plazo . "','" . $tasa . "','" . $alm . "','" . $seguro . "','" . $iva . "','" . $dias . "','" . $fechaCreacion . "', ". "'" . $fechaModificacion . "', '" . $usuario . "','" . $sucursal . "',1)";

            if ($ps = $this->conexion->prepare($insertaContrato)) {
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
    public function actualizarArticulo(){
        // TODO: Implement guardaCiente() method.
        try {
            $usuario = $_SESSION["idUsuario"];
            $buscar = "select max(id_Contrato) as idContrato  from contrato_tbl ";
            $statement = $this->conexion->query($buscar);
            $fila = $statement->fetch_object();
            $idContratoAuto = $fila->idContrato;
            $updateArticulo = "UPDATE articulo_tbl SET id_Contrato='$idContratoAuto' WHERE id_Contrato='' and usuario=$usuario";

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
        $usuario = $_SESSION["idUsuario"];
        try {
            $eliminarArticulo = "DELETE FROM articulo_tbl WHERE id_Contrato = '' and usuario=$usuario";

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