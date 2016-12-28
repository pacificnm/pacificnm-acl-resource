<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link      https://github.com/pacificnm/pacificnm-acl-resource for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license BSD-3-Clause
 */
namespace AclResource\Service;

use AclResource\Mapper\MysqlMapperInterface;
use AclResource\Entity\Entity;

class Service implements ServiceInterface
{

    /**
     *
     * @var MysqlMapperInterface
     */
    protected $mapper;

    /**
     *
     * @param MysqlMapperInterface $mapper            
     */
    public function __construct(MysqlMapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclResource\Service\ServiceInterface::getAll()
     */
    public function getAll($filter)
    {
        return $this->mapper->getAll($filter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclResource\Service\ServiceInterface::get()
     */
    public function get($id)
    {
        return $this->mapper->get($id);
    }

    /**
     *
     * @param string $aclResourceName            
     * @return Entity
     */
    public function getResourceByName($aclResourceName)
    {
        return $this->mapper->getResourceByName($aclResourceName);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclResource\Service\ServiceInterface::save()
     */
    public function save(Entity $entity)
    {
        return $this->mapper->save($entity);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclResource\Service\ServiceInterface::delete()
     */
    public function delete(Entity $entity)
    {
        return $this->mapper->delete($entity);
    }
}