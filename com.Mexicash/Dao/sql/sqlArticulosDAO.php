<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
include_once (MODELO_PATH."Articulo.php");
include_once(BASE_PATH . "Conexion.php");

class sqlArticulosDAO
{

    protected $conexion;
    protected $db;


    public function __construct()
    {
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    function insertarArticulo(){
        try {
            $data['status'] = 'ok';
            $data['result'] = '0';
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        echo json_encode($data);
    }

    public function guardarArticulo(Articulo $articulo) {
        // TODO: Implement guardaCiente() method.
        try {

            $idTipo =  $articulo->getTipo();
            $idFolio =  $articulo->getFolio();
            $idMarca =  $articulo->getMarca();
            $idEstado =  $articulo->getEstado();
            $idModelo =  $articulo->getModelo();
            $idTamaño =  $articulo->getTamaño();
            $idColor =  $articulo->getColor();
            $idSerie =  $articulo->getSerie();
            $idPrestamoE =  $articulo->getPrestamoE();
            $idAvaluoE =  $articulo->getAvaluoE();
            $idPrestamoMaxE =  $articulo->getPrestamoMaxE();
            $idUbivacion =  $articulo->getUbivacion();
            $idDetallePrendaE =  $articulo->getDetallePrendaE();

            $insertMetal = "INSERT INTO articulo_tbl " .
                "(id_Contrato,tipo, marca, estado, modelo, tamaño, color, num_Serie, prestamo, avaluo, prestamoMaximo, ubivavion,".
                " detalle, id_Estatus)  VALUES ".
                "('". $idFolio ."','". $idTipo ."','". $idMarca ."', '". $idEstado ."', '". $idModelo ."', '". $idTamaño ."', '". $idColor
                ."', '". $idSerie ."', '". $idPrestamoE ."', '". $idAvaluoE ."', '". $idPrestamoMaxE ."', '". $idUbivacion ."','13',  '1')";

            if($ps = $this->conexion->prepare($insertMetal)){
                if($ps->execute()){
                    $verdad = 1;
                }else{
                    $verdad = 2;
                }
            }else{
                $verdad = 3;
            }
        }catch (Exception $exc){
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        //return $verdad;
       echo $verdad;
    }

    function BuscarContrato(){
        try{
            $id = -1;

            $buscar = "select folio FROM contrato_tbl ";

            $statement = $this->conexion->query( $buscar );

            if($statement->num_rows > 0){
                $fila = $statement->fetch_object();
                $folio = $fila->folio;
            }

        }catch (Exception $exc){
            echo $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }

        return $folio;
    }


}