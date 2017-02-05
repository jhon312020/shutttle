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
	<div class="col-sm-10 col-sm-offset-1">
		<div class="col-sm-3">
			<h4 id="fobo"><?php echo lang('contact_details'); ?></h4><p class="contactp"><?php echo (isset($address))?$address:''; ?>
			<br>Tel. <?php echo (isset($telephone))?$telephone:''; ?></p>
			<p>&nbsp;</p>
		</div>
		<div class="col-sm-9">
			<div class="col-xs-12">
				<div class="row contacto">
					<form method="post" name="contact_form">
						<div class="form-group col-sm-12 contacto_title"><?php echo lang('we_will_contact_with_you_as_soon_as_possible'); ?></div>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo lang('name'); ?>" required>
						</div>
						<div class="col-sm-6 con_msg">
							<input type="text" class="form-control" name="email" id="email" placeholder="<?php echo lang('surname'); ?>" required>
						</div>
						<div class="col-sm-10 con_msg">
							<textarea name="description" id="description" class="form-control" rows="8" placeholder="<?php echo lang('Comment'); ?>" required></textarea>
							<button type="submit" id="form-submit" class="btn btn-block mob-show downbtn"><?php echo lang('send'); ?></button>
						</div>
						<div class="col-sm-2" style="padding-left:0px;">						
							<button type="submit" id="form-submit" class="btn btn-block mob-hide downbtn"><?php echo lang('send'); ?></button>
						</div>						
					</form>
		        </div>
				<div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer');?>
