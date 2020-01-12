<?php
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

    public function guardarArticulo(Articulo $articulo)
    {
        // TODO: Implement guardaCiente() method.
        try {

            $idTipo = $articulo->getTipo();
            $idFolio = $articulo->getFolio();
            $idMarca = $articulo->getMarca();
            $idEstado = $articulo->getEstado();
            $idModelo = $articulo->getModelo();
            $idTamaño = $articulo->getTamaño();
            $idColor = $articulo->getColor();
            $idSerie = $articulo->getSerie();
            $idPrestamoE = $articulo->getPrestamoE();
            $idAvaluoE = $articulo->getAvaluoE();
            $idPrestamoMaxE = $articulo->getPrestamoMaxE();
            $idUbivacion = $articulo->getUbivacion();
            $idDetallePrendaE = $articulo->getDetallePrendaE();

            $insertMetal = "INSERT INTO articulo_tbl " .
                "(id_Contrato,tipo, marca, estado, modelo, tamaño, color, num_Serie, prestamo, avaluo, prestamoMaximo, ubivavion," .
                " detalle, id_Estatus)  VALUES " .
                "('" . $idFolio . "','" . $idTipo . "','" . $idMarca . "', '" . $idEstado . "', '" . $idModelo . "', '" . $idTamaño . "', '" . $idColor
                . "', '" . $idSerie . "', '" . $idPrestamoE . "', '" . $idAvaluoE . "', '" . $idPrestamoMaxE . "', '" . $idUbivacion . "','13',  '1')";

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
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        //return $verdad;
        echo $verdad;
    }

    public function BuscarContrato()
    {
        try {
            $id = -1;

            $buscar = "select folio FROM contrato_tbl ";

            $statement = $this->conexion->query($buscar);

            if ($statement->num_rows > 0) {
                $fila = $statement->fetch_object();
                $folio = $fila->folio;
            }

        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        return $folio;
    }

    public function buscarArticulo()
    {
        $datos = array();
        try {

            $buscar = "SELECT id_Articulo,id_Cliente,tipo, marca, estado, modelo, prestamo,avaluo, detalle FROM articulo_tbl";
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

        return $datos;
    }


}