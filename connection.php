<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "fees";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}
?>
