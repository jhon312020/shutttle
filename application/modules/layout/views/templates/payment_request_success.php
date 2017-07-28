<?php
	$this->load->view('header');
?>
<div class="container bodypad" id="aboutus">
	<div class="row">
		<div class="col-sm-12 text-justify sub-head" style="text-align:center;">
			<div class="alert alert-info">Your order is in pending status now. The payment link has been sent to client emailId. After the payment done. The order will get the confirmation.</div>
			<a href="<?php echo site_url($lang); ?>" >Return to home</a>
		</div>
	</div>
</div>	
	
<?php $this->load->view('footer');?>
