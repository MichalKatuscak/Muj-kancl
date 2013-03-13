<?php //netteCache[01]000381a:2:{s:4:"time";s:21:"0.11987800 1340354691";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:59:"/var/www/html/Muj kancl/app/templates/Summary/default.latte";i:2;i:1340354689;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: /var/www/html/Muj kancl/app/templates/Summary/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'sovkj2mb6w')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb2c3112c688_content')) { function _lb2c3112c688_content($_l, $_args) { extract($_args)
?>    <div class="container">
        <div class="row">
            <div class="span4">
                <table class="table table-bordered">
                    <thead>
                        <tr><th>Přehled za rok 2012</th>
                    </thead>
                    <tr><td>Zaplacených faktur: <td><?php echo Nette\Templating\Helpers::escapeHtml($num_invoices_paid, ENT_NOQUOTES) ?>
 <td style="text-align:right"><strong><?php echo Nette\Templating\Helpers::escapeHtml(number_format($price_invoices_paid, 2, ',', ' '), ENT_NOQUOTES) ?> Kč</strong>
                    <tr><td>Nezaplacených faktur: <td><?php echo Nette\Templating\Helpers::escapeHtml($num_invoices_unpaid, ENT_NOQUOTES) ?>
 <td style="text-align:right"><strong><?php echo Nette\Templating\Helpers::escapeHtml(number_format($price_invoices_unpaid, 2, ',', ' '), ENT_NOQUOTES) ?> Kč</strong>
                    <tr><td>Faktury po splatnosti: <td><?php echo Nette\Templating\Helpers::escapeHtml($num_invoices_unpaid_warning, ENT_NOQUOTES) ?>
 <td style="text-align:right"><strong><?php echo Nette\Templating\Helpers::escapeHtml(number_format($price_invoices_unpaid_warning, 2, ',', ' '), ENT_NOQUOTES) ?> Kč</strong>
                </table>
            </div>
            <div class="span8">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="610" height="140" style="margin-top:0px;margin-left:5px;">
<?php $iterations = 0; foreach ($months  as $month=>$data): ?>
                        <line x1="<?php echo htmlSpecialChars(50+(($month-1)*50)) ?>
" y1="20" x2="<?php echo htmlSpecialChars(50+(($month-1)*50)) ?>" y2="124"
                        style="stroke:#ddd;stroke-width:1" />
                        <text x="<?php echo htmlSpecialChars(45+(($month-1)*50)) ?>
" y="138" fill="#ddd" style="font-size:10px"><?php echo Nette\Templating\Helpers::escapeHtml($month, ENT_NOQUOTES) ?></text>
<?php $iterations++; endforeach ?>
                    <polyline points="
<?php $iterations = 0; foreach ($months  as $month=>$data): ?>
                        <?php echo htmlSpecialChars(50+(($month-1)*50)) ?> <?php echo htmlSpecialChars($data['point']+23) ?>,
<?php $iterations++; endforeach ?>
                    " style="fill:none;stroke:#333;stroke-width:2" />
                    
                    <rect width="600" height="124"
                    style="fill:none;stroke-width:1;stroke:#ddd" />
                    
                    <text x="2" y="15" fill="#333"><?php echo Nette\Templating\Helpers::escapeHtml(number_format($max_price, 2, ',', ' '), ENT_NOQUOTES) ?> Kč</text>
                    <text x="2" y="120" fill="#333"><?php echo Nette\Templating\Helpers::escapeHtml(number_format(0, 2, ',', ' '), ENT_NOQUOTES) ?> Kč</text>
                    
                    <line x1="50" y1="20" x2="600" y2="20"
                    style="stroke:#ddd;stroke-width:1" />
                    <line x1="50" y1="20" x2="50" y2="124"
                    style="stroke:#ddd;stroke-width:1" />
                </svg>
            </div>
        </div>
        <div class="row">
            <div class="span12">
            <table class="table table-bordered">
                <thead>
                    <tr><th colspan="13">Měsíční souhrny</th>
                </thead>
                <tr>
                    <th>Měsíc</th>
<?php $iterations = 0; foreach ($months as $data): ?>
                            <td style="text-align:right"><?php echo Nette\Templating\Helpers::escapeHtml($data['month'], ENT_NOQUOTES) ?></td>  
<?php $iterations++; endforeach ?>
                </tr>
                <tr>
                    <th>Počet faktur</th>
<?php $iterations = 0; foreach ($months as $data): ?>
                            <td style="text-align:right;font-size:10px;"><?php echo Nette\Templating\Helpers::escapeHtml($data['invoices'], ENT_NOQUOTES) ?></td>  
<?php $iterations++; endforeach ?>
                </tr>
                <tr>
                    <th>Příjem</th>
<?php $iterations = 0; foreach ($months as $data): ?>
                            <td style="text-align:right;font-size:10px;white-space: nowrap;"><?php echo Nette\Templating\Helpers::escapeHtml(number_format($data['price'], 0, ',', ' '), ENT_NOQUOTES) ?> Kč</td>  
<?php $iterations++; endforeach ?>
                </tr>
            </table>
            </div>
        </div>
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