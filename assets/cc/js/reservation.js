/*msg_modal.on('hidden.bs.modal', function () {
   //$('#submitimage').trigger('click'); 
   $('#stripeform').submit();
});*/
var ajaxUrl = siteUrl + '/getData';
var firstStepJson = '';
var return_journey = false;
var addExtra = {};
var extraJson = {};
var code = '';
var price='';
var prevBookId = '';
var prevReturnBookId = '';
var percentage='';
var percentage_value = '';
var price_value = '';
var totAmount = 0;
var iniPrice = 0;
var formError = '<div class="nameformError parentFormundefined" style="opacity: 0.87; position: relative; top: 5px; font-size: 12px; width: 70%; right: initial; float: right;">'+
					'<div class="formErrorContent" style="font-size:10px;!important">* There is no seats</div>'+
				'</div>';

$('.showPassword').hide();
$(document).ready(function(){
	/*First step start*/
	var height = $('#rowHeight').height();
	$('#firstLeftStep div').css('height', height);
	$("#firstStepForm").validationEngine({
		promptPosition : 'bottomLeft',
		maxErrorsPerField:1
	});
  //Tab1 Button validation 
	$('#firstbutton').click(function() {
    
		if($('#zone').val() == '') {
			$('#postal_code').addClass('validate[required]');
			//validate[required,funcCall[validEnd]]
		}
		else {
			$('#postal_code').removeClass('validate[required]');
			$('.postal_codeformError').remove();
		}
		var formData = $('#firstStepForm').serializeArray();
		var valid = $("#firstStepForm").validationEngine('validate');
		if(valid) {
			if(firstStepJson != JSON.stringify(formData) || $('#firstPageError').is(':visible')) {
				$('#firstPageError').hide();
				$('#seats_error').hide();
				$('#return_seats_error').hide();
				
				firstStepJson = JSON.stringify(formData);
				$('#startJourneyTable tbody').html('');
				$('#returnJourneyTable tbody').html('');
				$.ajax({
          url: ajaxUrl,
					type:'post',
					data:formData,
					dataType:'json',
					success:function(data, textStatus, jqXHR){
						console.log(data)
						if(data['error']) {
							$('#firstPageError .formErrorContent').text(data['error']);
							$('#firstPageError').show();
						} else {
							$('#returnJourneyPanel').hide();
							$.each(data['data'], function(i,v){
								$('#startJourneyTable tbody').append(
								'<tr>'+
									'<th scope="row">'+
										'<label>'+
											'<input class="display-checkbox" type="radio" name="book_id" id="blankRadio'+v.id+'" value="'+v.id+'" aria-label="..." data-rates="'+v.rates+'">'+
											'<input type="hidden" name="seats_'+v.id+'"  value="'+v.seats+'">'+
											'<input type="hidden" name="seats_price_'+v.id+'"  value="'+data['rates']+'">'+
											'<input type="hidden" class="hidden_value" name="journey_'+v.id+'"  value=\''+JSON.stringify(v)+'\'>'+
										'</label>'+
									'</th>'+
									'<td>'+v.journey_start+'</td>'+
									'<td>'+data['from_zone']+'</td>'+
									'<td>'+data['to_zone']+'</td>'+
									'<td>'+v.journey_end+'</td>'+
								'</tr>'); 
							});
							if(data['return'].length > 0) {
								return_journey = true;
								$.each(data['return'], function(i,v){
									$('#returnJourneyTable tbody').append(
									'<tr>'+
										'<th scope="row">'+
											'<label>'+
												'<input type="radio" name="return_book_id" id="blankRadio'+v.id+'" value="'+v.id+'" aria-label="..." data-rates="'+v.rates+'">'+
												'<input type="hidden" name="return_seats_'+v.id+'"  value="'+v.seats+'">'+
												'<input type="hidden" class="hidden_value" name="return_journey_'+v.id+'"  value=\''+JSON.stringify(v)+'\'>'+
											'</label>'+
										'</th>'+
										'<td>'+v.journey_start+'</td>'+
										'<td>'+data['to_zone']+'</td>'+
										'<td>'+data['from_zone']+'</td>'+
										'<td>'+v.journey_end+'</td>'+
									'</tr>'); 
								});
								$('#returnJourneyPanel').show();
							}
							$('.stepClick').removeClass('active');
							$('li[data-class=secondStep]').addClass('active');
							//$('.totStep').hide();
              $('#firstStep').removeClass('active');
							$('#secondStep').addClass('active');
							var oldPrice = iniPrice;
							var total = totAmount;
							if(oldPrice != 0) {
								total = parseFloat(total) - parseFloat(oldPrice);
							}
							if(percentage != '') {
								total += parseFloat(percentage);
								var per = (parseFloat(percentage_value)*total)/100;
								percentage = per;
								total -= parseFloat(per);
								$('.price_reduction').text(parseFloat(per).toFixed(2));

								$('#promotional_values').val(per.toFixed(2));
							}
							totAmount = total;
							iniPrice = 0;
							var fix_total = total.toFixed(2);
							$('.amount').val(fix_total);
							$('#price_final').text(fix_total);
							$('.price_total').text(fix_total);
							$('.initialPrice').text('00.00');
							$('#passenger_price').val(0);
							
							
							reservationClick();
							$('#bcnarea_address_id').val(data['bcnaddress_id']);
							if($('#zone').val() == '')
								$('#zone').val(data['zone']);
							
							if($('#firstLeftStep').is(':visible')) {
								$('#firstLeftStep').attr("style", "display: none !important");
								$('#secondLeftStep').show();
							}
							
							$('.duplicateList').each(function(){
								var dataId = $(this).data('id');
								if(dataId == 'flight_time') {
									$(this).text(data['format_starttime']);
								} else if(dataId == 'flightlanding_time') {
									if($('[name=return_hours]').val() != '') {
										$(this).text(data['format_returntime']);
									}
									else {
										$(this).hide();
										$(this).prev().hide();
									}
									
								} else if(dataId == 'start_journey') {
									$(this).text(data['format_startdate']);
								} else if(dataId == 'return_journey') {
									if($('[name=return_journey]').val() != '') {
										$(this).text(data['format_returndate']);
									}
									else {
										$(this).hide();
										$(this).prev().hide();
									}
									
								} else if(dataId == 'country') {
									//$(this).text(country[$('[name=country]').val()]);
								} else {
									$(this).text($('[name='+dataId+']').val());
								}
							})
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						console.log(textStatus+'----'+errorThrown);
					},
				});	
			} else {
        console.log('comes here');
				$('.stepClick').removeClass('active');
        $('.tab-pane').removeClass('active');
				$('li[data-class=secondStep]').addClass('active');
				$('#secondStep').addClass('active');
			}
		} 
	});
	/*First step end*/
	
	$(".more_info_click" ).click(function() {
	   	$(this).find('.show_more_info').toggle();
	});
	$('.editpop').click(function(){
		$('.stepClick').removeClass('active');
		$('li[data-class=firstStep]').addClass('active');
		$('.tab-pane').removeClass('active');
		$('#firstStep').addClass('active');
	});
  //StepClick events validation and triggering
	$('.stepClick').click(function(){
		if(!$('#'+$(this).data('class')).is(':visible')){
			var bool = true;

      console.log($(this).data('class'));

			if($(this).data('class') == 'firstStep'){
        $('.nav li').removeClass("active")
				$('.tab-pane').removeClass('active');
				$(this).addClass('active');
				$('#'+$(this).data('class')).addClass('active');
			} else if($(this).data('class') == 'secondStep') {
				if($('#firstStep').is(':visible')) {
					var formData = $('#firstStepForm').serializeArray();
					if(firstStepJson != JSON.stringify(formData) || $('#firstPageError').is(':visible')) {
						$('#firstbutton').trigger('click');
					} else {
						$('.stepClick').removeClass('active');
						$(this).addClass('active');
						$('.tab-pane').removeClass('active');
						$('#'+$(this).data('class')).addClass('active');
					}
				} else {
					$('.stepClick').removeClass('active');
					$(this).addClass('active');
					$('.tab-pane').removeClass('active');
					$('#'+$(this).data('class')).addClass('active');
				}
			}
			if($(this).data('class') == 'thirdStep') {
				if($('#secondStep').is(':visible')) {
					if($('input[name=book_id]:checked').length == 0){
						bool=false;
						$('#reserve_error').fadeIn();
					}
					if($('input[name=return_book_id]').length !=0 && $('input[name=return_book_id]:checked').length == 0){
						bool=false;
						$('#return_reserve_error').fadeIn();
					}
					if(!bool){
						$('.stepClick').removeClass('active');
						$('li[data-class=secondStep]').addClass('active');
						$('.tab-pane').removeClass('active');
						$('#secondStep').addClass('active');
					}
					else
						seatsAvailable(this,2);
						
				} else {
					var formData = $('#firstStepForm').serializeArray();
					if(firstStepJson != JSON.stringify(formData) || $('#firstPageError').is(':visible')) {
						$('#firstbutton').trigger('click');
					} else {
						if($('input[name=book_id]:checked').length == 0){
							bool=false;
							$('#reserve_error').fadeIn();
						}
						if($('input[name=return_book_id]').length !=0 && $('input[name=return_book_id]:checked').length == 0){
							bool=false;
							$('#return_reserve_error').fadeIn();
						}
						if(!bool){
							$('.stepClick').removeClass('active');
							$('li[data-class=secondStep]').addClass('active');
							$('.tab-pane').removeClass('active');
							$('#secondStep').addClass('active');
						}
						else
							seatsAvailable(this,2);
					}
				}
			}
		}
	});
	
	
	$('.goButton').click(function(){
    //cloning
    $('#thirdStepLeft').html($('#secondStepLeft').html());
		if($('input[name=book_id]:checked').length != 0){
			if($('input[name=return_journey]').val() == ''){
				seatsAvailable(this,1);
			}
			else if($('input[name=return_journey]').val() != '' && $('input[name=return_book_id]:checked').length != 0){
				seatsAvailable(this,1);
			}
			else
				$('#return_reserve_error').fadeIn();
		}
		else{
			if($('input[name=return_journey]').val() != '' && $('input[name=return_book_id]:checked').length == 0)
				$('#return_reserve_error').fadeIn();
							
			$('#reserve_error').fadeIn();
		}
		
	});
	$('.logincheck').click(function(){
		
		$('.errorlogin').hide();
		valid = $("#bookingform").validationEngine('validate');
		if(valid){
			var formData = $('#loginform').serializeArray();
			formData.push({name:"mode", value:'login'});
			$.ajax({
				url:ajaxUrl,
				type:'post',
				data:formData,
				dataType:'json',
				success:function(data, textStatus, jqXHR){
					if(!data['error']){
						$('.errorlogin').hide();
						
						$.each(data, function(i,v){
							$('.clientDetails #'+i).val(v);
						});
						$('#confirm_email').val(data['email']);
						$('#fullname').val(data['name']);
						
						$('#confirm_password').val(data['password']);
						$('.showExtras').hide();
						if($('#confirm_password').is(':visible')){
							$('.showPassword').hide();
						}
					}
					else{
						$('#client_id').val('');
						$('.showExtras').show();
						if($('#save_extra').is(':checked'))
							$('.showPassword').show();
						else
							$('.showPassword').hide();
						$('.errorlogin').show();
						$('.clientDetails').find('input:text, input:password').val('');
						if($('#save_extra').is(':checked'))
							$('.showPassword').show();
						
					}
				},
				error:function(jqXHR, textStatus, errorThrown){
					console.log(textStatus+'----'+errorThrown);
				},
			});
		}
	});
	
	$('.addextra').click(function(){
		var selVal = $(this).closest('h5').find('select').val();
		if(isNaN(selVal))
			selVal = 1;
		
		var ename = $(this).closest('h5').data('extra-name');
		var title = $(this).closest('h5').data('extra-title');
		var eprice = $(this).closest('h5').find('span').data('extra-price');
		var total = parseFloat(totAmount);
		if(ename == 2){
			if($('.baby_seatsformError').length > 0)
				$('.baby_seatsformError').remove();
			if($('.baby_return_seatsformError').length > 0)
				$('.baby_return_seatsformError').remove();
			
		}
		if(addExtra[ename]){
			if(addExtra[ename] != selVal){
				var oldVal = addExtra[ename] * eprice;
				var val = selVal * eprice;
				total = total - parseFloat(oldVal) + parseFloat(val);
				$('.extra_count_'+ename).text(selVal);
				$('.extra_total_'+ename).text(val);
				addExtra[ename] = selVal;
				
				extraJson[ename].extra_name = title;
				extraJson[ename].extra_count= selVal;
				extraJson[ename].extra_value= val;
				
			}
		}
		else{
			var val = selVal * eprice;
			addExtra[ename] = selVal;
			$('.extras').append('<div class="extra" data-ecount="'+ename+'">'+title+' x <span class="extra_count_'+ename+'">'+selVal+'</span> <span class="pull-right">+<span class="extra_total_'+ename+'">'+val+'</span>&euro; <img src="'+image_path+'del_icon.png" style="cursor:pointer;" class="addExtraImage" onClick="delprice(this);"></span></div>');
			extraJson[ename] = {};
			extraJson[ename].extra_name = title;
			extraJson[ename].extra_count= selVal;
			extraJson[ename].extra_value= val;
			
			$('#extras').val();
			total += parseFloat(val);
		}
		if(total != parseFloat(totAmount)) {			
			if(percentage != '') {
				total += parseFloat(percentage);
				var per = (parseFloat(percentage_value)*total)/100;
				percentage = per;
				total -= parseFloat(per);
				$('.price_reduction').text(parseFloat(per).toFixed(2));
				$('#promotional_values').val(per);

			} /*else if (price_value != '') {
				total += parseFloat(price_value);
				var pv = total;
				total -= parseFloat(price);
				console.log(total+'-----'+pv);
				if(total < 0) {
					price_value = pv;
					total = 0;
				} else {
					price_value = '';
				}
			}	*/
		}
		var tot_fix = total.toFixed(2);
		$('.price_total').text(tot_fix);
		$('#price_final').text(tot_fix);
		$('#total_price').val(tot_fix);
		$('.amount').val(tot_fix);
		$('#extras_array').val(JSON.stringify(extraJson));
		totAmount = total;
		//console.log($('#extras_array').val())
	})
	$('.applicarbtn').click(function(){
		$('.errorCodes').hide();
		if($('#promo_code').val().trim() != '' && code != $('#promo_code').val().trim()){
			$.ajax({
				url: ajaxUrl,
				type:'post',
				data:'code='+$('#promo_code').val()+'&mode=codes',
				dataType:'json',
				success:function(data, textStatus, jqXHR){
					if(data['error']){
						$('.errorCodes').show();
					}
					else{
						var total = parseFloat(totAmount);
						var reduction = '';
						code = data['code'];
						if(code != ''){
							if(price != ''){
								total += parseFloat(price);
							}
							else if(percentage != ''){
								total += parseFloat(percentage);
							}
						}
						
						if(data['discount_type'] == 'price'){
							$('.percentage_reduction').text('');
							var pv = total;
							total -= parseFloat(data['price_or_percentage']);
							price = data['price_or_percentage'];
							reduction = data['price_or_percentage'];
							percentage = '';
							/*if(total < 0) {
								price_value = pv;
								total = 0;
							} else {
								price_value = '';
							}*/
						}
						else if(data['discount_type'] == 'percentage'){
							price = '';
							$('.percentage_reduction').text(data['price_or_percentage']+'%');
							percentage_value = data['price_or_percentage'];
							var per = (parseFloat(data['price_or_percentage'])*total)/100;
							percentage = per;
							reduction = per;
							total -= parseFloat(per);
						}
						$('.reduction').show();
						$('.price_reduction').text(parseFloat(reduction).toFixed(2));
						code = $('#promo_code').val().trim();
						
						$('#promotional_codes_id').val(data['id']);
						$('#promotional_values').val(reduction);
						$('#promotional_code_values').val(data['price_or_percentage']);
						$('#promotional_type').val(data['discount_type']);
						
						var tot_fix = total.toFixed(2);
						$('.price_total').text(tot_fix);
						$('#price_final').text(tot_fix);
						$('#total_price').val(tot_fix);
						$('.amount').val(tot_fix);
						totAmount = total;
					}
					
				},
				error:function(jqXHR, textStatus, errorThrown){
					console.log(textStatus+'----'+errorThrown);
				},
			});
		}
	});
	var valid = $(".validateForm1").validationEngine({
		promptPosition : 'bottomLeft',
		maxErrorsPerField:1
	});
	$('#save_extra').click(function(){
		if($(this).is(':checked') && $('#client_id').val() == '')
			$('.showPassword').fadeIn();
		else
			$('.showPassword').fadeOut();
	})
	$("#loginform").validationEngine({
		promptPosition : 'bottomLeft',
		maxErrorsPerField:1
	});
	$("#stripeform").validationEngine({
		promptPosition : 'bottomLeft',
		maxErrorsPerField:1
	});
	$('#dupliacteConfirmbutton').click(function(){
		$('#duplicate_bool').val('1');

		$(this).prop('disabled', true);

		if(totAmount > 0) {
			$('.paypalsubmit').trigger('click');	
		} else {
			$('.jslastSubmit').trigger('click');
		}
	});
	$('.paypalsubmit').click(function(){
		var ele = $(this);
		ele.prop('disabled', true);

		stripeValidation().then(function(data) {

			//console.log(data)

			//console.log(valid)
			if(data.success) {
				if($('#terms_cond').is(':checked')) {
					createBooking(ele);
				}
			}
			else {
				ele.prop('disabled', false);
			}
		}).fail(function(data) {

			//console.log(data)

		});
		
	})

  $(".validateForm").validationEngine({
    promptPosition : 'bottomLeft'
  });
  
  /* Single Trip */
  $('#jsSingleTrip').click(function(e) {
    e.preventDefault();
		if($('select[name=start_from1]').val() == 'city'){
			$('.startTripText label').text(departure_time);
			$('.returnTripText label').text(landing_time);
		}
		else if($('select[name=start_from1]').val() == 'airport'){
			$('.startTripText label').text(landing_time);
			$('.returnTripText label').text(departure_time);
		}
    //$('.testId').removeClass('col-xs-6').addClass("col-xs-12");
		
		$('[name=return_journey]').val('');
		
		$('.jsReturnJourney').hide();
    $('.jsRoundTripMessage').fadeOut();
    $('#jsRoundTrip').removeClass('active');
    $(this).addClass('active');
		
	});
  
  /* Round Trip */
	$('#jsRoundTrip').click(function(e) {
		e.preventDefault();
    if($('select[name=start_from1]').val() == 'city'){
			$('.startTripText label').text(departure_time);
			$('.returnTripText label').text(landing_time);
		}
		else if($('select[name=start_from1]').val() == 'airport'){
			$('.startTripText label').text(landing_time);
			$('.returnTripText label').text(departure_time);
		}
		$('.jsReturnJourney').show();
		$('.jsRoundTripMessage').fadeIn();
    $('#jsSingleTrip').removeClass('active');
		$(this).addClass('active');
	});
  
  /* Date Picker functionality */
  $( "#date11" ).datepicker({
			minDate: 0,
			changeMonth: true,
			dateFormat:'dd/mm/yy',
			firstDay:1,
			onSelect: function(dateText, inst) {
				$(this).prev('.formError').remove();
			},
			onClose: function( selectedDate ) {
				$( "#date2" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#date22" ).datepicker({
			changeMonth: true,
			dateFormat:'dd/mm/yy',
			firstDay:1,
			onSelect: function(dateText, inst) {
				$(this).prev('.formError').remove();
			},
			onClose: function( selectedDate ) {
				$( "#date1" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
  $('#date1').datetimepicker({
        sideBySide: true, 
        minDate:new Date(), 
        format: 'DD/MM/YYYY HH:mm',
        stepping: 5
  });
  $('#date2').datetimepicker({
        sideBySide: true, 
        minDate:new Date(), 
        format: 'DD/MM/YYYY HH:mm',
        useCurrent: false,
        stepping: 5
  });
  $("#date1").on("dp.change", function (e) {
      $('#date2').data("DateTimePicker").minDate(e.date);
  });
	$('select[name=hours] option:first').val('');
	$('select[name=return_hours] option:first').val('');
	$('select[name=adults] option:first').val('');
  
  if(user_name != '' && user_type == 2) {
    console.log('comes in');
		if(collaborator_address.length > 0) {
			if(collaborator_address.length == 1) {
				$( "#autoCompletePlace").val(collaborator_address[0]['label']).prop('readonly', true);
				$( "#zone").val(collaborator_address[0]['zone']);
				$('#collaborator_address_id').val(collaborator_address[0]['collaborator_address_id']);
				$( "#collaborators_id").val(collaborator_address[0]['id']);
			} else {
				autoSource =  collaborator_address;
			}
		} else {
			$( "#autoCompletePlace").val(collaborator_details['name']+' - '+collaborator_details['address']).prop('readonly', true);
			$( "#zone").val(collaborator_details['zone']);
			$( "#collaborators_id").val(collaborator_details['id']);
		}
	} else {
    console.log('comes in');
		autoSource =  baseUrl +'admin/shuttles/getPlaces/city/1';
	}
  $(window).load(function () {
  	$('#navbar a').click( function() {
  		window.onbeforeunload = null;
  	});

  	$(document).on('submit', '#stripeform, #bank_form, #payment-form', function(e) {
  		window.onbeforeunload = null;
  	});

  	window.onbeforeunload = function () {
  		return "Are you sure to leave this page?";
  	};
  });

  $(document).on('click', '.jslastSubmit', function(e) {
  	var ele = $(this);
  	ele.prop('disabled', true);

		$('[name=paymentmethod]').addClass('validate[required]');

		if(totAmount == 0) {
			$('[name=paymentmethod]').removeClass('validate[required]');
		}
		
		var valid = $(".validateForm1").validationEngine('validate');
		var payment_valid = true;
		var paymentmethod = null;
		if($('[name=paymentmethod]').length && $('[name=paymentmethod]:visible')) {
			payment_valid = $("#stripeform").validationEngine('validate');
			var paymentmethod = $('[name=paymentmethod]:checked').val();
		}

		if(valid && payment_valid) {
			
			ele.prop('disabled', false);
			if(totAmount == 0 || (paymentmethod != null && paymentmethod != 'online')) {
				createBooking(ele);
			} else {
				$('#booking_details').hide();
  			$('#payment-form').show();
			}
		} else {
			ele.prop('disabled', false);
		}
  	
  });

  $(document).on('click', '.jsbackToDetails', function(e) {
  	$('#booking_details').show();
  	$('#payment-form').hide();
  })


});
