<?php

include_once('db.php');

if(isset($_POST['submit'])){

	$name  = $_POST['name'];
	$email = $_POST['email'];
	$pass  = $_POST['pass'];


$sql = "INSERT INTO user (name, email, pass) VALUES ('$name', '$email', '$pass')";

$query= mysqli_query($conn,$sql);

	if($query){
		echo "Record Inserted Successfully";



	}else {

	echo "An Error occured";


	}


}



?>





<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="post" action="#">

	Name: <input type="text" name="name"><br><br>
	Email: <input type="text" name="email"> <br><br>
	Password: <input type="text" name="pass"> <br><br>

	<input type="submit" name="submit" value="SAVE"> <br><br>

</form>
<hr>
<table border="2px;">
	

		<th>
		<tr>

			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td colspan="2">action</td>
			
		</tr>
	</th>
	
		<tr>
		<td>1 </td>
		<td>John </td>
		<td>John@gmail.com </td>
		<td><a href="edit.php">Edit</a> </td>
		<td><a href="#">Delete</a> </td>
	</tr>
	
</table>
</body>
</html>