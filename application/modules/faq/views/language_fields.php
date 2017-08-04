<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo lang('question') . " ($language)"; ?>: </label>
	<div class="col-sm-5">
		<input class="form-control" type="text" id="question_<?php echo $language; ?>" name="question_<?php echo $language; ?>" value="<?php echo $this->mdl_faq->form_value('question_'.$language); ?>">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo lang('answer'). " ($language)"; ?>: </label>
	<div class="col-sm-5">
		<?php echo $this->ckeditor->editor("answer_$language", $this->mdl_faq->form_value('answer_'.$language));?>
	</div>
</div>