<?php
if(!isset($_SESSION)) {
    session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Articulo.php");
include_once(BASE_PATH . "Conexion.php");

class sqlArticulosDAO
{

    protected $conexion;
    protected $db;


    public function __construct()
    {
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    public function guardarArticulo($tipoPost, Articulo $articulo)
    {
        // TODO: Implement guardaCiente() method.
        try {

            // $idCliente = $articulo->getCliente();
            $status = 1;
            $fechaCreacion = date('Y-m-d H:i:s');
            $fechaModificacion = date('Y-m-d H:i:s');
            $usuario = $_SESSION["idUsuario"];
            $contratoTemp = $articulo->getContratoTemp();

            if ($tipoPost == "1") {
                $idTipoM = $articulo->getTipoM();
                $idKilataje = $articulo->getKilataje();
                $idCalidad = $articulo->getCalidad();
                $idCantidad = $articulo->getCantidad();
                $idPeso = $articulo->getPeso();
                $idPesoPiedra = $articulo->getPesoPiedra();
                $idPiedras = $articulo->getPiedras();
                $idPrestamo = $articulo->getPrestamo();
                $idAvaluo = $articulo->getAvaluo();
                $interesMetal = $articulo->getInteresMetal();
                $tipoInteres = $articulo->getTipoInteres();
                $idUbicacion = $articulo->getUbicacion();
                $idDetallePrenda = $articulo->getDetallePrenda();

                $insert = "INSERT INTO articulo_tbl " .
                    "(id_ContratoTemp,tipo, kilataje, calidad, cantidad, peso, peso_Piedra, piedras, prestamo, avaluo, tipoInteres,interesArticulo, ubicacion," .
                    " detalle, id_Estatus, fecha_creacion, fecha_modificacion, usuario)  VALUES " .
                    "('" . $contratoTemp . "','" . $idTipoM . "', '" . $idKilataje . "', '" . $idCalidad . "', '" . $idCantidad . "', '" . $idPeso
                    . "', '" . $idPesoPiedra . "', '" . $idPiedras . "', '" . $idPrestamo . "', '" . $idAvaluo . "','" . $tipoInteres . "','" . $interesMetal . "','" . $idUbicacion . "','"
                    . $idDetallePrenda . "','" . $status . "','" . $fechaCreacion . "','" . $fechaModificacion . "'," . $usuario . " )";

            } else if ($tipoPost == "2") {
                $idTipoE = $articulo->getTipoE();
                $idMarca = $articulo->getMarca();
                $idEstado = $articulo->getEstado();
                $idModelo = $articulo->getModelo();
                $idSerie = $articulo->getSerie();
                $idPrestamoE = $articulo->getPrestamoE();
                $idAvaluoE = $articulo->getAvaluoE();
                $interesArt = $articulo->getInteresArt();
                $tipoInteresE = $articulo->getTipoInteresE();
                $idUbicacionE = $articulo->getUbicacionE();
                $idDetallePrendaE = $articulo->getDetallePrendaE();

                $insert = "INSERT INTO articulo_tbl " .
                    "(id_ContratoTemp,tipo, marca, estado, modelo, num_Serie, prestamo, avaluo, tipoInteres,interesArticulo, ubicacion," .
                    " detalle, id_Estatus, fecha_creacion, fecha_modificacion,usuario)  VALUES " .
                    "('" . $contratoTemp . "','" . $idTipoE . "','" . $idMarca . "', '" . $idEstado . "', '" . $idModelo
                    . "', '" . $idSerie . "','" . $idPrestamoE . "', '" . $idAvaluoE . "','" . $tipoInteresE . "','" . $interesArt . "', '" . $idUbicacionE . "','"
                    . $idDetallePrendaE . "','" . $status . "','" . $fechaCreacion . "','" . $fechaModificacion . "'," . $usuario . " )";
            }
            if ($ps = $this->conexion->prepare($insert)) {
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

    public function buscarArticulo($idContratoTemp)
    {
        $datos = array();
        try {
            $usuario = $_SESSION["idUsuario"];
            $buscar = "SELECT id_Articulo, marca, estado, modelo, prestamo,avaluo, detalle FROM articulo_tbl WHERE id_ContratoTemp='$idContratoTemp' and usuario=" . $usuario;
            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Articulo" => $row["id_Articulo"],
                        "marca" => $row["marca"],
                        "estado" => $row["estado"],
                        "modelo" => $row["modelo"],
                        "prestamo" => $row["prestamo"],
                        "avaluo" => $row["avaluo"],
                        "detalle" => $row["detalle"]
                    ];
                    array_push($datos, $data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        echo json_encode($datos);
        //echo json_encode($datos);
    }

    public function eliminarArticulo($idArticulo)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $eliminarArticulo = "DELETE FROM articulo_tbl WHERE id_Articulo='$idArticulo'";

            if ($ps = $this->conexion->prepare($eliminarArticulo)) {
                if ($ps->execute()) {
                    $verdad = mysqli_stmt_affected_rows($ps);
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


    function llenarCmbTipoPrenda()
    {
        $datos = array();

        try {
            $buscar = "SELECT id_tipo, descripcion FROM cat_tipoarticulo where grupo=1";
            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_tipo" => $row["id_tipo"],
                        "descripcion" => $row["descripcion"]
                    ];
                    array_push($datos, $data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        return $datos;
    }

    function llenarCmbPrenda($idTipoCombo){
        $datos = array();

        try {
            $buscar = "SELECT id_prenda , descripcion FROM cat_prenda WHERE id_tipoArticulo=$idTipoCombo";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_prenda" => $row["id_prenda"],
                        "descripcion" => $row["descripcion"]
                    ];
                    array_push($datos, $data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        echo json_encode($datos);
    }
    function llenarCmbKilataje($idTipoCombo){
        $datos = array();

        try {
            $buscar = "SELECT id_Kilataje , descripcion FROM cat_kilataje WHERE id_tipoArticulo=$idTipoCombo";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Kilataje" => $row["id_Kilataje"],
                        "descripcion" => $row["descripcion"]
                    ];
                    array_push($datos, $data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        echo json_encode($datos);
    }
    function llenarCmbCalidad($idTipoCombo){
        $datos = array();

        try {
            $buscar = "SELECT id_calidad , descripcion FROM cat_calidad ";
            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_calidad" => $row["id_calidad"],
                        "descripcion" => $row["descripcion"]
                    ];
                    array_push($datos, $data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        echo json_encode($datos);
    }

    function llenarCmbTipoArticulo()
    {
        $datos = array();

        try {
            $buscar = "SELECT id_tipo, descripcion FROM cat_tipoarticulo where grupo=2";
            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_tipo" => $row["id_tipo"],
                        "descripcion" => $row["descripcion"]
                    ];
                    array_push($datos, $data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        return $datos;
    }


    function llenarCmbColores()
    {
        $datos = array();

        try {
            $buscar = "SELECT id_Color, descripcion FROM cat_color";
            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Color" => $row["id_Color"],
                        "descripcion" => $row["descripcion"]
                    ];
                    array_push($datos, $data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        return $datos;
    }

    function llenarCmbTipoAuto()
    {
        $datos = array();

        try {
            $buscar = "SELECT id_Cat_Articulo, descripcion FROM cat_articulos where tipo='Tipo Auto'";
            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Auto" => $row["id_Cat_Articulo"],
                        "descripcion" => $row["descripcion"]
                    ];
                    array_push($datos, $data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        return $datos;
    }
}