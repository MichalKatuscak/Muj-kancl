<?php //netteCache[01]000381a:2:{s:4:"time";s:21:"0.40064900 1340532162";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:59:"/var/www/html/Muj kancl/app/templates/Projects/newBug.latte";i:2;i:1340532155;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: /var/www/html/Muj kancl/app/templates/Projects/newBug.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'w8ny0mapfs')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbe7a8cf1df9_content')) { function _lbe7a8cf1df9_content($_l, $_args) { extract($_args)
?>    <div class="container">
        <h2><a href="<?php echo htmlSpecialChars($_control->link("Projects:show", array($project->id_project))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($project->name, ENT_NOQUOTES) ?></a> - 
                <a href="<?php echo htmlSpecialChars($_control->link("Projects:task", array($task->id_project_task,$project->id_project))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($task->name, ENT_NOQUOTES) ?></a></h2>
<?php if (isset($msg)): ?><p><?php echo Nette\Templating\Helpers::escapeHtml($msg, ENT_NOQUOTES) ;endif ?>

    <form action="" method="POST" class="form-horizontal" onsubmit="return validate(this)">
        <div class="row">
            <div class="span7">   
                <fieldset>
                    <legend>Nová chyba</legend>
                    <div class="control-group">
                        <textarea rows="5" name="bug" required="required" style="width:530px"></textarea>
                    </div>
                </fieldset>
                <center><input type="submit" name="new" class="btn" value="Přidat chybu" /></center>
            </div>
        </div>
    </form> 
    </div>
<script>
    function validate (t) {
    if (t.bug.value == '') {
        alert("Vyplňte prosím popis chyby.");
        t.bug.focus();
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