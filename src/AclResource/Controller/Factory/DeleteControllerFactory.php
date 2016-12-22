<?php
namespace AclResource\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclResource\Controller\DeleteController;

class DeleteControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \AclResource\Controller\DeleteController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('AclResource\Service\ServiceInterface');
        
        return new DeleteController($service);
    }
}

