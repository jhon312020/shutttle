<table class="table table-bordered datatable data_table">

	<thead>
		<tr>
			<?php if (isset($all_actions) && $all_actions) { ?>
				<th class='no-sort'><input type="checkbox" id="select_all" /></th>
			<?php } ?>
			<th><?php echo lang('trip_type'); ?></th>
			<th><?php echo lang('reference'); ?></th>
			<th><?php echo lang('vehicle'); ?></th>
			<th><?php echo lang('name'); ?></th>
		      <th><?php echo lang('date'); ?></th>
		      <th><?php echo lang('hour'); ?></th>
			<th><?php echo lang('from'); ?></th>
			<th><?php echo lang('to'); ?></th>
			<th><?php echo lang('price'); ?></th>
			<th style="display: none;"><?php echo lang('payment_method'); ?></th>
			<th><?php echo lang('passengers'); ?></th>
			<th style="display: none;"><?php echo lang('flight_no'); ?></th>
			<th style="display: none;"><?php echo lang('col_address_info'); ?></th>
			<th style="display: none;"><?php echo lang('address'); ?></th>
			<th style="display: none;"><?php echo lang('user_phone'); ?></th>
			<th style="display: none;"><?php echo lang('reservation_date'); ?></th>
			<?php
			foreach($extras as $extra){
			?>
			<th  style="display: none;"><?php echo $extra['title']; ?></th>
			<?php } ?>
			<th width='28%'><?php echo lang('options'); ?></th>
		</tr>
	</thead>

	<tbody>
		<?php 
		$return_array = array();
		/*echo '<pre>';
		print_r($shuttles); exit;*/
		foreach ($shuttles as $shuttle) {
			if(in_array($shuttle->id, $return_array)) {
				continue;
			}
			if($shuttle->start_journey >= date('Y-m-d') && $shuttle->round_trip == 0 && $shuttle->return_book_id > 0) {
				array_push($return_array, $shuttle->return_book_id);
			}
			$payment = '';
			if($shuttle->book_status == 'completed')
				$payment = lang('completed');
			else if($shuttle->book_status == 'pending')
				$payment = lang('pending'); 
			else if($shuttle->book_status == 'cash' && isset($shuttle->returnBook))
				$payment = lang('completed');
			else if($shuttle->book_status == 'cash' && !isset($shuttle->returnBook))
				$payment = lang('cash_payment');
			else if($shuttle->book_status == 'paid')
				$payment = lang('pre_paid');


			$clients = false;
			$arr = array('Barcelona Airport Terminal 1', 'Barcelona Airport Terminal 2');
			if($shuttle->client_id)
				$clients = true;
			else
				$json = json_decode($shuttle->client_array,true);
				
			$address = $shuttle->mainaddress != '' && $shuttle->mainaddress != null ? $shuttle->mainaddress : $shuttle->col_address;	
			$start_from = (in_array($shuttle->start_from, $arr))?$shuttle->start_from:$shuttle->name.' - '.$address;
			$end_at = (in_array($shuttle->end_at, $arr))?$shuttle->end_at:$shuttle->name.' - '.$address;
			if($shuttle->bcnarea_address_id != '' && $shuttle->bcnarea_address_id != '0') {
				if(!in_array($shuttle->start_from, $arr))
					$start_from = $shuttle->book_address;
				if(!in_array($shuttle->end_at, $arr))
					$end_at = $shuttle->book_address;
			}

			if ($shuttle->version == 1) {
				$start_from = $shuttle->start_from;
				$end_at = $shuttle->end_at;
			}

			/*if($clients) {
				$cp = $shuttle->cp != ''?' - '.$shuttle->cp:'';
				$shuttle->address != '' ?array_push($address, $shuttle->address):'';
				$shuttle->city != '' ?array_push($address, $shuttle->city):'';
				$shuttle->country != '' ?array_push($address, $shuttle->country.$cp):'';
			} else {
				$cp = $json['cp'] != ''?' - '.$json['cp']:'';
				$json['address'] != '' ?array_push($address, $json['address']):'';
				$json['city'] != '' ?array_push($address, $json['city']):'';
				$json['country'] != '' ?array_push($address, $json['country'].$cp):'';
			}*/	
		?>
		<tr>
			<?php if (isset($all_actions) && $all_actions) { ?>
				<td align='center'><input type='checkbox' class='single_checkbox' name='ids_<?php echo $shuttle->round_trip == 1?$res[$shuttle->id]:$shuttle->id; ?>' /></td>
			<?php } ?>
			<td><img src="<?php echo base_url().'assets/cc/images/'. (($shuttle->return_book_id > 0 || $shuttle->round_trip == 1)?'round.png':'single.png'); ?>"></td>
			<td><?php 
			if ($shuttle->version == 1) {
				echo 'SHT-'.date('dmY',strtotime($shuttle->start_journey)).'-'.sprintf("%02d", $shuttle->round_trip == 1?$res[$shuttle->id]:$shuttle->id);
			} else {
				echo $shuttle->reference_id.'-'.sprintf("%02d", $shuttle->round_trip == 1?$res[$shuttle->id]:$shuttle->id);	
			}
			 ?></td>
			<td>
				<?php 
				if ($shuttle->vehicle_image) {
					echo '<b>'.$shuttle->vehicle_name.'</b><br/>';
					echo '<img src="'.base_url().'/assets/cc/images/vehicles/'.$shuttle->vehicle_image.'" width="100" />';
				}
				?>
			</td>
			<td><?php echo $clients?$shuttle->first_name.' '.$shuttle->surname:$json['name'].' '.$json['surname']; ?></td>
			<td><?php echo date('d/m/Y', strtotime($shuttle->start_journey)); ?></td>
			<td><?php echo date('H:i', strtotime($shuttle->hour)).'h'; ?></td>
			<td><?php echo $start_from; ?></td>
			<td><?php echo $end_at; ?></td>
			<td><?php echo $shuttle->price; ?></td>
			<td style="display: none;"><?php echo $payment; ?></td>
			<td><?php echo $shuttle->adults + $shuttle->kids; ?></td>
			<td style="display: none;"><?php echo $shuttle->flight_no; ?></td>
			<td style="display: none;"><?php echo $shuttle->name.' / '.$address; ?></td>
			<td style="display: none;"><?php echo $shuttle->booking_address; ?></td>
			<?php 
				$client_array = json_decode($shuttle->client_array,true);
				$phone_number = '';
				if (isset($client_array['phone'])) {
					$phone_number = $client_array['phone'];
				} else {
					$phone_number = $shuttle->phone_number;
				}
			?>
			<td style="display: none;"><?php echo $phone_number; ?></td>
			<td style="display: none;"><?php echo date('d/m/Y', strtotime($shuttle->created)); ?></td>
			<?php
			$extra_array = ($shuttle->extra_array != '')?json_decode($shuttle->extra_array, true):json_decode('{}', true);
			$ex_id = array_keys($extra_array);
			foreach($extras as $extra) {
				if(in_array($extra['id'], $ex_id)) {
			?>
					<td style="display: none;"><?php echo $extra_array[$extra['id']]['extra_count'].' '.$extra['title']; ?></td>
			<?php } else { ?>		
					<td  style="display: none;"></td>
			<?php 
				} 
			} 
			?>
			<td style="padding-left: 5px !important;padding-right: 5px !important;">
				<a class="btn btn-info btn-sm" href="<?php echo site_url('admin/shuttles/view/' . ($shuttle->round_trip == 1?$res[$shuttle->id]:$shuttle->id)); ?>">
					<i class="entypo-eye"></i>
				</a>
				<?php if ($shuttle->is_active == 1) { ?>
					<a class="btn btn-primary edit btn-sm" href="<?php echo site_url('admin/shuttles/form/' . ($shuttle->round_trip == 1?$res[$shuttle->id]:$shuttle->id)); ?>">
						<i class="entypo-pencil"></i>
					</a>
					<a class="btn btn-info btn-sm" href="javascript:void(0);" style="<?php echo $shuttle->journey_completed == 1?'background-color: rgb(109, 224, 109) !important;border-color: rgb(109, 224, 109) !important;':'background-color: #e5900f !important;border-color: #e5900f !important;'; ?>">
						<i class="entypo-check"></i>
					</a>
					<a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/shuttles/delete/' . ($shuttle->round_trip == 1?$res[$shuttle->id]:$shuttle->id)); ?>" onclick="return confirm('<?php echo lang('delete_record_warning'); ?>');" >
						<i class="entypo-trash"></i>
					</a>
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>

</table>
