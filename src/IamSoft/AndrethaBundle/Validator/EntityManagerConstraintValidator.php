<?php

namespace IamSoft\AndrethaBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;
use Doctrine\ORM\EntityManager;

/**
 * Validator for EntityManager constraint
 *
 * @author Juan Sebastian Goldberg <sebas.goldberg@gmail.com>
 */
class EntityManagerConstraintValidator extends ConstraintValidator
{
	
    private $entityManager;
    
		public function __construct(EntityManager $entityManager)
		{
			$this->entityManager=$entityManager;
		}
	
    /**
     * Checks if the passed value is valid.
     *
     * @param mixed      $value      The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @return Boolean Whether or not the value is valid
     *
     * @api
     */
    public function isValid($object, Constraint $constraint)
    {
      if (null === $object) {
      	return true;
      }
    	
      $method=$constraint->method;
      
      if (!method_exists($object, $method))
				throw new ConstraintDefinitionException(sprintf('Method "%s" targeted by Callback constraint does not exist', $method));

			$isValid=($object->$method($this->entityManager));
			
			if ($isValid)
				return true;

			$this->setMessage($constraint->message);
			return false;
    }
    
}