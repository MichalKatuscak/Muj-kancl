<?php //netteCache[01]000378a:2:{s:4:"time";s:21:"0.61221600 1340609155";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:56:"/var/www/html/Muj kancl/app/templates/Clients/edit.latte";i:2;i:1335881079;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: /var/www/html/Muj kancl/app/templates/Clients/edit.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'o7dydykgj4')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb1954fee0a7_content')) { function _lb1954fee0a7_content($_l, $_args) { extract($_args)
?>    <div class="container">
<?php if (isset($msg)): ?><p><?php echo Nette\Templating\Helpers::escapeHtml($msg, ENT_NOQUOTES) ;endif ?>

<?php if ($client): ?>
    <form action="" method="POST" class="form-horizontal">
    <div class="row">
      <fieldset class="span5">
        <legend>Klient</legend>
        <div class="control-group">
          <label class="control-label" for="first_name">Jméno</label>
          <div class="controls">
            <input type="text" id="first_name" name="first_name" value="<?php echo htmlSpecialChars($client->first_name) ?>" />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="last_name">Příjmení</label>
          <div class="controls">
            <input type="text" id="last_name" name="last_name" value="<?php echo htmlSpecialChars($client->last_name) ?>" />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="ic">IČ</label>
          <div class="controls">
            <input type="text" id="ic" name="ic" value="<?php echo htmlSpecialChars($client->ic) ?>" />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="dic">DIČ</label>
          <div class="controls">
            <input type="text" id="dic" name="dic" value="<?php echo htmlSpecialChars($client->dic) ?>" />
          </div>
        </div>
      </fieldset>
      
      <fieldset class="span5 offset1">
        <legend>Vlastní poznámka</legend>
        <div class="control-group">
            <textarea class="input-xlarge" style="width:98%;" rows="5" name="note"><?php echo Nette\Templating\Helpers::escapeHtml($client->note, ENT_NOQUOTES) ?></textarea>
        </div>
      </fieldset>
   </div>
   <div class="row">   
      <fieldset class="span5">
        <legend>Kontaktní údaje</legend>
        
        <div class="control-group">
          <label class="control-label" for="phone">Telefon</label>
          <div class="controls">
            <input type="text" id="phone" name="phone" value="<?php echo htmlSpecialChars($client->phone) ?>" />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="email">Email</label>
          <div class="controls">
            <input type="text" id="email" name="email" value="<?php echo htmlSpecialChars($client->email) ?>" />
          </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="address">Adresa</label>
            <div class="controls">
                <textarea rows="3" id="address" name="address"><?php echo Nette\Templating\Helpers::escapeHtml($client->address, ENT_NOQUOTES) ?></textarea>
            </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="www">WWW</label>
          <div class="controls">
            <input type="text" id="www" name="www" value="<?php echo htmlSpecialChars($client->www) ?>" />
          </div>
        </div>
      </fieldset>
      
      <fieldset class="span5 offset1">
        <legend>Bankovní údaje</legend>
        
        <div class="control-group">
          <label class="control-label" for="bank_name">Banka</label>
          <div class="controls">
            <input type="text" id="bank_name" name="bank_name" value="<?php echo htmlSpecialChars($client->bank_name) ?>" />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="bank_number">Číslo účtu</label>
          <div class="controls">
            <input type="text" id="bank_number" name="bank_number" value="<?php echo htmlSpecialChars($client->bank_number) ?>" />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="swift_code">Swift kód</label>
          <div class="controls">
            <input type="text" id="swift_code" name="swift_code" value="<?php echo htmlSpecialChars($client->swift_code) ?>" />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="iban">IBAN</label>
          <div class="controls">
            <input type="text" id="iban" name="iban" value="<?php echo htmlSpecialChars($client->iban) ?>" />
          </div>
        </div>
      </fieldset>
    </div>
    <div id="row">
          <center><input type="submit" name="save" class="btn" value="Uložit údaje" /></center>
    </div>
    </form> 
<?php else: ?>
<h2>Zákazník neexistuje.</h2>
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