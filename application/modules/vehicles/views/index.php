<div class="headerbar">
	<div class="clearfix">
		<h1 class="pull-left"><?=lang('vehicles')?></h1>
		<a class="btn btn-primary pull-right" href="<?php echo site_url('admin/vehicles/form'); ?>">
			<i class="icon-plus icon-white"></i> <?php echo lang('new'); ?>
		</a>
	</div>
</div>

<?php echo $this->layout->load_view('layout/alerts'); ?>

<table class="table table-bordered datatable data_table">

	<thead>
		<tr>
            <th><?=lang('vehicle')?></th>
			<th><?=lang('brand')?></th>
			<th><?=lang('passengers')?></th>
			<th><?=lang('luggage')?></th>
			<th><?=lang('edit')?></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($vehicles as $vehicle) { ?>
		<tr>
			<td style="text-align:center">
				<img src="<?php echo $site_url; ?>/assets/cc/images/vehicles/<?php echo $vehicle->image ;?>" width="150"/>
			</td>
			<td><?=$vehicle->brand?></td>
			<td><?=$vehicle->min_passengers.' - '.$vehicle->max_passengers?></td>
			<td><?=$vehicle->luggage?></td>
			<td>
				<a class="btn btn-info btn-sm" href="<?php echo site_url('admin/vehicles/view/' . $vehicle->id); ?>">
					<i class="entypo-eye"></i>
				</a>
				<a class="btn btn-primary edit btn-sm" href="<?php echo site_url('admin/vehicles/form/' . $vehicle->id); ?>">
					<i class="entypo-pencil"></i>
				</a>
				<a class="btn btn-warning btn-sm <?php echo $vehicle->is_active ? '' : 'inactive'; ?>" href="<?php echo site_url('admin/vehicles/toggle/' . $vehicle->id . '/' . $vehicle->is_active); ?>">
					<i class="entypo-check" title="<?php echo $vehicle->is_active ? 'Active' : 'In Active'; ?>"></i>
				</a>
				<a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/vehicles/delete/' . $vehicle->id); ?>" onclick="return confirm('<?php echo lang('delete_record_warning'); ?>');" >
					<i class="entypo-trash"></i>
				</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>

</table>
