
<?php
$user_name = $this->session->userdata('user_name');
$title = $this->mdl_settings->setting('site_title');
$cms_lang = $this->session->userdata('cms_lang');
$action = $this->uri->segment(2);
$ln = $this->uri->segment(1);
 if(!$ln || $ln == ""){	$ln = "es"; }
/*echo $action;
print_r($header_text_images);die;*/
//echo IMAGEPATH.'header/'.$ln.'/'.$header_text_images[$action];die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shuttleing – Low cost shuttle Barcelona </title>
	<meta name="charset" content="ISO-8859-1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
	<?php
	if($ln != 'es'){
	?>
	<meta name="description" content="Best low cost transport from Barcelona Airport to the City and vice versa. Free Wifi Internet.">
	<meta name="keywords" content="Shuttle, shuttleing, barcelona, driver, transport, taxi, airport, city, transfer, bus">
	<meta name="copyright" content="Shuttleing S.L.">
	<meta name="author" content="Grupo Visualiza">
	<meta name="designer" content="www.grupovisualiza.com">
	<meta name="email" content="info@shuttleing.com">
	<meta name="robots" content="index, follow">
	<meta name="googlebot" content="index, follow">
	<?php
	}
	else{
	?>
	<meta name="description" content="Best low cost transport from Barcelona Airport to the City and vice versa. Free Wifi Internet.">
	<meta name="keywords" content="Shuttle, shuttleing, barcelona, driver, transport, taxi, airport, city, transfer, bus">
	<meta name="copyright" content="Shuttleing S.L.">
	<meta name="author" content="Grupo Visualiza">
	<meta name="designer" content="www.grupovisualiza.com">
	<meta name="email" content="info@shuttleing.com">
	<meta name="robots" content="index, follow">
	<meta name="googlebot" content="index, follow">
	<?php	
	}
	?>
	<meta name="language" content="<?php echo strtoupper($this->uri->segment(1)); ?>">
	<link href="<?php echo base_url(); ?>assets/cc/css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/cc/css/style.css" type="text/css" rel="stylesheet">
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href="<?php echo base_url(); ?>assets/cc/css/ie10-viewport-bug-workaround.css" type="text/css" rel="stylesheet">
  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo base_url(); ?>assets/cc/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>assets/cc/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/cc/css/carousel.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/cc/css/validationEngine.jquery.css" rel="stylesheet">
</head>
<body>
  <?php
    if (isset($content['image']) && $content['image'] != '') {
      $image_name = 'captions/'.$content['image'];
    } else if ($this->session->userdata('user_type') == 2) {
      $image_name = 'captions/collaborators.jpg';
    }else{
      $image_name = 'ready.jpg';
    }
    $this->load->view('menu');
    
  ?>
  <header class="image-bg-fluid-height" style="background: url('<?php echo IMAGEPATH.$image_name; ?>') no-repeat center center scroll;">
	 <?php if (isset($header_text_images) && isset($header_text_images[$action])) { ?>
	  	<img src="<?php echo IMAGEPATH.'header/'.$ln.'/'.$header_text_images[$action]; ?>" class="headerTexto img-center" /> 
		<?php } ?>
	  <!-- <div class="titleFont">HELLO</div>
	  <div class="shuttleingBox"><p>SHUTTLEING.</p></div> -->
    <img class="img-responsive img-center"  alt="">
  </header>
  <?php $this->load->view('collaborators/header'); ?>
