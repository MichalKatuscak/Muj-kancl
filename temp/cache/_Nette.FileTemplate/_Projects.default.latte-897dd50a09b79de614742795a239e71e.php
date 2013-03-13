<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.06746300 1340609409";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"/var/www/html/Muj kancl/app/templates/Projects/default.latte";i:2;i:1340609392;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: /var/www/html/Muj kancl/app/templates/Projects/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ujirgc79zd')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb448c966808_content')) { function _lb448c966808_content($_l, $_args) { extract($_args)
?>    <div class="container">
<?php if ($user->group_id != 3): ?>
    <p>
<?php if ($limit < 1): ?>
        Váš limit jste vyčerpal, nemůžete vytvořit nový projekt. 
<?php else: ?>
      <a class="btn" href="<?php echo htmlSpecialChars($_control->link("new")) ?>
">Vytvořit projekt</a>
        Zbývá vám <?php echo $limit==1000?"&infin;":$limit ?> <?php if ($limit==1): ?>
projekt<?php elseif ($limit>=2 && $limit <=4): ?>projekty<?php else: ?>projektů<?php endif ?> do vyčerpání limitu.
<?php endif ?>
    </p>
<?php endif ;ob_start() ?>

<?php $iterations = 0; foreach ($projects as $project): ?>
<div class="row">
<div class="span12">
<table class="table table-bordered" style="width:auto;">
<tr><th style="font-size:200%;"><a href="<?php echo htmlSpecialChars($_control->link("Projects:show", array($project->id_project))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($project->name, ENT_NOQUOTES) ?></a>
<?php if ($user->group_id != 3): ?>
    <td><a id="myLink"
    data-confirm="modal"
    data-confirm-title="Potvrdit"
    data-confirm-header-class="btn-inverse"
    data-confirm-text="Opravdu chcete project <strong><?php echo htmlSpecialChars($project->name) ?></strong> smazat?"
    data-confirm-cancel-class="btn-success"
    data-confirm-cancel-text="Zpět"
    data-confirm-ok-class="btn-danger"
    data-confirm-ok-text="Smazat"
    class="icon-trash"
     href="<?php echo htmlSpecialChars($_control->link("delete", array($project->id_project))) ?>
"></a>
<?php endif ?>
</table>
</div>
</div>
<?php $iterations++; endforeach ;ob_start() ?>
<p>
Nenalezen žádný projekt.
<?php if (isset($project) && $project) { ob_end_clean(); ob_end_flush(); } else { $_else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_else; } ?>

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