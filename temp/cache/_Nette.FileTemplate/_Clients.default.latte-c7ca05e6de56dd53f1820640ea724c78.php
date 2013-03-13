<?php //netteCache[01]000383a:2:{s:4:"time";s:21:"0.97655900 1341401129";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:61:"C:\xampp\htdocs\Muj kancl\app\templates\Clients\default.latte";i:2;i:1341401128;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\xampp\htdocs\Muj kancl\app\templates\Clients\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '39799gzz22')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbf1fdbdc8bf_content')) { function _lbf1fdbdc8bf_content($_l, $_args) { extract($_args)
?>    <div class="container">
        <div class="row">
            <div class="span8">
            <div class="widget">
                <div class="widget-header">Nový klient</div>
                <p>
<?php if ($limit < 1): ?>
                    Váš limit jste vyčerpal, nemůžete vytvořit nového klienta. 
<?php else: ?>
                <a class="btn" href="<?php echo htmlSpecialChars($_control->link("new")) ?>
">Přidat klienta</a>
                    Zbývá vám <?php echo $limit==1000?"&infin;":$limit ?> klientů do vyčerpání limitu.
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
    </div> <!-- /container -->
<script>
$("#search").live("keyup", function (event) {
    var search = this.value;
    $.get(<?php echo Nette\Templating\Helpers::escapeJs($_control->link("Clients:default")) ?>+"?search="+search, function (payload) {
        $.nette.success(payload);
    });
});
</script>
<?php
}}

//
// block _content
//
if (!function_exists($_l->blocks['_content'][] = '_lbc36c3df532__content')) { function _lbc36c3df532__content($_l, $_args) { extract($_args); $_control->validateControl('content')
;ob_start() ?>
        <div class="widget">
            <div class="widget-header">Klienti</div>
    <table class="table table-striped">
      <thead>
        <tr><th>Jméno klienta<th>Telefon<th>Email<th><acronym title="Vygeneruje přístup ke společným fakturám a projektům.">Vygenerovat přístup</acronym><th> <th> 
      </thead>
<?php $iterations = 0; foreach ($clients as $client): ?>
            <tr><td style="width:50%"><?php echo Nette\Templating\Helpers::escapeHtml($client->first_name, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($client->last_name, ENT_NOQUOTES) ?>

            <td style="white-space:nowrap"><?php echo Nette\Templating\Helpers::escapeHtml($client->phone, ENT_NOQUOTES) ?>

            <td style="white-space:nowrap"><?php echo Nette\Templating\Helpers::escapeHtml($client->email, ENT_NOQUOTES) ?>

            <td style="white-space:nowrap"><?php if ($client->email !=''): if ($client->login == ''): ?><a
   data-confirm="modal"
   data-confirm-title="Potvrdit"
   data-confirm-header-class="btn-inverse"
   data-confirm-text="Opravdu chcete klientu <strong><?php echo htmlSpecialChars($client->first_name) ?>
 <?php echo htmlSpecialChars($client->last_name) ?></strong> vygenerovat přístup? Přihlašovací údaju mu okamžitě přijdou emailem."
   data-confirm-cancel-class="btn-success"
   data-confirm-cancel-text="Zpět"
   data-confirm-ok-class="btn-danger"
   data-confirm-ok-text="Ano vygenerovat" href="<?php echo htmlSpecialChars($_control->link("generate", array($client->id_user))) ?>
">Vygenerovat přístup</a><?php else: ?>Přistup vygenerován<?php endif ;endif ?>

            <td><a class="icon-pencil" href="<?php echo htmlSpecialChars($_control->link("edit", array($client->id_user))) ?>
"></a>
            <td>
<a id="myLink"
   data-confirm="modal"
   data-confirm-title="Potvrdit"
   data-confirm-header-class="btn-inverse"
   data-confirm-text="Opravdu chcete klienta <strong><?php echo htmlSpecialChars($client->first_name) ?>
 <?php echo htmlSpecialChars($client->last_name) ?></strong> smazat?"
   data-confirm-cancel-class="btn-success"
   data-confirm-cancel-text="Zpět"
   data-confirm-ok-class="btn-danger"
   data-confirm-ok-text="Smazat"
   class="icon-trash"
    href="<?php echo htmlSpecialChars($_control->link("delete", array($client->id_user))) ?>
"></a>
<?php $iterations++; endforeach ?>
    </table>   
    </div>
                 
<?php ob_start() ?>
<p>
Nenalezen žádný klient.
<?php if (isset($client)) { ob_end_clean(); ob_end_flush(); } else { $_else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_else; } 
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