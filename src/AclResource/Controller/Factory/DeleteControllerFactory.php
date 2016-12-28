<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link      https://github.com/pacificnm/pacificnm-acl-resource for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license BSD-3-Clause
 */
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

