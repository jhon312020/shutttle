<?php
	$this->load->view('header');
?>
<div class="container bodypad" id="aboutus">
	<div class="row">
		<div class="col-sm-12 text-justify sub-head" style="text-align:center;">
			<div class="alert alert-danger">
				<?php if (isset($error) && $error) { ?>
					<?php echo $error; ?>
				<?php } else { ?>
					Your transaction has been canceled.
				<?php } ?>
			</div>
			<a href="<?php echo site_url($lang); ?>" >Return to home</a>
		</div>
	</div>
</div>	
	
<?php $this->load->view('footer');?>
