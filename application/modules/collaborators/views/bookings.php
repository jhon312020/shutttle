<?php
  $this->load->view('layout/templates/header');
?>
<div class="container bodypad">
	<div class="row">
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
		</div>	
	</div>
</div>
<?php $this->load->view('layout/templates/footer');?>
