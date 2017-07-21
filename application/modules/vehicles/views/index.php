<style>
	.modal-backdrop {
		z-index: none;
	}
</style>
<div class="headerbar">
	<div class="clearfix">
		<h1 class="pull-left"><?=lang('vehicles')?></h1>
		<a class="btn btn-primary pull-right" style="margin-left:10px;" href="<?php echo site_url('admin/vehicles/form'); ?>">
			<i class="icon-plus icon-white"></i> <?php echo lang('new'); ?>
		</a>
		<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#sorting_vehicle_modal">Vehicle order</button>
	</div>
</div>

<?php echo $this->layout->load_view('layout/alerts'); ?>
<?php 
$cms_lang = $this->session->userdata('cms_lang');
if ($cms_lang == 'english') {
	$lang = 'en';
} else {
	$lang = 'es';
}
?>
<table class="table table-bordered datatable data_table">

	<thead>
		<tr>
            <th><?=lang('vehicle')?></th>
			<th><?=lang('title')?></th>
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
			<?php if ($cms_lang == 'english') { ?>
				<td><?=$vehicle->en_title?></td>
			<?php } else { ?>
				<td><?=$vehicle->es_title?></td>
			<?php } ?>
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
<script type="text/javascript">
$( function() {
    $( "#vehicle_sorting" ).sortable({
      placeholder: "ui-state-highlight"
    });
    $( "#vehicle_sorting" ).disableSelection();
  } );
  </script>
<style>
#vehicle_sorting { list-style-type: none; margin: 0; padding: 0; }
  #vehicle_sorting li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 1.5em; }
  html>body #vehicle_sorting li { height:130px; padding:5px; }
  .vehicle_detail {
  	border:1px solid;
  	cursor: move;
  	background-color: #ebebeb;
  }
  .modal-body {
    max-height: calc(100vh - 212px);
    overflow-y: auto;
}
body.modal-open {
    overflow: visible;
}
</style>
<!-- Modal -->
<div class="modal fade" id="sorting_vehicle_modal" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Vehicle order</h4>
      </div>
      <form method="post" action="<?php echo site_url('admin/vehicles/save_order'); ?>">
      <div class="modal-body">
			<div id="sorting_list">
				<ul id="vehicle_sorting">
				<?php foreach ($vehicles as $vehicle) { ?>
					<li class="ui-state-default vehicle_detail">
						<div class="col-md-12 ">
							<div class="col-md-6" style="border-right:1px solid; ">
								<input type="hidden" name="save_order[]" value="<?php echo $vehicle->id; ?>" />
								<img src="<?php echo $site_url; ?>/assets/cc/images/vehicles/<?php echo $vehicle->image ;?>" width="150"/>
							</div>
							<div class="col-md-6" style="display:table-cell;vertical-align:middle;">
								<?php if ($cms_lang == 'english') { ?>
									<b>Title:</b> <?=$vehicle->en_title?><br/>
								<?php } else { ?>
									<b>Title:</b> <?=$vehicle->es_title?><br/>
								<?php } ?>
								<?php echo '<b>'.lang('passengers').': </b>'.$vehicle->min_passengers.' - '.$vehicle->max_passengers; ?><br/>
								<?php echo '<b>'.lang('luggage').': </b>'.$vehicle->luggage; ?><br/>
							</div>
						</div>
					</li>
				<?php } ?>
				</ul>
				
			</div>
		</div>
      <div class="modal-footer">
      	<input style="float:right;margin-left:10px;" class="btn btn-primary" type="submit"/>
      	<button type="button" class="btn btn-danger"  style="float:right;" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>