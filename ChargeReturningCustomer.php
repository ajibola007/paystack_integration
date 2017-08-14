<?php

$result = array();

// Pass the customer's authorisation code, email and amount
$email='a@b.com';
$postdata =  array('authorization_code' => 'AUTH_xxxxxxxxxx',
					'email' => $email,
					'amount' => 1000,
					"reference" => time().$email);

$ch = curl_init();

if(!function_exists("curl_init")) die("cURL extension is not installed");

curl_setopt($ch, CURLOPT_URL,"https://requestb.in/18pgvzi1");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postdata)); //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Will return the response, if false it print the response
echo curl_getinfo($ch, CURLINFO_HEADER_OUT);
 
$headers = [
  'Authorization: Bearer sk_test_xxx',
  'Content-Type: application/json',
  'Accept: application/json',
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Send the request
$request = curl_exec ($ch);

if(curl_error($ch))
{
	echo 'error:' . curl_error($ch);
	var_dump($ch);
}

 // Free up the resources $curl is using
curl_close ($ch);
if ($request) {
  $result = json_decode($request, true);
  echo $result;  
}

if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
  echo "Transaction was successful";
	//Perform necessary action
}else{
  echo "Transaction was unsuccessful";
}
