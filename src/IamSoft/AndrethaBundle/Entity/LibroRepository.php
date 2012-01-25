<?php

namespace IamSoft\AndrethaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * LibroRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LibroRepository extends EntityRepository
{
	public function findOneByMayorNumero()
	{
		return $this->getEntityManager()
    	->createQuery('SELECT l FROM IamSoftAndrethaBundle:Libro l ORDER BY l.numero DESC')
    	->setMaxResults(1)
      ->getSingleResult();
	}

	public function findOneByMaxNumero()
	{
		try {
			$libro=$this->findOneByMayorNumero();
			return $libro->getNumero();
		} catch (\Doctrine\Orm\NoResultException $e) {
			return 0;
		}
	}
}