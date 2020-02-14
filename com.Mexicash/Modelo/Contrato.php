<?php


class Contrato
{
    private $idCliente;
    private $fechaVencimiento;
    private $totalAvaluo;
    private $totalPrestamo;
    private $total_Interes;
    private $sumaInteresPrestamo;
    private $fecha_Alm;
    private $estatus;
    private $cotitular;
    private $beneficiario;
    private $plazo;
    private $tasa;
    private $alm;
    private $seguro;
    private $iva;
    private $dias;
    private $diasAlmonedaValue;

    /**
     * Contrato constructor.
     * @param $idCliente
     * @param $fechaVencimiento
     * @param $totalAvaluo
     * @param $totalPrestamo
     * @param $total_Interes
     * @param $sumaInteresPrestamo
     * @param $fecha_Alm
     * @param $estatus
     * @param $cotitular
     * @param $beneficiario
     * @param $plazo
     * @param $tasa
     * @param $alm
     * @param $seguro
     * @param $iva
     * @param $dias
     * @param $diasAlmonedaValue
     */
    public function __construct($idCliente, $fechaVencimiento, $totalAvaluo, $totalPrestamo, $total_Interes, $sumaInteresPrestamo, $fecha_Alm, $estatus, $cotitular, $beneficiario, $plazo, $tasa, $alm, $seguro, $iva, $dias,$diasAlmonedaValue)
    {
        $this->idCliente = $idCliente;
        $this->fechaVencimiento = $fechaVencimiento;
        $this->totalAvaluo = $totalAvaluo;
        $this->totalPrestamo = $totalPrestamo;
        $this->total_Interes = $total_Interes;
        $this->sumaInteresPrestamo = $sumaInteresPrestamo;
        $this->fecha_Alm = $fecha_Alm;
        $this->estatus = $estatus;
        $this->cotitular = $cotitular;
        $this->beneficiario = $beneficiario;
        $this->plazo = $plazo;
        $this->tasa = $tasa;
        $this->alm = $alm;
        $this->seguro = $seguro;
        $this->iva = $iva;
        $this->dias = $dias;
        $this->diasAlmonedaValue = $diasAlmonedaValue;
    }

    /**
     * @return mixed
     */
    public function getDiasAlm()
    {
        return $this->diasAlmonedaValue;
    }

    /**
     * @param mixed $diasAlmonedaValue
     */
    public function setDiasAlm($diasAlmonedaValue): void
    {
        $this->diasAlmonedaValue = $diasAlmonedaValue;
    }
    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param mixed $idCliente
     */
    public function setIdCliente($idCliente): void
    {
        $this->idCliente = $idCliente;
    }

    /**
     * @return mixed
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * @param mixed $fechaVencimiento
     */
    public function setFechaVencimiento($fechaVencimiento): void
    {
        $this->fechaVencimiento = $fechaVencimiento;
    }

    /**
     * @return mixed
     */
    public function getTotalAvaluo()
    {
        return $this->totalAvaluo;
    }

    /**
     * @param mixed $totalAvaluo
     */
    public function setTotalAvaluo($totalAvaluo): void
    {
        $this->totalAvaluo = $totalAvaluo;
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
    public function getTotalInteres()
    {
        return $this->total_Interes;
    }

    /**
     * @param mixed $total_Interes
     */
    public function setTotalInteres($total_Interes): void
    {
        $this->total_Interes = $total_Interes;
    }

    /**
     * @return mixed
     */
    public function getSumaInteresPrestamo()
    {
        return $this->sumaInteresPrestamo;
    }

    /**
     * @param mixed $sumaInteresPrestamo
     */
    public function setSumaInteresPrestamo($sumaInteresPrestamo): void
    {
        $this->sumaInteresPrestamo = $sumaInteresPrestamo;
    }

    /**
     * @return mixed
     */
    public function getFechaAlm()
    {
        return $this->fecha_Alm;
    }

    /**
     * @param mixed $fecha_Alm
     */
    public function setFechaAlm($fecha_Alm): void
    {
        $this->fecha_Alm = $fecha_Alm;
    }

    /**
     * @return mixed
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @param mixed $estatus
     */
    public function setEstatus($estatus): void
    {
        $this->estatus = $estatus;
    }

    /**
     * @return mixed
     */
    public function getCotitular()
    {
        return $this->cotitular;
    }

    /**
     * @param mixed $cotitular
     */
    public function setCotitular($cotitular): void
    {
        $this->cotitular = $cotitular;
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
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * @param mixed $iva
     */
    public function setIva($iva): void
    {
        $this->iva = $iva;
    }

    /**
     * @return mixed
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * @param mixed $dias
     */
    public function setDias($dias): void
    {
        $this->dias = $dias;
    }


}