<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.50340300 1340532264";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"/var/www/html/Muj kancl/app/templates/Projects/newTask.latte";i:2;i:1340532149;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: /var/www/html/Muj kancl/app/templates/Projects/newTask.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'qukao8kdeh')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb8ee79dac1e_content')) { function _lb8ee79dac1e_content($_l, $_args) { extract($_args)
?>    <div class="container">
        <h2><a href="<?php echo htmlSpecialChars($_control->link("Projects:show", array($project->id_project))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($project->name, ENT_NOQUOTES) ?></a></h2>
<?php if (isset($msg)): ?><p><?php echo Nette\Templating\Helpers::escapeHtml($msg, ENT_NOQUOTES) ;endif ?>

    <form action="" method="POST" class="form-horizontal" onsubmit="return validate(this)">
        <div class="row">
            <div class="span5">   
                <fieldset>
                    <legend>Nový úkol</legend>

                    <div class="control-group">
                    <label class="control-label" for="name">Jméno úkolu</label>
                    <div class="controls">
                        <input type="text" id="name" name="name" required="required" />
                    </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label" for="price_from_supplier" >Cena úkolu</label>
                    <div class="controls" style="white-space: nowrap;">
                        <input type="text" id="price_from_supplier" class="input-small" style="text-align:right" name="price_from_supplier" /> Kč
                    </div>
                    </div>
                </fieldset>
                <center><input type="submit" name="new" class="btn" value="Přidat úkol" /></center>
            </div>
            <div class="span7">   
                <fieldset>
                    <legend>Zadání</legend>
                    <div class="control-group">
                        <textarea rows="20" name="task" required="required" style="width:530px"></textarea>
                    </div>
                </fieldset>
            </div>
        </div>
    </form> 
    </div>
<script>
    function validate (t) {
    if (t.name.value == '') {
        alert("Vyplňte prosím jméno úkolu.");
        t.name.focus();
        return false;
    }
    if (t.task.value == '') {
        alert("Vyplňte prosím zadání.");
        t.task.focus();
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