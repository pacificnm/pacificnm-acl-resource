<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link      https://github.com/pacificnm/pacificnm-acl-resource for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license BSD-3-Clause
 */
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