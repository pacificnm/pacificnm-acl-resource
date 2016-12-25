<?php
return array(
    'module' => array(
        'AclResource' => array(
            'name' => 'AclResource',
            'version' => '1.0.0',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/acl_resource.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'AclResource\Controller\ConsoleController' => 'AclResource\Controller\Factory\ConsoleControllerFactory',
            'AclResource\Controller\CreateController' => 'AclResource\Controller\Factory\CreateControllerFactory',
            'AclResource\Controller\DeleteController' => 'AclResource\Controller\Factory\DeleteControllerFactory',
            'AclResource\Controller\IndexController' => 'AclResource\Controller\Factory\IndexControllerFactory',
            'AclResource\Controller\RestController' => 'AclResource\Controller\Factory\RestControllerFactory',
            'AclResource\Controller\UpdateController' => 'AclResource\Controller\Factory\UpdateControllerFactory',
            'AclResource\Controller\ViewController' => 'AclResource\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'AclResource\Service\ServiceInterface' => 'AclResource\Service\Factory\ServiceFactory',
            'AclResource\Mapper\MysqlMapperInterface' => 'AclResource\Mapper\Factory\MysqlMapperFactory',
            'AclResource\Form\Form' => 'AclResource\Form\Factory\FormFactory'
        )
    ),
    'router' => array(
        'routes' => array(
            'acl-resource-create' => array(
                'pageTitle' => 'Acl Resource',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/acl-resource/create',
                    'defaults' => array(
                        'controller' => 'AclResource\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'acl-resource-delete' => array(
                'pageTitle' => 'Acl Resource',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/acl-resource/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'AclResource\Controller\DeleteController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'acl-resource-index' => array(
                'pageTitle' => 'Acl Resource',
                'pageSubTitle' => 'Home',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/acl-resource',
                    'defaults' => array(
                        'controller' => 'AclResource\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'acl-resource-rest' => array(
                'pageTitle' => 'Acl Resource',
                'pageSubTitle' => 'Rest',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/acl-resource[/:id]',
                    'defaults' => array(
                        'controller' => 'AclResource\Controller\RestController'
                    )
                )
            ),
            'acl-resource-update' => array(
                'pageTitle' => 'Acl Resource',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/acl-resource/update/[:id]',
                    'defaults' => array(
                        'controller' => 'AclResource\Controller\UpdateController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'acl-resource-view' => array(
                'pageTitle' => 'Acl Resource',
                'pageSubTitle' => 'View',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/acl-resource/view/[:id]',
                    'defaults' => array(
                        'controller' => 'AclResource\Controller\ViewController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            )
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'acl-resource-console-index' => array(
                    'options' => array(
                        'route' => 'acl-resource --list',
                        'defaults' => array(
                            'controller' => 'AclResource\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                ),
                'acl-resource-console-view' => array(
                    'options' => array(
                        'route' => 'acl-resource --view [--id=]',
                        'defaults' => array(
                            'controller' => 'AclResource\Controller\ConsoleController',
                            'action' => 'view'
                        )
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'view_helpers' => array(
        'factories' => array(
            'AclResourceSearchForm' => 'AclResource\View\Helper\Factory\AclResourceSearchFormFactory'
        )
    ),
    'acl' => array(
        'default' => array(
            'guest' => array(),
            'user' => array(),
            'administrator' => array(
                'acl-resource-index',
                'acl-resource-create',
                'acl-resource-update',
                'acl-resource-delete',
                'acl-resource-view'
            )
        )
    ),
    'menu' => array(
        'default' => array(
            array(
                'route' => 'admin-index',
                'name' => 'Admin',
                'icon' => 'fa fa-gear',
                'order' => 99,
                'active' => true,
                'items' => array()
            )
        )
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Admin',
                'route' => 'admin-index',
                'useRouteMatch' => true,
                'pages' => array(
                    array(
                        'label' => 'Acl Resource',
                        'route' => 'acl-resource-index',
                        'useRouteMatch' => true,
                        'pages' => array(
                            array(
                                'label' => 'View',
                                'route' => 'acl-resource-view',
                                'useRouteMatch' => true,
                                'pages' => array(
                                    array(
                                        'label' => 'Edit',
                                        'route' => 'acl-resource-update',
                                        'useRouteMatch' => true
                                    ),
                                    array(
                                        'label' => 'Delete',
                                        'route' => 'acl-resource-delete',
                                        'useRouteMatch' => true
                                    )
                                )
                            ),
                            array(
                                'label' => 'New',
                                'route' => 'acl-resource-create',
                                'useRouteMatch' => true
                            )
                        )
                    )
                )
            )
        )
    )
);
