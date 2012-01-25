<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IamSoft\AndrethaBundle\Entity\Caracter
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IamSoft\AndrethaBundle\Entity\CaracterRepository")
 */
class Caracter
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

    public function __toString()
    {
    	return $this->denominacion;
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
}