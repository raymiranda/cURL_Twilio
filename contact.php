<?php
// For this example and usage, you can use any items that you would like to 
// send over via SMS. The requirements are listed in the data array. 
// I'll be adding error checking very soon as well as building on other functions settings
// based on the APIs allowed from Twilio. Enjoy!


// I use ajax to post to this page and grab the data. 

$from = $_REQUEST['from'];
$message = 'Message from '.$from.'. Email is: '.$_REQUEST['email'].'. Phone is: '.$_REQUEST['phone'].'. Message is: '.$_REQUEST['message'];

$data = array(
	'From' => 'xxxxxxxxxx', // Twilio Account # 
	'To' => 'xxxxxxxxxx', // Sending To. 
	'Body' => $message, 	
);

$ch = curl_init(); // Initialize cURL
curl_setopt($ch, CURLOPT_URL, 'https://api.twilio.com/2010-04-01/Accounts/#enterYourAccountID/SMS/Messages.json');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, "ACCOUNTID:PASSWORD"); // Adjust this with your settings. 
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

curl_exec($ch);
curl_close($ch);
