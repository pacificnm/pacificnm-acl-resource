<?php
namespace AclResource\Entity;

class Entity
{

    /**
     *
     * @var string
     */
    protected $aclResourceId;

    /**
     *
     * @var string
     */
    protected $aclResourceName;

    /**
     *
     * @return the $aclResourceId
     */
    public function getAclResourceId()
    {
        return $this->aclResourceId;
    }

    /**
     *
     * @return the $aclResourceName
     */
    public function getAclResourceName()
    {
        return $this->aclResourceName;
    }

    /**
     *
     * @param string $aclResourceId            
     */
    public function setAclResourceId($aclResourceId)
    {
        $this->aclResourceId = $aclResourceId;
    }

    /**
     *
     * @param string $aclResourceName            
     */
    public function setAclResourceName($aclResourceName)
    {
        $this->aclResourceName = $aclResourceName;
    }
}