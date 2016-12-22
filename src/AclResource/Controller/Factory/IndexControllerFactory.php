<?php
namespace AclResource\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclResource\Controller\IndexController;

class IndexControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \AclResource\Controller\IndexController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('AclResource\Service\ServiceInterface');
        
        return new IndexController($service);
    }
}

