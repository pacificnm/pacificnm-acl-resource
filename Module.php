<?php
namespace AclResource;

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
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }
}
