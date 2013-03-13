<?php

/**
 * Homepage presenter.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class SuppliersPresenter extends BasePresenter
{

    public function startup () 
    {
        parent::startup();
        $this->mustBeLoggedIn();
        $this->template->title = 'Dodavatelé';
    }
    
    public function limit ()
    {
        $user = $this->getUser()->getIdentity(); 
        $limit = $this->context->createSuppliers()
            ->getLimit($user->id_user);
        switch ($user->group_id) {
            case 5:
                $limit = 20 - $limit;
                break;
            case 9:
                $limit = 5 - $limit;
                break;
            case 6:
                $limit = 5 - $limit;
                break;
            default:
                $limit = 1000;  
        }
        return $limit;
    }

    public function renderDefault()
    {                                    
        $user = $this->getUser()->getIdentity();
        if ($user->group_id == 3) return false;   
        if ($this->isAjax()) {
            $this->invalidateControl('content'); 
            $this->template->clients = $this->context->createSuppliers()
                ->search($user->id_user, 4, $_GET['search']);
        } else {
            $this->template->clients = $this->context->createSuppliers()
                ->getSuppliers($user->id_user);
            $this->template->limit = $this->limit();
        }
    }
    
    public function renderEdit($id) 
    {                              
        $user = $this->getUser()->getIdentity();                                             
        if (isset($_POST['save'])) {              
            unset($_POST['save']);    
            $result = $this->context->createSuppliers()
                ->updateSupplier($_POST, $user->id_user, $id);
            if ($result) {
                $this->template->msg = 'Dodavatel byl uložen.';
            }
        } 
        $this->template->client = $this->context->createSuppliers()
            ->where(array('parent_user_id' => $user->id_user, 'id_user' => $id, 'group_id'=>4))->limit('1')->fetch();
    }
    
    public function renderNew() 
    {        
        $limit = $this->limit();
        if ($limit == 0) exit;                      
        $user = $this->getUser()->getIdentity();  
        if ($user->group_id == 3) return false;                                             
        if (isset($_POST['new'])) {              
            unset($_POST['new']);
            $_POST['group_id'] = 4;    
            $result = $this->context->createSuppliers()
                ->addSupplier($_POST, $user->id_user);
            if ($result) {
                $this->template->msg = 'Dodavatel byl přidán.';
            }
        } 
    }                         
    
    public function renderDelete($id) 
    {     
        $user = $this->getUser()->getIdentity();
        $result = $this->context->createSuppliers()
            ->deleteSupplier($user->id_user, $id);
        $this->redirect('Suppliers:default');
    }

}
