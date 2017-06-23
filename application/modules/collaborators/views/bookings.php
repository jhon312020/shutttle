<?php
  $this->load->view('layout/templates/header');
?>
<div class="container bodypad">
	<div class="row">
	<?php /*
		<div class="panel pickbluebgtop">
      <div class="panel-heading pickbluebg"><?php echo lang('bookings'); ?>: </div> 
			<table class="table table-striped displayTable">
				<thead>
					<tr>
						<th><?php echo lang('reference'); ?></th>
						<th><?php echo lang('name'); ?></th>
            <th><?php echo lang('hour'); ?></th>
						<th><?php echo lang('start'); ?></th>
						<th><?php echo lang('end'); ?></th>
						<th><?php echo lang('passengers'); ?></th>
						<th><?php echo lang('payment'); ?></th>
            <th><?php echo lang('price'); ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($shuttles as $shuttle) {
						$clients = false;
						$arr = array('Barcelona Airport Terminal 1', 'Barcelona Airport Terminal 2');
						if($shuttle->client_id)
							$clients = true;
						else
							$json = json_decode($shuttle->client_array,true);

						$address = $shuttle->mainaddress != '' && $shuttle->mainaddress != null ? $shuttle->mainaddress : $shuttle->col_address;
						$start_from = (in_array($shuttle->start_from, $arr))?$shuttle->start_from:$shuttle->name.' - '.$address;
						$end_at = (in_array($shuttle->end_at, $arr))?$shuttle->end_at:$shuttle->name.' - '.$address;
						if($shuttle->bcnarea_address_id != '') {
							if(!in_array($shuttle->start_from, $arr))
								$start_from = $shuttle->book_address;
							
							if(!in_array($shuttle->end_at, $arr))
								$end_at = $shuttle->book_address;
						}
					?>
					<tr>
						<td><?php echo $shuttle->reference_id.'-'.sprintf("%02d", $shuttle->id); ?></td>
						<td><?php echo $clients?$shuttle->first_name.' '.$shuttle->surname:$json['name'].' '.$json['surname']; ?></td>
						<td><?php echo date('H:i', strtotime($shuttle->hour)).'h'; ?></td>
						<td><?php echo $start_from; ?></td>
						<td><?php echo $end_at; ?></td>
						<td><?php echo $shuttle->adults + $shuttle->kids; ?></td>
						<td><?php 
							if($shuttle->book_status == 'completed')
								echo lang('online');
							else if($shuttle->book_status == 'cash')
								echo lang('cash_payment');
							else if($shuttle->book_status == 'paid')
								echo lang('pre_paid');

						 ?></td>
             <td><?php echo $shuttle->price; ?></td>
						<td>
							<a class="btn btn-lg" href="<?php echo site_url($lang.'/booking_details/' . $shuttle->id); ?>">
								<i class="glyphicon glyphicon-eye-open"></i>
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
      </div>
		</div>	 */ ?>
		<?php 
			$count = 1;
			foreach ($shuttles as $shuttle) {
					$clients = false;
					$arr = array('Barcelona Airport Terminal 1', 'Barcelona Airport Terminal 2');
					if($shuttle->client_id)
						$clients = true;
					else
						$json = json_decode($shuttle->client_array,true);

					$address = $shuttle->mainaddress != '' && $shuttle->mainaddress != null ? $shuttle->mainaddress : $shuttle->col_address;
					$start_from = (in_array($shuttle->start_from, $arr))?$shuttle->start_from:$shuttle->name.' - '.$address;
					$end_at = (in_array($shuttle->end_at, $arr))?$shuttle->end_at:$shuttle->name.' - '.$address;
					if($shuttle->bcnarea_address_id != '') {
						if(!in_array($shuttle->start_from, $arr))
							$start_from = $shuttle->book_address;
						
						if(!in_array($shuttle->end_at, $arr))
							$end_at = $shuttle->book_address;
					}

					if ($shuttle->version == 1) {
						$start_from = $shuttle->start_from;
						$end_at = $shuttle->end_at;
					}
		?>
			<div class="panel pickbluebgtop booking-panel">
				<?php if ($count == 1) { ?>
					<div class="panel-heading pickbluebg"><?php echo lang('bookings'); ?> </div>
				<?php } ?>
				<div class="panel-body">
					<div class="col-md-12 padding-left-none" style="color:#ea5b55;border-bottom:1px solid #25377d;padding-top:5px;padding-bottom:5px;">
						<b style="font-size:20px;">
						<?php 
							if ($shuttle->version == 1) {
								if ($shuttle->vehicle_name)
									echo $shuttle->vehicle_name.'-';
								echo 'SHT-'.date('dmY',strtotime($shuttle->start_journey)).'-'.sprintf("%02d", $shuttle->id);
							} else {
								echo $shuttle->reference_id.'-'.sprintf("%02d", $shuttle->id);
							}
						?>
							<span style="float:right">
								<?php echo $shuttle->price; ?> &euro;
								<span style="font-size:14px;">
								<?php 
									if($shuttle->book_status == 'completed')
										echo lang('online');
									else if($shuttle->book_status == 'cash')
										echo lang('cash_payment');
									else if($shuttle->book_status == 'paid')
										echo lang('pre_paid');
								 ?>
								</span>
							</span>
						</b>
					</div>
					<div class="col-md-12 padding-left-none" style="padding-top:5px;padding-bottom:5px;">
						<b ><?php echo ucfirst($clients?$shuttle->first_name.' '.$shuttle->surname:$json['name'].' '.$json['surname']); ?></b>
					</div>
					<div class="col-md-3 trip_detail padding-left-none">
					<table>
						<tr><td><i class="fa fa-calendar icon-style"></i></td>
						<td>
							<b><?php echo lang('trip_date'); ?>:</b> <span class="trip_date_text"><?php echo date('d.m.Y',strtotime($shuttle->start_journey)); ?></span><br/>
							<?php if ($shuttle->return_journey_date) { ?>
							<p class="jReturnDate"><b><?php echo lang('return_date'); ?>:</b> <span><?php echo date('d.m.Y',strtotime($shuttle->return_journey_date)); ?></span></p>
							<?php } ?>
						</td></tr>
					</table>
					</div>
					<div class="col-md-3 trip_detail padding-left-none">
						<table>
						<tr><td><i class="fa fa-clock-o icon-style"></i></td>
						<td>
						<b><?php echo lang('trip_time'); ?>:</b> <span><?php echo date('H:i',strtotime($shuttle->time_go)); ?></span> hs.<br/>
						<?php if ($shuttle->return_journey_date) { ?>
						<p class="jReturnDate"><b><?php echo lang('return_time'); ?>:</b> <span><?php echo date('H:i',strtotime($shuttle->time_back)); ?></span> hs.</p>
						<?php } ?>
						</td></tr>
						</table>
					</div>
					<div class="col-md-3 trip_detail padding-left-none">
						<table>
						<tr><td><i class="fa fa-map-signs icon-style"></i></td>
						<td>
						<b><?php echo lang('from'); ?>:</b> <span><?php echo $start_from; ?></span><br/>
						<b><?php echo lang('to'); ?>:</b> <span><?php echo $end_at; ?></span>
						</td></tr>
						</table>
					</div>
					<div class="col-md-2 trip_detail padding-left-none">
						<table>
						<tr><td><i class="fa fa-user-o icon-style"></i></td>
						<td>
						<p style="margin-top:10px;"><b><?php echo lang('passengers'); ?>:</b> <span><?php echo $shuttle->adults + $shuttle->kids; ?></span></p>
						</td></tr>
						</table>
					</div>
					<div class= "col-md-1" style="border-left:1px solid #25377d">
						<a class="btn btn-lg" href="<?php echo site_url($lang.'/booking_details/' . $shuttle->id); ?>">
							<i class="fa fa-eye" style="font-size:24px;color:#25377d !important"></i>
						</a>
					</div>
				</div>
			</div>
		<?php $count++; } ?>
	</div>
</div>
<style>
	.icon-style {
		color: #EA5B55;
	    padding: 5px;
	    font-size: 25px !important;
	}
	.padding-left-none {
		padding-left: 0px !important;
	}
	.booking-panel table tr td {
		vertical-align: top;
	}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<?php $this->load->view('layout/templates/footer');?>