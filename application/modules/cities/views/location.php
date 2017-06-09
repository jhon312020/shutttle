<style>
	.modal-backdrop {
		z-index: none;
	}
</style>
<div class="headerbar">
	<div class="clearfix">
		<h1 class="pull-left">Location</h1>
	</div>
</div>

<?php echo $this->layout->load_view('layout/alerts'); ?>

<table class="table table-bordered datatable data_table">

	<thead>
		<tr>
            <th>City</th>
			<th>Category</th>
			<th>Location</th>
			<th><?=lang('edit')?></th>
		</tr>
	</thead>

	<tbody>
		<?php $count = 1; ?>
		<?php foreach ($locations as $location) { ?>
		<tr>
			<td width="14%">
			 <?=$city['name']?>
			</td>
			<td width="30%">
				<label id="category_label_<?php echo $location->id; ?>">
					<?=$categories[$location->category_id]?>
				</label>
				<?php echo form_dropdown(array('id'=>"category_input_".$location->id,'options'=>$categories,'selected'=>$location->category_id, 'class'=>'table_input', 'style'=>'display:none;' )); ?>
			</td>
			<td width="40%">
				<span id="location_label_<?php echo $location->id; ?>">
					<?=$location->location?>
				</span>
				<input style="display:none;" class="table_input" type="text" id="location_input_<?php echo $location->id; ?>" value="<?=$location->location?>" />
			</td>
			<td>
				<a style="display:none;" class="btn btn-primary edit btn-sm save_row"  href="javascript:;" data-id="<?=$location->id?>" >
					<i class="entypo-floppy"></i>
				</a>
				<a class="btn btn-primary edit btn-sm edit_row"  href="javascript:;" data-id="<?=$location->id?>" >
					<i class="entypo-pencil"></i>
				</a>
				<a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/cities/deleteLocation/' . $location->id.'/'.$city['id']); ?>" onclick="return confirm('<?php echo lang('delete_record_warning'); ?>');" >
					<i class="entypo-trash"></i>
				</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<style>
	.table_input {
		width: 80%;
		height: 35px;
		font-size: 14px;
	}
	#cities_add {
		width: 100% !important;
		background-color: none;
		text-align: center;
		font-size: 16px;
	}
	#cities_add td {
		/*border: 1px solid #ccc;*/
		padding:10px;
	}
	#cities_add input {
		height: 35px;
		width: 80%;
		padding-left:5px;
	}
</style>
<form method="post" action="<?php echo site_url('admin/cities/addLocations/'.$city['id']); ?>">
	<table class="table table-bordered datatable data_table" id="cities_add">
		<tbody>
			<tr id="original_record">
				<td width="14%"><?=$city['name']?></td>
				<td width="30%"><?php echo form_dropdown(array('name'=>'category[]','options'=>$categories, 'class'=>'selectboxit visible table_input' )); ?></td>
				<td width="40%"><input class="table_input" name="location[]" type="text" /></td>
				<td><a class="btn btn-danger btn-sm remove-new-row" href="javascript:;"><i class="entypo-trash"></i></a></td>
			</tr>
		</tbody>
	</table>
<br/>

<button type="button" class="btn btn-danger pull-right" style="margin-left:10px;" name="btn_cancel" onClick="location.href = '<?=site_url('admin/cities')?>'" value="1"><i class="icon-remove icon-white"></i> Cancel</button>
<button name="btn-submit" class="btn btn-primary pull-right" style="margin-left:10px;" value="1">Save</button>
<a class="btn btn-primary pull-right" id="new_record">
	<i class="icon-plus icon-white"></i> + Add
</a>
</form>

<script>
	$(document).ready(function() {
		var location_update_url = '<?php echo site_url('admin/cities/updateLocation'); ?>';
		var edit_url = '';
		var new_row_record = '<tr>'+$('#original_record').html()+'</tr>';
		$(document).on('click','#new_record',function(){
			$('#cities_add tbody').append(new_row_record);
		});

		$(document).on('click','.remove-new-row', function(){
			$(this).parent('td').parent('tr').remove();
		});

		$(document).on('click','.edit_row', function(){
			var id = $(this).attr('data-id');
			$('#category_label_'+id).hide();
			$('#category_input_'+id).show();
			$('#location_label_'+id).hide();
			$('#location_input_'+id).show();
			$(this).parent().find('.save_row').show();
			$(this).hide();
		});

		$(document).on('click','.save_row', function(){
			var id = $(this).attr('data-id');
			$('.form_error').remove();
			if ($('#location_input_'+id).val().trim() == '') {
				$('#location_input_'+id).after('<div class="form_error" style="color:red">Kindly fill this field</div>');
			}
			var data = {'category_id':$('#category_input_'+id).val(),'location':$('#location_input_'+id).val().trim()};
			var current_button = $(this);
			$.ajax({
				type:'POST',
				data:data,
				url:location_update_url+'/'+id,
				dataType:'json',
				success:function(result) {
					if (result.error) {
						$('#location_input_'+id).after('<div class="form_error" style="color:red">'+result.error+'</div>');
					} else {
						$('#category_label_'+id).show();
						$('#category_input_'+id).hide();
						$('#location_label_'+id).show();
						$('#location_input_'+id).hide();
						$('#category_label_'+id).html($("#category_input_"+id+" option:selected").text());
						$('#location_label_'+id).html(data['location']);
						current_button.parent().find('.edit_row').show();
						current_button.hide();
					}
				}
			});
		});
	});
</script>