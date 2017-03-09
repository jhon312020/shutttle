<?php
	$path = $this->uri->segment(2);
	if($lang=='en'){
		$full_path_en = current_url();
		$full_path_es = str_replace('/en', '/es', current_url());
	}
	else{
		$full_path_es = current_url();
		$full_path_en = str_replace('/es', '/en', current_url());
	}

	$modalForm = site_url($lang . '/reserva01');
?>
  <!-- FOOTER -->
  <?php if(in_array(METHOD_NAME, $this->config->item('book_now_menus'))) { ?>
  <div class="col-sm-12 faq-book">
    <a href="<?php echo site_url($lang."/reservation"); ?>" class="btn btn-primary btn-blue"><?php echo lang('reserve_now'); ?></a>
  </div>
  <?php } ?>
  
  <div class="">
    <div class="col-sm-12">
      <hr style="border-width: 2px;border-color: #25387D;width:68%;margin-top:10px;">
    </div>
  </div>
  
  <footer id="footer" class="container"> 
    <div class="mob-hide">
      <div class="col-xs-6" style="padding-left:0px;">
        <p><strong><?php echo (isset($site_title))?$site_title:''; ?></strong>
          <span class="separator">|</span>  
          Email: <a href="mailto:<?php echo (isset($site_email))?$site_email:''; ?>"><?php echo (isset($site_email))?$site_email:''; ?></a> 
          <span class="separator">|</span> Telf. <?php echo (isset($telephone))?$telephone:''; ?> 
        </p>
      </div>
      <div class="col-xs-6 text-right" style="padding-right:0px;">
        <a href="<?php echo site_url('/').$lang.'/collaborators/login'; ?>"><?php echo lang('collaborators_access'); ?></a> <span class="separator">|</span>  <a href="<?php echo site_url('/').$lang; ?>/terms"><?php echo lang('terms_and_conditions'); ?></a> <span class="separator">|</span> 
        <a href="<?php echo (isset($social_facebook))?$social_facebook:'#'; ?>" style="display:none;"><img src="<?php echo IMAGEPATH;?>facebook.png" style="width:20px;"></a> <span class="separator" style="display:none;">|</span> 
        <a href="<?php echo $full_path_es; ?>" onClick="return checkPage();"><img src="<?php echo IMAGEPATH;?>spain.png" style="width:20px;"></a> <span class="separator">|</span> 
        <a href="<?php echo $full_path_en; ?>" onClick="return checkPage();"><img src="<?php echo IMAGEPATH;?>english.png" style="width:20px;"></a>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 mar-bottom"  style="clear:both;">
        <div style="text-align: center;">
          <!--<img src="<?php echo IMAGEPATH; ?>sabadell.png">-->
          <img src="<?php echo IMAGEPATH; ?>visamaster.png">
          <img src="<?php echo IMAGEPATH; ?>mastermaestro.png">
          <!--<img src="<?php echo IMAGEPATH; ?>paypal.png">-->
        </div>
      </div>
    </div>
  </footer>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/cc/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/cc/datetimepicker/js/moment.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/cc/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/cc/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/cc/js/ie10-viewport-bug-workaround.js"></script>
    <!-- Validation Engine js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/cc/js/jquery.validationEngine-en.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/cc/js/jquery.validationEngine.js"></script>
    <!-- Loading the necessary js and css based on the contoller values as per the page needs -->
    <?php 
      if (isset($css)) { 
        foreach($css as $href) {
          echo "<link rel='stylesheet' href='$href'>";
        }
      }
      if (isset($js)) {
        foreach ($js as $src) {
          echo "<script type='text/javascript' src='$src'></script>";
        }
      }
    ?>
<svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg></body>
</html>
