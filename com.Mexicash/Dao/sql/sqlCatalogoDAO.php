<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include (MODELO_PATH."Identificacion.php");
include (MODELO_PATH."Promocion.php");
include (BASE_PATH."Conexion.php");

class sqlCatalogoDAO
{
    protected $conexion;
    protected $db;


    public function __construct(){
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    public function guardaPromocion(Promocion $promocion){
        try {
            $tipo_Promocion = $promocion->getTipoPromocion();
            $descripcion_Promocion = $promocion->getDescripcionPromocion();
        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }
    }

    public function borraPromocion(Promocion $promocion){
        try {
            $tipo_Promocion = $promocion->getTipoPromocion();
            $descripcion_Promocion = $promocion->getDescripcionPromocion();
        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }
    }

    public function guardaIdentificacion(Identificacion $identificacion){
        try {
            $tipo_Identificacion = $identificacion->getTipoIdentificacion();
            $descripcion_Identificacion = $identificacion->getDescripcionIdentificacion();
        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }
    }

    public function borraIdentificacion(Identificacion $identificacion){
        try {
            $tipo_Identificacion = $identificacion->getTipoIdentificacion();
            $descripcion_Identificacion = $identificacion->getDescripcionIdentificacion();
        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }
    }

    public function traePromociones(){

        $datos = array();

        try {
            $buscar = "select id_Cat_Cliente, descripcion from cat_cliente where tipo = 'Promocion';";
            $rs = $this->conexion->query( $buscar );

            if($rs->num_rows > 0){
                while($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Cat_Cliente" => $row["id_Cat_Cliente"],
                        "descripcion" => $row["descripcion"]
                    ];

                    array_push($datos, $data);
                }
            }

        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }

        return $datos;
    }

    public function traeIdentificaciones(){

        $datos = array();

        try {
            $buscar = "select id_Cat_Cliente, descripcion from cat_cliente where tipo = 'Identificacion';";
            $rs = $this->conexion->query( $buscar );

            if($rs->num_rows > 0){
                while($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Cat_Cliente" => $row["id_Cat_Cliente"],
                        "descripcion" => $row["descripcion"]
                    ];

                    array_push($datos, $data);
                }
            }

        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }

        return $datos;
    }

}