<?php
    define('PPL_LANG', strtoupper($lang));
    define('PPL_RETURN_URL', site_url($lang.'/success/'));
    define('PPL_CANCEL_URL', site_url($lang.'/error/'));
    $this->load->library('paypal/paypalRequire');
    $this->load->library('paypal/paypal');
    $paypal= new paypal();
    //Post Data received from product list page.
    if(_GET('paypal')=='checkout'){
        $products = array();
        // set an item via POST request
        $products[0]['ItemName'] = _POST('itemname'); //Item Name
        $products[0]['ItemPrice'] = _POST('itemprice'); //Item Price
        $products[0]['ItemNumber'] = _POST('itemnumber'); //Item Number
        $products[0]['ItemDesc'] = _POST('itemdesc'); //Item Number
        $products[0]['ItemQty'] = _POST('itemQty'); // Item Quantity
        $products[0]['BookId']  = _POST('BookId'); // Item Quantity
        $charges = array();
        //Other important variables like tax, shipping cost
        $charges['TotalTaxAmount'] = 0;  //Sum of tax for all items in this order. 
        $charges['HandalingCost'] = 0;  //Handling cost for this order.
        $charges['InsuranceCost'] = 0;  //shipping insurance cost for this order.
        $charges['ShippinDiscount'] = 0; //Shipping discount for this order. Specify this as negative number.
        $charges['ShippinCost'] = 0; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
        //------------------SetExpressCheckOut-------------------
        //We need to execute the "SetExpressCheckOut" method to obtain paypal token
        $paypal->SetExpressCheckOut($products, $charges);       
    } elseif(_GET('token')!=''&&_GET('PayerID')!='') {
        
        //------------------DoExpressCheckoutPayment-------------------     
        
        //Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
        //we will be using these two variables to execute the "DoExpressCheckoutPayment"
        //Note: we haven't received any payment yet.
        
        $paypal->DoExpressCheckoutPayment();
    }
?>
