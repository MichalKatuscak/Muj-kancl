/**
 * Confirm dialog plugin
 *
 * @copyright  Copyright (c) 2012 Jan Červený
 * @license    BSD
 * @link       confirmdialog.redsoft.cz
 * @version    1.0
 */

$('[data-confirm]').live('click',function(event){
	var obj=this;
	event.preventDefault();
	event.stopImmediatePropagation();
	$("<div id='dConfirm' class='modal fade'></div>").appendTo('body');
	$('#dConfirm').html("<div id='dConfirmHeader' class='modal-header'></div><div id='dConfirmBody' class='modal-body'></div><div id='dConfirmFooter' class='modal-footer'></div>");
	$('#dConfirmHeader').html("<a class='close' data-dismiss='modal'>×</a><h3 id='dConfirmTitle'></h3>");
	$('#dConfirmTitle').html($(obj).data('confirm-title'));
	$('#dConfirmBody').html($(obj).data('confirm-text'));
	$('#dConfirmFooter').html("<a id='dConfirmCancel' class='btn "+$(obj).data('confirm-cancel-class')+"' data-dismiss='modal'>Ne</a><a id='dConfirmOk' class='btn "+$(obj).data('confirm-ok-class')+"' data-dismiss='modal'>Ano</a>");
	if($(obj).data('confirm-header-class')){
	    $('#dConfirmHeader').addClass($(obj).data('confirm-header-class'));
	}      
	if($(obj).data('confirm-cancel-text')){
	    $('#dConfirmCancel').html($(obj).data('confirm-cancel-text'));
	}
	if($(obj).data('confirm-ok-text')){
	    $('#dConfirmOk').html($(obj).data('confirm-ok-text'));
	}
	$('#dConfirmOk').on('click',function(){
	    if($(obj).hasClass('ajax')){
		$.get(obj.href);
	    }else{
		document.location=obj.href;
	    }
	});
	$('#dConfirm').on('hidden', function () {
	    $('#dConfirm').remove();
	});
	$('#dConfirm').modal('show');
	return false;
    });