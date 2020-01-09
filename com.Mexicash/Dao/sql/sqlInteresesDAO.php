<?php
include_once (MODELO_PATH."Intereses.php");
include_once (BASE_PATH."Conexion.php");

class sqlInteresesDAO
{

    protected $conexion;
    protected $db;


    public function __construct(){
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    public function buscarTasaInteres($inTasaInteres){
        try{
            $id = -1;

            $buscar = "select * where  = " . $inTasaInteres;

            $statement = $this->conexion->prepare( $buscar );

            if($statement->execute()){
                $id = $statement->fetch();
                echo "Todo correcto";
                $statement->close();
            }
        }catch (Exception $exc){
            echo $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }

        return $id;
    }

    function llenarCombo(){

        $datos = array();

        try{
            $buscar = "SELECT id_interes, tasa_interes FROM cat_interes";
            $rs = $this->conexion->query( $buscar );

            if($rs->num_rows > 0){
                while($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_interes" => $row["id_interes"],
                        "tasa_interes" => $row["tasa_interes"]
                    ];

                    array_push($datos, $data);
                }
            }

        }catch (Exception $exc){
            echo $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }

        return $datos;
    }

    public function cmbTipoInteres(){

        $cmbTipoInteres = array();
        try{
            $rs = null;
            $buscar = "SELECT id_interes, tasa_interes FROM cat_interes";

            $rs = $this->conexion->query($buscar);

            if($rs->num_rows > 0){
                while($row = $rs->fetch_assoc()){

                    $cat_Interes = [
                        "id_interes" => $row["id_interes"],
                        "tasa_interes" => $row["tasa_interes"],

                    ];

                    array_push($cmbTipoInteres, $cat_Interes);
                }

            }else{
                echo " No se ejecutó TraerTodos SqlClienteDAO";
            }
        }catch (Exception $exc){
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        return $cmbTipoInteres;
    }


}