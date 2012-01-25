<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\EntityManager;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * IamSoft\AndrethaBundle\Entity\RegistroEscribano
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IamSoft\AndrethaBundle\Entity\RegistroEscribanoRepository")
 */
class RegistroEscribano
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
     * @var date $fechaValidoDesde
     *
     * @ORM\Column(name="fechaValidoDesde", type="date")
     */
    private $fechaValidoDesde;

    /**
     * @var date $fechaValidoHasta
     *
     * @ORM\Column(name="fechaValidoHasta", type="date")
     */
    private $fechaValidoHasta;
    
    /**
     * @ORM\ManyToOne(targetEntity="Escribano", inversedBy="registrosEscribano")
     * @ORM\JoinColumn(name="escribano_id", referencedColumnName="id", nullable=false)
     */
    private $escribano;

    /**
     * @ORM\ManyToOne(targetEntity="Registro", inversedBy="registrosEscribano")
     * @ORM\JoinColumn(name="registro_id", referencedColumnName="id", nullable=false)
     */
    private $registro;

    /**
     * @ORM\ManyToOne(targetEntity="Caracter")
     * @ORM\JoinColumn(name="caracter_id", referencedColumnName="id", nullable=false)
     */
    private $caracter;

		/**
     * @ORM\OneToMany(targetEntity="Libro", mappedBy="registroEscribano")
     */
    protected $libros;

		/**
     * @ORM\OneToMany(targetEntity="LoteActas", mappedBy="registroEscribano")
     */
    protected $lotesActas;

		/**
     * @ORM\OneToMany(targetEntity="LoteAnexos", mappedBy="registroEscribano")
     */
    protected $lotesAnexos;

    public function __construct()
    {
        $this->libros = new ArrayCollection();
        $this->lotesActas = new ArrayCollection();
        $this->lotesAnexos = new ArrayCollection();
    }
    
    public function __toString()
    {
    	return 'Reg:'.$this->getRegistro().'-'.
    		'Esc:'.$this->getEscribano().'-'.
    		'Car:'.$this->getCaracter().'-';
    		'Val:'.$this->getFechaValidoDesde().' a '.$this->getFechaValidoHasta();
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
     * Set fechaValidoDesde
     *
     * @param date $fechaValidoDesde
     */
    public function setFechaValidoDesde($fechaValidoDesde)
    {
        $this->fechaValidoDesde = $fechaValidoDesde;
    }

    /**
     * Get fechaValidoDesde
     *
     * @return date 
     */
    public function getFechaValidoDesde()
    {
        return $this->fechaValidoDesde;
    }

    /**
     * Set fechaValidoHasta
     *
     * @param date $fechaValidoHasta
     */
    public function setFechaValidoHasta($fechaValidoHasta)
    {
        $this->fechaValidoHasta = $fechaValidoHasta;
    }

    /**
     * Get fechaValidoHasta
     *
     * @return date 
     */
    public function getFechaValidoHasta()
    {
        return $this->fechaValidoHasta;
    }

    /**
     * Set escribano
     *
     * @param IamSoft\AndrethaBundle\Entity\Escribano $escribano
     */
    public function setEscribano(\IamSoft\AndrethaBundle\Entity\Escribano $escribano)
    {
        $this->escribano = $escribano;
    }

    /**
     * Get escribano
     *
     * @return IamSoft\AndrethaBundle\Entity\Escribano 
     */
    public function getEscribano()
    {
        return $this->escribano;
    }

    /**
     * Set registro
     *
     * @param IamSoft\AndrethaBundle\Entity\Registro $registro
     */
    public function setRegistro(\IamSoft\AndrethaBundle\Entity\Registro $registro)
    {
        $this->registro = $registro;
    }

    /**
     * Get registro
     *
     * @return IamSoft\AndrethaBundle\Entity\Registro 
     */
    public function getRegistro()
    {
        return $this->registro;
    }

    /**
     * Set caracter
     *
     * @param IamSoft\AndrethaBundle\Entity\Caracter $caracter
     */
    public function setCaracter(\IamSoft\AndrethaBundle\Entity\Caracter $caracter)
    {
        $this->caracter = $caracter;
    }

    /**
     * Get caracter
     *
     * @return IamSoft\AndrethaBundle\Entity\Caracter 
     */
    public function getCaracter()
    {
        return $this->caracter;
    }

    /**
     * Add libros
     *
     * @param IamSoft\AndrethaBundle\Entity\Libro $libros
     */
    public function addLibro(\IamSoft\AndrethaBundle\Entity\Libro $libros)
    {
        $this->libros[] = $libros;
    }

    /**
     * Get libros
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getLibros()
    {
        return $this->libros;
    }
    
    /**
     * Indica si la fecha desde es menor o igual que la fecha hasta.
     */
    public function isFechaDesdeMenorIgualFechaHasta()
    {
    	return ($this->getFechaValidoDesde()<=$this->getFechaValidoHasta());
    }
    
    /**
     * Indica si el período definido para $this se solapa con otro
     * RegistroEscribano con mismo registro y escribano.
     */
    public function isNotPeriodoSolapadoConPeriodoYaDefinido(EntityManager $entityManager)
    {
    	$repository=$entityManager->getRepository('IamSoftAndrethaBundle:RegistroEscribano');
    	return !($repository->isPeriodoSolapadoConPeriodoYaDefinido($this));
    }

    /**
     * Add lotesActas
     *
     * @param IamSoft\AndrethaBundle\Entity\LoteActas $lotesActas
     */
    public function addLoteActas(\IamSoft\AndrethaBundle\Entity\LoteActas $lotesActas)
    {
        $this->lotesActas[] = $lotesActas;
    }

    /**
     * Get lotesActas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getLotesActas()
    {
        return $this->lotesActas;
    }

    /**
     * Add lotesAnexos
     *
     * @param IamSoft\AndrethaBundle\Entity\LoteAnexos $lotesAnexos
     */
    public function addLoteAnexos(\IamSoft\AndrethaBundle\Entity\LoteAnexos $lotesAnexos)
    {
        $this->lotesAnexos[] = $lotesAnexos;
    }

    /**
     * Get lotesAnexos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getLotesAnexos()
    {
        return $this->lotesAnexos;
    }
}