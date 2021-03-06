<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Identificacion.php");
include_once(MODELO_PATH . "Promocion.php");
include_once(BASE_PATH . "Conexion.php");

class sqlCatalogoDAO
{
    protected $conexion;
    protected $db;


    public function __construct()
    {
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    public function guardaPromocion(Promocion $promocion)
    {
        try {
            $tipo_Promocion = $promocion->getTipoPromocion();
            $descripcion_Promocion = $promocion->getDescripcionPromocion();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
    }

    public function borraPromocion(Promocion $promocion)
    {
        try {
            $tipo_Promocion = $promocion->getTipoPromocion();
            $descripcion_Promocion = $promocion->getDescripcionPromocion();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
    }

    public function guardaIdentificacion(Identificacion $identificacion)
    {
        try {
            $tipo_Identificacion = $identificacion->getTipoIdentificacion();
            $descripcion_Identificacion = $identificacion->getDescripcionIdentificacion();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
    }

    public function borraIdentificacion(Identificacion $identificacion)
    {
        try {
            $tipo_Identificacion = $identificacion->getTipoIdentificacion();
            $descripcion_Identificacion = $identificacion->getDescripcionIdentificacion();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
    }

    public function traePromociones()
    {

        $datos = array();

        try {
            $buscar = "select id_Cat_Cliente, descripcion from cat_cliente where tipo = 'Promocion';";
            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Cat_Cliente" => $row["id_Cat_Cliente"],
                        "descripcion" => $row["descripcion"]
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

    public function traeIdentificaciones()
    {

        $datos = array();

        try {
            $buscar = "select id_Cat_Cliente, descripcion from cat_cliente where tipo = 'Identificacion'";
            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Cat_Cliente" => $row["id_Cat_Cliente"],
                        "descripcion" => $row["descripcion"]
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


    public function llenarCmbSexo()
    {
        $datos = array();
        try {
            $buscar = "select id_Cat_Cliente, descripcion from cat_cliente where tipo = 'Sexo'";
            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Cat_Cliente" => $row["id_Cat_Cliente"],
                        "descripcion" => $row["descripcion"]
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


    public function catOcupacionesLlenar()
    {

        $datos = array();

        try {
            $buscar = "select id_Ocupacion, descripcion from cat_ocupaciones";
            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Ocupacion" => $row["id_Ocupacion"],
                        "descripcion" => $row["descripcion"]
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

    public function completaEstado()
    {
        $datos = array();

        try {
            $buscar = "SELECT id_Estado, descripcion FROM cat_estado";
            $rs = $this->conexion->query($buscar);

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Estado" => $row["id_Estado"],
                        "descripcion" => $row["descripcion"]
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


    public function llenarTblCatMetales($idMetal)
    {
        $datos = array();
        try {
            $buscar = "SELECT id_Kilataje,Tip.descripcion as TipoMetal,Kil.descripcion as DesMetal,precio
                        FROM cat_kilataje as Kil
                        INNER JOIN cat_tipoarticulo as Tip on Kil.id_tipoArticulo = Tip.id_tipo WHERE Tip.id_tipo=$idMetal";
            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Kilataje" => $row["id_Kilataje"],
                        "TipoMetal" => $row["TipoMetal"],
                        "DesMetal" => $row["DesMetal"],
                        "precio" => $row["precio"]
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

    public function eliminarMetal($idMetal)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $eliminarMetal = "DELETE FROM cat_kilataje WHERE id_Kilataje=$idMetal";
            if ($ps = $this->conexion->prepare($eliminarMetal)) {
                if ($ps->execute()) {
                    $verdad = mysqli_stmt_affected_rows($ps);
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

    public function guardarMetal($idMetal, $precio)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $guardarMetal = "UPDATE cat_kilataje SET precio=$precio WHERE id_Kilataje=$idMetal";
            if ($ps = $this->conexion->prepare($guardarMetal)) {
                if ($ps->execute()) {
                    $verdad = mysqli_stmt_affected_rows($ps);
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

    public function agregarMetal($idTipo, $unidad, $precio)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $insertarMetal = "INSERT INTO cat_kilataje(id_tipoArticulo, descripcion, precio) VALUES ($idTipo,'$unidad',$precio)";
            if ($ps = $this->conexion->prepare($insertarMetal)) {
                if ($ps->execute()) {
                    $verdad = mysqli_stmt_affected_rows($ps);
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

    public function modalLLenarMetales($idMetal)
    {
        $datos = array();
        try {
            $buscar = "SELECT id_Kilataje,Tip.descripcion as TipoMetal,Kil.descripcion as DesMetal,precio
                        FROM cat_kilataje as Kil
                        INNER JOIN cat_tipoarticulo as Tip on Kil.id_tipoArticulo = Tip.id_tipo WHERE id_Kilataje=$idMetal";
            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Kilataje" => $row["id_Kilataje"],
                        "TipoMetal" => $row["TipoMetal"],
                        "DesMetal" => $row["DesMetal"],
                        "precio" => $row["precio"]
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

    public function cmbElectroTipo()
    {
        $datos = array();

        try {
            $buscar = "SELECT id_tipo, descripcion FROM cat_electronico_tipo ";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_tipo" => $row["id_tipo"],
                        "descripcion" => $row["descripcion"]
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

    public function cmbElectroMarca($tipoCombo)
    {
        $datos = array();

        try {
            $buscar = "SELECT id_marca, descripcion FROM cat_electronico_marca where id_tipo=$tipoCombo";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_marca" => $row["id_marca"],
                        "descripcion" => $row["descripcion"]
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

    public function cmbElectroModelo($tipoCombo, $marcaCombo)
    {
        $datos = array();

        try {
            $buscar = "SELECT id_modelo, descripcion FROM cat_electronico_modelo where id_tipo=$tipoCombo and id_marca=$marcaCombo";
            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_modelo" => $row["id_modelo"],
                        "descripcion" => $row["descripcion"]
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

    public function agregarTipo($descripcion)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $insertarMetal = "INSERT INTO cat_electronico_tipo(descripcion) VALUES ('$descripcion')";
            if ($ps = $this->conexion->prepare($insertarMetal)) {
                if ($ps->execute()) {
                    $verdad = mysqli_stmt_affected_rows($ps);
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

    public function agregarMarca($tipoCombo, $descripcion)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $insertarMarca = "INSERT INTO cat_electronico_marca (id_tipo, descripcion) VALUES ($tipoCombo,'$descripcion')";
            if ($ps = $this->conexion->prepare($insertarMarca)) {
                if ($ps->execute()) {
                    $verdad = mysqli_stmt_affected_rows($ps);
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

        echo $verdad;
    }

    public function agregarModelo($tipoCombo, $marcaCombo, $descripcion)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $insertarMarca = "INSERT INTO cat_electronico_modelo (id_tipo,id_marca, descripcion) VALUES ($tipoCombo,$marcaCombo,'$descripcion')";
            if ($ps = $this->conexion->prepare($insertarMarca)) {
                if ($ps->execute()) {
                    $verdad = mysqli_stmt_affected_rows($ps);
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

        echo $verdad;
    }

    public function agregarProducto($cmbTipo, $cmbMarca, $cmbModelo, $precio, $vitrina, $caracteristicas)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $insertarProducto = "INSERT INTO cat_electronico (tipo,marca, modelo,precio,vitrina,caracteristicas) VALUES ($cmbTipo,$cmbMarca,$cmbModelo,$precio,$vitrina,'$caracteristicas')";
            if ($ps = $this->conexion->prepare($insertarProducto)) {
                if ($ps->execute()) {
                    $verdad = mysqli_stmt_affected_rows($ps);
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

        echo $verdad;
    }

    public function buscarElectronico($tipoComboTbl, $marcaComboTbl, $modeloComboTbl)
    {
        $datos = array();
        try {
            $buscar = "SELECT idElectronico, CT.descripcion as tipo,CM.descripcion as marca,CMO.descripcion as modelo,precio,vitrina,caracteristicas 
                        FROM cat_electronico as E
                        INNER JOIN cat_electronico_tipo as CT on E.tipo = CT.id_tipo
                        INNER JOIN cat_electronico_marca as CM on E.marca = CM.id_marca
                        INNER JOIN cat_electronico_modelo as CMO on E.modelo = CMO.id_modelo WHERE E.tipo = $tipoComboTbl";

            if ($marcaComboTbl != 0) {
                $buscar = $buscar . " AND E.marca = " . $marcaComboTbl;
            }
            if ($modeloComboTbl != 0) {
                $buscar = $buscar . " AND E.modelo = " . $modeloComboTbl;
            }

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "idElectronico" => $row["idElectronico"],
                        "tipoE" => $row["tipo"],
                        "marca" => $row["marca"],
                        "modelo" => $row["modelo"],
                        "precio" => $row["precio"],
                        "vitrina" => $row["vitrina"],
                        "caracteristicas" => $row["caracteristicas"]
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
        //echo json_encode($datos);
    }

    public function buscarElectronicoById($idProducto)
    {
        $datos = array();
        try {
            $buscar = "SELECT idElectronico,E.tipo as tipoId, CT.descripcion as tipoEditar,E.marca as marcaId, CM.descripcion as marca, 
E.modelo as modeloId,CMO.descripcion as modelo,precio,vitrina,caracteristicas 
                        FROM cat_electronico as E
                        INNER JOIN cat_electronico_tipo as CT on E.tipo = CT.id_tipo
                        INNER JOIN cat_electronico_marca as CM on E.marca = CM.id_marca
                        INNER JOIN cat_electronico_modelo as CMO on E.modelo = CMO.id_modelo WHERE idElectronico = $idProducto";

            $rs = $this->conexion->query($buscar);
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $data = [
                        "idElectronico" => $row["idElectronico"],
                        "tipoId" => $row["tipoId"],
                        "tipoEditar" => $row["tipoEditar"],
                        "marcaId" => $row["marcaId"],
                        "marca" => $row["marca"],
                        "modeloId" => $row["modeloId"],
                        "modelo" => $row["modelo"],
                        "precio" => $row["precio"],
                        "vitrina" => $row["vitrina"],
                        "caracteristicas" => $row["caracteristicas"]
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

    public function editarProducto($idElectro, $precio,$vitrina,$caracteristicas)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $insertarProducto = "UPDATE cat_electronico SET precio=$precio,vitrina=$vitrina,caracteristicas= '$caracteristicas' WHERE idElectronico= $idElectro";

            if ($ps = $this->conexion->prepare($insertarProducto)) {
                if ($ps->execute()) {
                    $verdad = mysqli_stmt_affected_rows($ps);
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

        echo $verdad;
    }

    public function eliminarProducto($idProducto){
        // TODO: Implement guardaCiente() method.
        try {
            $eliminarArticulo = "DELETE FROM cat_electronico WHERE idElectronico=$idProducto";

            if ($ps = $this->conexion->prepare($eliminarArticulo)) {
                if ($ps->execute()) {
                    $verdad = mysqli_stmt_affected_rows($ps);
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

    public function pruebaFecha($idElectro)
    {
        // TODO: Implement guardaCiente() method.
        try {
            $insertarProducto = "INSERT INTO fechapruebas (fecha) VALUES ('$idElectro')";
            echo $insertarProducto;
            if ($ps = $this->conexion->prepare($insertarProducto)) {
                if ($ps->execute()) {
                    $verdad = mysqli_stmt_affected_rows($ps);
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

        echo $verdad;
    }

}