<?php
	$this->load->view('header');
  $extra_array = json_decode($bookings['extra_array'], true);	
?>

<html>

     <head>

	   <style>

	   /*

 * Row with equal height columns

 * --------------------------------------------------

 */

.row-eq-height {

  display: -webkit-box;

  display: -webkit-flex;

  display: -ms-flexbox;

  display:         flex;

}

		td{

			border:none !important;

			line-height: 1.42857;

			padding-bottom:5px;

			vertical-align: top;

			font-size:15px !important;

		}

		.well {

			border:1px dotted #4577d8;

			padding: 19px;

			margin-bottom: 20px;

		}

		body {

			font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;

			line-height: normal;

			font-size: 12px;

			color: #4577d8;

		}

		/* columns of same height styles */

		.row-full-height {

		  height: 100%;

		}

		.col-full-height {

		  height: 100%;

		  vertical-align: middle;

		}

		.row-same-height {

		  display: table;

		  width: 100%;

		  /* fix overflow */

		  table-layout: fixed;

		}

		.col-xs-height {

		  display: table-cell;

		  float: none !important;

		}

		@media (min-width: 768px) {

		  .col-sm-height {

			display: table-cell;

			float: none !important;

		  }

		}

		@media (min-width: 992px) {

		  .col-sm-height {

			display: table-cell;

			float: none !important;

		  }

		}

		@media (min-width: 1200px) {

		  .col-sm-height {

			display: table-cell;

			float: none !important;

		  }

		}
		.row-content {
	  	margin-top: 15px;
	  }

		@media (max-width: 767px) {
		  .right-span {
		  	text-align: left !important;
		  	padding-left: 10px;
		  }
		  .book-info-left {
		  	width: 100%;
		  }
		  .book-info-right {
		  	width: 100%;
		  	margin-top: 10px;
		  }
		  .promo-text {
		  	padding-left: 0px !important;
		  	padding-right: 5px !important;
		  }
		  .go-text {
		  	padding-right: 0px !important;
		  }
		  .row-content {
		  	margin-top: 10px !important;
		  }
		  .row-same-height .col-sm-height {
		  	width:100% !important;
		  }
		}

	</style>

	</head>

	<body style="background:#fff;">

	<div class="container" id="reserva01" style="padding:1% 10%;">

		<div class="row" style="margin-top:0px!important;">

			<div class="col-sm-12">

				<div class="col-sm-6 book-info-left" style="height:50px;background-color:#25387d;display: table;">

					<span style="font-size:18px;padding-left:10px;color:#fff;vertical-align:middle;display: table-cell;font-weight:bold;"><?php echo lang('booking_information'); ?></span></span>

				</div>

				<div class="col-sm-6 book-info-right" style="height:50px;background-color:#25387d;color:#fff;display: table;font-weight:bold;">

					<span class="right-span" style="font-size:18px;padding-right:10px;color:#fff;vertical-align:middle;display: table-cell;text-align:right;font-weight:bold;"><?php echo lang('no_reference').': <span style="font-weight:bold;">'.$book_reference; ?></span></span>

					<?php /*if($bookings['book_role'] == 2){ ?>

						<span style="font-size: 18px !important;color:#fff;vertical-align:middle;display: table-cell;"><?php echo lang('collaborator_name').': '.$bookings['collaborator_name']; ?></span>

					<?php } */ ?>

				</div>

			</div>

		</div>

		<div class="row row-content">

			<div class="col-sm-12">

				<div class="col-sm-6 book-info-left" style="height:50px;background-color:#f5f5f5;display: table;">

					<span style="font-size:22px;padding-left:10px;color:#25387d;vertical-align:middle;display: table-cell;font-weight:bold;"><?php echo $clients['name']; ?></span></span>

				</div>

				<div class="col-sm-6 book-info-right" style="height:50px;background-color:#f5f5f5;color:#fff;display: table;">

					<span class="right-span" style="font-size:18px;padding-right:10px;color:#25387d;vertical-align:middle;display: table-cell;text-align:right;"><?php echo $clients['email']; ?></span></span>

				</div>

			</div>

		</div>

		<div class="row row-content">

			<div class="col-sm-12">

				<div class="col-sm-6 book-info-left" style="height:50px;background-color:#f5f5f5;display: table;">

					<span style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;display: table-cell;font-weight:bold;"><?php echo '<span>'. lang('passengers') .'</span>'. ': <span style="font-weight:normal;">'. $bookings['adults'] . '</span>'; ?></span></span>

				</div>

				<div class="col-sm-6 book-info-right" style="height:50px;background-color:#f5f5f5;color:#fff;display: table;">

					

				</div>

			</div>

		</div>



		<div class="row row-content">

			<div class="col-sm-12">

				<div class="col-sm-6 book-info-left go-text" style="padding-left: 0px;padding-right: 5px;">
					<div class="col-sm-12" style="background-color:#f5f5f5;">
						<p style="font-size:22px;padding-left:10px;padding-top:20px;color:#EA5B55;vertical-align:middle;font-weight:bold;text-transform:uppercase;"><?php echo lang('go'); ?></p>	

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
					

				</div>
				<?php

				if(isset($return_bookings)){

				?>
				<div class="col-sm-6 book-info-right go-text" style="padding-right: 0px;padding-left: 5px;">
					<div class="col-sm-12" style="background-color:#f5f5f5;">
						<p style="font-size:22px;padding-left:10px;padding-top:20px;color:#EA5B55;vertical-align:middle;font-weight:bold;text-transform:uppercase;"><?php echo lang('back'); ?></p>	

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
					

				</div>
				<?php } ?>
			</div>

		</div>
		<?php
			if(count($extra_array) > 0) {
				$extra_value = array_column($extra_array, 'extra_value');
				$sum_extra = array_sum($extra_value);
			} else {
				$sum_extra = 0;
			}
		?>

		<div class="row row-content">

			<div class="col-sm-12">
				<div class="col-sm-6" style="padding-left: 0px;padding-right: 5px;">
					<div class="col-sm-12 book-info-left" style="height:50px;background-color:#f5f5f5;display: table;">

						<span style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;display: table-cell;font-weight:bold;"><?php echo '<span>'. lang('extra_luggage') .'</span>'. ': <span style="font-weight:normal;">'. $sum_extra . '&nbsp;&euro;</span>'; ?></span></span>

					</div>
				</div>

				<div class="col-sm-6 book-info-right promo-text" style="padding-right: 0px;padding-left: 5px;">
					<div class="col-sm-6 book-info-right" style="height:50px;background-color:#f5f5f5;color:#fff;display: table;">
						<span class="right-span" style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;display: table-cell;font-weight:bold;">Promotional code:  <span style="font-weight:normal;"><?php echo $bookings['promotional_code_id']?$bookings['reduction_value'] : 0; ?>&nbsp;&euro;</span></span>
						
					</div>
					<div class="col-sm-6 book-info-right" style="height:50px;background-color:#25387d;color:#fff;display: table;">
						<span style="font-size:18px;padding-left:10px;color:#fff;vertical-align:middle;display: table-cell;text-align:center;text-transform:uppercase;"><?php echo lang('total') . ' '. lang('price') . ':  ' . $bookings['price']; ?>&nbsp;&euro;</span></span>
					</div>
				</div>

			</div>

		</div>


		<div class="row" style="margin-top:20px;">

			<div class="col-sm-12">

				<h3 style="font-weight:bold;"><?php echo strtoupper(lang('important_information')); ?><h3>

			</div>

			<?php if($lang == 'en') { ?>

			<div class="col-sm-12 row-same-height">

				<div class="col-sm-height" style="width:22%;background-color:#4577d8;">

					<div style="padding:10px;">

						<span style="color:#fff;font-size:16px !important;">Shuttleing is a shared shuttle service. (Keep it simple. Who cares if it's minivan or minibus?)</span>

					</div>

				</div>

				<div class="col-sm-height" style="width:22%;background-color:#25387d;">

					<div style="padding:10px;">

						<span style="color:#fff;font-size:16px !important;">All our drivers hold a sign with shuttleing logo. They all wear blue jeans and colorful converse shoes</span>

					</div>

				</div>

				<div class="col-sm-height" style="width:28%;background-color:#4577d8;">

					<div style="padding:10px;">

						<span style="color:#fff;font-size:16px !important;">All our vans have logo on doors (is it necessary to explain the car- exceptions? You will let them know if that's the case, right?)</span>

					</div>	

				</div>

				<div class="col-sm-height" style="width:18%;background-color:#25387d;">

					<div style="padding:10px;">

						<span style="color:#fff;font-size:16px !important;">Check the map below to locate our vehicles at the exit of the terminal</span>

					</div>	

				</div>

				<div class="col-sm-height" style="width:18%;background-color:#4577d8;">

					<div style="padding:10px;">

						<span style="color:#fff;font-size:16px !important;">It is strictly forbidden to get off the vehicle until final destination.</span>

					</div>	

				</div>

			</div>

			<?php } else { ?>

			<div class="col-sm-12 row-same-height">

				<div class="col-sm-height" style="width:22%;background-color:#4577d8;">

					<div style="padding:10px;">

						<span style="color:#fff;font-size:16px !important;">shuttleing es un servicio de transporte compartido. (Asi de simple. Que importa si es un minivan o microbús?)</span>

					</div>

				</div>

				<div class="col-sm-height" style="width:22%;background-color:#25387d;">

					<div style="padding:10px;">

						<span style="color:#fff;font-size:16px !important;">Todos nuestros conductores llevan un distintivo con el logo de shuttleing Todos usan jeans azul y converse de colores</span>

					</div>

				</div>

				<div class="col-sm-height" style="width:28%;background-color:#4577d8;">

					<div style="padding:10px;">

						<span style="color:#fff;font-size:16px !important;">Todos nuestros vehículos tienen logotipo en las puertas (¿es necesario explicar las excepciones de coche? Nos lo hareis saber si es necesario, no?)</span>

					</div>	

				</div>

				<div class="col-sm-height" style="width:18%;background-color:#25387d;">

					<div style="padding:10px;">

						<span style="color:#fff;font-size:16px !important;">Comprobar el mapa para localizar nuestros vehículos a la salida de la terminal</span>

					</div>	

				</div>

				<div class="col-sm-height" style="width:18%;background-color:#4577d8;">

					<div style="padding:10px;">

						<span style="color:#fff;font-size:16px !important;">Está estrictamente prohibido bajarse del vehículo hasta llegar a su destino.</span>

					</div>	

				</div>

			</div>

			<?php } ?>

		</div>

		<div class="row" style="margin-top:0px;">

			<div class="col-sm-12">

				<p style="text-align:justify;padding-top:10px;">

					<?php echo lang('query_booking'); ?>

				</p>

			</div>	

		</div>

		<div class="row" style="margin-top:20px;">

			<div class="col-sm-6">

				<img src="<?php echo IMAGEPATH.'/Terminal-1.jpg'; ?>" style="margin:0px!important;padding:0px!important;margin-bottom:15px!important;width:100%;">

			</div>	
			<div class="col-sm-6">

				<img src="<?php echo IMAGEPATH.'/Terminal-2.jpg'; ?>" style="margin:0px!important;padding:0px!important;margin-bottom:15px!important;width:100%;">

			</div>	

		</div>

		<div class="row" style="margin-top:0px;">

			<div class="col-sm-12">

				<h4 style="font-weight:normal;color:#25387d;">BOOKING TERMS & CONDITIONS<h4>

			</div>	

		</div>

		<?php if($lang == 'en') { ?>

		<div class="row" style="font-size:14px;">

			<div class="col-sm-12">

				<div class="row" style="">

					<div class="col-sm-12">

						<p style="font-weight:bold;font-size:16px;">Airport pick-up</p>

						<p>Our hostess will be waiting for you at arrivals lounge, holding a board with your name. If you can’t find her, please call to our airport assistance number +34628 000 785 (9.00am-22.00pm) or +34646 401 942 (24hs)</p>

						<p>Once you meet our staff, you may be waiting up to 30 minutes. Please understand it’s a shared van and we need to accommodate other passengers.</p>

						<p>If your flight is delayed, don’t worry! We check all the timings and we wait for you. </p>

						<p>We reserve the right for pick-ups on flights arriving at 23hr that have a 2 hour delay or more. </p>

					</div>	

				</div>

				<div class="row" style="">

					<div class="col-sm-12">

						<p style="font-weight:bold;font-size:16px;">Hotel / other pick-up</p>

						<p>Please be ready 10 minutes beforehand. We may take up to 30 minutes to pick you up from the time you designate, as we normally pick up other passengers in the same ride. Please be patient as we ALWAYS deliver. </p>

						<p>In case we come pick you and you’re not ready you will have 5 extra minutes to show up, otherwise our drivers will leave you. No expenses will be covered.</p>
                        
                        <p>Shuttleing is an independent company that serves hotels and individuals in Barcelona. Shuttleing does not belong to any hotel and its activity is totally external.</p>

					</div>	

				</div>

				<div class="row" style="">

					<div class="col-sm-12">

						<p style="font-weight:bold;font-size:16px;">CANCELLATION POLICY</p>

						<p>No fees for cancellation up to 24hours prior the start time of service.</p>

						<p>100% of the total price of the service, when the cancellation occurs less than 24hrs prior the service or the passenger does not appear.</p>

					</div>	

				</div>

			</div>

		</div>	

		<?php } else { ?>

		<div class="row" style="font-size:14px;">

			<div class="col-sm-12">

				<div class="row" style="">

					<div class="col-sm-12">

						<p style="font-weight:bold;font-size:16px;">Recogida en el aeropuerto</p>

						<p>Nuestra hostes le estará esperando en la puerta de llegadas, sosteniendo  una tablet con su nombre. Si no puede encontrarla, por favor llame a nuestro número de asistencia en aeropuerto +34628 000 785 (9:00-10:00) o al +34646 401 942 (24 hs)</p>

						<p>Una vez que usted este con nuestro personal,  puede que tenga que  esperar hasta 30 minutos. Por favor, comprenda que es una furgoneta compartida y necesitamos dar cabida a otros pasajeros. </p>

						<p>Si su vuelo se retrasa, no se preocupe! Comprobamos todos los horarios y sus modificaciones  y le esperamos!!</p>

						<p>En vuelos con llegadas a partir de las 23h y que tengan un retraso de 2 horas o más, nos reservamos el derecho de realizar el servicio.</p>

					</div>	

				</div>

				<div class="row" style="">

					<div class="col-sm-12">

						<p style="font-weight:bold;font-size:16px;">Hotel / otros Pick-up</p>

						<p>Por favor esten listos con 10 minutos de antelacion. Shuttleing dispondrá un margen de 30 minutos, desde la hora de su reserva, para recogerle, normalmente recogemos a otros pasajeros en el mismo trayecto. Por favor tenga paciencia, SIEMPRE llegamos.</p>

						<p>En caso de que vengamos  a buscarle y usted no esté listo tendrá 5 minutos extras o de lo contrario nuestros conductors se iran. En ese caso no nos haremos responsables de cualquier gasto extra que pudiera tener. </p>
                        
                       <p>Shuttleing es una empresa independiente que da servicio a hoteles y particulares en Barcelona. Shuttleing no pertenece a ningún hotel y su actividad es totalemnte externa.</p>

					</div>	

				</div>

				<div class="row" style="">

					<div class="col-sm-12">

						<p style="font-weight:bold;font-size:16px;">POLITICA DE CANCELACION</p>

						<p>No se cobrara el recargo de los servicios cuando se cancele con 24hrs de antelacion al servicio.</p>

						<p>Se cobrara el 100% del servicios cuando la cancelacion sea inferior a 24hrs o los pasajeros no aparezcan</p>

					</div>	

				</div>

			</div>

		</div>		

		<?php } ?>

	</div>

	<?php $this->load->view('footer'); ?>	

	<script>

	function Function(){

		var e = $('#reserva01').clone();

		$('button.print', e).remove();

		

		var content = e.html();

		var printWindow = window.open('', '', 'height=400,width=800');

			printWindow.document.write('<html><head><title>DIV Contents</title>');

				   printWindow.document.write('<style>'+

		'td{'+

			'border:none !important;'+

			'padding-bottom:5px;'+

			'line-height: 1.42857;'+

			'vertical-align: top;'+

			'font-size:12px !important;'+

		'}'+

		'.well {'+

			'border:1px dotted #88758d;'+

			'padding: 19px;'+

			'margin-bottom: 20px;'+

		'}'+

		'body {'+

			'font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;'+

			'line-height: normal;'+

			'font-size: 12px;'+

			'color: #58385f;'+

		'}'+

	'</style>')



			printWindow.document.write('</head><body>');

            printWindow.document.write(content);

			

			printWindow.document.write('</body></html>');

			printWindow.document.close();

			

            

            printWindow.document.close();

            printWindow.print();

	}

	</script>

	

	</body>

</html>

