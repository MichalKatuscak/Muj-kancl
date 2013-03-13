<?php //netteCache[01]000381a:2:{s:4:"time";s:21:"0.91130300 1341050500";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:59:"C:\xampp\htdocs\Muj kancl\app\templates\Projects\show.latte";i:2;i:1341050499;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\xampp\htdocs\Muj kancl\app\templates\Projects\show.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ac4af9od1e')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbc5a481227d_content')) { function _lbc5a481227d_content($_l, $_args) { extract($_args)
?>    <div class="container">
        <div class="widget"><h2><span style="font-weight:normal">Projekt:</span> <?php echo Nette\Templating\Helpers::escapeHtml($project->name, ENT_NOQUOTES) ?></h2></div>
        
        <div class="row">    
            <div class="span4">          
              <div class="widget">
                <div class="widget-header">Úkoly</div>
                    <table class="table">
                        <tr><td>Hotové<td><?php echo Nette\Templating\Helpers::escapeHtml($level2, ENT_NOQUOTES) ?>

                        <tr><td>Rozpracované<td><?php echo Nette\Templating\Helpers::escapeHtml($level1, ENT_NOQUOTES) ?>

                        <tr><td>Nezačaté<td><?php echo Nette\Templating\Helpers::escapeHtml($level0, ENT_NOQUOTES) ?>

                        <tr><td><strong>Celkem</strong><td><strong><?php echo Nette\Templating\Helpers::escapeHtml($level0 + $level1 + $level2, ENT_NOQUOTES) ?></strong>
                    </table>
                </div>
            </div>
            <div class="span8">     
                <div class="widget">
                    <div class="widget-header">Počty úkolů za měsíc</div>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="610" height="136" style="margin-top:0px;margin-left:5px;">
<?php $iterations = 0; foreach ($months  as $month=>$data): ?>
                            <line x1="<?php echo htmlSpecialChars(50+(($month-1)*50)) ?>
" y1="20" x2="<?php echo htmlSpecialChars(50+(($month-1)*50)) ?>" y2="124"
                            style="stroke:#ddd;stroke-width:1" />
                            <text x="<?php echo htmlSpecialChars(45+(($month-1)*50)) ?>
" y="136" fill="#ddd" style="font-size:10px"><?php echo Nette\Templating\Helpers::escapeHtml($month, ENT_NOQUOTES) ?></text>
<?php $iterations++; endforeach ?>
                        <polyline points="
<?php $iterations = 0; foreach ($months  as $month=>$data): ?>
                            <?php echo htmlSpecialChars(50+(($month-1)*50)) ?> <?php echo htmlSpecialChars($data['point']+23) ?>,
<?php $iterations++; endforeach ?>
                        " style="fill:none;stroke:#333;stroke-width:2" />
                                                
                        <text x="2" y="15" fill="#333"><?php echo Nette\Templating\Helpers::escapeHtml($max_count, ENT_NOQUOTES) ?></text>
                        <text x="2" y="120" fill="#333">0</text>
                        
                        <line x1="50" y1="20" x2="600" y2="20"
                        style="stroke:#ddd;stroke-width:1" />
                        <line x1="50" y1="20" x2="50" y2="124"
                        style="stroke:#ddd;stroke-width:1" />
                    </svg>
                </div>
            </div>
        </div>
    <p><a class="btn" href="<?php echo htmlSpecialChars($_control->link("newTask", array($project->id_project))) ?>
">Vytvořit úkol</a>
<?php ob_start() ?>
        <div class="row">
            <div class="span12">         
            <div class="widget">
                <div class="widget-header">Úkoly</div> 
                <table class="table">
                    <tr><th>Úkol<th>Začatek práce<th>Ukončení práce<th>Stav<th>Cena<th>Zaplaceno
<?php $iterations = 0; foreach ($tasks as $task): ?>
                        <tr>
                            <td style="width:400px;"><a href="<?php echo htmlSpecialChars($_control->link("task", array($task->id_project_task,$task->project_id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($task->name, ENT_NOQUOTES) ?></a>
                            <td style="white-space:nowrap"><?php if (strtotime($task->start_work) > 0): echo Nette\Templating\Helpers::escapeHtml($task->start_work, ENT_NOQUOTES) ;else: ?>
---<?php endif ?>

                            <td style="white-space:nowrap"><?php if (strtotime($task->end_work) > 0): echo Nette\Templating\Helpers::escapeHtml($task->end_work, ENT_NOQUOTES) ;else: ?>
---<?php endif ?>

                            <td style="white-space:nowrap"><?php if ($task->condition==2): ?>
Hotovo<?php elseif ($task->condition==1): ?>Rozpracováno<?php else: ?>Nezačato
<?php if ($task->condition==0): ?>
    <a id="myLink"
    data-confirm="modal"
    data-confirm-title="Potvrdit"
    data-confirm-header-class="btn-inverse"
    data-confirm-text="Opravdu chcete úkol <strong><?php echo htmlSpecialChars($task->name) ?></strong> smazat?"
    data-confirm-cancel-class="btn-success"
    data-confirm-cancel-text="Zpět"
    data-confirm-ok-class="btn-danger"
    data-confirm-ok-text="Smazat"
    class="icon-trash"
     href="<?php echo htmlSpecialChars($_control->link("Projects:deleteTask", array($task->id_project_task, $project->id_project))) ?>
"></a>
<?php endif ;endif ;if (strtotime($task->found)>0): ?>
                            <span class="icon-wrench"></span>
<?php endif ?>
                            <td style="text-align:right;"><?php if ($task->price>0): echo Nette\Templating\Helpers::escapeHtml($task->price, ENT_NOQUOTES) ?>
 Kč<?php else: ?>Nepotrvzena<?php endif ?>

                            <td style="text-align:center;">
<?php if ($task->paid == 1): ?>
                                    <span class="icon-ok"></span>
<?php else: ?>
                                    <span class="icon-remove"></span>
<?php endif ;$iterations++; endforeach ?>
                </table>
                </div>
            </div>
        </div>
<?php ob_start() ?>
        <p>Nenalezen žádný úkol.
<?php if (isset($task) && $task) { ob_end_clean(); ob_end_flush(); } else { $_else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_else; } ?>
        
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