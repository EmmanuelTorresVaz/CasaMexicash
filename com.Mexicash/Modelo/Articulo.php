<?php


class Articulo
{
    private $idTipo;
    private $idMarca;
    private $idEstado;
    private $idModelo;
    private $idTamaño;
    private $idColor;
    private $idSerie;
    private $idPrestamo;
    private $idAvaluo;
    private $idPrestamoMax;
    private $idUbivacion;
    private $idDetallePrenda;

    /**
     * Cliente constructor.
     * @param $idTipo
     * @param $idMarca
     * @param $idEstado
     * @param $idModelo
     * @param $idTamaño
     * @param $idColor
     * @param $idSerie
     * @param $idPrestamo
     * @param $idAvaluo
     * @param $idPrestamoMax
     * @param $idUbivacion
     * @param $idDetallePrenda

     */
    public function __construct($idTipo, $idMarca, $idEstado, $idModelo, $idTamaño,$idColor, $idSerie, $idPrestamo, $idAvaluo, $idPrestamoMax, $idUbivacion, $idDetallePrenda)
    {
        $this->tipo = $idTipo;
        $this->marca = $idMarca;
        $this->estado = $idEstado;
        $this->modelo = $idModelo;
        $this->tamaño = $idTamaño;
        $this->color = $idColor;
        $this->serie = $idSerie;
        $this->prestamo = $idPrestamo;
        $this->avaluo = $idAvaluo;
        $this->prestamoMax = $idPrestamoMax;
        $this->ubivacion = $idUbivacion;
        $this->detallePrenda = $idDetallePrenda;
    }

    /**
     * @return mixed
     */
    public function getAvaluo()
    {
        return $this->avaluo;
    }

    /**
     * @param mixed $avaluo
     */
    public function setAvaluo($avaluo): void
    {
        $this->avaluo = $avaluo;
    }

    /**
     * @return mixed
     */
    public function getDetallePrenda()
    {
        return $this->detallePrenda;
    }

    /**
     * @param mixed $detallePrenda
     */
    public function setDetallePrenda($detallePrenda): void
    {
        $this->detallePrenda = $detallePrenda;
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
    public function getTamaño()
    {
        return $this->tamaño;
    }

    /**
     * @param mixed idTamaño
     */
    public function setTamaño($tamaño): void
    {
        $this->tamaño = $tamaño;
    }

    /**
     * @return mixed
     */
    public function getPrestamo()
    {
        return $this->prestamo;
    }

    /**
     * @param mixed $prestamo
     */
    public function setPrestamo($prestamo): void
    {
        $this->prestamo = $prestamo;
    }

    /**
     * @return mixed
     */
    public function getPrestamoMax()
    {
        return $this->prestamoMax;
    }

    /**
     * @param mixed $prestamoMax
     */
    public function setPrestamoMax($prestamoMax): void
    {
        $this->prestamoMax = $prestamoMax;
    }

    /**
     * @return mixed
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * @param mixed $referencia
     */
    public function setReferencia($referencia): void
    {
        $this->referencia = $referencia;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie): void
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getUbivacion()
    {
        return $this->ubivacion;
    }

    /**
     * @param mixed $ubivacion
     */
    public function setUbivacion($ubivacion): void
    {
        $this->ubivacion = $ubivacion;
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



}