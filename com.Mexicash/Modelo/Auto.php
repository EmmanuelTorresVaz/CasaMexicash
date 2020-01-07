<?php


class Auto
{
    private $idAuto;
    private $nombreCot;
    private $apellPCot;
    private $apellMCot;
    private $beneficiario;
    private $tipoAuto;
    private $modelo;
    private $marca;
    private $anio;
    private $color;
    private $placas;
    private $factura;
    private $kilometraje;
    private $agencia;
    private $numMotor;
    private $serieChasis;
    private $vin;
    private $repuve;
    private $gasolina;
    private $tarjetaCirc;
    private $tipoBlindaje;
    private $aseguradora;
    private $poliza;
    private $fechaVencPoliza;
    private $tipoPoliza;
    private $observacionesAuto;
    private $autoCirculacion;
    //Documentos Entregados -- Todos booleanos
    private $bTarjCirc;
    private $bIfe;
    private $bTenencia;
    private $bPolizaSeguro;
    private $bLicencia;
    private $bFactura;
    private $bImportacion;
    //Sección de los datos del contrato del auto
    private $tasaInteres;
    private $tipoInteres;
    private $periodo;
    private $plazo;
    private $tasa;
    private $alm;
    private $seguro;
    //private $iva; el iva es constante
    private $totalEvaluo;
    private $totalPrestamo;
    private $tipoPromocion;
    private $tipoAgrupamiento;
    private $ctoPolizaSeguro;
    private $ctoGPS;
    //Extras-------------------------------
    private $msjInternoAuto;
    private $comoSeEntero;

    /**
     * Auto constructor.
     * @param $nombreCot
     * @param $apellPCot
     * @param $apellMCot
     * @param $beneficiario
     * @param $tipoAuto
     * @param $modelo
     * @param $marca
     * @param $anio
     * @param $color
     * @param $placas
     * @param $factura
     * @param $kilometraje
     * @param $agencia
     * @param $numMotor
     * @param $serieChasis
     * @param $vin
     * @param $repuve
     * @param $gasolina
     * @param $tarjetaCirc
     * @param $tipoBlindaje
     * @param $aseguradora
     * @param $poliza
     * @param $fechaVencPoliza
     * @param $tipoPoliza
     * @param $observacionesAuto
     * @param $autoCirculacion
     * @param $bTarjCirc
     * @param $bIfe
     * @param $bTenencia
     * @param $bPolizaSeguro
     * @param $bLicencia
     * @param $bFactura
     * @param $bImportacion
     * @param $tasaInteres
     * @param $tipoInteres
     * @param $periodo
     * @param $plazo
     * @param $tasa
     * @param $alm
     * @param $seguro
     * @param $totalEvaluo
     * @param $totalPrestamo
     * @param $tipoPromocion
     * @param $tipoAgrupamiento
     * @param $ctoPolizaSeguro
     * @param $ctoGPS
     * @param $msjInternoAuto
     * @param $comoSeEntero
     */
    public function __construct($nombreCot, $apellPCot, $apellMCot, $beneficiario, $tipoAuto, $modelo, $marca, $anio, $color, $placas, $factura, $kilometraje, $agencia, $numMotor, $serieChasis, $vin, $repuve, $gasolina, $tarjetaCirc, $tipoBlindaje, $aseguradora, $poliza, $fechaVencPoliza, $tipoPoliza, $observacionesAuto, $autoCirculacion, $bTarjCirc, $bIfe, $bTenencia, $bPolizaSeguro, $bLicencia, $bFactura, $bImportacion, $tasaInteres, $tipoInteres, $periodo, $plazo, $tasa, $alm, $seguro, $totalEvaluo, $totalPrestamo, $tipoPromocion, $tipoAgrupamiento, $ctoPolizaSeguro, $ctoGPS, $msjInternoAuto, $comoSeEntero)
    {
        $this->nombreCot = $nombreCot;
        $this->apellPCot = $apellPCot;
        $this->apellMCot = $apellMCot;
        $this->beneficiario = $beneficiario;
        $this->tipoAuto = $tipoAuto;
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->anio = $anio;
        $this->color = $color;
        $this->placas = $placas;
        $this->factura = $factura;
        $this->kilometraje = $kilometraje;
        $this->agencia = $agencia;
        $this->numMotor = $numMotor;
        $this->serieChasis = $serieChasis;
        $this->vin = $vin;
        $this->repuve = $repuve;
        $this->gasolina = $gasolina;
        $this->tarjetaCirc = $tarjetaCirc;
        $this->tipoBlindaje = $tipoBlindaje;
        $this->aseguradora = $aseguradora;
        $this->poliza = $poliza;
        $this->fechaVencPoliza = $fechaVencPoliza;
        $this->tipoPoliza = $tipoPoliza;
        $this->observacionesAuto = $observacionesAuto;
        $this->autoCirculacion = $autoCirculacion;
        $this->bTarjCirc = $bTarjCirc;
        $this->bIfe = $bIfe;
        $this->bTenencia = $bTenencia;
        $this->bPolizaSeguro = $bPolizaSeguro;
        $this->bLicencia = $bLicencia;
        $this->bFactura = $bFactura;
        $this->bImportacion = $bImportacion;
        $this->tasaInteres = $tasaInteres;
        $this->tipoInteres = $tipoInteres;
        $this->periodo = $periodo;
        $this->plazo = $plazo;
        $this->tasa = $tasa;
        $this->alm = $alm;
        $this->seguro = $seguro;
        $this->totalEvaluo = $totalEvaluo;
        $this->totalPrestamo = $totalPrestamo;
        $this->tipoPromocion = $tipoPromocion;
        $this->tipoAgrupamiento = $tipoAgrupamiento;
        $this->ctoPolizaSeguro = $ctoPolizaSeguro;
        $this->ctoGPS = $ctoGPS;
        $this->msjInternoAuto = $msjInternoAuto;
        $this->comoSeEntero = $comoSeEntero;
    }

    /**
     * @return mixed
     */
    public function getIdAuto()
    {
        return $this->idAuto;
    }

    /**
     * @param mixed $idAuto
     */
    public function setIdAuto($idAuto): void
    {
        $this->idAuto = $idAuto;
    }

    /**
     * @return mixed
     */
    public function getNombreCot()
    {
        return $this->nombreCot;
    }

    /**
     * @param mixed $nombreCot
     */
    public function setNombreCot($nombreCot): void
    {
        $this->nombreCot = $nombreCot;
    }

    /**
     * @return mixed
     */
    public function getApellPCot()
    {
        return $this->apellPCot;
    }

    /**
     * @param mixed $apellPCot
     */
    public function setApellPCot($apellPCot): void
    {
        $this->apellPCot = $apellPCot;
    }

    /**
     * @return mixed
     */
    public function getApellMCot()
    {
        return $this->apellMCot;
    }

    /**
     * @param mixed $apellMCot
     */
    public function setApellMCot($apellMCot): void
    {
        $this->apellMCot = $apellMCot;
    }

    /**
     * @return mixed
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }

    /**
     * @param mixed $beneficiario
     */
    public function setBeneficiario($beneficiario): void
    {
        $this->beneficiario = $beneficiario;
    }

    /**
     * @return mixed
     */
    public function getTipoAuto()
    {
        return $this->tipoAuto;
    }

    /**
     * @param mixed $tipoAuto
     */
    public function setTipoAuto($tipoAuto): void
    {
        $this->tipoAuto = $tipoAuto;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo): void
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca): void
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * @param mixed $anio
     */
    public function setAnio($anio): void
    {
        $this->anio = $anio;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getPlacas()
    {
        return $this->placas;
    }

    /**
     * @param mixed $placas
     */
    public function setPlacas($placas): void
    {
        $this->placas = $placas;
    }

    /**
     * @return mixed
     */
    public function getFactura()
    {
        return $this->factura;
    }

    /**
     * @param mixed $factura
     */
    public function setFactura($factura): void
    {
        $this->factura = $factura;
    }

    /**
     * @return mixed
     */
    public function getKilometraje()
    {
        return $this->kilometraje;
    }

    /**
     * @param mixed $kilometraje
     */
    public function setKilometraje($kilometraje): void
    {
        $this->kilometraje = $kilometraje;
    }

    /**
     * @return mixed
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @param mixed $agencia
     */
    public function setAgencia($agencia): void
    {
        $this->agencia = $agencia;
    }

    /**
     * @return mixed
     */
    public function getNumMotor()
    {
        return $this->numMotor;
    }

    /**
     * @param mixed $numMotor
     */
    public function setNumMotor($numMotor): void
    {
        $this->numMotor = $numMotor;
    }

    /**
     * @return mixed
     */
    public function getSerieChasis()
    {
        return $this->serieChasis;
    }

    /**
     * @param mixed $serieChasis
     */
    public function setSerieChasis($serieChasis): void
    {
        $this->serieChasis = $serieChasis;
    }

    /**
     * @return mixed
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * @param mixed $vin
     */
    public function setVin($vin): void
    {
        $this->vin = $vin;
    }

    /**
     * @return mixed
     */
    public function getRepuve()
    {
        return $this->repuve;
    }

    /**
     * @param mixed $repuve
     */
    public function setRepuve($repuve): void
    {
        $this->repuve = $repuve;
    }

    /**
     * @return mixed
     */
    public function getGasolina()
    {
        return $this->gasolina;
    }

    /**
     * @param mixed $gasolina
     */
    public function setGasolina($gasolina): void
    {
        $this->gasolina = $gasolina;
    }

    /**
     * @return mixed
     */
    public function getTarjetaCirc()
    {
        return $this->tarjetaCirc;
    }

    /**
     * @param mixed $tarjetaCirc
     */
    public function setTarjetaCirc($tarjetaCirc): void
    {
        $this->tarjetaCirc = $tarjetaCirc;
    }

    /**
     * @return mixed
     */
    public function getTipoBlindaje()
    {
        return $this->tipoBlindaje;
    }

    /**
     * @param mixed $tipoBlindaje
     */
    public function setTipoBlindaje($tipoBlindaje): void
    {
        $this->tipoBlindaje = $tipoBlindaje;
    }

    /**
     * @return mixed
     */
    public function getAseguradora()
    {
        return $this->aseguradora;
    }

    /**
     * @param mixed $aseguradora
     */
    public function setAseguradora($aseguradora): void
    {
        $this->aseguradora = $aseguradora;
    }

    /**
     * @return mixed
     */
    public function getPoliza()
    {
        return $this->poliza;
    }

    /**
     * @param mixed $poliza
     */
    public function setPoliza($poliza): void
    {
        $this->poliza = $poliza;
    }

    /**
     * @return mixed
     */
    public function getFechaVencPoliza()
    {
        return $this->fechaVencPoliza;
    }

    /**
     * @param mixed $fechaVencPoliza
     */
    public function setFechaVencPoliza($fechaVencPoliza): void
    {
        $this->fechaVencPoliza = $fechaVencPoliza;
    }

    /**
     * @return mixed
     */
    public function getTipoPoliza()
    {
        return $this->tipoPoliza;
    }

    /**
     * @param mixed $tipoPoliza
     */
    public function setTipoPoliza($tipoPoliza): void
    {
        $this->tipoPoliza = $tipoPoliza;
    }

    /**
     * @return mixed
     */
    public function getObservacionesAuto()
    {
        return $this->observacionesAuto;
    }

    /**
     * @param mixed $observacionesAuto
     */
    public function setObservacionesAuto($observacionesAuto): void
    {
        $this->observacionesAuto = $observacionesAuto;
    }

    /**
     * @return mixed
     */
    public function getAutoCirculacion()
    {
        return $this->autoCirculacion;
    }

    /**
     * @param mixed $autoCirculacion
     */
    public function setAutoCirculacion($autoCirculacion): void
    {
        $this->autoCirculacion = $autoCirculacion;
    }

    /**
     * @return mixed
     */
    public function getBTarjCirc()
    {
        return $this->bTarjCirc;
    }

    /**
     * @param mixed $bTarjCirc
     */
    public function setBTarjCirc($bTarjCirc): void
    {
        $this->bTarjCirc = $bTarjCirc;
    }

    /**
     * @return mixed
     */
    public function getBIfe()
    {
        return $this->bIfe;
    }

    /**
     * @param mixed $bIfe
     */
    public function setBIfe($bIfe): void
    {
        $this->bIfe = $bIfe;
    }

    /**
     * @return mixed
     */
    public function getBTenencia()
    {
        return $this->bTenencia;
    }

    /**
     * @param mixed $bTenencia
     */
    public function setBTenencia($bTenencia): void
    {
        $this->bTenencia = $bTenencia;
    }

    /**
     * @return mixed
     */
    public function getBPolizaSeguro()
    {
        return $this->bPolizaSeguro;
    }

    /**
     * @param mixed $bPolizaSeguro
     */
    public function setBPolizaSeguro($bPolizaSeguro): void
    {
        $this->bPolizaSeguro = $bPolizaSeguro;
    }

    /**
     * @return mixed
     */
    public function getBLicencia()
    {
        return $this->bLicencia;
    }

    /**
     * @param mixed $bLicencia
     */
    public function setBLicencia($bLicencia): void
    {
        $this->bLicencia = $bLicencia;
    }

    /**
     * @return mixed
     */
    public function getBFactura()
    {
        return $this->bFactura;
    }

    /**
     * @param mixed $bFactura
     */
    public function setBFactura($bFactura): void
    {
        $this->bFactura = $bFactura;
    }

    /**
     * @return mixed
     */
    public function getBImportacion()
    {
        return $this->bImportacion;
    }

    /**
     * @param mixed $bImportacion
     */
    public function setBImportacion($bImportacion): void
    {
        $this->bImportacion = $bImportacion;
    }

    /**
     * @return mixed
     */
    public function getTasaInteres()
    {
        return $this->tasaInteres;
    }

    /**
     * @param mixed $tasaInteres
     */
    public function setTasaInteres($tasaInteres): void
    {
        $this->tasaInteres = $tasaInteres;
    }

    /**
     * @return mixed
     */
    public function getTipoInteres()
    {
        return $this->tipoInteres;
    }

    /**
     * @param mixed $tipoInteres
     */
    public function setTipoInteres($tipoInteres): void
    {
        $this->tipoInteres = $tipoInteres;
    }

    /**
     * @return mixed
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param mixed $periodo
     */
    public function setPeriodo($periodo): void
    {
        $this->periodo = $periodo;
    }

    /**
     * @return mixed
     */
    public function getPlazo()
    {
        return $this->plazo;
    }

    /**
     * @param mixed $plazo
     */
    public function setPlazo($plazo): void
    {
        $this->plazo = $plazo;
    }

    /**
     * @return mixed
     */
    public function getTasa()
    {
        return $this->tasa;
    }

    /**
     * @param mixed $tasa
     */
    public function setTasa($tasa): void
    {
        $this->tasa = $tasa;
    }

    /**
     * @return mixed
     */
    public function getAlm()
    {
        return $this->alm;
    }

    /**
     * @param mixed $alm
     */
    public function setAlm($alm): void
    {
        $this->alm = $alm;
    }

    /**
     * @return mixed
     */
    public function getSeguro()
    {
        return $this->seguro;
    }

    /**
     * @param mixed $seguro
     */
    public function setSeguro($seguro): void
    {
        $this->seguro = $seguro;
    }

    /**
     * @return mixed
     */
    public function getTotalEvaluo()
    {
        return $this->totalEvaluo;
    }

    /**
     * @param mixed $totalEvaluo
     */
    public function setTotalEvaluo($totalEvaluo): void
    {
        $this->totalEvaluo = $totalEvaluo;
    }

    /**
     * @return mixed
     */
    public function getTotalPrestamo()
    {
        return $this->totalPrestamo;
    }

    /**
     * @param mixed $totalPrestamo
     */
    public function setTotalPrestamo($totalPrestamo): void
    {
        $this->totalPrestamo = $totalPrestamo;
    }

    /**
     * @return mixed
     */
    public function getTipoPromocion()
    {
        return $this->tipoPromocion;
    }

    /**
     * @param mixed $tipoPromocion
     */
    public function setTipoPromocion($tipoPromocion): void
    {
        $this->tipoPromocion = $tipoPromocion;
    }

    /**
     * @return mixed
     */
    public function getTipoAgrupamiento()
    {
        return $this->tipoAgrupamiento;
    }

    /**
     * @param mixed $tipoAgrupamiento
     */
    public function setTipoAgrupamiento($tipoAgrupamiento): void
    {
        $this->tipoAgrupamiento = $tipoAgrupamiento;
    }

    /**
     * @return mixed
     */
    public function getCtoPolizaSeguro()
    {
        return $this->ctoPolizaSeguro;
    }

    /**
     * @param mixed $ctoPolizaSeguro
     */
    public function setCtoPolizaSeguro($ctoPolizaSeguro): void
    {
        $this->ctoPolizaSeguro = $ctoPolizaSeguro;
    }

    /**
     * @return mixed
     */
    public function getCtoGPS()
    {
        return $this->ctoGPS;
    }

    /**
     * @param mixed $ctoGPS
     */
    public function setCtoGPS($ctoGPS): void
    {
        $this->ctoGPS = $ctoGPS;
    }

    /**
     * @return mixed
     */
    public function getMsjInternoAuto()
    {
        return $this->msjInternoAuto;
    }

    /**
     * @param mixed $msjInternoAuto
     */
    public function setMsjInternoAuto($msjInternoAuto): void
    {
        $this->msjInternoAuto = $msjInternoAuto;
    }

    /**
     * @return mixed
     */
    public function getComoSeEntero()
    {
        return $this->comoSeEntero;
    }

    /**
     * @param mixed $comoSeEntero
     */
    public function setComoSeEntero($comoSeEntero): void
    {
        $this->comoSeEntero = $comoSeEntero;
    }



}