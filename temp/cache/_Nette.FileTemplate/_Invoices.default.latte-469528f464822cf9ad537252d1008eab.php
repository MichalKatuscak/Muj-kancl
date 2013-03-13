<?php //netteCache[01]000403a:2:{s:4:"time";s:21:"0.21885600 1363161900";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:81:"C:\Program Files (x86)\xampp\htdocs\mujkancl\app\templates\Invoices\default.latte";i:2;i:1363161179;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\Program Files (x86)\xampp\htdocs\mujkancl\app\templates\Invoices\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '7stnagn45s')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb4d10fd598c_content')) { function _lb4d10fd598c_content($_l, $_args) { extract($_args)
?>    <div class="container">
<?php if ($user->group_id != 3): ?>
        <div class="row">
            <div class="span8">
                <div class="widget">
                <div class="widget-header">Nová faktura</div>
                    <p>               
<?php if ($limit < 1): ?>
                        Váš limit jste vyčerpal, nemůžete vytvořit novou fakturu.
<?php else: ?>
                    <a class="btn" href="<?php echo htmlSpecialChars($_control->link("Invoices:new")) ?>
">Vytvořit fakturu</a>
                        Zbývá vám <?php echo $limit==1000?"&infin;":$limit ?> faktur do vyčerpání měsíčního limitu.
<?php endif ?>
                    </p>
                </div>
            </div>
            <div class="span4">
            <div class="widget">
                <div class="widget-header">Vyhledávání</div>
                <div style="text-align:center;"><input type="text" style="margin:10px;" id="search" /></div>
            </div>
            </div>
        </div>
    
<div id="<?php echo $_control->getSnippetId('content') ?>"><?php call_user_func(reset($_l->blocks['_content']), $_l, $template->getParameters()) ?>
</div>
<?php else: ?>

<?php ob_start() ?>
<div class="widget">
<div class="widget-header">Faktury</div>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($invoices) as $invoice): if ($iterator->isFirst()): ?>
      <table class="table table-striped">
      <thead>
        <tr><th>Typ<th>Číslo faktury<th>Dodavatel<th>Datum vystaveni<th>Datum splatnosti<th>Cena celkem<th> <th> <th> 
      </thead>
<?php endif ?>
            <tr><td><?php echo Nette\Templating\Helpers::escapeHtml($invoice->type, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($invoice->number, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($invoice->client, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($invoice->vystaveni, '%d.%m.%Y'), ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($invoice->splatnost, '%d.%m.%Y'), ENT_NOQUOTES) ?>

            <td style="text-align:right"><?php echo Nette\Templating\Helpers::escapeHtml(number_format($invoice->celkem, 2, ',', ' '), ENT_NOQUOTES) ?> Kč
            <td>
<?php if ($invoice->splatnost < date("Y-m-d H:i:s",time()) && !$invoice->zaplaceno): ?>
                <span class="icon-exclamation-sign"></span>
<?php elseif ($invoice->zaplaceno): ?>
                <span class="icon-ok"></span>
<?php else: ?>
                <span class="icon-remove"></span>
<?php endif ?>
            <td><a class="icon-file" href="<?php echo htmlSpecialChars($_control->link("pdf", array($invoice->id_invoice))) ?>
"></a>
<?php if ($iterator->isLast()): ?>
        </table>
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
</div>
<?php ob_start() ?>
<p>
Žádná faktura nenalezena.
<?php if (isset($invoice) && $invoice) { ob_end_clean(); ob_end_flush(); } else { $_else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_else; } ?>

<?php endif ?>

    </div> <!-- /container -->
<script>
$("#search").live("keyup", function (event) {
    var search = this.value;
    $.get(<?php echo Nette\Templating\Helpers::escapeJs($_control->link("Invoices:default")) ?>+"?search="+search, function (payload) {
        $.nette.success(payload);
    });
});
</script>
<?php
}}

//
// block _content
//
if (!function_exists($_l->blocks['_content'][] = '_lb1fe8d1c836__content')) { function _lb1fe8d1c836__content($_l, $_args) { extract($_args); $_control->validateControl('content')
;ob_start() ?>
<div class="widget">
<div class="widget-header">Vydané faktury</div>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($invoices_v) as $invoice): if ($iterator->isFirst()): ?>
      <table class="table table-striped">
      <thead>
        <tr><th>Typ<th>Číslo faktury<th>Klient<th>Datum vystaveni<th>Datum splatnosti<th>Cena celkem<th> <th> <th> 
      </thead>
<?php endif ?>
            <tr><td><?php echo Nette\Templating\Helpers::escapeHtml($invoice->type, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($invoice->number, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($invoice->client, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($invoice->vystaveni, '%d.%m.%Y'), ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($invoice->splatnost, '%d.%m.%Y'), ENT_NOQUOTES) ?>

            <td style="text-align:right"><?php echo Nette\Templating\Helpers::escapeHtml(number_format($invoice->celkem, 2, ',', ' '), ENT_NOQUOTES) ?> Kč
            <td>
<?php if ($invoice->splatnost < date("Y-m-d H:i:s",time()) && !$invoice->zaplaceno): ?>
                <a class="icon-exclamation-sign" href="<?php echo htmlSpecialChars($_control->link("zaplaceno", array($invoice->id_invoice))) ?>
"></a>
<?php elseif ($invoice->zaplaceno): ?>
                <a id="myLink"
                data-confirm="modal"
                data-confirm-title="Potvrdit"
                data-confirm-header-class="btn-inverse"
                data-confirm-text="Opravdu chcete označit fakturu <strong><?php echo htmlSpecialChars($invoice->number) ?></strong> jako nezaplacenou?"
                data-confirm-cancel-class="btn-success"
                data-confirm-cancel-text="Zpět"
                data-confirm-ok-class="btn-danger"
                data-confirm-ok-text="Nezaplacená"
                class="icon-ok"
                 href="<?php echo htmlSpecialChars($_control->link("nezaplaceno", array($invoice->id_invoice))) ?>
"></a>
<?php else: ?>
                <a class="icon-remove" href="<?php echo htmlSpecialChars($_control->link("zaplaceno", array($invoice->id_invoice))) ?>
"></a>
<?php endif ?>
            <td><a class="icon-file" href="<?php echo htmlSpecialChars($_control->link("pdf", array($invoice->id_invoice))) ?>
"></a>
            <td>
<a id="myLink"
   data-confirm="modal"
   data-confirm-title="Potvrdit"
   data-confirm-header-class="btn-inverse"
   data-confirm-text="Opravdu chcete fakturu číslo <strong><?php echo htmlSpecialChars($invoice->number) ?></strong> smazat?"
   data-confirm-cancel-class="btn-success"
   data-confirm-cancel-text="Zpět"
   data-confirm-ok-class="btn-danger"
   data-confirm-ok-text="Smazat"
   class="icon-trash"
    href="<?php echo htmlSpecialChars($_control->link("delete", array($invoice->id_invoice))) ?>
"></a>
<?php if ($iterator->isLast()): ?>
        </table>
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
</div>
<?php ob_start() ?>
<p>
Žádná vydaná faktura nenalezena.
<?php if (isset($invoice) && $invoice) { ob_end_clean(); ob_end_flush(); } else { $_else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_else; } ?>

<?php ob_start() ?>
<div class="widget">
<div class="widget-header">Přijaté faktury</div>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($invoices_p) as $invoice): if ($iterator->isFirst()): ?>
      <table class="table table-striped">
      <thead>
        <tr><th>Typ<th>Číslo faktury<th>Dodavatel<th>Datum vystaveni<th>Datum splatnosti<th>Cena celkem<th> <th> <th> 
      </thead>
<?php endif ?>
            <tr><td><?php echo Nette\Templating\Helpers::escapeHtml($invoice->type, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($invoice->number, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($invoice->client, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($invoice->vystaveni, '%d.%m.%Y'), ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($invoice->splatnost, '%d.%m.%Y'), ENT_NOQUOTES) ?>

            <td style="text-align:right"><?php echo Nette\Templating\Helpers::escapeHtml(number_format($invoice->celkem, 2, ',', ' '), ENT_NOQUOTES) ?> Kč
            <td>
<?php if ($invoice->splatnost < date("Y-m-d H:i:s",time()) && !$invoice->zaplaceno): ?>
                <a class="icon-exclamation-sign" href="<?php echo htmlSpecialChars($_control->link("zaplaceno", array($invoice->id_invoice))) ?>
"></a>
<?php elseif ($invoice->zaplaceno): ?>
                <a id="myLink"
                data-confirm="modal"
                data-confirm-title="Potvrdit"
                data-confirm-header-class="btn-inverse"
                data-confirm-text="Opravdu chcete označit fakturu <strong><?php echo htmlSpecialChars($invoice->number) ?></strong> jako nezaplacenou?"
                data-confirm-cancel-class="btn-success"
                data-confirm-cancel-text="Zpět"
                data-confirm-ok-class="btn-danger"
                data-confirm-ok-text="Nezaplacená"
                class="icon-ok"
                 href="<?php echo htmlSpecialChars($_control->link("nezaplaceno", array($invoice->id_invoice))) ?>
"></a>
<?php else: ?>
                <a class="icon-remove" href="<?php echo htmlSpecialChars($_control->link("zaplaceno", array($invoice->id_invoice))) ?>
"></a>
<?php endif ?>
            <td><a class="icon-file" href="<?php echo htmlSpecialChars($_control->link("pdf", array($invoice->id_invoice))) ?>
"></a>
            <td>
<a id="myLink"
   data-confirm="modal"
   data-confirm-title="Potvrdit"
   data-confirm-header-class="btn-inverse"
   data-confirm-text="Opravdu chcete fakturu číslo <strong><?php echo htmlSpecialChars($invoice->number) ?></strong> smazat?"
   data-confirm-cancel-class="btn-success"
   data-confirm-cancel-text="Zpět"
   data-confirm-ok-class="btn-danger"
   data-confirm-ok-text="Smazat"
   class="icon-trash"
    href="<?php echo htmlSpecialChars($_control->link("delete", array($invoice->id_invoice))) ?>
"></a>
<?php if ($iterator->isLast()): ?>
        </table>
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
</div>
<?php ob_start() ?>
<p>
Žádná faktura nenalezena.
<?php if (isset($invoice) && $invoice) { ob_end_clean(); ob_end_flush(); } else { $_else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_else; } ?>

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