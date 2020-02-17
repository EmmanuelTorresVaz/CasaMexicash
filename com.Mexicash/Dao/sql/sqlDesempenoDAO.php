<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Contrato.php");
include_once(BASE_PATH . "Conexion.php");

class sqlDesempenoDAO
{

    protected $conexion;
    protected $db;


    public function __construct()
    {
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    //Busqueda de Contrato
    public function estatusContrato($idContratoDes, $tipoContrato)
    {
        $datos = array();
        try {
            $buscar = "SELECT Con.id_Contrato as Contrato, Con.fecha_creacion as Fecha,
                        CONCAT (Cli.nombre, ' ',Cli.apellido_Pat,' ', Cli.apellido_Mat) as NombreCompleto,
                        Est.descripcion as Estatus, Con.id_Estatus as idEstatus FROM contrato_tbl as Con
                        INNER JOIN cliente_tbl as Cli on Con.id_Cliente = Cli.id_Cliente
                        INNER JOIN cat_estatus as Est on Con.id_Estatus = Est.id_Estatus
                        WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato= $tipoContrato";
            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {

                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "Contrato" => $row["Contrato"],
                        "Fecha" => $row["Fecha"],
                        "NombreCompleto" => $row["NombreCompleto"],
                        "Estatus" => $row["Estatus"],
                        "idEstatus" => $row["idEstatus"]
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

    //Busqueda de Cliente
    public function buscarCliente($idContratoDes, $tipoContrato, $estatus)
    {
        $datos = array();
        try {
            $buscar = "SELECT CONCAT (Cli.nombre, ' ', Cli.apellido_Pat,' ', Cli.apellido_Mat) as NombreCompleto,
                        CONCAT (calle, ', ',num_interior, ', ',num_exterior, ', ',  localidad, ', ') as DireccionCompleta,
                        CONCAT (municipio,', ',Est.descripcion ) as DireccionCompletaEst,
                        Con.cotitular as Cotitular, Usu.usuario as UsuarioName
                        FROM contrato_tbl as Con
                        LEFT JOIN cliente_tbl as Cli on Con.id_Cliente = Cli.id_Cliente
                        LEFT JOIN cat_estado as Est on Cli.estado = Est.id_Estado
                        LEFT JOIN usuarios_tbl as Usu on Con.usuario = Usu.id_User
                        WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato= $tipoContrato  and Con.id_Estatus= $estatus";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "NombreCompleto" => $row["NombreCompleto"],
                        "DireccionCompleta" => $row["DireccionCompleta"],
                        "DireccionCompletaEst" => $row["DireccionCompletaEst"],
                        "Cotitular" => $row["Cotitular"],
                        "UsuarioName" => $row["UsuarioName"]
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

    //Busqueda de Contrato
    public function buscarContrato($idContratoDes, $tipoContrato, $estatus)
    {
        $datos = array();
        try {
            $buscar = "SELECT
                        Con.fecha_creacion AS FechaEmp,
                        DATE(Con.fecha_creacion) AS FechaEmpConvert,
                        Con.fecha_Vencimiento AS FechaVenc,
                        DATE(Con.fecha_Vencimiento) AS FechaVenConvert,
                        Con.fecha_Alm AS FechaAlm,
                        Con.plazo AS PlazoDesc,
                        Con.tasa AS TasaDesc,
                        Con.alm AS AlmacDesc,
                        Con.seguro AS SeguDesc,
                        Con.iva AS IvaDesc,
                        Con.dias AS Dias,
                        Con.total_Prestamo AS TotalPrestamo,
                        Con.total_Interes AS TotalInteres,
                        Con.suma_InteresPrestamo AS TotalInteresPrestamo,
                        Con.abono AS Abono,
                        Con.fecha_Abono AS FechaAbono,
                        Con.diasAlm AS DiasAlmoneda,
                        Con.polizaSeguro AS PolizaSeguro,
                        Con.gps AS GPS,
                        Con.pension AS Pension
                        FROM contrato_tbl as Con
                        WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato= $tipoContrato and Con.id_Estatus= $estatus";
            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "FechaEmp" => $row["FechaEmp"],
                        "FechaEmpConvert" => $row["FechaEmpConvert"],
                        "FechaVenc" => $row["FechaVenc"],
                        "FechaVenConvert" => $row["FechaVenConvert"],
                        "FechaAlm" => $row["FechaAlm"],
                        "PlazoDesc" => $row["PlazoDesc"],
                        "TasaDesc" => $row["TasaDesc"],
                        "AlmacDesc" => $row["AlmacDesc"],
                        "SeguDesc" => $row["SeguDesc"],
                        "IvaDesc" => $row["IvaDesc"],
                        "Dias" => $row["Dias"],
                        "TotalPrestamo" => $row["TotalPrestamo"],
                        "TotalInteres" => $row["TotalInteres"],
                        "TotalInteresPrestamo" => $row["TotalInteresPrestamo"],
                        "Abono" => $row["Abono"],
                        "FechaAbono" => $row["FechaAbono"],
                        "DiasAlmoneda" => $row["DiasAlmoneda"],
                        "PolizaSeguro" => $row["PolizaSeguro"],
                        "GPS" => $row["GPS"],
                        "Pension" => $row["Pension"]
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

    //Busqueda de detalle del contrato
    public function buscarDetalle($idContratoDes, $estatus)
    {
        $datos = array();
        try {
            $buscar = "SELECT Art.detalle as Detalle,Art.ubicacion as Ubicacion FROM articulo_tbl as Art
                        WHERE Art.id_Contrato = '$idContratoDes'  and Art.id_Estatus= $estatus";
            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {

                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "Detalle" => $row["Detalle"],
                        "Ubicacion" => $row["Ubicacion"]
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

    //Busqueda de detalle del auto
    public function buscarDetalleAuto($idContratoDes, $estatus)
    {
        $datos = array();
        try {
            $buscar = "SELECT Auto.marca as Marca,Auto.modelo as Modelo,Auto.año as Anio,
                        COl.descripcion as ColorAuto, Auto.observaciones as Obs 
                        FROM auto_tbl as Auto 
                        INNER JOIN cat_color as COl on Auto.color = COl.id_Color
                        WHERE Auto.id_Contrato = '$idContratoDes' and Auto.id_Estatus= $estatus";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {

                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "Marca" => $row["Marca"],
                        "Modelo" => $row["Modelo"],
                        "Anio" => $row["Anio"],
                        "ColorAuto" => $row["ColorAuto"],
                        "Obs" => $row["Obs"]
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

    //Validacion de token
    public function validarToken($token)
    {
        try {
            $id = -1;
            $buscar = "SELECT id_token,descripcion FROM cat_token 
                        WHERE descripcion = '$token' and estatus= 1";
            $statement = $this->conexion->query($buscar);
            if ($statement->num_rows > 0) {
                $fila = $statement->fetch_object();
                $id = $fila->id_token;
            } else {
                $id = -1;
            }

        } catch (Exception $exc) {
            $id = -1;
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        echo $id;
        //return $id;
    }

    //Generar Desempeño o Refrendo
    public function generar($tipeFormulario, $newFechaVencimiento, $saldoPendiente, $descuento, $newFechaAlm, $abonoACapital, $contrato, $idEstatusArt)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $fechaModificacion = date('Y-m-d H:i:s');
            $usuario = $_SESSION["idUsuario"];
            $updateContrato = "UPDATE contrato_tbl SET
                                    fecha_Vencimiento = '$newFechaVencimiento',
                                    total_Prestamo = $saldoPendiente,
                                    descuento = $descuento,
                                    fecha_Alm = '$newFechaAlm',
                                    abono = $abonoACapital,
                                    fecha_Abono = '$fechaModificacion',
                                    fecha_modificacion = '$fechaModificacion',
                                    usuario = $usuario
                                    WHERE
                                    id_Contrato = $contrato";

            if ($ps = $this->conexion->prepare($updateContrato)) {
                if ($ps->execute()) {
                    if($tipeFormulario==1){
                        $updateArticulos = "UPDATE articulo_tbl SET  fecha_modificacion = '$fechaModificacion',usuario= $usuario, id_Estatus = $idEstatusArt 
                                WHERE id_Contrato=$contrato";
                    }
                    if ($ps = $this->conexion->prepare($updateArticulos)) {
                        if ($ps->execute()) {
                            $verdad = mysqli_stmt_affected_rows($ps);
                        } else {
                            $verdad = -1;
                        }
                    } else {
                        $verdad = -1;
                    }
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












    public function generarDesempenoAuto($pago, $idImporte, $idContrato)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $fechaModificacion = date('Y-m-d H:i:s');
            $usuario = $_SESSION["idUsuario"];
            $updateDesempeno = "UPDATE contrato_tbl SET pago=$pago,fecha_Pago='$fechaModificacion' ,
                                descuento=$idImporte, usuario= $usuario ,
                                fecha_modificacion = '$fechaModificacion',	id_Estatus=2
                                WHERE id_Contrato=$idContrato";
            if ($ps = $this->conexion->prepare($updateDesempeno)) {
                if ($ps->execute()) {
                    $updateArticulos = "UPDATE auto_tbl SET id_Estatus=2, fecha_modificacion = '$fechaModificacion',usuario= $usuario 
                                WHERE id_Contrato=$idContrato";
                    if ($ps = $this->conexion->prepare($updateArticulos)) {
                        if ($ps->execute()) {
                            $verdad = mysqli_stmt_affected_rows($ps);
                        } else {
                            $verdad = -1;
                        }
                    } else {
                        $verdad = -1;
                    }
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


    public function buscarContratoDes($idContratoDes)
    {
        $datos = array();
        /* try {
             $buscar = "SELECT
                         Con.fecha_creacion AS FechaEmp,
                         DATE(Con.fecha_creacion) AS FechaEmpConvert,
                         Con.fecha_Vencimiento AS FechaVenc,
                         DATE(Con.fecha_Vencimiento) AS FechaVenConvert,
                         Con.fecha_Alm AS FechaAlm,
                         Con.plazo AS PlazoDesc,
                         Con.tasa AS TasaDesc,
                         Con.alm AS AlmacDesc,
                         Con.seguro AS SeguDesc,
                         Con.iva AS IvaDesc,
                         Con.dias AS Dias,
                         Con.total_Prestamo AS TotalPrestamo,
                         Con.total_Interes AS TotalInteres,
                         Con.suma_InteresPrestamo AS TotalInteresPrestamo,
                         Con.abono AS Abono,
                         Con.fecha_Abono AS FechaAbono
                         FROM contrato_tbl as Con
                         WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato= 1  and Con.id_Estatus= 1";

             $rs = $this->conexion->query($buscar);
             if ($rs->num_rows > 0) {

                 while ($row = $rs->fetch_assoc()) {
                     $data = [
                         "FechaEmp" => $row["FechaEmp"],
                         "FechaEmpConvert" => $row["FechaEmpConvert"],
                         "FechaVenc" => $row["FechaVenc"],
                         "FechaVenConvert" => $row["FechaVenConvert"],
                         "FechaAlm" => $row["FechaAlm"],
                         "PlazoDesc" => $row["PlazoDesc"],
                         "TasaDesc" => $row["TasaDesc"],
                         "AlmacDesc" => $row["AlmacDesc"],
                         "SeguDesc" => $row["SeguDesc"],
                         "IvaDesc" => $row["IvaDesc"],
                         "Dias" => $row["Dias"],
                         "TotalPrestamo" => $row["TotalPrestamo"],
                         "TotalInteres" => $row["TotalInteres"],
                         "TotalInteresPrestamo" => $row["TotalInteresPrestamo"],
                         "Abono" => $row["Abono"],
                         "FechaAbono" => $row["FechaAbono"]
                     ];
                     array_push($datos, $data);
                 }
             }
         } catch (Exception $exc) {
             echo $exc->getMessage();
         } finally {
             $this->db->closeDB();
         }*/
        echo json_encode($datos);
    }


//Auto
    public function buscarClienteDesAuto($idContratoDes)
    {
        $datos = array();
        try {
            $buscar = "SELECT CONCAT (Cli.nombre, ' ', Cli.apellido_Pat,' ', Cli.apellido_Mat) as NombreCompleto,
                        CONCAT (calle, ', ',num_interior, ', ',num_exterior, ', ',  localidad, ', ') as DireccionCompleta,
                        CONCAT (municipio,', ',Est.descripcion ) as DireccionCompletaEst,
                        Con.cotitular as Cotitular, Usu.usuario as UsuarioName
                        FROM contrato_tbl as Con
                        LEFT JOIN cliente_tbl as Cli on Con.id_Cliente = Cli.id_Cliente
                        LEFT JOIN cat_estado as Est on Cli.estado = Est.id_Estado
                        LEFT JOIN usuarios_tbl as Usu on Con.usuario = Usu.id_User
                        WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato=2  and Con.id_Estatus= 1";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {

                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "NombreCompleto" => $row["NombreCompleto"],
                        "DireccionCompleta" => $row["DireccionCompleta"],
                        "DireccionCompletaEst" => $row["DireccionCompletaEst"],
                        "Cotitular" => $row["Cotitular"],
                        "UsuarioName" => $row["UsuarioName"]
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

    public function buscarContratoDesAuto($idContratoDes)
    {
        $datos = array();
        try {
            $buscar = "SELECT
                        Con.fecha_creacion AS FechaEmp,
                        DATE(Con.fecha_creacion) AS FechaEmpConvert,
                        Con.fecha_Vencimiento AS FechaVenc,
                        DATE(Con.fecha_Vencimiento) AS FechaVenConvert,
                        Con.fecha_Alm AS FechaAlm,
                        Con.plazo AS PlazoDesc,
                        Con.tasa AS TasaDesc,
                        Con.alm AS AlmacDesc,
                        Con.seguro AS SeguDesc,
                        Con.iva AS IvaDesc,
                        Con.dias AS Dias,
                        Con.total_Prestamo AS TotalPrestamo,
                        Con.total_Interes AS TotalInteres,
                        Con.suma_InteresPrestamo AS TotalInteresPrestamo,
                        Con.polizaSeguro AS PolizaSeguro,
                        Con.gps AS GPS,
                        Con.abono AS Abono,
                        Con.fecha_Abono AS FechaAbono
                        FROM contrato_tbl as Con
                        WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato= 2  and Con.id_Estatus= 1";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {

                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "FechaEmp" => $row["FechaEmp"],
                        "FechaEmpConvert" => $row["FechaEmpConvert"],
                        "FechaVenc" => $row["FechaVenc"],
                        "FechaVenConvert" => $row["FechaVenConvert"],
                        "FechaAlm" => $row["FechaAlm"],
                        "PlazoDesc" => $row["PlazoDesc"],
                        "TasaDesc" => $row["TasaDesc"],
                        "AlmacDesc" => $row["AlmacDesc"],
                        "SeguDesc" => $row["SeguDesc"],
                        "IvaDesc" => $row["IvaDesc"],
                        "Dias" => $row["Dias"],
                        "TotalPrestamo" => $row["TotalPrestamo"],
                        "TotalInteres" => $row["TotalInteres"],
                        "TotalInteresPrestamo" => $row["TotalInteresPrestamo"],
                        "PolizaSeguro" => $row["PolizaSeguro"],
                        "GPS" => $row["GPS"],
                        "Abono" => $row["Abono"],
                        "FechaAbono" => $row["FechaAbono"]
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




    public function buscarContratoRefAuto($idContratoDes)
    {
        $datos = array();
        try {
            $buscar = "SELECT
                        Con.fecha_creacion AS FechaEmp,
                        DATE(Con.fecha_creacion) AS FechaEmpConvert,
                        Con.fecha_Vencimiento AS FechaVenc,
                        DATE(Con.fecha_Vencimiento) AS FechaVenConvert,
                        Con.fecha_Alm AS FechaAlm,
                        Con.plazo AS PlazoDesc,
                        Con.tasa AS TasaDesc,
                        Con.alm AS AlmacDesc,
                        Con.seguro AS SeguDesc,
                        Con.iva AS IvaDesc,
                        Con.dias AS Dias,
                        Con.total_Prestamo AS TotalPrestamo,
                        Con.total_Interes AS TotalInteres,
                        Con.suma_InteresPrestamo AS TotalInteresPrestamo,
                        Con.polizaSeguro AS PolizaSeguro,
                        Con.gps AS GPS,
                        Con.abono AS Abono,
                        Con.fecha_Abono AS FechaAbono
                        FROM contrato_tbl as Con
                        WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato= 2  and Con.id_Estatus= 1";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {

                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "FechaEmp" => $row["FechaEmp"],
                        "FechaEmpConvert" => $row["FechaEmpConvert"],
                        "FechaVenc" => $row["FechaVenc"],
                        "FechaVenConvert" => $row["FechaVenConvert"],
                        "FechaAlm" => $row["FechaAlm"],
                        "PlazoDesc" => $row["PlazoDesc"],
                        "TasaDesc" => $row["TasaDesc"],
                        "AlmacDesc" => $row["AlmacDesc"],
                        "SeguDesc" => $row["SeguDesc"],
                        "IvaDesc" => $row["IvaDesc"],
                        "Dias" => $row["Dias"],
                        "TotalPrestamo" => $row["TotalPrestamo"],
                        "TotalInteres" => $row["TotalInteres"],
                        "TotalInteresPrestamo" => $row["TotalInteresPrestamo"],
                        "PolizaSeguro" => $row["PolizaSeguro"],
                        "GPS" => $row["GPS"],
                        "Abono" => $row["Abono"],
                        "FechaAbono" => $row["FechaAbono"]
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


    public function estatusContratoAuto($idContratoDes)
    {
        $datos = array();
        try {
            $buscar = "SELECT Con.id_Contrato as Contrato, Con.fecha_creacion as Fecha,
                        CONCAT (Cli.nombre, ' ',Cli.apellido_Pat,' ', Cli.apellido_Mat) as NombreCompleto,
                        Est.descripcion as Estatus, Con.id_Estatus as idEstatus FROM contrato_tbl as Con
                        INNER JOIN cliente_tbl as Cli on Con.id_Cliente = Cli.id_Cliente
                        INNER JOIN cat_estatus as Est on Con.id_Estatus = Est.id_Estatus
                        WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato= 2";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {

                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "Contrato" => $row["Contrato"],
                        "Fecha" => $row["Fecha"],
                        "NombreCompleto" => $row["NombreCompleto"],
                        "Estatus" => $row["Estatus"],
                        "idEstatus" => $row["idEstatus"]
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