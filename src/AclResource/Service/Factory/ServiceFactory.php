<?php
namespace AclResource\Service\Factory;

use AclResource\Service\Service;
use Zend\ServiceManager\ServiceLocatorInterface;

class ServiceFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \AclResource\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('AclResource\Mapper\MysqlMapperInterface');
        
        return new Service($mapper);
    }
}