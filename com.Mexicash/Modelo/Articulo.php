<?php


class Articulo
{
    private $idTipo;
    private $idFolio;
    private $idMarca;
    private $idEstado;
    private $idModelo;
    private $idTamaño;
    private $idColor;
    private $idSerie;
    private $idPrestamoE;
    private $idAvaluoE;
    private $idPrestamoMaxE;
    private $idUbivacion;
    private $idDetallePrendaE;

    /**
     * Cliente constructor.
     * @param $idTipo
     * @param $idFolio
     * @param $idMarca
     * @param $idEstado
     * @param $idModelo
     * @param $idTamaño
     * @param $idColor
     * @param $idSerie
     * @param $idPrestamoE
     * @param $idAvaluoE
     * @param $idPrestamoMaxE
     * @param $idUbivacion
     * @param $idDetallePrendaE

     */
    public function __construct($idTipo,$idFolio, $idMarca, $idEstado, $idModelo, $idTamaño,$idColor, $idSerie, $idPrestamoE, $idAvaluoE, $idPrestamoMaxE, $idUbivacion, $idDetallePrendaE)
    {
        $this->tipo = $idTipo;
        $this->folio = $idFolio;
        $this->marca = $idMarca;
        $this->estado = $idEstado;
        $this->modelo = $idModelo;
        $this->tamaño = $idTamaño;
        $this->color = $idColor;
        $this->serie = $idSerie;
        $this->prestamoE = $idPrestamoE;
        $this->avaluoE = $idAvaluoE;
        $this->prestamoMaxE = $idPrestamoMaxE;
        $this->ubivacion = $idUbivacion;
        $this->detallePrendaE = $idDetallePrendaE;
    }

    /**
     * @return mixed
     */
    public function getFolio()
    {
        return $this->folio;
    }

    /**
     * @param mixed $idFolio
     */
    public function setFolio($idFolio): void
    {
        $this->folio = $idFolio;
    }
    /**
     * @return mixed
     */
    public function getAvaluoE()
    {
        return $this->avaluoE;
    }

    /**
     * @param mixed $avaluoE
     */
    public function setAvaluoE($avaluoE): void
    {
        $this->avaluoE = $avaluoE;
    }

    /**
     * @return mixed
     */
    public function getDetallePrendaE()
    {
        return $this->detallePrendaE;
    }

    /**
     * @param mixed $detallePrendaE
     */
    public function setDetallePrendaE($detallePrendaE): void
    {
        $this->detallePrendaE = $detallePrendaE;
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
    public function getPrestamoE()
    {
        return $this->prestamoE;
    }

    /**
     * @param mixed $prestamoE
     */
    public function setPrestamoE($prestamoE): void
    {
        $this->prestamoE = $prestamoE;
    }

    /**
     * @return mixed
     */
    public function getPrestamoMaxE()
    {
        return $this->prestamoMaxE;
    }

    /**
     * @param mixed $prestamoMaxE
     */
    public function setPrestamoMaxE($prestamoMaxE): void
    {
        $this->prestamoMaxE = $prestamoMaxE;
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