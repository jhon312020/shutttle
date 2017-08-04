<!-- <ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo site_url('admin/dashboard'); ?>"><i class="entypo-home"></i><?php echo lang('home'); ?></a>
	</li>
	<li>
		<a href="<?php echo site_url('admin/homepage/'.$type); ?>"><?php echo ($type == 'box') ? 'News' : lang($type); ?></a>
	</li>
	<li class="active">
		<strong><?php echo lang('form'); ?></strong>
	</li>
</ol> -->
<?php
//echo $this->mdl_box->form_value('box_sort');die;
?>
<form method="post" class="form-horizontal" enctype="multipart/form-data">

    <div class="headerbar">
        <h1><?php echo ($type == 'box') ? lang('news') : lang($type); ?></h1>
        
    </div>
	<div class="row">
		<div class="col-sm-12">
			<?php echo $this->layout->load_view('layout/header_buttons'); ?>
		</div>
	</div>
    <div class="content">

        <?php echo $this->layout->load_view('layout/alerts'); ?>

        <div id="userInfo">
        	<?php $typeText = ($type == 'box') ? 'News' : lang($type);?>
			<div class="panel minimal minimal-gray">
				<div class="panel-heading">
				<div class="panel-title"><?php //echo ($id) ? 'Update '. $typeText : 'Add '. $typeText; ?></div>
			</div>
			
			<div class="panel-body">
				<?php if($type == 'slider') { ?>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('slogan'); ?> (En): </label>
						<div class="col-sm-5">
							<input class="form-control" type="text" id="slogan_en" name="slogan_en" value="<?php echo $this->mdl_slider->form_value('slogan_en'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Eslogan (Es): </label>
						<div class="col-sm-5">
							<input class="form-control" type="text" id="slogan_es" name="slogan_es" value="<?php echo $this->mdl_slider->form_value('slogan_es'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('slogan'); ?> (De): </label>
						<div class="col-sm-5">
							<input class="form-control" type="text" id="slogan_de" name="slogan_de" value="<?php echo $this->mdl_slider->form_value('slogan_de'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('slogan'); ?> (Fr): </label>
						<div class="col-sm-5">
							<input class="form-control" type="text" id="slogan_fr" name="slogan_fr" value="<?php echo $this->mdl_slider->form_value('slogan_fr'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('image'); ?>: </label>
						<div class="col-sm-5">
							<input name="image" type="file" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" />
							<?php if($this->mdl_slider->form_value('image')){?>
								<img src="<?php echo $path . '/slider/' . $this->mdl_slider->form_value('image'); ?>" width="150">
							<?php } ?>
						</div>
					</div>
				<?php } else if($type == 'box') { ?>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('view_home'); ?></label>
						<div class="col-sm-5">
							<label>
								<input type="radio" name="show_home" value="image" <?php echo $this->mdl_box->form_value('show_home') == 'image' ? 'checked':''; ?> style="position:relative;top:2px;margin-right:5px;" readonly="1"><?php echo lang('image'); ?>
							</label>&nbsp;&nbsp;&nbsp;&nbsp;
							<label><input type="radio" name="show_home" <?php echo $this->mdl_box->form_value('show_home') == 'video' ? 'checked':''; ?> value="video" style="position:relative;top:2px;margin-right:5px;" readonly="1"><?php echo lang('videos'); ?>
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('url'); ?>: </label>
						<div class="col-sm-5">
							<input class="form-control" type="text" id="link" name="link" value="<?php echo $this->mdl_box->form_value('link'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('sort_news'); ?>: </label>
						<div class="col-sm-5">
							<select name="box_sort" class="form-control">
								<?php 
								foreach(range(1,$boxcnt['boxcnt']) as $boxcnt) {
									$selected = $boxcnt==$this->mdl_box->form_value('box_sort')?'selected':'';
									echo "<option value='$boxcnt' $selected>$boxcnt</option>";
								}
								?>
							</select>
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
									<div class="form-group">
										<label class="col-sm-3 control-label"><?php echo lang('title'); ?> (En): </label>
										<div class="col-sm-5">
											<input class="form-control" type="text" id="title" name="title_en" value="<?php echo $this->mdl_box->form_value('title_en'); ?>">
										</div>
									</div>
									<div class="form-group homeDiv imageDiv" style="<?php echo $this->mdl_box->form_value('show_home') == 'image' || $this->mdl_box->form_value('show_home') == null ? '':'display:none;'; ?>">
										<label class="col-sm-3 control-label"><?php echo lang('image_en'); ?> (EN): </label>
										<div class="col-sm-5">
											<input name="image_en" type="file" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" value="<?php echo $this->mdl_box->form_value('image_en'); ?>"/>
											<?php if($this->mdl_box->form_value('image_en')){?>
												<img src="<?php echo $path . 'boxes/' . $this->mdl_box->form_value('image_en'); ?>" width="150">
											<?php } ?>
										</div>
									</div>
									<div class="form-group homeDiv videoDiv" style="<?php echo $this->mdl_box->form_value('show_home') == 'video' ? '':'display:none;'; ?>">
										<label class="col-sm-3 control-label"><?php echo lang('video_en'); ?> (EN): </label>
										<div class="col-sm-5">
											<input class="form-control" type="text" id="video_en" name="video_en" value="<?php echo htmlspecialchars($this->mdl_box->form_value('video_en')); ?>">
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab-2">
									<div class="form-group">
										<label class="col-sm-3 control-label"><?php echo lang('title'); ?> (Es): </label>
										<div class="col-sm-5">
											<input class="form-control" type="text" id="title_es" name="title_es" value="<?php echo $this->mdl_box->form_value('title_es'); ?>">
										</div>
									</div>
									<div class="form-group homeDiv imageDiv" style="<?php echo $this->mdl_box->form_value('show_home') == 'image' || $this->mdl_box->form_value('show_home') == null ? '':'display:none;'; ?>">
										<label class="col-sm-3 control-label"><?php echo lang('image'); ?> (ES): </label>
										<div class="col-sm-5">
											<input name="image_es" type="file" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" value="<?php echo $this->mdl_box->form_value('image_es'); ?>"/>
											<?php if($this->mdl_box->form_value('image_es')){?>
												<img src="<?php echo $path . 'boxes/' . $this->mdl_box->form_value('image_es'); ?>" width="150">
											<?php } ?>
										</div>
									</div>
									<div class="form-group homeDiv videoDiv" style="<?php echo $this->mdl_box->form_value('show_home') == 'video' ? '':'display:none;'; ?>">
										<label class="col-sm-3 control-label"><?php echo lang('video'); ?> (Es): </label>
										<div class="col-sm-5">
											<input class="form-control" type="text" id="video_es" name="video_es" value="<?php echo htmlspecialchars($this->mdl_box->form_value('video_es')); ?>">
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab-3">
									<div class="form-group">
										<label class="col-sm-3 control-label"><?php echo lang('title'); ?> (DE): </label>
										<div class="col-sm-5">
											<input class="form-control" type="text" id="title_de" name="title_de" value="<?php echo $this->mdl_box->form_value('title_de'); ?>">
										</div>
									</div>
									<div class="form-group homeDiv imageDiv" style="<?php echo $this->mdl_box->form_value('show_home') == 'image' || $this->mdl_box->form_value('show_home') == null ? '':'display:none;'; ?>">
										<label class="col-sm-3 control-label"><?php echo lang('image'); ?> (DE): </label>
										<div class="col-sm-5">
											<input name="image_de" type="file" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" value="<?php echo $this->mdl_box->form_value('image_de'); ?>"/>
											<?php if($this->mdl_box->form_value('image_de')){?>
												<img src="<?php echo $path . 'boxes/' . $this->mdl_box->form_value('image_de'); ?>" width="150">
											<?php } ?>
										</div>
									</div>
									<div class="form-group homeDiv videoDiv" style="<?php echo $this->mdl_box->form_value('show_home') == 'video' ? '':'display:none;'; ?>">
										<label class="col-sm-3 control-label"><?php echo lang('video'); ?> (DE): </label>
										<div class="col-sm-5">
											<input class="form-control" type="text" id="video_de" name="video_de" value="<?php echo htmlspecialchars($this->mdl_box->form_value('video_de')); ?>">
										</div>
									</div>
								</div>
								<div class="tab-pane " id="tab-4">
									<div class="form-group">
										<label class="col-sm-3 control-label"><?php echo lang('title'); ?> (FR): </label>
										<div class="col-sm-5">
											<input class="form-control" type="text" id="title_fr" name="title_fr" value="<?php echo $this->mdl_box->form_value('title_fr'); ?>">
										</div>
									</div>
									<div class="form-group homeDiv imageDiv" style="<?php echo $this->mdl_box->form_value('show_home') == 'image' || $this->mdl_box->form_value('show_home') == null ? '':'display:none;'; ?>">
										<label class="col-sm-3 control-label"><?php echo lang('image'); ?> (FR): </label>
										<div class="col-sm-5">
											<input name="image_fr" type="file" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" value="<?php echo $this->mdl_box->form_value('image_fr'); ?>"/>
											<?php if($this->mdl_box->form_value('image_fr')){?>
												<img src="<?php echo $path . 'boxes/' . $this->mdl_box->form_value('image_fr'); ?>" width="150">
											<?php } ?>
										</div>
									</div>
									<div class="form-group homeDiv videoDiv" style="<?php echo $this->mdl_box->form_value('show_home') == 'video' ? '':'display:none;'; ?>">
										<label class="col-sm-3 control-label"><?php echo lang('video'); ?> (FR): </label>
										<div class="col-sm-5">
											<input class="form-control" type="text" id="video_fr" name="video_fr" value="<?php echo htmlspecialchars($this->mdl_box->form_value('video_fr')); ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } else if($type == 'banner') { ?>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('image'). " (EN)"; ?>: </label>
						<div class="col-sm-5">
							<input name="image" type="file" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" value="<?php echo $this->mdl_box->form_value('image'); ?>"/>
							<?php if($this->mdl_box->form_value('image')){?>
								<img src="<?php echo $path . '/banner/' . $this->mdl_box->form_value('image'); ?>" width="150">
							<?php } ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('url'). " (EN)"; ?>: </label>
						<div class="col-sm-5">
							<input class="form-control" type="text" id="link" name="link" value="<?php echo $this->mdl_box->form_value('link'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('text_above_banner') . " (EN)"; ?>: </label>
						<div class="col-sm-5">
							<input class="form-control" type="text" id="text_above_banner" name="text_above_banner" value="<?php echo $this->mdl_box->form_value('text_above_banner'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('image'). " (ES)"; ?>: </label>
						<div class="col-sm-5">
							<input name="image_es" type="file" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" value="<?php echo $this->mdl_box->form_value('image_es'); ?>"/>
							<?php if($this->mdl_box->form_value('image_es')){?>
								<img src="<?php echo $path . '/banner/' . $this->mdl_box->form_value('image_es'); ?>" width="150">
							<?php } ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('url'). " (ES)"; ?>: </label>
						<div class="col-sm-5">
							<input class="form-control" type="text" id="link_es" name="link_es" value="<?php echo $this->mdl_box->form_value('link_es'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo lang('text_above_banner') . " (ES)"; ?>: </label>
						<div class="col-sm-5">
							<input class="form-control" type="text" id="text_above_banner_es" name="text_above_banner_es" value="<?php echo $this->mdl_box->form_value('text_above_banner_es'); ?>">
						</div>
					</div>
				<?php } else { echo "Form type has not mentioned!"; } ?>
			</div>
		</div>
    </div>
</form>
<script>
$(document).ready(function(){
	$('[name=show_home]').change(function(){
		if($(this).val() == 'image'){
			$('.homeDiv').hide();
			$('.imageDiv').show();
		} else {
			$('.homeDiv').hide();
			$('.videoDiv').show();
		}
	})
})
</script>