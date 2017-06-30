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
    <a href="<?php echo site_url($lang."/reservation"); ?>" class="btn btn-primary btn-blue"><?php echo lang('book_now'); ?></a>
  </div>
  <?php } ?>
  
  <div class="">
    <!--<div class="col-lg-12 footerBorder" style="padding:0;">
      <hr style="border-width: 2px;border-color: #25387D;width:100%;margin-top:10px;padding-left:40px;" class="bigHR">
    </div>-->
      <div class="col-sm-12">
        <hr style="border-width: 2px;border-color: #25387D;width:100%;margin-top:50px;" class="faqHR" />
      </div>
  </div>
  
  <footer id="footer" class="container" style="padding:0;"> 
	 <!-- FOR HOME PAGE MORE THAN 768px --> 
    <!-- <div class="mob-hide col-md-12" style="padding: 0 5%;"> -->
    <?php 
      $action = $this->uri->segment(2); 
      if ($action == 'contacts') {
        $padding = "padding: 0 4.8%";
      } else {
        $padding = "padding: 0 3.5%";
      }
    ?>
    <div class="mob-hide col-md-12" style="<?php echo $padding;?>">
		<div class="col-xs-12 col-md-12 footerBorder" style="padding:0;">
      		<hr style="border-width: 2px;border-color: #25387D;width:100%;margin-top:10px;" class="bigHR">	
		</div>
		
	<!-- FOR HOME PAGE LESS THAN 768px -->
	<!--<div class="mob-hide col-md-12" style="padding: 0">
		<div class="col-xs-12 col-md-12 footerBorder" style="padding:0;">
      		<hr style="border-width: 2px;border-color: #25387D;width:100%;margin:0;margin-top:10px;" class="bigHR">	
		</div>
	  -->
	  <!-- FOR CONTACT PAGE FROM 1200+ WIDTH -->
	  <!--<div class="mob-hide col-md-12" style="padding: 0 3.9%;">
		<div class="col-xs-12 col-md-12 footerBorder" style="padding:0;">
      		<hr style="border-width: 2px;border-color: #25387D;width:100%;margin-top:10px;" class="bigHR">	
    	</div>
	  
	  <!-- FOR CONTACT PAGE FROM 768-1200 WIDTH -->
	  <!--<div class="mob-hide col-md-12" style="padding: 0 11.7%;">
		<div class="col-xs-12 col-md-12 footerBorder" style="padding:0;">
      		<hr style="border-width: 2px;border-color: #25387D;width:100%;margin-top:10px;" class="bigHR">	
    	</div>-->
		  
      <div class="col-xs-12 col-md-6 footerLeft">
        <p><strong><b><?php echo (isset($site_title))?$site_title:'Shuttleing S.L.'; ?></b></strong>
          | Marqués de Mulhacen, 8. 08034 Barcelona (Spain).
          <?php /*CIF: B66939562 if(isset($site_email) && trim($site_email)) { ?>

      <div class="col-xs-12 col-md-6 footerLeft">      
        <p><strong><?php echo (isset($site_title))?$site_title:''; ?></strong>
          <span class="separator">|</span>  
          <a href="mailto:<?php echo (isset($site_email))?$site_email:''; ?>"><?php echo (isset($site_email))?$site_email:''; ?></a> 
          <?php 
              }
              if(isset($telephone) && trim($telephone)) {
          ?> 
          <span class="separator">|</span> Telf. <?php echo (isset($telephone))?$telephone:''; ?> 
          <?php } */ ?>
        </p>
      </div>
      <div class="col-xs-12 col-md-6 footerRight">
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/cc/js/jquery.counterup.min.js"></script>
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
  <script type="text/javascript">
  $(document).ready( function() {
    $('.counter').counterUp();
  });
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-365764-36', 'auto');
  ga('send', 'pageview');
 
</script>
<svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg></body>
</html>
