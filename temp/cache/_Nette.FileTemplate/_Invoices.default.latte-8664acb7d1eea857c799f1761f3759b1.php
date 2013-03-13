<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.83088100 1340608272";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"/var/www/html/Muj kancl/app/templates/Invoices/default.latte";i:2;i:1340608271;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: /var/www/html/Muj kancl/app/templates/Invoices/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'gp3h2i9qx3')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb678164306d_content')) { function _lb678164306d_content($_l, $_args) { extract($_args)
?>    <div class="container">
<?php if ($user->group_id != 3): ?>
    <p>               
<?php if ($limit < 1): ?>
        Váš limit jste vyčerpal, nemůžete vytvořit novou fakturu.
<?php else: ?>
      <a class="btn" href="<?php echo htmlSpecialChars($_control->link("Invoices:new")) ?>
">Vytvořit fakturu</a>
        Zbývá vám <?php echo $limit==1000?"&infin;":$limit ?> faktur do vyčerpání měsíčního limitu.
<?php endif ?>
    </p>
      
<h2>Vydané</h2>
<?php ob_start() ;$iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($invoices_v) as $invoice): if ($iterator->isFirst()): ?>
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
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;ob_start() ?>
<p>
Žádná faktura nenalezena.
<?php if (isset($invoice) && $invoice) { ob_end_clean(); ob_end_flush(); } else { $_else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_else; } ?>

<h2>Přijaté</h2>
<?php ob_start() ;$iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($invoices_p) as $invoice): if ($iterator->isFirst()): ?>
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
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;ob_start() ?>
<p>
Žádná faktura nenalezena.
<?php if (isset($invoice) && $invoice) { ob_end_clean(); ob_end_flush(); } else { $_else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_else; } ?>

<?php else: ?>

<?php ob_start() ;$iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($invoices) as $invoice): if ($iterator->isFirst()): ?>
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
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;ob_start() ?>
<p>
Žádná faktura nenalezena.
<?php if (isset($invoice) && $invoice) { ob_end_clean(); ob_end_flush(); } else { $_else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_else; } ?>

<?php endif ?>

    </div> <!-- /container -->

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