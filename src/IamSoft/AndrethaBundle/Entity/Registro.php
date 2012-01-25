<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IamSoft\AndrethaBundle\Entity\Registro
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IamSoft\AndrethaBundle\Entity\RegistroRepository")
 */
class Registro
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
     * @ORM\Column(name="denominacion", type="string", length=60)
     */
    private $denominacion;

		/**
     * @ORM\OneToMany(targetEntity="RegistroEscribano", mappedBy="registro")
     */
    protected $registrosEscribano;
        
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
    public function __construct()
    {
        $this->registrosEscribano = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString()
    {
    	return $this->denominacion;
    }    
    
    /**
     * Add registrosEscribano
     *
     * @param IamSoft\AndrethaBundle\Entity\RegistroEscribano $registrosEscribano
     */
    public function addRegistroEscribano(\IamSoft\AndrethaBundle\Entity\RegistroEscribano $registrosEscribano)
    {
        $this->registrosEscribano[] = $registrosEscribano;
    }

    /**
     * Get registrosEscribano
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRegistrosEscribano()
    {
        return $this->registrosEscribano;
    }
}