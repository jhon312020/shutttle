<?php
  $ln = $this->uri->segment(1);
  if(!$ln || $ln == ""){	$ln = "es"; }
?>
<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="<?php echo IMAGEPATH;?>slider.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <p>The best transport between </br>Barcelona Airport and your hotel</p>
              <p><a class="btn btn-lg" href="<?php echo site_url($ln."/"); ?>" role="button">BOOK NOW</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="<?php echo IMAGEPATH;?>slider.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <p>The best transport between </br>Barcelona Airport and your hotel</p>
              <p><a class="btn btn-lg" href="<?php echo site_url($ln."/"); ?>" role="button">BOOK NOW</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="<?php echo IMAGEPATH;?>slider.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <p>The best transport between </br>Barcelona Airport and your hotel</p>
              <p><a class="btn btn-lg" href="#" role="button">BOOK NOW</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
