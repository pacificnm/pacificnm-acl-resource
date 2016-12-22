<?php
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