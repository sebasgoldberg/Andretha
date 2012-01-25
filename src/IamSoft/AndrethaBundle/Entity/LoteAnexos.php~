<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;

/**
 * IamSoft\AndrethaBundle\Entity\LoteAnexos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IamSoft\AndrethaBundle\Entity\LoteAnexosRepository")
 */
class LoteAnexos
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="RegistroEscribano", inversedBy="lotesAnexos")
     * @ORM\JoinColumn(name="registro_escribano_id", referencedColumnName="id", nullable=false)
     */
    private $registroEscribano;
    
    /**
     * @var decimal $numPreImpresoIni
     *
     * @ORM\Column(name="numPreImpresoIni", type="decimal")
     */
    private $numPreImpresoIni;

    /**
     * @var integer $cantidad
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var date $fechaCompra
     *
     * @ORM\Column(name="fechaCompra", type="date")
     */
    private $fechaCompra;

    /**
     * @var integer $cantidadUsados
     *
     * @ORM\Column(name="cantidadUsados", type="integer")
     */
    private $cantidadUsados;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numPreImpresoIni
     *
     * @param decimal $numPreImpresoIni
     */
    public function setNumPreImpresoIni($numPreImpresoIni)
    {
        $this->numPreImpresoIni = $numPreImpresoIni;
    }

    /**
     * Get numPreImpresoIni
     *
     * @return decimal 
     */
    public function getNumPreImpresoIni()
    {
        return $this->numPreImpresoIni;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set fechaCompra
     *
     * @param date $fechaCompra
     */
    public function setFechaCompra($fechaCompra)
    {
        $this->fechaCompra = $fechaCompra;
    }

    /**
     * Get fechaCompra
     *
     * @return date 
     */
    public function getFechaCompra()
    {
        return $this->fechaCompra;
    }

    /**
     * Set cantidadUsados
     *
     * @param integer $cantidadUsados
     */
    public function setCantidadUsados($cantidadUsados)
    {
        $this->cantidadUsados = $cantidadUsados;
    }

    /**
     * Get cantidadUsados
     *
     * @return integer 
     */
    public function getCantidadUsados()
    {
        return $this->cantidadUsados;
    }

    /**
     * Set registroEscribano
     *
     * @param IamSoft\AndrethaBundle\Entity\RegistroEscribano $registroEscribano
     */
    public function setRegistroEscribano(\IamSoft\AndrethaBundle\Entity\RegistroEscribano $registroEscribano)
    {
        $this->registroEscribano = $registroEscribano;
    }

    /**
     * Get registroEscribano
     *
     * @return IamSoft\AndrethaBundle\Entity\RegistroEscribano 
     */
    public function getRegistroEscribano()
    {
        return $this->registroEscribano;
    }

    public function isCantidadUsadosMenorIgualCantidad()
    {
    	return ($this->getCantidadUsados()<=$this->getCantidad());
    }
    
    public function isNotLoteSolapadoConLoteYaDefinido(EntityManager $entityManager)
    {
    	$repository=$entityManager->getRepository('IamSoftAndrethaBundle:LoteAnexos');
    	return !($repository->isLoteSolapadoConLoteYaDefinido($this));
    }
    
    public function isNotInUse(EntityManager $entityManager)
    {
    	// @todo: Definir
    	return true;
    }
}