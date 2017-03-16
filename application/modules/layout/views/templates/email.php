<?php
	$extra_array = json_decode($bookings['extra_array'], true);	
?>
<html>

     <head>

        <title>Shuttle</title>

	</head>

	

	<body style="font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;line-height: normal;font-size: 12px;color: #25387d;">

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

		<img src="<?php echo $lang=='en'? IMAGEPATH.'header_english.png':IMAGEPATH.'header_spanish.png'; ?>" width="750" style="width:750px; margin:0px!important;padding:0px!important;">

        <p style="margin:0px;height:10px !important;">&nbsp;</p><p style="margin:0px;height:10px !important;">&nbsp;</p>

		<table width="750" style="margin:0px!important;width:750px;background-color: #25387d">

			<tbody>

				<tr style="padding: 19px;margin-bottom: 20px;">

					<td style="width:350px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;">

						<span style="padding:10px;padding-right:0px;font-size:13px;font-weight:bold;color:#fff;padding-left:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('booking_information'); ?></span>

					</td>

                    <td style="width:350px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;text-align:right !important;padding-right:10px !important;">
                        
                        <span class="right-span" style="padding:10px;padding-right:0px;font-size:13px;font-weight:bold;color:#fff;padding-left:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('no_reference').':&nbsp;<span style="padding:10px;padding-left:0px;font-size:13px;font-weight:bold;color:#fff;">'.$book_reference; ?></span>


					</td>

				</tr>

			</tbody>

		</table>

        <table width="750" style="margin:0px!important;width:750px;background-color: #f5f5f5;margin-top:10px !important;">

            <tbody>

                <tr style="padding: 19px;margin-bottom: 20px;">

                    <td style="width:350px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;">

                        <span style="padding:10px !important;padding-right:0px !important;font-size:13px !important;font-weight:bold !important;color:#25387d !important;padding-left:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $clients['name']; ?></span>

                    </td>

                    <td style="width:350px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;text-align:right !important;padding-right:20px !important;">
                        
                        <span class="right-span" style="padding:10px !important;padding-right:0px !important;font-size:13px !important;color:#25387d !important;padding-left:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $clients['email']; ?></span>


                    </td>

                </tr>

            </tbody>

        </table>

        <table width="750" style="margin:0px!important;width:750px;background-color: #f5f5f5;margin-top:10px !important;">

            <tbody>

                <tr style="padding: 19px;margin-bottom: 20px;">

                    <td style="width:350px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;">

                        <span style="padding:10px !important;padding-right:0px !important;font-size:13px !important;font-weight:bold !important;color:#25387d !important;padding-left:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('passengers'); ?>: </span style="font-weight:normal !important;"><span> <?php echo $bookings['adults']; ?></span>

                    </td>

                </tr>

            </tbody>

        </table>

        <table width="750" style="margin:0px!important;width:750px;margin-top:10px !important;">

            <tbody>

                <tr style="margin-bottom: 20px;">

                    <td style="width:342px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important;background-color:#f5f5f5;">
                        

                    <p style="font-size:22px;padding-left:10px !important;color:#EA5B55 !important;vertical-align:middle !important;font-weight:bold !important;text-transform:uppercase !important;"><?php echo lang('go'); ?></p>

                       <p>
                            <span style="font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:middle !important;font-weight:bold !important;"><?php echo lang('from'); ?>:</span>  <span style="font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo $bookings['start_from']; ?></span>
                        </p>

                        <p>
                            <span style="font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:middle !important;font-weight:bold !important;"><?php echo lang('to'); ?>:</span>  <span style="font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo $bookings['end_at']; ?></span>
                        </p>

                        <p style="padding-bottom:20px;">
                            <span style="font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:middle !important;font-weight:bold !important;"><?php echo lang('date'); ?>:</span>  <span style="font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo date('d/m/Y - H:i', strtotime($bookings['start_journey'] . ' ' . $bookings['hour'])); ?>h</span>
                        </p>
                        
                    </td>
                    <td style="width:6px;"></td>
                    <td style="width:342px !important;padding-top:10px !important;padding-bottom:10px !important;vertical-align:top !important; <?php echo isset($return_bookings) ? 'background-color:#f5f5f5;': ''; ?>">
                    <?php

                if(isset($return_bookings)){

                ?>
                    
                        <p style="font-size:22px !important;padding-left:10px !important;color:#EA5B55 !important;vertical-align:middle !important;font-weight:bold !important;text-transform:uppercase !important;"><?php echo lang('back'); ?></p> 

                        <p>
                            <span style="font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:middle !important;font-weight:bold !important;"><?php echo lang('from'); ?>:</span>  <span style="font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo $bookings['end_at']; ?></span>
                        </p>

                        <p>
                            <span style="font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:middle !important;font-weight:bold !important;"><?php echo lang('to'); ?>:</span>  <span style="font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo $bookings['start_from']; ?></span>
                        </p>

                        <p style="padding-bottom:20px !important;">
                            <span style="font-size:13px !important;padding-left:10px !important;color:#25387d !important;vertical-align:middle !important;font-weight:bold !important;"><?php echo lang('date'); ?>:</span>  <span style="font-size:13px !important;color:#25387d !important;vertical-align:middle !important;"><?php echo date('d/m/Y - H:i', strtotime($return_bookings['start_journey'] . ' ' . $bookings['hour'])); ?>h</span>
                        </p>
                    
                    <?php } ?>
                    </td>

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

        <table width="750" style="margin:0px!important;width:750px;margin-top:10px !important;">

            <tbody>

                <tr style="margin-bottom: 20px;">

                    <td style="width:342px;padding-top:10px !important;padding-bottom:10px !important;vertical-align:middle !important;background-color:#f5f5f5;">

                        <span style="padding:10px !important;padding-right:0px !important;font-size:13px !important;font-weight:bold !important;color:#25387d !important;padding-left:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('extra_luggage'); ?>: </span style="font-weight:normal;"><span> <?php echo $sum_extra; ?>&nbsp;&euro;</span>

                    </td>
                    <td style="width:6px;"></td>
                    <td style="width:342px;vertical-align:top !important;background-color:#f5f5f5;">
                        
                       <table style="padding:0px !important;">
                        <tbody>
                            <tr>
                                <td style="width:170px;background-color:#f5f5f5;padding-top:10px !important;padding-bottom:10px !important;">

                                    <p style="padding-right:0px !important;font-size:13px !important;font-weight:bold !important;color:#25387d !important;padding-left:0px !important;margin-top: 4px !important;margin-bottom:0px !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Promotional code: '; ?><span style="font-weight:normal !important;vertical-align:middle !important;"> <?php echo $bookings['promotional_code_id']?$bookings['reduction_value'] : 0; ?>&nbsp;&euro;</span></p>
                                </td>

                                <td style="width:190px;text-transform:uppercase;background-color: #25387d;text-align:center !important;vertical-align:middle !important;">
                                    <p style="font-size:13px !important;font-weight:bold !important;color:#fff !important;padding-left:0px !important;background-color: #25387d;transform:uppercase !important;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('total') . ' '. lang('price') . ':  ' . $bookings['price']; ?>&nbsp;&euro;</p>
                                </td>
                            </tr>
                        </tbody>

                       </table>


                    </td>

                </tr>

            </tbody>

        </table>
		

		<table cellpadding="0" cellspacing="0" style="width:750px;" width="750">

            <tbody>

                <tr>

                    <td style="font-size:20px !important;color:#25387d;font-weight: bold;" width="750">

                        <p style="margin:0px !important;">&nbsp;</p>

                        <p style="margin-bottom:10px;"><?php echo strtoupper(lang('important_information')); ?></p>

                    </td>

                </tr>

                <tr>

                    <td width="750">

                        <table style="border: 0px;" cellpadding=0 cellspacing=0>

                            <tr style="background-color: #25387d;">

                                <?php if($lang == 'en') { ?>

                                <td bgcolor="#4577d8" style="color: #fff;"><table style="width:100%;" cellpadding="10" cellspacing="5" ><tr><td style="color: #fff;">Shuttleing is a shared shuttle service. (Keep it simple. Who cares if it's minivan or minibus?).</td></tr></table></td>

                                <td style="color: #fff;background-color: #25387d;"><table style="width:100%;" cellpadding="10" cellspacing="5"><tr><td style="color: #fff;">All our drivers hold a sign with shuttleing logo. They all wear blue jeans and colorful converse shoes.</td></tr></table></td>

                                <td bgcolor="#4577d8" style="color: #fff;"><table style="width:100%;" cellpadding="10" cellspacing="5"><tr><td style="color: #fff;">All our vans have logo on doors (is it necessary to explain the car- exceptions? You will let them know if that's the case, right?).</td></tr></table></td>

                                <td style="color: #fff;background-color: #25387d;"><table style="width:100%;" cellpadding="10" cellspacing="5"><tr><td style="color: #fff;">Check the map below to locate our vehicles at the exit of the terminal.</td></tr></table></td>

                                <td bgcolor="#4577d8" style="color: #fff;"><table style="width:100%;" cellpadding="10" cellspacing="5"><tr><td style="color: #fff;">It is strictly forbidden to get off the vehicle until final destination.</td></tr></table></td>

                                <?php } else { ?>

                                <td bgcolor="#4577d8" style="color: #fff;"><table style="width:100%;" cellpadding="10" cellspacing="5"><tr><td style="color: #fff;">Shuttleing es un servicio de transporte compartido. (Asi de simple. Que importa si es un minivan o microbús?)</td></tr></table></td>

                                <td style="color: #fff;background-color: #25387d;"><table style="width:100%;" cellpadding="10" cellspacing="5"><tr><td style="color: #fff;">Todos nuestros conductores llevan un distintivo con el logo de shuttleing Todos usan jeans azul y converse de colores</td></tr></table></td>

                                <td bgcolor="#4577d8" style="color: #fff;"><table style="width:100%;" cellpadding="10" cellspacing="5"><tr><td style="color: #fff;">Todos nuestros vehículos tienen logotipo en las puertas (¿es necesario explicar las excepciones de coche? Nos lo hareis saber si es necesario, no?)</td></tr></table></td>

                                <td style="color: #fff;background-color: #25387d;"><table style="width:100%;" cellpadding="10" cellspacing="5"><tr><td style="color: #fff;">Comprobar el mapa para localizar nuestros vehículos a la salida de la terminal</td></tr></table></td>

                                <td bgcolor="#4577d8" style="color: #fff;"><table style="width:100%;" cellpadding="10" cellspacing="5"><tr><td style="color: #fff;">Está estrictamente prohibido bajarse del vehículo hasta llegar a su destino.</td></tr></table></td>

                                <?php } ?>

                            </tr>

                        </table>

                    </td>

                </tr>

                <tr><td><p style="border-bottom:1px dotted #25387d;margin:0px !important;">&nbsp;</p></td></tr>

            </tbody>

		</table>

		<table width="750">

            <tr>

                <td width="750">

                    <p style="text-align:justify;color:#25387d;margin-top:2px !important;">

                        <?php echo lang('query_booking'); ?>

                    </p>

                    <p>&nbsp;</p>

                </td>

            </tr>

            <tr>

                <td width="750" style="width:750px;">

                    <img src="<?php echo IMAGEPATH.'Terminal-1.jpg'; ?>" style="margin:0px!important;padding:0px!important;padding-top:10px;width:360px;" width="360">
										
										<img src="<?php echo IMAGEPATH.'Terminal-2.jpg'; ?>" style="margin:0px!important;padding:0px!important;padding-top:10px;width:360px;" width="360">

                </td>

            </tr>



		<?php if($lang == 'en') { ?>

            <tr>

                <td style="width:750" width="750">

                    <table>

                        <tr>

                            <td style="width:750px" width="750">

                                <table>

                                    <tr>

                                        <td>

                                            <p style="font-weight:bold;color:#25387d;padding-top:10px;margin:0px;">BOOKING TERMS & CONDITIONS</p>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="font-weight:bold;color:#25387d;margin:0px;">Airport pick-up</p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="color:#25387d;margin:0px;">Our hostess will be waiting for you at arrivals lounge, holding a board with your name. If you can’t find her, please call to our airport assistance number +34628 000 785 (9.00am-22.00pm) or +34646 401 942 (24hs).</p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="color:#25387d;margin:0px;">Once you meet our staff, you may be waiting up from 30 minutes. Please understand it’s a shared van and we need to accommodate other passengers.</p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="color:#25387d;margin:0px;">If your flight is delayed, don’t worry! We check all the timings and we wait for you. </p>

											<p style="margin:0px;height:10px !important;">&nbsp;</p>

											<p style="color:#25387d;margin:0px;">We reserve the right for pick-ups on flights arriving at 23hr that have a 2 hour delay or more. </p>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="margin:0px;font-weight:bold;color:#25387d;">Hotel / other pick-up</p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="margin:0px;color:#25387d;">Please be ready 10 minutes beforehand. We may take up to 30 minutes to pick you up from the time you designate, as we normally pick up other passengers in the same ride. Please be patient as we ALWAYS deliver. </p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="margin:0px;color:#25387d;">In case we come pick you and you’re not ready you will have 5 extra minutes to show up, otherwise our drivers will leave you. No expenses will be covered.</p>
                                            
                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>
                                            
                                            <p style="margin:0px;color:#25387d;">Shuttleing is an independent company that serves hotels and individuals in Barcelona. Shuttleing does not belong to any hotel and its activity is totally external.</p>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td><p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="margin:0px;font-weight:bold;color:#25387d;">CANCELLATION POLICY</p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="margin:0px;color:#25387d;">No fees for cancellation up to 24hours prior the start time of service.</p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p width="375" style="margin:0px;color:#25387d;">100% of the total price of the service, when the cancellation occurs less than 24hrs prior the service or the passenger does not appear.</p>

                                        </td>

                                    </tr>

                                </table>

                            </td>

                        </tr>

                    </table>

                </td>

            </tr>

		<?php } else { ?>

            <tr>

                <td style="width:750" width="750">

                    <table>

                        <tr>

                            <td style="width:750px" width="750">

                                <table>

                                    <tr>

                                        <td>

                                            <p style="font-weight:bold;color:#25387d;padding-top:10px;margin:0px;">BOOKING TERMS & CONDITIONS</p>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="font-weight:bold;color:#25387d;margin:0px;">Recogida en el aeropuerto</p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="color:#25387d;margin:0px;">Nuestra hostes le estará esperando en la puerta de llegadas, sosteniendo  una tablet con su nombre. Si no puede encontrarla, por favor llame a nuestro número de asistencia en aeropuerto +34628 000 785 (9:00-10:00) o al +34646 401 942 (24 hs)</p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="color:#25387d;margin:0px;">Una vez que usted este con nuestro personal,  puede que tenga que  esperar hasta 30 minutos. Por favor, comprenda que es una furgoneta compartida y necesitamos dar cabida a otros pasajeros. </p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="color:#25387d;margin:0px;">Si su vuelo se retrasa, no se preocupe! Comprobamos todos los horarios y sus modificaciones  y le esperamos!!</p>

											<p style="margin:0px;height:10px !important;">&nbsp;</p>

											<p style="color:#25387d;margin:0px;">En vuelos con llegadas a partir de las 23h y que tengan un retraso de 2 horas o más, nos reservamos el derecho de realizar el servicio.</p>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="margin:0px;font-weight:bold;color:#25387d;">Hotel / otros Pick-up</p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="margin:0px;color:#25387d;">Por favor esten listos con 10 minutos de antelacion. Shuttleing dispondrá un margen de 30 minutos, desde la hora de su reserva, para recogerle, normalmente recogemos a otros pasajeros en el mismo trayecto. Por favor tenga paciencia, SIEMPRE llegamos.</p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="margin:0px;color:#25387d;">En caso de que vengamos  a buscarle y usted no esté listo tendrá 5 minutos extras o de lo contrario nuestros conductors se iran. En ese caso no nos haremos responsables de cualquier gasto extra que pudiera tener. </p>
                                            
                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>
                                            
                                            <p style="margin:0px;color:#25387d;">Shuttleing es una empresa independiente que da servicio a hoteles y particulares en Barcelona. Shuttleing no pertenece a ningún hotel y su actividad es totalemnte externa.</p>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td><p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="margin:0px;font-weight:bold;color:#25387d;">POLITICA DE CANCELACION</p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p style="margin:0px;color:#25387d;">No se cobrara el recargo de los servicios cuando se cancele con 24hrs de antelacion al servicio.</p>

                                            <p style="margin:0px;height:10px !important;">&nbsp;</p>

                                            <p width="375" style="margin:0px;color:#25387d;">Se cobrara el 100% del servicios cuando la cancelacion sea inferior a 24hrs o los pasajeros no aparezcan</p>

                                        </td>

                                    </tr>

                                </table>

                            </td>

                        </tr>

                    </table>

                </td>

            </tr>

		<?php } ?>

		</table>

	</body>

</html>
