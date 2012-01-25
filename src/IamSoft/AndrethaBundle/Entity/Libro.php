<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IamSoft\AndrethaBundle\Entity\Libro
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IamSoft\AndrethaBundle\Entity\LibroRepository")
 */
class Libro
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
     * @var integer $numero
     *
     * @ORM\Column(name="numero", type="integer", unique=true)
     */
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity="RegistroEscribano", inversedBy="libros")
     * @ORM\JoinColumn(name="registro_escribano_id", referencedColumnName="id", nullable=false)
     */
    private $registroEscribano;
    
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
     * Set numero
     *
     * @param integer $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set registroEscribano
     *
     * @param IamSoft\AndrethaBundle\Entity\RegistroEscribano $registroEscribano
     */
    public function setRegistroEscribano(\IamSoft\AndrethaBundle\Entity\RegistroEscribano $registroEscribano)
    {
        $this->registroEscribano = $registroEscribano;
    }

    /**
     * Get registroEscribano
     *
     * @return IamSoft\AndrethaBundle\Entity\RegistroEscribano 
     */
    public function getRegistroEscribano()
    {
        return $this->registroEscribano;
    }
}