<?php

use Nette\Database\Connection,
    Nette\Database\Table\Selection;


class Clients extends Selection
{
    public function __construct(Connection $connection)
    {
        parent::__construct('users', $connection);
    } 
    
    public function getLimit ($user_id)
    {
        $result = $this->connection->query('SELECT count(*) as celkem FROM users WHERE parent_user_id = ? AND (`group_id` = 3)', $user_id)->fetch();
        return $result['celkem'];
    }
    
    public function search ($parent, $group, $search)
    {
        return $this->connection->query('SELECT * FROM users WHERE (parent_user_id = ? AND group_id = ?) AND (last_name LIKE ? OR first_name LIKE ? OR phone LIKE ? OR email LIKE  ?) ORDER BY last_name',$parent, $group, '%'.$search.'%', '%'.$search.'%', '%'.$search.'%', '%'.$search.'%');
    }
    
    public function updateClient($data,$parent,$user) {
        return $this->connection->query('UPDATE users SET ? WHERE (`parent_user_id` = ?) AND (`id_user` = ?)  LIMIT 1',$data,$parent,$user);
    }
    
    public function addClient($data,$parent) {
        $data['parent_user_id'] = $parent;
        return $this->connection->query('INSERT INTO users ?',$data);
    }
    
    public function deleteClient($parent,$user) {
        return $this->connection->query('DELETE FROM users WHERE (`parent_user_id` = ?) AND (`group_id` = 3) AND (`id_user` = ?)  LIMIT 1',$parent,$user);
    }
    
    public function getClients($user_id) {
        return $this->connection->query('SELECT * FROM users WHERE (`parent_user_id` = ?) AND (`group_id` = 3) ORDER BY last_name',$user_id);
    }
}