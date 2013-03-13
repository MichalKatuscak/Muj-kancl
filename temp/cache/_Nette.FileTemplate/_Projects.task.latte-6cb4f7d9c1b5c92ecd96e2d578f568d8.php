<?php //netteCache[01]000379a:2:{s:4:"time";s:21:"0.80957300 1340610890";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:57:"/var/www/html/Muj kancl/app/templates/Projects/task.latte";i:2;i:1340610889;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: /var/www/html/Muj kancl/app/templates/Projects/task.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '41fuoaizkv')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lba23b3620d5_content')) { function _lba23b3620d5_content($_l, $_args) { extract($_args)
?>    <div class="container">
        <h2><a href="<?php echo htmlSpecialChars($_control->link("Projects:show", array($project->id_project))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($project->name, ENT_NOQUOTES) ?>
</a> - <?php echo Nette\Templating\Helpers::escapeHtml($task->name, ENT_NOQUOTES) ?></h2>
<?php if (isset($msg)): ?><p><?php echo Nette\Templating\Helpers::escapeHtml($msg, ENT_NOQUOTES) ;endif ?>

        <div class="row">
            <div class="span4">
                <form action="" method="POST">
                    <table class="table table-bordered">
                        <tr><th colspan="3">Stav
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
                </form>
            </div>
            <div class="span4">
                <table class="table table-bordered">
                    <tr><th colspan="3">Soubory
<?php ob_start() ;$iterations = 0; foreach ($files as $file): ?>
                            <tr><td><?php echo Nette\Templating\Helpers::escapeHtml(str_replace($aj,$cz,date("j.F Y H:i",strtotime($file->uploaded))), ENT_NOQUOTES) ?>

<?php if ($file->description != '' && $file->description != 1): ?>
                                <br /><small><?php echo Nette\Templating\Helpers::escapeHtml($file->description, ENT_NOQUOTES) ?></small>
                            <?php endif ?><td><a href="/../files/<?php echo htmlSpecialChars($file->url) ?>">Stáhnout</a>
<?php $iterations++; endforeach ;ob_start() ?>
                        <tr><td colspan="3">Žádný soubor nenalezen.
<?php if (isset($file) && $file) { ob_end_clean(); ob_end_flush(); } else { $_else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_else; } ?>
                    <?php if ($user->group_id != 3): ?><tr><td colspan="3" style="text-align:center"><a class="btn" href="<?php echo htmlSpecialChars($_control->link("Projects:newFile", array($task->id_project_task,$project->id_project))) ?>
">Nahrát novou verzi</a><?php endif ?>

                </table>
            </div>
            <div class="span4">
                <table class="table table-bordered">
                    <tr><th colspan="3">Cena
<?php if ($task->price == 0): ?>
                    <form action="" method="POST">
<?php if ($user->group_id != 3): ?>
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
<?php endif ?>
                    </form>
<?php else: ?>
                    <tr><td>Dohodnutá cena<td><strong><?php echo Nette\Templating\Helpers::escapeHtml($task->price, ENT_NOQUOTES) ?> Kč</strong>
<?php endif ?>
                </table>
            </div>
        </div>
        <p><a class="btn" href="<?php echo htmlSpecialChars($_control->link("Projects:newBug", array($task->id_project_task,$project->id_project))) ?>
">Přidat chybu</a>
<?php ob_start() ?>
        <div id="row">
            <table class="table table-bordered">
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
<?php ob_start() ?>
        <p>Nenalezena žádná chyba.
<?php if (isset($bug) && $bug) { ob_end_clean(); ob_end_flush(); } else { $_else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_else; } ?>
        <div id="row">
            <table class="table table-bordered">
                <tr><th>Zadání
                <tr><td><?php echo str_replace(array('<div','</div'), array('&nbsp;div','&nbsp;/div'),nl2br($task->task)) ?>

            </table>    
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