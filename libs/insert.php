<?php

	// example use from browser
	// http://localhost/companydirectory/libs/php/insertDepartment.php?name=New%20Department&locationID=1

	// remove next two lines for production
	
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	$executionStartTime = microtime(true);

	include("config.php");

	header('Content-Type: application/json; charset=UTF-8');

	$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

	if (mysqli_connect_errno()) {
		
		$output['status']['code'] = "300";
		$output['status']['name'] = "failure";
		$output['status']['description'] = "database unavailable";
		$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output);

		exit;

	}	


    $lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];

$email = $_POST['email'];

	$department_query = "select id from department where name = '"  . $_POST['department'] . "'";
$result = $conn-> query($department_query);

while ($row = $result->fetch_assoc()){
    $iddepartment = $row['id'];



}

if (!$lastname or !$firstname or !$email or !$iddepartment){
	$output['status']['code'] = "404";
	$output['status']['name'] = "executed";
	$output['status']['description'] = "No data";	
	

	mysqli_close($conn);

	echo json_encode($output); 

	exit;

}


$query = "INSERT INTO personnel (`lastName`,`firstName`, `email`, `departmentID`) VALUES ('$lastname', '$firstname'  , '$email' , $iddepartment )";

	$result = $conn->query($query);
	
	if (!$result) {

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output); 

		exit;

	}

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "success";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['data'] = [];
	
	mysqli_close($conn);

	echo json_encode($output); 

?>