<?php
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

    function insertarArticulo($idInteres){
        try {
            $data['status'] = 'ok';
            $data['result'] = '0';
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        echo json_encode($data);
    }


}