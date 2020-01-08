<?php

//include_once  "C:\\xampp\htdocs\Mexicash\com.Mexicash\Modelo\Usuario.php";
//include_once  "C:\\xampp\htdocs\Mexicash\com.Mexicash\Base\Conexion.php";
//include_once  "C:\\xampp\htdocs\Mexicash\com.Mexicash\Servicios\Errores.php";
//include_once  "C:\\xampp\htdocs\Mexicash\com.Mexicash\Dao\UsuarioDAO.php";

include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
include_once (MODELO_PATH."Usuario.php");
include_once (BASE_PATH."Conexion.php");
include_once (SERVICIOS_PATH."Errores.php");
include_once (DAO_PATH."UsuarioDAO.php");


class sqlUsuarioDAO
{

    protected $error;
    protected $conexion;
    protected $db;

    function __construct()
    {
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    public function guardaUsuario(Usuario $usuario)
    {
        try {

            $this->__construct();

            $verdad = false;

            $idUsuario = $usuario->getIdUsuario();
            $nombreUsuario = $usuario->getNombreUsuario();
            $password = $usuario->getPassword();
            $nombre = $usuario->getNombre();
            $apellidoP = $usuario->getApellidoP();
            $apellidoM = $usuario->getApellidoM();
            $estatus = $usuario->getEstatus();

            $insertar = "insert into usuarios (correo, passw, usuario, nombres, apellidoPat, apellidoMat, estatus)
                    values ('" . $nombreUsuario . "', '" . $password . "', 'b', '" . $nombre . "', '" . $apellidoP . "', '" . $apellidoM . "'," . $estatus . ") ";

            $this->conexion->query($insertar);
            echo "Se logro registrar";
            $verdad = true;

        } catch (Exception $exc) {
            echo $exc->getMessage();
            /*$this->error = new ErroresInfo();
            $this->error->setError("1", $exc->getMessage(), 1);
            $this->error->imprimirError();*/
        } finally {
            $this->db->closeDB();
        }
        return $verdad;
    }

    public function borrarUsuario($usuario)
    {

    }


    function loginAutentificion($usuario, $pass)
    {
        $id = -1;
        try {
            $this->__construct();
            $array = array();
            $sql = "select COUNT(*) as contar from usuarios_tbl where usuario = '$usuario' and password = '$pass'";
            $ejecutarConsulta = $this->conexion->query($sql);
            $fila = $this->db->getArray($ejecutarConsulta);
            $id = $fila[0];
        } catch (Exception $exc) {
            $this->error = new ErroresInfo();
            $this->error->setError("1", $exc->getMessage(), 1);
            $this->error->imprimirError();
        } finally {
            $this->db->closeDB();
        }

        return $id;
    }
}