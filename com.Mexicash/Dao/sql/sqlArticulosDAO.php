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

    public function guardaCiente(Articulo $articulo) {
        // TODO: Implement guardaCiente() method.
        try {


            $idTipo =  $articulo->getTipo();
            $idMarca =  $articulo->getMarca();
            $idEstado =  $articulo->getEstado();
            $idModelo =  $articulo->getModelo();
            $idTamaño =  $articulo->getTamaño();
            $idColor =  $articulo->getColor();
            $idSerie =  $articulo->getSerie();
            $idPrestamo =  $articulo->getPrestamo();
            $idAvaluo =  $articulo->getAvaluo();
            $idPrestamoMax =  $articulo->getPrestamoMax();
            $idUbivacion =  $articulo->getUbivacion();
            $idDetallePrenda =  $articulo->getDetallePrenda();

            $insertMetal = "INSERT INTO articulo_tbl " .
                "(tipo, marca, estado, modelo, tamaño, color, num_Serie, prestamo, avaluo, prestamoMaximo, ubivavion, detalle, id_Estatus)  VALUES ".
                "('". $idTipo ."', '". $idMarca ."', '". $idEstado ."', '". $idModelo ."', '". $idTamaño ."', '". $idColor ."', '". $idSerie ."', '". $idPrestamo ."', '". $idAvaluo ."', '". $idPrestamoMax ."', '". $idUbivacion ."','". $idDetallePrenda ."',  '1')";

            echo $insertMetal;
            if($ps = $this->conexion->prepare($insertMetal)){
               // echo " Se preparó correctamente ";
                if($ps->execute()){
                    //echo " Se ejecutó bien";
                    $verdad = true;
                }else{
                 //   echo " No se ejecutó bien";
                }
            }else{
                //echo " No se preparó";
            }
        }catch (Exception $exc){
            echo $exc->getMessage();
        } finally {
            $this->db->closeDB();
        }
        //return $verdad;
        echo $verdad;
    }


}