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

						<span style="color:#fff !important;font-size:12px !important;padding-left:10px;"><?php echo lang('no_reference').': '?> </span><span style="color:#fff !important;font-size:12px !important;font-weight:bold !important;"><?php echo $book_reference; ?></span>

					</td>

					<td style="width:50%;padding-right:10px;padding-top:10px;padding-bottom:10px;">

						<span style="font-size: 12px !important;color:#fff !important;font-weight:bold !important;"><?php echo lang('collaborator_name').': '.$bookings['collaborator_name']; ?></span>

					</td>

				</tr>

			</tbody>

		</table>

		<div style="clear:both; position:relative;">

			<div style="width:50%;">

				<div class="well" style="margin:0px!important;padding:10px 10px 0px 10px !important;<?php echo ($bookings['book_role'] == 2)?'margin-top:15px!important;':'margin-top:10px!important;'; ?>">

					<table style="width:100%;">

						<thead>

							<tr>

								<td colspan=4 style="margin:10px!important; padding:0px !important;padding-bottom:15px !important;font-size:15px !important;border-bottom: 1px dotted #25387d !important;color:#25387d !important;"><?php echo lang('booking_information'); ?></td>

							</tr>

						</thead>

						<tbody>

							<tr>

								<td style="padding-top:15px;color:#25387d !important;"><?php echo lang('from'); ?>:</td>

								<td style="padding-top:15px;" colspan=3><?php echo $bookings['start_from']; ?></td>

							</tr>

							<tr>

								<td style="color:#25387d !important;"><?php echo lang('to'); ?>:</td>

								<td colspan=3><?php echo $bookings['end_at']; ?></td>

							</tr>

							<tr>

								<td style="color:#25387d !important;"><?php echo lang('date_go'); ?>:</td>

								<td><?php echo Date('d/m/Y', strtotime($bookings['start_journey'])); ?></td>

								<td style="color:#25387d !important;"><?php echo lang('hour_go'); ?>:</td>

								<td><?php echo Date('H:i', strtotime($bookings['hour'])).'h'; ?></td>

							</tr>

							<?php

							if(isset($return_bookings)){

							?>

							<tr>

								<td style="color:#25387d !important;"><?php echo lang('date_back'); ?></td>

								<td><?php echo Date('d/m/Y', strtotime($return_bookings['start_journey'])); ?></td>

								<td style="color:#391B38 !important;"><?php echo lang('hour_back'); ?>:</td>

								<td><?php echo Date('H:i', strtotime($return_bookings['hour'])).'h'; ?></td>

							</tr>

							<?php } ?>

							<tr>

								<td style="color:#25387d !important;"><?php echo lang('country'); ?>:</td>

								<td><?php echo $countries[$bookings['country']]; ?></td>

								<td style="color:#25387d !important;"><?php echo lang('flight_no'); ?>:</td>

								<td><?php echo $bookings['flight_no']; ?></td>

							</tr>

							<tr>

								<td style="padding-bottom: 10px !important; border-bottom: 1px dotted #25387d!important;color:#25387d !important;"><?php echo lang('adults'); ?>:</td>

								<td style="padding-bottom: 10px !important; border-bottom: 1px dotted #25387d!important;"><?php echo $bookings['adults']; ?></td>

								<td style="padding-bottom: 10px !important; border-bottom: 1px dotted #25387d!important;color:#25387d !important;"><?php echo lang('kids'); ?>:</td>

								<td style="padding-bottom: 10px !important; border-bottom: 1px dotted #25387d!important;"><?php echo $bookings['kids']; ?></td>

							</tr>

							</tbody>

						</table>

						</div>

						<div class="well" style="margin:0px!important;padding-left:10px !important;padding-right:10px !important;">

							<table style="border-bottom:1px solid #25387d !important;width:100%;">

								<tbody>

							<tr style="border-bottom:1px solid #25387d !important;">

								<td style="color:#25387d !important;padding-top:10px;"><?php echo lang('passengers_price'); ?>:</td>

								<td style="padding-right:5px;padding-top:10px;text-align:right;"><?php echo $bookings['passenger_price']; ?>&nbsp;&euro;</td>

							</tr>

						</tbody>

					</table>

				</div>

				<?php if(count($extra_array) > 0) { ?>

				<div class="well" style="margin:0px!important; margin-top:15px !important;padding:10px !important;">

					<table class="table" style="width:100%;">

						<thead>

							<tr>

								<td colspan=2 style="padding-bottom: 10px !important; font-size: 15px !important; border-bottom: 1px dotted #25387d!important; color:#25387d!important;">Extras</td>

							</tr>

						</thead>

						<tbody>

							<?php

							

							$count=1;

								foreach($extra_array as $ex){

							?>

							<tr>

								<td style="font-size: 15px !important;color:#25387d!important;"><?php echo $ex['extra_name'].' (+'.$ex['extra_count'].')'; ?></td>

								<td style="font-size: 15px !important;color:#25387d!important;padding-right:5px;text-align:right;">+<?php echo $ex['extra_value']; ?>&nbsp;&euro;</td>

							</tr>

							<?php

								$count++;

							}

							?>

						</tbody>

					</table>

				</div>

				<?php } ?>

				<?php if($bookings['promotional_code_id']){ ?>

				<div class="well" style="margin:0px!important;padding:10px !important;">

					<table class="table" style="width:100%;border-bottom:1px solid #391B38 !important;width:100%;border-top:1px dotted #25387d !important;">

						<tbody>

							<tr>

								<td style="font-size: 15px !important;color:#25387d!important;padding-top:5px !important;padding-bottom:5px !important;"><?php echo ($bookings['promotional_type'] == 'price')?'Promotional code deduction price':'Promotional code deduction '.$bookings['promotional_value'].' %'; ?>:</td>

								<td style="padding-top:5px !important;padding-bottom:5px !important;padding-right:5px;text-align:right;font-size: 15px !important;color:#25387d!important;">-<?php echo $bookings['reduction_value']; ?>&nbsp;&euro;</td>

							</tr>

						</tbody>

					</table>

				</div>

				<?php } ?>

			</div>

			<div style="position:absolute; left:50%;top:15px;">

				<div class="well" style="margin:0px !important;padding:10px !important;">

					<table style="width:100%;border-bottom:1px solid #25387d !important;">

						<thead>

							<tr>

								<td colspan=2 style="margin:10px!important; padding:0px !important;padding-bottom:15px !important;font-size:15px !important;border-bottom: 1px dotted #25387d !important;color:#25387d !important;"><?php echo lang('personal_information'); ?></td>

							</tr>

						</thead>

						<tbody>

							<?php

								$key = array('name', 'surname', 'email', 'phone', 'address', 'postcode', 'country', 'city', 'nationality', 'id_or_passport', 'number_of_document');

								$i=0;

								foreach($clients as $ckey=>$cvalue){

								?>

								<tr>

									<td style="<?php echo ($i == 0)?'padding-top:15px;':''; ?>color:#25387d !important;"><?php $lang_key = $key[$i]; echo lang($key[$i]); ?>:</td>

									<td style="<?php echo ($i == 0)?'padding-top:15px;':''; ?>"><?php echo (($ckey == 'dni_passport')?lang('dni_'.$cvalue):$cvalue); ?></td>

								</tr>

								<?php

								$i++;

								}

							?>

						</tbody>

					</table>

				</div>

				<?php 

				$payment_status = '';

				switch($bookings['book_status']) {

					case 'completed':

						$payment_status = lang('completed');

						break;

					case 'pending':

						$payment_status = lang('pending');

						break;

					case 'cash':

						$payment_status = lang('cash_payment');

						break;

					case 'paid':

						$payment_status = lang('pre_paid');

						break;		

				}

				?>

				<div class="well" style="margin:0px !important;padding:10px !important;position:relative;top:25px;">

					<table style="width:100%;background-color:#DFDFDF;">

						<thead>

							<tr>

								<td colspan=2 style="margin:10px!important; padding:0px !important;padding-bottom:10px !important;padding-top:10px !important;font-size:15px !important;color:#25387d;"><span style="font-size:18px;color:#25387d !important;font-weight:bold;padding-left:10px;color:#25387d;"><?php echo lang('price').'  <span style="color:#25387d !important;font-weight:normal;">('.$payment_status.')</span>'; ?></span>	</td>

								<td style="padding-top:10px !important;padding-bottom:10px !important;">

								<span style="color:#25387d !important;font-weight:bold;text-align:right;font-size:15px !important;"><?php echo $bookings['price']; ?>&nbsp;&euro;</span>	

								</td>

							</tr>

						</thead>

					</table>

				</div>

				

			</div>

		</div>

		<?php

		$style = '';

		if(count($extra_array) == 0 && !$bookings['promotional_code_id']) {

			$style= "margin-top:200px;";

		} else if(count($extra_array) == 0 && $bookings['promotional_code_id']) {

			$style= "margin-top:160px;";

		} else if(count($extra_array) == 1 && !$bookings['promotional_code_id']) {

			$style= "margin-top:90px;";

		} else if(count($extra_array) == 2 && !$bookings['promotional_code_id']) {

			$style= "margin-top:70px;";

		} else if(count($extra_array) == 1 && $bookings['promotional_code_id']) {

			$style= "margin-top:50px;";

		} else if(count($extra_array) == 2 && $bookings['promotional_code_id']) {

			$style= "margin-top:40px;";

		}

		?>

		<table style="<?php echo $style; ?>padding-left:10px !important;">

			<tr>

				<td>

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

											<span style="color:#fff !important;font-size:12px !important;"> Pick’n Go is a shared shuttle service. (Keep it simple. Who cares if it's minivan or minibus?)</span>

										</td>

										<td style="background-color:#25387d;width:22%;padding:10px;">

											<span style="color:#fff !important;font-size:12px !important;">All our drivers hold a sign with Pick'n Go logo. They all wear blue jeans and colorful converse shoes</span>	

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

											<span style="color:#fff !important;font-size:12px !important;"> Pick'n es un servicio de transporte compartido. (Asi de simple. Que importa si es un minivan o microbús?)</span>

										</td>

										<td style="background-color:#25387d;width:22%;padding:10px;">

											<span style="color:#fff !important;font-size:12px !important;">Todos nuestros conductores llevan un distintivo con el logo de Pick'n Go Todos usan jeans azul y converse de colores</span>	

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
                
                 <p>Pick'n Go is an independent company that serves hotels and individuals in Barcelona. Pick'n Go does not belong to any hotel and its activity is totally external.</p>

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

				<p>Por favor esten listos con 10 minutos de antelacion. Pick'n Go dispondrá un margen de 30 minutos, desde la hora de su reserva, para recogerle, normalmente recogemos a otros pasajeros en el mismo trayecto. Por favor tenga paciencia, SIEMPRE llegamos.</p>

				<p>En caso de que vengamos  a buscarle y usted no esté listo tendrá 5 minutos extras o de lo contrario nuestros conductors se iran. En ese caso no nos haremos responsables de cualquier gasto extra que pudiera tener. </p>
                
               <p>Pick'n Go es una empresa independiente que da servicio a hoteles y particulares en Barcelona. Pick'n Go no pertenece a ningún hotel y su actividad es totalemnte externa.</p>

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

