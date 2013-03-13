<?php

use Nette\Utils\Strings,
    Nette\Mail\Message;

/**
 * Homepage presenter.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class HomepagePresenter extends BasePresenter
{

    public function startup ()
    {
        parent::startup();
        $this->mustBeLoggedIn(); 
        $this->template->title = 'Nástěnka';  
        $user = $this->getUser()->getIdentity();
        if ($user->group_id == 3) { // Clients
            $this->redirect('Projects:default');
        }
        elseif ($user->group_id != 1) { // Others
            $this->redirect('Summary:default');
        }
        
    }

  	public function renderDefault()
  	{                          
        $this->template->notPay = $this->context->createUsers()
                ->getKanclUsers();
  	}
  	
  	public function renderBlock ($id)
  	{
        $user = $this->context->createUsers()
                ->getUser($id);
        $bit = $user->blocked?0:1;         
        $this->context->createUsers()
                ->blockUser($id, $bit);
        $this->redirect('default');
    }
  	
    /**
     * Generation new username and password for user
     * @param int $id User ID
     */
    public function renderGen ($id)
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

        $this->redirect('default');
        //echo ("DobrĂ˝ den,\n\nbyly VĂˇm vygenerovĂˇny novĂ© pĹ™ihlaĹˇovacĂ­ Ăşdaje:\n\nJmĂ©no: \"$login\"\nHeslo: \"$heslo\"\n\nPĹ™ihlĂˇsit se mĹŻĹľete na tĂ©to strĂˇnce: http://app.mujkancl.cz/\n\nTvĹŻrce sluĹľby,\nMichal KatuĹˇÄŤĂˇk.");
            
    }
  	
    public function renderExtend ($id)
    {
        $user = $this->context->createUsers()
                ->getUser($id);
        $time = strtotime($user->paid_to); 
        if ($user->paid_to < date("Y-m-d H:i:s",time())) {      
            $time = time();
        }               
        $new_time = $time+(365*24*60*60);  
        $this->context->createUsers()
                ->setUserAsPay($id, $new_time);
        $this->redirect('default');
    }

}
