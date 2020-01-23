<?php
if(!isset($_SESSION)) {
    session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Cliente.php");
include_once(MODELO_PATH . "ClienteActualizar.php");
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

    public function guardaCiente($clienteData)
    {
        // TODO: Implement guardaCiente() method.
        try {

            $idNombre = $clienteData->getNombre();
            $idApPat = $clienteData->getApellidoPat();
            $idApMat = $clienteData->getApellidoMat();
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
            $fechaCreacion = date('Y-m-d H:i:s');
            $fechaModificacion = date('Y-m-d H:i:s');
            $usuario = $_SESSION["idUsuario"];

            $insertCliente = "INSERT INTO cliente_tbl (nombre, apellido_Pat, apellido_Mat, sexo, fecha_Nacimiento, curp," .
                " ocupacion, tipo_Identificacion, num_Identificacion, celular, rfc, telefono, correo, estado, codigo_Postal," .
                " municipio, localidad, calle, num_exterior, num_interior, mensaje,promocion, fecha_creacion, fecha_modificacion,usuario)" .
                " VALUES ('" . $idNombre . "', '" . $idApPat . "', '" . $idApMat . "', '" . $idSexo . "', '" . $idFechaNac . "','" . $idCurp . "', " .
                " '" . $idOcupacion . "', '" . $idIdentificacion . "', '" . $idNumIdentificacion . "', '" . $idCelular . "', '" . $idRfc . "', " .
                "'" . $idTelefono . "', '" . $idCorreo . "', '" . $idEstado . "', '" . $idCP . "', '" . $idMunicipio . "', '" . $idLocalidad . "', " .
                "'" . $idCalle . "'," . " '" . $idNumExt . "', '" . $idNumInt . "', '" . $idMensajeInterno . "', '" . $idPromocion . "', " .
                "'" . $fechaCreacion . "', '" . $fechaModificacion . "', '". $usuario . "')";

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
                    $buscar = "select id_Cliente, nombre, apellido_Pat, apellido_Mat, fecha_Nacimiento, curp, celular, rfc, telefono, correo, 
                    estado, codigo_Postal, municipio, colonia, calle, num_exterior, num_interior from cliente_tbl 
                    where concat(nombre, ' ', apellido_Pat, ' ', apellido_Mat) like concat('%', '" . $nombre . "', '%');";
                } else {
                    if ($opc == 3) {

                        $buscar = "SELECT c.id_Cliente, CONCAT (c.nombre, ' ', c.apellido_Pat,' ', c.apellido_Mat) as nombreCompleto, c.fecha_Nacimiento, c.curp, c.celular, c.rfc, c.telefono, c.correo, CONCAT (c.calle, ' ', c.num_exterior, ', Interior ', c.num_interior, ', CP ', c.codigo_Postal, ', ', l.descripcion) as direccionCompleta, e.descripcion as estado  
                                FROM cliente_tbl as c 
                                INNER JOIN cat_estado as e
                                on c.estado = e.id_Estado 
                                INNER JOIN cat_municipio as m
                                on c.municipio = m.id_Municipio and c.estado = m.id_Estado 
                                INNER JOIN cat_localidad as l
                                on c.localidad = l.id_Localidad and c.estado = l.id_Estado and c.municipio = l.id_Municipio 
                                where concat(c.nombre, ' ', c.apellido_Pat, ' ', c.apellido_Mat) like concat('%', '" . $nombre . "', '%');";
                    }
                }
            }

            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {

                    $cliente = [
                        "nombreCompleto" => $row["nombreCompleto"],
                        "fechaNac" => $row["fecha_Nacimiento"],
                        "curp" => $row["curp"],
                        "celular" => $row["celular"],
                        "rfc" => $row["rfc"],
                        "telefono" => $row["telefono"],
                        "correo" => $row["correo"],
                        "direccionCompleta" => $row["direccionCompleta"],
                        "estado" => $row["estado"]
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

            $buscar = "SELECT id_Cliente, CONCAT (nombre, ' ',apellido_Pat,' ', apellido_Mat) as NombreCompleto, celular , CONCAT (calle, ', ',num_interior, ', ',num_exterior, ', ',  cat_localidad.descripcion, ', ',cat_municipio.descripcion,', ',cat_estado.descripcion ) as direccionCompleta FROM cliente_tbl " .
                " INNER JOIN cat_estado on cliente_tbl.estado = cat_estado.id_Estado " .
                " INNER JOIN cat_municipio on cliente_tbl.municipio = cat_municipio.id_Municipio and cliente_tbl.estado = cat_municipio.id_Estado  " .
                " INNER JOIN cat_localidad on cliente_tbl.localidad = cat_localidad.id_Localidad and cliente_tbl.estado = cat_localidad.id_Estado and cliente_tbl.municipio = cat_localidad.id_Municipio" .
                " WHERE nombre LIKE '%" . strip_tags($idCliente) . "%' LIMIT 5 ";
            $statement = $this->conexion->query($buscar);
            if ($statement->num_rows > 0) {
                while ($row = $statement->fetch_assoc()) {
                    $html .= '<div><a class="suggest-element" data="' . utf8_encode($row['NombreCompleto']) . '" celular="' . utf8_encode($row['celular'])
                        . '" direccionCompleta="' . utf8_encode($row['direccionCompleta']) . '" id="' . $row['id_Cliente'] . '">' . utf8_encode($row['NombreCompleto']) . '</a></div>';
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        echo $html;

    }

    public function buscarClienteDatos($idClienteEditar)
    {
        $datos = array();
        try {
            $buscar = "SELECT
    nombre,
    apellido_Pat,
    apellido_Mat,
    sexo,
    fecha_Nacimiento,
    curp,
    ocupacion,
    tipo_Identificacion,
    num_Identificacion,
    celular,
    rfc,
    telefono,
    correo,
    estado,
    cat_estado.descripcion as estadoName,
    codigo_Postal,
    municipio,
    cat_municipio.descripcion as municipioName,
    localidad,
    cat_localidad.descripcion as localidadName,
    calle,
    num_exterior,
    num_interior,
    mensaje,
    promocion
FROM
    cliente_tbl
INNER JOIN cat_estado ON cliente_tbl.estado = cat_estado.id_Estado
INNER JOIN cat_municipio ON cliente_tbl.municipio = cat_municipio.id_Municipio AND cliente_tbl.estado = cat_municipio.id_Estado
INNER JOIN cat_localidad ON cliente_tbl.localidad = cat_localidad.id_Localidad AND cliente_tbl.estado = cat_localidad.id_Estado AND cliente_tbl.municipio = cat_localidad.id_Municipio
WHERE
    id_Cliente = '$idClienteEditar'";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {

                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "nombre" => $row["nombre"],
                        "apellido_Pat" => $row["apellido_Pat"],
                        "apellido_Mat" => $row["apellido_Mat"],
                        "sexo" => $row["sexo"],
                        "fecha_Nacimiento" => $row["fecha_Nacimiento"],
                        "curp" => $row["curp"],
                        "ocupacion" => $row["ocupacion"],
                        "tipo_Identificacion" => $row["tipo_Identificacion"],
                        "num_Identificacion" => $row["num_Identificacion"],
                        "celular" => $row["celular"],
                        "rfc" => $row["rfc"],
                        "telefono" => $row["telefono"],
                        "correo" => $row["correo"],
                        "estado" => $row["estado"],
                        "estadoName" => $row["estadoName"],
                        "codigo_Postal" => $row["codigo_Postal"],
                        "municipio" => $row["municipio"],
                        "municipioName" => $row["municipioName"],
                        "localidad" => $row["localidad"],
                        "localidadName" => $row["localidadName"],
                        "calle" => $row["calle"],
                        "num_exterior" => $row["num_exterior"],
                        "num_interior" => $row["num_interior"],
                        "mensaje" => $row["mensaje"],
                        "promocion" => $row["promocion"]
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

    public function actualizaCiente($idClienteEditar,$clienteData)
    {

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
            $fechaModificacion = date('Y-m-d H:i:s');
            $usuario = $_SESSION["idUsuario"];
            $updateCliente = "UPDATE cliente_tbl
SET
    nombre = '$idNombre',
    apellido_Pat = '$idApPat' ,
    apellido_Mat = '$idApMat',
    sexo = '$idSexo' ,
    fecha_Nacimiento =  '$idFechaNac' ,
    curp = '$idCurp' ,
    ocupacion = '$idOcupacion' ,
    tipo_Identificacion = '$idIdentificacion' ,
    num_Identificacion = '$idNumIdentificacion' ,
    celular = '$idCelular' ,
    rfc = '$idRfc' ,
    telefono = '$idTelefono' ,
    correo = '$idCorreo' ,
    estado = '$idEstado' ,
    codigo_Postal = '$idCP' ,
    municipio = '$idMunicipio',
    localidad = '$idLocalidad' ,
    calle = '$idCalle' ,
    num_exterior = '$idNumExt' ,
    num_interior = '$idNumInt' ,
    mensaje = '$idMensajeInterno' ,
    promocion = '$idPromocion' ,
    fecha_modificacion = '$fechaModificacion' ,
    usuario = '$usuario' 
WHERE id_Cliente = '$idClienteEditar'";

            if ($ps = $this->conexion->prepare($updateCliente)) {
                if ($ps->execute()) {
                    $verdad =  mysqli_stmt_affected_rows($ps);
                } else {
                    $verdad = -1;
                }
            } else {
                $verdad = -1;
            }

        } catch (Exception $exc) {
            $verdad = -1;
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        //return $verdad;
        echo $verdad;
    }

    public function buscarClienteAgregado(){
        try {

            $buscar = "SELECT id_Cliente, CONCAT (nombre, ' ',apellido_Pat,' ', apellido_Mat) as NombreCompleto, celular , CONCAT (calle, ', ',num_interior, ', ',num_exterior, ', ',  cat_localidad.descripcion, ', ',cat_municipio.descripcion,', ',cat_estado.descripcion ) as direccionCompleta FROM cliente_tbl " .
                " INNER JOIN cat_estado on cliente_tbl.estado = cat_estado.id_Estado " .
                " INNER JOIN cat_municipio on cliente_tbl.municipio = cat_municipio.id_Municipio and cliente_tbl.estado = cat_municipio.id_Estado  " .
                " INNER JOIN cat_localidad on cliente_tbl.localidad = cat_localidad.id_Localidad and cliente_tbl.estado = cat_localidad.id_Estado and cliente_tbl.municipio = cat_localidad.id_Municipio" .
                " WHERE  id_Cliente = (SELECT MAX(id_Cliente) FROM cliente_tbl)";
            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                $consulta = $rs->fetch_assoc();
                $data['status'] = 'ok';
                $data['result'] = $consulta;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        echo json_encode($data);

         }

    public function buscarClienteEditado($idClienteEditado){
        try {

            $buscar = "SELECT id_Cliente, CONCAT (nombre, ' ',apellido_Pat,' ', apellido_Mat) as NombreCompleto, celular , CONCAT (calle, ', ',num_interior, ', ',num_exterior, ', ',  cat_localidad.descripcion, ', ',cat_municipio.descripcion,', ',cat_estado.descripcion ) as direccionCompleta FROM cliente_tbl " .
                " INNER JOIN cat_estado on cliente_tbl.estado = cat_estado.id_Estado " .
                " INNER JOIN cat_municipio on cliente_tbl.municipio = cat_municipio.id_Municipio and cliente_tbl.estado = cat_municipio.id_Estado  " .
                " INNER JOIN cat_localidad on cliente_tbl.localidad = cat_localidad.id_Localidad and cliente_tbl.estado = cat_localidad.id_Estado and cliente_tbl.municipio = cat_localidad.id_Municipio" .
                " WHERE  id_Cliente = '$idClienteEditado'";
            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                $consulta = $rs->fetch_assoc();
                $data['status'] = 'ok';
                $data['result'] = $consulta;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        echo json_encode($data);

    }

    public function verTodos($idNombres)
    {
        $datos = array();
        try {
            $buscar = "SELECT id_Cliente, CONCAT (nombre, ' ',apellido_Pat,' ', apellido_Mat) as NombreCompleto, celular , CONCAT (calle, ', ',num_interior, ', ',num_exterior, ', ',  cat_localidad.descripcion, ', ',cat_municipio.descripcion,', ',cat_estado.descripcion ) as direccionCompleta FROM cliente_tbl " .
                " INNER JOIN cat_estado on cliente_tbl.estado = cat_estado.id_Estado " .
                " INNER JOIN cat_municipio on cliente_tbl.municipio = cat_municipio.id_Municipio and cliente_tbl.estado = cat_municipio.id_Estado  " .
                " INNER JOIN cat_localidad on cliente_tbl.localidad = cat_localidad.id_Localidad and cliente_tbl.estado = cat_localidad.id_Estado and cliente_tbl.municipio = cat_localidad.id_Municipio" .
                " WHERE nombre LIKE '%" . strip_tags($idNombres) . "%' ";
            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Cliente" => $row["id_Cliente"],
                        "NombreCompleto" => $row["NombreCompleto"],
                        "celular" => $row["celular"],
                        "direccionCompleta" => $row["direccionCompleta"]
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

    public function historial($clienteEmpeno)
    {
        $datos = array();
        try {
            $buscar = "SELECT Con.id_Contrato as Contrato,Con.id_Cliente as Cliente,CONCAT (Cli.nombre, ' ',Cli.apellido_Pat,' ', Cli.apellido_Mat) as NombreCompleto,
                        Inte.tasa_interes as Interes, Con.fecha_Vencimiento as FechaVenc, Con.fecha_creacion as FechaCreac, Con.observaciones as Observ, Art.tipo as ArtTipo, Est.descripcion as EstDesc,Art.detalle as Detalle
                        FROM contrato_tbl as Con
                        INNER JOIN cliente_tbl as Cli on Con.id_Cliente = Cli.id_Cliente 
                        INNER JOIN cat_interes as Inte on Con.id_Interes = Inte.id_interes 
                        INNER JOIN articulo_tbl as Art on Con.id_Contrato = Art.id_Contrato
                        INNER JOIN cat_estatus as Est on Con.id_Estatus = Est.id_Estatus WHERE Con.id_Cliente=$clienteEmpeno";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "Contrato" => $row["Contrato"],
                        "Cliente" => $row["Cliente"],
                        "NombreCompleto" => $row["NombreCompleto"],
                        "Interes" => $row["Interes"],
                        "FechaVenc" => $row["FechaVenc"],
                        "FechaCreac" => $row["FechaCreac"],
                        "Observ" => $row["Observ"],
                        "ArtTipo" => $row["ArtTipo"],
                        "EstDesc" => $row["EstDesc"],
                        "Detalle" => $row["Detalle"]
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

    public function historialCount($clienteEmpeno)
    {
        $datos = array();
        try {
            $buscar = "SELECT SUM(Con.id_Estatus=1) as TotalEmpeno,SUM(Con.id_Estatus=2) as TotalDesem, " .
                " SUM(Con.id_Estatus=3) as TotalRefrendo,SUM(Con.id_Estatus=4) as TotalAlmoneda " .
                " FROM contrato_tbl as Con INNER JOIN cliente_tbl as Cli on Con.id_Cliente = Cli.id_Cliente " .
                " INNER JOIN cat_estatus as Sta on Con.id_Estatus = Sta.id_Estatus WHERE Con.id_Cliente=$clienteEmpeno";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "TotalEmpeno" => $row["TotalEmpeno"],
                        "TotalDesem" => $row["TotalDesem"],
                        "TotalRefrendo" => $row["TotalRefrendo"],
                        "TotalAlmoneda" => $row["TotalAlmoneda"]
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