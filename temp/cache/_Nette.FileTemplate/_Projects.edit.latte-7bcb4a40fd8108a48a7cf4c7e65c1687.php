<?php //netteCache[01]000403a:2:{s:4:"time";s:21:"0.70278700 1342681387";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:81:"/data/web/virtuals/21251/virtual/www/subdom/app/app/templates/Projects/edit.latte";i:2;i:1342268506;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: /data/web/virtuals/21251/virtual/www/subdom/app/app/templates/Projects/edit.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'hl5ydjdwv1')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb3d45ce1116_content')) { function _lb3d45ce1116_content($_l, $_args) { extract($_args)
?>    <div class="container">
<?php if (isset($msg)): ?>
        <div class="row"><div class="span6 widget"><p><?php echo Nette\Templating\Helpers::escapeHtml($msg, ENT_NOQUOTES) ?></div></div>
<?php endif ?>
    <form action="" method="POST" class="form-horizontal" onsubmit="return validate(this)">
    <div class="row">
     <div class="span6">   
        <div class="widget">
            <div class="widget-header">Úprava projektu</div>
        
        <div class="control-group">
          <label class="control-label" for="name">Jméno projektu</label>
          <div class="controls">
            <input type="text" id="name" name="name" value="<?php echo htmlSpecialChars($project->name) ?>" required />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="client_user_id">Klient</label>
          <div class="controls">
            <select id="client_user_id" name="client_user_id">
                    <option value="0">žádný</option>
<?php $iterations = 0; foreach ($clients as $client): ?>
                    <option value="<?php echo htmlSpecialChars($client->id_user) ?>
"<?php if ($project->client_user_id == $client->id_user): ?> selected<?php endif ?>
><?php echo Nette\Templating\Helpers::escapeHtml($client->first_name, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($client->last_name, ENT_NOQUOTES) ?></option>
<?php $iterations++; endforeach ?>
            </select>
          </div>
<center style="margin-top:20px"><input type="submit" name="edit" class="btn" value="Uložit projekt" /></center>   
        </div> 
      </div>
    </div>
    </div>
    </form> 
    </div>
<script>
    function validate (t) {
    if (t.name.value == '') {
        alert("Vyplňte prosím jméno projektu.");
        t.name.focus();
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