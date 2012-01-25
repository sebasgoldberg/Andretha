<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * IamSoft\AndrethaBundle\Entity\Emprendimiento
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IamSoft\AndrethaBundle\Entity\EmprendimientoRepository")
 */
class Emprendimiento
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
     * @var string $denominacion
     *
     * @ORM\Column(name="denominacion", type="string", length=100)
     */
    private $denominacion;

    /**
     * @var text $comentarios
     *
     * @ORM\Column(name="comentarios", type="text")
     */
    private $comentarios;

    /**
     * @var date $fechaInicio
     *
     * @ORM\Column(name="fechaInicio", type="date")
     */
    private $fechaInicio;
    
		/**
     * @ORM\OneToMany(targetEntity="CarpetaEmprendimiento", mappedBy="emprendimiento")
     */
    private $carpetaEmprendimientos;

    public function __construct()
    {
    	$this->carpetaEmprendimientos = new ArrayCollection();
    }
    
    public function __toString()
    {
    	return $this->getDenominacion();
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
     * Set comentarios
     *
     * @param text $comentarios
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;
    }

    /**
     * Get comentarios
     *
     * @return text 
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Set fechaInicio
     *
     * @param date $fechaInicio
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    /**
     * Get fechaInicio
     *
     * @return date 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Add carpetaEmprendimientos
     *
     * @param IamSoft\AndrethaBundle\Entity\CarpetaEmprendimiento $carpetaEmprendimientos
     */
    public function addCarpetaEmprendimiento(\IamSoft\AndrethaBundle\Entity\CarpetaEmprendimiento $carpetaEmprendimientos)
    {
        $this->carpetaEmprendimientos[] = $carpetaEmprendimientos;
    }

    /**
     * Get carpetaEmprendimientos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCarpetaEmprendimientos()
    {
        return $this->carpetaEmprendimientos;
    }
}