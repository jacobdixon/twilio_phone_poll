<?php
require 'twilio-php-master/Services/Twilio.php';
$response = new Services_Twilio_Twiml();

$location_of_process_poll = "http://salty-wildwood-2853.herokuapp.com/process_poll.php";

$gather = $response->gather(array(
	'action' => $location_of_process_poll,
	'method' => 'GET',
	'numDigits' => '1'
));

$gather->say("This is Mark's Pizza Party Poll");
$gather->say("If You Would Like Cheese Pizza Press 1");
$gather->say("If You Would Like Pepperoni Pizza Press 2");
$gather->say("If You Would Like Sausage Pizza Press 3");
$gather->say("If You Would Like Kate's Favorite Pizza Press 4");

header('Content-Type: text/xml');
print $response;
?>