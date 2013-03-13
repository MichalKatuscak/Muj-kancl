<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.07309400 1340199585";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"/var/www/html/Muj kancl/app/templates/Homepage/default.latte";i:2;i:1335882441;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: /var/www/html/Muj kancl/app/templates/Homepage/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'j3erj7g55c')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbfff90e24d5_content')) { function _lbfff90e24d5_content($_l, $_args) { extract($_args)
?>    <div class="container">
    
    <table class="table table-striped">
      <thead>
        <tr><th>Jméno klienta<th>Email<th>Má platit<th>Typ účtu<th>Zaplaceno do<th> <th> <th>
      </thead>
<?php $iterations = 0; foreach ($notPay as $client): ?>
            <tr><td><?php echo Nette\Templating\Helpers::escapeHtml($client->last_name, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($client->first_name, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($client->email, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($client->money, ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($client->paid_to, '%d.%m.%Y'), ENT_NOQUOTES) ?>

            <td><?php echo Nette\Templating\Helpers::escapeHtml($client->type, ENT_NOQUOTES) ?>

            <td><a class="btn" href="<?php echo htmlSpecialChars($_control->link("extend", array($client->id_user))) ?>
">Prodloužit</a>
            <td><?php if ($client->login == false): ?><a class="btn" href="<?php echo htmlSpecialChars($_control->link("gen", array($client->id_user))) ?>
">Gen</a><?php endif ?>

            <?php if ($client->login == true): ?><a class="btn btn-inverse" href="<?php echo htmlSpecialChars($_control->link("gen", array($client->id_user))) ?>
">Gen</a><?php endif ?>

            <td><a href="<?php echo htmlSpecialChars($_control->link("block", array($client->id_user))) ?>
" class="btn<?php echo $client->blocked?' btn-danger">Odblokovat':'">Zablokovat' ?></a>
<?php $iterations++; endforeach ?>
    </table>
           
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