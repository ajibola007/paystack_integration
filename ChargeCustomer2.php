<?php

$result = array();
// Pass the customer's authorisation code, email and amount

$postdata =  array('authorization_code' => 'AUTH_xxxxxxxxxx',
					'email' => 'f@gmail.com',
					'amount' => 1000,
					"reference" => 'xxxxxx-xx-xxx-xxx-xxxx');

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.paystack.co/transaction/charge_authorization");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postdata));  //Post Fields
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPGET, true);
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
}

 // Free up the resources $curl is using
curl_close ($ch);
if ($request) {
  $result = json_decode($request, true);
  var_dump($result);  
}

/*  // Get some cURL session information back
 * $info = curl_getinfo($curl);  
 * echo 'content type: ' . $info['content_type'] . '<br />';
 * echo 'http code: ' . $info['http_code'] . '<br />';
*/

/*if (@$_GET['curl']=="yes") {
  header('HTTP/1.1 503 Service Temporarily Unavailable');
} else {
  $ch=curl_init($url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?curl=yes");
  curl_setopt($ch, CURLOPT_FAILONERROR, true);
  $response=curl_exec($ch);
  $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  $curl_errno= curl_errno($ch);
  if ($http_status==503)
    echo "HTTP Status == 503 <br/>";
  echo "Curl Errno returned $curl_errno <br/>";
}*/

/*if(curl_exec($ch) === false) {
    echo "ok";
}
else {
    echo "error";
}
*/
// Check for errors and display the error message
/*if($errno = curl_errno($ch)) {
    $error_message = curl_strerror($errno);
    echo "cURL error ({$errno}):\n {$error_message}";
}*/

/*if(curl_error($ch)){
	echo 'error:' . curl_error($ch);
	var_dump(openssl_get_cert_locations());
	echo "openssl.cafile: ", ini_get('openssl.cafile'), "\n";
	echo "curl.cainfo: ", ini_get('curl.cainfo'), "\n";
}*/

//https://stackoverflow.com/questions/3987006/how-to-catch-curl-errors-in-php