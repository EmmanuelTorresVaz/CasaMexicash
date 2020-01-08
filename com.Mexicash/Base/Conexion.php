<?php

include ('../Servicios/Errores.php');

class Conexion
{
    protected $server = "localhost";
    protected $user = "root";
    //protected $password = "volcanes";
    protected $password = "";
    protected $db = "mexicash";
    //protected $db = "prueba";
    protected $link;
    protected $error;

    public function connectDB(){
        try {
            $this->link = mysqli_connect($this->server, $this->user, $this->password, $this->db);
            return $this->link;
        }catch (\Exception $error){
            echo $error->getMessage();
            /*$this->error = new Errores();
            $this->error->setError(1, $error->getMessage(), 1);
            $this->error->imprimirError();*/
            return 0;
        }
    }

    public function closeDB(){
        try{
            mysqli_close($this->link);
        }catch (Exception $e){
            $this->error = new Errores();
            $this->error->setError(1, $e->getMessage(), 1);
            $this->error->imprimirError();
        }
    }

    function getArray($resultado) {
        return mysqli_fetch_array($resultado);
    }
    function getRows($resultado) {
        return mysqli_num_rows($resultado);
    }

}

?>