<!DOCTYPE html>
<html>
<head>
	<title> Insert data in databasa using Ajax </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>


	<h1>Database connection with Ajax </h1>
	<form  action="#" id="form_data">

		Name: &nbsp &nbsp<input type="text" name="name" id="name"><br><br>
		Roll: &nbsp &nbsp<input type="text" name="roll" id="roll"><br><br>
		Age:  &nbsp &nbsp<input type="text" name="age" id="age"><br><br>
		DOB:  &nbsp &nbsp<input type="Date" name="dob" id="dob"><br><br>
		Contact no:- &nbsp &nbsp<input type="text" name="conct" id="conct"><br><br>
		<input type="submit" name="submit" value="Save" id="submit" > <br><br><br><br>

	</form>



<script type="text/javascript">
	
 $(document).ready(function() {

      $("#form_data").submit(function(e) {
      	e.preventDefault()
      //var form_data = $("#form_data").serializeArray();

        var name = $("#name").val();
           
            var roll = $("#roll").val();
            var age = $("#age").val();
            var conct = $("#conct").val();
      if(name ==''||roll ==''||age=='' ||conct=='' ) {
                alert("Please fill all fields.");
                return false;
            }

      	$.ajax({
             data: $("#form_data").serializeArray(),
             type: "post",
             url: "insert.php",

             success: function(data){
                  alert("Data Save: " + data);
                  console.log(data);
                  //return true;
             },
              error: function() {
        		alert('There was some error performing the AJAX call!');
      			}

        });

     });
});
</script>



</body>
</html>