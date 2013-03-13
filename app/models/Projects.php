<?php

use Nette\Database\Connection,
    Nette\Database\Table\Selection;


class Projects extends Selection
{
    public function __construct(Connection $connection)
    {
        parent::__construct('users', $connection);
    } 
    
    public function getLimit ($user_id)
    {
        $result = $this->connection->query('SELECT count(*) as celkem FROM projects WHERE user_id = ?', $user_id)->fetch();
        return $result['celkem'];
    }
    
    public function taskAsPaid ($project, $task, $paid) {
        return $this->connection->query('UPDATE project_tasks SET paid = ? WHERE id_project_task = ? AND project_id = ? LIMIT 1', $paid, $task, $project);
    }
    
    public function getProjects($user) {
        return $this->connection->query('            
            SELECT 
            p.*, c.first_name as client_first_name , c.last_name as client_last_name, sum(t.price) as price
            FROM projects p
            LEFT JOIN users c
            ON c.id_user = p.client_user_id
            LEFT JOIN project_tasks t
            ON t.project_id = p.id_project
            WHERE p.user_id = ? OR p.client_user_id = ?
            GROUP BY p.id_project
        ',$user,$user);
    }
    
    public function getFiles($task_id,$project_id) {
        return $this->connection->query('SELECT * FROM project_task_files WHERE project_task_id = ?',$task_id);
    }
    
    public function getTasks($project_id) {
        return $this->connection->query('
SELECT b.found,t.* 
FROM project_tasks t 
LEFT JOIN project_task_bugs b 
ON (b.project_task_id = t.id_project_task AND b.fixed LIKE \'0000-00-00 00:00:00\')
WHERE project_id = ? 
GROUP BY t.id_project_task
ORDER BY t.id_project_task,b.fixed
',$project_id);
    }
    
    public function getTask($task_id, $project_id) {
        return $this->connection->query('SELECT * FROM project_tasks WHERE id_project_task = ? && project_id = ? LIMIT 1',$task_id, $project_id)->fetch();
    }
    
    public function editCondition($task_id, $condition) {
        if ($condition == 1) {
            $task = $this->connection->query('SELECT start_work FROM project_tasks WHERE id_project_task = ? LIMIT 1',$task_id)->fetch();
            if (strtotime($task->start_work) < 0) {
                $start_work = array('start_work'=>date('Y-m-d H:i:s',time()));
                if (!$this->connection->query('UPDATE project_tasks SET ? WHERE id_project_task = ? LIMIT 1',$start_work,$task_id))
                    return false;
            }
        }
        elseif ($condition == 2) {
            $task = $this->connection->query('SELECT end_work FROM project_tasks WHERE id_project_task = ? LIMIT 1',$task_id)->fetch();
            if (strtotime($task->end_work) < 0) {
                $end_work = array('end_work'=>date('Y-m-d H:i:s',time()));
                if (!$this->connection->query('UPDATE project_tasks SET ? WHERE id_project_task = ? LIMIT 1',$end_work,$task_id))
                    return false;
            }
        }
        $condition = array('condition'=>$condition);
        return $this->connection->query('UPDATE project_tasks SET ? WHERE id_project_task = ? LIMIT 1',$condition,$task_id);
    }
    
    public function setPrice ($task_id,$price) {
        return $this->connection->query('UPDATE project_tasks SET ? WHERE id_project_task = ? LIMIT 1',$price,$task_id);
    }
    
    public function acceptPriceFromClient($task_id) {
        return $this->connection->query('UPDATE project_tasks SET price = price_from_client WHERE id_project_task = ? LIMIT 1',$task_id);
    }
    
    public function acceptPriceFromSupplier($task_id) {
        return $this->connection->query('UPDATE project_tasks SET price = price_from_supplier WHERE id_project_task = ? LIMIT 1',$task_id);
    }
    
    public function addBug($bug,$task_id) {
        $max = $this->connection->query('SELECT id_bug FROM project_task_bugs WHERE project_task_id = ? ORDER BY id_bug DESC LIMIT 1',$task_id)->fetch();
        $max = isset($max['id_bug'])?$max['id_bug']:0;
        $new_id = $max+1;
        $data = Array(
            'id_bug' => $new_id,
            'bug' => $bug,
            'found' => date('Y-m-d H:i:s',time()),
            'project_task_id' => $task_id
        );
        return $this->connection->query('INSERT INTO project_task_bugs ?',$data);       
    }
    
    public function getBugs($task_id, $project_id) {
        return $this->connection->query('SELECT * FROM project_task_bugs WHERE project_task_id = ? ORDER BY id_bug',$task_id);
    }
    
    public function setBugsAsFixed($bugs,$task_id) {
        if ($this->connection->query('UPDATE project_task_bugs SET fixed = ? WHERE project_task_id = ? AND id_bug IN (?)',date('Y-m-d H:i:s',time()),$task_id,$bugs)) {
            foreach($bugs as $bug) {
                if (!isset($desc)) {
                    $desc = 'Oprava chyb '.$bug;
                } else {
                    $desc .= ', '.$bug;
                }
            }
            return $desc;
        }
        return false;
    }
    
    public function getProject($user, $id) {
        return $this->connection->query('SELECT * FROM projects WHERE (user_id = ? || client_user_id = ?) AND id_project = ? LIMIT 1',$user,$user,$id)->fetch();
    }
    
    public function addProject($data) {
        return $this->connection->query('INSERT INTO projects ?',$data);
    }
    
    public function editProject($id, $data) {
        return $this->connection->query('UPDATE projects SET ? WHERE id_project = ? LIMIT 1',$data,$id);
    }
    
    public function addTask($data) {
        return $this->connection->query('INSERT INTO project_tasks ?',$data);
    }
    
    public function addFile($filename,$task_id,$description) {
        $data = Array(
            'url' => sha1($task_id).$filename,
            'project_task_id' => $task_id,
            'description' => $description,
            'uploaded' => date('Y-m-d H:i:s',time())
        );
        
        return $this->connection->query('INSERT INTO project_task_files ?',$data);
    }
    
    public function deleteProject($id,$user_id) {
        return $this->connection->query('DELETE FROM projects WHERE (`user_id` = ?) AND (`id_project` = ?)  LIMIT 1',$user_id,$id);
    }
    
    public function deleteTask($id,$user_id) {
        if ($user = $this->connection->query('
            SELECT 
            p.user_id, p.client_user_id
            FROM project_tasks t
            LEFT JOIN projects p
            ON p.id_project = t.project_id
            WHERE t.id_project_task = ? LIMIT 1',$id)->fetch()) {
            if ($user['user_id'] == $user_id || $user['client_user_id'] == $user_id) {
                return $this->connection->query('DELETE FROM project_tasks WHERE id_project_task = ? LIMIT 1',$id);
            }
        }
        return false;
    }
}