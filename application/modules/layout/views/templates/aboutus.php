<?php
  $this->load->view('header');
  if ($content) {
?>
    <div class="container" id="aboutus">
      <!-- <div class="row">
        <div class="col-sm-12 text-justify parajustigy"><p><?php //echo $content['content']; ?></p></div>
      </div> -->
      <div class="row aboutusimg parajustigy">
        <?php
          $result = explode('</p>', $content['subcontent']);
          foreach($result as $key=>$value) { ?>
            <div class="col-sm-12">
                <?php echo $value; ?>
            </div>
        <?php } ?>
      </div>
	</div>
<?php 
  } 
  $this->load->view('footer');
?>
