<style>
	.modal-backdrop {
		z-index: none;
	}
</style>
<div class="headerbar">
	<div class="clearfix">
		<h1 class="pull-left">Routes</h1>
		<a class="btn btn-primary pull-right" href="<?php echo site_url('admin/paths/form'); ?>">
			<i class="icon-plus icon-white"></i> <?php echo lang('new'); ?>
		</a>
	</div>
</div>

<?php echo $this->layout->load_view('layout/alerts'); ?>
<?php echo $this->layout->load_view('layout/all_actions',array('action'=>site_url('admin/paths/actions'))); ?>

<table class="table table-bordered datatable data_table">

	<thead>
		<tr>
			<th align='center' width="50px" class='no-sort'><input type="checkbox" id="select_all" /></th>
			<th>Pick-up</th>
			<th>City</th>
			<th><?=lang('edit')?></th>
		</tr>
	</thead>

	<tbody>
		<?php $count = 1; ?>
		<?php foreach ($pickup_locations as $location) { ?>
		<tr>
			<td align='center'><input type='checkbox' class='single_checkbox' name='ids_<?php echo $location->pickup_location_id; ?>' /></td>
			<td width="30%">
				<?=$locations[$location->pickup_location_id]?>
			</td>
			<td>
				<?=$cities[$location->pickup_city_id]?>
			</td>
			<td>
				<a class="btn btn-primary edit btn-sm edit_row"  href="<?php echo site_url('admin/paths/form/'.$location->pickup_location_id); ?>" >
					<i class="entypo-pencil"></i>
				</a>
				<a class="btn btn-primary edit btn-sm edit_row duplicate_button"  href="javascript:;" current-id="<?php echo $location->pickup_location_id; ?>" target="<?php echo site_url('admin/paths/duplicate/'.$location->pickup_location_id); ?>" >
					<i class="entypo-docs"></i>
				</a>
				<a class="btn btn-warning btn-sm <?php echo $location->is_active ? '' : 'inactive'; ?>" href="<?php echo site_url('admin/paths/toggle/' . $location->pickup_location_id . '/' . $location->is_active); ?>">
					<i class="entypo-check" title="<?php echo $location->is_active ? 'Active' : 'In Active'; ?>"></i>
				</a>
				<a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/paths/deleteAll/' . $location->pickup_location_id); ?>" onclick="return confirm('<?php echo lang('delete_record_warning'); ?>');" >
					<i class="entypo-trash"></i>
				</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="duplicate_modal" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);" >
<div class="modal-dialog modal-sm">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Select location</h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
				<div class="col-sm-10">
					<select name="drop_location" class="select2" id="dupliate_location"  data-allow-clear="true" data-placeholder="Select a location">
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
			</div>
			<div class="col-md-10 error-message" style="color:red"></div>
			<br/>
    </div>
    <div class="modal-footer">
    	<button type="button" class="btn btn-primary" id="submit_duplicate">Duplicate</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  
</div>
</div>
<script>
selected_route_url = '';
current_id = 0;
$('.duplicate_button').click(function(){
	selected_route_url = $(this).attr('target');
	current_id = $(this).attr('current-id');
	$('.error-message').html('');
	$('#duplicate_modal').modal('show');
});
$('#submit_duplicate').click(function(){
	if ($('#dupliate_location').val() == '') {
		$('.error-message').html('Kindly select any one location');
		return false;
	}
	if (current_id == $('#dupliate_location').val()) {
		$('.error-message').html('You have selected the same pick up location');
		return false;
	}
	location.href= selected_route_url+'/'+$('#dupliate_location').val();
});
</script>