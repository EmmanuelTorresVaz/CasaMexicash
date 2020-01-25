<?php
if(!isset($_SESSION)) {
    session_start();
}

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
        try {
            $id = -1;

            $buscar = "select id_User,usuario,id_Sucursal  from usuarios_tbl where usuario = '". $usuario ."' and password = '". $pass."'";

            $statement = $this->conexion->query($buscar);

            if ($statement->num_rows > 0) {
                $fila = $statement->fetch_object();
                $id = $fila->id_User;
                $idName = $fila->usuario;
                $id_Sucursal = $fila->id_Sucursal;
                $_SESSION['idUsuario'] = $id;
                $_SESSION['usuario'] = $idName;
                $_SESSION['sucursal'] = $id_Sucursal;
            }

        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        echo $id;
    }

    function llenarCmbVendedor()
    {
        $datos = array();

        try {
            $sucursal = $_SESSION["sucursal"];
            $buscar = "SELECT id_User,CONCAT(nombre, ' ', apellido_Pat, ' ', apellido_Mat) as NombreVend FROM usuarios_tbl 
                        WHERE id_Sucursal=$sucursal";
            echo $buscar;
            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_User" => $row["id_User"],
                        "NombreVend" => $row["NombreVend"]
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
}