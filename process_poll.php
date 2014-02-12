<?php
	//require 'twilio-php-master/Services/Twilio.php';

	// Connect to PostgreSQL, and connect to the Database
	function pg_connection_string() {
	  	if(getenv('USERNAME') == "RHINOPOTAMUS$"){
			return "dbname=postgres user=postgres password=m0n0na";
		} else {
			return getenv('PG_CONNECTION_STRING');
		}	
	}

	$db = pg_connect(pg_connection_string());
	if (!$db) {
	    echo "Database connection error.";
	    exit;
	}


	// @start snippet
	// Check if values have been entered
	$digit = isset($_REQUEST['Digits']) ? $_REQUEST['Digits'] : null;
	$choices = array(
		'1' => 'Cheese',
		'2' => 'Pepperoni',
		'3' => 'Sausage',
		'4' => 'Pineapple_Bacon',
	);
	if (isset($choices[$digit])) {
		pg_query("INSERT INTO results (" . $choices[$digit] . ") VALUES ('1')");
		$say = 'Thank you. Your choice has been tallied.';
	} else {
		$say = "Sorry, I don't have that topping.";
	}
	// @end snippet
	// @start snippet
	require 'twilio-php-master/Services/Twilio.php';
	$response = new Services_Twilio_Twiml();
	$response->say($say);
	$response->hangup();
	header('Content-Type: text/xml');
	print $response;
	// @end snippet

?>