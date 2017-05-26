<?php

	//echo $lang;

	$template_path = base_url()."assets/cc/";

	$ln = $this->uri->segment(1);

	//echo $ln;die;

	if(!$ln || $ln == ""){	$ln = "es"; }

	//{"1":{"extra_name":"Equipaje Extra","extra_count":"01","extra_value":2},"2":{"extra_name":"Equipaje Extra","extra_count":"01","extra_value":2}}

	$extra_array = json_decode($bookings['extra_array'], true);	

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

     <head>

	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	   <style>
	   @page {
	   	margin:2em;
	   }
		body{margin:0px;}

		.footer { position: absolute; bottom: 0px;height:20px; }

		td{

			border:none !important;

			line-height: 1.42857;

			padding-bottom:5px;

			vertical-align: top;

			font-size:12px !important;

			color:#25387d !important;

		}

		.well {

		}

		body {

			font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;

			line-height: normal;

			font-size: 12px;

			color: #25387d;

		}

		.example {

			width: 50%;

			/*page-break-after: always;*/

		}		

		#example-3 .div-1a {

			position:absolute;

			top:329px;

			right:0;

			width:350px;

		}

		#example-4 .div-1a {

			position:absolute;

			top:265px;

			right:0;

			width:350px;

			font-size:8px !important;

			font-family:FuturaStdBook !important;

		}

		#example-4 .div-1b {

			font-size:8px !important;

			font-family:FuturaStdBook !important;

			

		}

		#example-4 .futuraBold {

			font-size:8px !important;

			font-family:futurastdbold !important;

			

		}

	</style>

	</head>

	<body style="font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;line-height:normal;font-size:12px;color:#25387d;background:#f5f5f5 !important;padding:15px !important;">

		<div class="footer">

			<div style="top:10px;border-top:1px dotted #25387d;position: relative;">

			<p style="text-align:justify;">

				<?php echo lang('query_booking'); ?>

			</p>

			</div>

		</div>

		<p style="text-align:center;"><?php echo lang('print_booking'); ?></p>

		<img src="<?php echo $ln=='en'? 'assets/cc/images/header_english.jpg':'assets/cc/images/header_spanish.jpg';?>" style="width:100%;margin:0px!important;padding:0px!important;margin-bottom:25px!important;">

		<table style="margin:0px!important; padding:0px!important;width:100%;height:40px;background-color:#25387d;">

			<tbody>

				<tr style="width:100%;margin:0px!important;padding:0px!important;">

					<td style="width:50%;padding-top:10px;padding-bottom:10px;">

						<span style="color:#fff !important;font-size:12px !important;padding-left:10px;font-weight:bold !important;"><?php echo lang('booking_information'); ?> </span>

					</td>

					<td style="width:50%;padding-right:10px;padding-top:10px;padding-bottom:10px;text-align:right;">
						<span style="color:#fff !important;font-size:12px !important;font-weight:bold !important;"><?php echo $book_reference; ?></span>
					</td>

				</tr>

			</tbody>

		</table>

		<table style="margin:0px!important;margin-top:15px; padding:0px!important;width:100%;height:40px;background-color:#fff;">

			<tbody>

				<tr style="width:100%;margin:0px!important;padding:0px!important;">

					<td style="width:50%;padding-top:10px;padding-bottom:10px;">

						<span style="color:#25387d !important;font-size:14px !important;padding-left:10px;font-weight:bold !important;"><?php echo $clients['name'].' '.$clients['surname']; ?> </span>

					</td>

					<td style="width:50%;padding-right:10px;padding-top:10px;padding-bottom:10px;text-align:right;">
						<span style="color:#25387d !important;font-size:12px !important;"><?php echo $clients['email']; ?></span>
					</td>

				</tr>

			</tbody>

		</table>

		<table style="margin:0px!important;margin-top:15px; padding:0px!important;width:100%;height:40px;background-color:#fff;">

			<tbody>

				<tr style="width:100%;margin:0px!important;padding:0px!important;">

					<td style="width:50%;padding-top:10px;padding-bottom:10px;">

						<span style="color:#25387d !important;font-size:12px !important;padding-left:10px;font-weight:bold !important;"><?php echo '<span style="color:#25387d !important;font-size:12px !important;padding-left:10px;font-weight:bold !important;">'. lang('passengers') .'</span>'. ': <span style="font-weight:normal !important;">'. $bookings['adults'] . '</span>'; ?> </span>

					</td>
				</tr>

			</tbody>

		</table>

		<table style="margin:0px!important;margin-top:15px; padding:0px!important;width:100%;">

			<tbody>

				<tr style="width:100%;margin:0px!important;padding:0px!important;">

					<td style="width:48%;padding-right:15px;background-color:#fff;background-color:#fff;">
						<div style="width:100%;background-color:#fff;" colspan="<?php echo (isset($return_bookings)) ? '3' : ''; ?>">
							<p style="font-size:22px;padding-left:10px;padding-top:20px;color:#EA5B55 !important;vertical-align:middle;font-weight:bold;text-transform:uppercase;"><?php echo lang('go'); ?></p>	

						<p>
							
							<span style="display:table;">
								<span  style="display:table-row;">
									<span style="display:table-cell;font-size:18px;padding-left:10px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('from'); ?>:</span>

									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['start_from']; ?></span>
								</span>
							</span>
						</p>

						<?php if(isset($bookings['source_point']) && $bookings['source_point'] == 'start_from') { ?>
						<p>
							<span style="display:table;">
								<span  style="display:table-row;">
									<span style="display:table-cell;font-size:18px;padding-left:10px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('postal_code'); ?>:</span>

									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['postal_code']; ?></span>
								</span>
							</span>
						</p>
						<?php } ?>

						<p>
							<span style="display:table;">
								<span  style="display:table-row;">
								<span style="display:table-cell;font-size:18px;padding-left:10px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('to'); ?>:</span>
							
								<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['end_at']; ?></span>
								</span>
							</span>
						</p>

						<?php if(isset($bookings['source_point']) && $bookings['source_point'] == 'end_at') { ?>
						<p>
							<span style="display:table;">
								<span  style="display:table-row;">
									<span style="display:table-cell;font-size:18px;padding-left:10px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('postal_code'); ?>:</span>

									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['postal_code']; ?></span>
								</span>
							</span>
						</p>
						<?php } ?>

						<p style="padding-bottom:20px;">
							<span style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;font-weight:bold;"><?php echo lang('date'); ?>:</span>  <span style="font-size:18px;color:#25387d;vertical-align:middle;"><?php echo date('d/m/Y - H:i', strtotime($bookings['start_journey'] . ' ' . $bookings['hour'])); ?>h</span>
						</p>
						
						</div>

					</td>

					<?php

				if(isset($return_bookings)){

				?>

					<td style="width:1%;">
					</td>
					<td style="width:48%;padding-left:5px;background-color:#fff;">
						
					<div style="width:100%;background-color:#fff;">
						<p style="font-size:22px;padding-left:10px;padding-top:20px;color:#EA5B55 !important;vertical-align:middle;font-weight:bold;text-transform:uppercase;"><?php echo lang('back'); ?></p>	
				
						<p>
							<span style="display:table;">
								<span  style="display:table-row;">
									<span style="display:table-cell;font-size:18px;padding-left:10px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('from'); ?>:</span>
							
									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['end_at']; ?></span>
								</span>
							</span>
						</p>

						<?php if(isset($bookings['source_point']) && $bookings['source_point'] == 'end_at') { ?>
						<p>
							<span style="display:table;">
								<span  style="display:table-row;">
									<span style="display:table-cell;font-size:18px;padding-left:10px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('postal_code'); ?>:</span>

									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['postal_code']; ?></span>
								</span>
							</span>
						</p>
						<?php } ?>

						<p>
							<span style="display:table;">
								<span  style="display:table-row;">
									<span style="display:table-cell;font-size:18px;padding-left:10px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('to'); ?>:</span> 
							
									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['start_from']; ?></span>
								</span>
							</span>
						</p>

						<?php if(isset($bookings['source_point']) && $bookings['source_point'] == 'start_from') { ?>
						<p>
							<span style="display:table;">
								<span  style="display:table-row;">
									<span style="display:table-cell;font-size:18px;padding-left:10px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('postal_code'); ?>:</span>

									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['postal_code']; ?></span>
								</span>
							</span>
						</p>
						<?php } ?>
						
						<p style="padding-bottom:20px;">
							<span style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;font-weight:bold;"><?php echo lang('date'); ?>:</span>  <span style="font-size:18px;color:#25387d;vertical-align:middle;"><?php echo date('d/m/Y - H:i', strtotime($return_bookings['start_journey'] . ' ' . $return_bookings['hour'])); ?>h</span>
						</p>
						
						
						</div>
						
					</td>
					<?php } ?>
				</tr>

			</tbody>

		</table>
		<?php
		$sum_extra = 0;
			if(count($extra_array) > 0) {
				$extra_value = array_column($extra_array, 'extra_value');
				$sum_extra = array_sum($extra_value);
			} else {
				$sum_extra = 0;
			}
		?>

		<table style="margin:0px!important;margin-top:15px; padding:0px!important;width:100%;height:40px;">

			<tbody>

				<tr style="width:100%;margin:0px!important;padding:0px!important;">

					<td style="width:50%;padding-right:3px;">
						<div style="width:100%;background-color:#fff;padding-top:15px;padding-bottom:15px;padding-left:10px;">

						<span style="font-size:18px;padding-left:10px;color:#25387d;font-weight:bold;"><?php echo '<span>'. lang('extra_luggage') .'</span>'. ': <span style="font-weight:normal;">'. $sum_extra . '&nbsp;&euro;</span>'; ?></span>

						</div>
					</td>
					<td style="width:50%;padding-bottom:10px;padding-left:4px;">
						<div style="width:100%;background-color:#fff;padding-top:10px;padding-bottom:10px;position:relative;">
							<div style="position:absolute;right:0px;width:50%;text-align:center;background:#25387d;top:0px;color:#f5f5f5 !important;padding-top:15px;padding-bottom:15px;">
								<span style="font-size:18px;color:#f5f5f5;text-align:center;vertical-align:middle;padding-top:10px !important;text-transform:uppercase;"><?php echo lang('total') . ' '. lang('price') . ':  ' . $bookings['price']; ?>&nbsp;&euro;</span>
							</div>
						<table>
							<tbody>
								<tr>
									<td>
										<span class="right-span" style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;font-weight:bold;">Promotional code:  <span style="font-weight:normal;"><?php echo $bookings['promotional_code_id']?$bookings['reduction_value'] : 0; ?>&nbsp;&euro;</span></span>
									</td>
									
								</tr>
							</tbody>
						</table>
						</div>
					</td>
				</tr>

			</tbody>

		</table>

		<?php

		$style = '';
		?>

		
					<table>

						<tr>

							<td>

								<span style="font-weight:bold;color:#25387d !important;font-size:20px !important;"><?php echo strtoupper(lang('important_information')); ?><span>

							</td>

						</tr>

						<tr>	

							<td>

							<?php if($ln == 'en') { ?>

							<table style="background-color:#25387d;border-collapse:collapse;">

								<thead>

									<tr>

										

										<td style="background-color:#4577d8;width:50%;padding:10px;text-align:center;">

											<span style="color:#fff !important;font-size:12px !important;">Check the map below to locate our vehicles at the exit of the terminal</span>	

										</td>

										<td style="width:50%;padding:10px;text-align:center;">

											<span style="color:#fff !important;font-size:12px !important;">It is strictly forbidden to get off the vehicle until final destination.</span>	

										</td>

									</tr>	

								</thead>

							</table>	

							<?php } else { ?>

							<table style="background-color:#25387d;border-collapse:collapse;">

								<thead>

									<tr>

										
										<td style="background-color:#4577d8;width:50%;padding:10px;text-align:center;">

											<span style="color:#fff !important;font-size:12px !important;">Comprobar el mapa para localizar nuestros vehículos a la salida de la terminal</span>	

										</td>

										<td style="width:50%;padding:10px;text-align:center;">

											<span style="color:#fff !important;font-size:12px !important;">Está estrictamente prohibido bajarse del vehículo hasta llegar a su destino.</span>	

										</td>

									</tr>	

								</thead>

							</table>	

							<?php } ?>				

							</td>		

						</tr>

					</table>

				

		<div class="row" style="padding-left:10px !important;">

			<img src="assets/cc/images/Terminal-1.jpg" style="width:50%;">
			<img src="assets/cc/images/Terminal-2.jpg" style="width:50%;">

		</div>
		

		

		<?php if($ln == 'en') { ?>
		<div class="row" style="padding-left:10px !important;width:100%;">
			<table style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50% !important;">
							<span style="font-size:12px !important;">Pick up at T1 every 00" & 30"</span>
						</td>
						<td style="width:50%;">
							<span style="font-size:12px !important;">Pick up at T2 every 15" & 45"</span>
						</td>
					</tr>
				</tbody>
			</table>
			
		</div>
		<div class="row" style="margin-left:10px !important;">

			<p style="font-weight:bold;color:#25387d;font-size:15px !important;">BOOKING TERMS & CONDITIONS</p>

		</div>

		<div style="margin-left:10px !important;">

			<div class="row" style="">

				<p style="font-weight:bold;">Airport pick-up</p>

				<p>Pick up at T1 every 00" & 30"</p>

				<p>Pick up at T2 every 15" & 45"</p>
			</div>

			<div class="row" style="">

				<p style="font-weight:bold;">Hotel / other pick-up</p>

				<p>Up to 30 minutes waiting from the pick up time. Free cancellation with 24h in advance</p>

			</div>

			<div class="row" style="">

				<p style="font-weight:bold;">CANCELLATION POLICY</p>

				<p>No fees for cancellation up to 24hours prior the start time of service.</p>

				<p>100% of the total price of the service, when the cancellation occurs less than 24hrs prior the service or the passenger does not appear.</p>

			</div>

		</div>	

		<?php } else { ?>
		<div class="row" style="padding-left:10px !important;width:100%;">
			<table style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50% !important;">
							<span style="font-size:12px !important;">Recogida en T1 cada 00" y 30"</span>
						</td>
						<td style="width:50%;">
							<span style="font-size:12px !important;">Recogida en T2 cada 15" y 45"</span>
						</td>
					</tr>
				</tbody>
			</table>
			
		</div>
		<div class="row" style="margin-left:10px !important;">

			<p style="font-weight:bold;color:#25387d;font-size:15px !important;">TÉRMINOS Y CONDICIONES DE LA RESERVA</p>

		</div>
		<div style="padding-left:10px !important;">

			<div class="row" style="">

				<p style="font-weight:bold;">Recogida en el aeropuerto</p>

				<p>Recogida en T1 cada 00" y 30"</p>

				<p>Recogida en T2 cada 15" y 45"</p>

			</div>

			<div class="row" style="">

				<p style="font-weight:bold;">Hotel / otros Pick-up</p>

				<p>Hasta 30 minutos de espera desde la hora de recogida. Cancelación gratis con 24h de antelación.</p>

			</div>

			<div class="row" style="">

				<p style="font-weight:bold;">POLÍTICA DE CANCELACIÓN</p>

				<p>No se cobrará el recargo de los servicios cuando se cancele con 24hrs de antelación al servicio.</p>

				<p>Se cobrará el 100% del servicio cuando la cancelación sea inferior a 24hrs o los pasajeros no aparezcan.</p>

			</div>

		</div>	

		<?php } ?>

	</body>

</html>

