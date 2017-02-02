<?php
	$template_path = base_url()."assets/cc/";
	$this->load->view('header');
	$modalForm = site_url($lang.'/reserva01');
?>
<div class="container">
    <div class="row">
		<div class="col-md-12">

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active stepClick" data-class="firstStep"><span class="step">1</span>
							<a href="#firstStep">
							CHOOSE YOUR ROUTE</a>
						</li>
						<li class="stepClick disabled" data-class="secondStep"><span class="step">2</span>
							<a href="#secondStep">
							ROUTE SCHEDULE</a>
						</li>
						<li class="stepClick disabled" data-class="thirdStep"><span class="step">3</span>
							<a href="#thirdStep">
							INFO AND PAYMENT</a>
						</li>
					</ul>
					<div class="tab-content">
            <div class="formErrorArrow formErrorArrowBottom" id="firstPageError" style="display:none;">
              <div class="formErrorContent"></div>
            </div>
						<?php
              $this->load->view('reservation_tab1');
              $this->load->view('reservation_tab2');
              $this->load->view('reservation_tab3');
            ?>
          </div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type='text/javascript'>
  /* Intializing the javascript variables using php as per the language selected */
  var siteUrl = '<?php echo site_url($lang);?>'; 
  var baseUrl = '<?php echo site_url();?>'; 
  var baby_error= "";
  var departure_time = '<?php echo lang('departure_time'); ?>';
  var landing_time = '<?php echo lang('landing_time'); ?>';
  var type_hotel = '<?php echo lang('type_hotel'); ?>';
  var type_terminal = '<?php echo lang('type_terminal'); ?>';
  var invalid_date = '<?php echo lang('invalid_date'); ?>';
</script>
<?php $this->load->view('footer');?>
