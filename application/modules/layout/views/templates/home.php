<?php
	$ln = $this->uri->segment(1);
	if(!$ln || $ln == ""){	$ln = "es"; }
	$this->load->view('home_header');
?>
<div class="container">
	<div class="row">
	<p class="homepara">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
	<div class="col-sm-12 home-label">
		<div class="col-sm-4"><p><span>20+</span><br>People</p><span>|<span></div>
		<div class="col-sm-4"><p><span>17</span><br>Nationalities</p>|</div>
		<div class="col-sm-4"><p><span>300+</span><br>Trips</p></div>
	</div>
	</div>
</div>
<div class="container">
  <div class="row">
    <!-- content -->
    <section class="main">
      <div class="grid-custom">
        <h2 class="head_2">News</h2>
        <div class="row col-sm-10 col-sm-offset-1">
          <?php $img_url = IMAGEPATH.'homepage/boxes/'; ?>
          <?php foreach($boxes as $box) {   
              if ($ln =='es') { 
                $image_name = $box->image_es;
                $title = $box->title_es;
                $content = $box->text_above_banner_es;
              } else {
                $image_name = $box->image;
                $title = $box->title_es;
                $content = $box->text_above_banner_es; 
              }
            ?>
          <div class="col-sm-4 col-xs-6"><img src="<?php echo $img_url.'/'.$image_name; ?>" alt="" class="img-responsive">
            <div class="text">
              <h1><?php echo $title; ?></h1>
                <p><?php echo $content; ?></p>    
            </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
	</div>
</div>
<?php
  $this->load->view('footer');
?>
