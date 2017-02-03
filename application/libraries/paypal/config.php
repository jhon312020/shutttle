<?php
  if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above

	// sandbox or live
  	if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '192.168.1.12' || $_SERVER['SERVER_NAME'] == 'http://stage.cygnusinfosystems.com')
		define('PPL_MODE', 'sandbox');
	else
		define('PPL_MODE', 'live');

	if(PPL_MODE=='sandbox'){
		
		define('PPL_API_USER', 'bright-es_api1.proisc.com');
		define('PPL_API_PASSWORD', 'CL9Z5XMUA7GXWSXT');
		define('PPL_API_SIGNATURE', 'AFcWxV21C7fd0v3bYYYRCpSSRl31A6xW0WF-446ecLmr7Ms7xFBUdnLn');
	}
	else{
		
		define('PPL_API_USER', 'hello_api1.pickngo.com');
		define('PPL_API_PASSWORD', 'XRKKHLNT87JW6WJX');
		define('PPL_API_SIGNATURE', 'AdGW3ggVzK6uzgEzbOWEsfhEHs5PARtb.LuL8TLT3SgoZrUlaXFtvE40');
	}
  define('PPL_CURRENCY_CODE', 'EUR');
  define('PPL_LOGO_IMG', IMAGEPATH.'logo.png');
