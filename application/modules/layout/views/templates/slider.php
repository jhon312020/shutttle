<?php
  $ln = $this->uri->segment(1);
  if(!$ln || $ln == ""){	$ln = "es"; }
?>
<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2500">
        <div class="carousel-inner" role="listbox">     
            <div class="item active">
                <div id="csl-item1" class="carousel-image">&nbsp;</div>
                <div class="container">
                    <div class="carousel-caption">
                        <p>SLOGAN 1</p>
                        <p><a class="btn btn-lg" href="<?php echo site_url($ln."/reservation"); ?>" role="button">BOOK NOW</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
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
            </div> 
        </div>
    </div>
