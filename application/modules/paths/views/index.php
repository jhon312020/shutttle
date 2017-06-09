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

<table class="table table-bordered datatable data_table">

	<thead>
		<tr>
			<th>Pick-up</th>
			<th>City</th>
			<th><?=lang('edit')?></th>
		</tr>
	</thead>

	<tbody>
		<?php $count = 1; ?>
		<?php foreach ($pickup_locations as $location) { ?>
		<tr>
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
				<a class="btn btn-primary edit btn-sm edit_row"  href="<?php echo site_url('admin/paths/duplicate/'.$location->pickup_location_id); ?>" >
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