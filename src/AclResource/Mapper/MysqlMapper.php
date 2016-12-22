<?php
namespace AclResource\Mapper;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Application\Mapper\AbstractMysqlMapper;
use AclResource\Entity\Entity;
use Zend\Hydrator\HydratorInterface;

class MysqlMapper extends AbstractMysqlMapper implements MysqlMapperInterface
{

    /**
     *
     * @param AdapterInterface $readAdapter            
     * @param AdapterInterface $writeAdapter            
     * @param HydratorInterface $hydrator            
     * @param Entity $prototype            
     */
    public function __construct(AdapterInterface $readAdapter, AdapterInterface $writeAdapter, HydratorInterface $hydrator, Entity $prototype)
    {
        $this->hydrator = $hydrator;
        
        $this->prototype = $prototype;
        parent::__construct($readAdapter, $writeAdapter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclResource\Mapper\MysqlMapperInterface::getAll()
     */
    public function getAll($filter)
    {
        $this->select = $this->readSql->select('acl_resource');
        
        $this->filter($filter);
        
        // if pagination is disabled
        if (array_key_exists('pagination', $filter)) {
            if ($filter['pagination'] == 'off') {
                return $this->getRows();
            }
        }
        
        return $this->getPaginator();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclResource\Mapper\MysqlMapperInterface::get()
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('acl_resource');
        
        $this->select->where(array(
            'acl_resource.acl_resource_id = ?' => $id
        ));
        
        return $this->getRow();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclResource\Mapper\MysqlMapperInterface::getResourceByName()
     */
    public function getResourceByName($aclResourceName)
    {
        $this->select = $this->readSql->select('acl_resource');
        
        $this->select->where(array(
            'acl_resource.acl_resource_name = ?' => $aclResourceName
        ));
        
        return $this->getRow();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclResource\Mapper\MysqlMapperInterface::save()
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
        
        // if we have id then its an update
        if ($entity->getAclResourceId()) {
            $this->update = new Update('acl_resource');
            
            $this->update->set($postData);
            
            $this->update->where(array(
                'acl_resource.acl_resource_id = ?' => $entity->getAclResourceId()
            ));
            
            $this->updateRow();
        } else {
            $this->insert = new Insert('acl_resource');
            
            $this->insert->values($postData);
            
            $id = $this->createRow();
            
            $entity->setAclResourceId($id);
        }
        
        return $this->get($entity->getAclResourceId());
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclResource\Mapper\MysqlMapperInterface::delete()
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('acl_resource');
        
        $this->delete->where(array(
            'acl_resource.acl_resource_id = ?' => $entity->getAclResourceId()
        ));
        
        return $this->deleteRow();
    }

    /**
     *
     * @param array $filter            
     * @return \AclResource\Mapper\MysqlMapper
     */
    protected function filter($filter)
    {
        if (array_key_exists('aclResourceName', $filter) && ! is_null($filter['aclResourceName'])) {
            $this->select->where->like('acl_resource.acl_resource_name', $filter['aclResourceName']. "%");
        }
        
        return $this;
    }
}