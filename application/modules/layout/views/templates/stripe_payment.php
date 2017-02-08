<?php
	$this->load->view('header');
?>
<div class="container bodypad">
  <div class="col-md-6 col-md-offset-3">
  <div class="panel panel-default ">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo lang('payment_process');?></h3>
    </div>
    <div class="panel-body">
      <?php $this->load->view('layout/alerts'); ?>
        <div class="row">
          <div class="form-group col-xs-12">
            <div id="payment-errors" ></div>
          </div>
            <form method="POST" class="validateForm" action="<?php echo site_url().$lang.'/paymentprocess'; ?>" id="payment-form">
              <div class="form-group col-xs-12">
                <?php 
                echo  form_input(array('type'=>'text', 'placeholder'=>lang('card_number'), 'class'=>'card-number form-control validate[required]', 'autocomplete'=>'off', 'maxlength'=>'16','data-errormessage-value-missing'=>lang('require_field') )); ?>
                
              </div>
              <div class="form-group col-xs-12">
                <?php echo  form_input(array('type'=>'text', 'placeholder'=>lang('cvc'), 'class'=>'card-cvc form-control validate[required]', 'autocomplete'=>'off', 'maxlength'=>'4', 'data-errormessage-value-missing'=>lang('require_field'))); ?>
              </div>
              <div class="form-group col-xs-12">
                <?php 
                  echo  form_input(array('type'=>'text', 'placeholder'=>lang('mm'), 'class'=>'card-expiry-month form-control validate[required]', 'autocomplete'=>'off', 'maxlength'=>'2', 'data-errormessage-value-missing'=>lang('require_field')));
                ?>
              </div>
              <div class="form-group col-xs-12">
                <?php 
                  echo  form_input(array('type'=>'text', 'placeholder'=>lang('yyyy'), 'class'=>'card-expiry-year form-control validate[required]', 'autocomplete'=>'off', 'maxlength'=>'4', 'data-errormessage-value-missing'=>lang('require_field')));
                ?>
              </div>
            <div class="form-group col-xs-12"></div>
            <div class="form-group col-xs-12 col-xs-6 col-md-offset-3">
              <button type="submit" class="btn btn-block"  id="submitBtn"><?php echo lang('go'); ?></button>
            </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
  var stripeKey = '<?php echo $this->config->item('STRIPE_PUBLIC_KEY'); ?>';
</script>
<?php $this->load->view('footer');?>
