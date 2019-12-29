<?php


class Cliente
{
    // TODO: Client Model
    private $idCliente;
    private $nombreCliente;
    private $apellidoPCliente;
    private $apellidoMCliente;
    private $tipoPersona;
    private $sexo;
    private $fechaNac;
    private $paisNac;
    private $edoNac;
    private $curp;
    private $ocupacion;
    private $identificacion;
    private $numIdentificacion;
    private $celular;
    private $rfc;
    private $telefono;
    private $correoCliente;
    private $direccion;
    private $msjUsoInterno;
    private $instFinanciera;
    private $cuentaBancaria;

    /**
     * Cliente constructor.
     * @param $nombreCliente
     * @param $apellidoPCliente
     * @param $apellidoMCliente
     * @param $tipoPersona
     * @param $sexo
     * @param $fechaNac
     * @param $paisNac
     * @param $edoNac
     * @param $curp
     * @param $ocupacion
     * @param $identificacion
     * @param $numIdentificacion
     * @param $celular
     * @param $rfc
     * @param $telefono
     * @param $correoCliente
     * @param $direccion
     * @param $msjUsoInterno
     * @param $instFinanciera
     * @param $cuentaBancaria
     */
    public function __construct($nombreCliente, $apellidoPCliente, $apellidoMCliente, $tipoPersona, $sexo, $fechaNac, $paisNac, $edoNac, $curp, $ocupacion, $identificacion, $numIdentificacion, $celular, $rfc, $telefono, $correoCliente, $direccion, $msjUsoInterno, $instFinanciera, $cuentaBancaria)
    {
        $this->nombreCliente = $nombreCliente;
        $this->apellidoPCliente = $apellidoPCliente;
        $this->apellidoMCliente = $apellidoMCliente;
        $this->tipoPersona = $tipoPersona;
        $this->sexo = $sexo;
        $this->fechaNac = $fechaNac;
        $this->paisNac = $paisNac;
        $this->edoNac = $edoNac;
        $this->curp = $curp;
        $this->ocupacion = $ocupacion;
        $this->identificacion = $identificacion;
        $this->numIdentificacion = $numIdentificacion;
        $this->celular = $celular;
        $this->rfc = $rfc;
        $this->telefono = $telefono;
        $this->correoCliente = $correoCliente;
        $this->direccion = $direccion;
        $this->msjUsoInterno = $msjUsoInterno;
        $this->instFinanciera = $instFinanciera;
        $this->cuentaBancaria = $cuentaBancaria;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @return mixed
     */
    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    /**
     * @return mixed
     */
    public function getApellidoPCliente()
    {
        return $this->apellidoPCliente;
    }

    /**
     * @return mixed
     */
    public function getApellidoMCliente()
    {
        return $this->apellidoMCliente;
    }

    /**
     * @return mixed
     */
    public function getTipoPersona()
    {
        return $this->tipoPersona;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @return mixed
     */
    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    /**
     * @return mixed
     */
    public function getPaisNac()
    {
        return $this->paisNac;
    }

    /**
     * @return mixed
     */
    public function getEdoNac()
    {
        return $this->edoNac;
    }

    /**
     * @return mixed
     */
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * @return mixed
     */
    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    /**
     * @return mixed
     */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * @return mixed
     */
    public function getNumIdentificacion()
    {
        return $this->numIdentificacion;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @return mixed
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @return mixed
     */
    public function getCorreoCliente()
    {
        return $this->correoCliente;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @return mixed
     */
    public function getMsjUsoInterno()
    {
        return $this->msjUsoInterno;
    }

    /**
     * @return mixed
     */
    public function getInstFinanciera()
    {
        return $this->instFinanciera;
    }

    /**
     * @return mixed
     */
    public function getCuentaBancaria()
    {
        return $this->cuentaBancaria;
    }




}