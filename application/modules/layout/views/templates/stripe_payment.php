  <form method="POST" class="validateForm" action="<?php echo site_url().$lang.'/paymentprocess'; ?>" id="payment-form">
    <div class="row row-eq-height payment-div">
      <div class="col-md-3 bor-grey">
        <h4 style="font-weight:bold;color: #25387d;">Summary: 
        </h4> 
        <p></p>
        <div>
          <span class="sumhead"><?php echo lang('source'); ?>: </span>
          <span class="duplicateList" data-id="start_from"> <?php echo $bookings['start_from']; ?> </span>
        </div>
        <div>
          <span class="sumhead"><?php echo lang('designation'); ?>: </span>
          <span class="duplicateList" data-id="end_at"> <?php echo $bookings['end_at']; ?></span>
        </div>
        <div>
          <span class="sumhead"><?php echo lang('start_date'); ?>: </span>
          <span class="duplicateList" data-id="start_journey"> <?php echo Date('d/m/Y', strtotime($bookings['start_journey'])); ?></span>
        </div>
        <?php
          if(isset($return_bookings)) {
        ?>
        <div>
          <span class="sumhead"><?php echo lang('end_date'); ?>: </span>
          <span class="duplicateList" data-id="return_journey"> <?php echo Date('d/m/Y', strtotime($return_bookings['start_journey'])); ?></span>
        </div>
        <?php } ?>
        <div>
          <span class="sumhead"><?php echo lang('no_of_passengers'); ?>: </span>
          <span class="duplicateList" data-id="adults"> <?php echo $bookings['adults'] + $bookings['kids']; ?></span>
        </div>
        
        <div>
          <span class="sumhead"><?php echo lang('country'); ?>: </span>
          <span class="duplicateList" data-id="country"> <?php echo $clients['country']; ?></span>
        </div>
        <?php /*
        <div>
          <span class="sumhead">Flight nº: </span>
          <span class="duplicateList" data-id="flight_no"> <?php echo $bookings['flight_no']; ?></span>
        </div>
        */ ?>
        <div>
          <span class="sumhead"><?php echo lang($bookings['start_from_lang']); ?>: </span>
          <span class="duplicateList" data-id="flight_time"> <?php echo date('H:i', strtotime($bookings['hour'])); ?></span>
        </div>
        <?php
          if(isset($return_bookings)) {
        ?>
        <div>
          <span class="sumhead"><?php echo lang($bookings['end_at_lang']); ?>: </span>
          <span class="duplicateList" data-id="flightlanding_time"> <?php echo $return_bookings['hour']; ?></span>
        </div>
        <?php } ?>
        <p class="text-justify">
        </p>
        <h4 class="resumen price-h">
          <button type="button" class="btn btn-lg pickbluebg" style="background:#25377d;"><?php echo lang('price'); ?>: <span class="price_total"><?php echo $bookings['price']; ?></span>&nbsp;&euro;</button>
        </h4>
      </div>
      <div class="col-md-6 panel-div">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo lang('add_credit_card');?></h3>
          </div>
          <div class="panel-body">
            <div class="vert-outer">
              <div class="vert-inner">
            <?php $this->load->view('layout/alerts'); ?>
            <div class="row">
              <div class="form-group col-xs-12">
                <div id="payment-errors" ></div>
              </div>
              <div class="form-group col-xs-12">
                <?php 
                echo  form_input(array('type'=>'text', 'placeholder'=>lang('card_holder'), 'class'=>'card-number-holder form-control validate[required]', 'autocomplete'=>'off', 'data-errormessage-value-missing'=>lang('require_field') )); ?>
              </div>
              <div class="form-group col-xs-12">
                <?php 
                echo  form_input(array('type'=>'text', 'placeholder'=>lang('card_number'), 'class'=>'card-number form-control validate[required]', 'autocomplete'=>'off', 'maxlength'=>'16','data-errormessage-value-missing'=>lang('require_field') )); ?>
              </div>
              <div class="form-group col-xs-12">
                <?php echo  form_input(array('type'=>'text', 'placeholder'=>lang('cvc'), 'class'=>'card-cvc form-control validate[required]', 'autocomplete'=>'off', 'maxlength'=>'4', 'data-errormessage-value-missing'=>lang('require_field'))); ?>
              </div>
              <div class="form-group col-xs-6 pad-mon">
                <?php 
                  echo  form_dropdown('months', $months, null, 'class="card-expiry-month form-control validate[required]" data-errormessage-value-missing="'.lang('require_field').'"');
                ?>
              </div>
              <div class="form-group col-xs-6 pad-year">
                <?php 
                  echo  form_input(array('type'=>'text', 'placeholder'=>lang('yyyy'), 'class'=>'card-expiry-year form-control validate[required]', 'autocomplete'=>'off', 'maxlength'=>'4', 'data-errormessage-value-missing'=>lang('require_field')));
                ?>
              </div>
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 bor-grey">
        <div class="vert-outer">
          <div class="vert-inner">
            <img src="<?php echo IMAGEPATH; ?>visamaster.png">
            <img src="<?php echo IMAGEPATH; ?>mastermaestro.png">
            <h1 class="pay-stripe">stripe</h1>
            <p>Secure payment using Stripe platform</p>
          </div>
        </div>
      </div>
    </div> 
    <div class="row">
      <div class="col-md-12 mar-btn">
        <center>
          <button type="submit" class="btn btn-block btn-pay"  id="submitBtn"><?php echo lang('pay'); ?></button>
        </center>
      </div>
    </div>
  </form>
<script type='text/javascript'>
  var stripeKey = '<?php echo $this->config->item('STRIPE_PUBLIC_KEY'); ?>';
</script>
