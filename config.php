<?php
session_start();

/* CONFIG
* contains MySQL connection info and various
* configuration variables and settings
*/

require 'functions.php';

// Error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// MySQL database settings
$dbhost = "localhost";
$dbuser = "cj2011";
$dbpass = "";
$dbname = "c9";


// MySQL connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection succeeded
if(mysqli_connect_errno()) {
  die("Database connection failed: " . mysqli_connect_error() ." (" . mysqli_connect_errno() . ")"
  );
}

?>

