<?php

/**
 * Homepage presenter.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class SettingsPresenter extends BasePresenter
{

    public function startup () 
    {
      parent::startup();
      $this->mustBeLoggedIn();
    	    $this->template->title = 'Nastavení';
      if ($this->template->user->group_id == 9) {
        if ($this->param['action'] != 'default') exit;
        $this->template->msg = 'Jako demo uživatel nemáte právo upravit svoje údaje';
      }
    }
    
    public function renderDefault() 
    {                              
        $user = $this->getUser()->getIdentity();
        $id = $user->id_user;                                             
        if (isset($_POST['save'])) {
                // New password
            if ($_POST['old-password'] == '') {
                $this->template->msg = 'Musíte zadat vaše stávající heslo.';
                goto ReturnFalse;
            }
            if (md5($_POST['old-password']) != $user->password) {
                $this->template->msg =  'Bylo vyplněno špatné stávající heslo.';
                goto ReturnFalse;
            }
            if ($_POST['new-password'] != '') {
                $_POST['password'] = md5($_POST['new-password']);
            }
            unset($_POST['save']);             
            unset($_POST['old-password']);             
            unset($_POST['new-password']);    
            $result = $this->context->createClients()
                ->updateClient($_POST, 2, $id);  // Parent Michal Katuščák - 2
            if ($result) {
                $this->template->msg = 'Údaje uloženy.';
            }
        } 
        ReturnFalse:
        $this->template->client = $this->context->createClients()
            ->where(array('id_user' => $id))->limit('1')->fetch();
    }
       

}
