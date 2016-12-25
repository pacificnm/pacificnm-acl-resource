<?php
namespace AclResource\Controller;

use Application\Controller\AbstractApplicationController;
use AclResource\Service\ServiceInterface;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractApplicationController
{
    /**
     *
     * @var ServiceInterface
     */
    protected $service;
    
    
    /**
     * 
     * @param ServiceInterface $service
     * @param Form $form
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
    
        $id = $this->params()->fromRoute('id');
        
        $entity = $this->service->get($id);
        
        if (! $entity) {
            $this->flashMessenger()->addErrorMessage('object was not found');
            
            return $this->redirect()->toRoute('acl-resource-index');
        }
        
        $this->getEventManager()->trigger('aclResourceView', $this, array(
            'authId' => $this->identity() ->getAuthId(),
            'requestUrl' => $this->getRequest()->getUri(),
            'aclResourceEntity' => $entity
        ));
        
        return new ViewModel(array(
            'entity' => $entity
        ));
    }
}

