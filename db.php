<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test2";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	echo "connection failed";
}
// else{
// 	echo 'connected';
// }
?>