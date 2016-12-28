<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link      https://github.com/pacificnm/pacificnm-acl-resource for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license BSD-3-Clause
 */
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