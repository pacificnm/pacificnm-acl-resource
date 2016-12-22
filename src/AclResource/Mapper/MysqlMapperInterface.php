<?php
namespace AclResource\Mapper;

use AclResource\Entity\Entity;
use Zend\Paginator\Paginator;

interface MysqlMapperInterface
{

    /**
     *
     * @param array $filter            
     * @return Paginator
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