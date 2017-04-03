<?php
header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Status: 503 Service Temporarily Unavailable');
header('Retry-After: 3600'); // 1 hour = 3600 seconds
?>
<body style="font-family:Arial,sans-serif; color:#777; text-align:center;">
<h1>Site temporarily unavailable.<br />
We're doing some periodic maintenance.<br />
Please check back later!
</h1>
<img src="http://www.google.com/images/errors/robot.png" alt="Robot" />
<br />
<?php
// some settings:
$mailto = "info@bkjproductions.com";
$nag_frequency = 15; // in minutes
$log_every_error = false; // do not log every error on a busy site!
$timecheck_file = 'uploads/dberrs_log.txt';
// ----- that's all the settings unless you are in a different time zone
date_default_timezone_set('America/New_York');
$cr = "\r\n";  // line endings

$now = time();
$last_timecheck = 0;
$lines = array();
// see if file is there?
if ( file_exists($timecheck_file)) {
	$lines = file($timecheck_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$last_check = $lines[count($lines) -1];
	// last time checked?
	$last_check = explode("\t", $last_check);
	$last_timecheck = $last_check[0];
}

$when_to_send_again = ($nag_frequency * 60 ) + $last_timecheck;
if ($when_to_send_again < $now) {
	mail_message($mailto);
	// go ahead, log every error:
	$log_every_error = true;
}
if ($log_every_error) {
	// write data back out to file with timestamp, url, etc.
	if (count($lines)==0) {
		// write column labels
		$lines[] = "timestamp\tdate\tip\tdomain\t\tmemory peak usage\tmemory usage";
	}
	// get some data about the thing:
	$domain = DOMAIN_CURRENT_SITE;
	$ip = $_SERVER['REMOTE_ADDR'];
	$today = date("F j, Y, h:i:s a");
	$memory_get_peak_usage = memory_get_peak_usage();
	$memory_get_usage = memory_get_usage();
	$lines[] = "$now\t$today\t$ip\t$domain\t$memory_get_peak_usage\t$memory_get_usage";
	$lines = implode($cr, $lines);
	file_put_contents($timecheck_file, $lines);
}



function mail_message($mailto = 'example@example.com') {
	$today = date("F j, Y, h:i:s a");
	$cr = "\r\n";
	$mailfrom = $_SERVER['SERVER_ADMIN'];
	$ip = $_SERVER['REMOTE_ADDR'];
	// wordpress constant:
	$dbname = DB_NAME;
	$headers 	= "From: ". $mailfrom . "$cr".
			"X-Mailer: PHP/". phpversion() ."$cr".
			"X-Priority: 1 (High)";
	$message	= "Database error: $dbname $cr" .
			"Check log file in wp-content/uploads/ $cr" . 
			"Go fix! $cr" .
			"It broke when someone at $ip tried to open this page:  http://" .
			$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . $cr .
			"Look up IP: http://$ip.ipaddress.com $cr" .
			"Best regards, $cr".
			"Your WordPress installation $cr";
	$subject	= "DB error at ".$_SERVER['SERVER_NAME'] . " on $today";
	mail($mailto,$subject,$message,$headers);
	// diagnostic to see if message is being sent or not:
	echo "...";
}
?>
