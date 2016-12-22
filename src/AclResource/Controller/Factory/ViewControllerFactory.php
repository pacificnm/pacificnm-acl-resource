<?php
namespace AclResource\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclResource\Controller\ViewController;

class ViewControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \AclResource\Controller\ViewController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('AclResource\Service\ServiceInterface');
        
        return new ViewController($service);
    }
}

