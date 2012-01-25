<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * IamSoft\AndrethaBundle\Entity\TipoDocumentoIdentidad
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipoDocumentoIdentidad
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
     * @ORM\OneToMany(targetEntity="Cliente", mappedBy="tipoDocumentoIdentidad")
     */
    protected $clientes;
    
    public function __construct()
    {
        $this->clientes = new ArrayCollection();
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
     * Add clientes
     *
     * @param IamSoft\AndrethaBundle\Entity\Cliente $clientes
     */
    public function addCliente(\IamSoft\AndrethaBundle\Entity\Cliente $clientes)
    {
        $this->clientes[] = $clientes;
    }

    /**
     * Get clientes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getClientes()
    {
        return $this->clientes;
    }
}