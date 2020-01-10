<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Reporte.php");
include_once(BASE_PATH . "Conexion.php");

class sqlReporteDAO
{

    protected $conexion;
    protected $db;


    public function __construct()
    {
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    public function guardaReporte(Reporte $reporte)
    {

        try {

            $id_Contrato = $reporte->getIdContrato();
            $id_Cliente = $reporte->getIdCliente();
            $id_Articulo = $reporte->getIdArticulo();
            $id_Auto = $reporte->getIdAuto();
            $id_Interes = $reporte->getIdInteres();
            $fecha_Vencimiento = $reporte->getFechaVencimiento();
            $total_Avaluo = $reporte->getTotalAvaluo();
            $total_Prestamo = $reporte->getTotalPrestamo();
            $abono = $reporte->getAbono();
            $intereses = $reporte->getIntereses();
            $pago = $reporte->getPago();
            $fecha_Alm = $reporte->getFechaAlm();
            $fecha_Movimiento = $reporte->getFechaMovimiento();
            $origen_Folio = $reporte->getOrigenFolio();
            $dest_Folio = $reporte->getDestFolio();
            $id_Estatus = $reporte->getIdEstatus();
            $observaciones = $reporte->getObservaciones();

        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

    }


    /**
     *
     * traeReportesArticulo Metod()
     * @param $opc
     * @comment -> $opc (1, 2, 3, 4) ... 1 -> Empeños; 2 -> Desempeños; 3 -> Refrendos; 4 -> Todos
     * @return mixed
     *
     */

    public function traeReportesArticulo($opc)
    {
        $datos = array();

        try {

            if ($opc == 1) {
                echo "opc 1";
            } else {
                if ($opc == 2) {
                    echo "opc 2";

                } else {
                    if ($opc == 3) {
                        echo "opc 3";

                    } else {
                        if ($opc == 4) {
                            $buscar = "SELECT * FROM contrato_tbl INNER JOIN articulo_tbl ON contrato_tbl.id_Articulo = articulo_tbl.id_Contrato";
                            $buscarArticulo = "select * from contrato_tbl where not (id_Articulo = null) ;";
                            $rs = $this->conexion->query($buscarArticulo);

                            if ($rs->num_rows > 0) {
                                while ($row = $rs->fetch_assoc()) {
                                    $data = [
                                        "id_Cliente" => $row["id_Cliente"],
                                        "id_Articulo" => $row["id_Articulo"],
                                        "id_Interes" => $row["id_Interes"],
                                        "fecha_Vencimiento" => $row["fecha_Vencimiento"],
                                        "total_Avaluo" => $row["total_Avaluo"],
                                        "total_Prestamo" => $row["total_Prestamo"],
                                        "abono" => $row["abono"],
                                        "intereses" => $row["intereses"],
                                        "pago" => $row["pago"],
                                        "fecha_Alm" => $row["fecha_Alm"],
                                        "fecha_Movimiento" => $row["fecha_Movimiento"],
                                        "origen_Folio" => $row["origen_Folio"],
                                        "dest_Folio" => $row["dest_Folio"],
                                        "id_Estatus" => $row["id_Estatus"],
                                        "observaciones" => $row["observaciones"]
                                    ];

                                    array_push($datos, $data);
                                }
                            }
                        } else {
                            echo "Parámetros incorrectos sqlReporteDAO - traeReportesArticulo()";
                        }
                    }
                }
            }

        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        return $datos;
    }

    /**
     *
     * traeReportesArticulo Metod()
     * @param $opc
     * @comment -> $opc (1, 2, 3, 4) ... 1 -> Empeños; 2 -> Desempeños; 3 -> Refrendos; 4 -> Almoneda; 5 -> Todos;
     * @return mixed
     *
     */

    public function traeInventario($empeño, $desempeño, $refrendo, $almoneda)
    {
        $datos = array();

        try {
            $buscar = null;

            $buscar = "SELECT * FROM contrato_tbl as C " .
                "INNER JOIN articulo_tbl as A " .
                "ON C.id_Articulo = A.id_Contrato " .
                "INNER JOIN cat_estatus as E " .
                "ON A.id_Estatus = E.id_Estatus";

            if($empeño== true||$desempeño ==true||$refrendo||$almoneda==true){
                $buscar = $buscar . "Where";

                if($empeño==true){
                    $buscar = $buscar . "estatus == 'Empeño'";
                    if($desempeño ==true||$refrendo||$almoneda==true){
                        $buscar = $buscar . " AND ";
                    }
                }
                if($desempeño==true){
                    $buscar = $buscar . "estatus == 'Desempeño'";
                    if($refrendo||$almoneda==true){
                        $buscar = $buscar . " AND ";
                    }
                }
                if($almoneda==true){
                    $buscar = $buscar . "estatus == 'almoneda'";
                    if($almoneda==true){
                        $buscar = $buscar . " AND ";
                    }
                }
                if($refrendo==true){
                    $buscar = $buscar . "estatus == 'Refrendo'";
                }
            }



            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $estatus = 0;
                    switch ($row["id_Estatus"]) {
                        case 1:
                            $estatus = "Empeñado";
                            break;
                        case 2:
                            $estatus = "Desempeñado";
                            break;
                        case 3:
                            $estatus = "Refrendo";
                            break;
                        case 4:
                            $estatus = "Almoneda";
                            break;
                    }
                    $data = [
                        //Contrato
                        "fecha_Vencimiento" => $row["fecha_Vencimiento"],
                        "total_Prestamo" => $row["total_Prestamo"],
                        //"fecha_Alm" => $row["fecha_Alm"],
                        "fecha_Movimiento" => $row["fecha_Movimiento"],
                        "id_Estatus" => $estatus,
                        "observaciones" => $row["observaciones"],
                        //Contrato

                        //Articulo
                        "tipo" => $row["tipo"],
                        "prenda" => $row["prenda"],
                        "kilataje" => $row["kilataje"],
                        "cantidad" => $row["cantidad"],
                        "peso" => $row["peso"]
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

    public function traeInventario2($opc)
    {
        $datos = array();

        try {
            $buscar = null;


            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $estatus = 0;
                    switch ($row["id_Estatus"]) {
                        case 1:
                            $estatus = "Empeñado";
                            break;
                        case 2:
                            $estatus = "Desempeñado";
                            break;
                        case 3:
                            $estatus = "Refrendo";
                            break;
                        case 4:
                            $estatus = "Almoneda";
                            break;
                    }
                    $data = [
                        //Contrato
                        "fecha_Vencimiento" => $row["fecha_Vencimiento"],
                        "total_Prestamo" => $row["total_Prestamo"],
                        //"fecha_Alm" => $row["fecha_Alm"],
                        "fecha_Movimiento" => $row["fecha_Movimiento"],
                        "id_Estatus" => $estatus,
                        "observaciones" => $row["observaciones"],
                        //Contrato

                        //Articulo
                        "tipo" => $row["tipo"],
                        "prenda" => $row["prenda"],
                        "kilataje" => $row["kilataje"],
                        "cantidad" => $row["cantidad"],
                        "peso" => $row["peso"]
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


    /**
     *
     * traeReportesAuto Metod()
     * @param $opc
     * @comment -> $opc (1, 2, 3, 4) ... 1 -> Empeños; 2 -> Desempeños; 3 -> Refrendos; 4 -> Todos
     * @return mixed
     *
     */

    public function traeReportesAuto($opc)
    {
        $datos = array();

        try {
            $buscarAuto = "select * from contrato_tbl where not (id_Auto = null);";
            $rs = $this->conexion->query($buscarAuto);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Cliente" => $row["id_Cliente"],
                        "id_Auto" => $row["id_Auto"],
                        "id_Interes" => $row["id_Interes"],
                        "fecha_Vencimiento" => $row["fecha_Vencimiento"],
                        "total_Avaluo" => $row["total_Avaluo"],
                        "total_Prestamo" => $row["total_Prestamo"],
                        "abono" => $row["abono"],
                        "intereses" => $row["intereses"],
                        "pago" => $row["pago"],
                        "fecha_Alm" => $row["fecha_Alm"],
                        "fecha_Movimiento" => $row["fecha_Movimiento"],
                        "origen_Folio" => $row["origen_Folio"],
                        "dest_Folio" => $row["dest_Folio"],
                        "id_Estatus" => $row["id_Estatus"],
                        "observaciones" => $row["observaciones"]
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


    public function borraReporte(Reporte $reporte)
    {
        try {

            $id_Contrato = $reporte->getIdContrato();
            $id_Cliente = $reporte->getIdCliente();
            $id_Articulo = $reporte->getIdArticulo();
            $id_Auto = $reporte->getIdAuto();
            $id_Interes = $reporte->getIdInteres();
            $fecha_Vencimiento = $reporte->getFechaVencimiento();
            $total_Avaluo = $reporte->getTotalAvaluo();
            $total_Prestamo = $reporte->getTotalPrestamo();
            $abono = $reporte->getAbono();
            $intereses = $reporte->getIntereses();
            $pago = $reporte->getPago();
            $fecha_Alm = $reporte->getFechaAlm();
            $fecha_Movimiento = $reporte->getFechaMovimiento();
            $origen_Folio = $reporte->getOrigenFolio();
            $dest_Folio = $reporte->getDestFolio();
            $id_Estatus = $reporte->getIdEstatus();
            $observaciones = $reporte->getObservaciones();

        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
    }
}