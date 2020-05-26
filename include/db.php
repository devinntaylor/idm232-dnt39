<?php
// Create database connection

/*local*/

//$dbhost = "localhost";
//$dbuser = "root";
//$dbpass = "root";
//$dbname = "cookbook";

/*online*/

$dbhost = "localhost";
$dbuser = "devintay_cook";
$dbpass = "DJdbdjc+ccd";
$dbname = "devintay_cookbook";


$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check the connection is good with no errors
if (mysqli_connect_errno()) {
		die ("Database connection failed: " .
				mysqli_connect_error() .
				" (" . mysqli_connect_errno() . ")"
		);
}
?>
