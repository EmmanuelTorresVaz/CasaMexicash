<?php
require ('../../Modelo/Cliente.php');
require ('../ClienteDAO.php');
require_once ('../../Base/Conexion.php');

class sqlCilenteDAO implements ClienteDAO
{

    protected $conexion;
    protected $db;


    public function __construct(){
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    public function guardaCiente(Cliente $cliente) {
        // TODO: Implement guardaCiente() method.
        try {

            $verdad = false;

            $idCliente = $cliente->getIdCliente();
            $nombreCliente = $cliente->getNombreCliente();
            $apellidoPCliente = $cliente->getApellidoPCliente();
            $apellidoMCliente = $cliente->getApellidoMCliente();
            $celular = $cliente->getCelular();
            $telefono = $cliente->getTelefono();
            $correoCliente = $cliente->getCorreoCliente();
            $direccion = $cliente->getDireccion();

            $tipoPersona = $cliente->getTipoPersona();
            $sexo = $cliente->getSexo();
            $fechaNac = $cliente->getFechaNac();
            $paisNac = $cliente->getPaisNac();
            $edoNac = $cliente->getEdoNac();
            $curp = $cliente->getCurp();
            $ocupacion = $cliente->getOcupacion();
            $identificacion = $cliente->getIdentificacion();
            $numIdentificacion = $cliente->getNumIdentificacion();

            $rfc = $cliente->getRfc();

            $msjUsoInterno = $cliente->getMsjUsoInterno();
            $instFinanciera = $cliente->getInstFinanciera();
            $cuentaBancaria = $cliente->getCuentaBancaria();

            $insertar = "insert into clientes (nombreCliente, apellidoPCliente, apellidoMCliente, celular, telefono, correoCliente, direccion, tipoPersona, sexo, fechaNac,
                    paisNac, edoNac, curp, ocupacion, identificacion, numIdentificacion) 
            values ('". $nombreCliente ."', '". $apellidoPCliente ."', '". $apellidoMCliente ."', ". $celular .", ". $telefono .", '". $correoCliente ."', '". $direccion ."', 
            ". $tipoPersona .", '". $sexo ."', '". $fechaNac ."', '". $paisNac ."', '". $edoNac ."', '". $curp ."', '". $ocupacion ."', '". $identificacion ."', ". $numIdentificacion .", 
            '". $rfc ."', '". $msjUsoInterno ."', '". $instFinanciera ."', ". $cuentaBancaria .")";

            $this->conexion->query($insertar);
            echo "Se registro correctamente";
            $verdad = true;
        }catch (Exception $exc){
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        return $verdad;
    }

    public function borraCliente(Cliente $cliente)
    {
        // TODO: Implement borraCliente() method.
    }
}