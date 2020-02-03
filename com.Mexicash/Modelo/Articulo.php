<?php


class Articulo
{
    //Metal
    private $idTipoM;
    private $idContratoTemp;
    private $idKilataje;
    private $idCalidad;
    private $idCantidad;
    private $idPeso;
    private $idPesoPiedra;
    private $idPiedras;
    private $idPrestamo;
    private $idAvaluo;
    private $tipoInteres;
    private $interesMetal;
    private $idUbicacion;
    private $idDetallePrenda;
    //Electronico
    private $idTipoE;
    private $idMarca;
    private $idEstado;
    private $idModelo;
    private $idSerie;
    private $idPrestamoE;
    private $idAvaluoE;
    private $tipoInteresE;
    private $interesArt;
    private $idUbicacionE;
    private $idDetallePrendaE;


    /**
     * Articulo constructor.
     * Metal
     * @param $idTipoM
     * @param $idContratoTemp
     * @param $idKilataje
     * @param $idCalidad
     * @param $idCantidad
     * @param $idPeso
     * @param $idPesoPiedra
     * @param $idPiedras
     * @param $idPrestamo
     * @param $idAvaluo
     * @param $tipoInteres
     * @param $interesMetal
     * @param $idUbicacion
     * @param $idDetallePrenda
     * Electronico
     * @param $idTipoE
     * @param $idMarca
     * @param $idEstado
     * @param $idModelo
     * @param $idSerie
     * @param $idPrestamoE
     * @param $idAvaluoE
     * @param $idUbicacionE
     * @param $idDetallePrendaE
     */
    public function __construct(
        $idTipoM,
        $idContratoTemp,
        $idKilataje,
        $idCalidad,
        $idCantidad,
        $idPeso,
        $idPesoPiedra,
        $idPiedras,
        $idPrestamo,
        $idAvaluo,
        $tipoInteres,
        $interesMetal,
        $idUbicacion,
        $idDetallePrenda,
        $idTipoE,
        $idMarca,
        $idEstado,
        $idModelo,
        $idSerie,
        $idPrestamoE,
        $idAvaluoE,
        $tipoInteresE,
        $interesArt,
        $idUbicacionE,
        $idDetallePrendaE)
    {
        //Metales
        $this->tipoM = $idTipoM;
        $this->contrato = $idContratoTemp;
        $this->kilataje = $idKilataje;
        $this->calidad = $idCalidad;
        $this->cantidad = $idCantidad;
        $this->peso = $idPeso;
        $this->pesoPiedra = $idPesoPiedra;
        $this->piedras = $idPiedras;
        $this->prestamo = $idPrestamo;
        $this->avaluo = $idAvaluo;
        $this->tipoInteres= $tipoInteres;
        $this->interesMetal = $interesMetal;
        $this->ubicacion = $idUbicacion;
        $this->detallePrenda = $idDetallePrenda;
        //ELECTRONICOS
        $this->tipoE = $idTipoE;
        $this->marca = $idMarca;
        $this->estado = $idEstado;
        $this->modelo = $idModelo;
        $this->serie = $idSerie;
        $this->prestamoE = $idPrestamoE;
        $this->avaluoE = $idAvaluoE;
        $this->tipoInteresE= $tipoInteresE;
        $this->interesArt = $interesArt;
        $this->ubicacionE = $idUbicacionE;
        $this->detallePrendaE = $idDetallePrendaE;

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
    public function getInteresMetal()
    {
        return $this->interesMetal;
    }

    /**
     * @param mixed $interesMetal
     */
    public function setInteresMetal($interesMetal): void
    {
        $this->interesMetal = $interesMetal;
    }

    /**
     * @return mixed
     */
    public function getTipoInteresE()
    {
        return $this->tipoInteresE;
    }

    /**
     * @param mixed $tipoInteresE
     */
    public function setTipoInteresE($tipoInteresE): void
    {
        $this->tipoInteresE = $tipoInteresE;
    }

    /**
     * @return mixed
     */
    public function getInteresArt()
    {
        return $this->interesArt;
    }

    /**
     * @param mixed $interesArt
     */
    public function setInteresArt($interesArt): void
    {
        $this->interesArt = $interesArt;
    }


    /**
     * @return mixed
     */
    public function getContratoTemp()
    {
        return $this->contrato;
    }

    /**
     * @param mixed $idContratoTemp
     */
    public function setContratoTemp($idContratoTemp): void
    {
        $this->contrato = $idContratoTemp;
    }


    /**
     * @return mixed
     */
    public function getPiedras()
    {
        return $this->piedras;
    }

    /**
     * @param mixed $piedras
     */
    public function setPiedras($piedras): void
    {
        $this->piedras = $piedras;
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
    public function getCalidad()
    {
        return $this->calidad;
    }

    /**
     * @param mixed $calidad
     */
    public function setCalidad($calidad): void
    {
        $this->calidad = $calidad;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad): void
    {
        $this->cantidad = $cantidad;
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
    public function getKilataje()
    {
        return $this->kilataje;
    }

    /**
     * @param mixed $kilataje
     */
    public function setKilataje($kilataje): void
    {
        $this->kilataje = $kilataje;
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
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @param mixed $peso
     */
    public function setPeso($peso): void
    {
        $this->peso = $peso;
    }

    /**
     * @return mixed
     */
    public function getPesoPiedra()
    {
        return $this->pesoPiedra;
    }

    /**
     * @param mixed $pesoPiedra
     */
    public function setPesoPiedra($pesoPiedra): void
    {
        $this->pesoPiedra = $pesoPiedra;
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
    public function getTipoM()
    {
        return $this->tipoM;
    }

    /**
     * @param mixed $tipoM
     */
    public function setTipoM($tipoM): void
    {
        $this->tipoM = $tipoM;
    }

    /**
     * @return mixed
     */
    public function getTipoE()
    {
        return $this->tipoE;
    }

    /**
     * @param mixed $tipoE
     */
    public function setTipoE($tipoE): void
    {
        $this->tipoE = $tipoE;
    }


    /**
     * @return mixed
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * @param mixed $ubicacion
     */
    public function setUbicacion($ubicacion): void
    {
        $this->ubicacion = $ubicacion;
    }

    /**
     * @return mixed
     */
    public function getUbicacionE()
    {
        return $this->ubicacionE;
    }

    /**
     * @param mixed $ubicacionE
     */
    public function setUbicacionE($ubicacionE): void
    {
        $this->ubicacionE = $ubicacionE;
    }


}