<?php
	//echo $lang;
	$template_path = base_url()."assets/cc/";
	$ln = $this->uri->segment(1);
	//echo $ln;die;
	if(!$ln || $ln == ""){	$ln = "es"; }
	$this->load->view('header');
	$modalForm = site_url($ln.'/reserva01');
	$terminal_array = array('' => 'Select Terminal', 'Barcelona Airport Terminal 1' => 'Barcelona Airport Terminal 1', 'Barcelona Airport Terminal 2'=>'Barcelona Airport Terminal 2');
?>
<div class="container">
    <div class="row">
		<div class="col-md-12">

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active"><span class="step">1</span>
							<a href="#tab_default_1" data-toggle="tab">
							CHOOSE YOUR ROUTE</a>
						</li>
						<li><span class="step">2</span>
							<a href="#tab_default_2" data-toggle="tab">
							ROUTE SCHEDULE</a>
						</li>
						<li><span class="step">3</span>
							<a href="#tab_default_3" data-toggle="tab">
							INFO AND PAYMENT</a>
						</li>
					</ul>
					<div class="tab-content">
						<?php
              $this->load->view('reservation_tab1');
              $this->load->view('reservation_tab2');
              $this->load->view('reservation_tab3');
            ?>
          </div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type='text/javascript'>
  /* Intializing the javascript variables using php */
  var siteUrl = '<?php echo site_url($ln);?>'; 
  var baby_error= "";
</script>
<?php $this->load->view('footer');?>
