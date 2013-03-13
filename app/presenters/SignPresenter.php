<?php

use Nette\Application\UI,
	Nette\Security as NS;


/**
 * Sign in/out presenters.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class SignPresenter extends BasePresenter
{

    public function renderDefault ($username,$password) {
        if (isset($_POST['username']) && isset($_POST['password'])
        && $_POST['username'] != '' && $_POST['password'] != '') {
            $this->signInFormSubmitted ($_POST['username'], $_POST['password'], @$_POST['remember']);
        }
        if (isset($username)) $this->template->username = $_GET['username'];
        if (isset($password)) $this->template->password = $_GET['password'];
    }



    public function signInFormSubmitted ($username, $password, $remember = 0)
    {
        try {
            if ($remember) {
                $this->getUser()->setExpiration('+ 14 days', FALSE);
            } else {
                $this->getUser()->setExpiration('+ 20 minutes', TRUE);
            }
            $this->getUser()->login($username, $password);
            $this->redirect('Homepage:');

        } catch (NS\AuthenticationException $e) {
            $this->template->msg = 'Nepodařilo se přihlásit.';
        }
    }



    public function renderLogout()
    {
        $this->getUser()->logout();
        $this->template->msg = 'Byl jste odhlášen.';
        $this->redirect('default');
    }

}
