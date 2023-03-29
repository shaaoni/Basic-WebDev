
<?php

include_once('db.php');


//if(isset($_POST['submit'])){


	$name= $_POST["name"];
	$roll= $_POST["roll"];
	$age= $_POST["age"];
	$dob= $_POST["dob"];
	$conct= $_POST["conct"];

	$squel= "INSERT INTO info (name,roll,age,dob,contact) VALUES ('$name', '$roll', '$age', '$dob', '$conct')";

	$myquery = mysqli_query($conn,$squel);

	if(!$myquery){

		echo "An error occurred";
	}else{
		echo "Inserted Successfully";

	$page = 'form.php';
		header("Refresh:5, url=$page");

	}
//}


?>
