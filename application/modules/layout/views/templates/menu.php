<?php
  $actual_link = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  if($lang == 'en') {
		$full_path_es = str_replace('/en', '/es', $actual_link);
		$full_path_en = $actual_link;
	} else {
		$full_path_en = str_replace('/es', '/en', $actual_link);
		$full_path_es = $actual_link;
	}
?>
<div class="navbar-wrapper">
  <div style="margin-left:20px;">
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url($lang."/"); ?>"><img src="<?php echo IMAGEPATH; ?>logo.jpg" class="img-responsive"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url($lang."/aboutus"); ?>" class="page-scroll"><?php echo lang('about_us'); ?></a></li>
            <li><a href="<?php echo site_url($lang."/faq"); ?>" class="page-scroll"><?php echo lang('faq'); ?></a></li>
            <li><a href="<?php echo site_url($lang."/contacts"); ?>" class="page-scroll"><?php echo lang('contact'); ?></a></li>
          </ul>
        </div>
        <div class="navbar-lang">
        <a href="<?php echo $full_path_es; ?>"><img src="<?php echo IMAGEPATH; ?>spain.png"></a> 
        <a href="<?php echo $full_path_en; ?>"><img src="<?php echo IMAGEPATH; ?>english.png"></a>
      </div>
      </div>
    </nav>
  </div>
</div>
