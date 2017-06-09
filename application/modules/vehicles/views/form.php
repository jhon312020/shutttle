<?php
$readonly = ($readonly)?'readonly':'';
$disabled = ($readonly)?'disabled':'';
?>
<style>
form label {
		text-align:left!important;
		margin-left:10px;
}
</style>
<div class="headerbar">
	<h1><?=lang('vechicles')?></h1>
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
					<div class="form-group">
						<label class="col-sm-2 control-label"><?=lang('name');?> </label>
						<div class="col-sm-4">
							<input type="hidden" name="id" value="<?php echo $this->mdl_vehicles->form_value('id'); ?>" />
							<?php echo form_input(array('name'=>'name', 'required'=>true, 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_vehicles->form_value('name'))); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"><?=lang('brand');?></label>
						<div class="col-sm-4">
							<input type="hidden" name="id" value="<?php echo $this->mdl_vehicles->form_value('id'); ?>" />
							<?php echo form_input(array('name'=>'brand', 'required'=>true, 'class'=>'form-control', $readonly=>true, 'value'=>$this->mdl_vehicles->form_value('brand'))); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"><?=lang('min_passengers');?></label>
						<div class="col-sm-4">
							<?php echo form_input(array('name'=>'min_passengers', 'type'=>'number', 'required'=>true, 'class'=>'form-control', $readonly=>true, 'min'=>1, 'value'=>$this->mdl_vehicles->form_value('min_passengers'))); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"><?=lang('max_passengers');?> </label>
						<div class="col-sm-4">
							<?php echo form_input(array('name'=>'max_passengers', 'type'=>'number','required'=>true, 'class'=>'form-control', $readonly=>true, 'min'=>2, 'value'=>$this->mdl_vehicles->form_value('max_passengers'))); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"><?=lang('luggage');?> </label>
						<div class="col-sm-4">
							<?php echo form_input(array('name'=>'luggage','type'=>'number', 'required'=>true, 'class'=>'form-control', $readonly=>true, 'min'=>1, 'value'=>$this->mdl_vehicles->form_value('luggage'))); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"><?=lang('image');?> </label>
						<div class="col-sm-4">
							<?php 
								if ($readonly != 'readonly') {
									echo form_upload(array('name'=>'image','class'=>'form-control file2 inline btn btn-primary','data-label'=>"<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files"));	
								}
							?>
							<?php if ($this->mdl_vehicles->form_value('image')) { ?>
									<img src="<?php echo $this->mdl_settings->setting('site_url'); ?>/assets/cc/images/vehicles/<?php echo $this->mdl_vehicles->form_value('image');?>" width="150" style="padding-top:10px;"/>
							<?php } ?>
						</div>
					</div>

					<div class="panel minimal minimal-gray">
						<div class="panel-heading">
							<div class="panel-title"></div>
							<div class="panel-options">
								
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-1" data-toggle="tab">EN</a></li>
									<li><a href="#tab-2" data-toggle="tab">ES</a></li>
									<li><a href="#tab-3" data-toggle="tab">DE</a></li>
									<li><a href="#tab-4" data-toggle="tab">FR</a></li>
								</ul>
							</div>
						</div>
						<div class="panel-body">
							<div class="tab-content">
								<div class="tab-pane active" id="tab-1">
									<?php $this->layout->load_view('vehicles/language_fields',array('language'=>'en')); ?>
								</div>
								<div class="tab-pane" id="tab-2">
									<?php $this->layout->load_view('vehicles/language_fields',array('language'=>'es')); ?>
								</div>
								<div class="tab-pane" id="tab-3">
									<?php $this->layout->load_view('vehicles/language_fields',array('language'=>'de')); ?>
								</div>
								<div class="tab-pane" id="tab-4">
									<?php $this->layout->load_view('vehicles/language_fields',array('language'=>'fr')); ?>
								</div>
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
