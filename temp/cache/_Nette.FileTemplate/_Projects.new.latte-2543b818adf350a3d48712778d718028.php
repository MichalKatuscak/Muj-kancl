<?php //netteCache[01]000378a:2:{s:4:"time";s:21:"0.79944400 1340532749";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:56:"/var/www/html/Muj kancl/app/templates/Projects/new.latte";i:2;i:1340532748;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: /var/www/html/Muj kancl/app/templates/Projects/new.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'j35j2gp33r')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb8a5829dcd6_content')) { function _lb8a5829dcd6_content($_l, $_args) { extract($_args)
?>    <div class="container">
<?php if (isset($msg)): ?><p><?php echo Nette\Templating\Helpers::escapeHtml($msg, ENT_NOQUOTES) ;endif ?>

    <form action="" method="POST" class="form-horizontal" onsubmit="return validate(this)">
     <div class="span5">   
      <fieldset>
        <legend>Nový projekt</legend>
        
        <div class="control-group">
          <label class="control-label" for="name">Jméno projektu</label>
          <div class="controls">
            <input type="text" id="name" name="name" required />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="client_user_id">Klient</label>
          <div class="controls">
            <select id="client_user_id" name="client_user_id">
<?php $iterations = 0; foreach ($clients as $client): ?>
                    <option value="<?php echo htmlSpecialChars($client->id_user) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($client->last_name, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($client->first_name, ENT_NOQUOTES) ?></option>
<?php $iterations++; endforeach ?>
            </select>
          </div>
        </div>
      </fieldset>
<center><input type="submit" name="new" class="btn" value="Přidat projekt" /></center>
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