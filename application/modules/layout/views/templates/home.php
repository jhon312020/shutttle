<?php
	$ln = $this->uri->segment(1);
	if(!$ln || $ln == ""){	$ln = "es"; }
	$this->load->view('home_header');
?>
<div class="bgColor" style="background-color:#ececec; padding: 60px 0;">
<div class="container">
  <?php $this->load->view('reservation_form'); ?>
	<div class="row">
	<p class="homepara"><?php echo lang('home_intro'); ?> </p>
	<div class="col-sm-12 col-xs-12 home-label" style="text-align:center;">
		<div class="col-xs-4" style="padding:0; border-right: 2px #000000 solid;"><p><span class="counter"><?php echo $total_people > 200 ? $total_people : 200; ?></span><br>People</p></div><!--<div class="divider1"></div>-->
		<div class="col-xs-4" style="padding:0; border-right: 2px #000000 solid;"><p><span class="counter"><?php echo $total_nationalites > 15 ? $total_nationalites : 15; ?></span><br>Nationalities</p></div><!--<div class="divider2"></div>-->
		<div class="col-xs-4" style="padding:0;"><p><span class="counter"><?php echo $total_trips;?></span><br>Trips</p></div>
	</div>
	</div>
</div>
</div>
<div class="container">
  <div class="row">
    <!-- content -->
    <section class="main">
      <div class="grid-custom home-news">
        <div class="row col-sm-12 newspad">
          <?php $img_url = IMAGEPATH.'homepage/boxes/'; ?>
          <?php foreach($boxes as $box) {   
              $link = $box->link;
              if ($ln =='es') { 
                $image_name = $box->image_es;
                $title = $box->title_es;
                $content = $box->text_above_banner_es;
              } else {
                $image_name = $box->image;
                $title = $box->title;
                $content = $box->text_above_banner; 
              }
            ?>
          <?php if ($link) { ?>
          <a href="<?php echo $link; ?>" target="_blank">
          <?php } ?>
          <div class="col-sm-4 col-xs-6"><img src="<?php echo $img_url.'/'.$image_name; ?>" alt="" class="img-responsive">
            <div class="text">
              <h1><?php echo $title; ?></h1>
                <p><?php echo $content; ?></p>    
            </div>
            </div>
          <?php if ($link) { ?>
            </a>
          <?php } ?>
          <?php } ?>
        </div>
      </div>
    </section>
	</div>
</div>
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
  var placeLocations = <?php echo json_encode($select_location); ?>;
  var locations = <?php echo json_encode($locations); ?>;
  var collaborator = <?php echo json_encode($collaborator); ?>;
  var hold_passenger_text = '<?php echo lang('One case and 1 holdall<br>per passenger'); ?>';
  var door_to_door_text = '<?php echo lang('Door to door /<br/>Direct journey'); ?>';
</script>
<?php
  $this->load->view('footer');
?>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/cc/js/home.js"></script>
<style>
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: pink;
}
::-moz-placeholder { /* Firefox 19+ */
  color: pink;
}
:-ms-input-placeholder { /* IE 10+ */
  color: pink;
}
:-moz-placeholder { /* Firefox 18- */
  color: pink;
}
</style>