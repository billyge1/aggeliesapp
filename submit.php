<?php


// Include connect file
require_once "connect.php";


$price = $region = $availabitity = $area = "";
$username = $_SESSION["username"];
$price_err = $area_err = $region_err = $availability_err= "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	//validate price field
	if(empty(trim($_POST["price"]))){
		$price_err = "Please enter a price";
	}
	elseif( ! preg_match('/^\d+$/', trim($_POST["price"])) ){
		$price_err = "Please enter an integer price";
	}
	elseif((trim($_POST["price"]) < 50) || (trim($_POST["price"]) > 5000000))
	{ 
		$price_err = "Please enter price between 50 and 5000000 euro";
	}
	else{
		$price = trim($_POST["price"]);
	}
	
	//validate region field
	if(empty($_POST["region"])){
		$region_err = "Please select a region from the dropdown menu";
	}
	else{
		$region = $_POST["region"];
	}
	
	//validate availability field
	if(empty($_POST["availability"])){
		$availability_err = "Please select an availability from the dropdown menu";
	}
	else{
		$availability = $_POST["availability"];
	}
	
	//validate area
	if(empty(trim($_POST["area"]))){
		$area_err = "Please enter an area";
	}
	elseif( ! preg_match('/^\d+$/', trim($_POST["area"])) ){
		$area_err = "Please enter an integer area";
	}
	elseif((trim($_POST["area"])) < 20 || (trim($_POST["area"])) > 1000)
	{ 
		$area_err = "Please enter area between 20 and 1000";
	}
	else{
		$area = trim($_POST["area"]);
	}
	
	if (empty($price_err) && empty($area_err) && empty($availability_err) && empty($region_err)){
		
		$sql = "INSERT INTO aggelies (username, price, region, availability, area) VALUES (?, ?, ?, ?, ?)";
		
		if($stmt = mysqli_prepare($link, $sql)){
		// Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sissi", $param_user, $param_price, $param_region, $param_availability, $param_area);
            
            // Set parameters
			$param_user = $username;
            $param_price = $price;
            $param_region = $region;
			$param_availability = $availability;
			$param_area = $area;
			
			
			// Execute the prepared statement
            mysqli_stmt_execute($stmt);
	
        		
			// Close statement
            mysqli_stmt_close($stmt);
		
		
		}
			
	}
	
	// Close connection
    mysqli_close($link);
	
	
}



?>