<?php //netteCache[01]000385a:2:{s:4:"time";s:21:"0.89152800 1341401536";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:63:"C:\xampp\htdocs\Muj kancl\app\templates\Suppliers\default.latte";i:2;i:1341401528;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\xampp\htdocs\Muj kancl\app\templates\Suppliers\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'jqfkmvyh8x')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb87f5b0be34_content')) { function _lb87f5b0be34_content($_l, $_args) { extract($_args)
?>    <div class="container">
        <div class="row">
            <div class="span8">
                <div class="widget">
                    <div class="widget-header">Nový dodavatel</div>
                    <p>
<?php if ($limit < 1): ?>
                        Váš limit jste vyčerpal, nemůžete vytvořit nového dodavatele. 
<?php else: ?>
                    <a class="btn" href="<?php echo htmlSpecialChars($_control->link("new")) ?>
">Přidat dodavatele</a>
                        Zbývá vám <?php echo $limit==1000?"&infin;":$limit ?> dodavatelů do vyčerpání limitu.
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
    $.get(<?php echo Nette\Templating\Helpers::escapeJs($_control->link("Suppliers:default")) ?>+"?search="+search, function (payload) {
        $.nette.success(payload);
    });
});
</script>
<?php
}}

//
// block _content
//
if (!function_exists($_l->blocks['_content'][] = '_lb28cf817158__content')) { function _lb28cf817158__content($_l, $_args) { extract($_args); $_control->validateControl('content')
;ob_start() ?>
        <div class="widget">
            <div class="widget-header">Adresář dodavatelů</div>
            <table class="table table-striped">
              <thead>
                <tr><th>Jméno klienta<th>Telefon<th>Email<th> <th> 
              </thead>
<?php $iterations = 0; foreach ($clients as $client): ?>
                    <tr><td style="width:50%"><?php echo Nette\Templating\Helpers::escapeHtml($client->first_name, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($client->last_name, ENT_NOQUOTES) ?>

                    <td style="white-space:nowrap"><?php echo Nette\Templating\Helpers::escapeHtml($client->phone, ENT_NOQUOTES) ?>

                    <td style="white-space:nowrap"><?php echo Nette\Templating\Helpers::escapeHtml($client->email, ENT_NOQUOTES) ?>

                    <td style="width:20px;"><a class="icon-pencil" href="<?php echo htmlSpecialChars($_control->link("edit", array($client->id_user))) ?>
"></a>
                    <td style="width:20px;">
        <a id="myLink"
           data-confirm="modal"
           data-confirm-title="Potvrdit"
           data-confirm-header-class="btn-inverse"
           data-confirm-text="Opravdu chcete dodavatele <strong><?php echo htmlSpecialChars($client->first_name) ;echo htmlSpecialChars($client->last_name) ?></strong> smazat?"
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
Nenalezen žádný dodavatel.
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