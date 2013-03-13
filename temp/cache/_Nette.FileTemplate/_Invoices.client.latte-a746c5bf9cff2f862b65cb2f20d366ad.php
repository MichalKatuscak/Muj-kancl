<?php //netteCache[01]000383a:2:{s:4:"time";s:21:"0.73953300 1336396961";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:61:"C:\xampp\htdocs\Muj kancl\app\templates\Invoices\client.latte";i:2;i:1335881081;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\xampp\htdocs\Muj kancl\app\templates\Invoices\client.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'se94oxslia')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block _content
//
if (!function_exists($_l->blocks['_content'][] = '_lb800f8b4e82__content')) { function _lb800f8b4e82__content($_l, $_args) { extract($_args); $_control->validateControl('content')
?>        <input name="dodavatel" type="hidden" value="<?php echo htmlSpecialChars($client->id_user) ?>" />
        <div class="control-group">
            <label class="control-label" for="d_address">Adresa</label>
            <div class="controls">
                <textarea rows="3" id="d_address" name="d_address" readonly><?php echo Nette\Templating\Helpers::escapeHtml($client->address, ENT_NOQUOTES) ?></textarea>
            </div>
        </div> 
            
        <div class="control-group">
          <label class="control-label" for="d_phone">Telefon</label>
          <div class="controls">
            <input type="text" id="d_phone" name="d_phone" value="<?php echo htmlSpecialChars($client->phone) ?>" readonly />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="d_email">Email</label>
          <div class="controls">
            <input type="text" id="d_email" name="d_email" value="<?php echo htmlSpecialChars($client->email) ?>" readonly />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="ic">IČ</label>
          <div class="controls">
            <input type="text" id="d_ic" name="d_ic" value="<?php echo htmlSpecialChars($client->ic) ?>" readonly />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="d_dic">DIČ</label>
          <div class="controls">
            <input type="text" id="d_dic" name="d_dic" value="<?php echo htmlSpecialChars($client->dic) ?>" readonly />
          </div>
        </div>
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); } ?>
<div id="<?php echo $_control->getSnippetId('content') ?>"><?php call_user_func(reset($_l->blocks['_content']), $_l, $template->getParameters()) ?>
</div>