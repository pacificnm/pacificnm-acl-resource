<?php
namespace AclResource\View\Helper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclResource\View\Helper\AclResourceSearchForm;

class AclResourceSearchFormFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \AclResource\View\Helper\AclResourceSearchForm
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        return new AclResourceSearchForm();
    }
}

