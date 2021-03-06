<div class="headerbar">
	<div class="clearfix">
		<?php
		if(count($aboutus) == 0){
		?>
		<a class="btn btn-primary pull-right" href="<?php echo site_url('admin/aboutus/form'); ?>">
			<i class="icon-plus icon-white"></i> <?php echo lang('new'); ?>
		</a>
		<?php
		}
		?>
	</div>
</div>

<table class="table table-bordered datatable data_table">

	<thead>
		<tr>
            <th><?php echo lang('id'); ?></th>
			<th><?php echo lang('image'); ?></th>
			<th><?php echo lang('banner_title') . ' (EN)'; ?></th>
			<th><?php echo lang('banner_title') . ' (ES)'; ?></th>
			<th><?php echo lang('banner_content') . ' (EN)'; ?></th>
			<th><?php echo lang('banner_content') . ' (ES)'; ?></th>
            <th><?php echo lang('title') . ' (EN)'; ?></th>
            <th><?php echo lang('title') . ' (ES)'; ?></th>
            <th><?php echo lang('content') . ' (EN)'; ?></th>
            <th><?php echo lang('content') . ' (ES)'; ?></th>
			<th><?php echo lang('options'); ?></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($aboutus as $q) { ?>
		<tr>
			<td><?php echo $q->id; ?></td>
			<td><?php echo $q->title_en; ?></td>
			<td><?php echo $q->title_es; ?></td>
			<td><?php echo word_limiter($q->subtitle_en, 10); ?></td>
			<td><?php echo word_limiter($q->subtitle_es, 10); ?></td>
			<td><?php echo word_limiter($q->content_en, 10); ?></td>
			<td><?php echo word_limiter($q->content_es, 10); ?></td>
			<td><?php echo word_limiter($q->subcontent_en, 10); ?></td>
			<td><?php echo word_limiter($q->subcontent_es, 10); ?></td>
			<td>
				<a class="btn btn-primary edit btn-sm" href="<?php echo site_url('admin/aboutus/form/' . $q->id); ?>">
					<i class="entypo-pencil"></i>
				</a>
				<a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/aboutus/delete/' . $q->id); ?>" onclick="return confirm('<?php echo lang('delete_record_warning'); ?>');" >
					<i class="entypo-trash"></i>
				</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>

</table>
