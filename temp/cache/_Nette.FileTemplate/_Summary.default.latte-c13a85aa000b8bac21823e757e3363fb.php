<?php //netteCache[01]000406a:2:{s:4:"time";s:21:"0.38730700 1341402851";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:84:"/data/web/virtuals/21251/virtual/www/subdom/beta/app/templates/Summary/default.latte";i:2;i:1341402759;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: /data/web/virtuals/21251/virtual/www/subdom/beta/app/templates/Summary/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '1wdz44dvqr')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb540051f7d3_content')) { function _lb540051f7d3_content($_l, $_args) { extract($_args)
?>    <div class="container">
        <div class="row">
            <div class="span4">
                <div class="widget">
                    <div class="widget-header"><span class="icon-home"></span>&nbsp;&nbsp;Přehled za rok 2012</div>
                    <table class="table">
                        <tr><td>Zaplacených faktur: <td><?php echo Nette\Templating\Helpers::escapeHtml($num_invoices_paid, ENT_NOQUOTES) ?>
 <td style="text-align:right"><strong><?php echo Nette\Templating\Helpers::escapeHtml(number_format($price_invoices_paid, 2, ',', ' '), ENT_NOQUOTES) ?> Kč</strong>
                        <tr><td>Nezaplacených faktur: <td><?php echo Nette\Templating\Helpers::escapeHtml($num_invoices_unpaid, ENT_NOQUOTES) ?>
 <td style="text-align:right"><strong><?php echo Nette\Templating\Helpers::escapeHtml(number_format($price_invoices_unpaid, 2, ',', ' '), ENT_NOQUOTES) ?> Kč</strong>
                        <tr><td>Faktury po splatnosti: <td><?php echo Nette\Templating\Helpers::escapeHtml($num_invoices_unpaid_warning, ENT_NOQUOTES) ?>
 <td style="text-align:right"><strong><?php echo Nette\Templating\Helpers::escapeHtml(number_format($price_invoices_unpaid_warning, 2, ',', ' '), ENT_NOQUOTES) ?> Kč</strong>
                        <tr><td><strong>Celkem</strong>: <td><strong><?php echo Nette\Templating\Helpers::escapeHtml($num_invoices_unpaid_warning+$num_invoices_unpaid+$num_invoices_paid, ENT_NOQUOTES) ?>
</strong> <td style="text-align:right"><strong><?php echo Nette\Templating\Helpers::escapeHtml(number_format($price_invoices_unpaid_warning+$price_invoices_unpaid+$price_invoices_paid, 2, ',', ' '), ENT_NOQUOTES) ?> Kč</strong>
                    </table>
                </div>
            </div>
            <div class="span8">  
                <div class="widget">
                    <div class="widget-header">Faktury za rok 2012</div>
                    
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="610" height="137" style="margin-top:0px;margin-left:5px;">
<?php $iterations = 0; foreach ($months  as $month=>$data): ?>
                                <line x1="<?php echo htmlSpecialChars(50+(($month-1)*50)) ?>
" y1="20" x2="<?php echo htmlSpecialChars(50+(($month-1)*50)) ?>" y2="124"
                                style="stroke:#ddd;stroke-width:1" />
                                <text x="<?php echo htmlSpecialChars(45+(($month-1)*50)) ?>
" y="137" fill="#ddd" style="font-size:10px"><?php echo Nette\Templating\Helpers::escapeHtml($month, ENT_NOQUOTES) ?></text>
<?php $iterations++; endforeach ?>
                            <polyline points="
<?php $iterations = 0; foreach ($months  as $month=>$data): ?>
                                <?php echo htmlSpecialChars(50+(($month-1)*50)) ?>
 <?php echo htmlSpecialChars($data['point']+23) ?>,
<?php $iterations++; endforeach ?>
                            " style="fill:none;stroke:#333;stroke-width:2" />
                            
                            
                            <text x="2" y="15" fill="#333"><?php echo Nette\Templating\Helpers::escapeHtml(number_format($max_price, 2, ',', ' '), ENT_NOQUOTES) ?> Kč</text>
                            <text x="2" y="120" fill="#333"><?php echo Nette\Templating\Helpers::escapeHtml(number_format(0, 2, ',', ' '), ENT_NOQUOTES) ?> Kč</text>
                            
                            <line x1="50" y1="20" x2="600" y2="20"
                            style="stroke:#ddd;stroke-width:1" />
                            <line x1="50" y1="20" x2="50" y2="124"
                            style="stroke:#ddd;stroke-width:1" />
                        </svg>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">Měsíční souhrny</div>
                    <table class="table">
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
        </div>
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">Lístečky</div>
                    <div style="width:202px;height:172px;float:left;margin: 10px 0 0 10px;padding:10px 10px 0 10px;box-shadow:0 0 2px #555;">
                        <h4 style="margin-bottom:8px;">Nový lísteček</h4>
                        <form action="" method="post" style="margin:0;padding:0;" onsubmit="if($('#text').val() =='') { alert('Musíte vyplnit text lístečku'); $('#text').focus(); return false; }"> 
                            <textarea name="text" id="text" rows="5" style="width:192px;height:90px;color:#000;" required></textarea>
                            <select name="color" style="width:102px;float:left;" onchange="$('#todoText').css('background-color','#'+this.value)">
                                <option value="fff">Bílý</option>
                                <option value="ff9">Žlutý</option>
                                <option value="9f9">Zelený</option>
                                <option value="f99">Červený</option>
                                <option value="7bf">Modrý</option>
                            </select>
                            <input class="btn" type="submit" name="newTODO" value="Přidat" style="margin-left:10px;width:90px" />
                            
                        </form>
                    </div>
<?php ob_start() ;$iterations = 0; foreach ($todo as $item): ?>
    <div style="position:relative;width:200px;height:160px;float:left;margin: 10px 0 0 10px;padding:11px;box-shadow:0 0 2px #555;color:#000;background-color:#<?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeCss($item->color)) ?>">
        <p><?php echo Nette\Templating\Helpers::escapeHtml($item->text, ENT_NOQUOTES) ?>

        <a class="icon-remove" style="position:absolute;top:10px;right:10px;" href="<?php echo htmlSpecialChars($_control->link("Summary:delete", array($item->id_todo))) ?>
"></a>
    </div>
<?php $iterations++; endforeach ;if (isset($item)) ob_end_flush(); else ob_end_clean() ?>
                    <hr style="clear:both;margin:10px;" />
                </div>
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