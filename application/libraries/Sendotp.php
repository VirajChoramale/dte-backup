<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sendotp{
	public function send($msg, $num){
		$apiKey       = urlencode('MzY0YzQyNWE3MjUzNjg1OTM4MzI2YjZmNmQzMTVhNzM=');
        $numbers      = array($num);
        $sender       = urlencode('MSBTEB');
        $message=rawurlencode($msg);
        $numbers = implode(',', $numbers);
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
	}
}
?>