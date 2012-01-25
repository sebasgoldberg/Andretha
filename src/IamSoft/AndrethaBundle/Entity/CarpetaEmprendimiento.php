<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IamSoft\AndrethaBundle\Entity\CarpetaEmprendimiento
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IamSoft\AndrethaBundle\Entity\CarpetaEmprendimientoRepository")
 */
class CarpetaEmprendimiento
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
     * @ORM\ManyToOne(targetEntity="Emprendimiento", inversedBy="carpetaEmprendimientos")
     * @ORM\JoinColumn(name="emprendimiento_id", referencedColumnName="id", nullable=false)
     */
    private $emprendimiento;

    /**
     * @ORM\ManyToOne(targetEntity="Carpeta", inversedBy="carpetaEmprendimientos")
     * @ORM\JoinColumn(name="carpeta_id", referencedColumnName="id", nullable=false)
     */
    private $carpeta;

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
     * Set emprendimiento
     *
     * @param IamSoft\AndrethaBundle\Entity\Emprendimiento $emprendimiento
     */
    public function setEmprendimiento(\IamSoft\AndrethaBundle\Entity\Emprendimiento $emprendimiento)
    {
        $this->emprendimiento = $emprendimiento;
    }

    /**
     * Get emprendimiento
     *
     * @return IamSoft\AndrethaBundle\Entity\Emprendimiento 
     */
    public function getEmprendimiento()
    {
        return $this->emprendimiento;
    }

    /**
     * Set carpeta
     *
     * @param IamSoft\AndrethaBundle\Entity\Carpeta $carpeta
     */
    public function setCarpeta(\IamSoft\AndrethaBundle\Entity\Carpeta $carpeta)
    {
        $this->carpeta = $carpeta;
    }

    /**
     * Get carpeta
     *
     * @return IamSoft\AndrethaBundle\Entity\Carpeta 
     */
    public function getCarpeta()
    {
        return $this->carpeta;
    }
}