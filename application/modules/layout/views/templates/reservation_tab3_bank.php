<div class="tab-pane jsTabPane" id="thirdStep">
  <div class="tabbable-panel circle-show">
		<div class="tabbable-line">
			<ul class="nav nav-tabs ">
				<li class="stepClick disabled circlethree" data-class="thirdStep"><span class="step">3</span>
							<a href="#thirdStep">
							INFO AND PAYMENT</a>
				</li>
			</ul>
		</div>
</div>
	<div id="thirdStepLeft">
  <?php $this->load->view('reservation_tab_common_left'); ?>
   </div>
  <div class="col-sm-9">
    <?php  
      //$this->load->view('reservation_includes'); 
      $this->load->view('reservation_extras'); 
    ?>
			
			<div class="row mybox-5 clientDetails">
			<div class="loginform">
				<form id="loginform">
					<input style="display:none" type="text" name="fakeusernameremembered"/>
					<input style="display:none" type="password" name="fakepassword"/>
					<div class="col-sm-12 paytop" style="height:40px;">
						<!--<div class="form-group col-sm-4 clear-pad-R Add-pad-R" style="margin-top:10px;">
							<input type="text" class="form-control bord-rad-10 bor-col-wht validate[required,custom[email]]" id="login_email" name="login_email" placeholder="User (E-mail)" required>
						</div>
						<div class="form-group col-sm-4 validTextpassword" style="margin-top:10px;">
							<input type="password" class="form-control bord-rad-10 bor-col-wht validate[required]" id="login_password" name="login_password" placeholder="password" required>
						</div>
						<div class="col-sm-2 lostpwd Add-pad-L"><a href="<?php echo site_url($lang.'/recovery_password/clients'); ?>" class="forget_link" target="_blank"><?php //echo lang('you_have_forgotten_the_password'); ?>Lost your password?</a></div>
						<div class="form-group col-sm-2">
							<button type="button"  id="form-submit" class="btn btnnewsize logincheck Enter-lg"><?php echo strtoupper(lang('enter')); ?></button>
						</div>
						<div class="col-sm-12 errorlogin" style="display:none;">
							<span style="position: relative; left: 33%; top: -4px; color: red;"><?php echo lang('invalid_credentials'); ?></span>
						</div>-->
					</div>
				</form>
			</div>
				<form class="validateForm1 client-form">
					<input style="display:none" type="text" name="fakeusernameremembered"/>
					<input style="display:none" type="password" name="fakepassword"/>
					<div class="col-sm-12">
						<input type="hidden" name="client_id" id="client_id">
						<div class="form-group col-sm-4 hiddenData" style="padding-left:0px;display:none;">
							<input type="text" name="extras_array" id="extras_array">
							<input type="text" name="total_price" id="total_price">
							<input type="text" name="promotional_codes_id" id="promotional_codes_id">
							<input type="text" name="promotional_values" id="promotional_values">
							<input type="text" name="promotional_code_values" id="promotional_code_values">
							<input type="text" name="promotional_type" id="promotional_type">
							<input type="text" name="passenger_price" id="passenger_price" value="0">
						</div>
						<div class="form-group col-sm-4 validText clear-pad-RL">
							<input type="text" class="form-control bord-rad-10 validate[required]" id="fullname" name="name" placeholder="<?php echo lang('name'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="form-group col-sm-8 validText clear-pad-R Mob-pad-L">
							<input type="text" class="form-control bord-rad-10 validate[required]" id="surname" name="surname" placeholder="<?php echo lang('surname'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="form-group col-sm-4 validText clear-pad-RL">
							<input type="text" class="form-control bord-rad-10 validate[required,custom[email]]" id="email" name="email" placeholder="Email" required  data-errormessage-value-missing="<?php echo lang('require_field')?>" data-errormessage-custom-error="<?php echo lang('invalid_email'); ?>" >
						</div>
						<div class="form-group col-sm-5 validText mob-pad-RL">
							<input type="text" class="form-control bord-rad-10 validate[required,equals[email]]" id="confirm_email" name="confirm_email" placeholder="<?php echo lang('confirm_email'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>" data-errormessage-pattern-mismatch="<?php echo lang('field_match')?>">
						</div>
						<div class="form-group col-sm-3 validText clear-pad-RL">
							<input type="text" class="form-control bord-rad-10" id="phone" name="phone" placeholder="<?php echo lang('phone'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>" data-errormessage-custom-error="<?php echo lang('invalid_integer'); ?>">
						</div>
						<div class="form-group col-sm-9 validText Mob-pad-R clear-pad-L">
							<input type="text" class="form-control bord-rad-10" id="address" name="address" placeholder="Direction" required  data-errormessage-value-missing="<?php echo lang('require_field')?>" >
						</div>
						<div class="form-group col-sm-3 validText clear-pad-RL">
							<input type="text" class="form-control bord-rad-10" id="cp" name="cp" placeholder="<?php echo lang('postcode'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>" data-errormessage-custom-error="<?php echo lang('invalid_zip'); ?>">
						</div>
						<div class="form-group col-sm-4 validText clear-pad-RL">
							<input type="text" class="form-control bord-rad-10" id="client_country" name="client_country" placeholder="<?php echo lang('country'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="form-group col-sm-4 validText mob-pad-RL">
							<input type="text" class="form-control bord-rad-10" id="city" name="city" placeholder="<?php echo lang('city'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="form-group col-sm-4 validText clear-pad-RL">
							<input type="text" class="form-control bord-rad-10" id="nationality" name="nationality" placeholder="<?php echo lang('nationality'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="form-group col-sm-4 validText clear-pad-RL">
							<!--<input type="text" class="form-control bord-rad-10 validate[required]" id="dni_passport" name="dni_passport" placeholder="pasaporte" required>-->
							<select class="form-control" id="dni_passport" name="dni_passport" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
								<option value=""><?php echo lang('id_or_passport'); ?></option>
								<option value="id"><?php echo lang('dni_id'); ?></option>
								<option value="passport"><?php echo lang('dni_passport'); ?></option>
							</select>
						</div>
						<div class="form-group col-sm-4 validText mob-pad-RL">
							<input type="text" class="form-control bord-rad-10" id="doc_no" name="doc_no" placeholder="<?php echo lang('number_of_document'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<!--<div class="form-group col-sm-4 showExtras clear-pad-RL">
							<input type="checkbox" name="save_extra" id="save_extra" value="1"> <label style="position: relative; top: -1px;" for="save_extra"><?php echo lang('save_my_details_for_future_bookings'); ?></label>
						</div>-->
						<div class="form-group col-sm-4 validText showPassword clear-pad-RL" style="clear:both">
							<input type="password" class="form-control bord-rad-10 validate[required]" id="password" name="password" placeholder="Password" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="form-group col-sm-4 validText showPassword mob-pad-RL">
							<input type="password" class="form-control bord-rad-10 validate[required,equals[password]]" id="confirm_password" name="confirm_password" placeholder="<?php echo lang('confirm_password'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="form-group col-sm-4"><?php // echo lang('terms_and_conditions'); ?></div>
				</div>
				<?php /*
				<div class="col-sm-12">
					<div class="col-sm-4" style="padding-left:0px;"><?php // echo lang('terms_and_conditions'); ?></div>
					<div class="col-sm-8">
					<p class="txt-size-14 validateRadio">
						<input value="1" class="validate[required]" name="terms_cond" id="terms_cond" type="checkbox">
						<label style="font-family: Gothamlight;font-size: 12px;" for="terms_cond">&nbsp;<?php echo lang('accept'); ?></label>
						<a href="<?php echo site_url($lang.'/terms'); ?>" target="_blank" class="orange" style="font-family: Gothamlight;font-size: 12px;">&nbsp;<?php echo lang('terms_and_conditions'); ?></a> <span style="position: relative; top: -1px;"><!--&</span> 
						<a style="position: relative; top: -1px;" href="<?php echo site_url($lang.'/terms'); ?>" class="orange" target="_blank"><?php echo lang('privacy_policy'); ?></a>-->
					</p>
					</div>
				</div>
				*/ ?>
				</form>
			</div>
			<div class="row mybox-3">
				<div class="col-xs-12 myapplicar no-pad-left">
				<!--<div class="col-xs-4" style="padding-left:0px;"><h4 style="font-weight:bold;"><?php //echo lang('promotional_code'); ?></h4></div>-->
					<div class="col-xs-4" style="margin-top:3px;padding-left:0px;"> <input type="text" class="form-control promoinput" placeholder="<?php //echo lang('promotional_code'); ?>Promotional Code" id="promo_code" name="promo_code"></div>
					<div class="col-xs-2" style="margin-top:3px"> 
						<button class="btn btn-default pull-right applicarbtn promo-btn"><?php echo lang('apply'); ?></button>
					</div>
				</div>
				<div class="col-sm-12 errorCodes" style="display:none;">
					<span style="position: relative; left: 0%; top: -4px; color: red;"><?php echo lang('invalid_codes'); ?></span>
				</div>
			</div>
			<form id="bank_form" action="" method="POST" style="display:none;">
					<input type="text" name="Ds_SignatureVersion" id="Ds_SignatureVersion" value=""/>
					<input type="text" name="Ds_MerchantParameters" id="Ds_MerchantParameters" value=""/>
					<input type="text" name="Ds_Signature" id="Ds_Signature" value="" />
				</form>
				<!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="paypalform" target="_top">-->
				<form action="payment/" method="post" id="stripeform">
					<input type="hidden" name="duplicate_bool" id="duplicate_bool" value="0">
					<input type="hidden" name="amount" class="amount" value="">
					<input type="hidden" name="itemname" value="Reservation">
					<input type="hidden" name="itemnumber" value="1">
					<input type="hidden" name="itemQty" value="1">
					<input type="hidden" name="BookId" id="BookId">
					<input type="hidden" name="itemdesc" value="" /> 
					<input type="hidden" name="itemprice" class="amount" value="">
					
					<div class="row">
						<div class="col-sm-12 pay-option jsPaymentDiv">
							<?php if($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2 && ($collaborator_details['payment_methods'] == 'online_and_cash' || ($collaborator_details['available_seats'] == 'activate' && $collaborator_details['payment_methods'] == 'online'))) { 
							?>
								<span style="font-size:16px;font-family: Gothambook;"><?php echo lang('how_pay'); ?></span><br>
								<span>
								<input style="position: relative; top: -2px;"type="radio" class="validate[required]" name="paymentmethod" id="paybyonline" value="bank"  data-errormessage-value-missing="<?php echo lang('require_field')?>">
								<label style="position: relative; top: -3px;font-family: Gothamlight;" for="paybyonline"><?php echo lang('pay_by_credit'); ?></label>
							</span>
						<?php
							if($collaborator_details['available_seats'] == 'activate') {
						?>
							
							<span id="collaborator_seats">
								<input style="position: relative; top: -2px;"type="radio" class="validate[required]" name="paymentmethod" id="available_seats" value="available_seats"  data-errormessage-value-missing="<?php echo lang('require_field')?>">
								<label style="position: relative; top: -3px; font-family: Gothamlight;" for="available_seats"><?php echo lang('available_seats'); ?>.</label>
							</span>
						<?php } ?>	
						<?php  if($collaborator_details['payment_methods'] == 'online_and_cash'){ ?>
							<span>
								<input type="radio" class="validate[required]" name="paymentmethod" id="paybycash" value="cash"> 
								<label style="position: relative; top: -2px; font-family: Gothamlight;" for="paybycash"  data-errormessage-value-missing="<?php echo lang('require_field')?>"><?php echo lang('pay_by_cash'); ?>.</label>
							</span>
						<?php } } else {
						?>
						<div class="hide">
							<input type="radio" name="paymentmethod" value="bank" checked />
						</div>
						<?php	
						} ?>
						</div>
					</div>


					<div class="row row-eq-height">
						<div class="col-sm-4 col-pay-div">
							<div class="vert-outer pay-div" style="float:left;">
								<div class="vert-inner">
									<h3 class="totalpay">
										<p style="font-size: 18px;"><?php echo lang('total_pay'); ?>:</p>
										<p id="price_final">12.12<b class="euro">&euro;</b></p>
									</h3>
									</div>
								</div>	
						</div>
						<div class="col-sm-6 col-pay-accept">
							<div class="vert-outer pay-accept" style="float:right;">
								<div class="vert-inner">

									<div class="checkboxes">
								    <label for="terms_cond" style="font-family: Gothamlight;font-size: 12px;">
								    		<input type="checkbox" value="1" class="validate[required]" name="terms_cond" id="terms_cond" style="margin:0px !important;" /> 
								    		<span><?php echo lang('accept'); ?>
								    			<a href="<?php echo site_url($lang.'/terms'); ?>" target="_blank" class="orange" style="font-family: Gothamlight;font-size: 12px;">&nbsp;<?php echo lang('terms_and_conditions'); ?></a>
								    		</span>
								    </label>
								    
								  </div>

									
								</div>
							
							</div>
						</div>
						<div class="col-sm-2 col-pay-btn">
							<div class="vert-outer pay-btn" style="float:right;">
								<div class="vert-inner">
							<button type="button" id="form-submit" class="btn pull-right btn-lg jslastSubmit"><?php echo lang('pay'); ?></button> 
								</div>
							</div>
							
						</div>
					</div>
					<div class="row mybox-3" style="padding-left:0px;width:104%;">

				    <?php /*<h3 class="totalpay"><span style="font-size: 18px;">
						<?php echo lang('total_pay'); ?>:
						<br><span id="price_final">12.12</span><b class="euro">&euro;</b></h3>
						</span> 
						<button type="button" id="form-submit" class="btn pull-right btn-lg jslastSubmit"><?php echo lang('pay'); ?></button> 
						 */ ?>
						<div class="paymentValid mypaypalimg">
						<!--<span><img src="<?php //echo IMAGEPATH; ?>paypal.jpg"></span>-->
						
						<?php /*
						<span>
							<input style="position: relative; top: -2px;" type="radio" class="validate[required]" name="paymentmethod" id="sabadell_bank" value="bank"  data-errormessage-value-missing="<?php echo lang('require_field')?>">
							<label style="position: relative; top: -3px;font-family: Gothamlight;" for="sabadell_bank"><?php echo lang('pay_by_credit'); ?></label>
						</span>
						*/ ?>
						
						
							</div>
					</div>


				</form>
			
		</div>
	</div>	
</div>
</div>

						
