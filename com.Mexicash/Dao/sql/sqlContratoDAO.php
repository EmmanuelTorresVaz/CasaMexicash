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

    public function guardarArticulo($tipoPost, Articulo $articulo)
    {
        // TODO: Implement guardaCiente() method.
        try {

            $idCliente = $articulo->getCliente();
            $status = 1;
            $fechaCreacion = date('d-m-Y');
            $fechaModificacion = date('d-m-Y');
            if ($tipoPost == "1") {
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

            } else if ($tipoPost == "2") {
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

    function buscarContratoTemp(){
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

    public function buscarContrato($contrato, $nombre, $celular){
        $datos = array();
        try {
            $buscar = "";
            if($nombre == 0){
                $buscar = "select c.id_Contrato, c.id_Cliente, c.id_Interes, c.folio, c.fecha_creacion, c.fecha_Vencimiento, c.total_Avaluo, c.total_Prestamo, 
                c.abono, c.pago, c.fecha_Alm, c.fecha_Movimiento, c.id_Estatus, a.detalle, c.observaciones, a.cantidad 
                from contrato_tbl as c inner join articulo_tbl as a on c.id_Contrato = a.id_Contrato where c.id_Contrato = ". $contrato .";";
            }
            if($contrato == 0){
                $buscar = "select c.id_Contrato, c.id_Cliente, c.id_Interes, c.folio, c.fecha_creacion, c.fecha_Vencimiento, c.total_Avaluo, c.total_Prestamo, 
                c.abono, c.pago, c.fecha_Alm, c.fecha_Movimiento, c.id_Estatus, a.detalle, c.observaciones, a.cantidad 
                from contrato_tbl as c inner join articulo_tbl as a on c.id_Contrato = a.id_Contrato inner join cliente_tbl as cl on cl.id_Cliente = c.id_Cliente 
                where concat(cl.nombre, ' ', cl.apellido_Pat, ' ', cl.apellido_Mat) = '". $nombre ."' and cl.celular = ". $celular .";";

            }

            $rs = $this->conexion->query($buscar);
            if($rs->num_rows > 0){
                while ($row = $rs->fetch_assoc()){
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
            }else{
                echo "No se ejecuto buscarContrato-sqlContratoDAO";
            }

        }catch (Exception $exc) {
            $verdad = 4;
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        return $datos;
    }

}