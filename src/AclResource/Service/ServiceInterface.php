<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link      https://github.com/pacificnm/pacificnm-acl-resource for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license BSD-3-Clause
 */
namespace AclResource\Service;

use AclResource\Entity\Entity;

interface ServiceInterface
{

    /**
     *
     * @param array $filter            
     * @return Entity
     */
    public function getAll($filter);

    /**
     *
     * @param number $id            
     * @return Entity
     */
    public function get($id);
    
    /**
     *
     * @param string $aclResourceName
     * @return Entity
     */
    public function getResourceByName($aclResourceName);
    
    /**
     *
     * @param Entity $entity            
     * @return Entity
     */
    public function save(Entity $entity);

    /**
     *
     * @param Entity $entity            
     * @return boolean
     */
    public function delete(Entity $entity);
}