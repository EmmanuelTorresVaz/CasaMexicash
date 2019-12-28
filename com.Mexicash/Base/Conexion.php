<?php

require_once ('../servicios/Errores.php');

class Conexion
{
    var $server = "localhost";
    var $user = "root";
    var $password = "volcanes";
    var $db = "prueba";
    var $link;
    var $error;

    public function connectDB($server, $user, $password, $db){
        try {
            $this->link = mysqli_connect($server, $user, $password, $db);
            return $this->link;
        }catch (\mysql_xdevapi\Exception $error){
            $this->error = new Errores();
            $this->error->setError(1, $error->getMessage(), 1);
            $this->error->imprimirError();
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

}

?>