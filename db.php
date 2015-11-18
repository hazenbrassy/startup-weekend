<?php
/*  Database Information - Required!!  */
/* -- Configure the Variables Below --*/

$dbhost = 'localhost';
$dbusername = 'campthing';
$dbpasswd = 'campthingco';
$database_name = 'campthing';
/*
$dbhost = 'localhost' ;
$dbusername = 'metros9_members';
$dbpasswd = 'August2009';
$database_name = 'metros9_members';
*/
/* Database Stuff, do not modify below this line */

$conn = new mysqli($dbhost, $dbusername, $dbpasswd, $database_name);
// check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

?>