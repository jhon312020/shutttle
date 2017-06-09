<?php
$readonly = ($readonly)?'readonly':'';
$disabled = ($readonly)?'disabled':'';
?>
<style>
form label {
	text-align:left!important;
}
</style>
<div class="headerbar">
	<h1><?=lang('empresa_transporte')?></h1>
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
						<div class="form-group">
							<label class="col-sm-4 control-label"><?=lang('name')?></label>
							<div class="col-sm-8">
								<input type="hidden" name="id" value="<?php echo $this->mdl_empresa_transporte->form_value('id'); ?>" />
								<?php echo form_input(array('name'=>'name', 'required'=>true, 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_empresa_transporte->form_value('name'))); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label"><?=lang('city')?> </label>
							<div class="col-sm-8">
								<?php echo form_input(array('name'=>'city', 'required'=>true, 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_empresa_transporte->form_value('city'))); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label"><?=lang('address')?> </label>
							<div class="col-sm-8">
								<?php echo form_input(array('name'=>'address', 'required'=>true, 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_empresa_transporte->form_value('address'))); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label"><?=lang('email')?> </label>
							<div class="col-sm-8">
								<?php echo form_input(array('name'=>'email', 'required'=>true, 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_empresa_transporte->form_value('email'))); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label"><?=lang('phone')?> </label>
							<div class="col-sm-8">
								<?php echo form_input(array('name'=>'phone', 'required'=>true, 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_empresa_transporte->form_value('phone'))); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label"><?=lang('website')?> </label>
							<div class="col-sm-8">
								<?php echo form_input(array('name'=>'website', 'required'=>true, 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_empresa_transporte->form_value('website'))); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label"><?=lang('no_of_seats')?></label>
							<div class="col-sm-8">
								<?php echo form_input(array('type'=>'number','name'=>'no_of_seats', 'required'=>true, 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_empresa_transporte->form_value('no_of_seats'))); ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-2 control-label"><?=lang('image')?></label>
							<div class="col-sm-5">
								<?php 
									if ($readonly != 'readonly') {
										echo form_upload(array('name'=>'image','class'=>'form-control file2 inline btn btn-primary','data-label'=>"<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files"));	
									}
								?>
								<?php if ($this->mdl_empresa_transporte->form_value('image')) { ?>
										<img src="<?php echo $this->mdl_settings->setting('site_url'); ?>/assets/cc/images/empresa_transporte/<?php echo $this->mdl_empresa_transporte->form_value('image');?>" width="150" style="padding-top:10px;"/>
								<?php } ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"><?=lang('comment')?></label>
							<div class="col-sm-9">
								<?php echo form_textarea(array('name'=>'comment', 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_empresa_transporte->form_value('comment'))); ?>
							</div>
						</div>
					</div>
				</div>
				<?php
					if(!$readonly){
						echo $this->layout->load_view('layout/header_buttons');
					}
					else{
				?>
				<div class="pull-right">
					<button class="btn btn-primary" name="btn_cancel" value="1"><i class="icon-ok icon-white"></i> <?php echo lang('cancel'); ?></button>
				</div>
			<?php
				}
			?>	
			</div>
		</div>
	</div>
</form>
