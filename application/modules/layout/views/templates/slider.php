<?php
  $ln = $this->uri->segment(1);
  if(!$ln || $ln == ""){	$ln = "es"; }
  //print_r($sliders);die;
?>
<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2500">
        <div class="carousel-inner" role="listbox">
        <?php
            $count = 0;
            $active_class = 'active';
            foreach ($sliders as $slider) {
            $count++;
            
            if ($ln == 'es') {
              $slogan = $slider->slogan_es;
            } else {
              $slogan = $slider->slogan_en;
            }

            ?>     
            <div class="item <?php echo $active_class; ?>">
                <div style="background:url(<?php echo IMAGEPATH.'homepage/slider/'.$slider->image;?>);background-repeat: no-repeat;background-position: center top;background-size: cover;" class="carousel-image cs-item">&nbsp;</div>
                <div class="container" style="height:100vh;">
                    <div class="sliderSection">
                        <img src="<?php echo IMAGEPATH.'header/sliders/'.$count.".png" ?>" />
                        <p class="sliderSubtitle"><?php echo $slogan; ?></p>
                        <?php /*
                        <p><a class="btn btn-lg" href="<?php echo site_url($ln."/reservation"); ?>" role="button"><?php echo lang('book_now'); ?></a></p> */ ?>
                    </div>
                </div>
            </div>
            <?php $active_class = ''; } ?>
        </div>
    </div>
