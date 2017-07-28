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
		  	padding-left: 0px !important;
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

	<body>

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

				<div class="col-sm-6 book-info-left" style="height:50px;background-color:#fff;display: table;">

					<span style="font-size:22px;padding-left:10px;color:#25387d;vertical-align:middle;display: table-cell;font-weight:bold;"><?php echo $clients['name'].' '.$clients['surname']; ?></span></span>

				</div>

				<div class="col-sm-6 book-info-right" style="height:50px;background-color:#fff;color:#fff;display: table;">

					<span class="right-span" style="font-size:18px;padding-right:10px;color:#25387d;vertical-align:middle;display: table-cell;text-align:right;"><?php echo $clients['email']; ?></span></span>

				</div>

			</div>

		</div>

		<div class="row row-content">

			<div class="col-sm-12">

				<div class="col-sm-6 book-info-left" style="height:50px;background-color:#fff;display: table;">

					<span style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;display: table-cell;font-weight:bold;"><?php echo '<span>'. lang('passengers') .'</span>'. ': <span style="font-weight:normal;">'. $bookings['adults'] . '</span>'; ?></span></span>

				</div>

				<?php if ($clients['phone']) { ?>
					<div class="col-sm-6 book-info-right" style="height:50px;background-color:#fff;color:#fff;display: table;">

						<span class="right-span" style="font-size:18px;padding-right:10px;color:#25387d;vertical-align:middle;display: table-cell;text-align:right;"><?php echo '<span>'. lang('phone') .'</span>'. ': <span style="font-weight:normal;">'. $clients['phone'] . '</span>'; ?></span></span>

					</div>
				<?php } ?>

			</div>

		</div>



		<div class="row row-content">

			<div class="col-sm-12">
				<div class="row-eq-height">
				<div class="col-sm-<?php echo (isset($return_bookings)) ? '6' : '12'; ?> book-info-left go-text" style="padding-left: 0px;padding-right: 5px;">
					<div class="col-sm-12" style="background-color:#fff;padding:10px;padding-left:21px !important;">
						<p style="font-size:22px;padding-top:20px;color:#EA5B55;vertical-align:middle;font-weight:bold;text-transform:uppercase;"><?php echo lang('go'); ?></p>	

						<p>
							<span style="display:table;">
								<span  style="display:table-row;">
									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('from'); ?>:&nbsp;</span>
									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['start_from']; ?></span>
								</span>
							</span>
						</p>

						<?php if(isset($bookings['source_point']) && $bookings['source_point'] == 'start_from') { ?>
							<p>
								<span style="display:table;">
									<span  style="display:table-row;">
										<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('postal_code'); ?>:&nbsp;</span>
										<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['postal_code']; ?></span>
									</span>
								</span>
							</p>
						<?php } ?>

						<p>
							<span style="display:table;">
								<span  style="display:table-row;">
									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('to'); ?>:&nbsp;</span>
									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['end_at']; ?></span>
								</span>
							</span>
						</p>

						<?php if(isset($bookings['source_point']) && $bookings['source_point'] == 'end_at') { ?>
							<p>
								<span style="display:table;">
									<span  style="display:table-row;">
										<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('postal_code'); ?>:&nbsp;</span>
										<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['postal_code']; ?></span>
									</span>
								</span>
							</p>
						<?php } ?>

						<p style="padding-bottom:20px;">
							<span style="font-size:18px;color:#25387d;vertical-align:middle;font-weight:bold;"><?php echo lang('date'); ?>:</span>  <span style="font-size:18px;color:#25387d;vertical-align:middle;"><?php echo date('d/m/Y - H:i', strtotime($bookings['start_journey'] . ' ' . $bookings['hour'])); ?>h</span>
						</p>
						<?php if ($bookings['address']) { ?>
						<p style="padding-bottom:20px;">
							<span style="font-size:18px;color:#25387d;vertical-align:middle;font-weight:bold;"><?php echo lang('address'); ?>:</span>  <span style="font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['address']; ?></span>
						</p>
						<?php } ?>
					</div>
					

				</div>
				
				<?php

				if(isset($return_bookings)){

				?>

				<div class="col-sm-6 book-info-right go-text" style="padding-right: 0px;padding-left: 5px;">
					<div class="col-sm-12" style="background-color:#fff;padding:10px;padding-left:21px !important;height:100%;">
						<p style="font-size:22px;padding-top:20px;color:#EA5B55;vertical-align:middle;font-weight:bold;text-transform:uppercase;"><?php echo lang('back'); ?></p>	
				
						<p>
							<span style="display:table;">
								<span  style="display:table-row;">
									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('from'); ?>:&nbsp;</span>
									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['end_at']; ?></span>
								</span>
							</span>
						</p>

						<?php if(isset($bookings['source_point']) && $bookings['source_point'] == 'end_at') { ?>
							<p>
								<span style="display:table;">
									<span  style="display:table-row;">
										<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('postal_code'); ?>:&nbsp;</span>
										<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['postal_code']; ?></span>
									</span>
								</span>
							</p>
						<?php } ?>

						<p>
							<span style="display:table;">
								<span  style="display:table-row;">
									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('to'); ?>:&nbsp;</span>
									<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['start_from']; ?></span>
								</span>
							</span>
						</p>

						<?php if(isset($bookings['source_point']) && $bookings['source_point'] == 'start_from') { ?>
							<p>
								<span style="display:table;">
									<span  style="display:table-row;">
										<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:top;font-weight:bold;"><?php echo lang('postal_code'); ?>:&nbsp;</span>
										<span style="display:table-cell;font-size:18px;color:#25387d;vertical-align:middle;"><?php echo $bookings['postal_code']; ?></span>
									</span>
								</span>
							</p>
						<?php } ?>

						<p style="padding-bottom:20px;">
							<span style="font-size:18px;color:#25387d;vertical-align:middle;font-weight:bold;"><?php echo lang('date'); ?>:</span>  <span style="font-size:18px;color:#25387d;vertical-align:middle;"><?php echo date('d/m/Y - H:i', strtotime($return_bookings['start_journey'] . ' ' . $return_bookings['hour'])); ?>h</span>
						</p>

						
					</div>
					

				</div>

				<?php } ?>

				</div>
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
					<div class="col-sm-12 book-info-left" style="height:50px;background-color:#fff;display: table;">

						<span style="font-size:18px;padding-left:10px;color:#25387d;vertical-align:middle;display: table-cell;font-weight:bold;"><?php echo '<span>'. lang('extra_luggage') .'</span>'. ': <span style="font-weight:normal;">'. $sum_extra . '&nbsp;&euro;</span>'; ?></span></span>

					</div>
				</div>

				<div class="col-sm-6 book-info-right promo-text" style="padding-right: 0px;padding-left: 5px;">
					<div class="col-sm-6 book-info-right" style="height:50px;background-color:#fff;color:#fff;display: table;">
						<span class="right-span" style="font-size:18px;padding-left:5px;color:#25387d;vertical-align:middle;display: table-cell;font-weight:bold;"><?php echo lang('promotional_code'); ?>:  -<span style="font-weight:normal;"><?php echo $bookings['promotional_code_id']?$bookings['reduction_value'] : 0; ?>&nbsp;&euro;</span></span>
						
					</div>
					<div class="col-sm-6 book-info-right" style="height:50px;background-color:#25387d;color:#fff;display: table;">
						<span style="font-size:18px;padding-left:10px;color:#fff;vertical-align:middle;display: table-cell;text-align:center;text-transform:uppercase;"><?php echo lang('total') . ' '. lang('price') . ':  ' . $bookings['price']; ?>&nbsp;&euro;</span></span>
					</div>
				</div>

			</div>

		</div>

		<br/>
		<div id="#error_info" style="color:red;"></div>
		<button class="btn pull-right" id="pay_now">Pay Now</button>

		<form id="bank_form" action="" method="POST" style="display:none;">
			<input type="text" name="Ds_SignatureVersion" id="Ds_SignatureVersion" value=""/>
			<input type="text" name="Ds_MerchantParameters" id="Ds_MerchantParameters" value=""/>
			<input type="text" name="Ds_Signature" id="Ds_Signature" value="" />
		</form>

	</div>

	<?php $this->load->view('footer'); ?>	
	<script type="text/javascript">
		$(document).ready(function(){
			var id = <?php echo $bookings['id']; ?>;
			$('#pay_now').click(function(){
				$.ajax({
					method:'POST',
					url:'<?php echo site_url($this->uri->segment(1)."/payNow"); ?>',
					data : {id:id},
					success: function(result) {
						data = $.parseJSON(result);
						if (data.error){
							$('#error_info').html(data.error);
						} else {
							if(data.amt > 0) {
								$('#Ds_SignatureVersion').val(data.version);
								$('#Ds_MerchantParameters').val(data.params);
								$('#Ds_Signature').val(data.signature);
								$('#bank_form').attr('action', data.banaba_url);
								$('#bank_form').submit();
							} else {
								location.replace(siteUrl+'/success?cm='+data.book_id+'&amt='+data.amt);
							}
						}
					}
				});
			});
		});
	</script>