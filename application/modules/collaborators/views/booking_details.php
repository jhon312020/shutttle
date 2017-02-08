<?php
	$this->load->view('layout/templates/header');
?>
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

	</style>
	<div class="container" id="reserva01" style="padding:1% 10%;">

		<div class="row" style="margin-top:25px!important;">

			<div class="col-sm-12">

				<div class="col-sm-6" style="height:50px;background-color:#25387d;display: table;">

					<span style="font-size:18;padding-left:10px;color:#fff;vertical-align:middle;display: table-cell;"><?php echo lang('no_reference').': <span style="font-weight:bold;">'.$book_reference; ?></span></span>

				</div>

				<div class="col-sm-6" style="height:50px;background-color:#25387d;color:#fff;display: table;font-weight:bold;">

					<?php if($bookings['book_role'] == 2){ ?>

						<span style="font-size: 18px !important;color:#fff;vertical-align:middle;display: table-cell;"><?php echo lang('collaborator_name').': '.$bookings['collaborator_name']; ?></span>

					<?php } ?>

				</div>

			</div>

		</div>

		<div class="row" >

			<div class="col-sm-12">

				<div class="col-sm-6">

					<div style="width:100%;display: table;height:50px;border-bottom: 1px dotted #25387d !important;margin-top:10px;">

						<span style="font-size:18px !important;padding-left:10px;color:#25387d;vertical-align:middle;display: table-cell; font-weight:bold;"><?php echo lang('booking_information'); ?></span>	

					</div>

					<div>

						<table class="table" style="margin-top:10px;">

							<tbody>

								<tr>

									<td style="color:#25387d; font-weight:bold;"><?php echo lang('from'); ?>:</td>

									<td style="" colspan=3><?php echo $bookings['start_from']; ?></td>

								</tr>

								<tr>

									<td style="color:#25387d; font-weight:bold;"><?php echo lang('to'); ?>:</td>

									<td colspan=3><?php echo $bookings['end_at']; ?></td>

								</tr>

								<tr>

									<td style="color:#25387d; font-weight:bold;"><?php echo lang('date_go'); ?>:</td>

									<td><?php echo Date('d/m/Y', strtotime($bookings['start_journey'])); ?></td>

									<td style="color:#25387d; font-weight:bold;"><?php echo lang('hour_go'); ?>:</td>

									<td><?php echo Date('H:i', strtotime($bookings['hour'])).'h'; ?></td>

								</tr>

								<?php

								if(isset($return_bookings)){

								?>

								<tr>

									<td style="color:#25387d; font-weight:bold;"><?php echo lang('date_back'); ?></td>

									<td><?php echo Date('d/m/Y', strtotime($return_bookings['start_journey'])); ?>:</td>

									<td style="color:#25387d; font-weight:bold;"><?php echo lang('hour_back'); ?>:</td>

									<td><?php echo Date('H:i', strtotime($return_bookings['hour'])).'h'; ?></td>

								</tr>

								<?php } ?>

								<!-- <tr>

									<td style="color:#25387d; font-weight:bold;"><?php echo lang('country'); ?>:</td>

									<td><?php //echo $countries[$bookings['country']]; ?></td>
									<td><?php //echo $bookings['country']; ?></td>

									<td style="color:#25387d; font-weight:bold;"><?php echo lang('flight_no'); ?>:</td>

									<td><?php //echo $bookings['flight_no']; ?></td>

								</tr> -->

								<tr>

									<td style="color:#25387d; font-weight:bold;border-bottom: 1px dotted #25387d!important;"><?php echo lang('adults'); ?>:</td>

									<td style=""><?php echo $bookings['adults']; ?></td>

									<td style="color:#25387d; font-weight:bold;"><?php echo lang('kids'); ?>:</td>

									<td style="border-bottom: 1px dotted #25387d!important;"><?php echo $bookings['kids']; ?></td>

								</tr>

								<tr style="border-bottom:1px solid #25387d !important;">

									<td colspan=3 style="color:#25387d;padding-top: 15px; padding-bottom: 15px; font-weight:bold;"><?php echo lang('passengers_price'); ?>:</td>

									<td style="text-align:right;padding-top: 15px; padding-bottom: 15px;"><?php echo $bookings['passenger_price']; ?>&nbsp;&euro;</td>

								</tr>

							</tbody>

						</table>

					</div>

					<div style="width:100%;display: table;height:50px;border-bottom: 1px dotted #25387d !important;color:#25387d !important;">

						<span style="font-size:20px;padding-left:10px;vertical-align:middle;display: table-cell; font-weight:bold">Extras</span>	

					</div>

					<?php if(count($extra_array) > 0) { ?>

					<div style="width:100%;display: table;height:50px;border-bottom: 1px dotted #25387d !important;color:#25387d !important;">

						<table class="table">

							<tbody>

								<?php

								$count=1;

									foreach($extra_array as $ex) {

								?>

								<tr>

									<td style="font-size:20px !important;"><?php echo $ex['extra_name'].' (+'.$ex['extra_count'].')'; ?></td>

									<td style="text-align:right;font-size:20px !important;">+<?php echo $ex['extra_value']; ?>&nbsp;&euro;</td>

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

					<div style="width:100%;display: table;height:50px;">

						<table class="table">

							<tbody>

								<tr style="border-bottom:1px solid #391B38 !important;color:#25387d;">

									<td style="font-size:20px !important;padding-top: 15px; padding-bottom: 15px;"><?php echo ($bookings['promotional_type'] == 'price')?'Promotional code deduction price':'Promotional code deduction '.$bookings['promotional_value'].' %'; ?></td>

									<td style="font-size:20px !important;text-align:right;padding-top: 15px; padding-bottom: 15px;">-<?php echo $bookings['reduction_value']; ?>&nbsp;&euro;</td>

								</tr>

							</tbody>

						</table>	

					</div>

					<?php } ?>

				</div>

				<div class="col-sm-6">

					<div style="width:100%;display: table;height:50px;border-bottom: 1px dotted #25387d !important;margin-top:10px;">

						<span style="font-size:18px !important;padding-left:10px;color:#25387d;font-weight:bold;vertical-align:middle;display: table-cell;"><?php echo lang('personal_information'); ?></span>	

					</div>

					<div style="width:100%;">

						<table class="table" style="margin-top:10px;">

							<tbody>

								<?php

									$key = array('name', 'surname', 'email', 'phone', 'address', 'postcode', 'country', 'city', 'nationality', 'id_or_passport', 'number_of_document');

									$i=0;

									foreach($clients as $ckey=>$cvalue){

									?>

									<tr style="<?php echo ($key[$i] == 'number_of_document')?'border-bottom: 1px solid #391B38 !important;padding-bottom:10px !important;':''; ?>">

										<td style="color:#25387d;font-weight:bold;"><?php echo lang($key[$i]); ?>:</td>

										<td style=""><?php echo ($ckey == 'dni_passport')?lang('dni_'.$cvalue):$cvalue; ?></td>

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

					<div style="width:100%;">

						<div class="col-sm-6" style="display: table;height:50px;background-color:#DFDFDF;">

							<span style="vertical-align:middle;display: table-cell;font-size:20px;color:#25387d !important;font-weight:bold;padding-left:10px;color:#f58847;"><?php echo lang('price').'  <span style="color:#25387d !important;font-weight:normal;">('.$payment_status.')</span>'; ?></span>	

						</div>

						<div class="col-sm-6" style="display: table;height:50px;background-color:#DFDFDF;">

							<span style="color:#25387d !important;font-weight:bold;text-align:right;vertical-align:middle;display: table-cell;font-size:20px;"><?php echo $bookings['price']; ?>&nbsp;&euro;</span>	

						</div>

					</div>

				</div>

			</div>

		</div>	

		</div>


		

	</div>

	

<?php $this->load->view('layout/templates/footer');?>

