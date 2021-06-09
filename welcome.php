<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require "submit.php"

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>


	<div class="container mt-3">
		<div class="row">
               <div class="col-12 border mb-5 bg-light "> 
			   
			   <h2 class="my-3">
			   <p> Σύστημα διαχείρισης Αγγελιών</p>
			   Καλώς Ήρθες, <b><?php echo $_SESSION["username"]; ?></b>.</h2>
				<a href="logout.php" class="btn btn-danger ml-3">Sign Out</a>
			   
			   </div>	
    
		</div>	
	
	<div class="row">
		<div class="col-4 border p-4 mb-4 bg-light "> 
		<h3>Εισαγωγή Αγγελίας:</h2>
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		
		<div class="form-group">
                <label>Τιμή:</label>
                <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" placeholder="Από 50 εώς 5000000 ευρώ">
				<div class="invalid-feedback"><?php echo $price_err; ?></div>
         </div> 
		
		<div class="form-group">
		<label for="sel1">Περιοχή:</label>
			<select class="form-control <?php echo (!empty($region_err)) ? 'is-invalid' : ''; ?>" id="sel1" name="region">
			<option selected></option>
				<option>Αθήνα</option>
				<option>Θεσσαλονίκη</option>
				<option>Πάτρα</option>
				<option>Ηράκλειο</option>
			</select>
			<div class="invalid-feedback"><?php echo $region_err; ?></div>
		</div>
		
		<div class="form-group">
		<label for="sel1">Διαθεσιμότητα:</label>
			<select class="form-control <?php echo (!empty($availability_err)) ? 'is-invalid' : ''; ?>" id="sel2" name="availability" >
			<option selected></option>
				<option>Ενοικίαση</option>
				<option>Πώληση</option>
			</select>
			<div class="invalid-feedback"><?php echo $availability_err; ?></div>
		</div>
		
		<div class="form-group">
                <label>Εμβαδόν:</label>
                <input type="text" name="area" class="form-control <?php echo (!empty($area_err)) ? 'is-invalid' : ''; ?>" placeholder="Από 20 εώς 1000 τμ">
				<div class="invalid-feedback"><?php echo $area_err; ?></div>
            </div> 
		
		<div class="form-group">
                <input type="submit" id="submitbtn" class="btn btn-primary" value="Καταχώρηση" >
            
         </div>
	
		</form>
		</div>
		
		
		
	<div class="col-8 border p-4 mb-4 bg-light ">
	<h3>Λίστα Αγγελιών:</h2>
	<div id="aggelies-info"> 
	
	</div>
	
	
	</div>	

</div>
</div>	
	
	
<script type="text/javascript" src="main.js"></script>


	
</body>

</html>