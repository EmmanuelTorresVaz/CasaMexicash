<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once (MODELO_PATH."Identificacion.php");
include_once (MODELO_PATH."Promocion.php");
include_once (BASE_PATH."Conexion.php");

class sqlCatalogoDAO
{
    protected $conexion;
    protected $db;


    public function __construct(){
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    public function guardaPromocion(Promocion $promocion){
        try {
            $tipo_Promocion = $promocion->getTipoPromocion();
            $descripcion_Promocion = $promocion->getDescripcionPromocion();
        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }
    }

    public function borraPromocion(Promocion $promocion){
        try {
            $tipo_Promocion = $promocion->getTipoPromocion();
            $descripcion_Promocion = $promocion->getDescripcionPromocion();
        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }
    }

    public function guardaIdentificacion(Identificacion $identificacion){
        try {
            $tipo_Identificacion = $identificacion->getTipoIdentificacion();
            $descripcion_Identificacion = $identificacion->getDescripcionIdentificacion();
        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }
    }

    public function borraIdentificacion(Identificacion $identificacion){
        try {
            $tipo_Identificacion = $identificacion->getTipoIdentificacion();
            $descripcion_Identificacion = $identificacion->getDescripcionIdentificacion();
        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }
    }

    public function traePromociones(){

        $datos = array();

        try {
            $buscar = "select id_Cat_Cliente, descripcion from cat_cliente where tipo = 'Promocion';";
            $rs = $this->conexion->query( $buscar );

            if($rs->num_rows > 0){
                while($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Cat_Cliente" => $row["id_Cat_Cliente"],
                        "descripcion" => $row["descripcion"]
                    ];

                    array_push($datos, $data);
                }
            }

        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }

        return $datos;
    }

    public function traeIdentificaciones(){

        $datos = array();

        try {
            $buscar = "select id_Cat_Cliente, descripcion from cat_cliente where tipo = 'Identificacion';";
            $rs = $this->conexion->query( $buscar );

            if($rs->num_rows > 0){
                while($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Cat_Cliente" => $row["id_Cat_Cliente"],
                        "descripcion" => $row["descripcion"]
                    ];

                    array_push($datos, $data);
                }
            }

        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }

        return $datos;
    }


    public function llenarCmbSexo(){
        $datos = array();
        try {
            $buscar = "select id_Cat_Cliente, descripcion from cat_cliente where tipo = 'Sexo'";
            $rs = $this->conexion->query( $buscar );

            if($rs->num_rows > 0){
                while($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Cat_Cliente" => $row["id_Cat_Cliente"],
                        "descripcion" => $row["descripcion"]
                    ];

                    array_push($datos, $data);
                }
            }

        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }

        return $datos;
    }


    public function catOcupacionesLlenar(){

        $datos = array();

        try {
            $buscar = "select id_Ocupacion, descripcion from cat_ocupaciones";
            $rs = $this->conexion->query( $buscar );

            if($rs->num_rows > 0){
                while($row = $rs->fetch_assoc()) {
                    $data = [
                        "id_Ocupacion" => $row["id_Ocupacion"],
                        "descripcion" => $row["descripcion"]
                    ];

                    array_push($datos, $data);
                }
            }

        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }

        return $datos;
    }

    public function completaEstado($idEstado){
        try{
            $html = '';

            $buscar = "SELECT id_Estado, descripcion FROM cat_estado WHERE descripcion LIKE '%".strip_tags($idEstado)."%' and id_Estado='9' or id_Estado='15'";

            $statement = $this->conexion->query( $buscar );

            if ($statement->num_rows > 0) {
                while ($row = $statement->fetch_assoc()) {
                    $html .= '<div><a class="suggest-element" data="'.utf8_encode($row['descripcion']).'" id="'.$row['id_Estado'].'">'.utf8_encode($row['descripcion']).'</a></div>';
                }
            }else{
                $html .= '<div><a class="suggest-element" ><h1>Sin sugerencias... <?php echo $buscar; ?></h1></a></div>';

            }
        }catch (Exception $exc){
            echo $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }
        echo $html;

    }
    public function completaMunicipio($idEstado,$idMunicipioName){
        try{
            $html = '';

            $buscar = "SELECT id_Municipio, descripcion FROM cat_municipio WHERE id_Estado = '". $idEstado."' AND  descripcion LIKE '%".strip_tags($idMunicipioName)."%' ";

            $statement = $this->conexion->query( $buscar );

            if ($statement->num_rows > 0) {
                while ($row = $statement->fetch_assoc()) {
                    $html .= '<div><a class="suggest-element" data="'.utf8_encode($row['descripcion']).'" id="'.$row['id_Municipio'].'">'.utf8_encode($row['descripcion']).'</a></div>';
                }
            }else{
                $html .= '<div><a class="suggest-element" ><h1>Sin sugerencias... <?php echo $buscar; ?></h1></a></div>';

            }
        }catch (Exception $exc){
            echo $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }
        echo $html;

    }

    public function completaLocalidad($idEstado,$idMunicipio, $idLocalidadName){
        try{
            $html = '';

            $buscar = "SELECT id_Localidad, descripcion FROM cat_Localidad WHERE id_Estado = '". $idEstado."' AND id_Municipio = '". $idMunicipio."' AND descripcion LIKE '%".strip_tags($idLocalidadName)."%' ";
            $statement = $this->conexion->query( $buscar );

            if ($statement->num_rows > 0) {
                while ($row = $statement->fetch_assoc()) {
                    $html .= '<div><a class="suggest-element" data="'.utf8_encode($row['descripcion']).'" id="'.$row['id_Localidad'].'">'.utf8_encode($row['descripcion']).'</a></div>';
                }
            }else{
                $html .= '<div><a class="suggest-element" ><h1>Sin sugerencias... <?php echo $buscar; ?></h1></a></div>';

            }
        }catch (Exception $exc){
            echo $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }
        echo $html;

    }

}