
<?php

include_once('db.php');


if(isset($_POST['submit'])){


	$name= $_POST["name"];
	$roll= $_POST["roll"];
	$age= $_POST["age"];
	$dob= $_POST["dob"];
	$conct= $_POST["conct"];

	$sq= "INSERT INTO info (name,roll,age,dob,contact) VALUES ('$name', '$roll', '$age', '$dob', '$conct')";

	$qury = mysqli_query($conn,$sq);

	if($qury){

		echo "Inserted Successfully";
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
	<h1>Database connection with Form </h1>
	<form method="post" action="#">

		Name: &nbsp &nbsp<input type="text" name="name"><br><br>
		Roll: &nbsp &nbsp<input type="text" name="roll"><br><br>
		Age:  &nbsp &nbsp<input type="text" name="age"><br><br>
		DOB:  &nbsp &nbsp<input type="Date" name="dob"><br><br>
		Contact no:- &nbsp &nbsp<input type="text" name="conct"><br><br>
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
			<th colspan="4">Action</th>

		</thead>

		<tbody id="tbody">
			

		</tbody>

		<?php

		$selct = "SELECT * FROM info";
		$result = mysqli_query($conn,$selct);
		if(mysqli_num_rows($result) > 0){
				 $id=0;
               while ($row = mysqli_fetch_assoc($result)) {

               $id=$id+1;
               ?>

                  <tr>
                  	<td colspan="2"><?php echo $id; ?></td>
                  <td colspan="2"><?php echo $row['name']; ?></td>
                  <td colspan="2"> <?php echo $row['roll']; ?> </td>
                  <td colspan="2"> <?php echo $row['age']; ?> </td>
                  <td colspan="2"> <?php echo $row['dob']; ?> </td>
                  <td colspan="2"> <?php echo $row['contact']; ?> </td>

                <td colspan="2"><a href="edit.php?id=<?php echo $row["id"]; ?>"><i class="bi bi-pen"></i></a></td>
                 <td colspan="2"><a href="del.php?id=<?php echo $row["id"]; ?>"><i class="bi bi-trash"></i></a></td>
                   
               
               <?php } ?>
          <?php 
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