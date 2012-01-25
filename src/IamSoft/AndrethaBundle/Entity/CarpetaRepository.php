<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CarpetaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CarpetaRepository extends EntityRepository
{
	public function getMaxNumeroReferencia($idTipoCarpeta)
	{
		if ($idTipoCarpeta==null)
			return 0;

		try {
			
			$maxNumeroReferencia=$this->getEntityManager()
	    	->createQuery(
	    		'SELECT max(c.numeroReferencia) '.
	    		'FROM IamSoftAndrethaBundle:Carpeta c '.
	    		'join c.tipoCarpeta tc '.
	    		'where '.
	    			'tc.id = :tipoCarpeta ')
	    		//'group by tc.id ')
	    	->setParameters(array(
					'tipoCarpeta' => $idTipoCarpeta,
	    	))
	    	->setMaxResults(1)
	      ->getSingleScalarResult();
	      
	    if ($maxNumeroReferencia==null)
	    	return 0;
	   	
	    return $maxNumeroReferencia;
	    	
		} catch (\Doctrine\Orm\NoResultException $e) {
			return 0;
		}
			

	}
}