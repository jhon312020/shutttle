<?php
	$template_path = base_url()."assets/cc/";
	$ln = $this->uri->segment(1);
	//echo current_url();die;
	$path = $this->uri->segment(2);
	if($ln=='en'){
		$actual_link = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$full_path_es = str_replace('/en', '/es', $actual_link);
		$full_path_en = $actual_link;
	}
	else{
		$actual_link = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$full_path_en = str_replace('/es', '/en', $actual_link);
		$full_path_es = $actual_link;
	}
	//echo $full_path_en;die;
	if(!$ln || $ln == ""){	$ln = "es"; }
	$title = $this->mdl_settings->setting('site_title');
?>
<div class="navbar-wrapper">
  <div class="container">
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url($ln."/"); ?>">Shuttle</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url($ln."/aboutus"); ?>" class="page-scroll"><?php echo lang('about_us'); ?></a></li>
            <li><a href="<?php echo site_url($ln."/faq"); ?>" class="page-scroll"><?php echo lang('faq'); ?></a></li>
            <li><a href="<?php echo site_url($ln."/contacts"); ?>" class="page-scroll"><?php echo lang('contact'); ?></a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>
<header class="image-bg-fluid-height">
    <img class="img-responsive img-center"  alt="">
</header>

