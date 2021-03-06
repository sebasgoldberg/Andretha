<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * IamSoft\AndrethaBundle\Entity\TipoCarpeta
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipoCarpeta
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
     * @var string $letra
     *
     * @ORM\Column(name="letra", type="string", length=1)
     */
    private $letra;

    /**
     * @var string $denominacion
     *
     * @ORM\Column(name="denominacion", type="string", length=60)
     */
    private $denominacion;

		/**
     * @ORM\OneToMany(targetEntity="TipoTramite", mappedBy="tipoCarpeta")
     */
    protected $tiposTramite;

		/**
     * @ORM\OneToMany(targetEntity="Carpeta", mappedBy="tipoCarpeta")
     */
    private $carpetas;
    
    public function __construct()
    {
        $this->tiposTramite = new ArrayCollection();
        $this->carpetas = new ArrayCollection();
    }
    
    public function __toString()
    {
    	return '['.$this->getLetra().'] '.$this->getDenominacion();
    }    
    
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
     * Set letra
     *
     * @param string $letra
     */
    public function setLetra($letra)
    {
        $this->letra = $letra;
    }

    /**
     * Get letra
     *
     * @return string 
     */
    public function getLetra()
    {
        return $this->letra;
    }

    /**
     * Set denominacion
     *
     * @param string $denominacion
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    /**
     * Get denominacion
     *
     * @return string 
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * Add tiposTramite
     *
     * @param IamSoft\AndrethaBundle\Entity\TipoTramite $tiposTramite
     */
    public function addTipoTramite(\IamSoft\AndrethaBundle\Entity\TipoTramite $tiposTramite)
    {
        $this->tiposTramite[] = $tiposTramite;
    }

    /**
     * Get tiposTramite
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTiposTramite()
    {
        return $this->tiposTramite;
    }

    /**
     * Add carpetas
     *
     * @param IamSoft\AndrethaBundle\Entity\Carpeta $carpetas
     */
    public function addCarpeta(\IamSoft\AndrethaBundle\Entity\Carpeta $carpetas)
    {
        $this->carpetas[] = $carpetas;
    }

    /**
     * Get carpetas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCarpetas()
    {
        return $this->carpetas;
    }
}