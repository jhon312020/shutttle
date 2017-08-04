<?php
	$path = $this->uri->segment(2);
  $lang = $this->uri->segment(1);
	$full_path_en = str_replace('/'.$lang, '/en', current_url());
  $full_path_es = str_replace('/'.$lang, '/es', current_url());
  $full_path_de = str_replace('/'.$lang, '/de', current_url());
  $full_path_fr = str_replace('/'.$lang, '/fr', current_url());
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
      <?php if($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2){} else { ?>
        <a href="<?php echo site_url('/').$lang.'/collaborators/login'; ?>"><?php echo lang('collaborators_access'); ?></a> <span class="separator">|</span>  
      <?php } ?>
        <a href="<?php echo site_url('/').$lang; ?>/terms"><?php echo lang('terms_and_conditions'); ?></a> <span class="separator">|</span> 
        <a href="<?php echo (isset($social_facebook))?$social_facebook:'#'; ?>" style="display:none;"><img src="<?php echo IMAGEPATH;?>facebook.png" style="width:20px;"></a> <span class="separator" style="display:none;">|</span> 
        <a href="<?php echo $full_path_es; ?>" onClick="return checkPage();"><img src="<?php echo IMAGEPATH;?>spain.png" style="width:20px;"></a> <span class="separator">|</span> 
        <a href="<?php echo $full_path_en; ?>" onClick="return checkPage();"><img src="<?php echo IMAGEPATH;?>english.png" style="width:20px;"></a> <span class="separator">|</span> 
        <a href="<?php echo $full_path_de; ?>" onClick="return checkPage();"><img src="<?php echo IMAGEPATH;?>german_flag.png" style="width:20px;height:11.172px;"></a> <span class="separator">|</span> 
        <a href="<?php echo $full_path_fr; ?>" onClick="return checkPage();"><img src="<?php echo IMAGEPATH;?>france_flag.gif" style="width:20px;height:11.172px;"></a>
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
<svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg>

<script type='text/javascript'>var fc_CSS=document.createElement('link');fc_CSS.setAttribute('rel','stylesheet');var fc_isSecured = (window.location && window.location.protocol == 'https:');var fc_lang = document.getElementsByTagName('html')[0].getAttribute('lang'); var fc_rtlLanguages = ['ar','he']; var fc_rtlSuffix = (fc_rtlLanguages.indexOf(fc_lang) >= 0) ? '-rtl' : '';fc_CSS.setAttribute('type','text/css');fc_CSS.setAttribute('href',((fc_isSecured)? 'https://d36mpcpuzc4ztk.cloudfront.net':'http://assets1.chat.freshdesk.com')+'/css/visitor'+fc_rtlSuffix+'.css');document.getElementsByTagName('head')[0].appendChild(fc_CSS);var fc_JS=document.createElement('script'); fc_JS.type='text/javascript'; fc_JS.defer=true;fc_JS.src=((fc_isSecured)?'https://d36mpcpuzc4ztk.cloudfront.net':'http://assets.chat.freshdesk.com')+'/js/visitor.js';(document.body?document.body:document.getElementsByTagName('head')[0]).appendChild(fc_JS);window.livechat_setting= 'eyJ3aWRnZXRfc2l0ZV91cmwiOiJpbmZvc2h1dHRsZWluZy5mcmVzaGRlc2suY29tIiwicHJvZHVjdF9pZCI6bnVsbCwibmFtZSI6IlNodXR0bGVpbmcgIiwid2lkZ2V0X2V4dGVybmFsX2lkIjpudWxsLCJ3aWRnZXRfaWQiOiJiMzBiM2I3Ny01ZGRkLTQzYTEtYjNlOS0yZjgyM2IzNTFjZjgiLCJzaG93X29uX3BvcnRhbCI6ZmFsc2UsInBvcnRhbF9sb2dpbl9yZXF1aXJlZCI6ZmFsc2UsImxhbmd1YWdlIjoiZW4iLCJ0aW1lem9uZSI6Ik1hZHJpZCIsImlkIjozMjAwMDAwOTgzMywibWFpbl93aWRnZXQiOjEsImZjX2lkIjoiMzk3YmZjOThmZmRiZTUxZDc3MzhjNTY0MDFmYzY1MDYiLCJzaG93IjoxLCJyZXF1aXJlZCI6MiwiaGVscGRlc2tuYW1lIjoiU2h1dHRsZWluZyAiLCJuYW1lX2xhYmVsIjoiTmFtZSIsIm1lc3NhZ2VfbGFiZWwiOiJNZXNzYWdlIiwicGhvbmVfbGFiZWwiOiJQaG9uZSIsInRleHRmaWVsZF9sYWJlbCI6IlRleHRmaWVsZCIsImRyb3Bkb3duX2xhYmVsIjoiRHJvcGRvd24iLCJ3ZWJ1cmwiOiJpbmZvc2h1dHRsZWluZy5mcmVzaGRlc2suY29tIiwibm9kZXVybCI6ImNoYXQuZnJlc2hkZXNrLmNvbSIsImRlYnVnIjoxLCJtZSI6Ik1lIiwiZXhwaXJ5IjowLCJlbnZpcm9ubWVudCI6InByb2R1Y3Rpb24iLCJlbmRfY2hhdF90aGFua19tc2ciOiJUaGFuayB5b3UhISEiLCJlbmRfY2hhdF9lbmRfdGl0bGUiOiJFbmQiLCJlbmRfY2hhdF9jYW5jZWxfdGl0bGUiOiJDYW5jZWwiLCJzaXRlX2lkIjoiMzk3YmZjOThmZmRiZTUxZDc3MzhjNTY0MDFmYzY1MDYiLCJhY3RpdmUiOjEsInJvdXRpbmciOnsiY2hvaWNlcyI6eyJsaXN0MSI6WyIwIl0sImxpc3QyIjpbIjAiXSwibGlzdDMiOlsiMCJdLCJkZWZhdWx0IjpbIjAiXX0sImRyb3Bkb3duX2Jhc2VkIjoiZmFsc2UifSwicHJlY2hhdF9mb3JtIjoxLCJidXNpbmVzc19jYWxlbmRhciI6bnVsbCwicHJvYWN0aXZlX2NoYXQiOjEsInByb2FjdGl2ZV90aW1lIjo2MCwic2l0ZV91cmwiOiJpbmZvc2h1dHRsZWluZy5mcmVzaGRlc2suY29tIiwiZXh0ZXJuYWxfaWQiOm51bGwsImRlbGV0ZWQiOjAsIm1vYmlsZSI6MSwiYWNjb3VudF9pZCI6bnVsbCwiY3JlYXRlZF9hdCI6IjIwMTctMDctMTVUMTg6MTU6NDYuMDAwWiIsInVwZGF0ZWRfYXQiOiIyMDE3LTA3LTE3VDEwOjM0OjIwLjAwMFoiLCJjYkRlZmF1bHRNZXNzYWdlcyI6eyJjb2Jyb3dzaW5nX3N0YXJ0X21zZyI6IllvdXIgc2NyZWVuc2hhcmUgc2Vzc2lvbiBoYXMgc3RhcnRlZCIsImNvYnJvd3Npbmdfc3RvcF9tc2ciOiJZb3VyIHNjcmVlbnNoYXJpbmcgc2Vzc2lvbiBoYXMgZW5kZWQiLCJjb2Jyb3dzaW5nX2RlbnlfbXNnIjoiWW91ciByZXF1ZXN0IHdhcyBkZWNsaW5lZCIsImNvYnJvd3NpbmdfYWdlbnRfYnVzeSI6IkFnZW50IGlzIGluIHNjcmVlbiBzaGFyZSBzZXNzaW9uIHdpdGggY3VzdG9tZXIiLCJjb2Jyb3dzaW5nX3ZpZXdpbmdfc2NyZWVuIjoiWW91IGFyZSB2aWV3aW5nIHRoZSB2aXNpdG9y4oCZcyBzY3JlZW4iLCJjb2Jyb3dzaW5nX2NvbnRyb2xsaW5nX3NjcmVlbiI6IllvdSBoYXZlIGFjY2VzcyB0byB2aXNpdG9y4oCZcyBzY3JlZW4uIiwiY29icm93c2luZ19yZXF1ZXN0X2NvbnRyb2wiOiJSZXF1ZXN0IHZpc2l0b3IgZm9yIHNjcmVlbiBhY2Nlc3MgIiwiY29icm93c2luZ19naXZlX3Zpc2l0b3JfY29udHJvbCI6IkdpdmUgYWNjZXNzIGJhY2sgdG8gdmlzaXRvciAiLCJjb2Jyb3dzaW5nX3N0b3BfcmVxdWVzdCI6IkVuZCB5b3VyIHNjcmVlbnNoYXJpbmcgc2Vzc2lvbiAiLCJjb2Jyb3dzaW5nX3JlcXVlc3RfY29udHJvbF9yZWplY3RlZCI6IllvdXIgcmVxdWVzdCB3YXMgZGVjbGluZWQgIiwiY29icm93c2luZ19jYW5jZWxfdmlzaXRvcl9tc2ciOiJTY3JlZW5zaGFyaW5nIGlzIGN1cnJlbnRseSB1bmF2YWlsYWJsZSAiLCJjb2Jyb3dzaW5nX2FnZW50X3JlcXVlc3RfY29udHJvbCI6IkFnZW50IGlzIHJlcXVlc3RpbmcgYWNjZXNzIHRvIHlvdXIgc2NyZWVuICIsImNiX3ZpZXdpbmdfc2NyZWVuX3ZpIjoiQWdlbnQgY2FuIHZpZXcgeW91ciBzY3JlZW4gIiwiY2JfY29udHJvbGxpbmdfc2NyZWVuX3ZpIjoiQWdlbnQgaGFzIGFjY2VzcyB0byB5b3VyIHNjcmVlbiAiLCJjYl92aWV3X21vZGVfc3VidGV4dCI6IllvdXIgYWNjZXNzIHRvIHRoZSBzY3JlZW4gaGFzIGJlZW4gd2l0aGRyYXduICIsImNiX2dpdmVfY29udHJvbF92aSI6IkFsbG93IGFnZW50IHRvIGFjY2VzcyB5b3VyIHNjcmVlbiAiLCJjYl92aXNpdG9yX3Nlc3Npb25fcmVxdWVzdCI6IkFnZW50IHNlZWtzIGFjY2VzcyB0byB5b3VyIHNjcmVlbiAifX0=';</script>
</body>
</html>
