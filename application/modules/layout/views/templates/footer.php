<?php
	//echo $lang;
	$template_path = base_url()."assets/cc/";
	$ln = $this->uri->segment(1);
	$path = $this->uri->segment(2);
	
	if($ln=='en'){
		$full_path_en = current_url();
		$full_path_es = str_replace('/en', '/es', current_url());
	}
	else{
		$full_path_es = current_url();
		$full_path_en = str_replace('/es', '/en', current_url());
	}

	if(!$ln || $ln == ""){	$ln = "es"; }
	$modalForm = site_url($ln . '/reserva01');
?>
<div class="container">
  <!-- FOOTER -->
  <footer id="footer" class="container">
    <hr>
    <div class="mob-hide">
      <div class="col-xs-6" style="padding-left:0px;">
        <p><?php echo (isset($site_title))?$site_title:''; ?>
          <span class="separator">|</span>  
          Email: <a href="mailto:<?php echo (isset($site_email))?$site_email:''; ?>"><?php echo (isset($site_email))?$site_email:''; ?></a> 
          <span class="separator">|</span> Telf. <?php echo (isset($telephone))?$telephone:''; ?> 
        </p>
      </div>
      <div class="col-xs-6 text-right" style="padding-right:0px;">
        <a href="<?php echo site_url('/').$ln; ?>/terms"><?php echo lang('terms_and_conditions'); ?></a> <span class="separator">|</span> 
        <a href="<?php echo (isset($social_facebook))?$social_facebook:'#'; ?>" style="display:none;"><img src="<?php echo $template_path;?>images/facebook.png" style="width:20px;"></a> <span class="separator" style="display:none;">|</span> 
        <a href="<?php echo $full_path_es; ?>" onClick="return checkPage();"><img src="<?php echo IMAGEPATH;?>spain.png" style="width:20px;"></a> <span class="separator">|</span> 
        <a href="<?php echo $full_path_en; ?>" onClick="return checkPage();"><img src="<?php echo IMAGEPATH;?>english.png" style="width:20px;"></a>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12"  style="clear:both;">
        <div style="text-align: center;">
          <img src="<?php echo $template_path; ?>images/sabadell.png">
          <img src="<?php echo $template_path; ?>images/visamaster.png">
          <img src="<?php echo $template_path; ?>images/mastermaestro.png">
          <img src="<?php echo $template_path; ?>images/paypal.png">
        </div>
      </div>
    </div>
  </footer>
</div><!-- /.container -->

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/cc/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/cc/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?php echo base_url(); ?>assets/cc/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>assets/cc/js/ie10-viewport-bug-workaround.js"></script>
    <!-- Validation Engine js -->
    <script src="<?php echo base_url(); ?>assets/cc/js/jquery.validationEngine-en.js"></script>
    <script src="<?php echo base_url(); ?>assets/cc/js/jquery.validationEngine.js"></script>
    <?php if ($path == 'reservation') { ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/cc/js/reservation.js"></script>
    <script src="<?php echo base_url(); ?>assets/cc/js/functions.js"></script>
    <?php } ?>
<svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg></body>
</html>
