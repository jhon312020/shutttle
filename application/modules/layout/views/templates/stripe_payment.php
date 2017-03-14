  <form method="POST" class="stripeForm" action="<?php echo site_url().$lang.'/paymentprocess'; ?>" id="payment-form">
    <input type="hidden" name="book_id" class="bookId">
    <input type="hidden" name="amount" class="amount">
    <div class="row row-eq-height payment-div">
      <div class="col-md-3 bor-grey">
        <h4 style="font-weight:bold;color: #25387d;"><?php echo lang('summary'); ?>
        </h4> 
        <p></p>
        <?php
        $arrowDownClass = "";
        $leftSidebar = array(
          'source'=>'start_from',
          'designation'=>'end_at',
          'start_date'=>'start_journey',
          'flight_time'=>'flight_time',
          'end_date'=>'return_journey',
          'flightlanding_time'=>'flightlanding_time',
          'no_of_passengers'=>'adults',
          /*'country_origin'=>'country',
          'flight_no'=>'flight_no',*/
        );
        foreach ($leftSidebar as $key => $value) {
        ?>
          <div>
            <span class="sumhead"><?php echo lang($key);?>: </span>
            <span class="duplicateList" data-id="<?php echo $value; ?>"></span>
          </div>
        <?php   
        }
      ?>
        
        <p class="text-justify">
        </p>
        <h4 class="resumen price-h">
          <button type="button" class="btn btn-lg pickbluebg" style="background:#25377d;"><?php echo lang('price'); ?>: <span class="price_total"></span>&nbsp;&euro;</button>
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
                  echo  form_dropdown('years', $years, null, 'class="card-expiry-year form-control validate[required]" data-errormessage-value-missing="'.lang('require_field').'"');
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
        <button type="button" class="btn btn-block btn-pay pull-left jsbackToDetails"><?php echo lang('return'); ?></button>
        <button type="button" class="btn btn-block btn-pay pull-right paypalsubmit"  id="submitBtn"><?php echo lang('pay'); ?></button>
      </div>
    </div>
  </form>
