<?php
	$template_path = base_url()."assets/cc/";
	$ln = $this->uri->segment(1);
	if(!$ln || $ln == ""){	$ln = "es"; }
	$this->load->view('header');
?>
<div class="container bodypad" id="concierge">
	<div class="row">
		<div class="col-sm-12 text-justify sub-head">
			<p><?php echo $content['content'] ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12"><p class="text-justify"><?php echo $content['subcontent']; ?></div>
	</div>
</div>
<?php $this->load->view('footer');?>
