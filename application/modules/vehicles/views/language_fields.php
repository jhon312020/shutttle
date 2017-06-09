<?php
$readonly = ($readonly)?'readonly':'';
$disabled = ($readonly)?'disabled':'';
?>
<div class="form-group">
	<label class="col-sm-2 control-label"><?=lang('description');?> </label>
	<div class="col-sm-6">
		<?php echo form_textarea(array('name'=>$language.'_desc', 'required'=>true, 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_vehicles->form_value($language.'_desc'))); ?>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label"><?=lang('extras');?> </label>
	<div class="col-sm-6">
		<input type="hidden" name="id" value="<?php echo $this->mdl_vehicles->form_value('id'); ?>" />
		<?php echo form_textarea(array('name'=>$language.'_extras', 'required'=>true, 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_vehicles->form_value($language.'_extras'))); ?>
	</div>
</div>