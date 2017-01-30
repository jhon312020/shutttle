<?php
	$template_path = base_url()."assets/cc/";
	$ln = $this->uri->segment(1);
	if(!$ln || $ln == ""){	$ln = "es"; }
	$this->load->view('header');
?>

<?php
  foreach($bottom_data as $data) {
?>
    <div class="container" id="aboutus">
      <div class="row">
        <div class="col-sm-12 text-justify sub-head"><p><?php echo ($ln == 'en')?$data->content_en:$data->content_es; ?></p></div>
      </div>
      <div class="row aboutusimg">
        <?php
          $subcontent = ($ln == 'en')?$data->subcontent_en:$data->subcontent_es;
          $result = explode('</p>', $subcontent);
          foreach($result as $key=>$value) { ?>
            <div class="col-sm-12 parajustigy">
                <?php echo $value; ?>
            </div>
        <?php } ?>
      </div>
	</div>
<?php } ?>
<?php $this->load->view('footer');?>
