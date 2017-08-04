<?php
if($name != 'faq'){
?>
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo lang('title') . " ($language)"; ?>: </label>
	<div class="col-sm-5">
		<input class="form-control" type="text" id="title_<?php echo $language ?>" name="title_<?php echo $language ?>" value="<?php echo $this->mdl_captions->form_value('title_'.$language); ?>"/>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo lang('subtitle'). " ($language)"; ?>: </label>
	<div class="col-sm-5">
		<input class="form-control" type="text" id="subtitle_<?php echo $language ?>" name="subtitle_<?php echo $language ?>" value="<?php echo $this->mdl_captions->form_value('subtitle_'.$language); ?>"/>
	</div>
</div>

<?php
}
if($name != 'contacts') {
?>
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo lang('content') ." ($language)"; ?>: </label>
	<div class="col-sm-5">
		<textarea class="form-control" type="text" id="content_<?php echo $language ?>" name="content_<?php echo $language ?>"><?php echo $this->mdl_captions->form_value('content_'.$language); ?></textarea>
	</div>
</div>
<?php if($name != 'partners'){ ?>
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo lang('subcontent'). " ($language)"; ?>: </label>
	<div class="col-sm-5">
		<?php echo $this->ckeditor->editor("subcontent_$language", $this->mdl_captions->form_value('subcontent_'.$language));?>
	</div>
</div>
<?php } 
}
if($name == 'contacts') {
?>
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo lang('address'); ?>: </label>
	<div class="col-sm-5">
		<textarea  class="form-control" name="settings[address]" ><?php echo $this->mdl_settings->setting('address'); ?></textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo lang('telephone_no'); ?> : </label>
	<div class="col-sm-5">
		<input class="form-control" type="text" name="settings[telephone]" class="input-small" value="<?php echo $this->mdl_settings->setting('telephone'); ?>">
	</div>
</div>
<?php } ?>