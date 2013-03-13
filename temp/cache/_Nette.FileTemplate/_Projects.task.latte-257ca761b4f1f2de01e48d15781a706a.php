<?php //netteCache[01]000381a:2:{s:4:"time";s:21:"0.48848200 1341390463";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:59:"C:\xampp\htdocs\Muj kancl\app\templates\Projects\task.latte";i:2;i:1341390460;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\xampp\htdocs\Muj kancl\app\templates\Projects\task.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '15uc4bjj1a')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb1e4cdacd0f_content')) { function _lb1e4cdacd0f_content($_l, $_args) { extract($_args)
?>    <div class="container">
        <div class="widget">
        <h2><span style="font-weight:normal">Projekt:</span> <a href="<?php echo htmlSpecialChars($_control->link("Projects:show", array($project->id_project))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($project->name, ENT_NOQUOTES) ?>
</a> - <?php echo Nette\Templating\Helpers::escapeHtml($task->name, ENT_NOQUOTES) ?></h2>
        </div>
<?php if (isset($msg)): ?><p><?php echo Nette\Templating\Helpers::escapeHtml($msg, ENT_NOQUOTES) ;endif ?>

        <div class="row">
            <div class="span4">                             
                    <form action="" method="POST">
                <div class="widget">
                    <div class="widget-header">Stav</div> 
                        <table class="table">
<?php if ($user->group_id == 3): ?>
                            <tr>
                                <td style="text-align:center<?php if ($task->condition==0): ?>
;background-color:#f99<?php endif ?>">
                                    Nezačato
                                <td style="text-align:center<?php if ($task->condition==1): ?>
;background-color:orange<?php endif ?>">
                                    Rozpracováno</label>
                                <td style="text-align:center<?php if ($task->condition==2): ?>
;background-color:#9f9<?php endif ?>">
                                    Hotovo
<?php else: ?>
                            <tr>
                                <td style="text-align:center">
                                    <input type="radio" name="condition" id="level0" value="0"<?php if ($task->condition==0): ?>
 checked<?php endif ?> />
                                    <br /><label for="level0">Nezačato</label>
                                <td style="text-align:center">
                                    <input type="radio" name="condition" id="level1" value="1"<?php if ($task->condition==1): ?>
 checked<?php endif ?> />
                                    <br /><label for="level1">Rozpracováno</label>
                                <td style="text-align:center">
                                    <input type="radio" name="condition" id="level2" value="2"<?php if ($task->condition==2): ?>
 checked<?php endif ?> />
                                    <br /><label for="level2">Hotovo</label>
                            <tr><td colspan="3" style="text-align:center"><input type="submit" class="btn" name="edit-condition" value="Uložit" />
<?php endif ?>
                        </table>
                </div>    
                    </form>
            </div>
            <div class="span4">       
                <div class="widget">
                    <div class="widget-header">Soubory</div> 
                    <table class="table">
<?php ob_start() ;$iterations = 0; foreach ($files as $file): ?>
                                <tr><td><?php echo Nette\Templating\Helpers::escapeHtml(str_replace($aj,$cz,date("j.F Y H:i",strtotime($file->uploaded))), ENT_NOQUOTES) ?>

<?php if ($file->description != '' && $file->description != 1): ?>
                                    <br /><small><?php echo Nette\Templating\Helpers::escapeHtml($file->description, ENT_NOQUOTES) ?></small>
                                <?php endif ?><td><a href="http://files.mujkancl.cz/<?php echo htmlSpecialChars($file->url) ?>">Stáhnout</a>
<?php $iterations++; endforeach ;ob_start() ?>
                            <tr><td colspan="3">Žádný soubor nenalezen.
<?php if (isset($file) && $file) { ob_end_clean(); ob_end_flush(); } else { $_else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_else; } ?>
                        <?php if ($user->group_id != 3): ?><tr><td colspan="3" style="text-align:center"><a class="btn" href="<?php echo htmlSpecialChars($_control->link("Projects:newFile", array($task->id_project_task,$project->id_project))) ?>
">Nahrát novou verzi</a><?php endif ?>

                    </table>
                </div>
            </div>
            <div class="span4">                 
                <div class="widget">
                        <form action="" method="POST" style="margin:0;padding:0">
                    <div class="widget-header">Cena</div> 
                    <table class="table">
<?php if (($task->price == 0 && $project->client_user_id !=0)): if ($user->group_id != 3): ?>
                        <tr><td>Návrh dodavatele<td><input name="price_from_supplier" value="<?php echo htmlSpecialChars($task->price_from_supplier) ?>" style="width:70px;text-align:right" /> Kč
                        <tr><td>Návrh odběratele<td><?php echo Nette\Templating\Helpers::escapeHtml($task->price_from_client, ENT_NOQUOTES) ?> Kč
                        <tr><td colspan="3" style="text-align:center">
    <input type="submit" class="btn" name="price-set" value="Navrhnout" />
    <input type="submit" class="btn" name="price-accept" value="Akceptovat" <?php if ($task->price_from_client == 0): ?>
disabled<?php endif ?> />
<?php else: ?>
                        <tr><td>Návrh dodavatele<td><?php echo Nette\Templating\Helpers::escapeHtml($task->price_from_supplier, ENT_NOQUOTES) ?> Kč
                        <tr><td>Návrh odběratele<td><input name="price_from_client" value="<?php echo htmlSpecialChars($task->price_from_client) ?>" style="width:70px;text-align:right" /> Kč
                        <tr><td colspan="3" style="text-align:center">
    <input type="submit" class="btn" name="price-set" value="Navrhnout" />
    <input type="submit" class="btn" name="price-accept" value="Akceptovat" <?php if ($task->price_from_supplier == 0): ?>
disabled<?php endif ?> />
<?php endif ;else: ?>
                        <tr><td>Dohodnutá cena<td><strong><span id="noprice"><?php echo Nette\Templating\Helpers::escapeHtml($task->price, ENT_NOQUOTES) ?>
</span><span id="price" style="display:none"><input type="text" name="price" value="<?php echo htmlSpecialChars($task->price) ?>" style="width:70px;text-align:right" /></span> Kč</strong> 
                        <?php if ($user->group_id != 3): ?><a style="cursor:pointer" class="icon-pencil" id="edit-price" onclick="$('#edit-price').hide();$('#noprice').hide();$('#price').show();$('#price-new').show();"></a><?php endif ?>

                        <tr style="display:none" id="price-new"><td colspan="2" style="text-align:center"><input type="submit" class="btn" name="price-new" value="Uložit" /></tr>
<?php endif ?>
                    </table> 
                        </form> 
                </div>
            </div>
        </div>
        <p><a class="btn" href="<?php echo htmlSpecialChars($_control->link("Projects:newBug", array($task->id_project_task,$project->id_project))) ?>
">Přidat chybu</a>
<?php ob_start() ?>
        <div id="row">         
              <div class="widget">
                <div class="widget-header">Chyby</div>
            <table class="table">
                <tr><th>ID<th>Chyba<th>Nalezena<th>Opravena
<?php $iterations = 0; foreach ($bugs as $bug): ?>
                <tr>
                    <td><?php echo Nette\Templating\Helpers::escapeHtml($bug->id_bug, ENT_NOQUOTES) ?>

                    <td style="width:100%"><?php echo Nette\Templating\Helpers::escapeHtml($bug->bug, ENT_NOQUOTES) ?>

                    <td style="white-space:nowrap;text-align:center;"><?php if (strtotime($bug->found) < 0): ?>
<span class="icon-remove"></span><?php else: echo Nette\Templating\Helpers::escapeHtml(str_replace($aj,$cz,date("j.F Y H:i",strtotime($bug->found))), ENT_NOQUOTES) ;endif ?>

                    <td style="white-space:nowrap;text-align:center;"><?php if (strtotime($bug->fixed) < 0): ?>
<span class="icon-remove"></span><?php else: echo Nette\Templating\Helpers::escapeHtml(str_replace($aj,$cz,date("j.F Y H:i",strtotime($bug->fixed))), ENT_NOQUOTES) ;endif ?>

<?php $iterations++; endforeach ?>
            </table>
            </div>    
        </div>
<?php ob_start() ?>
        <p>Nenalezena žádná chyba.
<?php if (isset($bug) && $bug) { ob_end_clean(); ob_end_flush(); } else { $_else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_else; } ?>
        <div id="row">      
            <div class="widget">
                <div class="widget-header">Zadání</div> 
                <table class="table">
                    <tr><td><?php echo str_replace(array('<div','</div'), array('&nbsp;div','&nbsp;/div'),nl2br($task->task)) ?>

                </table> 
            </div>   
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 