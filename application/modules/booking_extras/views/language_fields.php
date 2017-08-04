<?php
$readonly = ($readonly)?'readonly':'';
$disabled = ($readonly)?'disabled':'';
?>
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo lang('title') . " ($language)";?>: </label>
	<div class="col-sm-5">
		<?php echo form_input(array('name'=>'title_'.$language, 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_booking_extras->form_value('title_'.$language))); ?>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo lang('subtitle') . " ($language)"; ?>: </label>
	<div class="col-sm-5">
		<?php echo form_input(array('name'=>'subtitle_'.$language, 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_booking_extras->form_value('subtitle_'.$language))); ?>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo lang('description') . " ($language)"; ?>: </label>
	<div class="col-sm-5">
		<?php echo $this->ckeditor->editor("description_".$language, $this->mdl_booking_extras->form_value('description_'.$language));?>
	</div>
</div>