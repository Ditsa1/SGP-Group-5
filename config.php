<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$db = "quizard";

$con = mysqli_connect($server, $username, $password, $db);
if ($con->connect_error) {
	die('Connect Error (' . $con->connect_errno . ') ' . $con->connect_error);
}

mysqli_set_charset($con, "utf8");

?>