<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * IamSoft\AndrethaBundle\Entity\Escribano
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IamSoft\AndrethaBundle\Entity\EscribanoRepository")
 */
class Escribano
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
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=60)
     */
    private $nombre;

    /**
     * @var string $apellido
     *
     * @ORM\Column(name="apellido", type="string", length=60)
     */
    private $apellido;

		/**
     * @ORM\OneToMany(targetEntity="RegistroEscribano", mappedBy="escribano")
     */
    protected $registrosEscribano;

		/**
     * @ORM\OneToMany(targetEntity="PersoneriaCliente", mappedBy="escribano")
     */
    protected $personerias;
    
    public function __construct()
    {
        $this->registrosEscribano = new ArrayCollection();
        $this->personerias = new ArrayCollection();
    }
    
    public function __toString()
    {
    	return $this->nombre.' '.$this->apellido;
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
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
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

    /**
     * Get personerias
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPersonerias()
    {
        return $this->personerias;
    }

    /**
     * Add personerias
     *
     * @param IamSoft\AndrethaBundle\Entity\PersoneriaCliente $personerias
     */
    public function addPersoneriaCliente(\IamSoft\AndrethaBundle\Entity\PersoneriaCliente $personerias)
    {
        $this->personerias[] = $personerias;
    }
}