<?php
if (isset($_GET['ic'])) {
    include_once ('./libs/ARES.class.php');
    $ares = new ARES($_GET['ic']);
    $data = $ares->getData();
    if (is_array($data) && ($data['type'] == 'PO' || $data['type'] == 'FO')) {
        if ($data['type'] == 'FO') {
            $name = explode(' ', $data['name']);
            $data['first_name'] = $name[0];
            $data['last_name'] = $name[1];
            unset($data['name']);
        } elseif ($data['type'] == 'PO') {
            $data['first_name'] = false;
            $data['last_name'] = $data['name'];
            unset($data['name']);
        }
        foreach ($data as $key=>$value) {
            $data[$key] = $value==false?'':trim($value);
        }
        echo json_encode($data); 
    }
}
?>
