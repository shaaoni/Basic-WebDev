<?php

include_once('db.php');
mysqli_select_db($conn,'test2');
$_qy= "SELECT * FROM info";
$_result=mysqli_query($conn,$_qy);
$_row = mysqli_fetch_assoc($_result);

if(!isset($_row['id'])){
	die('id not provided');
}


$_id= $_GET['id'];
$_s = "SELECT * FROM info WHERE id = $_id";
$_res = mysqli_query($conn,$_s);
if(mysqli_num_rows($_res) !=1){
	die('id is not in db');
}

$_data = mysqli_fetch_assoc($_res);

if(isset($_POST['submit'])){


	$name= $_POST["name"];
	$roll= $_POST["roll"];
	$age= $_POST["age"];
	$dob= $_POST["dob"];
	$conct= $_POST["conct"];

	$delete = "DELETE FROM info WHERE id='$_id' ";



	$_qry = mysqli_query($conn,$delete);

	if($_qry){

		echo "Deleted Successfully";
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
	<h1>Database Delete</h1>
	<form method="post" action="#">

		Name: &nbsp &nbsp<input type="text" name="name" value="<?= $_data['name']?>"><br><br>
		Roll: &nbsp &nbsp<input type="text" name="roll" value="<?= $_data['roll']?>"><br><br>
		Age:  &nbsp &nbsp<input type="text" name="age" value="<?= $_data['age']?>"><br><br>
		DOB:  &nbsp &nbsp<input type="Date" name="dob" value="<?= $_data['dob']?>"><br><br>
		Contact no:- &nbsp &nbsp<input type="text" name="conct" value="<?= $_data['contact']?>"><br><br>
		<input type="submit" name="submit" value="Delete" id="submit"> <br><br><br><br>
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

		$_selct = "SELECT * FROM info";
		$_result = mysqli_query($conn,$_selct);
		if(mysqli_num_rows($_result) > 0){

               while ($_row = mysqli_fetch_assoc($_result)) {
                   echo '<tr>';
                   echo '<td colspan="2">'. $_row['id'] .'</td>';
                   echo '<td colspan="2">'. $_row['name'] .'</td>';
                   echo '<td colspan="2">'. $_row['roll'] .'</td>';
                   echo '<td colspan="2">'. $_row['age'] .'</td>';
                   echo '<td colspan="2">'. $_row['dob'] .'</td>';
                   echo '<td colspan="2">'. $_row['contact'] .'</td>';
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