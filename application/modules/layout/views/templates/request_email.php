<?php
	$extra_array = json_decode($bookings['extra_array'], true);	
	define('ASSETIMAGEPATH',base_url()."assets/cc/images/");
	//define('ASSETIMAGEPATH',"http://shuttleing.com/assets/cc/images/");
?>
<html>

	  <head>

		  <title>Shuttle</title>

	</head>

	

	<body style="font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;line-height: normal;font-size: 12px;color: #25387d;background:#f5f5f5;padding:15px;width:780px !important;text-align:center !important;align-items:center !important;">

	 <style>

		td{

			border:none !important;

			line-height: 1.42857;

			padding:0px!important;

			vertical-align: top !important;

			font-size:12px !important;

			margin:0 !important;

		}

		table{

			padding: 2px !important;

			margin: 0px !important;

				vertical-align: top !important;

		}

		tr{

			padding: 2px !important;

			margin: 0px !important;

				vertical-align: top !important;

		}

		span{

			padding: 2px !important;

			margin: 0px !important;

				vertical-align: top !important;

		}

		  p {

				margin:0px !important;

				vertical-align: top !important;

		  }

	</style>

		  <p style="text-align:center;width:750px;" width="750"><?php echo lang('print_booking'); ?></p>

		  <p style="margin:0px;height:10px !important;">&nbsp;</p>
		
		<img src="<?php echo $lang=='en'? ASSETIMAGEPATH.'header_english.jpg':ASSETIMAGEPATH.'header_spanish.jpg'; ?>" width="750" style="width:750px; margin:0px!important;padding:0px!important;">

		  <p style="margin:0px;height:10px !important;">&nbsp;</p><p style="margin:0px;height:10px !important;">&nbsp;</p>
		  
		<table width="750" style="width:750px;background-color: #25387d;text-align:left !important;margin:auto !important;margin-top:10px !important;">

			<tbody>

				<tr style="text-align:left !important;">

					<td style="width:350px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;">

						<span style="padding:10px;padding-right:0px;font-size:13px;font-weight:bold;color:#fff;padding-left:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('booking_information'); ?></span>

					</td>

						  <td style="width:350px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;text-align:right !important;padding-right:10px !important;">
								
								<span class="right-span" style="padding:10px;padding-right:0px;font-size:13px;font-weight:bold;color:#fff;padding-left:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('no_reference').':&nbsp;<span style="padding:10px;padding-left:0px;font-size:13px;font-weight:bold;color:#fff;">'.$book_reference; ?></span>


					</td>

				</tr>

			</tbody>

		</table>

		  <table width="750" style="width:750px;background-color: #fff;text-align:left !important;margin:auto !important;margin-top:10px !important;">

				<tbody>

					 <tr style="">

						  <td style="width:350px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;">

								<span style="padding:10px !important;padding-right:0px !important;font-size:13px !important;font-weight:bold !important;color:#25387d !important;padding-left:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $clients['name'].' '.$clients['surname']; ?></span>

						  </td>

						  <td style="width:350px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;text-align:right !important;padding-right:20px !important;">
								
								<span class="right-span" style="padding:10px !important;padding-right:0px !important;font-size:13px !important;color:#25387d !important;padding-left:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $clients['email']; ?></span>


						  </td>

					 </tr>

				</tbody>

		  </table>

		  <table width="750" style="width:750px;background-color: #fff;text-align:left !important;margin:auto !important;margin-top:10px !important;">

				<tbody>

					 <tr style="">

						  <td style="width:350px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;">

								<span style="padding:10px !important;padding-right:0px !important;font-size:13px !important;font-weight:bold !important;color:#25387d !important;padding-left:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('passengers'); ?>: </span style="font-weight:normal !important;"><span> <?php echo $bookings['adults']; ?></span>

						  </td>

						  <?php 
						  	if ($clients['phone']) {
						  ?>
						  <td style="width:350px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;text-align:right !important;padding-right:20px !important;">
								
								<span style="padding:10px !important;padding-right:0px !important;font-size:13px !important;font-weight:bold !important;color:#25387d !important;padding-left:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('phone'); ?>: </span style="font-weight:normal !important;"><span> <?php echo $clients['phone']; ?></span>


						  </td>
						  <?php } ?>
					 </tr>

				</tbody>

		  </table>

		  <table width="750"  style="width:750px;text-align:left !important;margin:auto !important;margin-top:10px !important;">

				<tbody>

					 <tr style="">

						  <td style="width:342px;padding-left:10px !important;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;background-color:#fff;" colspan="<?php echo (isset($return_bookings)) ? '3' : ''; ?>">

						  <p>
						  	<span style="display:table;">
								<span  style="display:table-row;">
									 <span style="display:table-cell;padding-left:10px !important;font-size:22px !important;color:#EA5B55 !important;vertical-align:top !important;">
						  					<b><?php echo strtoupper(lang('go')); ?></b>
						  			</span>
						  		</span>
						  	</span>
						 </p>

							  <p>
							  	<span style="display:table;">
										<span  style="display:table-row;">
											 <span style="display:table-cell;font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:top !important;font-weight:bold !important;"><?php echo lang('from'); ?>:</span>
											 <span style="display:table-cell;font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo $bookings['start_from']; ?></span>
										</span>
									</span>
								</p>

								<?php if(isset($bookings['source_point']) && $bookings['source_point'] == 'start_from') { ?>
								<p>
							  	<span style="display:table;">
										<span  style="display:table-row;">
											 <span style="display:table-cell;font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:top !important;font-weight:bold !important;"><?php echo lang('postal_code'); ?>:</span>
											 <span style="display:table-cell;font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo $bookings['postal_code']; ?></span>
										</span>
									</span>
								</p>
								<?php } ?>

								<p>
									<span style="display:table;">
										<span  style="display:table-row;">
									 		<span style="display:table-cell;font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:top !important;font-weight:bold !important;"><?php echo lang('to'); ?>:</span>
									 		<span style="display:table-cell;font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo $bookings['end_at']; ?></span>
									 	</span>
									</span>
								</p>

							<?php if(isset($bookings['source_point']) && $bookings['source_point'] == 'end_at') { ?>
								<p>
							  	<span style="display:table;">
										<span  style="display:table-row;">
											 <span style="display:table-cell;font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:top !important;font-weight:bold !important;"><?php echo lang('postal_code'); ?>:</span>
											 <span style="display:table-cell;font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo $bookings['postal_code']; ?></span>
										</span>
									</span>
								</p>
								<?php } ?>

								<p style="padding-bottom:20px;">
									 <span style="font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:middle !important;font-weight:bold !important;"><?php echo lang('date'); ?>:</span>  <span style="font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo date('d/m/Y - H:i', strtotime($bookings['start_journey'] . ' ' . $bookings['hour'])); ?>h</span>
								</p>

								<?php if (isset($bookings['address']) && $bookings['address']) { ?>
								<p style="padding-bottom:20px;">
									 <span style="font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:middle !important;font-weight:bold !important;"><?php echo lang('address'); ?>:</span>  <span style="font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo $bookings['address']; ?></span>
								</p>
								<?php } ?>
								
						  </td>
						  <?php

							if(isset($return_bookings)){

							?>
						  <td style="width:6px;"></td>
						  <td style="width:365px !important;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important; background-color:#fff;">
						  
						  
								<p style="font-size:22px !important;padding-left:10px !important;color:#EA5B55 !important;vertical-align:middle !important;font-weight:bold !important;text-transform:uppercase !important;"><b><?php echo strtoupper(lang('back')); ?></b></p> 
								
								<p>
									<span style="display:table;">
										<span  style="display:table-row;">
									 		<span style="display:table-cell;font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:top !important;font-weight:bold !important;"><?php echo lang('from'); ?>:</span>
									 		<span style="display:table-cell;font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo $bookings['end_at']; ?></span>
									 	</span>
									</span>
								</p>

								<?php if(isset($bookings['source_point']) && $bookings['source_point'] == 'end_at') { ?>
								<p>
							  	<span style="display:table;">
										<span  style="display:table-row;">
											 <span style="display:table-cell;font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:top !important;font-weight:bold !important;"><?php echo lang('postal_code'); ?>:</span>
											 <span style="display:table-cell;font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo $bookings['postal_code']; ?></span>
										</span>
									</span>
								</p>
								<?php } ?>

								<p>
									<span style="display:table;">
										<span  style="display:table-row;">
									 		<span style="display:table-cell;font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:top !important;font-weight:bold !important;"><?php echo lang('to'); ?>:</span>
									 		<span style="display:table-cell;font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo $bookings['start_from']; ?></span>
									 	</span>
									</span>
								</p>

								<?php if(isset($bookings['source_point']) && $bookings['source_point'] == 'start_from') { ?>
								<p>
							  	<span style="display:table;">
										<span  style="display:table-row;">
											 <span style="display:table-cell;font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:top !important;font-weight:bold !important;"><?php echo lang('postal_code'); ?>:</span>
											 <span style="display:table-cell;font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo $bookings['postal_code']; ?></span>
										</span>
									</span>
								</p>
								<?php } ?>

								<p style="padding-bottom:20px !important;">
									 <span style="font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:middle !important;font-weight:bold !important;"><?php echo lang('date'); ?>:</span>  <span style="font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo date('d/m/Y - H:i', strtotime($return_bookings['start_journey'] . ' ' . $return_bookings['hour'])); ?>h</span>
								</p>
						  
						  
						  </td>
						  <?php } ?>

					 </tr>

				</tbody>

		  </table>

		  <?php
				if(count($extra_array) > 0) {
					 $extra_value = array_column($extra_array, 'extra_value');
					 $sum_extra = array_sum($extra_value);
				} else {
					 $sum_extra = 0;
				}
		  ?>

		  <table width="750" style="width:750px;text-align:left !important;margin:auto !important;margin-top:10px !important;">

				<tbody>

					 <tr style="">

						  <td style="width:342px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:middle !important;background-color:#fff;">

								<span style="padding:10px !important;padding-right:0px !important;font-size:13px !important;font-weight:bold !important;color:#25387d !important;padding-left:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('extra_luggage'); ?>: </span style="font-weight:normal;"><span> <?php echo $sum_extra; ?>&nbsp;&euro;</span>

						  </td>
						  <td style="width:6px;"></td>
						  <td style="width:342px;vertical-align:top !important;background-color:#fff;">
								
							  <table style="padding:0px !important;">
								<tbody>
									 <tr>
										  <td style="width:190px;background-color:#fff;padding-top:10px !important;padding-bottom:10px !important;">

												<p style="padding-right:0px !important;font-size:13px !important;font-weight:bold !important;color:#25387d !important;padding-left:0px !important;margin-top: 4px !important;margin-bottom:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('promotional_code').':'; ?><span style="font-weight:normal !important;vertical-align:middle !important;"> -<?php echo $bookings['promotional_code_id']?$bookings['reduction_value'] : 0; ?>&nbsp;&euro;</span></p>
										  </td>

										  <td style="width:170px;text-transform:uppercase;background-color: #25387d;text-align:center !important;vertical-align:middle !important;">
												<p style="font-size:13px !important;font-weight:bold !important;color:#fff !important;padding-left:0px !important;background-color: #25387d;transform:uppercase !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('total') . ' '. lang('price') . ':  ' . $bookings['price']; ?>&nbsp;&euro;</p>
										  </td>
									 </tr>
								</tbody>

							  </table>


						  </td>

					 </tr>

				</tbody>

		  </table>
		
			<table width="750" style="width:750px;background-color: #fff;text-align:left !important;margin:auto !important;margin-top:10px !important;">

				<tbody>

					 <tr style="">

						  <td style="padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;">
						  	<p style="padding-left:10px !important;"><?php echo lang('hi'); ?> <?php echo $client['name']; ?>,
						  	<?php echo lang('reservation_done_payment_email_content'); ?></p>
						  	<center><a style="display:block;text-decoration:none;background-color:#25387d;color:white;padding:5px;width:150px;height:50px;" href="<?php echo $confirm_url; ?>">&nbsp;<?php echo lang('confirm_reservation'); ?>&nbsp;</a></center>
						  </td>

					 </tr>

				</tbody>

		  </table>
	</body>

</html>
