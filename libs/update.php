<?php








	
	

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


	$department_query = "select id from department where name = '"  . $_POST['department'] . "'";
	$resultdepartment = $conn-> query($department_query);
	



    
     while ($row = $resultdepartment->fetch_assoc()){
		$iddepartment = $row['id'];
	
      }

	 
    
    


	
	

	$query = "UPDATE  personnel SET lastName = ' $_POST[lastname]  ', firstName = '$_POST[firstname]', email = '$_POST[email]', departmentID = '$iddepartment' WHERE id = $_POST[id] order by lastName,  firstName"  ;

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

	header("refresh:1; url = index.php");

	echo json_encode($output); 

?>