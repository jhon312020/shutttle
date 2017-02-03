<?php
  class paypalRequire {
    public function __construct()
    {
        require_once APPPATH."libraries/paypal/config.php";
        require_once APPPATH."libraries/paypal/functions.php";
    }
  }
