<?php

/**
 * Base class for all application presenters.
 *
 * @author     John Doe
 * @package    MyApplication
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    public function mustBeLoggedIn () 
    {
        $user = $this->getUser();
        if (!$user->isLoggedIn()) {
            $this->redirect('Sign:');
        }
        $this->template->user = $this->getUser()->getIdentity(); 
    }
}
