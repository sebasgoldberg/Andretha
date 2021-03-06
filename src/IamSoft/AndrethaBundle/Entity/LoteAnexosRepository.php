<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use IamSoft\AndrethaBundle\lib\Utils;

/**
 * LoteAnexosRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LoteAnexosRepository extends EntityRepository
{
	public function findOneByLoteSolapadoConLoteYaDefinido(
		LoteAnexos $loteAnexos)
	{
		return $this->getEntityManager()
    	->createQuery(
    		'SELECT la '.
    		'FROM IamSoftAndrethaBundle:LoteAnexos la '.
    		'where '.
    			Utils::getExpresionWhereDistintoId('la.id', ':id').' and '.
    			Utils::getExpresionWhereSolapamiento('la.numPreImpresoIni',
    			 '(la.numPreImpresoIni+la.cantidad-1)', ':numPreImpresoIni', 
    				':numPreImpresoMax'))
    	->setParameters(array(
				'id' => $loteAnexos->getId(),
    		'numPreImpresoIni' => $loteAnexos->getNumPreImpresoIni(),
    		'numPreImpresoMax' => $loteAnexos->getNumPreImpresoIni()+
    			$loteAnexos->getCantidad()-1,
    	))
    	->setMaxResults(1)
      ->getSingleResult();
	}

	public function isLoteSolapadoConLoteYaDefinido(
		LoteAnexos $loteAnexos)
	{
		try {
			$this->findOneByLoteSolapadoConLoteYaDefinido($loteAnexos);
			return true;
		} catch (\Doctrine\Orm\NoResultException $e) {
			return false;
		}
	}
}