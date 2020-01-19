<?php


class Auto
{
    //Contrato
    private $idClienteAuto;
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
    private $fecha_creacion;
    private $idFecVencimiento;
    private $usuario;
    //Auto
    private $idTipoVehiculo;
    private $idMarca;
    private $idModelo;
    private $idAnio;
    private $idColor;
    private $idPlacas;
    private $idFactura;
    private $idKms;
    private $idAgencia;
    private $idMotor;
    private $idSerie;
    private $idVehiculo;
    private $idRepuve;
    private $idGasolina;
    private $idAseguradora;
    private $idTarjeta;
    private $idPoliza;
    private $idFecVencimientoAuto;
    private $idTipoPoliza;
    private $idObservacionesAuto;
    private $idCheckTarjeta;
    private $idCheckFactura;
    private $idCheckINE;
    private $idCheckImportacion;
    private $idCheckTenecia;
    private $idCheckPoliza;
    private $idCheckLicencia;

    /**
     * Auto constructor.
     * @param $idClienteAuto
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
     * @param $fecha_creacion
     * @param $idFecVencimiento
     * @param $usuario
     * @param $idTipoVehiculo
     * @param $idMarca
     * @param $idModelo
     * @param $idAnio
     * @param $idColor
     * @param $idPlacas
     * @param $idFactura
     * @param $idKms
     * @param $idAgencia
     * @param $idMotor
     * @param $idSerie
     * @param $idVehiculo
     * @param $idRepuve
     * @param $idGasolina
     * @param $idAseguradora
     * @param $idTarjeta
     * @param $idPoliza
     * @param $idFecVencimientoAuto
     * @param $idTipoPoliza
     * @param $idObservacionesAuto
     * @param $idCheckTarjeta
     * @param $idCheckFactura
     * @param $idCheckINE
     * @param $idCheckImportacion
     * @param $idCheckTenecia
     * @param $idCheckPoliza
     * @param $idCheckLicencia
     */
    public function __construct($idClienteAuto, $id_Interes, $folio, $fechaVencimiento, $totalAvaluo, $totalPrestamo, $abono, $intereses, $pago, $fecha_Alm, $fecha_Movimiento, $origen_Folio, $dest_Folio, $estatus, $observaciones, $fecha_creacion, $idFecVencimiento, $usuario, $idTipoVehiculo, $idMarca, $idModelo, $idAnio, $idColor, $idPlacas, $idFactura, $idKms, $idAgencia, $idMotor, $idSerie, $idVehiculo, $idRepuve, $idGasolina, $idAseguradora, $idTarjeta, $idPoliza, $idFecVencimientoAuto, $idTipoPoliza, $idObservacionesAuto, $idCheckTarjeta, $idCheckFactura, $idCheckINE, $idCheckImportacion, $idCheckTenecia, $idCheckPoliza, $idCheckLicencia)
    {
        $this->idClienteAuto = $idClienteAuto;
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
        $this->fecha_creacion = $fecha_creacion;
        $this->idFecVencimiento = $idFecVencimiento;
        $this->usuario = $usuario;
        $this->idTipoVehiculo = $idTipoVehiculo;
        $this->idMarca = $idMarca;
        $this->idModelo = $idModelo;
        $this->idAnio = $idAnio;
        $this->idColor = $idColor;
        $this->idPlacas = $idPlacas;
        $this->idFactura = $idFactura;
        $this->idKms = $idKms;
        $this->idAgencia = $idAgencia;
        $this->idMotor = $idMotor;
        $this->idSerie = $idSerie;
        $this->idVehiculo = $idVehiculo;
        $this->idRepuve = $idRepuve;
        $this->idGasolina = $idGasolina;
        $this->idAseguradora = $idAseguradora;
        $this->idTarjeta = $idTarjeta;
        $this->idPoliza = $idPoliza;
        $this->idFecVencimientoAuto = $idFecVencimientoAuto;
        $this->idTipoPoliza = $idTipoPoliza;
        $this->idObservacionesAuto = $idObservacionesAuto;
        $this->idCheckTarjeta = $idCheckTarjeta;
        $this->idCheckFactura = $idCheckFactura;
        $this->idCheckINE = $idCheckINE;
        $this->idCheckImportacion = $idCheckImportacion;
        $this->idCheckTenecia = $idCheckTenecia;
        $this->idCheckPoliza = $idCheckPoliza;
        $this->idCheckLicencia = $idCheckLicencia;
    }

    /**
     * @return mixed
     */
    public function getIdClienteAuto()
    {
        return $this->idClienteAuto;
    }

    /**
     * @param mixed $idClienteAuto
     */
    public function setIdClienteAuto($idClienteAuto): void
    {
        $this->idClienteAuto = $idClienteAuto;
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
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * @param mixed $fecha_creacion
     */
    public function setFechaCreacion($fecha_creacion): void
    {
        $this->fecha_creacion = $fecha_creacion;
    }

    /**
     * @return mixed
     */
    public function getIdFecVencimiento()
    {
        return $this->idFecVencimiento;
    }

    /**
     * @param mixed $idFecVencimiento
     */
    public function setIdFecVencimiento($idFecVencimiento): void
    {
        $this->idFecVencimiento = $idFecVencimiento;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getIdTipoVehiculo()
    {
        return $this->idTipoVehiculo;
    }

    /**
     * @param mixed $idTipoVehiculo
     */
    public function setIdTipoVehiculo($idTipoVehiculo): void
    {
        $this->idTipoVehiculo = $idTipoVehiculo;
    }

    /**
     * @return mixed
     */
    public function getIdMarca()
    {
        return $this->idMarca;
    }

    /**
     * @param mixed $idMarca
     */
    public function setIdMarca($idMarca): void
    {
        $this->idMarca = $idMarca;
    }

    /**
     * @return mixed
     */
    public function getIdModelo()
    {
        return $this->idModelo;
    }

    /**
     * @param mixed $idModelo
     */
    public function setIdModelo($idModelo): void
    {
        $this->idModelo = $idModelo;
    }

    /**
     * @return mixed
     */
    public function getIdAnio()
    {
        return $this->idAnio;
    }

    /**
     * @param mixed $idAnio
     */
    public function setIdAnio($idAnio): void
    {
        $this->idAnio = $idAnio;
    }

    /**
     * @return mixed
     */
    public function getIdColor()
    {
        return $this->idColor;
    }

    /**
     * @param mixed $idColor
     */
    public function setIdColor($idColor): void
    {
        $this->idColor = $idColor;
    }

    /**
     * @return mixed
     */
    public function getIdPlacas()
    {
        return $this->idPlacas;
    }

    /**
     * @param mixed $idPlacas
     */
    public function setIdPlacas($idPlacas): void
    {
        $this->idPlacas = $idPlacas;
    }

    /**
     * @return mixed
     */
    public function getIdFactura()
    {
        return $this->idFactura;
    }

    /**
     * @param mixed $idFactura
     */
    public function setIdFactura($idFactura): void
    {
        $this->idFactura = $idFactura;
    }

    /**
     * @return mixed
     */
    public function getIdKms()
    {
        return $this->idKms;
    }

    /**
     * @param mixed $idKms
     */
    public function setIdKms($idKms): void
    {
        $this->idKms = $idKms;
    }

    /**
     * @return mixed
     */
    public function getIdAgencia()
    {
        return $this->idAgencia;
    }

    /**
     * @param mixed $idAgencia
     */
    public function setIdAgencia($idAgencia): void
    {
        $this->idAgencia = $idAgencia;
    }

    /**
     * @return mixed
     */
    public function getIdMotor()
    {
        return $this->idMotor;
    }

    /**
     * @param mixed $idMotor
     */
    public function setIdMotor($idMotor): void
    {
        $this->idMotor = $idMotor;
    }

    /**
     * @return mixed
     */
    public function getIdSerie()
    {
        return $this->idSerie;
    }

    /**
     * @param mixed $idSerie
     */
    public function setIdSerie($idSerie): void
    {
        $this->idSerie = $idSerie;
    }

    /**
     * @return mixed
     */
    public function getIdVehiculo()
    {
        return $this->idVehiculo;
    }

    /**
     * @param mixed $idVehiculo
     */
    public function setIdVehiculo($idVehiculo): void
    {
        $this->idVehiculo = $idVehiculo;
    }

    /**
     * @return mixed
     */
    public function getIdRepuve()
    {
        return $this->idRepuve;
    }

    /**
     * @param mixed $idRepuve
     */
    public function setIdRepuve($idRepuve): void
    {
        $this->idRepuve = $idRepuve;
    }

    /**
     * @return mixed
     */
    public function getIdGasolina()
    {
        return $this->idGasolina;
    }

    /**
     * @param mixed $idGasolina
     */
    public function setIdGasolina($idGasolina): void
    {
        $this->idGasolina = $idGasolina;
    }

    /**
     * @return mixed
     */
    public function getIdAseguradora()
    {
        return $this->idAseguradora;
    }

    /**
     * @param mixed $idAseguradora
     */
    public function setIdAseguradora($idAseguradora): void
    {
        $this->idAseguradora = $idAseguradora;
    }

    /**
     * @return mixed
     */
    public function getIdTarjeta()
    {
        return $this->idTarjeta;
    }

    /**
     * @param mixed $idTarjeta
     */
    public function setIdTarjeta($idTarjeta): void
    {
        $this->idTarjeta = $idTarjeta;
    }

    /**
     * @return mixed
     */
    public function getIdPoliza()
    {
        return $this->idPoliza;
    }

    /**
     * @param mixed $idPoliza
     */
    public function setIdPoliza($idPoliza): void
    {
        $this->idPoliza = $idPoliza;
    }

    /**
     * @return mixed
     */
    public function getIdFecVencimientoAuto()
    {
        return $this->idFecVencimientoAuto;
    }

    /**
     * @param mixed $idFecVencimientoAuto
     */
    public function setIdFecVencimientoAuto($idFecVencimientoAuto): void
    {
        $this->idFecVencimientoAuto = $idFecVencimientoAuto;
    }

    /**
     * @return mixed
     */
    public function getIdTipoPoliza()
    {
        return $this->idTipoPoliza;
    }

    /**
     * @param mixed $idTipoPoliza
     */
    public function setIdTipoPoliza($idTipoPoliza): void
    {
        $this->idTipoPoliza = $idTipoPoliza;
    }

    /**
     * @return mixed
     */
    public function getIdObservacionesAuto()
    {
        return $this->idObservacionesAuto;
    }

    /**
     * @param mixed $idObservacionesAuto
     */
    public function setIdObservacionesAuto($idObservacionesAuto): void
    {
        $this->idObservacionesAuto = $idObservacionesAuto;
    }

    /**
     * @return mixed
     */
    public function getIdCheckTarjeta()
    {
        return $this->idCheckTarjeta;
    }

    /**
     * @param mixed $idCheckTarjeta
     */
    public function setIdCheckTarjeta($idCheckTarjeta): void
    {
        $this->idCheckTarjeta = $idCheckTarjeta;
    }

    /**
     * @return mixed
     */
    public function getIdCheckFactura()
    {
        return $this->idCheckFactura;
    }

    /**
     * @param mixed $idCheckFactura
     */
    public function setIdCheckFactura($idCheckFactura): void
    {
        $this->idCheckFactura = $idCheckFactura;
    }

    /**
     * @return mixed
     */
    public function getIdCheckINE()
    {
        return $this->idCheckINE;
    }

    /**
     * @param mixed $idCheckINE
     */
    public function setIdCheckINE($idCheckINE): void
    {
        $this->idCheckINE = $idCheckINE;
    }

    /**
     * @return mixed
     */
    public function getIdCheckImportacion()
    {
        return $this->idCheckImportacion;
    }

    /**
     * @param mixed $idCheckImportacion
     */
    public function setIdCheckImportacion($idCheckImportacion): void
    {
        $this->idCheckImportacion = $idCheckImportacion;
    }

    /**
     * @return mixed
     */
    public function getIdCheckTenecia()
    {
        return $this->idCheckTenecia;
    }

    /**
     * @param mixed $idCheckTenecia
     */
    public function setIdCheckTenecia($idCheckTenecia): void
    {
        $this->idCheckTenecia = $idCheckTenecia;
    }

    /**
     * @return mixed
     */
    public function getIdCheckPoliza()
    {
        return $this->idCheckPoliza;
    }

    /**
     * @param mixed $idCheckPoliza
     */
    public function setIdCheckPoliza($idCheckPoliza): void
    {
        $this->idCheckPoliza = $idCheckPoliza;
    }

    /**
     * @return mixed
     */
    public function getIdCheckLicencia()
    {
        return $this->idCheckLicencia;
    }

    /**
     * @param mixed $idCheckLicencia
     */
    public function setIdCheckLicencia($idCheckLicencia): void
    {
        $this->idCheckLicencia = $idCheckLicencia;
    }


}