<?php
$readonly = (isset($readonly) && $readonly)?'readonly':'';
$disabled = (isset($readonly) && $readonly)?'disabled':'';
?>
<style>
form label {
	text-align:left!important;
}
#s2id_pickup_location_id .select2-choice {
	background-color: #DC143C;
	border-color:1px solid #DC143C;
	color:white !important;
	font-size:16px;
}
input[type=text], input[type=number] {
	height: 40px;
}
input[type=number] {
	width:100px;
}
.new_record_row {
	border:1px solid black; height:auto;margin:15px;padding:10px;
}
</style>
<div class="headerbar">
	<h1><?=lang('routes')?> - Config</h1>
</div>
<?php if (isset($error) && $error) { ?>
	<div class="alert alert-danger">
		<?php echo $error; ?>
	</div>
<?php } ?>
<form method="post" class="form-horizontal" enctype="multipart/form-data" >
	<div class="row">
		<?php echo $this->layout->load_view('layout/alerts'); ?>
		<div class="col-md-12">
			<div class="panel minimal minimal-gray">
				<div class="panel-heading"></div>
				<div class="panel-body">
					<div class="col-md-6">
						<input type="hidden" name="id" value="<?php echo $pickup_id; ?>" />
						<select name="pickup_location_id" id="pickup_location_id" data-allow-clear="true" data-placeholder="Select a location" >
							<option></option>
							<?php foreach ($select_location as $category_id=>$location) { ?>
								<optgroup label="<?=$category_id?>" >
								<?php foreach ($location as $id=>$value) { ?>
									<?php if ($pickup_id == $id) { ?>
										<option value="<?=$id?>" selected><?=$value?></option>
									<?php } else { ?>
										<option value="<?=$id?>"><?=$value?></option>
									<?php } ?>
								<?php } ?>
								</optgroup>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-4">
						<?php
							$pickup_city_id = (isset($city_relation[$pickup_id]))?$city_relation[$pickup_id]:'';
							$city_name = (isset($city_relation[$pickup_id]))?$cities[$city_relation[$pickup_id]]:'';
						?>
						<input type="hidden" name="pickup_city_id" id="pickup_city_id" value="<?php echo $pickup_city_id; ?>"/>
						<input type="text" class="form-control" name="city_name" id="city_name" style="width:90%;height:40px;" value="<?php echo $city_name; ?>"/>
					</div>
				</div>

				<div id="new_records_div">
					<?php 
						$count = 1;
						foreach ($paths as $path) {
								$id_name = "edit_record[$count][id]";
								$drop_location_name = "edit_record[$count][drop_location]";
								$duration_name = "edit_record[$count][duration]";
								$distance_name = "edit_record[$count][distance]";
								$vehicle_name = "edit_record[$count][vehicle]";
								$count++;
							?>
						<div class="new_record_row">
							<div style="height:75px">
								<div class="col-md-4">
									<input type="hidden" value="<?php echo $path->id; ?>" name="<?php echo $id_name; ?>">
									To:
									<select name="<?php echo $drop_location_name; ?>" class="select2"  data-allow-clear="true" data-placeholder="Select a location">
										<option></option>
										<?php foreach ($select_location as $category_id=>$location) { ?>
											<optgroup label="<?=$category_id?>" >
											<?php foreach ($location as $id=>$value) { ?>
													<?php if ($id == $path->drop_location_id) { ?>
														<option value="<?=$id?>" selected><?=$value?></option>
													<?php } else { ?>
														<option value="<?=$id?>"><?=$value?></option>
													<?php } ?>
											<?php } ?>
											</optgroup>
										<?php } ?>
									</select>
								</div>
								<div class="col-md-2">
									Duration (minutes):
									<input type="number" class="form-control" name="<?php echo $duration_name; ?>"  value="<?php echo $path->duration; ?>"/>
								</div>
								<div class="col-md-2">
									Distance (km):
									<input type="number" class="form-control" name="<?php echo $distance_name; ?>" value="<?php echo $path->distance; ?>" />
								</div>
								<a class="btn btn-danger btn-sm pull-right" href="<?php echo site_url('admin/paths/delete/' . $path->id); ?>" onclick="return confirm('<?php echo lang('delete_record_warning'); ?>');" >
									<i class="entypo-trash"></i>
								</a>
							</div>
							<div style="width:100%;border-top:1px solid #ccc;padding:10px;overflow-x:auto;">
								<?php $path_vehicles = json_decode($path->vehicles,true); ?>
								<?php foreach ($vehicles as $id=>$vehicle) { ?>
									<div class="col-md-2">
										<?php echo $vehicle; ?>
										<div class="input-group">
											<span class="input-group-addon"><i>&euro;</i></span>
											<?php if (isset($path_vehicles[$id])) { ?>
												<input type="text" class="form-control" name="<?php echo $vehicle_name.'['.$id.']'; ?>" value="<?php echo $path_vehicles[$id]; ?>" >
											<?php } else { ?>
												<input type="text" class="form-control" name="<?php echo $vehicle_name.'['.$id.']'; ?>" >
											<?php } ?>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>

				<div id="duplicate_record" style="display:none">
					<div class="new_record_row">
						<div style="height:75px">
						<div class="col-md-4">
							To:
							<select name="drop_location" class="select2"  data-allow-clear="true" data-placeholder="Select a location">
								<option></option>
								<?php foreach ($select_location as $category_id=>$location) { ?>
									<optgroup label="<?=$category_id?>" >
									<?php foreach ($location as $id=>$value) { ?>
										<option value="<?=$id?>"><?=$value?></option>
									<?php } ?>
									</optgroup>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-2">
							Duration (minutes):
							<input type="number" class="form-control" name="duration" />
						</div>
						<div class="col-md-2">
							Distance (km):
							<input type="number" class="form-control" name="distance" />
						</div>
						<a class="btn btn-danger btn-sm remove-new-row pull-right" href="javascript:;"><i class="entypo-trash"></i></a>
						</div>
						<div style="width:100%;border-top:1px solid #ccc;padding:10px;overflow-x:auto;">
							<?php foreach ($vehicles as $id=>$vehicle) { ?>
								<div class="col-md-2">
									<?php echo $vehicle; ?>
									<div class="input-group">
										<span class="input-group-addon"><i>&euro;</i></span>
										<input type="text" class="form-control" name="vehicle[<?php echo $id;?>]">
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				
				<button type="button" class="btn btn-danger pull-right" style="margin-left:10px;" name="btn_cancel" onClick="location.href = '<?=site_url('admin/paths')?>'" value="1"><i class="icon-remove icon-white"></i> Cancel</button>
				<button name="btn-submit" class="btn btn-primary pull-right" style="margin-left:10px;" value="1">Save</button>
				<a class="btn btn-primary pull-right" id="new_record">
					<i class="icon-plus icon-white"></i> + Add
				</a>

			</div>
		</div>
	</div>
</form>
<script>
	$(document).ready(function(){
		var $city_relation = <?=json_encode($city_relation)?>;
		var $cities = <?=json_encode($cities)?>;
		$('#pickup_location_id').select2();
		$('#pickup_location_id').on("select2-selecting",function(e){
			if (e.val != '' ) {
				$('#pickup_city_id').val($city_relation[e.val]);
				$('#city_name').val($cities[$city_relation[e.val]]);
			} else {
				$('#pickup_city_id').val('');
				$('#city_name').val('');
			}
		});
		var new_record = $('#duplicate_record').html();
		var record_count = 1;
	
		$(document).on('click','#new_record',function(){
			$('#duplicate_record').remove();
			var duplicate_record = new_record.replace(/name=\"drop_location/g, "name=\"new_record["+record_count+"][drop_location]");
			duplicate_record = duplicate_record.replace(/name=\"duration/g, "name=\"new_record["+record_count+"][duration]");
			duplicate_record = duplicate_record.replace(/name=\"distance/g, "name=\"new_record["+record_count+"][distance]");
			duplicate_record = duplicate_record.replace(/name=\"vehicle/g, "name=\"new_record["+record_count+"][vehicle]");
			duplicate_record = duplicate_record.replace(/class=\"select2/g, "class=\"select2"+record_count);
			$('#new_records_div').append(duplicate_record);
			$('.select2'+record_count).select2();
			record_count++;
		});

		$(document).on('click','.remove-new-row', function(){
			$(this).closest('.new_record_row').remove();
		});

		$('#new_record').trigger('click');
	});
</script>