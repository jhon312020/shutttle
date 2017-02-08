<?php
$user_name = $this->session->userdata('user_name');
$title = $this->mdl_settings->setting('site_title') . " | Admin Panel";
$cms_lang = $this->session->userdata('cms_lang');
//$language = array('english'=>'en', 'spanish'=>'es');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="<?php echo $title; ?>" />
	<meta name="author" content="" />
	
	<!--<title><?php echo $title; ?></title>-->
	
	<?php
	if($cms_lang == 'english'){
	?>
	<title><?php echo $title; ?> Shuttle </title>
	<meta name="description" content="Shuttle">
	<meta name="keywords" content="Shuttle">
	<meta name="robot" content="index,follow">
	<meta name="copyright" content="Copyright © Shuttle">
	<meta name="author" content="Grupo Visualiza - www.grupovisualiza.com">
	<meta name="generator" content="www.onlinemetatag.com">
	<meta name="language" content="EN">
	<?php
	}
	else{
	?>
	<title><?php echo $title; ?>  Shuttle </title>
	<meta name="description" content="Shuttle">
	<meta name="keywords" content="Shuttle">
	<meta name="robot" content="index,follow">
	<meta name="copyright" content="Copyright © Shuttle">
	<meta name="author" content="Grupo Visualiza - www.grupovisualiza.com">
	<meta name="generator" content="www.onlinemetatag.com">
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
  $this->load->view('collaborators/header');  
	$this->load->view('menu');
	$this->load->view('slider'); 
  ?>
