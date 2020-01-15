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

    public function guardarArticulo($tipoPost,Articulo $articulo)
    {
        // TODO: Implement guardaCiente() method.
        try {

            $idCliente = $articulo->getCliente();
            $status = 1;
            $fechaCreacion = date('d-m-Y');
            $fechaModificacion = date('d-m-Y');
            if($tipoPost=="1"){
                $idTipoM = $articulo->getTipoM();
                $idPrenda = $articulo->getPrenda();
                $idKilataje = $articulo->getKilataje();
                $idCalidad = $articulo->getCalidad();
                $idCantidad = $articulo->getCantidad();
                $idPeso = $articulo->getPeso();
                $idPesoPiedra = $articulo->getPesoPiedra();
                $idPiedras = $articulo->getPiedras();
                $idPrestamo = $articulo->getPrestamoMax();
                $idAvaluo = $articulo->getAvaluo();
                $idPrestamoMax = $articulo->getPrestamoMax();
                $idUbicacion = $articulo->getUbicacion();
                $idDetallePrenda = $articulo->getDetallePrenda();

                $insertMetal = "INSERT INTO articulo_tbl " .
                    "(id_Cliente,tipo, prenda, kilataje, calidad, cantidad, peso, peso_Piedra, piedras, prestamo, avaluo, prestamoMaximo, ubicacion," .
                    " detalle, id_Estatus, fecha_creacion, fecha_modificacion)  VALUES " .
                    "('" . $idCliente . "','" . $idTipoM . "','" . $idPrenda . "', '" . $idKilataje . "', '" . $idCalidad . "', '" . $idCantidad . "', '" . $idPeso
                    . "', '" . $idPesoPiedra . "', '" . $idPiedras . "', '" . $idPrestamo . "', '" . $idAvaluo . "', '" . $idPrestamoMax . "','" . $idUbicacion . "','"
                    . $idDetallePrenda . "','" . $status . "','" . $fechaCreacion . "','" . $fechaModificacion . "')";

            }else if($tipoPost=="2"){
                $idTipoE = $articulo->getTipoE();
                $idMarca = $articulo->getMarca();
                $idEstado = $articulo->getEstado();
                $idModelo = $articulo->getModelo();
                $idTamaño = $articulo->getTamaño();
                $idColor = $articulo->getColor();
                $idSerie = $articulo->getSerie();
                $idPrestamoE = $articulo->getPrestamoE();
                $idAvaluoE = $articulo->getAvaluoE();
                $idPrestamoMaxE = $articulo->getPrestamoMaxE();
                $idUbicacionE = $articulo->getUbicacionE();
                $idDetallePrendaE = $articulo->getDetallePrendaE();

                $insertMetal = "INSERT INTO articulo_tbl " .
                    "(id_Cliente,tipo, marca, estado, modelo, tamaño, color, num_Serie, prestamo, avaluo, prestamoMaximo, ubicacion," .
                    " detalle, id_Estatus, fecha_creacion, fecha_modificacion)  VALUES " .
                    "('" . $idCliente . "','" . $idTipoE . "','" . $idMarca . "', '" . $idEstado . "', '" . $idModelo . "', '" . $idTamaño . "', '" . $idColor
                    . "', '" . $idSerie . "','" . $idPrestamoE . "', '" . $idAvaluoE . "', '" . $idPrestamoMaxE . "', '" . $idUbicacionE . "','"
                    . $idDetallePrendaE . "','" . $status . "','" . $fechaCreacion . "','" . $fechaModificacion . "')";
            }

            if ($ps = $this->conexion->prepare($insertMetal)) {
                if ($ps->execute()) {
                    $verdad = 1;
                } else {
                    $verdad = 2;
                }
            } else {
                $verdad = 3;
            }
        } catch (Exception $exc) {
            $verdad = 4;
            echo $exc->getMessage();
        } finally {
            $verdad = 5;
            $this->db->closeDB();
        }
        //return $verdad;
        echo $verdad;
    }

    public function buscarArticulo($cliente)
    {
        $datos = array();
        try {

            $buscar = "SELECT id_Articulo,id_Cliente,tipo, marca, estado, modelo, prestamo,avaluo, detalle FROM articulo_tbl WHERE id_Cliente='$cliente'";
            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Articulo" => $row["id_Articulo"],
                        "id_Cliente" => $row["id_Cliente"],
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
    }

    public function eliminarArticulo($idArticulo)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $eliminarArticulo = "DELETE FROM articulo_tbl WHERE id_Articulo='$idArticulo'";

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


}