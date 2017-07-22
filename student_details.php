<?php

 include("includes/db_connect.php");
 include("includes/functions.php");
 ini_set("display_errors",0);
if ($_REQUEST[st_id])
 { 
 global $con;
   $sql= "SELECT * from student_add where st_id=$_REQUEST[st_id]";
   $rs= mysqli_query($con, $sql);
   $data=mysqli_fetch_assoc($rs);
}
?>
<?php 
     $SERVER_PATH="http://localhost/RegistrationPHP"; 
?>

<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<table width="600px" height="500px" align="center" border="1">
				<tr align="center">
					<th colspan="4" style="font-size: 20px;"> Student Details</th>
				</tr>
				<tr>
					<th>Name</th><td><?=$data['st_name'];?></td>
					<th>Father's Name</th>
					<td><?=$data['st_father'];?></td>
				</tr>
				<tr>
					<th>Address1</th>
					<td><?=$data['st_add1'];?></td>
					<th>Address2</th>
					<td><?=$data['st_add2'];?></textarea></td>
				</tr>
				<tr>
					<th>City</th>
					<td><?=get_value("city","city_id","city_name",$data[st_city])?></td>
					<th>State</th>
					<td><?=get_value("state","state_id","state_name",$data[st_state])?></td>
				</tr>
				<tr>
					<th>Country</th>
					<td><?=get_value("country","country_id","country_name",$data[st_country])?></td>
				<th>Nationality</th>
				<td><?=$data['st_nat'];?></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td><?=$data['st_gender'];?></td>
			<th>Qualification</th>
			<td><?=$data['st_qul'];?></td>
		</tr>
		<tr>
			<th>Course</th>
			<td><?=get_value("course","course_id","course_name",$data[st_course])?></td>
			<th>Photo</th>
			<td><?php 
				if ($data[st_photo]) 
				{
					echo "<br><img src='$SERVER_PATH/uploads/$data[st_photo]' height=50>";
				}
			?></td>
	</tr>
	<tr>
		<th>Hobbies</th>
		<td><?=$data['st_hobbies'];?></td>
		<th>Mobile</th>
		<td><?=$data['st_mobile'];?></td>
	</tr>
	<tr>
		<th>Date of birth</th>
		<td><?=$data['st_dob'];?></td>
		<th>Date of Admission</th>
		<td><?=$data['st_doa'];?></td>
	</tr>
	<tr>
		<th colspan="4" align="center"><input type="button" value="print" onclick="window.print()"></th>
	</tr>
</table>
</body>
</html>


