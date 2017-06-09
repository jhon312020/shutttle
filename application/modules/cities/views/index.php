<style>
	.modal-backdrop {
		z-index: none;
	}
</style>
<div class="headerbar">
	<div class="clearfix">
		<h1 class="pull-left">CITY</h1>
	</div>
</div>

<?php echo $this->layout->load_view('layout/alerts'); ?>

<table class="table table-bordered datatable data_table">

	<thead>
		<tr>
            <th>#</th>
			<th><?=lang('name')?></th>
			<th>Location</th>
			<th><?=lang('edit')?></th>
		</tr>
	</thead>

	<tbody>
		<?php $count = 1; ?>
		<?php foreach ($cities as $city) { ?>
		<tr>
			<td>
			 <?=$count++?>
			</td>
			<td width="30%">
				<span id="name_label_<?php echo $city->id; ?>">
					<?=$city->name?>
				</span>
				<input style="display:none;" class="table_input" type="text" name="name" id="name_input_<?php echo $city->id; ?>" value="<?=$city->name?>" />
			</td>
			<td><a style="text-decoration:underline" href="<?php echo site_url('admin/cities/editCityLocations/'.$city->id); ?>">Add / Edit location</a>
			<td>
				<a style="display:none;" class="btn btn-primary edit btn-sm save_row"  href="javascript:;" data-id="<?=$city->id?>" >
					<i class="entypo-floppy"></i>
				</a>
				<a class="btn btn-primary edit btn-sm edit_row"  href="javascript:;" data-id="<?=$city->id?>" >
					<i class="entypo-pencil"></i>
				</a>
				<a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/cities/delete/' . $city->id); ?>" onclick="return confirm('<?php echo lang('delete_record_warning'); ?>');" >
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
		border: 1px solid #ccc;
		padding:10px;
	}
	#cities_add input {
		height: 35px;
		width: 80%;
		padding-left:5px;
	}
</style>
<form method="post" action="<?php echo site_url('admin/cities/form'); ?>">
	<table classs="table table-bordered datatable" id="cities_add">
		<tbody>
		</tbody>
	</table>
<br/>
<button name="btn-submit" class="btn btn-primary pull-right" style="margin-left:10px;" value="1">Save</button>
<a class="btn btn-primary pull-right" id="new_record">
	<i class="icon-plus icon-white"></i> + Add
</a>

</form>

<script>
	$(document).ready(function() {
		var base_url = '<?php echo site_url('admin/cities/form'); ?>';
		var company_update_url = '<?php echo site_url('admin/cities/updateCityName'); ?>';
		var edit_url = '';
		$(document).on('click','#new_record',function(){
			var html = '<tr><td width="30%">City</td><td><input type="text" name="city[]"/></td>';
			html += '<td><a class="btn btn-danger btn-sm remove-new-row" href="javascript:;"><i class="entypo-trash"></i></a></td></tr>';
			$('#cities_add tbody').append(html);
		});

		$(document).on('click','.remove-new-row', function(){
			$(this).parent('td').parent('tr').remove();
		});

		$(document).on('click','.edit_row', function(){
			var id = $(this).attr('data-id');
			$('#name_label_'+id).hide();
			$('#name_input_'+id).show();
			$(this).parent().find('.save_row').show();
			$(this).hide();
		});

		$(document).on('click','.save_row', function(){
			var id = $(this).attr('data-id');
			var newName = $('#name_input_'+id).val().trim();
			$('.form_error').remove();
			var current_button = $(this);
			$.ajax({
				type:'POST',
				data:{name:newName},
				url:company_update_url+'/'+id,
				dataType:'json',
				success:function(result) {
					if (result.error) {
						$('#name_input_'+id).after('<div class="form_error" style="color:red">'+result.error+'</div>');
					} else {
						$('#name_label_'+id).html($('#name_input_'+id).val().trim());
						$('#name_label_'+id).show();
						$('#name_input_'+id).hide();
						current_button.parent().find('.edit_row').show();
						current_button.hide();
					}
				}
			});
		});
		$('#new_record').trigger('click');
	});
</script>