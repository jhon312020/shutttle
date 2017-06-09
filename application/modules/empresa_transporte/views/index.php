<div class="headerbar">
	<div class="clearfix">
		<h1 class="pull-left"><?=lang('empresa_transporte')?></h1>
		<a class="btn btn-primary pull-right" href="<?php echo site_url('admin/empresa_transporte/form'); ?>">
			<i class="icon-plus icon-white"></i> <?php echo lang('new'); ?>
		</a>
	</div>
</div>

<?php echo $this->layout->load_view('layout/alerts'); ?>

<table class="table table-bordered datatable data_table">

	<thead>
		<tr>
            <th><?=lang('brand')?></th>
			<th><?=lang('city')?></th>
			<th><?=lang('email')?></th>
			<th><?=lang('phone')?></th>
			<th><?=lang('edit')?></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($transports as $transport) { ?>
		<tr>
			<td style="text-align:center">
				<img src="<?php echo $site_url; ?>/assets/cc/images/empresa_transporte/<?php echo $transport->image ;?>" width="150"/>
			</td>
			<td><?=$transport->city?></td>
			<td><?=$transport->email?></td>
			<td><?=$transport->phone?></td>
			<td>
				<a class="btn btn-info btn-sm" href="<?php echo site_url('admin/empresa_transporte/view/' . $transport->id); ?>">
					<i class="entypo-eye"></i>
				</a>
				<a class="btn btn-primary edit btn-sm" href="<?php echo site_url('admin/empresa_transporte/form/' . $transport->id); ?>">
					<i class="entypo-pencil"></i>
				</a>
				<a class="btn btn-warning btn-sm <?php echo $transport->is_active ? '' : 'inactive'; ?>" href="<?php echo site_url('admin/empresa_transporte/toggle/' . $transport->id . '/' . $transport->is_active); ?>">
					<i class="entypo-check" title="<?php echo $transport->is_active ? 'Active' : 'In Active'; ?>"></i>
				</a>
				<a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/empresa_transporte/delete/' . $transport->id); ?>" onclick="return confirm('<?php echo lang('delete_record_warning'); ?>');" >
					<i class="entypo-trash"></i>
				</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>

</table>
