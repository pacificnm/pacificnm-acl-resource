<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link      https://github.com/pacificnm/pacificnm-acl-resource for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license BSD-3-Clause
 */
namespace Pacificnm\AclResource\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\AclResource\Controller\CreateController;

class CreateControllerFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \AclResource\Controller\CreateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\AclResource\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('Pacificnm\AclResource\Form\Form');
        
        return new CreateController($service, $form);
    }
}

