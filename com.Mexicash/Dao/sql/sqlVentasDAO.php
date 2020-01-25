<?php
if(!isset($_SESSION)) {
    session_start();
}
include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
include_once (BASE_PATH."Conexion.php");
class sqlVentasDAO
{

    protected $conexion;
    protected $db;


    public function __construct()
    {
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }


    public function buscarCodigo($tipo,$idCodigo)
    {
        $datos = array();
        try {

            $buscar = "SELECT id_Articulo, detalle,avaluo FROM articulo_tbl ";

            if($tipo==1){
                $buscar = $buscar ." WHERE id_Estatus = 1 ";
            }else{
                $buscar = $buscar . " WHERE id_Estatus = 1 and id_Articulo=$idCodigo  ";
            }
            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Articulo" => $row["id_Articulo"],
                        "detalle" => $row["detalle"],
                        "avaluo" => $row["avaluo"]
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

}