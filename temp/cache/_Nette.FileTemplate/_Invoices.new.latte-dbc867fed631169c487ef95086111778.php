<?php //netteCache[01]000378a:2:{s:4:"time";s:21:"0.51667700 1340292481";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:56:"/var/www/html/Muj kancl/app/templates/Invoices/new.latte";i:2;i:1338385126;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: /var/www/html/Muj kancl/app/templates/Invoices/new.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'pgfkl11m3e')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb9e2a87d9aa_content')) { function _lb9e2a87d9aa_content($_l, $_args) { extract($_args)
?>    <div class="container">
<?php if (isset($msg)): ?><p><?php echo Nette\Templating\Helpers::escapeHtml($msg, ENT_NOQUOTES) ;endif ?>

    <form action="" method="POST" onSubmit="return validate(this)" class="form-horizontal">
    <div class="row">
      <fieldset class="span11">
        <legend>Nová faktura</legend>
        <div class="control-group">
          <label class="control-label" for="number">Číslo faktury</label>
          <div class="controls">
            <input type="text" id="number" name="number" onKeyUp="Invoice_changeVS(this.value)" required="required" data-nette-rules="{ op:':filled',msg:&quot;Zadejte pros\u00edm \u010d\u00edslo faktury&quot; },{ op:':integer',msg:&quot;\u010c\u00edslo faktury mus\u00ed b\u00fdt \u010d\u00edslo&quot; },{ op:':minLength',msg:&quot;Minim\u00e1ln\u00ed d\u00e9lka \u010d\u00edsla faktury jsou 3 znaky&quot;,arg:3 }" /> (Poslední vydaná/přijatá: <?php echo Nette\Templating\Helpers::escapeHtml($last_number[0]?$last_number[0]:'žádné', ENT_NOQUOTES) ?>
 / <?php echo Nette\Templating\Helpers::escapeHtml($last_number[1]?$last_number[1]:'žádné', ENT_NOQUOTES) ?>)
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="type">Typ faktury</label>
          <div class="controls">
            <select name="type" id="type">
                <option>Faktura</option>
                <option>Zálohová faktura</option>
            </select>
            <select name="prijata" id="prijata" onChange="Invoice_changePrijata(this.value)">
                <option value="0">Vydaná</option>
                <option value="1">Přijatá</option>
            </select>
          </div>
        </div>
      </fieldset>
    </div>
    <div class="row">
      <fieldset class="span5">
        <legend>Dodavatel</legend>
        <div id="data-dodavatel">

        </div>
<script>
var first_name = <?php echo Nette\Templating\Helpers::escapeJs($dodavatel->first_name) ?>; 
var last_name = <?php echo Nette\Templating\Helpers::escapeJs($dodavatel->last_name) ?>; 
var bank_name = <?php echo Nette\Templating\Helpers::escapeJs($dodavatel->bank_name) ?>; 
var bank_number = <?php echo Nette\Templating\Helpers::escapeJs($dodavatel->bank_number) ?>; 
var data_dodavatel = '<br><div class="control-group"> <label class="control-label" for="first_name">Vaše jméno</label><div class="controls"> <input type="text" readonly id="first_name" name="first_name" value="'+first_name+' '+last_name+'"></div>';
</script>
      </fieldset>

      <fieldset class="span5 offset1">
        <legend>Odběratel</legend>
        <div id="data-odberatel">

        </div>
<script>
var data_client = '<br><div class="control-group"> <label class="control-label" for="note">Zvolte klienta</label><div class="controls"> <select name="client"> <option>---</option> ';
<?php $iterations = 0; foreach ($clients as $client): ?>
    data_client += '<option value="';
    data_client += <?php echo Nette\Templating\Helpers::escapeJs($client->id_user) ?>;
    data_client += '">';
    data_client += <?php echo Nette\Templating\Helpers::escapeJs($client->first_name) ?>;
    data_client += ' ';
    data_client += <?php echo Nette\Templating\Helpers::escapeJs($client->last_name) ?>;
    data_client += '</option>';
<?php $iterations++; endforeach ?>
data_client += '</select></div></div>';

var bank_supplier = new Array();
var data_supplier = '<br><div class="control-group"> <label class="control-label" for="note">Zvolte dodavatele</label><div class="controls"> <select name="client" onchange="Invoice_editBank(this.value)"> <option>---</option> ';
<?php $iterations = 0; foreach ($suppliers as $client): ?>
    data_supplier += '<option value="';
    data_supplier += <?php echo Nette\Templating\Helpers::escapeJs($client->id_user) ?>;
    data_supplier += '">';
    data_supplier += <?php echo Nette\Templating\Helpers::escapeJs($client->first_name) ?>;
    data_supplier += ' ';
    data_supplier += <?php echo Nette\Templating\Helpers::escapeJs($client->last_name) ?>;
    data_supplier += '</option>';
    bank_supplier[<?php echo Nette\Templating\Helpers::escapeJs($client->id_user) ?>] = new Array();
    bank_supplier[<?php echo Nette\Templating\Helpers::escapeJs($client->id_user) ?>
]['bank_name'] = <?php echo Nette\Templating\Helpers::escapeJs($client->bank_name) ?>;
    bank_supplier[<?php echo Nette\Templating\Helpers::escapeJs($client->id_user) ?>
]['bank_number'] = <?php echo Nette\Templating\Helpers::escapeJs($client->bank_number) ?>;
<?php $iterations++; endforeach ?>
data_supplier += '</select></div></div>';
</script>
      </fieldset>
   </div>
   <div class="row">
      <fieldset class="span5">
        <legend>Platební podmínky</legend>

        <div class="control-group">
          <label class="control-label" for="forma_uhrady">Forma úhrady</label>
          <div class="controls">
            <select id="forma_uhrady" name="forma_uhrady">
                <option>Bankovním převodem</option>
                <option>Hotově</option>
            </select>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="bank_name">Banka</label>
          <div class="controls">
            <input type="text" id="bank_name" name="bank_name" value="<?php echo htmlSpecialChars($dodavatel->bank_name) ?>" readonly />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="bank_number">Číslo účtu</label>
          <div class="controls">
            <input type="text" id="bank_number" name="bank_number" value="<?php echo htmlSpecialChars($dodavatel->bank_number) ?>" readonly />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="variabilni_symbol">Variabilní s.</label>
          <div class="controls">
            <input type="text" id="variabilni_symbol" name="variabilni_symbol" />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="specificky_symbol">Specificky s.</label>
          <div class="controls">
            <input type="text" id="specificky_symbol" name="specificky_symbol" />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="konstatni_symbol">Konstantní s.</label>
          <div class="controls">
            <input type="text" id="konstatni_symbol" name="konstatni_symbol" style="width:40px" />
          </div>
        </div>
      </fieldset>

      <fieldset class="span5 offset1">
        <legend>Data</legend>

        <div class="control-group">
          <label class="control-label" for="vystaveni">Datum vystavení</label>
          <div class="controls">
            <input type="text" id="vystaveni" name="vystaveni" class="datepicker" value="<?php echo htmlSpecialChars($template->date(time(), '%d.%m.%Y')) ?>" />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="splatnost">Datum splatnosti</label>
          <div class="controls">
            <input type="text" id="splatnost" name="splatnost" class="datepicker" value="<?php echo htmlSpecialChars($template->date(time()+(14*24*60*60), '%d.%m.%Y')) ?>" />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="duzp">DUZP</label>
          <div class="controls">
            <input type="text" id="duzp" name="duzp" class="datepicker" />
          </div>
        </div>
      </fieldset>
    </div>
    <div class="row">
      <fieldset class="span12">
        <legend>Položky faktury</legend>
      <table id="polozky" class="table">
        <tr>
            <th>Kód</th>
            <th>Položka</th>
            <th>Počet</th>
            <th>MJ</th>
            <th>DPH</th>
            <th>Cena za MJ bez DPH</th>
            <th>Cena za MJ s DPH</th>
            <th></th>
        </tr>
      </table>
      <p>
      <a class="btn" onClick="Invoices_addItem()">Přidat položku</a>
      </fieldset>
    </div>
    <div class="row">
      <fieldset class="span12">
        <legend>Rekapitulace ceny</legend>
      <table id="rekapitulace" class="table">
        <tr>
            <td style="width:80%">Celkem bez DPH</td><td style="width:20%;text-align:right;" id="rekap_celkem_bez_dph">0,00 Kč</td>
        </tr>
        <tr>
            <td>DPH 14%</th><td style="text-align:right;" id="rekap_dph14">0,00 Kč</td>
        </tr>
        <tr>
            <td>DPH 20%</td><td style="text-align:right;" id="rekap_dph20">0,00 Kč</td>
        </tr>
        <tr>
            <th>Celkem</th><th style="text-align:right;" id="rekap_celkem">0,00 Kč</th>
        </tr>
      </table>
      </fieldset>
    </div>
    <div class="row">
          <center><input type="submit" name="new" class="btn" value="Vytvořit fakturu" /></center>
    </div>
    </form>
    </div> <!-- /container -->

<script>
Invoices_vydana = function ()
{
    $("#data-dodavatel").html(data_dodavatel);
    $("#data-odberatel").html(data_client);
    $("#bank_name").val(bank_name);
    $("#bank_number").val(bank_number);
}
Invoices_prijata = function ()
{
    $("#data-dodavatel").html(data_supplier);
    $("#data-odberatel").html(data_dodavatel);
}
Invoice_changePrijata = function (prijata) 
{
    if (parseInt(prijata) == 1) Invoices_prijata();
    if (parseInt(prijata) == 0) Invoices_vydana();
}
Invoices_vydana();

Invoice_editBank = function (id)
{
    $("#bank_name").val(bank_supplier[id]['bank_name']);
    $("#bank_number").val(bank_supplier[id]['bank_number']);
}

Invoices_getClientData = function (url)
{
    $.ajax({
      url: url,
      cache: false,
      dataType: 'json',
      success: function (payload) {
          if (payload.snippets) {
              for (var i in payload.snippets) {
                  $('#odberatel').html(payload.snippets[i]);
              }
          }
      }
    });
}
$(function() {
	$( "#vystaveni" ).datepicker($.datepicker.regional[ "cs" ])
	$( "#splatnost" ).datepicker($.datepicker.regional[ "cs" ])
	$( "#duzp" ).datepicker($.datepicker.regional[ "cs" ])
	Invoices_addItem()
});

var polozek = 0;
Invoices_addItem = function ()
{
    var i = polozek
    polozek++

    $("#polozky").append($('<tr id="polozka'+i+'"/>'))

    $("#polozka"+i).append($('<td id="polozka'+i+'-kod"/>'))
    $("#polozka"+i).append($('<td id="polozka'+i+'-polozka"/>'))
    $("#polozka"+i).append($('<td id="polozka'+i+'-pocet"/>'))
    $("#polozka"+i).append($('<td id="polozka'+i+'-mj"/>'))
    $("#polozka"+i).append($('<td id="polozka'+i+'-dph"/>'))
    $("#polozka"+i).append($('<td id="polozka'+i+'-cena-bez-dph"/>'))
    $("#polozka"+i).append($('<td id="polozka'+i+'-cena-s-dph"/>'))
    $("#polozka"+i).append($('<td id="polozka'+i+'-smaz"/>'))

    $("#polozka"+i+"-kod").append('<input style="width:30px" name="polozka'+i+'-kod-input">')
    $("#polozka"+i+"-polozka").append('<input style="width:280px" name="polozka'+i+'-jmeno-input" id="polozka'+i+'-jmeno-input">')
    $("#polozka"+i+"-pocet").append('<input onKeyUp="Invoices_rekap();" id="polozka'+i+'-pocet-input" name="polozka'+i+'-pocet-input"  style="width:50px" value="1">')
    $("#polozka"+i+"-mj").append('<input style="width:45px" value="kus" name="polozka'+i+'-mj-input">')
    $("#polozka"+i+"-dph").append('<select onChange="Invoices_rekap();Invoices_setPriceWithDPH(\''+i+'\');" id="polozka'+i+'-dph-input" name="polozka'+i+'-dph-input" style="width:60px"><option value="0">0%</option><option value="14">14%</option><option value="20">20%</option></select>')
    $("#polozka"+i+"-cena-bez-dph").append('<input id="polozka'+i+'-cena-bez-dph-input" name="polozka'+i+'-cena-bez-dph-input" style="width:130px" onKeyUp="Invoices_setPriceWithDPH(\''+i+'\')">')
    $("#polozka"+i+"-cena-s-dph").append('<input id="polozka'+i+'-cena-s-dph-input" name="polozka'+i+'-cena-s-dph-input" style="width:130px" onKeyUp="Invoices_setPriceWithoutDPH(\''+i+'\')">')
    if (i != 0) $("#polozka"+i+"-smaz").append('<p><a class="icon-trash" href="javascript:Invoices_deleteItem(\''+i+'\')" style="vertical-align:middle"></a> ')
}

Invoices_rekap = function ()
{
    var rekap_celkem_bez_dph = 0;
    var rekap_dph14 = 0;
    var rekap_dph20 = 0;
    var rekap_celkem = 0;

    for (var i=0;i<polozek;i++) {
        if ($("#polozka"+i+"-cena-bez-dph-input").val()) {
            var dph = parseInt($("#polozka"+i+"-dph-input").val());
            var pocet = parseFloat($("#polozka"+i+"-pocet-input").val());
            var celkem_bez_dph = parseFloat($("#polozka"+i+"-cena-bez-dph-input").val()) * pocet;
            var celkem = parseFloat($("#polozka"+i+"-cena-bez-dph-input").val()) * (1 + (dph/100)) * pocet;
            rekap_celkem_bez_dph += celkem_bez_dph;
            rekap_celkem += celkem
            switch (dph) {
                case 14:
                    rekap_dph14 += celkem - celkem_bez_dph;
                    break;
                case 20:
                    rekap_dph20 += celkem - celkem_bez_dph;
                    break;
            }
        }
    }
    $("#rekap_celkem_bez_dph").text(rekap_celkem_bez_dph.toMoney()+' Kč');
    $("#rekap_dph14").text(rekap_dph14.toMoney()+' Kč');
    $("#rekap_dph20").text(rekap_dph20.toMoney()+' Kč');
    $("#rekap_celkem").text(rekap_celkem.toMoney()+' Kč');
}

Invoices_setPriceWithDPH = function (item)
{
    var DPH = parseInt($("#polozka"+item+"-dph-input").val());
    var priceWithoutDPH = parseFloat($("#polozka"+item+"-cena-bez-dph-input").val());
    var priceWithDPH = priceWithoutDPH * (1+(DPH/100));
    $("#polozka"+item+"-cena-s-dph-input").val(parseInt(priceWithDPH*100)/100);

    Invoices_rekap();
}

Invoices_setPriceWithoutDPH = function (item)
{
    var DPH = parseInt($("#polozka"+item+"-dph-input").val());
    var priceWithDPH = parseFloat($("#polozka"+item+"-cena-s-dph-input").val());
    var priceWithoutDPH = priceWithDPH / (1+(DPH/100));
    $("#polozka"+item+"-cena-bez-dph-input").val(parseInt(priceWithoutDPH*100)/100);

    Invoices_rekap();
}

Invoices_deleteItem = function (item)
{
    $("#polozka"+item).remove();

    Invoices_rekap();
}

Invoice_changeVS = function (VS) 
{
    $('#variabilni_symbol').val(VS);
}

Number.prototype.toMoney = function(c, d, t){
var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d<?php echo Nette\Templating\Helpers::escapeJs(3) ?>)(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };

function validate (t) {
    if (t.number.value == '') {
        alert("Vyplňte číslo faktury");
        t.number.focus();
        return false;
    }
    if (t.client.value == '---') {
        alert("Zvolte zákazníka");
        t.client.focus();
        return false;
    }
    if (document.getElementById('polozka0-jmeno-input').value == '') {
        alert("Vyplňte alespoň jednu položku");
        document.getElementById('polozka0-jmeno-input').focus();
        return false;
    }
    return true;
}


</script>

<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 