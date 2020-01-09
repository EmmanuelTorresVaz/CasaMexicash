<?php

include ('../../Modelo/Auto.php');
include ('../../Base/Conexion.php');

class sqlAutoDAO
{
    protected $conexion;
    protected $db;


    public function __construct(){
        $this->db = new Conexion();
        $this->conexion = $this->db->connectDB();
    }

    public function guardaAuto(Auto $auto){
        try{
            $verdad = false;

            //$idAuto = $auto->getIdAuto();
            $nombreCot = $auto->getNombreCot();
            $apellPCot = $auto->getApellPCot();
            $apellMCot = $auto->getApellMCot();
            $beneficiario = $auto->getBeneficiario();
            $tipoAuto = $auto->getTipoAuto();
            $modelo = $auto->getModelo();
            $marca = $auto->getMarca();
            $anio = $auto->getAnio();
            $color = $auto->getColor();
            $placas = $auto->getPlacas();
            $factura = $auto->getPlacas();
            $kilometraje = $auto->getKilometraje();
            $agencia = $auto->getAgencia();
            $numMotor = $auto->getNumMotor();
            $serieChasis = $auto->getSerieChasis();
            $vin = $auto->getVin();
            $repuve = $auto->getRepuve();
            $gasolina = $auto->getGasolina();
            $tarjetaCirc = $auto->getTarjetaCirc();
            $tipoBlindaje = $auto->getTipoBlindaje();
            $aseguradora = $auto->getAseguradora();
            $poliza = $auto->getPoliza();
            $fechaVencPoliza = $auto->getFechaVencPoliza();
            $tipoPoliza = $auto->getTipoPoliza();
            $observacionesAuto = $auto->getObservacionesAuto();
            $autoCirculacion = $auto->getAutoCirculacion();

            //Documentos Entregados -- Todos booleanos
            $bTarjCirc = $auto->getBTarjCirc();
            $bIfe = $auto->getBIfe();
            $bTenencia = $auto->getBTenencia();
            $bPolizaSeguro = $auto->getBPolizaSeguro();
            $bLicencia = $auto->getBLicencia();
            $bFactura = $auto->getBFactura();
            $bImportacion = $auto->getBImportacion();

            //Sección de los datos del contrato del auto
            $tasaInteres = $auto->getTasaInteres();
            $tipoInteres = $auto->getTipoInteres();
            $periodo = $auto->getPeriodo();
            $plazo = $auto->getPlazo();
            $tasa = $auto->getTasa();
            $alm = $auto->getAlm();
            $seguro = $auto->getSeguro();

            //private $iva; el iva es constante
            $totalEvaluo = $auto->getTotalEvaluo();
            $totalPrestamo = $auto->getTotalPrestamo();
            $tipoPromocion = $auto->getTipoPromocion();
            $tipoAgrupamiento = $auto->getTipoAgrupamiento();
            $ctoPolizaSeguro = $auto->getCtoPolizaSeguro();
            $ctoGPS = $auto->getCtoGPS();

            //Extras-------------------------------
            $msjInternoAuto = $auto->getMsjInternoAuto();
             $comoSeEntero = $auto->getComoSeEntero();

            $insertar = "";

            $this->conexion->query($insertar);
            echo "Se registro correctamente";
            $verdad = true;

        }catch (Exception $exc){
            echo  $exc->getMessage();
        }finally{
            $this->db->closeDB();
        }

        return $verdad;
    }

    public function borraAuto(Auto $auto){

    }

}