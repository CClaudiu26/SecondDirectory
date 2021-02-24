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

    $ifexist = $conn->query("SELECT id from location where name  = '$_POST[loc]' ");




    if (!$ifexist){
        $insertifnot= 'INSERT INTO location (name) VALUES("' . $_POST['loc'] . '")';
        $result = $conn->query($query);
	
        if ($result) {
    
            $output['status']['code'] = "400";
            $output['status']['name'] = "executed";
            $output['status']['description'] = "query failed";	
            $output['data'] = [];
    
           
    
            echo json_encode($output); 
    
            exit;
    
        }
    
        $output['status']['code'] = "200";
        $output['status']['name'] = "ok";
        $output['status']['description'] = "success";
        $output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
        $output['data'] = [];
    } 
    
   


	$id_location = "select id from location where name = '$_POST[loc]' ";
	$resultidlocation = $conn-> query($id_location);
	



    
     while ($row = $resultidlocation->fetch_assoc()){
		$idlocation = $row['id'];
	
      }

	 
    
    


	
	

	$query = "UPDATE  department SET locationID = '$idlocation' WHERE name = '$_POST[dep]' "  ;

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