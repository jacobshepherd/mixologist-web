<?php

/*
 * ------------------------------------
 * Contact Form Configuration
 * ------------------------------------
 */
 
$to    = "hello@mixologist.ai"; // <--- Your email ID here

/*
 * ------------------------------------
 * END CONFIGURATION
 * ------------------------------------
 */
 
$name  = $_REQUEST["name"];
$email = $_REQUEST["email"];
$subject = $_REQUEST["subject"];
$msg   = $_REQUEST["message"];

$apiKey = getenv("AWS_LAMBDA_KEY");
$apiEndpoint = "https://36p03itvai.execute-api.us-east-2.amazonaws.com/default/contactSubmission?platform=mixologist&name=$name&email=$email&subject=$subject&message=$msg";

// add header for api key
$res = http_get($apiEndpoint);
if ($res) {
	echo 'success';
} else {
	echo 'failure';
}

// $website = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
// $website = dirname($website);
// $website = dirname($website);
// $website = "https://www.mixologist.ai";

// if (isset($email) && isset($name)) {
	
// 	$headers = "MIME-Version: 1.0" . "\r\n";
// 	$headers .= "Content-type:text/html;charset=utf-8" . "\r\n";
// 	$headers .= "From: hello@mixologist.ai"."\r\n"."Reply-To: ".$email."\r\n" ;
// 	$emsg     = "Hello,<br/><br/> You have received a message from your website contact form. Here are the details. <br/><br/> From: $name<br/> Email: $email <br/>Message: $msg <br><br> -- <br>This e-mail was sent from a contact form on https://www.mixologist.ai.";
	
//     $mailr =  mail($to, $subject, $emsg, $headers);
// 	if($mailr)
// 	{
// 		echo 'success';
// 	}
// 	else
// 	{
// 		echo 'failed';
// 	}
// }

?>