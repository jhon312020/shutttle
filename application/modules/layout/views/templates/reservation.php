<?php
	$this->load->view('header');
	$modalForm = site_url($lang.'/reserva01');
?>
<div class="container">
    <div class="row">
		<div class="col-md-12">
			<div class="tabbable-panel" id="booking_details">
				<div class="tabbable-line">
					<ul class="nav nav-tabs book-desk">
						<li class="active stepClick circleone" data-class="firstStep"><span class="step">1</span>
							<a href="#firstStep">
							<?php echo lang('choose_your_route'); ?>
							</a>
						</li>
						<li class="stepClick disabled circletwo" data-class="secondStep"><span class="step">2</span>
							<a href="#secondStep">
							<?php echo lang('route_schedule'); ?></a>
						</li>
						<li class="stepClick disabled circlethree" data-class="thirdStep"><span class="step">3</span>
							<a href="#thirdStep">
							<?php echo lang('info_and_payment'); ?></a>
						</li>
					</ul>
					<div class="tab-content">
						<?php
              $this->load->view('reservation_tab1');
              $this->load->view('reservation_tab2');
              $this->load->view('reservation_tab3');
            ?>
          </div>
				</div>
			</div>
			<div class="tabbable-panel">
			<?php
			$this->load->view('stripe_payment');
			?>
			</div>
		</div>
	</div>
</div>
<?php
$this->load->view('modals/duplicate_modal');
?>
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
  var less_seats = '<?php echo lang('less_seats'); ?>';
  var image_path = '<?php echo IMAGEPATH; ?>';
  var collaborator_address = <?php echo json_encode($this->details['collaborator_address']); ?>;
	var collaborator_details = <?php echo json_encode($this->details['collaborator_details']); ?>;
  //console.log(collaborator_address );
  var autoSource =  '';
  var user_name = '<?php echo $this->session->userdata('user_name'); ?>';
  var user_type = '<?php echo $this->session->userdata('user_type'); ?>';
  var landing_day_and_time = '<?php echo lang("landing_day_and_time"); ?>';
  var flight_day_and_time = '<?php echo lang("flight_day_and_time"); ?>';
  var invalid_date = "<?php echo lang('invalid_date'); ?>";
  var select_terminal = "<?php echo lang('select_terminal'); ?>";
  var stripeKey = '<?php echo $this->config->item('STRIPE_PUBLIC_KEY'); ?>';
 	var flight_time = "<?php echo lang('flight_time'); ?>";
 	var flight_landing_time = "<?php echo lang('flightlanding_time'); ?>";
  var startValid = false;
  var is_round_trip = true;
  var extra_array = <?php echo json_encode(array_combine(array_column($booking, 'id'), $booking)); ?>;
  console.log(extra_array)
  
</script>
<?php $this->load->view('footer');?>
