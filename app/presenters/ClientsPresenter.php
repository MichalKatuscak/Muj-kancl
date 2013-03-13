<?php

use Nette\Utils\Strings,
    Nette\Mail\Message;

/**
 * Clients presenter
 *
 * @author     Michal Katuščák
 */
class ClientsPresenter extends BasePresenter
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
        $limit = $this->context->createClients()
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
        if ($this->isAjax()) {
            $this->invalidateControl('content'); 
            $this->template->clients = $this->context->createClients()
                ->search($user->id_user, 3, $_GET['search']);
        } else {
            $this->template->clients = $this->context->createClients()
                ->getClients($user->id_user);
            $this->template->limit = $this->limit();
        }
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
            $_POST['group_id'] = 3;    
            $result = $this->context->createClients()
                ->addClient($_POST, $user->id_user);
            if ($result) {
                $this->template->msg = 'Klient byl přidán.';
            }
        } 
    }  
    
    public function renderGenerate($id)
    {
        $user = $this->context->createUsers()
                ->getUser($id);
        $login = substr(Strings::webalize($user->last_name),0,4);

        $delka_hesla = 4;
        $skupina_znaku = 'abcdefghijklmnopqrstuvwxyz123456789';
        $vystup = $login;
        $pocet_znaku = strlen($skupina_znaku)-1;
        for ($i=0;$i<$delka_hesla;$i++) {
            $vystup .= $skupina_znaku[mt_rand(0,$pocet_znaku)];
        }
        $login = $vystup;

        $delka_hesla = 8;
        $vystup = '';
        $pocet_znaku = strlen($skupina_znaku)-1;
        for ($i=0;$i<$delka_hesla;$i++) {
            $vystup .= $skupina_znaku[mt_rand(0,$pocet_znaku)];
        }
        $heslo = $vystup;

        $this->context->createUsers()
                ->newLogin($id, $login, $heslo);

        $mail = new Message;
        $mail->setFrom('Můj kancl <no-reply@mujkancl.cz>')
            ->addTo($user->email)
            ->setSubject('Nové přihlašovací údaje')
            ->setBody("Dobrý den,\n\nbyly Vám vygenerovány nové přihlašovací údaje:\n\nJméno: \"$login\"\nHeslo: \"$heslo\"\n\nPřihlásit se můžete na této stránce: http://app.mujkancl.cz/\n\nTvůrce služby,\nMichal Katuščák.")
            ->send();
        //echo "<pre>Dobrý den,\n\nbyly Vám vygenerovány nové přihlašovací údaje:\n\nJméno: \"$login\"\nHeslo: \"$heslo\"\n\nPřihlásit se můžete na této stránce: http://app.mujkancl.cz/\n\nTvůrce služby,\nMichal Katuščák.</pre>";

        $this->redirect('default');
    }
    
    public function renderDelete($id) 
    {     
        $user = $this->getUser()->getIdentity();
        $result = $this->context->createClients()
            ->deleteClient($user->id_user, $id);
        $this->redirect('Clients:default');
    }

}
