<?php
  $ln = $this->uri->segment(1);
  if(!$ln || $ln == ""){	$ln = "es"; }
?>
<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <!-- <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
      </ol> -->
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
            } ?>
        <div class="item <?php echo $active_class; ?>">
          <img class="slide-<?php echo $count;?>" src="<?php echo IMAGEPATH.'homepage/slider/'.$slider->image;?>" alt="Slide <?php echo $count;?>">
          <div class="container">
            <div class="carousel-caption">
              <p><?php echo $slogan; ?></p>
              <p><a class="btn btn-lg" href="<?php echo site_url($ln."/reservation"); ?>" role="button">BOOK NOW</a></p>
            </div>
          </div>
        </div>
        <?php $active_class = ''; } ?>
      </div>
      <!-- <a class="left carousel-control" href="#" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span> -->
      </a>
    </div><!-- /.carousel -->
