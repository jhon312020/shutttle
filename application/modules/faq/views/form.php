<form method="post" class="form-horizontal" enctype="multipart/form-data" >

    <div class="headerbar">
        <h1><?php echo lang('faq'); ?></h1>
        
    </div>
	<div class="row">
		<div class="col-sm-12">
			<?php echo $this->layout->load_view('layout/header_buttons'); ?>
		</div>
	</div>
    <div class="content">
        <?php echo $this->layout->load_view('layout/alerts'); ?>
        <div id="userInfo">
			<div class="panel minimal minimal-gray">
				<div class="panel-heading">
				<div class="panel-title">Add <?php echo lang('faq');?></div>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo lang('category'); ?>: </label>
					<div class="col-sm-5">
						<?php
							$isEN = ($this->mdl_settings->setting('default_language') == 'english') ? true : false;
							$options = array(
								''=>'-- Select --',
								'category1' => $isEN ? 'Before my reservation' : 'Antes de mi reserva',
								'category2' => $isEN ? 'The day of my reservation' : 'El dia de mi reserva',
								'category3' => $isEN ? 'After my booking' : 'Despues de mi reserva',
							);
							echo form_dropdown('category', $options, $this->mdl_faq->form_value('category'), 'class="form-control"');
						?>
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
								<?php $this->layout->load_view('faq/language_fields',array('language'=>'en')); ?>
							</div>
							<div class="tab-pane" id="tab-2">
								<?php $this->layout->load_view('faq/language_fields',array('language'=>'es')); ?>
							</div>
							<div class="tab-pane" id="tab-3">
								<?php $this->layout->load_view('faq/language_fields',array('language'=>'de')); ?>
							</div>
							<div class="tab-pane" id="tab-4">
								<?php $this->layout->load_view('faq/language_fields',array('language'=>'fr')); ?>
							</div>
						</div>
					</div>
				</div>				
			</div>
		</div>
    </div>
</form>
