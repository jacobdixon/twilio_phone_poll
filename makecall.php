<html>
<body>
	<form action="makecall.php" method="post" name="list_of_numbers">
		<input type="text" name="phone_numbers" />
		<input type="submit" value="call" />
	</form>
<?php
require 'twilio-php-master/Services/Twilio.php';

// Set our AccountSid and AuthToken
$sid = getenv('TWILIO_SID');
$token = getenv('TWILIO_TOKEN');
$location_of_poll = "http://salty-wildwood-2853.herokuapp.com/poll.php";

// @start snippet
// List of phone numbers
$numbers = explode(',', $_POST["phone_numbers"]);
// @end snippet
// @start snippet
// Instantiate a client to Twilio's REST API
	$client = new Services_Twilio($sid, $token);

	foreach ($numbers as $number) {
		if($number != ''){
			try {
				$call = $client->account->calls->create(
					'608-216-2560',								 // Caller ID
					$number,									 // Your friend's number
					$location_of_poll                            // Location of your TwiML
				);
				echo "Started call: $call->sid\n";
			} catch (Exception $e) {
				echo 'Error starting phone call: ' . $e->getMessage() . "\n";
			}
		}
	}
	// @end snippet
?>
</body>
</html>