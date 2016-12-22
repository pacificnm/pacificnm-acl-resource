<?php
namespace AclResource\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Console\Adapter\AdapterInterface;
use RuntimeException;
use Zend\Console\Request as ConsoleRequest;
use AclResource\Service\ServiceInterface;

class ConsoleController extends AbstractActionController
{

    /**
     *
     * @var ServiceInterface
     */
    protected $service;

    /**
     *
     * @var AdapterInterface
     */
    protected $console;

    /**
     *
     * @param ServiceInterface $service            
     */
    public function __construct(AdapterInterface $console, ServiceInterface $service)
    {
        $this->service = $service;
        
        $this->console = $console;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Application\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        $request = $this->getRequest();
        
        // validate we are in a console
        if (! $request instanceof ConsoleRequest) {
            throw new RuntimeException('Cannot handle request of type ' . get_class($request));
        }
        
        $table = new \Zend\Text\Table\Table(array(
            'columnWidths' => array(
                20,
                30
            )
        ));
        
        $entitys = $this->service->getAll(array(
            'pagination' => 'off'
        ));
        
        $table->appendRow(array(
            'ACL Resource Id',
            'ACL Resource Name'
        ));
        
        foreach ($entitys as $entity) {
            $table->appendRow(array(
                $entity->getAclResourceId(),
                $entity->getAclResourceName()
            ));
        }
        
        echo $table;
        
        $end = date('m/d/Y h:i a', time());
        
        $this->console->write("Completed acl resource list at {$end}\n");
    }
    
    public function viewAction()
    {
        $request = $this->getRequest();
        
        // validate we are in a console
        if (! $request instanceof ConsoleRequest) {
            throw new RuntimeException('Cannot handle request of type ' . get_class($request));
        }
        
        $id = $this->params('id');
        
        $entity = $this->service->get($id);
        
        if (! $entity) {
            throw new \RuntimeException('Object not found');
        }
        
        
        $table = new \Zend\Text\Table\Table(array(
            'columnWidths' => array(
                20,
                30
            )
        ));
        
        $table->appendRow(array(
            'ACL Resource Id',
            'ACL Resource Name'
        ));
        
        $table->appendRow(array(
            $entity->getAclResourceId(),
            $entity->getAclResourceName()
        ));
        
        echo $table;
        
        $end = date('m/d/Y h:i a', time());
        
        $this->console->write("Completed acl resource view at {$end}\n");
    }
}

