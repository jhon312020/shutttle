<?php
$readonly = ($readonly)?'readonly':'';
$disabled = ($readonly)?'disabled':'';
?>
<div class="headerbar">
	<h1><?php echo lang('booking_extras_info'); ?></h1>
</div>
<form method="post" class="form-horizontal" enctype="multipart/form-data" >
	<div class="row">
		<?php echo $this->layout->load_view('layout/alerts'); ?>
		<div class="col-md-12">
			<div class="panel minimal minimal-gray">
				<div class="panel-heading"></div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('price'); ?>: </label>
						<div class="col-sm-5">
							<?php echo form_input(array('name'=>'price', 'class'=>'form-control', 'value'=>$this->mdl_booking_extras->form_value('price'), $readonly=>true)); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('type'); ?>: </label>
						<div class="col-sm-5">
							<?php echo form_dropdown('type', array('0'=>'--Select--', '1'=>'Quantity'), $this->mdl_booking_extras->form_value('type'), 'class="form-control" '.$disabled.''); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('image'); ?>: </label>
						<div class="col-sm-5">
							<input name="image" type="file" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" />
							<?php if($this->mdl_booking_extras->form_value('image')){?>
							<img src="<?php echo $path . $this->mdl_booking_extras->form_value('image'); ?>">
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
									<?php $this->layout->load_view('booking_extras/language_fields',array('language'=>'en')); ?>
								</div>
								<div class="tab-pane " id="tab-2">
									<?php $this->layout->load_view('booking_extras/language_fields',array('language'=>'es')); ?>
								</div>
								<div class="tab-pane " id="tab-3">
									<?php $this->layout->load_view('booking_extras/language_fields',array('language'=>'de')); ?>
								</div>
								<div class="tab-pane " id="tab-4">
									<?php $this->layout->load_view('booking_extras/language_fields',array('language'=>'fr')); ?>
								</div>
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
		<div class="col-md-6"></div>
	</div>
</form>
