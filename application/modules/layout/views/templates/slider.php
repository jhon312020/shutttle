<?php
  $ln = $this->uri->segment(1);
  if(!$ln || $ln == ""){	$ln = "es"; }
  //print_r($sliders);die;
?>
<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide carousel-fade">
        <div class="carousel-inner" role="listbox">     
            <div class="item active">
                <div class="container" style="height:100vh;">
                    <div class="sliderSection">
						<img src="<?php echo IMAGEPATH.'header/sliders/1.png' ?>" />
                        <p class="sliderSubtitle">The best shuttle between the airport the the city</p>
                        <p><a class="btn btn-lg" href="" role="button">BOOK NOW</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
