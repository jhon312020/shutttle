<?php
	$this->load->view('header');
?>
<div class="container bodypad" id="aboutus">
	<div class="row">
		<div class="col-sm-12 text-justify sub-head" style="text-align:center;">
			<div class="alert alert-info"><?php echo lang('reservation_done_payment_content'); ?></div>
			<a href="<?php echo site_url($lang); ?>" ><?php echo lang('back_home'); ?></a>
		</div>
	</div>
</div>	
	
<?php $this->load->view('footer');?>
