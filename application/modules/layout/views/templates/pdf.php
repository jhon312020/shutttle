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

		body{margin:0px;}

		.footer { position: absolute; bottom: 0px;height:30px; }

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

	<body style="font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;line-height:normal;font-size:12px;color:#25387d;">

		<div class="footer">

			<div style="top:10px;border-top:1px dotted #25387d;position: relative;">

			<p style="text-align:justify;">

				<?php echo lang('query_booking'); ?>

			</p>

			</div>

		</div>

		<p style="text-align:center;"><?php echo lang('print_booking'); ?></p>

		<img src="<?php echo $ln=='en'? 'assets/cc/images/header_english.png':'assets/cc/images/header_spanish.png';?>" style="width:100%;margin:0px!important;padding:0px!important;margin-bottom:25px!important;">

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

		<table style="margin:0px!important;margin-top:15px; padding:0px!important;width:100%;height:40px;background-color:#f5f5f5;">

			<tbody>

				<tr style="width:100%;margin:0px!important;padding:0px!important;">

					<td style="width:50%;padding-top:10px;padding-bottom:10px;">

						<span style="color:#25387d !important;font-size:14px !important;padding-left:10px;font-weight:bold !important;"><?php echo $clients['name']; ?> </span>

					</td>

					<td style="width:50%;padding-right:10px;padding-top:10px;padding-bottom:10px;text-align:right;">
						<span style="color:#25387d !important;font-size:12px !important;"><?php echo $clients['email']; ?></span>
					</td>

				</tr>

			</tbody>

		</table>

		<table style="margin:0px!important;margin-top:15px; padding:0px!important;width:100%;height:40px;background-color:#f5f5f5;">

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

					<td style="width:48%;padding-right:15px;background-color:#f5f5f5;background-color:#f5f5f5;">
						<div style="width:100%;background-color:#f5f5f5;">
							<p style="font-size:22px;padding-left:10px;padding-top:20px;color:#EA5B55 !important;vertical-align:middle;font-weight:bold;text-transform:uppercase;"><?php echo lang('go'); ?></p>	

						<p>
							<span style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;font-weight:bold;"><?php echo lang('from'); ?>:</span>  <span style="font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['start_from']; ?></span>
						</p>

						<p>
							<span style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;font-weight:bold;"><?php echo lang('to'); ?>:</span>  <span style="font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['end_at']; ?></span>
						</p>

						<p style="padding-bottom:20px;">
							<span style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;font-weight:bold;"><?php echo lang('date'); ?>:</span>  <span style="font-size:18px;color:#25387d;vertical-align:middle;"><?php echo date('d/m/Y - H:i', strtotime($bookings['start_journey'] . ' ' . $bookings['hour'])); ?>h</span>
						</p>
						
						</div>

					</td>
					<td style="width:1%;">
					</td>
					<td style="width:48%;padding-left:5px;<?php echo isset($return_bookings) ? 'background-color:#f5f5f5;': ''; ?>">
						<?php

				if(isset($return_bookings)){

				?>
					<div style="width:100%;background-color:#f5f5f5;">
						<p style="font-size:22px;padding-left:10px;padding-top:20px;color:#EA5B55 !important;vertical-align:middle;font-weight:bold;text-transform:uppercase;"><?php echo lang('back'); ?></p>	

						<p>
							<span style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;font-weight:bold;"><?php echo lang('from'); ?>:</span>  <span style="font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['end_at']; ?></span>
						</p>

						<p>
							<span style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;font-weight:bold;"><?php echo lang('to'); ?>:</span>  <span style="font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['start_from']; ?></span>
						</p>

						<p style="padding-bottom:20px;">
							<span style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;font-weight:bold;"><?php echo lang('date'); ?>:</span>  <span style="font-size:18px;color:#25387d;vertical-align:middle;"><?php echo date('d/m/Y - H:i', strtotime($return_bookings['start_journey'] . ' ' . $bookings['hour'])); ?>h</span>
						</p>
						</div>
						<?php } ?>
					</td>
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
						<div style="width:100%;background-color:#f5f5f5;padding-top:15px;padding-bottom:15px;padding-left:10px;">

						<span style="font-size:18px;padding-left:10px;color:#25387d;font-weight:bold;"><?php echo '<span>'. lang('extra_luggage') .'</span>'. ': <span style="font-weight:normal;">'. $sum_extra . '&nbsp;&euro;</span>'; ?></span>

						</div>
					</td>
					<td style="width:50%;padding-bottom:10px;padding-left:4px;">
						<div style="width:100%;background-color:#f5f5f5;padding-top:10px;padding-bottom:10px;position:relative;">
							<div style="position:absolute;right:0px;width:50%;text-align:center;background:#25387d;top:0px;color:#fff !important;padding-top:15px;padding-bottom:15px;">
								<span style="font-size:18px;color:#fff;text-align:center;vertical-align:middle;padding-top:10px !important;text-transform:uppercase;"><?php echo lang('total') . ' '. lang('price') . ':  ' . $bookings['price']; ?>&nbsp;&euro;</span>
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

							<table style="background-color:#4577d8;border-collapse:collapse;">

								<thead>

									<tr>

										<td style="width:22%;padding:10px;">

											<span style="color:#fff !important;font-size:12px !important;"> Shuttleing is a shared shuttle service. (Keep it simple. Who cares if it's minivan or minibus?)</span>

										</td>

										<td style="background-color:#25387d;width:22%;padding:10px;">

											<span style="color:#fff !important;font-size:12px !important;">All our drivers hold a sign with shuttleing logo. They all wear blue jeans and colorful converse shoes</span>	

										</td>

										<td style="width:28%;padding:10px;">

											<span style="color:#fff !important;font-size:12px !important;">All our vans have logo on doors (is it necessary to explain the car- exceptions? You will let them know if that's the case, right?)</span>	

										</td>

										<td style="background-color:#25387d;width:18%;padding:10px;">

											<span style="color:#fff !important;font-size:12px !important;">Check the map below to locate our vehicles at the exit of the terminal</span>	

										</td>

										<td style="width:18%;padding:10px;">

											<span style="color:#fff !important;font-size:12px !important;">It is strictly forbidden to get off the vehicle until final destination.</span>	

										</td>

									</tr>	

								</thead>

							</table>	

							<?php } else { ?>

							<table style="background-color:#4577d8;border-collapse:collapse;">

								<thead>

									<tr>

										<td style="width:22%;padding:10px;">

											<span style="color:#fff !important;font-size:12px !important;"> Shuttleing es un servicio de transporte compartido. (Asi de simple. Que importa si es un minivan o microbús?)</span>

										</td>

										<td style="background-color:#25387d;width:22%;padding:10px;">

											<span style="color:#fff !important;font-size:12px !important;">Todos nuestros conductores llevan un distintivo con el logo de shuttleing Todos usan jeans azul y converse de colores</span>	

										</td>

										<td style="width:28%;padding:10px;">

											<span style="color:#fff !important;font-size:12px !important;">Todos nuestros vehículos tienen logotipo en las puertas (¿es necesario explicar las excepciones de coche? Nos lo hareis saber si es necesario, no?)</span>	

										</td>

										<td style="background-color:#25387d;width:18%;padding:10px;">

											<span style="color:#fff !important;font-size:12px !important;">Comprobar el mapa para localizar nuestros vehículos a la salida de la terminal</span>	

										</td>

										<td style="width:18%;padding:10px;">

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

		<div class="row" style="margin-left:10px !important;">

			<p style="font-weight:bold;color:#25387d;font-size:15px !important;">BOOKING TERMS & CONDITIONS</p>

		</div>

		<?php if($ln == 'en') { ?>

		<div style="margin-left:10px !important;">

			<div class="row" style="">

				<p style="font-weight:bold;">Airport pick-up</p>

				<p>Our hostess will be waiting for you at arrivals lounge, holding a board with your name. If you can’t find her, please call to our airport assistance number +34628 000 785 (9.00am-22.00pm) or +34646 401 942 (24hs)</p>

				<p>Once you meet our staff, you may be waiting up to 30 minutes. Please understand it’s a shared van and we need to accommodate other passengers.</p>

				<p>If your flight is delayed, don’t worry! We check all the timings and we wait for you.</p>

				<p>We reserve the right for pick-ups on flights arriving at 23hr that have a 2 hour delay or more.</p>

			</div>

			<div class="row" style="">

				<p style="font-weight:bold;">Hotel / other pick-up</p>

				<p>Please be ready 10 minutes beforehand. We may take up to 30 minutes to pick you up from the time you designate, as we normally pick up other passengers in the same ride. Please be patient as we ALWAYS deliver. </p>

				<p>In case we come pick you and you’re not ready you will have 5 extra minutes to show up, otherwise our drivers will leave you. No expenses will be covered.</p>
                
                 <p>Shuttleing is an independent company that serves hotels and individuals in Barcelona. Shuttleing does not belong to any hotel and its activity is totally external.</p>

			</div>

			<div class="row" style="">

				<p style="font-weight:bold;">CANCELLATION POLICY</p>

				<p>No fees for cancellation up to 24hours prior the start time of service.</p>

				<p>100% of the total price of the service, when the cancellation occurs less than 24hrs prior the service or the passenger does not appear.</p>

			</div>

		</div>	

		<?php } else { ?>

		<div style="padding-left:10px !important;">

			<div class="row" style="">

				<p style="font-weight:bold;">Recogida en el aeropuerto</p>

				<p>Nuestra hostes le estará esperando en la puerta de llegadas, sosteniendo  una tablet con su nombre. Si no puede encontrarla, por favor llame a nuestro número de asistencia en aeropuerto +34628 000 785 (9:00-10:00) o al +34646 401 942 (24 hs)</p>

				<p>Una vez que usted este con nuestro personal,  puede que tenga que  esperar hasta 30 minutos. Por favor, comprenda que es una furgoneta compartida y necesitamos dar cabida a otros pasajeros. </p>

				<p>Si su vuelo se retrasa, no se preocupe! Comprobamos todos los horarios y sus modificaciones  y le esperamos!!</p>

				<p>En vuelos con llegadas a partir de las 23h y que tengan un retraso de 2 horas o más, nos reservamos el derecho de realizar el servicio.</p>

			</div>

			<div class="row" style="">

				<p style="font-weight:bold;">Hotel / otros Pick-up</p>

				<p>Por favor esten listos con 10 minutos de antelacion. Shuttleing dispondrá un margen de 30 minutos, desde la hora de su reserva, para recogerle, normalmente recogemos a otros pasajeros en el mismo trayecto. Por favor tenga paciencia, SIEMPRE llegamos.</p>

				<p>En caso de que vengamos  a buscarle y usted no esté listo tendrá 5 minutos extras o de lo contrario nuestros conductors se iran. En ese caso no nos haremos responsables de cualquier gasto extra que pudiera tener. </p>
                
               <p>Shuttleing es una empresa independiente que da servicio a hoteles y particulares en Barcelona. Shuttleing no pertenece a ningún hotel y su actividad es totalemnte externa.</p>

			</div>

			<div class="row" style="">

				<p style="font-weight:bold;">POLITICA DE CANCELACION</p>

				<p>No se cobrara el recargo de los servicios cuando se cancele con 24hrs de antelacion al servicio.</p>

				<p>Se cobrara el 100% del servicios cuando la cancelacion sea inferior a 24hrs o los pasajeros no aparezcan</p>

			</div>

		</div>	

		<?php } ?>

	</body>

</html>

