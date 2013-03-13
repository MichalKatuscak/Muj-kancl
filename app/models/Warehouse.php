<?php

use Nette\Database\Connection,
    Nette\Database\Table\Selection;


class Warehouse extends Selection
{
    public function __construct(Connection $connection)
    {
        parent::__construct('warehouse', $connection);
    } 
    
    public function getWarehouses ($user_id)
    {
        return $this->connection->query('SELECT * FROM warehouse WHERE user_id = ? ORDER BY name', $user_id);
    } 
    
    public function getWarehouse ($user_id, $warehouse_id)
    {
        return $this->connection->query('SELECT * FROM warehouse WHERE user_id = ? AND id_warehouse = ? LIMIT 1', $user_id, $warehouse_id)->fetch();
    }
    
    public function getItems ($warehouse_id)
    {
        return $this->connection->query('SELECT * FROM warehouse_items WHERE warehouse_id = ?', $warehouse_id);
    }
    
    public function searchItems ($warehouse_id, $search)
    {
        return $this->connection->query('SELECT * FROM warehouse_items WHERE warehouse_id = ?', $warehouse_id);
    }
    
    public function getItem ($warehouse_id, $item_id)
    {
        return $this->connection->query('SELECT * FROM warehouse_items WHERE warehouse_id = ? AND id_item = ? LIMIT 1', $warehouse_id, $item_id)->fetch();
    }
    
    public function addWarehouse ($data) 
    {
        return $this->connection->query('INSERT INTO warehouse ?',$data);
    }
    
    public function addItem ($data) 
    {
        return $this->connection->query('INSERT INTO warehouse_items ?',$data);
    }
    
    public function updateWarehouse ($user_id, $warehouse_id, $data) 
    {
        return $this->connection->query('UPDATE warehouse SET ? WHERE user_id = ? AND id_warehouse = ? LIMIT 1', $data, $user_id, $warehouse_id);
    }
    
    public function updateItem ($warehouse_id, $item_id, $data) 
    {
        return $this->connection->query('UPDATE warehouse_items SET ? WHERE warehouse_id = ? AND id_item = ? LIMIT 1', $data, $warehouse_id, $item_id);
    }
    
    public function deleteWarehouse ($user_id, $warehouse_id) 
    {
        return $this->connection->query('DELETE FROM warehouse WHERE user_id = ? AND id_warehouse = ? LIMIT 1', $user_id, $warehouse_id);
    }
    
    public function deleteItem ($warehouse_id, $item_id) 
    {
        return $this->connection->query('DELETE FROM warehouse_items WHERE warehouse_id = ? AND id_item = ? LIMIT 1', $warehouse_id, $item_id);
    }
}