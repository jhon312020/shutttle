/*msg_modal.on('hidden.bs.modal', function () {
   //$('#submitimage').trigger('click'); 
   $('#stripeform').submit();
});*/
var selectedVehicle = {};
var displayingVehicles = [];
var ajaxUrl = siteUrl + '/getData';
var firstStepReservationUrl = siteUrl+'/firstStepReservation';
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
function updateExtras () {
	//var total = parseFloat(totAmount);
	var total = parseFloat(selectedVehicle.amount);
	for (var key in extraJson) {
		//console.log(extraJson, addExtra)
		var original_extra = extra_array[key];
		var original_extra_value = parseFloat(original_extra.price);

		var selected_extra = extraJson[key];

		var selected_extra_value = parseFloat(selected_extra.extra_value / selected_extra.extra_count);

		//console.log(selected_extra_value, original_extra_value, is_round_trip)

		if((!is_round_trip && selected_extra_value > original_extra_value) || (is_round_trip && selected_extra_value <= original_extra_value)) {
			
			var oldVal = extraJson[key].extra_value;

			if(is_round_trip) {
				var val = extraJson[key].extra_count * original_extra_value * 2;
			} else {
				var val = extraJson[key].extra_count * original_extra_value;
			}
			
			total = total - parseFloat(oldVal) + parseFloat(val);
			
			$('.extra_total_'+key).text(val);
			
			extraJson[key].extra_value= val;

		}

	}

	if(percentage != '') {
		var per = (parseFloat(percentage_value)*total)/100;
		percentage = per;
		total -= parseFloat(per);
		$('.price_reduction').text(parseFloat(per).toFixed(2));
		$('#promotional_values').val(per);
	}

	var tot_fix = total.toFixed(2);
	$('.price_total').text(tot_fix);
	$('#price_final').text(tot_fix);
	$('#total_price').val(tot_fix);
	$('.amount').val(tot_fix);
	$('#extras_array').val(JSON.stringify(extraJson));
	totAmount = total;

}
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
		var valid = $("#firstStepForm").validationEngine('validate');
		if(valid) {
			
			if (locations[$('#from_location').val()] == undefined) {
				$('#firstPageError .formErrorContent').text('Kindly check the starts at location');
				$('#firstPageError').show();
				$('#from_location_id').val('');
				return false;
			} else {
				$('#from_location_id').val(locations[$('#from_location').val()]);
			}

			if (locations[$('#to_location').val()] == undefined) {
				$('#firstPageError .formErrorContent').text('Kindly check the ends at location');
				$('#firstPageError').show();
				$('#to_location_id').val('');
				return false;
			} else {
				$('#to_location_id').val(locations[$('#to_location').val()]);
			}

			if ($('#from_location').val().trim() == $('#to_location').val().trim()) {
				$('#firstPageError .formErrorContent').text('Start and end location should not be the same');
				$('#firstPageError').show();
				return false;
			}

			$('#firstPageError').hide();
			$('#seats_error').hide();
			$('#return_seats_error').hide();

			var formData = $('#firstStepForm').serializeArray();
			firstStepJson = JSON.stringify(formData);
			$('#startJourneyTable tbody').html('');
			$('#returnJourneyTable tbody').html('');
			$.ajax({
      			url: firstStepReservationUrl,
				type:'post',
				data:formData,
				dataType:'json',
				success:function(data, textStatus, jqXHR){
					console.log(data)
					if($('#flight_no').val() == '') {
						$('.flightNoValue').text('');
						$('.jFlightNo').hide();
					} else {
						$('.flightNoValue').text($('#flight_no').val());
						$('.jFlightNo').show();
					}
					if(data['error']) {
						$('#firstPageError .formErrorContent').text(data['error']);
						$('#firstPageError').show();
					} else {
						$('#returnJourneyPanel').hide();
						$('.trip_date_text').text(data.formatted_start_date);
						$('.departure_time_text').text(data.formatted_start_time);
						if (data.formatted_return_date) {
							$('.return_date_text').text(data.formatted_return_date);
							$('.return_time_text').text(data.formatted_return_time);
							$('.trip_detail').find('td').css("vertical-align","top");
							$('.jReturnDate').show();
						} else {
							$('.return_date_text').text('');
							$('.return_time_text').text('');
							$('.trip_detail').find('td').css("vertical-align","middle");
							$('.jReturnDate').hide();
						}
						$('.from_location_text').text(data.from_location);
						$('.to_location_text').text(data.to_location);
						$('.passengers_text').text(data.passengers);
						// Hide first step and display the second step
						$('.stepClick').removeClass('active');
						$('#firstStep').removeClass('active');
						$('li[data-class=secondStep]').addClass('active');
						displayVehicles(data);
						$('#secondStep').addClass('active');
				    }
				},
				error:function(jqXHR, textStatus, errorThrown){
					console.log(textStatus+'----'+errorThrown);
				},
			});	
		} 
	});
	/*First step end*/

	/* Second step click start */
	$(document).on('click','.secondStepClick',function(){
		selectedVehicle = displayingVehicles[$(this).attr('data-vehicle')];
		$('#vehicle_id').val(selectedVehicle.id);
		totAmount = parseFloat(selectedVehicle.amount);
		$('.initialPrice').text(totAmount.toFixed(2));
		$('#passenger_price').val(totAmount.toFixed(2));
		if (selectedVehicle.shared == '1') {
			$('#reservation_extras_div').show();
		} else {
			$('#reservation_extras_div').hide();
		}
		addExtra = {};
		$('.extras').html('');
		updateExtras();
		$('.stepClick').removeClass('active');
		$('#secondStep').removeClass('active');
		$('li[data-class=thirdStep]').addClass('active');
		$('#thirdStep').addClass('active');
	});
	/*Second step end */
	
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
	
	$('.addextra').click(function() {
		var selVal = $(this).closest('h5').find('select').val();
		if(isNaN(selVal))
			selVal = 1;
		
		var ename = $(this).closest('h5').data('extra-name');
		var title = $(this).closest('h5').data('extra-title');
		var eprice = $(this).closest('h5').find('span').data('extra-price');
		var total = parseFloat(totAmount);
		if(ename == 2) {
			if($('.baby_seatsformError').length > 0)
				$('.baby_seatsformError').remove();
			if($('.baby_return_seatsformError').length > 0)
				$('.baby_return_seatsformError').remove();
			
		}
		if(addExtra[ename]) {
			if(addExtra[ename] != selVal) {
				var oldVal = addExtra[ename] * eprice;
				var val = selVal * eprice;
				if(is_round_trip) {
					val = val * 2;
					oldVal = oldVal * 2;
				}
				//console.log(is_round_trip, oldVal)

				total = total - parseFloat(oldVal) + parseFloat(val);
				$('.extra_count_'+ename).text(selVal);
				$('.extra_total_'+ename).text(val);
				addExtra[ename] = selVal;
				
				extraJson[ename].extra_name = title;
				extraJson[ename].extra_count= selVal;
				extraJson[ename].extra_value= val;
				
			}
		}
		else {
			var val = selVal * eprice;
			//console.log(is_round_trip)
			if(is_round_trip) {
				val = val * 2;
			}
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
			$('.jslastSubmit').trigger('click');	
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
    
    is_round_trip = false;
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

		is_round_trip = true;
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

  	/*$(document).on('submit', '#stripeform, #bank_form, #payment-form', function(e) {
  		window.onbeforeunload = null;
  	});

  	window.onbeforeunload = function () {
  		return "Are you sure to leave this page?";
  	};*/
  	window.location.hash="no-back-button";
		window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
		window.onhashchange=function(){window.location.hash="no-back-button";}
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
		//if($('[name=paymentmethod]').length && $('[name=paymentmethod]:visible')) {
			payment_valid = $("#stripeform").validationEngine('validate');
			var paymentmethod = $('[name=paymentmethod]:checked').val();
		//}
		console.log(paymentmethod)
		if(valid && payment_valid) {
			
			ele.prop('disabled', false);
			if(totAmount == 0 || (paymentmethod != null && paymentmethod != 'online')) {
				createBooking(ele);
			} else {
				$('#booking_details').hide();
  			$('#payment-form').show();

  			//Uncomment while bank integration has been completed
  			//createBooking(ele);
			}
		} else {
			ele.prop('disabled', false);
		}
  	
  });

  $(document).on('click', '.jsbackToDetails', function(e) {
  	$('#booking_details').show();
  	$('#payment-form').hide();
  });

  $.widget( "custom.catcomplete", $.ui.autocomplete, {
	  _create: function() {
	    this._super();
	    this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
	  },
	  _renderMenu: function( ul, items ) {
	    var that = this,
	      currentCategory = "";
	    $.each( items, function( index, item ) {
	      var li;
	      if ( item.category != currentCategory ) {
	        ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
	        currentCategory = item.category;
	      }
	      li = that._renderItemData( ul, item );
	      if ( item.category ) {
	        li.attr( "aria-label", item.category + " : " + item.label );
	      }
	    });
	  }
	});
 
    $( "#from_location" ).catcomplete({
      delay: 0,
      source: placeLocations
    });

    $( "#to_location" ).catcomplete({
      delay: 0,
      source: placeLocations
    });


});

function displayVehicles(result) {
	return_journey = false;
	amount = 1;
	if (result.formatted_return_date) {
		return_journey = true;	
	}
	shared_vehicles_rate = {};
	if (result.shared_vehicles_rate[0]  != "undefined") {
		shared_vehicles_rate = result.shared_vehicles_rate[0];
	}
	is_night_trip = isNightTrip(result.formatted_start_time);
	vehicle_amounts = JSON.parse(result.paths.vehicles);
	$('#vehicle_list').html('');
	for(i=0;i<result['vehicles'].length;i++){
		header = false;
		if (i==0)
			header = true;
		amount = calculateVehicleAmount(result['vehicles'][i],vehicle_amounts,shared_vehicles_rate,is_night_trip,return_journey);
		if (amount) {
			$('#vehicle_list').append(vehicleInformation(result['vehicles'][i],header,return_journey,amount,result.passengers));
			displayingVehicles[result['vehicles'][i].id] = result['vehicles'][i];
			displayingVehicles[result['vehicles'][i].id]['amount'] = amount;
		}
	}
}

function calculateVehicleAmount(vehicle,vehicle_amounts,shared_vehicles_rate,is_night_trip,return_journey) {
	amount = 0;
	if (vehicle.shared == '1') {
		if (shared_vehicles_rate) {
			if (is_night_trip) {
				if (return_journey){
					amount = shared_vehicles_rate.night_rate_for_round_a_trip;
				} else {
					amount = shared_vehicles_rate.night_rate_for_one_way
				}
			} else {
				if (return_journey){
					amount = shared_vehicles_rate.rate_for_round_a_trip;
				} else {
					amount = shared_vehicles_rate.rate_for_one_way
				}
			}
		}
	} else {
		if (typeof vehicle_amounts[vehicle.id] != "undefined") {
				amount = vehicle_amounts[vehicle.id];
			if (return_journey) {
				amount = amount*2;
			}
		}
	}
	return amount;
}

function isNightTrip(time){
	time = time.split(':');
	time = time[0];
	if (parseInt(time) >= 22) {
		return true;
	} else {
		return false;
	}
}

function vehicleInformation(vehicle,header,return_journey,amount,passengers) {
	var language = $('meta[name=language]').attr('content').toLowerCase();
	var short_overview = vehicle[language+'_overview'].substring(0,140);
	var long_overview = vehicle[language+'_overview'];
	var extras = vehicle[language+'_extras'];
	//var title = vehicle[language+'_title'];
	var title = vehicle['name'];
	var html = '<div class="panel pickbluebgtop border-2">';
	if (header) {
		html += '<div class="panel-heading pickbluebg">Choose your car</div>';
	}
	html += '<div class="panel-body">';
	html += '<div class="col-md-3"><b class="vehicle_title">'+title+'</b><br/>';
	html += '<img src="'+baseUrl+'/assets/cc/images/vehicles/'+vehicle.image+'" width="100%" />';
	html += '</div>';
	html += '<div class="col-md-3">';
	html += '<table class="car_part2">';
	html += '<tr><td width="20px"><i class="fa fa-user-o icon-style"></i></td><td>'+vehicle.max_passengers+' Passengers</td></tr>';
	html += '<tr><td><i class="fa fa-briefcase icon-style"></i></td><td> 1 case and 1 holdall<br>per passenger</td></tr>';
	html += '<tr><td><i class="fa fa-car icon-style"></i></td><td> Door to door /<br/>Direct journey</td></tr>';
	html += '</table>';
	html += '</div>';
	html += '<div class="col-md-3" style="height:175px;border-right: 1px solid #ccc;border-left: 1px solid #ccc;padding-top:10px">';
	html += '<b>Overview</b><br/><br/>';
	html += '<div>'+short_overview+'<br/><u><a href="javascript:;" onClick="$(\'#view_more_'+vehicle.id+'\').toggle(\'slow\')">+ Info</a></u></div>';
	html += '</div>';
	html += '<div class="col-md-3" style="text-align:center;padding-top:10px;">';
	if (return_journey) {
		html += '<b>Return price for '+passengers+' passengers</b>';	
	} else {
		html += '<b>Price for '+passengers+' passengers</b>';
	}
	html += '<div style="text-align:center"><br/><div class="amount_text">'+amount+' &euro; </div>* All Included<br/><br/><button class="btn secondStepClick" style="width:100px;font-size:13px;padding:0px;height:30px;" data-vehicle="'+vehicle.id+'">BOOK NOW</button></div>';
	html += '</div>';
	html += '<div id="view_more_'+vehicle.id+'" class="extras_div col-xs-12" >';
		html += '<div class="col-md-9" style="border-right: 1px solid #ccc;"><b>Important travel information</b><br/><br/><p>'+long_overview+'</p></div>';
		html += '<div class="col-md-3" ><b>Extras</b><br/><br/><p>'+extras+'</p></div>';
	html += '</div>';
	html += '</div></div>';
	return html;
}