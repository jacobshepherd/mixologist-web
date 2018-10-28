<?php
 
	$name  = $_REQUEST["name"];
	$email = $_REQUEST["email"];
	$subject = $_REQUEST["subject"];
	$msg   = $_REQUEST["message"];

	$apiKey = getenv("AWS_LAMBDA_KEY");
	$apiEndpoint = "https://36p03itvai.execute-api.us-east-2.amazonaws.com/default/contactSubmission?service=mixologist&name=$name&email=$email&subject=$subject&message=$msg";
	
	$encoded = rawurlencode($apiEndpoint);
	$encoded = str_replace(" ", "%20", $encoded);
	
	//Initialize cURL.
	$ch = curl_init();
	// add header for api key
	curl_setopt($ch, CURLOPT_URL, $encoded);
	//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

	$headers = array("x-api-key: $apiKey", "Accept: */*");
	// add headers
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	//Execute the request.
	$data = curl_exec($ch);

	//Close the cURL handle.
	curl_close($ch);
	

	if (strpos($data, 'error') !== false) {
		echo 'failure';
	} else {
		echo 'success';
	}


?>