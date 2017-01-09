<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link      https://github.com/pacificnm/pacificnm-acl-resource for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license BSD-3-Clause
 */
return array(
    'module' => array(
        'AclResource' => array(
            'name' => 'AclResource',
            'version' => '1.0.6',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/acl_resource.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Pacificnm\AclResource\Controller\ConsoleController' => 'Pacificnm\AclResource\Controller\Factory\ConsoleControllerFactory',
            'Pacificnm\AclResource\Controller\CreateController' => 'Pacificnm\AclResource\Controller\Factory\CreateControllerFactory',
            'Pacificnm\AclResource\Controller\DeleteController' => 'Pacificnm\AclResource\Controller\Factory\DeleteControllerFactory',
            'Pacificnm\AclResource\Controller\IndexController' => 'Pacificnm\AclResource\Controller\Factory\IndexControllerFactory',
            'Pacificnm\AclResource\Controller\RestController' => 'Pacificnm\AclResource\Controller\Factory\RestControllerFactory',
            'Pacificnm\AclResource\Controller\UpdateController' => 'Pacificnm\AclResource\Controller\Factory\UpdateControllerFactory',
            'Pacificnm\AclResource\Controller\ViewController' => 'Pacificnm\AclResource\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Pacificnm\AclResource\Service\ServiceInterface' => 'Pacificnm\AclResource\Service\Factory\ServiceFactory',
            'Pacificnm\AclResource\Mapper\MysqlMapperInterface' => 'Pacificnm\AclResource\Mapper\Factory\MysqlMapperFactory',
            'Pacificnm\AclResource\Form\Form' => 'Pacificnm\AclResource\Form\Factory\FormFactory'
        )
    ),
    'router' => array(
        'routes' => array(
            'acl-resource-create' => array(
                'pageTitle' => 'Acl Resource',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'icon' => 'fa fa-lock',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/acl-resource/create',
                    'defaults' => array(
                        'controller' => 'Pacificnm\AclResource\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'acl-resource-delete' => array(
                'pageTitle' => 'Acl Resource',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'icon' => 'fa fa-lock',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/acl-resource/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\AclResource\Controller\DeleteController',
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
                'icon' => 'fa fa-lock',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/acl-resource',
                    'defaults' => array(
                        'controller' => 'Pacificnm\AclResource\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'acl-resource-rest' => array(
                'pageTitle' => 'Acl Resource',
                'pageSubTitle' => 'Rest',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'icon' => 'fa fa-lock',
                'layout' => 'rest',
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/acl-resource[/:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\AclResource\Controller\RestController'
                    )
                )
            ),
            'acl-resource-update' => array(
                'pageTitle' => 'Acl Resource',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'icon' => 'fa fa-lock',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/acl-resource/update/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\AclResource\Controller\UpdateController',
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
                'icon' => 'fa fa-lock',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/acl-resource/view/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\AclResource\Controller\ViewController',
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
                            'controller' => 'Pacificnm\AclResource\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                ),
                'acl-resource-console-view' => array(
                    'options' => array(
                        'route' => 'acl-resource --view [--id=]',
                        'defaults' => array(
                            'controller' => 'Pacificnm\AclResource\Controller\ConsoleController',
                            'action' => 'view'
                        )
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'controller_map' => array(
            'Pacificnm\AclResource' => true
        ),
        'template_map' => array(
            'pacificnm/acl-resource/create/index' => __DIR__ . '/../view/acl-resource/create/index.phtml',
            'pacificnm/acl-resource/delete/index' => __DIR__ . '/../view/acl-resource/delete/index.phtml',
            'pacificnm/acl-resource/index/index' => __DIR__ . '/../view/acl-resource/index/index.phtml',
            'pacificnm/acl-resource/update/index' => __DIR__ . '/../view/acl-resource/update/index.phtml',
            'pacificnm/acl-resource/view/index' => __DIR__ . '/../view/acl-resource/view/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'view_helpers' => array(
        'factories' => array(
            'AclResourceSearchForm' => 'Pacificnm\AclResource\View\Helper\Factory\AclResourceSearchFormFactory'
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
                'location' => 'left',
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
