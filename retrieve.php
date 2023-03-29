<?php
include_once("db.php");
mysqli_select_db($conn,'test2');
$query= "SELECT * FROM info";
$result=mysqli_query($conn,$query);

echo "<table border='2' >
<tr>
<td align=center colspan = '2'> <b>Id</b></td>
<td align=center colspan = '2'> <b>Name</b></td>
<td align=center colspan = '2'><b>Roll</b></td>
<td align=center colspan = '2'><b>Age</b></td>
<td align=center colspan = '2'><b>DOB</b></td></td>
<td align=center colspan = '2'><b>Contact</b></td>";

while($data = mysqli_fetch_row($result))
{   
    echo "<tr>";
    // echo "<td align=center colspan = '2'>$data['id']</td>";
    // echo "<td align=center colspan = '2'>$data['name']</td>";
    // echo "<td align=center colspan = '2'>$data['roll']</td>";
    // echo "<td align=center colspan = '2'>$data['age']</td>";
    // echo "<td align=center colspan = '2'>$data['dob']</td>";
    // echo "<td align=center colspan = '2'>$data['contact']</td>";


    echo "<td align=center colspan = '2'>$data[0]</td>";
    echo "<td align=center colspan = '2'>$data[1]</td>";
    echo "<td align=center colspan = '2'>$data[2]</td>";
    echo "<td align=center colspan = '2'>$data[3]</td>";
    echo "<td align=center colspan = '2'>$data[4]</td>";
    echo "<td align=center colspan = '2'>$data[5]</td>";


    echo "</tr>";
}
echo "</table>";
?>