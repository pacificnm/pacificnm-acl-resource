<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link      https://github.com/pacificnm/pacificnm-acl-resource for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license BSD-3-Clause
 */
namespace Pacificnm\AclResource;

class Module
{
    public function getConsoleUsage()
    {
        return array(
            'acl-resource --list' => 'lists all Acl Resources',
            'acl-resource --view [--id=]' => 'gets a single Acl Resource by its id'
        );
    }
    
    
    public function getConfig()
    {
        return include __DIR__ . '/../config/pacificnm.acl-resource.global.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/'
                )
            )
        );
    }
}
