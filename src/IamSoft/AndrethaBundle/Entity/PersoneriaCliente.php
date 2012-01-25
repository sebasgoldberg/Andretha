<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;


/**
 * IamSoft\AndrethaBundle\Entity\PersoneriaCliente
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IamSoft\AndrethaBundle\Entity\PersoneriaClienteRepository")
 */
class PersoneriaCliente
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
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="personerias")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id", nullable=false)
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity="Escribano")
     * @ORM\JoinColumn(name="escribano_id", referencedColumnName="id", nullable=true)
     */
    private $escribano;
    
    /**
     * @var text $personeria
     *
     * @ORM\Column(name="personeria", type="text")
     */
    private $personeria;


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
     * Set personeria
     *
     * @param text $personeria
     */
    public function setPersoneria($personeria)
    {
        $this->personeria = $personeria;
    }

    /**
     * Get personeria
     *
     * @return text 
     */
    public function getPersoneria()
    {
        return $this->personeria;
    }

    /**
     * Set cliente
     *
     * @param IamSoft\AndrethaBundle\Entity\Cliente $cliente
     */
    public function setCliente(\IamSoft\AndrethaBundle\Entity\Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * Get cliente
     *
     * @return IamSoft\AndrethaBundle\Entity\Cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
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
    
    public function isNotPersoneriaClienteYaDefinidaParaEscribano(EntityManager $entityManager)
    {
    	$repository=$entityManager->getRepository('IamSoftAndrethaBundle:PersoneriaCliente');
    	return !($repository->isPersoneriaClienteYaDefinidaParaEscribano($this));
    }
}