<?php

use Nette\Utils\Strings,
    Nette\Mail\Message;

class WarehousePresenter extends BasePresenter
{

    public function startup () 
    {
        parent::startup();
        $this->mustBeLoggedIn();
        $this->template->title = 'Sklad';
    }
    
    public function limit ()
    {
        $user = $this->getUser()->getIdentity(); 
        $limit = $this->context->createClients()
            ->getLimit($user->id_user);
        switch ($user->group_id) {
            case 5:
                $limit = 5 - $limit;
                break;
            case 9:
                $limit = 1 - $limit;
                break;
            case 6:
                $limit = 1 - $limit;
                break;
            default:
                $limit = 1000;  
        }
        return $limit;
    }

    public function renderDefault()
    {                                    
        $user = $this->getUser()->getIdentity(); 
        if ($this->isAjax()) {
            $this->invalidateControl('content'); 
            $this->template->warehouses = $this->context->createWarehouse()
                ->searchWarehouses($user->id_user, $_GET['search']);
        } else {
            $this->template->warehouses = $this->context->createWarehouse()
                ->getWarehouses($user->id_user);
            $this->template->limit = $this->limit();
        }
    }

    public function renderShow($id)
    {                                    
        $user = $this->getUser()->getIdentity();
        $warehouse = $this->context->createWarehouse()->getWarehouse($user->id_user, $id);
        if ($this->isAjax()) {
            $this->invalidateControl('content'); 
            $items = $this->context->createWarehouse()->searchItems($warehouse->id_warehouse, $_GET['search']);
        } else {
            $items = $this->context->createWarehouse()->getItems($warehouse->id_warehouse);
        }
        
        $this->template->warehouse = $warehouse;
        $this->template->items = $items;
        $this->template->limit = 1000;
    }
    
    public function renderEdit($id) 
    {                              
        $user = $this->getUser()->getIdentity();                                             
        if (isset($_POST['save'])) {              
            unset($_POST['save']);    
            $result = $this->context->createClients()
                ->updateClient($_POST, $user->id_user, $id);
            if ($result) {
                $this->template->msg = 'Klient byl uložen.';
            }
        } 
        $this->template->client = $this->context->createClients()
            ->where(array('parent_user_id' => $user->id_user, 'id_user' => $id, 'group_id'=>3))->limit('1')->fetch();
    }
    
    public function renderNew() 
    {        
        $limit = $this->limit();
        if ($limit == 0) exit;                      
        $user = $this->getUser()->getIdentity();                                             
        if (isset($_POST['new'])) {              
            unset($_POST['new']);  
            $_POST['user_id'] = $user->id_user;    
            $result = $this->context->createWarehouse()
                ->addWarehouse($_POST);
            if ($result) {
                $this->template->msg = 'Sklad byl přidán.';
            }
        } 
    }
    
    public function renderNewItem($id) 
    {        
        $limit = $this->limit();
        if ($limit == 0) exit;                      
        $user = $this->getUser()->getIdentity();  
        $warehouse = $this->context->createWarehouse()->getWarehouse($user->id_user, $id);
        $this->template->warehouse = $warehouse;                                           
        if (isset($_POST['new'])) {              
            unset($_POST['new']);  
            $_POST['user_id'] = $user->id_user;    
            $result = $this->context->createWarehouse()
                ->addWarehouse($_POST);
            if ($result) {
                $this->template->msg = 'Sklad byl přidán.';
            }
        } 
    }  
    
    public function renderDelete($id) 
    {     
        $user = $this->getUser()->getIdentity();
        $result = $this->context->createWarehouse()
            ->deleteWarehouse($user->id_user, $id);
        $this->redirect('Warehouse:default');
    }    

}
