<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * IamSoft\AndrethaBundle\Entity\Cliente
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IamSoft\AndrethaBundle\Entity\ClienteRepository")
 */
class Cliente
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
     * @var string $Nombre
     *
     * @ORM\Column(name="Nombre", type="string", length=60)
     */
    private $Nombre;

    /**
     * @var string $Apellido
     *
     * @ORM\Column(name="Apellido", type="string", length=60)
     */
    private $Apellido;

    /**
     * @ORM\ManyToOne(targetEntity="TipoDocumentoIdentidad", inversedBy="clientes")
     * @ORM\JoinColumn(name="tipo_documento_identidad_id", referencedColumnName="id", nullable=false)
     */
    private $tipoDocumentoIdentidad;
    
    /**
     * @var string $numeroDocumento
     *
     * @ORM\Column(name="numeroDocumento", type="string", length=15)
     */
    private $numeroDocumento;

		/**
     * @ORM\OneToMany(targetEntity="PersoneriaCliente", mappedBy="cliente")
     */
    protected $personerias;

    public function __construct()
    {
        $this->personerias = new ArrayCollection();
    }
    
    public function __toString()
    {
    	return $this->getNombre().' '.$this->getApellido().' - '.
    		$this->getTipoDocumentoIdentidad().' '.$this->getNumeroDocumento();
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
     * Set Nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->Nombre = $nombre;
    }

    /**
     * Get Nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * Set Apellido
     *
     * @param string $apellido
     */
    public function setApellido($apellido)
    {
        $this->Apellido = $apellido;
    }

    /**
     * Get Apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->Apellido;
    }

    /**
     * Set numeroDocumento
     *
     * @param string $numeroDocumento
     */
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
    }

    /**
     * Get numeroDocumento
     *
     * @return string 
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * Set tipoDocumentoIdentidad
     *
     * @param IamSoft\AndrethaBundle\Entity\TipoDocumentoIdentidad $tipoDocumentoIdentidad
     */
    public function setTipoDocumentoIdentidad(\IamSoft\AndrethaBundle\Entity\TipoDocumentoIdentidad $tipoDocumentoIdentidad)
    {
        $this->tipoDocumentoIdentidad = $tipoDocumentoIdentidad;
    }

    /**
     * Get tipoDocumentoIdentidad
     *
     * @return IamSoft\AndrethaBundle\Entity\TipoDocumentoIdentidad 
     */
    public function getTipoDocumentoIdentidad()
    {
        return $this->tipoDocumentoIdentidad;
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