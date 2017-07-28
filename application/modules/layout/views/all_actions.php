<style>
#all_actions {
	display: none;
}
</style>
<div id="all_actions" action="<?php echo $action ?>">
	<?php if (isset($delete_only) && $delete_only) {}else { ?>
	<button type="button" class="btn btn-primary" id="all_activate">Activate</button>
	<button type="button" class="btn btn-primary" id="all_deactivate">Deactivate</button>
	<?php } ?>
	<button type="button" class="btn btn-primary" id="all_delete">Delete</button>
</div>
<br/><br/>
<script type="text/javascript">
var selectedCheckboxes = [];
$(document).ready(function(){
	$('#select_all').change(function(){
		if ($(this).is(":checked")) {
			$('.single_checkbox').prop('checked',true);
		} else {
			$('.single_checkbox').prop('checked',false);
		}
		show_or_hide_actions();
		makeSelectedCheckboxes();
	});
	$('.single_checkbox').click(function(){
		if ($('.single_checkbox:visible').length == $('.single_checkbox:visible:checked').length) {
			$('#select_all').prop('checked',true);
		} else {
			$('#select_all').prop('checked',false);
		}
		show_or_hide_actions();
		makeSelectedCheckboxes();
	});
	$('#all_activate').click(function(){
		do_action('all_activate');
	});
	$('#all_deactivate').click(function(){
		do_action('all_deactivate');
	});
	$('#all_delete').click(function(){
		do_action('all_delete');
	});
});
function makeSelectedCheckboxes() {
	selectedCheckboxes = [];
	$('.single_checkbox:visible:checked').each(function(){
		selectedCheckboxes.push($(this).attr('name'));
	});
}
function do_action(method) {
	var url = $('#all_actions').attr('action');
	if ($('.single_checkbox:visible:checked').length) {
		data = {method:method,ids:selectedCheckboxes};
		my_form=document.createElement('FORM');
		my_form.method='POST';
		my_form.action=url;

		my_tb=document.createElement('INPUT');
		my_tb.type='hidden';
		my_tb.name='method';
		my_tb.value=method;
		my_form.appendChild(my_tb);

		my_tb=document.createElement('INPUT');
		my_tb.type='method';
		my_tb.name='ids';
		my_tb.value=selectedCheckboxes.toString();
		my_form.appendChild(my_tb);
		document.body.appendChild(my_form);
		my_form.submit();
	}
}
function  show_or_hide_actions() {
	if ($('.single_checkbox:visible:checked').length) {
		$('#all_actions').show();
	} else {
		$('#all_actions').hide();
	}
}
</script>