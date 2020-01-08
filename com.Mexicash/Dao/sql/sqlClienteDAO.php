<?php
include_once (MODELO_PATH."Cliente.php");
include_once (BASE_PATH."Conexion.php");

class sqlClienteDAO
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

            //$id_Cliente =  $cliente->getIdCliente();
            $nombre =  $cliente->getNombre();
            $apellido_Pat =  $cliente->getApellidoPat();
            $apellido_Mat =  $cliente->getApellidoMat();
            $sexo =  $cliente->getSexo();
            $fecha_Nacimiento =  $cliente->getFechaNacimiento();
            $curp =  $cliente->getCurp();
            $ocupacion =  $cliente->getOcupacion();
            $tipo_Identificacion =  $cliente->getTipoIdentificacion();
            $num_Identificacion =  $cliente->getNumIdentificacion();
            $celular =  $cliente->getCelular();
            $rfc =  $cliente->getRfc();

            $telefono =  $cliente->getTelefono();
            $correo =  $cliente->getCorreo();
            $estado =  $cliente->getEstado();
            $codigo_Postal =  $cliente->getCodigoPostal();

            $municipio =  $cliente->getMunicipio();
            $colonia =  $cliente->getColonia();
            $calle =  $cliente->getCalle();
            $num_exterior =  $cliente->getNumExterior();
            $num_interior =  $cliente->getNumInterior();

            $mensaje =  $cliente->getMensaje();
            $promocion =  $cliente->getPromocion();


            $ins = "insert into cliente_tbl() values()";

            $insertar = "insert into cliente_tbl (nombre, apellido_Pat, apellido_Mat, sexo, fecha_Nacimiento, curp, ocupacion, tipo_Identificacion, num_Identificacion, celular,
                    rfc, telefono, correo, estado, codigo_Postal, municipio, colonia, calle, num_exterior, num_interior, mensaje, promocion) 
            values ('". $nombre ."', '". $apellido_Pat ."', '". $apellido_Mat ."', ". 1 .", ". $fecha_Nacimiento .", '". $curp ."', '". $ocupacion ."', 
            ". 2 .", '". $num_Identificacion ."', ". $celular .", '". $rfc ."', ". $telefono .", '". $correo ."', '". $estado ."', ". $codigo_Postal .", 
            '". $municipio ."', '". $colonia ."', '". $calle ."', ". $num_exterior .", ". $num_interior .", '". $mensaje ."', ". 3 .")";

            echo $insertar . "     ";

            if($ps = $this->conexion->prepare($insertar)){
                echo " Se preparó correctamente ";
                if($ps->execute()){
                    echo " Se ejecutó bien";
                    $verdad = true;
                }else{
                    echo " No se ejecutó bien";
                }
            }else{
                echo " No se preparó";
            }
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

    public function buscarIdCliente($celular, $correoCliente){
        try{
            $id = -1;

            $buscar = "select idUsuario where $celular = " . $celular . " and correoCliente = '" . $correoCliente . "'";

            $statement = $this->conexion->prepare( $buscar );

            if($statement->execute()){
                $id = $statement->fetch();
                echo "Todo correcto";
                $statement->close();
            }
        }catch (Exception $exc){
            echo $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }

        return $id;
    }

}