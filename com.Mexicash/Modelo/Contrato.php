<?php


class Contrato
{
    private $idCliente;
    private $id_Interes;
    private $folio;
    private $fechaVencimiento;
    private $totalAvaluo;
    private $totalPrestamo;
    private $abono;
    private $intereses;
    private $pago;
    private $fecha_Alm;
    private $fecha_Movimiento;
    private $origen_Folio;
    private $dest_Folio;
    private $estatus;
    private $observaciones;
    private $beneficiario;
    private $cotitular;

    /**
     * Contrato constructor.
     * @param $idCliente
     * @param $id_Interes
     * @param $folio
     * @param $fechaVencimiento
     * @param $totalAvaluo
     * @param $totalPrestamo
     * @param $abono
     * @param $intereses
     * @param $pago
     * @param $fecha_Alm
     * @param $fecha_Movimiento
     * @param $origen_Folio
     * @param $dest_Folio
     * @param $estatus
     * @param $observaciones
     * @param $beneficiario
     * @param $cotitular
     */
    public function __construct( $idCliente, $id_Interes, $folio, $fechaVencimiento, $totalAvaluo, $totalPrestamo, $abono, $intereses, $pago, $fecha_Alm, $fecha_Movimiento, $origen_Folio, $dest_Folio, $estatus, $observaciones, $beneficiario, $cotitular)
    {
        $this->idCliente = $idCliente;
        $this->id_Interes = $id_Interes;
        $this->folio = $folio;
        $this->fechaVencimiento = $fechaVencimiento;
        $this->totalAvaluo = $totalAvaluo;
        $this->totalPrestamo = $totalPrestamo;
        $this->abono = $abono;
        $this->intereses = $intereses;
        $this->pago = $pago;
        $this->fecha_Alm = $fecha_Alm;
        $this->fecha_Movimiento = $fecha_Movimiento;
        $this->origen_Folio = $origen_Folio;
        $this->dest_Folio = $dest_Folio;
        $this->estatus = $estatus;
        $this->observaciones = $observaciones;
        $this->beneficiario = $beneficiario;
        $this->cotitular = $cotitular;
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
    public function getIdInteres()
    {
        return $this->id_Interes;
    }

    /**
     * @param mixed $id_Interes
     */
    public function setIdInteres($id_Interes): void
    {
        $this->id_Interes = $id_Interes;
    }

    /**
     * @return mixed
     */
    public function getFolio()
    {
        return $this->folio;
    }

    /**
     * @param mixed $folio
     */
    public function setFolio($folio): void
    {
        $this->folio = $folio;
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
    public function getAbono()
    {
        return $this->abono;
    }

    /**
     * @param mixed $abono
     */
    public function setAbono($abono): void
    {
        $this->abono = $abono;
    }

    /**
     * @return mixed
     */
    public function getIntereses()
    {
        return $this->intereses;
    }

    /**
     * @param mixed $intereses
     */
    public function setIntereses($intereses): void
    {
        $this->intereses = $intereses;
    }

    /**
     * @return mixed
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * @param mixed $pago
     */
    public function setPago($pago): void
    {
        $this->pago = $pago;
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
    public function getFechaMovimiento()
    {
        return $this->fecha_Movimiento;
    }

    /**
     * @param mixed $fecha_Movimiento
     */
    public function setFechaMovimiento($fecha_Movimiento): void
    {
        $this->fecha_Movimiento = $fecha_Movimiento;
    }

    /**
     * @return mixed
     */
    public function getOrigenFolio()
    {
        return $this->origen_Folio;
    }

    /**
     * @param mixed $origen_Folio
     */
    public function setOrigenFolio($origen_Folio): void
    {
        $this->origen_Folio = $origen_Folio;
    }

    /**
     * @return mixed
     */
    public function getDestFolio()
    {
        return $this->dest_Folio;
    }

    /**
     * @param mixed $dest_Folio
     */
    public function setDestFolio($dest_Folio): void
    {
        $this->dest_Folio = $dest_Folio;
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
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param mixed $observaciones
     */
    public function setObservaciones($observaciones): void
    {
        $this->observaciones = $observaciones;
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


}