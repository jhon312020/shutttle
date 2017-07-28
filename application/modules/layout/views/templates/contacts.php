<?php
	$this->load->view('header');
	$matches = array();
	$pattern = '/[A-Za-z0-9_-]+@[A-Za-z0-9_-]+\.([A-Za-z0-9_-][A-Za-z0-9_]+)/';
	preg_match($pattern,$address,$matches);
	if(count($matches) > 0){
		$address = str_replace($matches[0], '<a style="color: #25387d;" href="mailto:'.$matches[0].'">'.$matches[0].'</a>', $address);
	}
?>
<div class="container" id="contactus">
	<div class="col-sm-12 contactSection">
		<div class="col-md-8 col-md-offset-2">
			<div class="col-sm-12">
				<div class="row contacto">
					<form method="post" name="contact_form">
						<div class="form-group col-sm-12 contacto_title"><?php echo lang('we_will_contact_with_you_as_soon_as_possible'); ?></div>
						<div class="col-sm-6 col-xs-12 pad-top removeRightPad">
							<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo lang('name'); ?>" required>
						</div>
						<div class="col-sm-6 col-xs-12 con_msg pad-top">
							<input type="text" class="form-control" name="email" id="email" placeholder="<?php echo lang('surname'); ?>" required>
						</div>
                        
						<div class="col-sm-8 col-xs-12 con_msg mar-bottom removeRightPad">
							<textarea name="description" id="description" class="form-control" placeholder="<?php echo lang('Comment'); ?>" required></textarea>
							<!--<button type="submit" id="form-submit" class="btn btn-block downbtn"><?php echo lang('send'); ?></button>-->
						</div>
						<div class="col-sm-3 col-xs-12 send-pad no-pad">						
							<button type="submit" id="form-submit" class="btn btn-block downbtn contactSubmitBtn"><?php echo lang('send'); ?></button>
						</div>						
					</form>
		        </div>
				<div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer');?>
