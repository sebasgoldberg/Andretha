<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * IamSoft\AndrethaBundle\Entity\TipoTramite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IamSoft\AndrethaBundle\Entity\TipoTramiteRepository")
 */
class TipoTramite
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
     * @ORM\ManyToOne(targetEntity="TipoCarpeta", inversedBy="tiposTramite")
     * @ORM\JoinColumn(name="tipo_carpeta_id", referencedColumnName="id")
     */
    private $tipoCarpeta;

    /**
     * @ORM\ManyToOne(targetEntity="TipoTramite", inversedBy="tiposTramiteHijo")
     * @ORM\JoinColumn(name="tipo_tramite_padre_id", referencedColumnName="id")
     */
    private $tipoTramitePadre;
    
    /**
     * @ORM\OneToMany(targetEntity="TipoTramite", mappedBy="tipoTramitePadre")
     */
    protected $tiposTramiteHijo;

		/**
     * @ORM\OneToMany(targetEntity="DocumentoTipoTramite", mappedBy="tipoTramite")
     */
    private $documentosTipoTramite;
    
    public function __construct()
    {
        $this->tiposTramiteHijo = new ArrayCollection();
        $this->documentosTipoTramite = new ArrayCollection();
    }
    
    public function __toString()
    {

    	if ($this->getTipoCarpeta() != null)
    		return $this->getTipoCarpeta().'->'.$this->getDenominacion();
    	
    	if ($this->getTipoTramitePadre() != null)
    		return $this->getTipoTramitePadre().'->'.$this->getDenominacion();  
    		
    	return $this->getDenominacion();
    		
    	//throw new Exception("El tipo de carpeta ".$this->getId().
    		//" no tiene ni tipo de carpeta ni tipo de tramite padre asociado.");
    	
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
     * Set tipoCarpeta
     *
     * @param IamSoft\AndrethaBundle\Entity\TipoCarpeta $tipoCarpeta
     */
    public function setTipoCarpeta($tipoCarpeta)
    {
        $this->tipoCarpeta = $tipoCarpeta;
    }

    /**
     * Get tipoCarpeta
     *
     * @return IamSoft\AndrethaBundle\Entity\TipoCarpeta 
     */
    public function getTipoCarpeta()
    {
        return $this->tipoCarpeta;
    }

    /**
     * Set tipoTramitePadre
     *
     * @param IamSoft\AndrethaBundle\Entity\TipoTramite $tipoTramitePadre
     */
    public function setTipoTramitePadre($tipoTramitePadre)
    {
        $this->tipoTramitePadre = $tipoTramitePadre;
    }

    /**
     * Get tipoTramitePadre
     *
     * @return IamSoft\AndrethaBundle\Entity\TipoTramite 
     */
    public function getTipoTramitePadre()
    {
        return $this->tipoTramitePadre;
    }

    /**
     * Add tiposTramiteHijo
     *
     * @param IamSoft\AndrethaBundle\Entity\TipoTramite $tiposTramiteHijo
     */
    public function addTipoTramite(\IamSoft\AndrethaBundle\Entity\TipoTramite $tiposTramiteHijo)
    {
        $this->tiposTramiteHijo[] = $tiposTramiteHijo;
    }

    /**
     * Get tiposTramiteHijo
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTiposTramiteHijo()
    {
        return $this->tiposTramiteHijo;
    }
    
    /**
     * Indica si la carpeta y/o el tramite padre se encuentran asignados.
     */
    public function isCarpetaOrPadreSeted()
    {
    	return ($this->getTipoCarpeta()!=null || 
    		$this->getTipoTramitePadre()!=null);
    }

    /**
     * Indica si la carpeta y el tramite padre se encuentran asignados.
     */
    public function isCarpetaAndPadreSeted()
    {
    	return ($this->getTipoCarpeta()!=null && 
    		$this->getTipoTramitePadre()!=null);
    }
    
    /**
     * Indica si la instancia misma se tiene a si mismo como antecesor. 
     * En caso de $this->getTipoTramitePadre()==null devuelve false.
     * En caso que $this->getId()==null devuelve false.
     */
    public function isThisAnAntecestorOfThis()
    {
    	if ($this->getId()==null)
    		return false;

    	$tramitePadre=$this->getTipoTramitePadre();
    		
    	if ($tramitePadre==null)
    		return false;
    		
    	return $tramitePadre->isTheFirstCallerAnAntecesorOfTheFirstCaller($this->getId());
    	
    }
    
    /**
     * Precondition: The first caller must call this function like this:
     * $firstCaller->getTipoTramitePadre()->($firstCaller->getId());
     * 
     * Verifies if the first caller has his self as an ancestor.
     */
    public function isTheFirstCallerAnAntecesorOfTheFirstCaller($idFirstCaller)
    {
    	if ($this->getId()==null)
    		return false;
    		
			if ($this->getId()==$idFirstCaller)
				return true;

    	$tramitePadre=$this->getTipoTramitePadre();
    		
    	if ($tramitePadre==null)
    		return false;
    		    		    		
    	return $tramitePadre->isTheFirstCallerAnAntecesorOfTheFirstCaller($idFirstCaller);
    }
    
    

    /**
     * Add documentosTipoTramite
     *
     * @param IamSoft\AndrethaBundle\Entity\DocumentoTipoTramite $documentosTipoTramite
     */
    public function addDocumentoTipoTramite(\IamSoft\AndrethaBundle\Entity\DocumentoTipoTramite $documentosTipoTramite)
    {
        $this->documentosTipoTramite[] = $documentosTipoTramite;
    }

    /**
     * Get documentosTipoTramite
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getDocumentosTipoTramite()
    {
        return $this->documentosTipoTramite;
    }
}