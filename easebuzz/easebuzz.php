<?php
    //ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
	//ob_start();
	//include('index.php');
	//ob_end_clean();
	//$CI =& get_instance();
	//header('Content-Type: application/json');
	$hostname='localhost'; 
	$username='shortmsbte'; 
	$password='Shortmsbte!@#$'; 
	$dbname='shortmsbte_student_service'; 
	mysql_connect($hostname,$username, $password); 
	mysql_select_db($dbname);
	
	$dt['app_id']   = $_POST['udf1'];
	$dt['type']     = $_POST['udf3'];
	$dt['sub_type'] = $_POST['udf4'];
	$dt['trans_id'] = $_POST['txnid'];
	$dt['email']    = $_POST['email'];
	$dt['phone']    = $_POST['phone'];
	$dt['amt']      = $_POST['amount'];
	$dt['usename']  = $_POST['udf1'];

	$sql = "INSERT INTO `paystatus`(app_id,`trans_id`, `amt`,`email`, `phone`, `username`,`type`) VALUES ('$dt[app_id]','$dt[trans_id]','$dt[amt]','$dt[email]','$dt[phone]','$dt[usename]','$dt[type]')";

	mysql_query($sql);
	
	/*if($dt['region_code'] == 1){
		$_POST['split_payments'] = '{"msbte_mumbai":25000}';
	}else if($dt['region_code'] == 2){
		$_POST['split_payments'] = '{"msbte_pune":25000}';
	}else if($dt['region_code'] == 3){
		$_POST['split_payments'] = '{"msbte_nagpur":25000}';
	}else if($dt['region_code'] == 4){
		$_POST['split_payments'] = '{"msbte_aurangabad":25000}';
	}*/
	
	///$CI->db->insert('paystatus', $dt);

    //echo "<pre>";
    //print_r($_POST);
	//die();

    include_once('easebuzz-lib/easebuzz_payment_gateway.php');

    /*
    * Create object for call easepay payment gate API and Pass required data into constructor.
    * Get API response.
    *  
    * param string $_GET['apiname'] - holds the API name.
    * param  string $MERCHANT_KEY - holds the merchant key.
    * param  string $SALT - holds the merchant salt key.
    * param  string $ENV - holds the env(enviroment).
    * param  string $_POST - holds the form data.
    *
    * ##Return values
    *   
    * - return array ApiResponse['status']== 1 successful.
    * - return array ApiResponse['status']== 0 error.
    *
    * @param string $_GET['apiname'] - holds the API name.
    * @param  string $MERCHANT_KEY - holds the merchant key.
    * @param  string $SALT - holds the merchant salt key.
    * @param  string $ENV - holds the env(enviroment).
    * @param  string $_POST - holds the form data.
    *
    * @return array ApiResponse['status']== 1 successful. 
    * @return array ApiResponse['status']== 0 error. 
    *
    */
    if(!empty($_POST) && (sizeof($_POST) > 0)){

        /*
        * There are three approch to call easebuzz API.
        *
        * 1. using hidden api_name which is $_POST from form.
        * 2. using pass api_name into URL.
        * 3. using extract html file name then based on file name call API.
        *
        */

        // first way
        // $apiname = trim(htmlentities($_POST['api_name'], ENT_QUOTES));

        // second way
        $apiname = trim(htmlentities($_GET['api_name'], ENT_QUOTES));

        // third way
        // $url_link = $_SERVER['HTTP_REFERER'];
        // $apiname = explode('.', ( end( explode( '/',$url_link) ) ) )[0];
        // $apiname = trim(htmlentities($apiname, ENT_QUOTES));


        /*
        * Based on API call change the Merchant key and salt key for testing(initiate payment).
        */

        $MERCHANT_KEY = "I0Q3WKCB4C";
        $SALT = "2E63EJQCRJ";
        $ENV = "test";    // setup test enviroment (testpay.easebuzz.in).
        
        //$MERCHANT_KEY = "QR86325HBS";
        //$SALT = "Y7ODKRES6J";
        //$ENV = "prod";    
        
        
        //$ENV = "prod";  // setup production enviroment (pay.easebuzz.in).
 
        $easebuzzObj = new Easebuzz($MERCHANT_KEY, $SALT, $ENV);

        if($apiname === "initiate_payment"){

          //  print_r($_POST);
           // dump();
            /*  Very Important Notes
            * 
            * Post Data should be below format.
            *
                Array ( [txnid] => T3SAT0B5OL [amount] => 100.0 [firstname] => jitendra [email] => test@gmail.com [phone] => 1231231235 [productinfo] => Laptop [surl] => http://localhost:3000/response.php [furl] => http://localhost:3000/response.php [udf1] => aaaa [udf2] => aa [udf3] => aaaa [udf4] => aaaa [udf5] => aaaa [address1] => aaaa [address2] => aaaa [city] => aaaa [state] => aaaa [country] => aaaa [zipcode] => 123123 ) 
            */
            $easebuzzObj->initiatePaymentAPI($_POST);

        }else if($apiname === "transaction"){ 

            /*  Very Important Notes
            * 
            * Post Data should be below format.
            *
                Array ( [txnid] => TZIF0SS24C [amount] => 1.03 [email] => test@gmail.com [phone] => 1231231235 )
            */
            $result = $easebuzzObj->transactionAPI($_POST);

            easebuzzAPIResponse($result);
     
        }else if($apiname === "transaction_date" || $apiname === "transaction_date_api"){ 

            /*  Very Important Notes
            * 
            * Post Data should be below format.
            *
                Array ( [merchant_email] => jitendra@gmail.com [transaction_date] => 06-06-2018 )
            */
            $result = $easebuzzObj->transactionDateAPI($_POST);

            easebuzzAPIResponse($result);
                       
        }else if($apiname === "refund"){
            
            /*  Very Important Notes
            * 
            * Post Data should be below format.
            *
                Array ( [txnid] => ASD20088 [refund_amount] => 1.03 [phone] => 1231231235 [email] => test@gmail.com [amount] => 1.03 )
            */
            $result = $easebuzzObj->refundAPI($_POST);

            easebuzzAPIResponse($result);
                       
        }else if($apiname === "payout"){

            /*  Very Important Notes
            * 
            * Post Data should be below format.
            *
               Array ( [merchant_email] => jitendra@gmail.com [payout_date] => 08-06-2018 )
            */
            $result = $easebuzzObj->payoutAPI($_POST);

            easebuzzAPIResponse($result);
                       
        }else{

            echo '<h1>You called wrong API, Pleae try again</h1>';
        }

    }else{
        echo '<h1>Please fill all mandatory fields.</h1>';
    }


    /*
    *  Show All API Response except initiate Payment API
    */
    function easebuzzAPIResponse($data){
        print_r($data);
    }

?>
