<?php


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
Faktura číslo <span style="color:red; font-weight:bold;">2012040001</span>
</div>
<table style="width:100%; border:2px solid black; font-family:sans-serif;font-size:12px;">
<tr>
    <td style="width:50%; border:1px solid black; vertical-align:top; padding:5px; padding-bottom:0;">
        <h2 style="font-family:sans-serif;font-size:16px;">Dodavatel:</h2>
        <br>
        <div class="marginLeft">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Michal Katuščák</strong><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dr. Bureše 13<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; České Budějovice, 37005<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Czech republic
        </div>
        <br>
        <table style="font-family:sans-serif;font-size:12px;">
            <tr>
                <td>Telefon: +420723020596</td>
                <td style="padding-left:10px;">IČ: 123456789</td>
            </tr>
            <tr>
                <td>Email: michal@katuscak.cz</td>
                <td style="padding-left:10px;">DIČ: neplátce DPH</td>
            </tr>
        </table>
        <br>
        <div style="font-size:12px;">
            Podnikatel zapsán v živ. rejstříku v Českých Budějovicích.
        </div><br>
    </td>
    <td style="width:50%; border:1px solid black; vertical-align:top; padding:5px;">
        <h2 style="font-family:sans-serif;font-size:16px;">Odběratel:</h2>
        <br>
        <div class="marginLeft">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Vladimír Ponechal</strong><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chodov 32<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Praha 4, 12015<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Czech republic
        </div>
        <br>
        <table style="font-family:sans-serif;font-size:12px;">
            <tr>
                <td>Telefon: </td>
                <td style="padding-left:10px;">IČ: </td>
            </tr>
            <tr>
                <td>Email: v.ponechal@volny.cz</td>
                <td style="padding-left:10px;">DIČ: </td>
            </tr>
        </table>
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
                            <td>Forma úhrady: </td><td style="padding-left:5px;">Bankovním převodem</td>
                        </tr>
                        <tr>
                            <td>Banka: </td><td style="padding-left:5px;">Komerční banka</td>
                        </tr>
                        <tr>
                            <td>Číslo účtu: </td><td style="padding-left:5px;"><strong>123456789/0100</strong></td>
                        </tr>
                        <tr>
                            <td>Variabilní symbol: </td><td style="padding-left:5px;"><span style="color:red; font-weight:bold;">2012040001</span></td>
                        </tr>
                    </table>
                </td>
                <td style="vertical-align:top;"> 
                    <table>
                        <tr>
                            <td>Datum vystavení: </td><td style="padding-left:5px;">10. 4. 2012</td>
                        </tr>
                        <tr>
                            <td>Datum splatnosti: </td><td style="padding-left:5px;"><strong>24. 4. 2012</strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td style="width:100%; border:1px solid black; vertical-align:top; padding:5px;" colspan="2">
        <table style="width:700px;">
            <tr>
                <th style="width:20px;">Kód</th><th>Položka</th><th style="width:40px;">Množství</th><th style="width:100px;">Cena/kus</th><th style="width:40px;">DPH</th><th style="width:120px;">Celkem</th>
            </tr>
            <tr>
                <td style="border-top:1px dotted black">SW</td><td style="border-top:1px dotted black">Nástroj pro fakturování</td><td style="border-top:1px dotted black;text-align:right;">1 kus</td><td style="border-top:1px dotted black;text-align:right;">1 999,00 Kč</td><td style="border-top:1px dotted black;text-align:right;">20%</td><td style="border-top:1px dotted black;text-align:right;">'. number_format((1999/100*120), 2, ',', ' ') .' Kč</td>
            </tr>
            <tr>
                <td style="border-top:1px dotted black">SW</td><td style="border-top:1px dotted black">Přístup k administraci</td><td style="border-top:1px dotted black;text-align:right;">1 kus</td><td style="border-top:1px dotted black;text-align:right;">1,00 Kč</td><td style="border-top:1px dotted black;text-align:right;">20%</td><td style="border-top:1px dotted black;text-align:right;">'. number_format((1/100*120), 2, ',', ' ') .' Kč</td>
            </tr>
            <tr>
                <td style="border-top:1px dotted black"> </td><td style="border-top:1px dotted black">Záloha</td><td style="border-top:1px dotted black;text-align:right;"></td><td style="border-top:1px dotted black;text-align:right;"> </td><td style="border-top:1px dotted black;text-align:right;"> </td><td style="border-top:1px dotted black;text-align:right;">-500,00 Kč</td>
            </tr>
            
            <tr>
                <td colspan="5" style="border-top:1px solid black;">Celkem bez DPH</td>
                <td style="border-top:1px solid black;text-align:right;">'. number_format(((2000/100*120-500)/100*80), 2, ',', ' ') .' Kč</td>
            </tr>
            
            <tr>
                <td colspan="5" style="border-top:1px dotted black">DPH 14%</td>
                <td style="border-top:1px dotted black;text-align:right;">0,00 Kč</td>
            </tr>
            
            <tr>
                <td colspan="5" style="border-top:1px dotted black">DPH 20%</td>
                <td style="border-top:1px dotted black;text-align:right;">'. number_format(((2000/100*120-500)/100*20), 2, ',', ' ') .' Kč</td>
            </tr>
            
            <tr>
                <td colspan="5" style="font-weight:bold;border-top:1px solid black;border-bottom:1px solid black;">Celkem (včetně DPH)</td>
                <td style="font-weight:bold;border-top:1px solid black;border-bottom:1px solid black;text-align:right;">'. number_format(2000/100*120-500, 2, ',', ' ') .' Kč</td>
            </tr>
        </table>        
    </td>
</tr>
<tr>
    <td style="width:50%; border:1px solid black; vertical-align:top; padding:5px;">
        <h2 style="font-size:12px; font-weight:normal;">Podpis a razítko dodavatele:</h2>
        <br>
        <img src="./img135.jpg" width="100" style="margin-left:100px;">
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


//==============================================================
//==============================================================
//==============================================================

include("./mpdf.php");

$mpdf=new mPDF(); 

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>