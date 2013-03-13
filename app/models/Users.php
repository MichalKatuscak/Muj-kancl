<?php

use Nette\Database\Connection,
    Nette\Database\Table\Selection;


class Users extends Selection
{
    public function __construct(Connection $connection)
    {
        parent::__construct('users', $connection);
    }
    
    public function getKanclUsers() {
        return $this->connection->query('
        SELECT users.*, (CONCAT(groups.name,\': \',groups.permissions)) AS type FROM users
   		JOIN groups ON groups.id_group = users.group_id 
        WHERE (`parent_user_id` = 2) AND (group_id != 3)  AND (group_id != 4) 
        ORDER BY money DESC LIMIT 1000');
    }
    
    public function getUser($id) {
        return $this->connection->query('
        SELECT * FROM users 
        WHERE (id_user = ?) 
        LIMIT 1',$id)->fetch();
    }
    
    public function newLogin ($id, $login, $heslo) {
        $data = array('login'=>$login,'password'=>md5($heslo));
        $this->connection->query('UPDATE users SET ? WHERE id_user = ? LIMIT 1',$data,$id);
    }
    
    public function blockUser ($id, $bit) {
        $data = array('blocked'=>$bit);
        $this->connection->query('UPDATE users SET ? WHERE id_user = ? LIMIT 1',$data,$id);
    }
    
    public function setUserAsPay($id,$time) {
        $data = array(
            'paid_to' => date("Y-m-d H:i:s",$time),
            'money' => '0Kč'
        );
        $this->connection->query('UPDATE users SET ? WHERE id_user = ? LIMIT 1',$data,$id);
    }
}