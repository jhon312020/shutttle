<?php
	$asset_path = base_url()."assets/cc/";
	$ln = $this->uri->segment(1);
	if(!$ln || $ln == ""){	$ln = "es"; }
	$this->load->view('header');
?>
<div class="container">
	<div class="row">
	<p class="homepara">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
	</div>
</div>
<div class="container">
  <div class="row">
    <!-- content -->
    <section class="main">
      <div class="grid-custom">
        <h2 class="head_2">News</h2>
        <div class="row col-sm-10 col-sm-offset-1">
          <?php $img_url = $asset_path.'images/homepage/boxes/'; ?>
          <?php foreach($boxes as $box) {  $image_name =($ln =='es')? $box->image_es: $box->image; ?>
          <div class="col-sm-4 col-xs-6"><img src="<?php echo $img_url.'/'.$image_name; ?>" alt="" class="img-responsive"></div>
          <?php } ?>
        </div>
      </div>
    </section>
	</div>
</div>
<?php
  $this->load->view('footer');
?>
