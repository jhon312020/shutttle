<?php
$user_name = $this->session->userdata('user_name');
$title = $this->mdl_settings->setting('site_title');
$cms_lang = $this->session->userdata('cms_lang');
//$language = array('english'=>'en', 'spanish'=>'es');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shuttleing – Low cost shuttle Barcelona </title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php
	if($cms_lang == 'english'){
	?>
	<meta name="description" content="Best low cost transport from Barcelona Airport to the City and vice versa. Free Wifi Internet.">
	<meta name="keywords" content="Shuttle, shuttleing, barcelona, driver, transport, taxi, airport, city, transfer, bus">
	<meta name="copyright" content="Shuttleing S.L.">
	<meta name="author" content="Grupo Visualiza">
	<meta name="designer" content="www.grupovisualiza.com">
	<meta name="email" content="info@shuttleing.com">
	<meta name="robots" content="index, follow">
	<meta name="googlebot" content="index, follow">
	<meta name="language" content="EN">
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
	<meta name="language" content="ES">
	<?php	
	}
	?>
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
	$this->load->view('menu');
	$this->load->view('slider'); 
	$this->load->view('collaborators/header');  
  ?>
  <style>
  .top_col_menu {
  	margin-bottom: 0px;
  }
  </style>
