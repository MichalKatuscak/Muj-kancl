<?php //netteCache[01]000380a:2:{s:4:"time";s:21:"0.33253200 1338891534";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:58:"C:\xampp\htdocs\Muj kancl\app\templates\Cars\default.latte";i:2;i:1338891466;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\xampp\htdocs\Muj kancl\app\templates\Cars\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'drb3is0w95')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb03f8a9c215_content')) { function _lb03f8a9c215_content($_l, $_args) { extract($_args)
?>    <div class="container">
    <p>
<?php if ($limit < 1): ?>
        Váš limit jste vyčerpal, nemůžete vytvořit nového klienta. 
<?php else: ?>
      <a class="btn" href="<?php echo htmlSpecialChars($_control->link("new")) ?>
">Přidat klienta</a>
        Zbývá vám <?php echo $limit==1000?"&infin;":$limit ?> klientů do vyčerpání limitu.
<?php endif ?>
    </p>
<?php if ($clients->fetch()): ?>
    <table class="table table-striped">
      <thead>
        <tr><th>Jméno klienta<th>Telefon<th>Email<th> <th> 
      </thead>
<?php $iterations = 0; foreach ($clients as $client): ?>
            <tr><td><?php echo Nette\Templating\Helpers::escapeHtml($client->last_name, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($client->first_name, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($client->phone, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($client->email, ENT_NOQUOTES) ?>

            <td><a class="icon-pencil" href="<?php echo htmlSpecialChars($_control->link("edit", array($client->id_user))) ?>
"></a>
            <td>
<a id="myLink"
   data-confirm="modal"
   data-confirm-title="Potvrdit"
   data-confirm-header-class="btn-inverse"
   data-confirm-text="Opravdu chcete uživatele <strong><?php echo htmlSpecialChars($client->last_name) ?>
 <?php echo htmlSpecialChars($client->first_name) ?></strong> smazat?"
   data-confirm-cancel-class="btn-success"
   data-confirm-cancel-text="Zpět"
   data-confirm-ok-class="btn-danger"
   data-confirm-ok-text="Smazat"
   class="icon-trash"
    href="<?php echo htmlSpecialChars($_control->link("delete", array($client->id_user))) ?>
"></a>
<?php $iterations++; endforeach ?>
    </table>
                 
<?php else: ?>
<p>
Nenalezen žádný klient.
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