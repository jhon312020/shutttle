//Use baseurl if language is not needed
//var autoSource =  baseUrl +'admin/shuttles/getPlaces/city/1';
function delprice(invoker) {
  var parentId = $(invoker).closest('.extra').parent().parent().parent().attr('id');
	var ele = $(invoker).closest('.extra');
	var c = ele.data('ecount');
	var total = parseFloat(totAmount);
	var val = ele.find('.extra_total_'+c).text();
	total -= parseFloat(val);
	if(percentage != '') {
		total += parseFloat(percentage);
		var per = (parseFloat(percentage_value)*total)/100;
		percentage = per;
		total -= parseFloat(per);
		$('#price_reduction').text(per.toFixed(2));
		
		$('#promotional_values').val(per);
	} 
	var tot_fix = total.toFixed(2);
	$('.price_total').text(tot_fix);
	$('#price_final').text(tot_fix);
	$('#total_price').val(tot_fix);
	$('.amount').val(tot_fix);
	totAmount = total;
	ele.remove();
	delete extraJson[c];
	$('#extras_array').val(JSON.stringify(extraJson));
	delete addExtra[c];
	$('h5[data-extra-name='+c+'] select option:first').prop('selected','selected');
	//console.log($('#extras_array').val())
  //Added by JR to fix the delete functionality of extras 
  // on toggling from second to third and third to second
  if (parentId == 'thirdStepLeft') {
    $('#secondStepLeft').html($('#thirdStepLeft').html());
  } else if (parentId == 'secondStepLeft') {
    $('#thirdStepLeft').html($('#secondStepLeft').html());
  }
}

function calPrice(ele) {
	var total = totAmount;
	var initial_price = iniPrice;
	var name = ele.attr('name');
	var data_json = $.parseJSON(ele.closest('label').find('.hidden_value').val());
	var oneway_rates = data_json['oneway_rates'];
	var twoway_rates = data_json['twoway_rates'];
	var rate = oneway_rates;
	var twoway = false;
	if(name == 'book_id') {
		if(return_journey && $('[name=return_book_id]').is(':checked')) {
			var return_data = $.parseJSON($('[name=return_book_id]:checked').closest('label').find('.hidden_value').val());
			return_oneway_rate = return_data['oneway_rates'];
			if((return_data['morning'] && data_json['morning'])||(return_data['night'] && data_json['night'])) {
				twoway = true;
				rate = twoway_rates;
			} else {
				rate = parseFloat(oneway_rates) + parseFloat(return_oneway_rate);
			}
		}
	} else {
		if($('[name=book_id]').is(':checked')) {
			var start_data = $.parseJSON($('[name=book_id]:checked').closest('label').find('.hidden_value').val());
			start_oneway_rate = start_data['oneway_rates'];
			if((start_data['morning'] && data_json['morning'])||(start_data['night'] && data_json['night'])) {
				twoway = true;
				rate = twoway_rates;
			} else {
				rate = parseFloat(oneway_rates) + parseFloat(start_oneway_rate);
			}
		}
	}
	
	total = parseFloat(total) - parseFloat(initial_price);
	total = parseFloat(total) + parseFloat(rate);
	iniPrice = rate;
	
	if(percentage != '') {
		total += parseFloat(percentage);
		var per = (parseFloat(percentage_value)*total)/100;
		percentage = per;
		total -= parseFloat(per);
		$('.price_reduction').text(per.toFixed(2));

		$('#promotional_values').val(per);
	}
	
	var tot_fix = total.toFixed(2);
	$('.amount').val(tot_fix);
	$('#price_final').text(tot_fix);
	$('.price_total').text(tot_fix);
	$('.initialPrice').text(rate.toFixed(2));
	$('#passenger_price').val(rate.toFixed(2));
	totAmount = total;
}

function reservationClick() {
	$('input[name=return_book_id]').unbind();
	$('input[name=book_id]').unbind();
	$('input[name=return_book_id]').bind("mousedown keydown", function() {
		if($('input[name=return_book_id]').is(':checked') && $('input[name=return_book_id]:checked').val() != $(this).val()) {
			calPrice($('input[name=return_book_id]:checked'), 1);
		}
	}).bind("change", function() {
		calPrice($('input[name=return_book_id]:checked'),2);
		$('#return_reserve_error').fadeOut();
		$('#return_seats_error').fadeOut();
	});
	$('input[name=book_id]').bind("change", function() {
		calPrice($('input[name=book_id]:checked'));
		$('#reserve_error').fadeOut();
		$('#seats_error').fadeOut();
	});
}
//Onchange of trip
function addPlaceInput(select){
		var arr = [{label:'Barcelona Airport Terminal 1',value:'Barcelona Airport Terminal 1'},{label:'Barcelona Airport Terminal 2',value:'Barcelona Airport Terminal 2'}];
		var _this = $(select);
		var parent= _this.parent();
		var fromPlaceHolder = ''
		var toPlaceHolder = ''

		var start_journey = $('[name=start_journey]');
		var return_journey = $('[name=return_journey]');
		$('.jsTerminal option:first').text('To');
		if (_this.val()== 'city') {
			if($( "[name=end_at]").prop('tagName').toLowerCase() != 'select') {
				var start_clone = $('[name=start_from]').clone();
				var end_clone = $( "[name=end_at]").clone();
				$( "[name=start_from]").remove();
				$( "[name=end_at]").remove();
				$('#start_journey_div').html(end_clone);
				$('#return_journey_div').html(start_clone);
				autocompleteText();
				$('#autoCompletePlace').attr('name', 'start_from');
				$('#end_at').attr('name', 'end_at');
			}
			$('.startTripText label').text(departure_time + ' *');
			$('.returnTripText label').text(landing_time +' *');
			
			fromPlaceHolder = type_hotel;
			toPlaceHolder = type_terminal;
			var postal_div = $('#postal_div').clone();
			$('#postal_div').remove();
			$('#start_journey_div').after(postal_div);

			return_journey.attr('placeholder', landing_day_and_time);
			start_journey.attr('placeholder', flight_day_and_time);
			$('.jsTerminal option:first').text(select_terminal);

			$('span[data-id="flight_time"]').prev().text(flight_time);
			$('span[data-id="flightlanding_time"]').prev().text(flight_landing_time);
			console.log(flight_time, flight_landing_time)
		} else if (_this.val()== 'airport') {
			if($( "[name=end_at]").prop('tagName').toLowerCase() == 'select') {
				var start_clone = $('[name=start_from]').clone();
				var end_clone = $( "[name=end_at]").clone();
				$( "[name=start_from]").remove();
				$( "[name=end_at]").remove();
				$('#start_journey_div').html(end_clone);
				$('#return_journey_div').html(start_clone);
				autocompleteText();
				$('#autoCompletePlace').attr('name', 'end_at');
				$('#end_at').attr('name', 'start_from');
			}
			$('.startTripText label').text(landing_time + ' *');
			$('.returnTripText label').text(departure_time + ' *');
			
			fromPlaceHolder = type_terminal;
			toPlaceHolder = type_hotel;
			var postal_div = $('#postal_div').clone();
			$('#postal_div').remove();
			$('#return_journey_div').after(postal_div);

			
			return_journey.attr('placeholder', flight_day_and_time);
			start_journey.attr('placeholder', landing_day_and_time);
			$('.jsTerminal option:first').text(select_terminal);

			$('span[data-id="flight_time"]').prev().text(flight_landing_time);
			$('span[data-id="flightlanding_time"]').prev().text(flight_time);	
		}
		$('#autoCompletePlace').attr('Placeholder', type_hotel);

		//$( "#autoCompletePlace").focus();
		postcodeChange();
}

function postcodeChange() {
  $('#postal_code').change(function(){
    $('#bcnarea_address_id').val('');
    if(!startValid) {
      $('#zone').val('');
    }
  });
}

function validHumanDate(field, rules, i, options){
		if (field.val() == '') {
			return false;
		}
		/*var reg = /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/g;
		//var reg = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/ ;
		var txt = field.val();
		if (!reg.test(txt)) {
			return invalid_date;
		} 
		
		//var dateSplit = txt.replace(/\//g, '-');
		var dateSplit = txt.split('/');
		var date = parseInt(dateSplit[0])+'-'+parseInt(dateSplit[1])+'-'+dateSplit[2];
		*/
	}
  
  function seatsAvailable(invoker,mode){
		var formData = "journey_details="+$('input[name=book_id]:checked').nextAll('.hidden_value').val()+"&mode=seatsAvailable&seats="+$('input[name=adults]').val()+"&start_from="+$('input[name=start_from]').val()+"&end_at="+$('input[name=end_at]').val();
		if($('input[name=return_book_id]').is(':checked'))
			formData += "&return_journey_details="+$('input[name=return_book_id]:checked').nextAll('.hidden_value').val();
		$.ajax({
			url: ajaxUrl,
			type:'post',
			data:formData,
			dataType:'json',
			success:function(data, textStatus, jqXHR){
				$('#extraDiv_2').show();
				if(data.baby_seats_error){
					$('#extraDiv_2').hide();
				}
				if(data.error){
					if(data.seats_error){
						$('#seats_error').fadeIn();
					}
					if(data.return_seats_error){
						$('#return_seats_error').fadeIn();
					}
				} else {
					$('#return_reserve_error').fadeOut();
					$('#return_seats_error').fadeOut();
					$('#reserve_error').fadeOut();
					$('#seats_error').fadeOut();
					if(mode == 1){
						$('.tab-pane').removeClass('active');
						$('.stepClick').removeClass('active');
						$('li[data-class=thirdStep]').addClass('active');
						$('#thirdStep').addClass('active');
					} else {
						$('.stepClick').removeClass('active');
						$(invoker).addClass('active');
						$('.tab-pane').removeClass('active');
						$('#'+$(invoker).data('class')).addClass('active');
					}
				}
			},
			error:function(jqXHR, textStatus, errorThrown){
				console.log(textStatus+'----'+errorThrown);
			},
		});
	}
function autocompleteText() {
		$( "#autoCompletePlace").autocomplete({
			source: autoSource,
			minLength: 2,
			open:function(){
				//$('#end_at').parent().removeClass('ui-front');
			},
			response : function(event, ui){
				//console.log(ui.content)
			},
			change: function(event, ui){
				if (ui.item !== null && typeof ui.item === 'object'){
					startValid = true;
				}
				else {
					startValid = false;
					//if($('select[name=start_from1]').val() == 'city') {
						$('#collaborators_id').val('');
						$('#zone').val('');
						$('#collaborator_address_id').val('');
					//}
				}
			},
			select: function( event, ui ) {
				startValid = true;
				//console.log(ui.item)
				if('zone' in ui.item) {
					$('#collaborators_id').val(ui.item.id);
					$('#zone').val(ui.item.zone);
					$('#collaborator_address_id').val(ui.item.collaborator_address_id);
					$('#bcnarea_address_id').val('');
				}
			}
		});
	}
	function createBooking(ele) {
		var ajaxUrl = siteUrl + '/getData';
		var formData = $('.validateForm1, #submitForm, #stripeform, #firstStepForm').serializeArray();
		formData.push({name:'mode',value:'formsubmit'});
		//console.log(formData);
		//console.log(JSON.stringify(formData));
		
		$('#passenger_price').val(iniPrice.toFixed(2));
		$('.amount').val(totAmount.toFixed(2));

		$.ajax({
			url: ajaxUrl,
			type:'post',
			data:formData,
			dataType:'json',
			success:function(data, textStatus, jqXHR){
				if(data.error) {
					ele.prop('disabled', false);
					var bool = true;
				
					$('#booking_details').show();
					if(data.email_error) {
						$('.clientDetails #email').after('<div class="emailformError parentFormundefined formError" style="opacity: 0.87; position: absolute; top: 48.2px; left: 0px; right: initial; margin-top: 0px;"><div class="formErrorArrow formErrorArrowBottom"><div class="line1"></div><div class="line2"></div><div class="line3"></div><div class="line4"></div><div class="line5"></div><div class="line6"></div><div class="line7"></div><div class="line8"></div><div class="line9"></div><div class="line10"></div></div><div class="formErrorContent">'+data.email_error+'</div></div>');
					}
					if(data.seats_error || data.return_seats_error){
						bool = false;
						$('.stepClick').removeClass('active');
						$('.stepClick:nth-child(2)').addClass('active');
						$('.totStep').hide();
						$('#'+$('.stepClick:nth-child(2)').data('class')).show();
						//$('div[data-ecount=2] .addExtraImage').trigger('click');
						$('#extraDiv_2').hide();
					}
					if(data.seats_error){
						$('#seats_error').fadeIn();
					}
					if(data.return_seats_error){
						$('#return_seats_error').fadeIn();
					}
					if(data.available_seats_error){
						$('#collaborator_seats').append('<div class="available_seatsformError parentFormpaypalform formError" style="opacity: 0.87; position: absolute; top: 36.9px; left: 349.95px; right: initial; margin-top: 0px; display: block;"><div class="formErrorContent">'+less_seats+'</div></div>');
					}
					if(data.time_error) {
						bool = false;
						//$('#firstPageError div').text('<?php echo lang('date_error'); ?>');
						$('#firstPageError').show();
						$('.stepClick').removeClass('active');
						$('.stepClick:first').addClass('active');
						$('.totStep').hide();
						$('#'+$('.stepClick:first').data('class')).show();
					}
					if(bool){
						if(data.baby_seats_error && data.return_baby_seats_error) {
							//$('div[data-ecount=2] .addExtraImage').trigger('click');
							//$('#extraDiv_2').hide();
						}
						if(data.baby_seats_error) {
							$('html, body').animate({
								'scrollTop' : $("#extraDiv_2").position().top
							},2000);
							//$('div[data-ecount=2] .addExtraImage').trigger('click');
							if($('.baby_seatsformError').length == 0){
							//$('#extraDiv_2').after('<div class="baby_seatsformError parentFormpaypalform formError" style="opacity: 0.87; position: relative; top: -11px; left: 7px; right: initial; margin-top: 0px; display: block;"><div class="formErrorContent"><?php echo lang('baby_error'); ?>.'+data.go_babay_seats+'</div></div>');
							}
						}
						if(data.return_baby_seats_error) {
							$('html, body').animate({
								'scrollTop' : $("#extraDiv_2").position().top
							},2000);
							//$('div[data-ecount=2] .addExtraImage').trigger('click');
							if($('.baby_return_seatsformError').length == 0){
							//$('#extraDiv_2').after('<div class="baby_return_seatsformError parentFormpaypalform formError" style="opacity: 0.87; position: relative; top: -11px; left: 7px; right: initial; margin-top: 0px; display: block;"><div class="formErrorContent"><?php echo lang('return_baby_error'); ?>.'+data.return_babay_seats+'</div></div>');
							}
						}
					}
				} else {
					var duplicate_modal = $('#duplicate_modal');
					if(data.start_duplicate && data.return_duplicate){
						$('.duplicate_message').hide();
						$('#both_duplicate').show();
						duplicate_modal.modal('show');
						ele.prop('disabled', false);
					} else if (data.start_duplicate) {	
						$('.duplicate_message').hide();
						$('#start_duplicate').show();
						duplicate_modal.modal('show');
						ele.prop('disabled', false);
					} else if (data.return_duplicate) {
						$('.duplicate_message').hide();
						$('#return_duplicate').show();
						duplicate_modal.modal('show');
						ele.prop('disabled', false);
					} else {
						$('.bookId').val(data.book_id);
						//$('input[name=cancel_return]').val($('input[name=cancel_return]').val()+'?cm='+data.url);
						if(data.payment_method == 'online') {
							if($('.amount').val() > 0) {
								//$('#stripeform').submit();

								// Get the values:
								var ccNum = $('.card-number').val(), cvcNum = $('.card-cvc').val(), expMonth = $('.card-expiry-month').val(), expYear = $('.card-expiry-year').val();

								// Get the Stripe token:
								Stripe.card.createToken({
									number: ccNum,
									cvc: cvcNum,
									exp_month: expMonth,
									exp_year: expYear
								}, stripeResponseHandler);

								//Uncomment while bank integration has been completed.
								/*
								$('#Ds_SignatureVersion').val(data.version);
								$('#Ds_MerchantParameters').val(data.params);
								$('#Ds_Signature').val(data.signature);
								$('#bank_form').attr('action', data.banaba_url);
								$('#bank_form').submit();
								*/

							} else {
								location.replace(siteUrl+'/success?cm='+data.book_id+'&amt='+data.amt);
							}
							//$('#submitimage').trigger('click');
							//msg_modal.modal('show');
							
						} else if(data.payment_method == 'bank') {
							if($('.amount').val() > 0) {
								$('#Ds_SignatureVersion').val(data.version);
								$('#Ds_MerchantParameters').val(data.params);
								$('#Ds_Signature').val(data.signature);
								$('#bank_form').attr('action', data.banaba_url);
								$('#bank_form').submit();
							} else {
								location.replace(siteUrl+'/success?cm='+data.book_id+'&amt='+data.amt);
							}
						}
						else {
							location.replace(siteUrl+'/success?cm='+data.book_id+'&amt='+data.amt);
						}
					}							
				}
			},
			error:function(jqXHR, textStatus, errorThrown){
				console.log(textStatus+'----'+errorThrown);
			},
		});

	}

	function stripeValidation() {

		var deferred = $.Deferred();

		var valid = $(".stripeForm").validationEngine('validate');
    if (!valid) {
    	deferred.reject({success:false});
    }
    
		// Get the values:
		var ccNum = $('.card-number').val(), cvcNum = $('.card-cvc').val(), expMonth = $('.card-expiry-month').val(), expYear = $('.card-expiry-year').val();

		// Validate the number:
		if (!Stripe.card.validateCardNumber(ccNum)) {
			deferred.reject({ success : false, error : 'invalid card number' });
			reportError('The credit card number appears to be invalid.');
		} else if (!Stripe.card.validateCVC(cvcNum)) {
			// Validate the CVC:
			deferred.reject({ success : false, error : 'invalid cvc number' });
			reportError('The CVC number appears to be invalid.');
		} else if (!Stripe.card.validateExpiry(expMonth, expYear)) {
			// Validate the expiration:
			deferred.reject({ success : false, error : 'invalid expiry date' });
			reportError('The expiration date appears to be invalid.');
		} else {
			deferred.resolve({success:true});
		}

		// Validate other form elements, if needed!

		return deferred.promise();

		/*// Check for errors:
		if (!error) {
			// Get the Stripe token:
			Stripe.card.createToken({
				number: ccNum,
				cvc: cvcNum,
				exp_month: expMonth,
				exp_year: expYear
			}, stripeResponseHandler);

		}*/
	}

	
	/*function addBrowserForward() {
		var id = $('.jsTabPane:visible').attr('id');

		if(id == 'secondStep') {
			window.history.pushState('forward', null, '#sedcondStep');
		} else if(id == 'thirdStep') {
			window.history.pushState('forward', null, '#thirdStep');
		}
	}  */
	$(document).ready( function() {
	  autocompleteText();
	  postcodeChange();
	});
