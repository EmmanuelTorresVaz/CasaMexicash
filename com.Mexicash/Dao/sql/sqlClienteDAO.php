<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Cliente.php");
include_once(BASE_PATH . "Conexion.php");

class sqlClienteDAO
{

    protected $conexion;
    protected $db;


    public function __construct()
    {
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    public function guardaCiente2(Cliente $cliente)
    {
        // TODO: Implement guardaCiente() method.
        try {

            $verdad = false;

            //$id_Cliente =  $cliente->getIdCliente();
            $nombre = $cliente->getNombre();
            $apellido_Pat = $cliente->getApellidoPat();
            $apellido_Mat = $cliente->getApellidoMat();
            $sexo = $cliente->getSexo();
            $fecha_Nacimiento = $cliente->getFechaNacimiento();
            $curp = $cliente->getCurp();
            $ocupacion = $cliente->getOcupacion();
            $tipo_Identificacion = $cliente->getTipoIdentificacion();
            $num_Identificacion = $cliente->getNumIdentificacion();
            $celular = $cliente->getCelular();
            $rfc = $cliente->getRfc();

            $telefono = $cliente->getTelefono();
            $correo = $cliente->getCorreo();
            $estado = $cliente->getEstado();
            $codigo_Postal = $cliente->getCodigoPostal();

            $municipio = $cliente->getMunicipio();
            $colonia = $cliente->getColonia();
            $calle = $cliente->getCalle();
            $num_exterior = $cliente->getNumExterior();
            $num_interior = $cliente->getNumInterior();

            $mensaje = $cliente->getMensaje();
            $promocion = $cliente->getPromocion();


            $ins = "insert into cliente_tbl() values()";

            $insertar = "insert into cliente_tbl (nombre, apellido_Pat, apellido_Mat, sexo, fecha_Nacimiento, curp, ocupacion, tipo_Identificacion, num_Identificacion, celular,
                    rfc, telefono, correo, estado, codigo_Postal, municipio, colonia, calle, num_exterior, num_interior, mensaje, promocion) 
            values ('" . $nombre . "', '" . $apellido_Pat . "', '" . $apellido_Mat . "', " . 1 . ", " . $fecha_Nacimiento . ", '" . $curp . "', '" . $ocupacion . "', 
            " . 2 . ", '" . $num_Identificacion . "', " . $celular . ", '" . $rfc . "', " . $telefono . ", '" . $correo . "', '" . $estado . "', " . $codigo_Postal . ", 
            '" . $municipio . "', '" . $colonia . "', '" . $calle . "', " . $num_exterior . ", " . $num_interior . ", '" . $mensaje . "', " . 3 . ")";

            echo $insertar . "     ";

            if ($ps = $this->conexion->prepare($insertar)) {
                echo " Se preparó correctamente ";
                if ($ps->execute()) {
                    echo " Se ejecutó bien";
                    $verdad = true;
                } else {
                    echo " No se ejecutó bien";
                }
            } else {
                echo " No se preparó";
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        return $verdad;
    }

    public function guardaCiente($clienteData)
    {
        // TODO: Implement guardaCiente() method.
        try {

            $idNombre = $clienteData->getNombre();
            $idApPat = $clienteData->getApellidoMat();
            $idApMat = $clienteData->getApellidoPat();
            $idSexo = $clienteData->getSexo();
            $idFechaNac = $clienteData->getFechaNacimiento();
            $idRfc = $clienteData->getRfc();
            $idCurp = $clienteData->getCurp();
            $idCelular = $clienteData->getCelular();
            $idTelefono = $clienteData->getTelefono();
            $idCorreo = $clienteData->getCorreo();
            $idOcupacion = $clienteData->getOcupacion();
            $idIdentificacion = $clienteData->getIdentificacion();
            $idNumIdentificacion = $clienteData->getNumIdentificacion();
            $idEstado = $clienteData->getEstado();
            $idMunicipio = $clienteData->getMunicipio();
            $idLocalidad = $clienteData->getLocalidad();
            $idCalle = $clienteData->getCalle();
            $idCP = $clienteData->getCodigoPostal();
            $idNumExt = $clienteData->getNumExterior();
            $idNumInt = $clienteData->getNumInterior();
            $idPromocion = $clienteData->getPromocion();
            $idMensajeInterno = $clienteData->getMensajeInterno();
            $fechaCreacion = date('d-m-Y');
            $fechaModificacion = date('d-m-Y');

            $insertCliente = "INSERT INTO cliente_tbl (nombre, apellido_Pat, apellido_Mat, sexo, fecha_Nacimiento, curp," .
                " ocupacion, tipo_Identificacion, num_Identificacion, celular, rfc, telefono, correo, estado, codigo_Postal," .
                " municipio, localidad, calle, num_exterior, num_interior, mensaje,promocion, fecha_creacion, fecha_modificacion)" .
                " VALUES ('" . $idNombre . "', '" . $idApPat . "', '" . $idApMat . "', '" . $idSexo . "', '" . $idFechaNac . "','" . $idCurp . "', " .
                " '" . $idOcupacion . "', '" . $idIdentificacion . "', '" . $idNumIdentificacion . "', '" . $idCelular . "', '" . $idRfc . "', " .
                "'" . $idTelefono . "', '" . $idCorreo . "', '" . $idEstado . "', '" . $idCP . "', '" . $idMunicipio . "', '" . $idLocalidad . "', " .
                "'" . $idCalle . "'," . " '" . $idNumExt . "', '" . $idNumInt . "', '" . $idMensajeInterno . "', '" . $idPromocion . "', " .
                "'" . $fechaCreacion . "', '" . $fechaModificacion . "')";

            if ($ps = $this->conexion->prepare($insertCliente)) {
                if ($ps->execute()) {
                    $respuesta = 1;
                } else {
                    $respuesta = 2;
                }
            } else {
                $respuesta = 3;
            }
        } catch (Exception $exc) {
            $respuesta = 4;
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        //return $verdad;
        echo $respuesta;
    }

    public function borraCliente(Cliente $cliente)
    {
        // TODO: Implement borraCliente() method.
    }

    /**
     *
     * @param $nombre => Nombre del Usuario
     * @param $opc => Opción para autocompletar datos o para ver todos los usuarios
     *
     * @return mixed
     */

    public function traerTodos()
    {
        $clientes = array();
        try {
            $buscar = "select * from cliente_tbl";

            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $cliente = [
                        "nombre" => $row["nombre"],
                        "apellidoPat" => $row["apellido_Pat"],
                        "apellidoMat" => $row["apellido_Mat"],
                        "fechaNac" => $row["fecha_Nacimiento"],
                        "curp" => $row["curp"],
                        "celular" => $row["celular"],
                        "rfc" => $row["rfc"],
                        "telefono" => $row["telefono"],
                        "correo" => $row["correo"],
                        "estado" => $row["estado"],
                        "codigoPostal" => $row["codigo_Postal"],
                        "municipio" => $row["municipio"],
                        "colonia" => $row["colonia"],
                        "calle" => $row["calle"],
                        "numExt" => $row["num_exterior"],
                        "numInt" => $row["num_interior"]
                    ];

                    array_push($clientes, $cliente);
                }

            } else {
                echo " No se ejecutó TraerTodos SqlClienteDAO";
            }

        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        return $clientes;
    }

    public function consultaClienteEmpeño($nombre, $opc)
    {

        $clien = array();
        try {
            $rs = null;
            $buscar = "";

            if ($opc == 1) {
                $buscar = "select * from cliente_tbl where concat(nombre, ' ', apellido_Pat, ' ', apellido_Mat) like concat('%', '" . $nombre . "', '%');";
            } else {
                if ($opc == 2) {
                    $buscar = "select nombre, apellido_Pat, apellido_Mat, fecha_Nacimiento, curp, celular, rfc, telefono, correo, 
                    estado, codigo_Postal, municipio, colonia, calle, num_exterior, num_interior from cliente_tbl 
                    where concat(nombre, ' ', apellido_Pat, ' ', apellido_Mat) like concat('%', '" . $nombre . "', '%');";
                } else {
                    if ($opc == 3) {
                        $buscar = "select nombre, apellido_Pat, apellido_Mat, fecha_Nacimiento, curp, celular, rfc, telefono, correo, 
                    estado, codigo_Postal, municipio, colonia, calle, num_exterior, num_interior from cliente_tbl 
                    where concat(nombre, ' ', apellido_Pat, ' ', apellido_Mat) = '" . $nombre . "';";
                    }
                }
            }

            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {

                    /*
                        $cliente = new Cliente($row["nombre"], $row["apellido_Pat"], $row["apellido_Mat"], 0, $row["fecha_Nacimiento"], $row["curp"], 0, 0,0,
                        $row["celular"], $row["rfc"], $row["telefono"], $row["correo"], $row["estado"], $row["codigo_Postal"], $row["municipio"], $row["colonia"], $row["calle"], $row["num_exterior"],
                        $row["num_interior"], 0, 0);
                    */

                    $cliente = [
                        "nombre" => $row["nombre"],
                        "apellidoPat" => $row["apellido_Pat"],
                        "apellidoMat" => $row["apellido_Mat"],
                        "fechaNac" => $row["fecha_Nacimiento"],
                        "curp" => $row["curp"],
                        "celular" => $row["celular"],
                        "rfc" => $row["rfc"],
                        "telefono" => $row["telefono"],
                        "correo" => $row["correo"],
                        "estado" => $row["estado"],
                        "codigoPostal" => $row["codigo_Postal"],
                        "municipio" => $row["municipio"],
                        "colonia" => $row["colonia"],
                        "calle" => $row["calle"],
                        "numExt" => $row["num_exterior"],
                        "numInt" => $row["num_interior"]
                    ];

                    array_push($clien, $cliente);
                }

            } else {
                echo " No se ejecutó TraerTodos SqlClienteDAO";
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        return $clien;
    }

    private function convertirCliente($resultset)
    {

    }


    public function buscarIdCliente($celular, $correoCliente)
    {
        try {
            $id = -1;

            $buscar = "select id_Cliente from cliente_tbl where celular = " . $celular . " and correo = '" . $correoCliente . "';";

            $statement = $this->conexion->query($buscar);

            if ($statement->num_rows > 0) {
                $fila = $statement->fetch_object();
                $id = $fila->id_Cliente;
            }

        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }

        return $id;
    }


    public function autocompleteCliente($idCliente)
    {
        try {
            $html = '';

            $buscar = "SELECT id_Cliente, CONCAT (nombre, ' ',apellido_Pat,' ', apellido_Mat) as NombreCompleto FROM cliente_tbl WHERE nombre LIKE '%" . strip_tags($idCliente) . "%' ";

            $statement = $this->conexion->query($buscar);

            if ($statement->num_rows > 0) {
                while ($row = $statement->fetch_assoc()) {
                    $html .= '<div><a class="suggest-element" data="' . utf8_encode($row['NombreCompleto']) . '" id="' . $row['id_Cliente'] . '">' . utf8_encode($row['NombreCompleto']) . '</a></div>';
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        echo $html;

    }

}