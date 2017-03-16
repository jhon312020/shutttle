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
                <div class="container">
                    <div class="carousel-caption">
                    <!-- <div class="titleFont">Ready?</div>
                    <div class="shuttleingBox"><p>SHUTTLEING.</p></div> -->
                    <img src="<?php echo IMAGEPATH.'header/sliders/'.$count.".png" ?>" class="sliderHeaderTexto img-center" />
                        <p><?php echo $slogan; ?></p>
                        <p><a class="btn btn-lg" href="<?php echo site_url($ln."/reservation"); ?>" role="button"><?php echo lang('book_now1'); ?></a></p>
                    </div>
                </div>
            </div>
            <?php $active_class = ''; } ?>
            <!--<div class="item">
                <div id="csl-item2" class="carousel-image">&nbsp;</div>
                <div class="container">
                    <div class="carousel-caption">
                        <p>SLOGAN 2</p>
                        <p><a class="btn btn-lg" href="<?php echo site_url($ln."/reservation"); ?>" role="button">BOOK NOW</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div id="csl-item3" class="carousel-image">&nbsp;</div>
                <div class="container">
                    <div class="carousel-caption">
                        <p>SLOGAN 3</p>
                        <p><a class="btn btn-lg" href="<?php echo site_url($ln."/reservation"); ?>" role="button">BOOK NOW</a></p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
