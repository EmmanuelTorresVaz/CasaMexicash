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

    public function generarDesempeno($pago, $idImporte, $idContrato)
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
                    $updateArticulos = "UPDATE articulo_tbl SET id_Estatus=2
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

    public function buscarClienteDes($idContratoDes)
    {
        $datos = array();
        try {
            $buscar = "SELECT CONCAT (Cli.nombre, ' ', Cli.apellido_Pat,' ', Cli.apellido_Mat) as NombreCompleto,
                        CONCAT (calle, ', ',num_interior, ', ',num_exterior, ', ',  Loc.descripcion, ', ') as DireccionCompleta,
                        CONCAT (Mun.descripcion,', ',Est.descripcion ) as DireccionCompletaEst,
                        Con.cotitular as Cotitular, Usu.usuario as UsuarioName
                        FROM contrato_tbl as Con
                        LEFT JOIN cliente_tbl as Cli on Con.id_Cliente = Cli.id_Cliente
                        LEFT JOIN cat_estado as Est on Cli.estado = Est.id_Estado
                        LEFT JOIN cat_municipio as Mun on Cli.municipio = Mun.id_Municipio and Cli.estado = Mun.id_Estado 
                        LEFT JOIN cat_localidad as Loc on Cli.localidad = Loc.id_Localidad and Cli.estado = Loc.id_Estado and Cli.municipio = Loc.id_Municipio
                        LEFT JOIN usuarios_tbl as Usu on Con.usuario = Usu.id_User
                        WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato= 1  and Con.id_Estatus= 1";

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

    public function buscarContratoDes($idContratoDes)
    {
        $datos = array();
        try {
            $buscar = "SELECT
                        Con.fecha_creacion AS FechaEmp,
                        DATE(Con.fecha_creacion) AS FechaEmpConvert,
                        Con.fecha_Vencimiento AS FechaVenc,
                        Con.fecha_Alm AS FechaAlm,
                        Con.plazo AS PlazoDesc,
                        Con.tasa AS TasaDesc,
                        Con.alm AS AlmacDesc,
                        Con.seguro AS SeguDesc,
                        Con.iva AS IvaDesc,
                        Con.dias AS Dias,
                        Con.total_Prestamo AS TotalPrestamo,
                        Con.total_Interes AS TotalInteres,
                        Con.suma_InteresPrestamo AS TotalInteresPrestamo
                        FROM contrato_tbl as Con
                        WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato= 1  and Con.id_Estatus= 1";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {

                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "FechaEmp" => $row["FechaEmp"],
                        "FechaEmpConvert" => $row["FechaEmpConvert"],
                        "FechaVenc" => $row["FechaVenc"],
                        "FechaAlm" => $row["FechaAlm"],
                        "PlazoDesc" => $row["PlazoDesc"],
                        "TasaDesc" => $row["TasaDesc"],
                        "AlmacDesc" => $row["AlmacDesc"],
                        "SeguDesc" => $row["SeguDesc"],
                        "IvaDesc" => $row["IvaDesc"],
                        "Dias" => $row["Dias"],
                        "TotalPrestamo" => $row["TotalPrestamo"],
                        "TotalInteres" => $row["TotalInteres"],
                        "TotalInteresPrestamo" => $row["TotalInteresPrestamo"]
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

    public function buscarDetalleDes($idContratoDes)
    {
        $datos = array();
        try {
            $buscar = "SELECT Art.detalle as Detalle,Art.ubicacion as Ubicacion FROM articulo_tbl as Art
                        WHERE Art.id_Contrato = '$idContratoDes'  and Art.id_Estatus= 1";

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

//Auto
    public function buscarClienteDesAuto($idContratoDes)
    {
        $datos = array();
        try {
            $buscar = "SELECT CONCAT (Cli.nombre, ' ', Cli.apellido_Pat,' ', Cli.apellido_Mat) as NombreCompleto,
                        CONCAT (calle, ', ',num_interior, ', ',num_exterior, ', ',  Loc.descripcion, ', ') as DireccionCompleta,
                        CONCAT (Mun.descripcion,', ',Est.descripcion ) as DireccionCompletaEst,
                        Con.cotitular as Cotitular, Usu.usuario as UsuarioName
                        FROM contrato_tbl as Con
                        LEFT JOIN cliente_tbl as Cli on Con.id_Cliente = Cli.id_Cliente
                        LEFT JOIN cat_estado as Est on Cli.estado = Est.id_Estado
                        LEFT JOIN cat_municipio as Mun on Cli.municipio = Mun.id_Municipio and Cli.estado = Mun.id_Estado 
                        LEFT JOIN cat_localidad as Loc on Cli.localidad = Loc.id_Localidad and Cli.estado = Loc.id_Estado and Cli.municipio = Loc.id_Municipio
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
            $buscar = "SELECT Con.fecha_creacion as FechaEmp,DATE(Con.fecha_creacion) as FechaEmpConvert, Con.fecha_Vencimiento as FechaVenc, Con.fecha_Movimiento as FechaCom,
                        CONCAT (Inte.tipo_interes, ' ', Inte.plazo, ' ', Inte.periodo) as PlazoDes, Inte.tasa as TasaDesc,
                        Inte.alm as AlmacDesc, Inte.seguro as SeguDesc, Inte.iva as IvaDesc, Con.intereses as InteresesDes,
                         Inte.dias as Dias, Con.total_Prestamo as TotalPrest
                        FROM contrato_tbl as Con
                        INNER JOIN cat_interes as Inte  on Con.id_Interes = Inte.id_interes
                        WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato= 2  and Con.id_Estatus= 1";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {

                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "FechaEmp" => $row["FechaEmp"],
                        "FechaEmpConvert" => $row["FechaEmpConvert"],
                        "FechaVenc" => $row["FechaVenc"],
                        "FechaCom" => $row["FechaCom"],
                        "PlazoDes" => $row["PlazoDes"],
                        "TasaDesc" => $row["TasaDesc"],
                        "AlmacDesc" => $row["AlmacDesc"],
                        "SeguDesc" => $row["SeguDesc"],
                        "IvaDesc" => $row["IvaDesc"],
                        "Dias" => $row["Dias"],
                        "InteresesDes" => $row["InteresesDes"],
                        "TotalPrest" => $row["TotalPrest"]
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

    public function buscarDetalleDesAuto($idContratoDes)
    {
        $datos = array();
        try {
            $buscar = "SELECT Auto.marca as Marca,Auto.modelo as Modelo,Auto.año as Anio,Auto.color as ColorAuto,  Auto.observaciones as Obs FROM auto_tbl as Auto
                        WHERE Auto.id_Contrato = '$idContratoDes' and Auto.id_Estatus= 1";

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

    //Refrendo
    public function buscarContratoRef($idContratoDes)
    {
        $datos = array();
        try {
            $buscar = "SELECT Con.fecha_creacion as FechaEmp, Con.fecha_Vencimiento as FechaVenc, Con.fecha_Movimiento as FechaCom,
                        CONCAT (Inte.tipo_interes, ' ', Inte.plazo, ' ', Inte.periodo) as PlazoDes, Inte.tasa as TasaDesc,
                        Inte.alm as AlmacDesc, Inte.seguro as SeguDesc, Inte.iva as IvaDesc, Con.intereses as InteresesDes,
                         Inte.dias as Dias, Con.total_Prestamo as TotalPrest, Con.abono as Abono 
                        FROM contrato_tbl as Con
                        INNER JOIN cat_interes as Inte  on Con.id_Interes = Inte.id_interes
                        WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato= 1 and Con.id_Estatus= 1";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {

                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "FechaEmp" => $row["FechaEmp"],
                        "FechaVenc" => $row["FechaVenc"],
                        "FechaCom" => $row["FechaCom"],
                        "PlazoDes" => $row["PlazoDes"],
                        "TasaDesc" => $row["TasaDesc"],
                        "AlmacDesc" => $row["AlmacDesc"],
                        "SeguDesc" => $row["SeguDesc"],
                        "IvaDesc" => $row["IvaDesc"],
                        "Dias" => $row["Dias"],
                        "InteresesDes" => $row["InteresesDes"],
                        "TotalPrest" => $row["TotalPrest"],
                        "Abono" => $row["Abono"]
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
            $buscar = "SELECT Con.fecha_creacion as FechaEmp, Con.fecha_Vencimiento as FechaVenc, Con.fecha_Movimiento as FechaCom,
                        CONCAT (Inte.tipo_interes, ' ', Inte.plazo, ' ', Inte.periodo) as PlazoDes, Inte.tasa as TasaDesc,
                        Inte.alm as AlmacDesc, Inte.seguro as SeguDesc, Inte.iva as IvaDesc, Con.intereses as InteresesDes,
                         Inte.dias as Dias, Con.total_Prestamo as TotalPrest,Con.abono as Abono 
                        FROM contrato_tbl as Con
                        INNER JOIN cat_interes as Inte  on Con.id_Interes = Inte.id_interes
                        WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato= 2  and Con.id_Estatus= 1";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {

                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "FechaEmp" => $row["FechaEmp"],
                        "FechaVenc" => $row["FechaVenc"],
                        "FechaCom" => $row["FechaCom"],
                        "PlazoDes" => $row["PlazoDes"],
                        "TasaDesc" => $row["TasaDesc"],
                        "AlmacDesc" => $row["AlmacDesc"],
                        "SeguDesc" => $row["SeguDesc"],
                        "IvaDesc" => $row["IvaDesc"],
                        "Dias" => $row["Dias"],
                        "InteresesDes" => $row["InteresesDes"],
                        "TotalPrest" => $row["TotalPrest"],
                        "Abono" => $row["Abono"]
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


    public function estatusContrato($idContratoDes)
    {
        $datos = array();
        try {
            $buscar = "SELECT Con.id_Contrato as Contrato, Con.fecha_creacion as Fecha,
                        CONCAT (Cli.nombre, ' ',Cli.apellido_Pat,' ', Cli.apellido_Mat) as NombreCompleto,
                        Est.descripcion as Estatus, Con.id_Estatus as idEstatus FROM contrato_tbl as Con
                        INNER JOIN cliente_tbl as Cli on Con.id_Cliente = Cli.id_Cliente
                        INNER JOIN cat_estatus as Est on Con.id_Estatus = Est.id_Estatus
                        WHERE Con.id_Contrato = '$idContratoDes' and Con.tipoContrato= 1";

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