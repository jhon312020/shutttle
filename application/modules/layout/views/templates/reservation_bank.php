<?php
	$this->load->view('header');
  
	$modalForm = site_url($lang.'/reserva01');
?>
<style>
.ui-autocomplete-category {
	font-weight: bold;
}
body{
	font-family: 'Gothambook';
}
/* center content 
.tabbable-panel {
	padding: 0% 2.1%;
}
@media (max-width: 1199px) and (min-width: 992px){
.circletwo{
    padding-left: 4%;
    padding-right: 4%;
}
.circletwo{
    padding-left: 6%;
    padding-right: 6%;
}
.circlethree{
    padding-left: 4%;
    padding-right: 4%;
    float: right !important;
}
}
@media (min-width: 1199px) {
.circletwo{
    padding-left: 8% !important;
    padding-right: 8% !important;
}
.circlethree{
    float: right !important;
}		
}	
 center content */
@media (min-width: 992px){
  .es_circletwo{
    padding-left: 4%;
    padding-right: 2%;
  }
  .en_circletwo{
    padding-left: 5%;
    padding-right: 4%;
  }
  .circlethree{
    margin-left: 0px;
    float: right !important;
  }   
}

@media (max-width: 1199px) {
  .circletwo{
    padding-left: 3%;
    padding-right: 0%;
  }
}
  .ui-autocomplete {
    max-height: 200px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
  }
  /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
  * html .ui-autocomplete {
    height: 200px;
  }

  input[type="number"] {
  	height: 45px;
  }
  
</style>
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
						<li class="stepClick disabled circletwo <?php echo $lang.'_circletwo'; ?>" data-class="secondStep"><span class="step">2</span>
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
              $this->load->view('reservation_tab3_bank');
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
  var departure_time = '<?php echo lang('Departure Time'); ?>';
  var landing_time = '<?php echo lang('landing_time'); ?>';
  var type_hotel = '<?php echo lang('type_hotel'); ?>';
  var type_terminal = '<?php echo lang('type_terminal'); ?>';
  var invalid_date = '<?php echo lang('invalid_date'); ?>';
  var less_seats = '<?php echo lang('less_seats'); ?>';
  var choose_your_car = '<?php echo lang('Chooose your car'); ?>';
  var passengers_text = '<?php echo lang('passengers'); ?>';
  var overview_text = '<?php echo lang('Overview'); ?>';
  var important_travel_info_text = '<?php echo lang('Important Travel information'); ?>';
  var price_for_text = '<?php echo lang('Price for'); ?>';
  var all_include_text = '<?php echo lang('All included'); ?>';
  var book_now_text = '<?php echo lang('book_now'); ?>';


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
  var placeLocations = <?php echo json_encode($select_location); ?>;
  var locations = <?php echo json_encode($locations); ?>;
  var collaborator = <?php echo json_encode($collaborator); ?>;
  var hold_passenger_text = '<?php echo lang('One case and 1 holdall<br>per passenger'); ?>';
  var door_to_door_text = '<?php echo lang('Door to door /<br/>Direct journey'); ?>';
</script>
<?php $this->load->view('footer');?>
<script>
$(document).ready(function ($) {
   $('.spinner .btn:first-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {    
        input.val(parseInt(input.val(), 10) + 1);
      } else {
        btn.next("disabled", true);
      }
    });
    $('.spinner .btn:last-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {    
        input.val(parseInt(input.val(), 10) - 1);
      } else {
        btn.prev("disabled", true);
      }
    });
});
</script>