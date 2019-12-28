<?php
require_once('../../modelo/Usuario.php');
require_once('../../base/Conexion.php');
require_once('../../servicios/Errores.php');
require_once('../UsuarioDAO.php');

class sqlUsuarioDAO implements UsuarioDAO
{

    protected $error;
    protected $conexion;
    protected $db;

    function __construct()
    {
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB($this->db->server, $this->db->user, $this->db->password, $this->db->db);
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

            $verdad = true;

        } catch (Exception $exc) {
            $this->db->closeDB();
            $this->error = new Errores();
            $this->error->setError("1", $exc->getMessage(), 1);
            $this->error->imprimirError();
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
            $this->__construct();

            $array = array();
            $sql = "select nombre, apellidoPat , apellidoMat from usuariostbl where usuario = '$usuario' and password = '$pass'";
            $ejecutarConsulta = $this->conexion->query($sql);
            $fila = getArray($ejecutarConsulta);
            $id = $fila[0];
            $this->db->closeDB();
            return $id;

        } catch (Exception $exc) {
            $this->db->closeDB();
            $this->error = new Errores();
            $this->error->setError("1", $exc->getMessage(), 1);
            $this->error->imprimirError();
        } finally {
            $this->db->closeDB();
        }
    }
}