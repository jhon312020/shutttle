<?php
$name = (is_numeric($this->uri->segment(4)))?$this->uri->segment(5):$this->uri->segment(4);
?>
<form method="post" class="form-horizontal" enctype="multipart/form-data" >
	<div class="headerbar">
		<h1><?php echo lang(($name == 'aboutus')?'about_us_title':$name); ?></h1>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="pull-right">
				<button class="btn btn-primary" name="btn_submit" value="1"><i class="icon-ok icon-white"></i> <?php echo lang('save'); ?></button>
				<?php
				if(!in_array($name, array('franchises', 'aboutus', 'concierge', 'terms_and_conditions'))){
				?>
				<button class="btn btn-danger" name="btn_cancel" value="1"><i class="icon-remove icon-white"></i> <?php echo lang('cancel'); ?></button>
				<?php
				}
				?>
			</div>
		</div>
	</div>
    <div class="content">
        <?php echo $this->layout->load_view('layout/alerts'); ?>
        <div id="userInfo">
			<div class="panel minimal minimal-gray">
				<!--<div class="panel-heading">
					<div class="panel-title">Add <?php echo lang($name);?></div>
				</div>-->
			<div class="panel-body">
				<?php if($name != 'faq'){ ?>
				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo lang('image'); ?>: </label>
					<div class="col-sm-5">
						<input name="logo" type="file" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" />
						<?php if($this->mdl_captions->form_value('image')){ ?>
						<img src="<?php echo $path . $this->mdl_captions->form_value('image'); ?>" width="150">
						<?php } ?>
					</div>
				</div>
				<?php } ?>
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
									<?php $this->layout->load_view('captions/language_fields',array('language'=>'en','name'=>$name)); ?>
								</div>
								<div class="tab-pane" id="tab-2">
									<?php $this->layout->load_view('captions/language_fields',array('language'=>'es','name'=>$name)); ?>
								</div>
								<div class="tab-pane" id="tab-3">
									<?php $this->layout->load_view('captions/language_fields',array('language'=>'de','name'=>$name)); ?>
								</div>
								<div class="tab-pane" id="tab-4">
									<?php $this->layout->load_view('captions/language_fields',array('language'=>'fr','name'=>$name)); ?>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
    </div>
</form>
