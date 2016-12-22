<?php
namespace AclResource\View\Helper;

use Zend\View\Helper\AbstractHelper;

class AclResourceSearchForm extends AbstractHelper
{
    public function __construct()
    {
        
    }
    
    /**
     * 
     * @param array $queryParams
     */
    public function __invoke(array $queryParams = array())
    {
        $view = $this->getView();
        
        $partialHelper = $view->plugin('partial');
        
        $data = new \stdClass();
        
        $data->queryParams = $queryParams;
        
        return $partialHelper('partials/acl-resource-search-form.phtml', $data);
    }
}

