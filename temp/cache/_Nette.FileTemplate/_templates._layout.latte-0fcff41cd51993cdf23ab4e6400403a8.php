<?php //netteCache[01]000398a:2:{s:4:"time";s:21:"0.30634700 1341402788";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:76:"/data/web/virtuals/21251/virtual/www/subdom/beta/app/templates/@layout.latte";i:2;i:1341402756;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: /data/web/virtuals/21251/virtual/www/subdom/beta/app/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'x2evavjmz7')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb95a07750b9_head')) { function _lb95a07750b9_head($_l, $_args) { extract($_args)
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
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title><?php if (isset($title)): echo Nette\Templating\Helpers::escapeHtml($title, ENT_NOQUOTES) ?>
 » <?php endif ?>Můj kancl</title>

	<link type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/css/smoothness/jquery-ui-1.8.19.custom.css" rel="stylesheet" />	
    <style type="text/css">
        body {
            padding-top: 110px;
            padding-bottom: 40px;
        }
        .brand {
            font-family:Georgia;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.png" type="image/png" />

	<script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-ui-1.8.19.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.ui.datepicker-cs.js"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.nette.js"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/confirmDialog.js"></script>
	<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body>
	<script> document.body.className+=' js' </script>
<?php extract(array('showPanel' => 1), EXTR_SKIP) ;if ($showPanel): ?>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner navbar-inner-first">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Můj kancl</a>
          <div class="nav-collapse">
            <ul class="nav" style="text-align:center">
              <?php if ($user->group_id == 1): ?><li<?php try { $_presenter->link("Homepage:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Homepage:default")) ?>
"><span class="icon-shopping-cart"></span> Administrátorský přehled</a></li><?php endif ?>

            </ul>
            <ul class="nav pull-right">
              <li><a title="<?php if ($user->group_id == 1): ?>(Administrátor)
<?php elseif ($user->group_id == 3): ?>(Klient)
<?php elseif ($user->group_id == 9): ?>(Demouživatel)
<?php else: ?>(Podnikatel)
<?php endif ?>" href="<?php echo htmlSpecialChars($_control->link("Settings:default")) ?>
"><span class="icon-user"></span> <span style="font-weight:normal"><?php echo Nette\Templating\Helpers::escapeHtml($user->first_name, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($user->last_name, ENT_NOQUOTES) ?></span></a></li>   
              <li><a title="Odhlásit" href="<?php echo htmlSpecialChars($_control->link("Sign:logout")) ?>
"><span class="icon-off"></span></a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>



      <div class="navbar-inner navbar-inner-second">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse">
<?php if ($user->group_id == 3): ?>
            <ul class="nav">
              <li<?php try { $_presenter->link("Projects:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Projects:default")) ?>
"><span class="icon-folder-open"></span><br />Projekty</a></li>     
              <li<?php try { $_presenter->link("Invoices:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Invoices:default")) ?>
"><span class="icon-list-alt"></span><br />Faktury</a></li>
              <li<?php try { $_presenter->link("Messagess:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Messagess:default")) ?>
"><span class="icon-comment"></span><br />Komunikace</a></li>   
            </ul>
<?php else: ?>
            <ul class="nav" style="text-align:center">
              <li<?php try { $_presenter->link("Summary:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Summary:default")) ?>
"><span class="icon-home"></span><br />Přehled</a></li> 
              <li<?php try { $_presenter->link("Projects:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Projects:default")) ?>
"><span class="icon-folder-open"></span><br />Projekty</a></li>     
              <li<?php try { $_presenter->link("Clients:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Clients:default")) ?>
"><span class="icon-user"></span><br />Klienti</a></li>
              <li<?php try { $_presenter->link("Suppliers:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Suppliers:default")) ?>
"><span class="icon-briefcase"></span><br />Dodavatelé</a></li>
              <li<?php try { $_presenter->link("Invoices:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Invoices:default")) ?>
"><span class="icon-list-alt"></span><br />Faktury</a></li><!--  
              <li<?php try { $_presenter->link("Warehouse:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 class="active"<?php endif ?>><a n:href="Warehouse:default"><span class="icon-th"></span><br />Sklad</a></li>  
              <li<?php try { $_presenter->link("Messagess:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 class="active"<?php endif ?>><a n:href="Messagess:default"><span class="icon-comment"></span><br />Komunikace</a></li>  
              <li<?php try { $_presenter->link("Cars:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 class="active"<?php endif ?>><a n:href="Cars:default"><span class="icon-book"></span><br />Kniha jízd</a></li>-->   
              <li<?php try { $_presenter->link("Settings:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Settings:default")) ?>
"><span class="icon-cog"></span><br />Nastavení</a></li>
            </ul>
<?php endif ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<?php endif ?>

<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7994362-10']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
