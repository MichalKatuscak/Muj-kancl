<?php

/** @author Michal Katuščák */

use Nette\Application\UI\Form;

class ProjectsPresenter extends BasePresenter
{

    public function startup () 
    {
        parent::startup();
        $this->mustBeLoggedIn();
        $this->template->title = 'Projekty';
        $this->template->aj = array("January","February","March","April","May","June","July","August","September","October","November","December");
        $this->template->cz = array("ledna","února","března","dubna","května","června","července","srpna","září","října","listopadu","prosince");
        
    }
    
    public function limit ()
    {
        $user = $this->getUser()->getIdentity(); 
        $limit = $this->context->createProjects()
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
        $this->template->projects = $this->context->createProjects()->getProjects($user->id_user);
        $this->template->limit = $this->limit();
        
        $projects = $this->context->createProjects()->getProjects($user->id_user);
        if ($user->group_id == 3 && count($projects) >= 1) {
            foreach($projects as $project) {
                $this->redirect('Projects:show',$project->id_project);
            }
        }
    }
    
    public function renderTaskAsPaid ($project_id, $task_id, $paid) {
        $paid = (int) !$paid; // 1=>0 0=>1
        $user = $this->getUser()->getIdentity();
        $project = $this->context->createProjects()->getProject($user->id_user, $project_id); 
        $this->context->createProjects()->taskAsPaid($project->id_project, $task_id, $paid); 
        $this->redirect('Projects:show',$project->id_project);
    }
    
    public function renderShow($project_id)
    {
        $user = $this->getUser()->getIdentity();
        $this->template->project = $this->context->createProjects()->getProject($user->id_user, $project_id); 
        $this->template->tasks = $this->context->createProjects()->getTasks($project_id);
        
        $level0 = 0;
        $level1 = 0;
        $level2 = 0;
        
        
        $months = Array(
            '01' => Array(
                    'count' => 0,
                    'tasks' => 0,
                    'month' => 'leden'
            ), 
            '02' => Array(
                    'count' => 0,
                    'tasks' => 0,
                    'month' => 'únor'
            ), 
            '03' => Array(
                    'count' => 0,
                    'tasks' => 0,
                    'month' => 'březen'
            ), 
            '04' => Array(
                    'count' => 0,
                    'tasks' => 0,
                    'month' => 'duben'
            ), 
            '05' => Array(
                    'count' => 0,
                    'tasks' => 0,
                    'month' => 'květen'
            ), 
            '06' => Array(
                    'count' => 0,
                    'tasks' => 0,
                    'month' => 'červen'
            ), 
            '07' => Array(
                    'count' => 0,
                    'tasks' => 0,
                    'month' => 'červenec'
            ), 
            '08' => Array(
                    'count' => 0,
                    'tasks' => 0,
                    'month' => 'srpen'
            ), 
            '09' => Array(
                    'count' => 0,
                    'tasks' => 0,
                    'month' => 'září'
            ), 
            '10' => Array(
                    'count' => 0,
                    'tasks' => 0,
                    'month' => 'říjen'
            ), 
            '11' => Array(
                    'count' => 0,
                    'tasks' => 0,
                    'month' => 'listopad'
            ), 
            '12' => Array(
                    'count' => 0,
                    'tasks' => 0,
                    'month' => 'prosinec'
            ), 
        );
        
        foreach ( $this->context->createProjects()->getTasks($project_id) as $task) {
            if ($task->condition == 2) $level2++;
            elseif ($task->condition == 1) $level1++;
            else $level0++;
            
            $month = date('m',strtotime($task->entered));
            
            $months[$month]['count'] += strtotime($task->end_work)-strtotime($task->start_work);
            $months[$month]['tasks']++;
        }
        
        $this->template->level0 = $level0;
        $this->template->level1 = $level1;
        $this->template->level2 = $level2;
        ksort($months);
        
        $max_count = 0;
        foreach ($months as $month) {
            if ($max_count < $month['tasks']) {
                $max_count = $month['tasks'];
            }
        }
        /* Sekundy
        foreach ($months as $month) {
            if ($max_count < $month['count']) {
                $max_count = $month['count'];
            }
        }
        foreach ($months as $key=>$month) {
            if ($max_count == 0) $months[$key]['point'] = 100; 
            else $months[$key]['point'] = 100-round($month['count']/$max_count*100);
        }
        */
        // Počet
        foreach ($months as $key=>$month) {
            if ($max_count == 0) $months[$key]['point'] = 100; 
            else $months[$key]['point'] = 100-round($month['tasks']/$max_count*100);
        }
        $this->template->months = $months;
        $this->template->max_count = $max_count;
    }
    
    public function renderEdit($id) 
    {     
        $user = $this->getUser()->getIdentity();
        if ($user->group_id == 3) return false;
        
        if (isset($_POST['edit'])) {              
            unset($_POST['edit']);
            $_POST['user_id'] = $user->id_user;
            $result = $this->context->createProjects()
                ->editProject($id, $_POST);
            if ($result) {
                $this->template->msg = 'Projekt byl upraven.';
            }
        } 
        
        $this->template->project = $this->context->createProjects()->getProject($user->id_user, $id); 
        $this->template->clients = $this->context->createClients()->getClients($user->id_user);
    }
    
    public function renderNew() 
    {      
        $user = $this->getUser()->getIdentity();
        $limit = $this->limit();  
        if ($limit == 0) exit;  
        if ($user->group_id == 3) return false;                    
        $user = $this->getUser()->getIdentity();
        
        $this->template->clients = $this->context->createClients()->getClients($user->id_user);

        if (isset($_POST['new'])) {              
            unset($_POST['new']);
            $_POST['user_id'] = $user->id_user;
            $result = $this->context->createProjects()
                ->addProject($_POST);
            if ($result) {
                $this->template->msg = 'Projekt byl přidán.';
            }
        } 
    } 
    
    public function renderNewBug($task_id, $project_id)
    {
        $user = $this->getUser()->getIdentity();
        $this->template->project = $this->context->createProjects()->getProject($user->id_user, $project_id); 
        $this->template->task = $this->context->createProjects()->getTask($task_id, $project_id);
        
        if (isset($_POST['new'])) {
            if ($this->context->createProjects()->addBug($_POST['bug'],$task_id)) {
                $this->template->msg = 'Chyba byla přidána.';
            }
        }
    }
    
    public function renderNewFile($task_id, $project_id)
    {
        $user = $this->getUser()->getIdentity();
        $this->template->project = $this->context->createProjects()->getProject($user->id_user, $project_id); 
        $this->template->task = $this->context->createProjects()->getTask($task_id, $project_id);
        $this->template->bugs = $this->context->createProjects()->getBugs($task_id, $project_id);
        
        if (isset($_POST['new'])) {
            $dir = __DIR__.'/../../../files/'.sha1($task_id);
            $file = '/'.sha1($_FILES['file']['name'].microtime()).'.zip';
            if (!is_dir($dir)) mkdir($dir,0777);
            if (!is_dir($dir)) {
                $this->template->msg = 'Soubor nebylo možné uložit. Složka neexistuje';
                return false;
            }
            if (!in_array($_FILES['file']['type'],array(
                'application/zip','application/octet-stream','application/x-zip','application/x-zip-compressed'
            ))) {
                $this->template->msg = 'Soubor musí být v archívu ZIP.';
                return false;
            }
            if (move_uploaded_file($_FILES['file']['tmp_name'], $dir.$file)) {
                if ((isset($_POST['bugs']) && $description = $this->context->createProjects()->setBugsAsFixed($_POST['bugs'],$task_id)) || (!isset($_POST['bugs']) && $description = true))
                    if ($this->context->createProjects()->addFile($file,$task_id,$description)) 
                        $this->template->msg = 'Soubor byl přidán.';
            }
        }
    }
    
    public function renderTask($task_id, $project_id)
    {
        $user = $this->getUser()->getIdentity();
        
        if (isset($_POST['edit-condition'])) {
            if ($this->context->createProjects()->editCondition($task_id, $_POST['condition'])) {
                $this->template->msg = 'Stav byl upraven.';
            }
        }
        elseif (isset($_POST['price-set'])) {
            if ($user->group_id == 3) $price = array('price_from_client'=>$_POST['price_from_client']);
            else $price = array('price_from_supplier'=>$_POST['price_from_supplier']);
            
            if ($this->context->createProjects()->setPrice($task_id, $price)) {
                $this->template->msg = 'Byla navržena nová cena.';
            }
        }
        elseif (isset($_POST['price-accept'])) {
            if ($user->group_id != 3 && $this->context->createProjects()->acceptPriceFromClient($task_id)) {
                $this->template->msg = 'Cena byla akceptována.';
            } elseif ($user->group_id == 3 && $this->context->createProjects()->acceptPriceFromSupplier($task_id)) {
                $this->template->msg = 'Cena byla akceptována.';
            } 
        }
        elseif (isset($_POST['price-new'])) {
            $price = array('price'=>$_POST['price']);
            if ($user->group_id != 3 && $this->context->createProjects()->setPrice($task_id, $price)) {
                $this->template->msg = 'Cena byla nastavena.';
            }
        }
        
        $this->template->files = $this->context->createProjects()->getFiles($task_id, $project_id);
        $this->template->project = $this->context->createProjects()->getProject($user->id_user, $project_id); 
        $this->template->task = $this->context->createProjects()->getTask($task_id, $project_id);
        $this->template->bugs = $this->context->createProjects()->getBugs($task_id, $project_id);
    }
    
    public function renderNewTask($project_id)
    { 
        $user = $this->getUser()->getIdentity();
        $this->template->project = $this->context->createProjects()->getProject($user->id_user, $project_id); 
        if (isset($_POST['new'])) {              
            unset($_POST['new']);
            $_POST['project_id'] = $project_id;
            $_POST['entered'] = date('Y-m-d H:i:s',time());
            if ($user->group_id == 3) {
                $_POST['price_from_client'] = $_POST['price_from_supplier'];
                unset($_POST['price_from_supplier']);
            }
            if ($this->template->project->client_user_id == 0) {
                $_POST['price'] = $_POST['price_from_supplier'];
                unset($_POST['price_from_supplier']);
            }
            $result = $this->context->createProjects()
                ->addTask($_POST);
            if ($result) {
                $this->template->msg = 'Úkol byl přidán.';
            }
        } 
    }
    
    public function renderDelete($id) 
    {     
        $user = $this->getUser()->getIdentity();
        if ($user->group_id == 3) return false;
        
        $result = $this->context->createProjects()
            ->deleteProject($id,$user->id_user);
        $this->redirect('Projects:default');
    }
    
    public function renderDeleteTask($id, $project_id) 
    {     
        $user = $this->getUser()->getIdentity();
        
        $result = $this->context->createProjects()
            ->deleteTask($id,$user->id_user);
        $this->redirect('Projects:show',$project_id);
    }

}
