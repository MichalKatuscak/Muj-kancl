<?php

use Nette\Database\Connection,
    Nette\Database\Table\Selection;


class TODO extends Selection
{
    public function __construct(Connection $connection)
    {
        parent::__construct('todo', $connection);
    } 
    
    public function getList ($user_id)
    {
        return $this->connection->query('SELECT * FROM todo WHERE user_id = ?', $user_id);
    }
    
    public function addItem ($data) 
    {
        return $this->connection->query('INSERT INTO todo ?',$data);
    }
    
    public function deleteItem ($user_id, $todo_id) 
    {
        return $this->connection->query('DELETE FROM todo WHERE id_todo = ? AND user_id = ?', $todo_id, $user_id);
    }
}