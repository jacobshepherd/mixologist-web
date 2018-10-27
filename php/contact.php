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

$website = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
$website = dirname($website);
$website = dirname($website);

if (isset($email) && isset($name)) {

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= "From: hello@mixologist.ai"."\r\n"."Reply-To: ".$email."\r\n" ;
	$msg     = "Hello,<br/><br/> You have received a message from your website contact form. Here are the details. <br/><br/> From: $name<br/> Email: $email <br/>Message: $msg <br><br> -- <br>This e-mail was sent from a contact form on $website";
	
    $mailr =  mail($to, $subject, $msg, $headers);
	if($mailr)
	{
		echo 'success';
	}
	else
	{
		echo 'failed';
	}
}

?>