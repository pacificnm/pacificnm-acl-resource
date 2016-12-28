<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link      https://github.com/pacificnm/pacificnm-acl-resource for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license BSD-3-Clause
 */
namespace AclResource\Controller;

use Application\Controller\AbstractApplicationController;
use AclResource\Service\ServiceInterface;
use Zend\View\Model\ViewModel;

class DeleteController extends AbstractApplicationController
{
    /**
     *
     * @var ServiceInterface
     */
    protected $service;
    
    /**
     *
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }
    
    /**
     *
     *
     * {@inheritDoc}
     * @see \Application\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();
    
        $request = $this->getRequest();
        
        $id = $this->params()->fromRoute('id');
        
        $entity = $this->service->get($id);
        
        if (! $entity) {
            $this->flashmessenger()->addErrorMessage('Object was not found.');
            return $this->redirect()->toRoute('acl-resource-index');
        }
        
        if ($request->isPost()) {
            
            $del = $request->getPost('delete_confirmation', 'no');
            
            if ($del === 'yes') {
                
                $this->service->delete($entity);
                
                $this->getEventManager()->trigger('aclResourceDelete', $this, array(
                    'authId' => $this->identity() ->getAuthId(),
                    'requestUrl' => $this->getRequest()->getUri(),
                    'aclResourceEntity' => $entity
                ));
                
                $this->flashmessenger()->addSuccessMessage('Object was deleted');
                
                return $this->redirect()->toRoute('acl-resource-index');
            }
            
            return $this->redirect()->toRoute('acl-resource-view', array(
                'id' => $id
            ));
        }
        
        return new ViewModel(array(
            'entity' => $entity
        ));
    }
}

