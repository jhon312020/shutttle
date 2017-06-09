<style>
	.modal-backdrop {
		z-index: none;
	}
</style>
<div class="headerbar">
	<div class="clearfix">
		<h1 class="pull-left"><?=lang('Category')?></h1>
		<a class="btn btn-primary pull-right" id="new_record">
			<i class="icon-plus icon-white"></i> <?php echo lang('new'); ?>
		</a>
	</div>
</div>

<?php echo $this->layout->load_view('layout/alerts'); ?>

<table class="table table-bordered datatable data_table">

	<thead>
		<tr>
            <th>#</th>
			<th><?=lang('name')?></th>
			<th><?=lang('edit')?></th>
		</tr>
	</thead>

	<tbody>
		<?php $count = 1; ?>
		<?php foreach ($categories as $category) { ?>
		<tr>
			<td>
			 <?=$count++?>
			</td>
			<td><?=$category->name?></td>
			<td>
				<a class="btn btn-primary edit btn-sm edit_modal_open"  href="javascript:;" data-value="<?=$category->name?>" data-id="<?=$category->id?>" >
					<i class="entypo-pencil"></i>
				</a>
				<a class="btn btn-warning btn-sm <?php echo $category->is_active ? '' : 'inactive'; ?>" href="<?php echo site_url('admin/place_categories/toggle/' . $category->id . '/' . $category->is_active); ?>">
					<i class="entypo-check" title="<?php echo $category->is_active ? 'Active' : 'In Active'; ?>"></i>
				</a>
				<a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/place_categories/delete/' . $category->id); ?>" onclick="return confirm('<?php echo lang('delete_record_warning'); ?>');" >
					<i class="entypo-trash"></i>
				</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="add_edit_modal" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);" >
<div class="modal-dialog modal-sm">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"></h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
				<label class="col-sm-2 control-label"><?=lang('name')?></label>
				<div class="col-sm-10">
					<?php echo form_input(array('name'=>'name', 'id'=>'name', 'required'=>true, 'class'=>'form-control')); ?>
				</div>
			</div>
    </div>
    <div class="modal-footer">
    	<button type="button" class="btn btn-primary" id="form_submit">Save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  
</div>
</div>
<script>
	$(document).ready(function() {
		var base_url = '<?php echo site_url('admin/place_categories/form'); ?>';
		var edit_url = '';

		$(document).on('click','#new_record', function(){
			edit_url = '';
			$('#name').val('');
			$('.modal-title').html('Create a new category');
			$('#add_edit_modal').modal('show');
		});

		$(document).on('click','.edit_modal_open', function(){
			edit_url= base_url+'/'+$(this).attr('data-id');
			$('.modal-title').html('Edit category');
			$('#name').val($(this).attr('data-value'));
			$('#add_edit_modal').modal('show');
		});

		$(document).on('click','#form_submit', function(){
			$('.form_error').remove('');
			if ($('#name').val() == '') {
				$('#name').after('<div class="form_error" style="color:red">Kindly fill this field</div>');
				return false;
			}
			if (edit_url == '') {
				ajax_url = base_url;			
			} else {
				ajax_url = edit_url;
			}
			
			$.ajax({
				type:'POST',
				data:{name:$('#name').val()},
				url:ajax_url,
				dataType:'json',
				success:function(result) {
					if (result.error) {
						$('#name').after('<div class="form_error" style="color:red">'+result.error+'</div>');
					} else {
						window.location.reload();
					}
				}
			});

		});
	});
</script>