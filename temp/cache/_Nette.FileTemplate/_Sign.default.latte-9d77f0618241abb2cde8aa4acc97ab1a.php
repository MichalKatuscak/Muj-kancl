<?php //netteCache[01]000380a:2:{s:4:"time";s:21:"0.89848000 1340983175";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:58:"C:\xampp\htdocs\Muj kancl\app\templates\Sign\default.latte";i:2;i:1335881082;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\xampp\htdocs\Muj kancl\app\templates\Sign\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'aj8qgu6tuv')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb5880d00909_content')) { function _lb5880d00909_content($_l, $_args) { extract($_args)
?>    <div class="container">
      <form action="<?php echo htmlSpecialChars($_control->link("Sign:default")) ?>" name="sign" method="POST">
          <div class="hero-unit" style="width:400px;margin:auto;">
            <h1 style="font-family:Georgia;margin-bottom:20px;">Můj kancl</h1>
            <p>
            <?php if (isset($msg)): echo Nette\Templating\Helpers::escapeHtml($msg, ENT_NOQUOTES) ;endif ?>

            <p>
            <input type="text" name="username" placeholder="Uživatelské jméno" value="<?php if (isset($username)): echo htmlSpecialChars($username) ;endif ?>" class="span5" />
            <p>
            <input type="password" name="password" placeholder="Heslo" value="<?php if (isset($password)): echo htmlSpecialChars($password) ;endif ?>" class="span5" />
            <p>
            <input type="checkbox" name="remember" value="1" id="remember" /><label style="display:inline" for="remember"> Pamatovat přihlášení</label>
            <p><button class="btn btn-primary btn-large" onClick="document.forms.sign.submit();">Přihlásit se</button></p>
          </div>
      </form>

    </div> <!-- /container -->

<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb987dc00ad8_head')) { function _lb987dc00ad8_head($_l, $_args) { extract($_args)
;
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
$showPanel = 0 ;if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars())  ?>


<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()) ; 