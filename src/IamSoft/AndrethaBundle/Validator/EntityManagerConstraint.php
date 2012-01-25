<?php

namespace IamSoft\AndrethaBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class EntityManagerConstraint extends Constraint
{
    public $message;
    public $method;
    
    /**
     * Returns the name of the required options
     *
     * Override this method if you want to define required options.
     *
     * @return array
     * @see __construct()
     *
     * @api
     */
    public function getRequiredOptions()
    {
        return array('message','method');
    }
    
    /**
     * Returns the name of the class that validates this constraint
     *
     * By default, this is the fully qualified name of the constraint class
     * suffixed with "Validator". You can override this method to change that
     * behaviour.
     *
     * @return string
     *
     * @api
     */
    public function validatedBy()
    {
        return 'iamsoft.entity.manager.validator';
    }

    /**
     * Returns whether the constraint can be put onto classes, properties or
     * both
     *
     * This method should return one or more of the constants
     * Constraint::CLASS_CONSTRAINT and Constraint::PROPERTY_CONSTRAINT.
     *
     * @return string|array  One or more constant values
     *
     * @api
     */
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}