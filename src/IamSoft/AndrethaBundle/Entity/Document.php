<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * IamSoft\AndrethaBundle\Entity\Document
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IamSoft\AndrethaBundle\Entity\DocumentRepository")
 */
class Document
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
     * @var text $descripcion
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var string $path
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;
    
    public $file;
    
		/**
     * @ORM\OneToMany(targetEntity="DocumentoTipoTramite", mappedBy="documento")
     */
    private $documentosTipoTramite;
    
    public function __construct()
    {
        $this->documentosTipoTramite = new ArrayCollection();
    }
    
    public function __toString()
    {
    	return $this->getPath();
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
     * Set path
     *
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
    
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/documents';
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
    
		public function upload()
		{
		    // the file property can be empty if the field is not required
		    if (null === $this->file) {
		        return;
		    }
		
		    // we use the original file name here but you should
		    // sanitize it at least to avoid any security issues
		
		    // move takes the target directory and then the target filename to move to
		    $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
		
		    // set the path property to the filename where you'ved saved the file
		    $this->path = $this->file->getClientOriginalName();
		
		    // clean up the file property as you won't need it anymore
		    $this->file = null;
		}
		
		public function deleteFile()
		{
			unlink($this->getAbsolutePath());
		}
		
		public function updateFile()
		{
			$this->deleteFile();
			$this->upload();
		}
		

    /**
     * Set descripcion
     *
     * @param text $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Get descripcion
     *
     * @return text 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}