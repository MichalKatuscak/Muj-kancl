<?php //netteCache[01]000384a:2:{s:4:"time";s:21:"0.97257300 1341049804";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:62:"C:\xampp\htdocs\Muj kancl\app\templates\Projects\newFile.latte";i:2;i:1341049803;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\xampp\htdocs\Muj kancl\app\templates\Projects\newFile.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '4rau0acbne')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb1a2455ab98_content')) { function _lb1a2455ab98_content($_l, $_args) { extract($_args)
?>    <div class="container"> 
        <div class="row"><div class="span12 widget">
        <h2><span style="font-weight:normal">Projekt:</span>
        <a href="<?php echo htmlSpecialChars($_control->link("Projects:show", array($project->id_project))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($project->name, ENT_NOQUOTES) ?></a> - 
                <a href="<?php echo htmlSpecialChars($_control->link("Projects:task", array($task->id_project_task,$project->id_project))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($task->name, ENT_NOQUOTES) ?></a></h2> 
        </div></div>
<?php if (isset($msg)): ?><p><?php echo Nette\Templating\Helpers::escapeHtml($msg, ENT_NOQUOTES) ;endif ?>

    <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" onsubmit="return validate(this)">
        <div class="row">
            <div class="span12">   
              <div class="widget">
                <div class="widget-header">Nový soubor</div>
                    <p>Jediný možný formát pro uložení je <em><strong>*.zip</strong></em>
                    <div class="control-group">
                        <label class="control-label" for="file">Soubor</label>
                        <div class="controls">
                            <input type="file" name="file" id="file" accept="application/zip|application/octet-stream|application/x-zip|application/x-zip-compressed" />
                        </div>
                    </div>
<?php ob_start() ?>
                    <div class="control-group">
                        <label class="control-label">Opravuje chyby</label>
<?php $iterations = 0; foreach ($bugs as $bug): if (strtotime($bug->fixed)<0): ?>
                            
                                <div class="controls" style="white-space:nowrap">
                                    <input type="checkbox" name="bugs[]" value="<?php echo htmlSpecialChars($bug->id_bug) ?>
" id="bug<?php echo htmlSpecialChars($bug->id_bug) ?>" /><label style="display:inline;position:relative;top:3px; left:10px;" for="bug<?php echo htmlSpecialChars($bug->id_bug) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($bug->id_bug, ENT_NOQUOTES) ?>
) <?php echo Nette\Templating\Helpers::escapeHtml(substr($bug->bug,0,100), ENT_NOQUOTES) ?></label>
                                </div>
                            
<?php endif ;$iterations++; endforeach ?>
                    </div>
<?php if (isset($bug)) ob_end_flush(); else ob_end_clean() ?>
                    <div class="control-group">
                        <div class="controls" style="white-space:nowrap">
                            <input type="submit" name="new" class="btn" value="Přidat soubor" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form> 
    </div>
<script>
function validate (t) {
    if (t.file.value == '') {
        alert("Musíte nahrát soubor.");
        t.file.focus();
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