<?php

include_once('db.php');
mysqli_select_db($conn,'test2');
$qy= "SELECT * FROM info";
$result=mysqli_query($conn,$qy);
$row = mysqli_fetch_assoc($result);

if(!isset($row['id'])){
	die('id not provided');
}


$id= $_GET['id'];
$s = "SELECT * FROM info WHERE id = $id";
$res = mysqli_query($conn,$s);
if(mysqli_num_rows($res) !=1){
	die('id is not in db');
}

$data = mysqli_fetch_assoc($res);

if(isset($_POST['submit'])){


	$name= $_POST["name"];
	$roll= $_POST["roll"];
	$age= $_POST["age"];
	$dob= $_POST["dob"];
	$conct= $_POST["conct"];

	$update = "UPDATE info SET name= '$name', roll='$roll', age='$age', dob='$dob', contact='$conct' WHERE id='$id' ";



	$qry = mysqli_query($conn,$update);

	if($qry){

		echo "Updated Successfully";
	}else{
		echo "An error occurred";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Form with DATABASE</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
	<h1>Database Update</h1>
	<form method="post" action="#">

		Name: &nbsp &nbsp<input type="text" name="name" value="<?= $data['name']?>"><br><br>
		Roll: &nbsp &nbsp<input type="text" name="roll" value="<?= $data['roll']?>"><br><br>
		Age:  &nbsp &nbsp<input type="text" name="age" value="<?= $data['age']?>"><br><br>
		DOB:  &nbsp &nbsp<input type="Date" name="dob" value="<?= $data['dob']?>"><br><br>
		Contact no:- &nbsp &nbsp<input type="text" name="conct" value="<?= $data['contact']?>"><br><br>
		<input type="submit" name="submit" value="Save" id="submit"> <br><br><br><br>
	</form>



	<table border="2px;" class="table table-success table-striped">
		<thead style="border: 2px solid black;" id="tb">
			<th colspan="2">Id</th>
			<th colspan="2">Name</th>
			<th colspan="2">Roll</th>
			<th colspan="2">Age</th>
			<th colspan="2">DOB</th>
			<th colspan="2">Contact</th>
		</thead>

		<tbody id="tbody">
			

		</tbody>

		<?php

		$selct = "SELECT * FROM info";
		$result = mysqli_query($conn,$selct);
		if(mysqli_num_rows($result) > 0){

               while ($row = mysqli_fetch_assoc($result)) {
                   echo '<tr>';
                   echo '<td colspan="2">'. $row['id'] .'</td>';
                   echo '<td colspan="2">'. $row['name'] .'</td>';
                   echo '<td colspan="2">'. $row['roll'] .'</td>';
                   echo '<td colspan="2">'. $row['age'] .'</td>';
                   echo '<td colspan="2">'. $row['dob'] .'</td>';
                   echo '<td colspan="2">'. $row['contact'] .'</td>';
                   echo '</tr>';
               }
           }
           else{
            	echo '<tr>';
            	echo '<td>'.'data not available'.'</td>';
            	echo '</tr>';
           }


		?>
	</table>

</body>
</html>