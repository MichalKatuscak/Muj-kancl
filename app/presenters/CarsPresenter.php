<?php

/**
 * @author     Michal Katuščák
 */
class CarsPresenter extends BasePresenter
{

    public function startup () 
    {
        parent::startup();
        $this->mustBeLoggedIn();
        $this->template->title = 'Klienti';
    }
    
    public function limit ()
    {
        $user = $this->getUser()->getIdentity(); 
        $limit = $this->context->createCars()
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
        $this->template->clients = $this->context->createCars()
            ->where(array('parent_user_id' => $user->id_user, 'group_id'=>3))->order('last_name'); 
        $this->template->limit = $this->limit();
    }
    
    public function renderEdit($id) 
    {                              
        $user = $this->getUser()->getIdentity();                                             
        if (isset($_POST['save'])) {              
            unset($_POST['save']);    
            $result = $this->context->createCars()
                ->updateClient($_POST, $user->id_user, $id);
            if ($result) {
                $this->template->msg = 'Klient byl uložen.';
            }
        } 
        $this->template->client = $this->context->createCars()
            ->where(array('parent_user_id' => $user->id_user, 'id_user' => $id, 'group_id'=>3))->limit('1')->fetch();
    }
    
    public function renderNew() 
    {        
        $limit = $this->limit();
        if ($limit == 0) exit;                      
        $user = $this->getUser()->getIdentity();                                             
        if (isset($_POST['new'])) {              
            unset($_POST['new']);  
            $_POST['group_id'] = 3;    
            $result = $this->context->createCars()
                ->addClient($_POST, $user->id_user);
            if ($result) {
                $this->template->msg = 'Klient byl přidán.';
            }
        } 
    }                         
    
    public function renderDelete($id) 
    {     
        $user = $this->getUser()->getIdentity();
        $result = $this->context->createCars()
            ->deleteClient($user->id_user, $id);
        $this->redirect('Clients:default');
    }

}
