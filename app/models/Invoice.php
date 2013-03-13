<?php

use Nette\Database\Connection,
    Nette\Database\Table\Selection;


class Invoices extends Selection
{
    public function __construct (Connection $connection)
    {
        parent::__construct('invoices', $connection);
    }
    
    public function getInvoicesV ($user_id) 
    {
        return $this->connection->query('SELECT invoices.*, CONCAT(users.first_name,\' \', users.last_name) as client, SUM(invoice_items.price_without_dph*(invoice_items.dph/100+1) * invoice_items.quantity) as celkem FROM invoices LEFT JOIN users ON users.id_user = invoices.client_user_id LEFT JOIN invoice_items ON invoice_items.invoice_id = invoices.id_invoice WHERE user_id = ? AND prijata = 0 GROUP BY id_invoice ORDER BY vystaveni DESC', $user_id);
    }
    
    public function getInvoicesP ($user_id) 
    {
        return $this->connection->query('SELECT invoices.*, CONCAT(users.first_name,\' \', users.last_name) as client, SUM(invoice_items.price_without_dph*(invoice_items.dph/100+1) * invoice_items.quantity) as celkem FROM invoices LEFT JOIN users ON users.id_user = invoices.client_user_id LEFT JOIN invoice_items ON invoice_items.invoice_id = invoices.id_invoice WHERE user_id = ? AND prijata = 1 GROUP BY id_invoice ORDER BY vystaveni DESC', $user_id);
    }
    
    public function searchInvoicesV ($user_id, $search) 
    {
        return $this->connection->query('SELECT invoices.*, CONCAT(users.first_name,\' \', users.last_name) as client, SUM(invoice_items.price_without_dph*(invoice_items.dph/100+1) * invoice_items.quantity) as celkem FROM invoices LEFT JOIN users ON users.id_user = invoices.client_user_id LEFT JOIN invoice_items ON invoice_items.invoice_id = invoices.id_invoice WHERE (user_id = ? AND prijata = 0) AND (users.first_name LIKE ? OR users.last_name LIKE ? OR number LIKE ?) GROUP BY id_invoice ORDER BY vystaveni DESC', $user_id, '%'.$search.'%', '%'.$search.'%', '%'.$search.'%');
    }
    
    public function searchInvoicesP ($user_id, $search) 
    {
        return $this->connection->query('SELECT invoices.*, CONCAT(users.first_name,\' \', users.last_name) as client, SUM(invoice_items.price_without_dph*(invoice_items.dph/100+1) * invoice_items.quantity) as celkem FROM invoices LEFT JOIN users ON users.id_user = invoices.client_user_id LEFT JOIN invoice_items ON invoice_items.invoice_id = invoices.id_invoice WHERE (user_id = ? AND prijata = 1) AND (users.first_name LIKE ? OR users.last_name LIKE ? OR number LIKE ?) GROUP BY id_invoice ORDER BY vystaveni DESC', $user_id, '%'.$search.'%', '%'.$search.'%', '%'.$search.'%');
    }
    
    public function getInvoicesClient ($user_id) 
    {
        return $this->connection->query('SELECT invoices.*, CONCAT(users.first_name,\' \', users.last_name) as client, SUM(invoice_items.price_without_dph*(invoice_items.dph/100+1) * invoice_items.quantity) as celkem FROM invoices LEFT JOIN users ON users.id_user = invoices.user_id LEFT JOIN invoice_items ON invoice_items.invoice_id = invoices.id_invoice WHERE client_user_id = ? AND prijata = 0 GROUP BY id_invoice ORDER BY vystaveni DESC', $user_id);
    }
    
    public function deleteInvoice ($user_id, $id) 
    {
        return $this->connection->query('DELETE FROM invoices WHERE user_id = ? AND id_invoice = ?',$user_id,$id);
    }
    
    public function getInvoice ($user_id, $id) 
    {
        return $this->connection->query('SELECT invoices.*, SUM(invoice_items.dph) AS sum_dph, SUM(invoice_items.quantity) as sum_quantity, count(invoice_items.quantity) AS count_quantity FROM invoices LEFT JOIN invoice_items ON invoice_items.invoice_id = invoices.id_invoice WHERE user_id = ? AND id_invoice = ? GROUP BY id_invoice LIMIT 1', $user_id, $id)->fetch();
    }
    
    public function getClientInvoice ($user_id, $id) 
    {
        return $this->connection->query('SELECT invoices.*, SUM(invoice_items.dph) AS sum_dph, SUM(invoice_items.quantity) as sum_quantity, count(invoice_items.quantity) AS count_quantity FROM invoices LEFT JOIN invoice_items ON invoice_items.invoice_id = invoices.id_invoice WHERE client_user_id = ? AND id_invoice = ? GROUP BY id_invoice LIMIT 1', $user_id, $id)->fetch();
    }
    
    public function setAsPaid ($user_id,$id)
    {
        return $this->connection->query('UPDATE invoices SET ? WHERE id_invoice = ? AND user_id = ? LIMIT 1',array("zaplaceno"=>1),$id,$user_id);
    }
    
    public function setAsNoPaid ($user_id,$id)
    {
        return $this->connection->query('UPDATE invoices SET ? WHERE id_invoice = ? AND user_id = ? LIMIT 1',array("zaplaceno"=>0),$id,$user_id);
    }
    
    public function getLimit ($user_id)
    {
        $result = $this->connection->query('SELECT count(*) as celkem FROM invoices WHERE user_id = ? AND vystaveni > ?', $user_id, date("Y-m",time())."-01 00:00:00")->fetch();
        return $result['celkem'];
    }
    
    public function getLastNumber ($user_id) 
    {
        $result = $this->connection->query('SELECT number FROM invoices WHERE prijata = 0 && user_id = ? ORDER BY id_invoice DESC LIMIT 1', $user_id)->fetch();
        $vydana = $result['number'];
        $result = $this->connection->query('SELECT number FROM invoices WHERE prijata = 1 && user_id = ? ORDER BY id_invoice DESC LIMIT 1', $user_id)->fetch();
        $prijata = $result['number'];
        return array($vydana,$prijata);
    }
    
    public function getItems ($id)
    {
        return $this->connection->query('SELECT * FROM invoice_items WHERE invoice_id = ?', $id);
    }
    
    public function addInvoice ($user, $client, $data) 
    {
        $duzp = '';
        $vystaveni = '';
        $splatnost = '';
        if (isset($data['duzp']) && $data['duzp'] != '') {
            $duzp = explode('.',$data['duzp']);
            $duzp = $duzp[2].'-'.$duzp[1].'-'.$duzp[0];
        }                            
        if (isset($data['vystaveni']) && $data['vystaveni'] != '') {
            $vystaveni = explode('.',$data['vystaveni']);
            $vystaveni = $vystaveni[2].'-'.$vystaveni[1].'-'.$vystaveni[0]; 
        }                                          
        if (isset($data['splatnost']) && $data['splatnost'] != '') {
            $splatnost = explode('.',$data['splatnost']);
            $splatnost = $splatnost[2].'-'.$splatnost[1].'-'.$splatnost[0]; 
        }
        $invoice = array(
            'user_id' => $user->id_user,
            'client_user_id' => $client->id_user,
            'number' => $data['number'],
            'splatnost' => $splatnost,
            'vystaveni' => $vystaveni,
            'duzp' => $duzp,
            'type' => $data['type'],
            'prijata' => $data['prijata'],
            'forma_uhrady' => $data['forma_uhrady'],
            'variabilni_symbol' => $data['variabilni_symbol'],
            'specificky_symbol' => $data['specificky_symbol'],
            'konstantni_symbol' => $data['konstatni_symbol']
        );
        $result = $this->connection->query('INSERT INTO invoices', $invoice);
        if ($result) {
            $invoice_id = $this->connection->query('SELECT LAST_INSERT_ID() AS id')->fetch();
            $id = $invoice_id->id;
            $i = 100;
            for ($n = 0; $n<1000; $n++) {
            	if (isset($data['polozka'.$n.'-jmeno-input']) && $data['polozka'.$n.'-jmeno-input'] != '') {
                    $item = array (
                        'invoice_id' => $id,
                        'code' => $data['polozka'.$n.'-kod-input'],
                        'item' => $data['polozka'.$n.'-jmeno-input'],
                        'dph' => $data['polozka'.$n.'-dph-input'],
                        'quantity' => $data['polozka'.$n.'-pocet-input'],
                        'unit' => $data['polozka'.$n.'-mj-input'],
                        'price_without_dph' => $data['polozka'.$n.'-cena-bez-dph-input'], 
                    );
                    $result = $this->connection->query('INSERT INTO invoice_items', $item);
                    if (!$result) {
                        break;
                    }
                } else {
                    if ($i == 0) {
                        break;
                    }
                    $i--;
                }
            }
            return 1;
        }
        return 0;
    }
}