<?php

// Include connect file
require_once "connect.php";

// Include submit file to get username of current user
require_once "submit.php";

	
			//getting all data from db and displaying on page
			$query = "SELECT price, region, availability, area FROM aggelies WHERE username = '$username'";
			$result = mysqli_query($link, $query);
			$data = array();
			while ($row = mysqli_fetch_assoc ($result)){
					
				$data[] = $row;
			}
				
			//converting output into json
			echo json_encode($data, JSON_UNESCAPED_UNICODE);
	
?>