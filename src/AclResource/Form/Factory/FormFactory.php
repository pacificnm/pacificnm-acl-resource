<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link      https://github.com/pacificnm/pacificnm-acl-resource for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license BSD-3-Clause
 */
namespace AclResource\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclResource\Form\Form;

class FormFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \AclResource\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        return new Form();
    }
}

