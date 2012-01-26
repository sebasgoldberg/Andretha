<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IamSoft\AndrethaBundle\Entity\DocumentoTipoTramite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IamSoft\AndrethaBundle\Entity\DocumentoTipoTramiteRepository")
 */
class DocumentoTipoTramite
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
     * @ORM\ManyToOne(targetEntity="TipoTramite", inversedBy="documentosTipoTramite")
     * @ORM\JoinColumn(name="tipoTramite_id", referencedColumnName="id", nullable=false)
     */
    private $tipoTramite;

    /**
     * @ORM\ManyToOne(targetEntity="Document", inversedBy="documentosTipoTramite")
     * @ORM\JoinColumn(name="document_id", referencedColumnName="id", nullable=false)
     */
    private $documento;

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
     * Set tipoTramite
     *
     * @param IamSoft\AndrethaBundle\Entity\TipoTramite $tipoTramite
     */
    public function setTipoTramite(\IamSoft\AndrethaBundle\Entity\TipoTramite $tipoTramite)
    {
        $this->tipoTramite = $tipoTramite;
    }

    /**
     * Get tipoTramite
     *
     * @return IamSoft\AndrethaBundle\Entity\TipoTramite 
     */
    public function getTipoTramite()
    {
        return $this->tipoTramite;
    }

    /**
     * Set documento
     *
     * @param IamSoft\AndrethaBundle\Entity\Document $documento
     */
    public function setDocumento(\IamSoft\AndrethaBundle\Entity\Document $documento)
    {
        $this->documento = $documento;
    }

    /**
     * Get documento
     *
     * @return IamSoft\AndrethaBundle\Entity\Document 
     */
    public function getDocumento()
    {
        return $this->documento;
    }
}