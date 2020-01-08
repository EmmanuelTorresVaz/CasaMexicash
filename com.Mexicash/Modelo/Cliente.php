<?php


class Cliente
{
    private $id_Cliente;
    private $nombre;
    private $apellido_Pat;
    private $apellido_Mat;
    private $sexo;
    private $fecha_Nacimiento;
    private $curp;
    private $ocupacion;
    private $tipo_Identificacion;
    private $num_Identificacion;
    private $celular;
    private $rfc;
    private $telefono;
    private $correo;
    private $estado;
    private $codigo_Postal;
    private $municipio;
    private $colonia;
    private $calle;
    private $num_exterior;
    private $num_interior;
    private $mensaje;
    private $promocion;

    /**
     * Cliente constructor.
     * @param $nombre
     * @param $apellido_Pat
     * @param $apellido_Mat
     * @param $sexo
     * @param $fecha_Nacimiento
     * @param $curp
     * @param $ocupacion
     * @param $tipo_Identificacion
     * @param $num_Identificacion
     * @param $celular
     * @param $rfc
     * @param $telefono
     * @param $correo
     * @param $estado
     * @param $codigo_Postal
     * @param $municipio
     * @param $colonia
     * @param $calle
     * @param $num_exterior
     * @param $num_interior
     * @param $mensaje
     * @param $promocion
     */
    public function __construct($nombre, $apellido_Pat, $apellido_Mat, $sexo, $fecha_Nacimiento, $curp, $ocupacion, $tipo_Identificacion, $num_Identificacion, $celular, $rfc, $telefono, $correo, $estado, $codigo_Postal, $municipio, $colonia, $calle, $num_exterior, $num_interior, $mensaje, $promocion)
    {
        $this->nombre = $nombre;
        $this->apellido_Pat = $apellido_Pat;
        $this->apellido_Mat = $apellido_Mat;
        $this->sexo = $sexo;
        $this->fecha_Nacimiento = $fecha_Nacimiento;
        $this->curp = $curp;
        $this->ocupacion = $ocupacion;
        $this->tipo_Identificacion = $tipo_Identificacion;
        $this->num_Identificacion = $num_Identificacion;
        $this->celular = $celular;
        $this->rfc = $rfc;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->estado = $estado;
        $this->codigo_Postal = $codigo_Postal;
        $this->municipio = $municipio;
        $this->colonia = $colonia;
        $this->calle = $calle;
        $this->num_exterior = $num_exterior;
        $this->num_interior = $num_interior;
        $this->mensaje = $mensaje;
        $this->promocion = $promocion;
    }



    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_Cliente;
    }

    /**
     * @param mixed $id_Cliente
     */
    public function setIdCliente($id_Cliente): void
    {
        $this->id_Cliente = $id_Cliente;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidoPat()
    {
        return $this->apellido_Pat;
    }

    /**
     * @param mixed $apellido_Pat
     */
    public function setApellidoPat($apellido_Pat): void
    {
        $this->apellido_Pat = $apellido_Pat;
    }

    /**
     * @return mixed
     */
    public function getApellidoMat()
    {
        return $this->apellido_Mat;
    }

    /**
     * @param mixed $apellido_Mat
     */
    public function setApellidoMat($apellido_Mat): void
    {
        $this->apellido_Mat = $apellido_Mat;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo): void
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_Nacimiento;
    }

    /**
     * @param mixed $fecha_Nacimiento
     */
    public function setFechaNacimiento($fecha_Nacimiento): void
    {
        $this->fecha_Nacimiento = $fecha_Nacimiento;
    }

    /**
     * @return mixed
     */
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * @param mixed $curp
     */
    public function setCurp($curp): void
    {
        $this->curp = $curp;
    }

    /**
     * @return mixed
     */
    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    /**
     * @param mixed $ocupacion
     */
    public function setOcupacion($ocupacion): void
    {
        $this->ocupacion = $ocupacion;
    }

    /**
     * @return mixed
     */
    public function getTipoIdentificacion()
    {
        return $this->tipo_Identificacion;
    }

    /**
     * @param mixed $tipo_Identificacion
     */
    public function setTipoIdentificacion($tipo_Identificacion): void
    {
        $this->tipo_Identificacion = $tipo_Identificacion;
    }

    /**
     * @return mixed
     */
    public function getNumIdentificacion()
    {
        return $this->num_Identificacion;
    }

    /**
     * @param mixed $num_Identificacion
     */
    public function setNumIdentificacion($num_Identificacion): void
    {
        $this->num_Identificacion = $num_Identificacion;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular): void
    {
        $this->celular = $celular;
    }

    /**
     * @return mixed
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * @param mixed $rfc
     */
    public function setRfc($rfc): void
    {
        $this->rfc = $rfc;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getCodigoPostal()
    {
        return $this->codigo_Postal;
    }

    /**
     * @param mixed $codigo_Postal
     */
    public function setCodigoPostal($codigo_Postal): void
    {
        $this->codigo_Postal = $codigo_Postal;
    }

    /**
     * @return mixed
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * @param mixed $municipio
     */
    public function setMunicipio($municipio): void
    {
        $this->municipio = $municipio;
    }

    /**
     * @return mixed
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * @param mixed $colonia
     */
    public function setColonia($colonia): void
    {
        $this->colonia = $colonia;
    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * @param mixed $calle
     */
    public function setCalle($calle): void
    {
        $this->calle = $calle;
    }

    /**
     * @return mixed
     */
    public function getNumExterior()
    {
        return $this->num_exterior;
    }

    /**
     * @param mixed $num_exterior
     */
    public function setNumExterior($num_exterior): void
    {
        $this->num_exterior = $num_exterior;
    }

    /**
     * @return mixed
     */
    public function getNumInterior()
    {
        return $this->num_interior;
    }

    /**
     * @param mixed $num_interior
     */
    public function setNumInterior($num_interior): void
    {
        $this->num_interior = $num_interior;
    }

    /**
     * @return mixed
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * @param mixed $mensaje
     */
    public function setMensaje($mensaje): void
    {
        $this->mensaje = $mensaje;
    }

    /**
     * @return mixed
     */
    public function getPromocion()
    {
        return $this->promocion;
    }

    /**
     * @param mixed $promocion
     */
    public function setPromocion($promocion): void
    {
        $this->promocion = $promocion;
    }



}