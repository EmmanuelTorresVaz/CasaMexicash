<?php
include_once(MODELO_PATH . "Intereses.php");
include_once(BASE_PATH . "Conexion.php");

class sqlInteresesDAO
{

    protected $conexion;
    protected $db;


    public function __construct()
    {
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    public function buscarTasaInteres($inTasaInteres)
    {
        try {
            $id = -1;

            $buscar = "select * where  = " . $inTasaInteres;

            $statement = $this->conexion->prepare($buscar);

            if ($statement->execute()) {
                $id = $statement->fetch();
                echo "Todo correcto";
                $statement->close();
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        return $id;
    }

    function llenarCmbTipoInteres()
    {

        $datos = array();

        try {
            $buscar = "SELECT id_interes, tasa_interes FROM cat_interes";
            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_interes" => $row["id_interes"],
                        "tasa_interes" => $row["tasa_interes"]
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

    function llenarFormIntereses($idInteres)
    {

        $datos = array();

        try {
            $buscar = "SELECT id_interes, tasa_interes, tipo_interes as tipoInteres, periodo, plazo, tasa, alm, seguro, iva, tipo_Promocion, 
                        tipo_Agrupamiento FROM cat_interes WHERE id_interes = " . $idInteres;
            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                $consulta = $rs->fetch_assoc();
                $data['status'] = 'ok';
                $data['result'] = $consulta;
            }

            /*if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_interes" => $row["id_interes"],
                        "tasa_interes" => $row["tasa_interes"],
                        "tipo_interes" => $row["tipo_interes"],
                        "periodo" => $row["periodo"],
                        "plazo" => $row["plazo"],
                        "taza" => $row["tasa"],
                        "alm" => $row["alm"],
                        "seguro" => $row["seguro"],
                        "iva" => $row["iva"],
                        "tipo_promocion" => $row["tipo_Promocion"],
                        "tipo_Agrupamiento" => $row["tipo_Agrupamiento"]
                    ];

                    array_push($datos, $data);
                }
            }*/

        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        //return  json_encode($data);
        echo json_encode($data);    }


}