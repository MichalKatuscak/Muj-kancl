<?php

/**
 * Homepage presenter.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class InvoicesPresenter extends BasePresenter
{
    public function startup () 
    {
        parent::startup();
        $this->mustBeLoggedIn();
        $this->template->title = 'Faktury';
    }
    
    public function limit () 
    {
        $user = $this->getUser()->getIdentity(); 
        $limit = $this->context->createInvoices()
            ->getLimit($user->id_user);
        switch ($user->group_id) {
            case 5:
                $limit = 50 - $limit;
                break;
            case 6:
                $limit = 20 - $limit;
                break;
            case 9:
                $limit = 20 - $limit;
                break;
            default:
                $limit = 1000;  
        } 
        return $limit;
    }

    public function renderDefault()
    {                                       
        $user = $this->getUser()->getIdentity(); 
        if ($this->isAjax()) {
            $this->invalidateControl('content'); 
            if ($user->group_id != 3) {
                $this->template->invoices_v = $this->context->createInvoices()
                    ->searchInvoicesV($user->id_user, $_GET['search']);
                $this->template->invoices_p = $this->context->createInvoices()
                    ->searchInvoicesP($user->id_user, $_GET['search']);
            }
        } else {
            if ($user->group_id != 3) {
                $this->template->invoices_v = $this->context->createInvoices()
                    ->getInvoicesV($user->id_user);
                $this->template->invoices_p = $this->context->createInvoices()
                    ->getInvoicesP($user->id_user);
            } else {
                $this->template->invoices = $this->context->createInvoices()
                    ->getInvoicesClient($user->id_user);
            }
            $this->template->limit = $this->limit();
        }                          
    }
    
    public function renderClient ($id)
    {
        $user = $this->getUser()->getIdentity(); 
        $this->template->client = $this->context->createClients()
            ->where(array('parent_user_id' => $user->id_user, 'id_user' => $id))->limit('1')->fetch();
        $this->invalidateControl('content');
    }
    
    public function renderZaplaceno ($id)
    {                      
        $user = $this->getUser()->getIdentity(); 
        $this->context->createInvoices()->setAsPaid($user->id_user,$id);
		$this->redirect('default');
    }
    
    public function renderNezaplaceno ($id)
    {                      
        $user = $this->getUser()->getIdentity(); 
        $this->context->createInvoices()->setAsNoPaid($user->id_user,$id);
		$this->redirect('default');
    }
    
    public function renderPdf($id) 
    {
        include_once(__DIR__.'/../../libs_noauto/MPDF/mpdf.php');
        $user = $this->getUser()->getIdentity();
        if ($user->group_id == 3) {
            $invoice = $this->context->createInvoices()
                ->getClientInvoice($user->id_user, $id);
            $client = $this->context->createUsers()
                ->where(array('id_user' => $invoice->user_id))->limit('1')->fetch();
        } else {
            $invoice = $this->context->createInvoices()
                ->getInvoice($user->id_user, $id);
            $client = $this->context->createClients()
                ->where(array('parent_user_id' => $user->id_user, 'id_user' => $invoice->client_user_id))->limit('1')->fetch();
        }


if ($invoice->prijata == 1 || $user->group_id == 3) {
    $tmp_client = $client;
    $client = $user;
    $user = $tmp_client;
}
$address_dodavatel = explode("\n",$user->address!=''?$user->address:" \n \n \n");
$address_odberatel = explode("\n",($client->address!=''?$client->address:" \n \n \n"));
$html = '
<style>
div.marginLeft {
    font-size:16px;
    margin-left:30px;
    position:relative;
    left: 50px;
}
</style>
<div style="margin-left:400px;width:30%;text-align:center;border:1px solid black;border-bottom:none;font-family: sans-serif;padding:5px 10px;">
'.$invoice->type.': <span style="color:red; font-weight:bold;">'.$invoice->number.'</span>
</div>
<table style="width:100%; border:2px solid black; font-family:sans-serif;font-size:12px;">
<tr>
    <td style="width:50%; border:1px solid black; vertical-align:top; padding:5px; padding-bottom:0;">
        <h2 style="font-family:sans-serif;font-size:16px;">Dodavatel:</h2>
        <br>
        <div class="marginLeft">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>'.$user->first_name.' '.$user->last_name.'</strong><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.(isset($address_dodavatel[0])?$address_dodavatel[0]:'').'<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.(isset($address_dodavatel[1])?$address_dodavatel[1]:'').'<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.(isset($address_dodavatel[2])?$address_dodavatel[2]:'').'
        </div>
        <br>
        <table style="font-family:sans-serif;font-size:12px;">
            <tr>
                <td>Telefon: '.$user->phone.'</td>
                <td style="padding-left:10px;">IČ: '.$user->ic.'</td>
            </tr>
            <tr>
                <td>Email: '.$user->email.'</td>
                <td style="padding-left:10px;">DIČ: '.$user->dic.'</td>
            </tr>
        </table>
        <br>
        <div style="font-size:12px;">
            '.$user->invoice_note.'
        </div><br>
    </td>
    <td style="width:50%; border:1px solid black; vertical-align:top; padding:5px;">
        <h2 style="font-family:sans-serif;font-size:16px;">Odběratel:</h2>
        <br>
        <div class="marginLeft">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>'.$client->first_name.' '.$client->last_name.'</strong><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.(isset($address_odberatel[0])?$address_odberatel[0]:'').'<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.(isset($address_odberatel[1])?$address_odberatel[1]:'').'<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.(isset($address_odberatel[2])?$address_odberatel[2]:'').'
        </div>
        <br>
        <table style="font-family:sans-serif;font-size:12px;">
            <tr>
                <td>Telefon: '.$client->phone.'</td>
                <td style="padding-left:10px;">IČ: '.$client->ic.'</td>
            </tr>
            <tr>
                <td>Email: '.$client->email.'</td>
                <td style="padding-left:10px;">DIČ: '.$client->dic.'</td>
            </tr>
        </table>
        <br>
        <div style="font-size:12px;">
            '.$client->invoice_note.'
        </div><br>
    </td>
</tr>
<tr>
    <td style="width:100%; border:1px solid black; vertical-align:top; padding:5px;" colspan="2">
        <h2 style="font-size:16px;">Platební podmínky:</h2>
        <table style="font-size:12px;">
            <tr>
                <td style="width:330px; vertical-align:top;">
                    <table>
                        <tr>
                            <td>Forma úhrady: </td><td style="padding-left:5px;">'.$invoice->forma_uhrady.'</td>
                        </tr>
                        <tr>
                            <td>Banka: </td><td style="padding-left:5px;">'.$user->bank_name.'</td>
                        </tr>
                        <tr>
                            <td>Číslo účtu: </td><td style="padding-left:5px;"><strong>'.$user->bank_number.'</strong></td>
                        </tr>
                        '.(($invoice->variabilni_symbol!='')?'
                        <tr>
                            <td>Variabilní symbol: </td><td style="padding-left:5px;"><span style="color:red; font-weight:bold;">'.$invoice->variabilni_symbol.'</span></td>
                        </tr>
                        ':'').'
                        '.(($invoice->specificky_symbol!='')?'
                        <tr>
                            <td>Specifický symbol: </td><td style="padding-left:5px;">'.$invoice->specificky_symbol.'</td>
                        </tr>
                        ':'').'
                        '.(($invoice->konstantni_symbol!='')?'
                        <tr>
                            <td>Konstantní symbol: </td><td style="padding-left:5px;">'.$invoice->konstantni_symbol.'</td>
                        </tr>
                        ':'').'
                    </table>
                </td>
                <td style="vertical-align:top;"> 
                    <table>
                        <tr>
                            <td>Datum vystavení: </td><td style="padding-left:5px;">'.Date('d. m. Y',strtotime($invoice->vystaveni)).'</td>
                        </tr>
                        <tr>
                            <td>Datum splatnosti: </td><td style="padding-left:5px;"><strong>'.Date('d. m. Y',strtotime($invoice->splatnost)).'</strong></td>
                        </tr>'.($invoice->duzp > '1999-00-00'?'
                        <tr>
                            <td>DUZP: </td><td style="padding-left:5px;"><strong>'.Date('d. m. Y',strtotime($invoice->duzp)).'</strong></td>
                        </tr>' : '').'
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td style="width:100%; border:1px solid black; vertical-align:top; padding:5px;" colspan="2">
        <table style="width:700px;">';
        $is_quantity = ($invoice->sum_quantity/$invoice->count_quantity!=1);
        if ($invoice->sum_dph) {
            $html .= '<tr>
                <th style="width:20px;">Kód</th>
                <th>Položka</th>';
            if ($is_quantity) {
                $html .= '
                    <th style="width:65px;">Množství</th>
                    <th style="width:40px;">DPH</th>
                    <th style="width:120px;">Cena za jednotku<br>bez DPH</th>
                    <th style="width:120px;">Celková cena<br>bez DPH</th>
                </tr>';
            } else {
                $html .= '
                    <th style="width:40px;">DPH</th>
                    <th style="width:120px;">Cena bez DPH</th>
                </tr>';
            }
        } else {
            $html .= '<tr>
                <th style="width:20px;">Kód</th>
                <th>Položka</th>
            ';
            if ($is_quantity) {
                $html .= '
                <th style="width:65px;">Množství</th>
                <th style="width:150px;">Cena za jednotku</th>
                </tr>';
            } else {
                $html .= '
                <th style="width:150px;">Cena</th>
                </tr>';
            }
        }
$celkem_bez = 0;
$celkem_s = 0;
$dph_m = 0;
$dph_v = 0;

$items = $this->context->createInvoices()
            ->getItems($invoice->id_invoice); 

foreach($items as $item) {
    $kod = $item->code;
    $polozka = $item->item;
    $mnozstvi = $item->quantity;           
    $dph = $item->dph;          
    $cena_bez = $item->price_without_dph;
    $cena_s = $cena_bez * ($dph/100+1);
    $cena_dph = $cena_s - $cena_bez;
    if ($dph == 14) {
        $dph_m += $mnozstvi*$cena_dph;
    } else if ($dph == 20) {
        $dph_v += $mnozstvi*$cena_dph;
    }
    $celkem_bez += $mnozstvi*$cena_bez;
    $celkem_s += $mnozstvi*$cena_s;
    if ($invoice->sum_dph) {
    $html .= '
            <tr>
                <td style="border-top:1px dotted black">'.$kod.'</td>
                <td style="border-top:1px dotted black">'.$polozka.'</td>';
                
            if ($is_quantity) {
                $html .='<td style="border-top:1px dotted black;text-align:right;">'.$mnozstvi.' '. $item->unit.'</td>
                <td style="border-top:1px dotted black;text-align:right;">'.$dph.'%</td>
                <td style="border-top:1px dotted black;text-align:right;">'.number_format($cena_bez, 2, ',', ' ').' Kč</td>
                <td style="border-top:1px dotted black;text-align:right;">'.number_format($cena_bez*$mnozstvi, 2, ',', ' ').' Kč</td> ';
            }else {
                $html .='
                <td style="border-top:1px dotted black;text-align:right;">'.$dph.'%</td>
                <td style="border-top:1px dotted black;text-align:right;">'.number_format($cena_bez, 2, ',', ' ').' Kč</td>';
            }
                $html .= '
            </tr>
    ';
    } else {
    $html .= '
            <tr>
                <td style="border-top:1px dotted black">'.$kod.'</td>
                <td style="border-top:1px dotted black">'.$polozka.'</td>';
                
            if ($is_quantity) {
                $html .='
                <td style="border-top:1px dotted black;text-align:right;">'.$mnozstvi.' '. $item->unit.'</td>
                <td style="border-top:1px dotted black;text-align:right;">'.number_format($cena_bez, 2, ',', ' ').' Kč</td> ';
            }else {
                $html .='
                <td style="border-top:1px dotted black;text-align:right;">'.number_format($cena_bez, 2, ',', ' ').' Kč</td>';
            }
                $html .= '
            </tr>
    ';
    }        
}
$celkem_bez = $celkem_bez?round($celkem_bez*100)/100:0;
$celkem_s = $celkem_s?round($celkem_s*100)/100:0;
$dph_m = $dph_m?round($dph_m*100)/100:0;
$dph_v = $dph_v?round($dph_v*100)/100:0;
if ($invoice->sum_dph) {
$cols = $is_quantity?5:3;
$html .= '<tr>
                <td colspan="'.$cols.'" style="border-top:1px solid black;">Celkem bez DPH</td>
                <td style="border-top:1px solid black;text-align:right;">'. number_format($celkem_bez, 2, ',', ' ') .' Kč</td>
            </tr>
            
            <tr>
                <td colspan="'.$cols.'" style="border-top:1px dotted black">DPH 14%</td>
                <td style="border-top:1px dotted black;text-align:right;">'. number_format($dph_m, 2, ',', ' ') .' Kč</td>
            </tr>
            
            <tr>
                <td colspan="'.$cols.'" style="border-top:1px dotted black">DPH 20%</td>
                <td style="border-top:1px dotted black;text-align:right;">'. number_format($dph_v, 2, ',', ' ') .' Kč</td>
            </tr>
            
            <tr>
                <td colspan="'.$cols.'" style="font-weight:bold;border-top:1px solid black;border-bottom:1px solid black;">Celkem (včetně DPH)</td>
                <td style="font-weight:bold;border-top:1px solid black;border-bottom:1px solid black;text-align:right;">'. number_format($celkem_s, 2, ',', ' ') .' Kč</td>
            </tr>';
} else {
$cols = $is_quantity?3:2;
$html .= '         
            <tr>
                <td colspan="'.$cols.'" style="font-weight:bold;border-top:1px solid black;border-bottom:1px solid black;">Celkem</td>
                <td style="font-weight:bold;border-top:1px solid black;border-bottom:1px solid black;text-align:right;">'. number_format($celkem_s, 2, ',', ' ') .' Kč</td>
            </tr>';
}
$html .= '</table>        
    </td>
</tr>
<tr>
    <td style="width:50%; border:1px solid black; vertical-align:top; padding:5px;">
        <h2 style="font-size:12px; font-weight:normal;">Podpis a razítko dodavatele:</h2>
        <br>
    </td>
    <td style="width:50%; border:1px solid black; vertical-align:top; padding:5px;">
        <h2 style="font-size:12px; font-weight:normal;">Podpis a razítko odběratele:</h2>
        <br>      
        <br>      
        <br>      
        <br>      
        <br>      
        <br>      
        <br>      
    </td>
</tr>
</table>
';

$mpdf=new mPDF(); 

$mpdf->WriteHTML($html);
$name = "Faktura_".$invoice->number.'.pdf';
$content = $mpdf->Output($name,"D");
    }
    
    public function renderNew()
    {                                          
        $user = $this->getUser()->getIdentity();
        if ($user->group_id == 3) return false;   
        $limit = $this->limit();
        if ($limit == 0) exit;   
        if ($_POST) { 
            $client = $this->context->createClients()
                ->where(array('parent_user_id' => $user->id_user, 'id_user' => $_POST['client']))->limit('1')->fetch(); 
            $invoice = $this->context->createInvoices()
                ->addInvoice($user, $client, $_POST);
            if ($invoice) {
                $this->template->msg = 'Faktura byla vytvořena.';
            }
        } 
        $this->template->last_number = $this->context->createInvoices()
            ->getLastNumber($user->id_user);
        $this->template->dodavatel = $user;
        $this->template->clients = $this->context->createClients()
            ->where(array('parent_user_id' => $user->id_user, 'group_id' => 3))->order('last_name');
        $this->template->suppliers = $this->context->createClients()
            ->where(array('parent_user_id' => $user->id_user, 'group_id' => 4))->order('last_name');
    }                         
    
    public function renderDelete($id) 
    {     
        $user = $this->getUser()->getIdentity();
        $result = $this->context->createInvoices()
            ->deleteInvoice($user->id_user, $id);
        $this->redirect('Invoices:default');
    }

}
