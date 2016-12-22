<?php
namespace AclResource\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclResource\Form\Form;

class FormFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \AclResource\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        return new Form();
    }
}

