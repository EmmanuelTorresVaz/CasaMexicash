<?php
if(!isset($_SESSION)) {
    session_start();
}

class sqlVentasDAO
{

    protected $conexion;
    protected $db;


    public function __construct()
    {
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }


    public function buscarCodigo($idCodigo)
    {
        $datos = array();
        try {

            $buscar = "SELECT id_Articulo, detalle,avaluo FROM articulo_tbl ";

            if($idCodigo==x){
                $buscar = $buscar + " WHERE id_Estatus = 5 ";
            }else{
                $buscar = $buscar + " WHERE id_Estatus = 5 and id_Articulo=$idCodigo  ";
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