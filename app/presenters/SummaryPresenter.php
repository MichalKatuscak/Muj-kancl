<?php

/**
 * @author     Michal Katuščák
 */
class SummaryPresenter extends BasePresenter
{

    public function startup () 
    {
        parent::startup();
        $this->mustBeLoggedIn();
        $this->template->title = 'Přehled';
    }

    public function renderDefault()
    {                                    
        $user = $this->getUser()->getIdentity(); 
        $invoices = $this->context->createInvoices()->getInvoicesV($user->id_user);
        $this->template->num_invoices = count($invoices);
        $this->template->num_invoices_paid = 0;
        $this->template->num_invoices_unpaid = 0;
        $this->template->num_invoices_unpaid_warning = 0;
        $this->template->price_invoices_paid = 0;
        $this->template->price_invoices_unpaid = 0;
        $this->template->price_invoices_unpaid_warning = 0;
        
        $months = $this->getMonthNames();
        
        foreach ($invoices as $invoice) {
            if ($invoice->zaplaceno == 1) {
                $this->template->num_invoices_paid++;
                $this->template->price_invoices_paid += $invoice->celkem;
            } else if ($invoice->zaplaceno == 0 && strtotime($invoice->splatnost) > time()) {
                $this->template->num_invoices_unpaid++;
                $this->template->price_invoices_unpaid += $invoice->celkem;
            } else {
                $this->template->num_invoices_unpaid_warning++;
                $this->template->price_invoices_unpaid_warning += $invoice->celkem;
            }
            
            $month = date('m',strtotime($invoice->vystaveni));
            
            $months[$month]['price'] += $invoice->celkem;
            $months[$month]['invoices']++;
        }
        ksort($months);
        
        $max_price = 0;
        foreach ($months as $month) {
            if ($max_price < $month['price']) {
                $max_price = $month['price'];
            }
        }
        foreach ($months as $key=>$month) {
            if ($max_price == 0) $months[$key]['point'] = 100; 
            else $months[$key]['point'] = 100-round($month['price']/$max_price*100);
        }
        
        $this->template->months = $months;
        $this->template->max_price = $max_price;
        
        // ToDo
        if (isset($_POST['newTODO'])) {
            unset ($_POST['newTODO']);
            $_POST['user_id'] = $user->id_user;
            $this->context->createTodo()->addItem($_POST);
            $this->redirect('default');
        }
        
        
        $this->template->todo = $this->context->createTodo()->getList($user->id_user);
        
    }
    
    /*
     * Get months names
     */
    private function getMonthNames ()
    {
        return Array(
            '01' => Array(
                    'price' => 0,
                    'invoices' => 0,
                    'month' => 'leden'
            ), 
            '02' => Array(
                    'price' => 0,
                    'invoices' => 0,
                    'month' => 'únor'
            ), 
            '03' => Array(
                    'price' => 0,
                    'invoices' => 0,
                    'month' => 'březen'
            ), 
            '04' => Array(
                    'price' => 0,
                    'invoices' => 0,
                    'month' => 'duben'
            ), 
            '05' => Array(
                    'price' => 0,
                    'invoices' => 0,
                    'month' => 'květen'
            ), 
            '06' => Array(
                    'price' => 0,
                    'invoices' => 0,
                    'month' => 'červen'
            ), 
            '07' => Array(
                    'price' => 0,
                    'invoices' => 0,
                    'month' => 'červenec'
            ), 
            '08' => Array(
                    'price' => 0,
                    'invoices' => 0,
                    'month' => 'srpen'
            ), 
            '09' => Array(
                    'price' => 0,
                    'invoices' => 0,
                    'month' => 'září'
            ), 
            '10' => Array(
                    'price' => 0,
                    'invoices' => 0,
                    'month' => 'říjen'
            ), 
            '11' => Array(
                    'price' => 0,
                    'invoices' => 0,
                    'month' => 'listopad'
            ), 
            '12' => Array(
                    'price' => 0,
                    'invoices' => 0,
                    'month' => 'prosinec'
            ), 
        );
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
        $result = $this->context->createTODO()
            ->deleteItem($user->id_user, $id);
        $this->redirect('Summary:default');
    }

}
