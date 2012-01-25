<?php

namespace IamSoft\AndrethaBundle\Entity;

use IamSoft\AndrethaBundle\lib\Utils;

use Doctrine\ORM\EntityRepository;

/**
 * PersoneriaClienteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PersoneriaClienteRepository extends EntityRepository
{
	public function findOneByPersoneriaClienteYaDefinidaParaEscribano(
		PersoneriaCliente $personeriaCliente)
	{
		if ($personeriaCliente->getEscribano()==null)
		{
			return $this->getEntityManager()
	    	->createQuery(
	    		'SELECT pc '.
	    		'FROM IamSoftAndrethaBundle:PersoneriaCliente pc '.
	    		'join pc.cliente c '.
	    		'where '.
	    			Utils::getExpresionWhereDistintoId('pc.id', ':id').' and '.
	    			'c.id = :cliente and '.
	    			'pc.escribano is null ')
	    	->setParameters(array(
					'id' => $personeriaCliente->getId(),
	    		'cliente' => $personeriaCliente->getCliente()->getId(),
	    	))
	    	->setMaxResults(1)
	      ->getSingleResult();
		}
		else 
		{
			return $this->getEntityManager()
	    	->createQuery(
	    		'SELECT pc '.
	    		'FROM IamSoftAndrethaBundle:PersoneriaCliente pc '.
	    		'join pc.cliente c '.
	    		'join pc.escribano e '.
	    		'where '.
	    			Utils::getExpresionWhereDistintoId('pc.id', ':id').' and '.
	    		  'c.id = :cliente and '.
	    			'e.id = :escribano ')
	    	->setParameters(array(
					'id' => $personeriaCliente->getId(),
	    		'cliente' => $personeriaCliente->getCliente()->getId(),
	    		'escribano' => $personeriaCliente->getEscribano()->getId(),
	    	))
	    	->setMaxResults(1)
	      ->getSingleResult();
		}
	}

	public function isPersoneriaClienteYaDefinidaParaEscribano(
		PersoneriaCliente $personeriaCliente)
	{
		//$this->findOneByPersoneriaClienteYaDefinidaParaEscribano($personeriaCliente);
		try {
			$this->findOneByPersoneriaClienteYaDefinidaParaEscribano($personeriaCliente);
			return true;
		} catch (\Doctrine\Orm\NoResultException $e) {
			return false;
		}
	}
}