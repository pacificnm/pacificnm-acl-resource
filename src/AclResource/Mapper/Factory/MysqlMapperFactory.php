<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link      https://github.com/pacificnm/pacificnm-acl-resource for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license BSD-3-Clause
 */
namespace AclResource\Mapper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use AclResource\Mapper\MysqlMapper;
use AclResource\Hydrator\Hydrator;
use AclResource\Entity\Entity;


class MysqlMapperFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \AclResource\Mapper\MysqlMapper
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        
        $hydrator = new AggregateHydrator();
        
        $hydrator->add(new Hydrator());
        
        $prototype = new Entity();
        
        $readAdapter = $serviceLocator->get('db1');
        
        $writeAdapter = $serviceLocator->get('db2');
        
        return new MysqlMapper($readAdapter, $writeAdapter, $hydrator, $prototype);
    }
}