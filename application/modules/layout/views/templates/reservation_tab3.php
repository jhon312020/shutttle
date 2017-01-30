<?php
	//echo $lang;
	$template_path = base_url()."assets/cc/";
	$ln = $this->uri->segment(1);
	//echo $ln;die;
	if(!$ln || $ln == ""){	$ln = "es"; }
?>
<div class="tab-pane" id="tab_default_3">
  <?php $this->load->view('reservation_tab_common_left'); ?>
  <div class="col-sm-9 totStep" id="thirdStep">
			<div class="row mybox-1">
				<div class="col-sm-12"><h5><?php echo lang('includes'); ?></h5></div>
				<div class="col-sm-12">
					<ul class="res_inc">
						<li><span><?php echo lang('low_cost'); ?></li>
						<li><span><?php echo lang('special_discounts'); ?></span></li>
						<li><span><?php echo lang('child_free'); ?></span></li>
						<li><span><?php echo lang('free_internet'); ?></span></li>
						<li><span><?php echo lang('payment_facilities'); ?></span></li>
						<li><span><?php echo lang('bag_free'); ?></span></li>
						<li><span><?php echo lang('pack_map'); ?></span></li>
						<li><span><?php echo lang('mb_enable_device'); ?></span></li>
					</ul>
				</div>
			</div>
			<div class="row">
			<h4 class="sub_sel_ext" style="padding-left: 13px;"><?php echo lang('select_your_extras'); ?></h4>
			</div>
			<?php
			$mat_count=1;
			foreach($booking as $book) {
				$title = ($ln == 'en')?$book['title']:$book['title_es'];
			?>	
			<div class="row mybox-2" id="extraDiv_<?php echo $book['id']; ?>">
				<div class="col-sm-2 mycolwid2"><img src="<?php echo $template_path.'/images/booking_extras/'.$book['image']; ?>"></div>
				<div class="col-sm-10 mycolwid10">
					<span class="orange txt-size-20"><?php echo $title; ?>: </span>
					<h5 class="pull-right" data-extra-name="<?php echo $mat_count; ?>" data-extra-title="<?php echo $title; ?>">
						<span class="my_right_price" data-extra-price="<?php echo $book['price']; ?>"> <?php echo $book['price'].'&euro; / '.(($book['type'])?lang('unit'):$title); ?></span> 
						<br><br> 
						<?php 
						if($book['type']){
						?>
						<select size="1" class="mynumber_input">
						<?php foreach(range(1,10) as $sel) { ?>
						<option><?php echo $sel<10?'0'.$sel:$sel; ?></option>
						<?php } ?>
						</select>
						<?php } ?>
						<button class="btn btn-default orangebg2 addextra"><span class="mob_show_opc">+</span><span class="mob_hide_opc"><?php echo lang('add'); ?></span></button>
					</h5> 
					<br>
					<?php echo ($ln == 'en')?$book['subtitle']:$book['subtitle_es']; ?>
					<br><br> <span class="more_info_click orange txt-size-14"><?php echo lang('more_info'); ?>
					<div class="show_more_info orange txt-size-14 mar-top-20" style="display:none;">
					<?php echo ($ln == 'en')?$book['description_en']:$book['description_es']; ?>
					</div></span>
				</div>
			</div>				
			<?php	
				$mat_count++;
			}
			?>
			<div class="row mybox-3">
				<div class="col-xs-12 myapplicar">
					<div class="col-xs-4" style="padding-left:0px;"><h4 style="font-weight:bold;"><?php echo lang('promotional_code'); ?></h4></div>
					<div class="col-xs-5" style="margin-top:3px;"> <input type="text" class="form-control light_violet applicartxt bord-rad-10" id="promo_code" name="promo_code"></div>
					<div style="margin-top:3px"> <button class="btn btn-default pull-right applicarbtn"><?php echo lang('apply'); ?></button></div>
				</div>
				<div class="col-sm-12 errorCodes" style="display:none;">
					<span style="position: relative; left: 33%; top: -4px; color: red;"><?php echo lang('invalid_codes'); ?></span>
				</div>
			</div>
			<div class="row mybox-4 loginform">
				<form id="loginform">
					<input style="display:none" type="text" name="fakeusernameremembered"/>
					<input style="display:none" type="password" name="fakepassword"/>
					<div class="col-sm-12">
						<div class="form-group col-sm-5" style="padding-left:0px;">
							<label for="email" class="h4"><?php echo lang('user'); ?></label>
							<input type="text" class="form-control bord-rad-10 bor-col-wht validate[required,custom[email]]" id="login_email" name="login_email" placeholder="Enter name" required>
						</div>
						<div class="form-group col-sm-5 validTextpassword">
							<label for="password" class="h4"><?php echo lang('password'); ?></label>
							<input type="password" class="form-control bord-rad-10 bor-col-wht validate[required]" id="login_password" name="login_password" placeholder="Enter password" required>
						</div>
						<div class="form-group">
							<button type="button"  id="form-submit" class="btn pull-right light_violet mygo btnnewsize logincheck" style="margin-top:40px;"><?php //echo lang('go'); ?>Go</button>
						</div>
						<div class="pull-left"><a href="<?php echo site_url($ln.'/recovery_password/clients'); ?>" class="forget_link" target="_blank"><?php echo lang('you_have_forgotten_the_password'); ?></a></div>
						<div class="col-sm-12 errorlogin" style="display:none;">
							<span style="position: relative; left: 33%; top: -4px; color: red;"><?php echo lang('invalid_credentials'); ?></span>
						</div>
					</div>
				</form>
			</div>
			<div class="row mybox-5 clientDetails">
				<form class="validateForm1">
					<input style="display:none" type="text" name="fakeusernameremembered"/>
					<input style="display:none" type="password" name="fakepassword"/>
					<div class="col-sm-12">
						<h3><?php echo lang('your_reservation_includes'); ?></h3>
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
						<div class="form-group col-sm-4 validText" style="padding-left:0px;">
							<label for="name"><?php echo lang('name'); ?> *</label>
							<input type="text" class="form-control bord-rad-10 validate[required]" id="fullname" name="name" placeholder="<?php echo lang('name'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="form-group col-sm-8 validText">
							<label for="surname"><?php echo lang('surname'); ?> *</label>
							<input type="text" class="form-control bord-rad-10 validate[required]" id="surname" name="surname" placeholder="<?php echo lang('surname'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="form-group col-sm-4 validText" style="padding-left:0px;">
							<label for="email" id="emailValid">Email *</label>
							<input type="text" class="form-control bord-rad-10 validate[required,custom[email]]" id="email" name="email" placeholder="Email" required  data-errormessage-value-missing="<?php echo lang('require_field')?>" data-errormessage-custom-error="<?php echo lang('invalid_email'); ?>" >
						</div>
						<div class="form-group col-sm-4 validText">
							<label for="confirm_email"><?php echo lang('confirm_email'); ?> *</label>
							<input type="text" class="form-control bord-rad-10 validate[required,equals[email]]" id="confirm_email" name="confirm_email" placeholder="<?php echo lang('confirm_email'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>" data-errormessage-pattern-mismatch="<?php echo lang('field_match')?>">
						</div>
						<div class="form-group col-sm-4 validText">
							<label for="phone"><?php echo lang('phone'); ?></label>
							<input type="text" class="form-control bord-rad-10" id="phone" name="phone" placeholder="<?php echo lang('phone'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>" data-errormessage-custom-error="<?php echo lang('invalid_integer'); ?>">
						</div>
						<div class="form-group col-sm-8 validText" style="padding-left:0px;">
							<label for="address"><?php echo lang('street_address'); ?></label>
							<input type="text" class="form-control bord-rad-10" id="address" name="address" placeholder="Direction" required  data-errormessage-value-missing="<?php echo lang('require_field')?>" >
						</div>
						<div class="form-group col-sm-4 validText">
							<label for="postal_code"><?php echo lang('postcode'); ?></label>
							<input type="text" class="form-control bord-rad-10" id="cp" name="cp" placeholder="<?php echo lang('postcode'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>" data-errormessage-custom-error="<?php echo lang('invalid_zip'); ?>">
						</div>
						<div class="form-group col-sm-4 validText" style="padding-left:0px;">
							<label for="client_country"><?php echo lang('country'); ?></label>
							<input type="text" class="form-control bord-rad-10" id="client_country" name="client_country" placeholder="<?php echo lang('country'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="form-group col-sm-8 validText">
						<div class="form-group col-sm-6" style="padding-left:0px;">
							<label for="city"><?php echo lang('city'); ?></label>
							<input type="text" class="form-control bord-rad-10" id="city" name="city" placeholder="<?php echo lang('city'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						</div>
						<div class="form-group col-sm-4 validText" style="padding-left:0px;">
							<label for="nationality"><?php echo lang('nationality'); ?></label>
							<input type="text" class="form-control bord-rad-10" id="nationality" name="nationality" placeholder="<?php echo lang('nationality'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="form-group col-sm-4 validText">
							<label for="dni_passport"><?php echo lang('id_or_passport'); ?></label>
							<!--<input type="text" class="form-control bord-rad-10 validate[required]" id="dni_passport" name="dni_passport" placeholder="pasaporte" required>-->
							<select class="form-control" id="dni_passport" name="dni_passport" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
								<option value="id"><?php echo lang('dni_id'); ?></option>
								<option value="passport"><?php echo lang('dni_passport'); ?></option>
							</select>
						</div>
						<div class="form-group col-sm-4 validText">
							<label for="doc_no"><?php echo lang('number_of_document'); ?></label>
							<input type="text" class="form-control bord-rad-10" id="doc_no" name="doc_no" placeholder="<?php echo lang('number_of_document'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="form-group col-sm-4" style="padding-left:0px;">	</div>
						<div class="form-group col-sm-8 showExtras">
							<input type="checkbox" name="save_extra" id="save_extra" value="1"> <label style="position: relative; top: -1px;" for="save_extra"><?php echo lang('save_my_details_for_future_bookings'); ?></label>
						</div>
						<div class="col-sm-2"></div>
						<div class="form-group col-sm-4 validText showPassword"  style="padding-left:0px;">
							<label for="password"><?php echo lang('password'); ?></label>
							<input type="password" class="form-control bord-rad-10 validate[required]" id="password" name="password" placeholder="Password" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="form-group col-sm-4 validText showPassword">
							<label for="confirm_password"><?php echo lang('confirm_password'); ?></label>
							<input type="password" class="form-control bord-rad-10 validate[required,equals[password]]" id="confirm_password" name="confirm_password" placeholder="<?php echo lang('confirm_password'); ?>" required  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						</div>
						<div class="col-sm-2"></div>
				</div>
				<div class="col-sm-12" style="padding:0px;margin-left:-10px; width:103%;">
					<hr class="picklightblueborder">
				</div>
				
				<div class="col-sm-12">
					<div class="col-sm-4" style="padding-left:0px;"><?php echo lang('terms_and_conditions'); ?></div>
					<div class="col-sm-8">
					<p class="txt-size-14 validateRadio">
						<input value="1" class="validate[required]" name="terms_cond" id="terms_cond" type="checkbox">
						<label style="position: relative; top: -1px;" for="terms_cond">&nbsp;<?php echo lang('accept'); ?></label>
						<a href="<?php echo site_url($ln.'/terms'); ?>" target="_blank" class="orange" style="position: relative; top: -1px;">&nbsp;<?php echo lang('terms_and_conditions'); ?></a> <span style="position: relative; top: -1px;"><!--&</span> 
						<a style="position: relative; top: -1px;" href="<?php echo site_url($ln.'/terms'); ?>" class="orange" target="_blank"><?php echo lang('privacy_policy'); ?></a>-->
					</p>
					</div>
				</div>
				</form>
				<div class="col-sm-12" style="padding:0px;margin-left:-10px; width:103%;">
				<hr class="picklightblueborder">
				</div>
				<form id="bank_form" action="" method="POST" style="display:none;">
					<input type="text" name="Ds_SignatureVersion" id="Ds_SignatureVersion" value=""/>
					<input type="text" name="Ds_MerchantParameters" id="Ds_MerchantParameters" value=""/>
					<input type="text" name="Ds_Signature" id="Ds_Signature" value="" />
				</form>
				<!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="paypalform" target="_top">-->
				<form action="process/?paypal=checkout" method="post" id="paypalform">
					<input type="hidden" name="duplicate_bool" id="duplicate_bool" value="0">
					<input type="hidden" name="amount" class="amount" value="">
					<input type="hidden" name="itemname" value="Reservation">
					<input type="hidden" name="itemnumber" value="1">
					<input type="hidden" name="itemQty" value="1">
					<input type="hidden" name="BookId" id="BookId">
					<input type="hidden" name="itemdesc" value="" /> 
					<input type="hidden" name="itemprice" class="amount" value="">
					
					<div class="col-sm-12" style="margin-bottom:10px;">
					<?php echo lang('total_pay'); ?>: 
					<button type="button" id="form-submit" class="btn pull-right btn-lg pickbluebg paypalsubmit" style="font-family:FuturaStdBold;padding-left:40px;padding-right:40px;padding-top:15px; padding-bottom:15px;"><?php echo lang('pay'); ?></button> 
					<br> <h3><span id="price_final">12.12</span>&euro;</h3> 
					<div class="paymentValid mypaypalimg" style="position: relative; top: -61px; left: 115px; width: 50%;">
					<!--<span><img src="<?php echo $template_path; ?>images/paypal.jpg"></span>-->
					<span style="font-size:20px;"><?php echo lang('how_pay'); ?></span><br>
					<span>
						<input style="position: relative; top: -2px;" type="radio" class="validate[required]" name="paymentmethod" id="sabadell_bank" value="bank"  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						<label style="position: relative; top: -3px;" for="sabadell_bank"><?php echo lang('pay_by_credit'); ?></label>
					</span>
					
					<span>
						<input style="position: relative; top: -2px;"type="radio" class="validate[required]" name="paymentmethod" id="paybyonline" value="online"  data-errormessage-value-missing="<?php echo lang('require_field')?>">
						<label style="position: relative; top: -3px;" for="paybyonline"><?php echo lang('pay_by_online'); ?>.</label>
					</span>
					
					<?php if($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2){ 
						if($collaborator_details['available_seats'] == 'activate') {
					?>
						<span id="collaborator_seats">
							<input style="position: relative; top: -2px;"type="radio" class="validate[required]" name="paymentmethod" id="available_seats" value="available_seats"  data-errormessage-value-missing="<?php echo lang('require_field')?>">
							<label style="position: relative; top: -3px;" for="available_seats"><?php echo lang('available_seats'); ?>.</label>
						</span>
					<?php } ?>	
					<?php  if($collaborator_details['payment_methods'] == 'online_and_cash'){ ?>
						<span>
							<input type="radio" class="validate[required]" name="paymentmethod" id="paybycash" value="cash"> 
							<label style="position: relative; top: -2px;" for="paybycash"  data-errormessage-value-missing="<?php echo lang('require_field')?>"><?php echo lang('pay_by_cash'); ?>.</label>
						</span>
					<?php } } ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	
</div>
</div>

						
