<?php
	$extra_array = json_decode($bookings['extra_array'], true);	
	define('ASSETIMAGEPATH',base_url()."assets/cc/images/");
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
		
		<table width="750" cellspacing="0" cellpadding="0" style="width:750px;text-align:left !important;margin:auto !important;">

				<tbody>

					 <tr>

						  <td style="font-size:20px !important;color:#25387d;font-weight: bold;">

								<p style="margin:0px !important;">&nbsp;</p>

								<p style="margin-bottom:10px;"><?php echo strtoupper(lang('important_information')); ?></p>

						  </td>
						  <td>
						  </td>
					 </tr>

					 <tr>

					 	<?php if($lang == 'en') { ?>
					 		<td style="padding:10px;color: #fff;background-color: #4577d8;text-align:center;width:50%;">Check the map below to locate our vehicles at the exit of the terminal.</td>

					  		<td bgcolor="#25387d" style="padding:10px;color: #fff;text-align:center;">It is strictly forbidden to get off the vehicle until final destination.</td>
					  	<?php } else { ?>
					  		<td style="padding:10px;color: #fff;background-color: #4577d8;text-align:center;">Comprobar el mapa para localizar nuestros vehículos a la salida de la terminal</td>

							<td bgcolor="#25387d" style="padding:10px;color: #fff;text-align:center;">Está estrictamente prohibido bajarse del vehículo hasta llegar a su destino</td>
						<?php } ?>
					 </tr>
						 <!--  <td width="750" style="width:750px !important;">

								<table style="border: 0px;width:750px !important;" cellpadding=0 cellspacing=0>

									 <tr style="background-color: #4577d8;">

										  
									 </tr>

								</table>
 -->

					 <tr><td colspan="2"><p style="border-bottom:1px dotted #25387d;margin:0px !important;">&nbsp;</p></td></tr>

				</tbody>

		</table>

		<table width="750" style="margin:auto !important;text-align:left !important;">

				<tr>

					 <td colspan=2 width="750">

						  <p style="text-align:left !important;color:#25387d;margin-top:2px !important;">

								<?php echo lang('query_booking'); ?>

						  </p>

						  <p>&nbsp;</p>

					 </td>

				</tr>

				<tr>

					 <td width="360" style="width:360px;">

						  <img src="<?php echo ASSETIMAGEPATH.'Terminal-1.jpg'; ?>" style="margin:0px!important;padding:0px!important;padding-top:10px;width:360px;" width="360">
										
										

					 </td>
					 <td>
						  <img src="<?php echo ASSETIMAGEPATH.'Terminal-2.jpg'; ?>" style="margin:0px!important;padding:0px!important;padding-top:10px;width:360px;" width="360">
					 </td>

				</tr>
				

				<tr>
					 <td width="370" style="width:370px;">
						  <span style="font-size:12px !important;"><?php echo lang('Pick up at T1 every 00" & 30"'); ?></span>
					 </td>
					 <td width="370" style="width:370px;">
						  <span style="font-size:12px !important;"><?php echo lang('Pick up at T2 every 15" & 45"'); ?></span>
					 </td>
				</tr>
				<tr style="text-align:left !important;">

					 <td style="width:750" width="750" colspan=2>

						  <table>

								<tr>

									 <td style="width:750px" width="750">

										  <table>

												<tr>

													 <td>

														  <p style="font-weight:bold;color:#25387d;padding-top:10px;margin:0px;"><?php echo lang('BOOKING TERMS & CONDITIONS'); ?></p>

													 </td>

												</tr>

												<tr>

													 <td>

														  <p style="margin:0px;height:10px !important;">&nbsp;</p>
														  <p style="font-weight:bold;color:#25387d;margin:0px;"><?php echo lang('AIRPORT'); ?></p>

														  <p style="margin:0px;height:10px !important;">&nbsp;</p>
														  <p style="font-weight:bold;color:#25387d;margin:0px;"><?php echo lang('Shared Vehicle'); ?></p>

														  <p style="margin:0px;height:10px !important;">&nbsp;</p>
														  <p style="color:#25387d;margin:0px;"><?php echo lang('Pick up at T1 every 00" & 30"'); ?></p>

														  <p style="margin:0px;height:10px !important;">&nbsp;</p>
														  <p style="color:#25387d;margin:0px;"><?php echo lang('Pick up at T2 every 15" & 45"'); ?></p>

														  <p style="margin:0px;height:10px !important;">&nbsp;</p>
														  <p style="font-weight:bold;color:#25387d;margin:0px;"><?php echo lang('Private Vehicle'); ?></p>

														  <p style="margin:0px;height:10px !important;">&nbsp;</p>
														  <p style="color:#25387d;margin:0px;"><?php echo lang('Driver will meet & great you at arrivals once you walk out from baggage claim.'); ?></p>

													 </td>

												</tr>

												<tr>

													 <td>

														  <p style="margin:0px;height:10px !important;">&nbsp;</p>
														  <p style="font-weight:bold;color:#25387d;margin:0px;"><?php echo lang('HOTEL'); ?></p>

														  <p style="margin:0px;height:10px !important;">&nbsp;</p>
														  <p style="font-weight:bold;color:#25387d;margin:0px;"><?php echo lang('Shared Vehicle pick-up'); ?></p>

														  <p style="margin:0px;height:10px !important;">&nbsp;</p>
														  <p style="color:#25387d;margin:0px;"><?php echo lang('Up to 30 minutes waiting from the pick up time. Free cancellation with 24h in advance'); ?></p>

														  <p style="margin:0px;height:10px !important;">&nbsp;</p>
														  <p style="font-weight:bold;color:#25387d;margin:0px;"><?php echo lang('Private Vehicle pick-up'); ?></p>

														  <p style="margin:0px;height:10px !important;">&nbsp;</p>
														  <p style="color:#25387d;margin:0px;"><?php echo lang('Driver will meet & great you at the lobby of your hotel/hostel'); ?></p>

													 </td>

												</tr>

												<tr>

													 <td>

													 	<p style="margin:0px;height:10px !important;">&nbsp;</p>
														<p style="font-weight:bold;color:#25387d;margin:0px;"><?php echo lang('CANCELLATION POLICY'); ?></p>

														  <p style="margin:0px;height:10px !important;">&nbsp;</p>
														  <p style="margin:0px;color:#25387d;"><?php echo lang('No fees for cancellation up to 24hours prior the start time of service.'); ?></p>

														  <p style="margin:0px;height:10px !important;">&nbsp;</p>

														  <p width="375" style="margin:0px;color:#25387d;"><?php echo lang('100% of the total price of the service, when the cancellation occurs less than 24hrs prior the service or the passenger does not appear.'); ?></p>

													 </td>

												</tr>

										  </table>

									 </td>

								</tr>

						  </table>

					 </td>

				</tr>

		</table>

	</body>

</html>
