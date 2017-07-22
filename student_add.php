<?php include_once("includes/header.php"); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/student.css">
<link rel="stylesheet" type="text/css" href="plugins/datepicker/datepicker.css" /> 
<script type="text/javascript" src="plugins/datepicker/datepicker.js"></script>
<script type="text/javascript" src="plugins/datepicker/timepicker.js"></script></head>
</html>
<?php
if ($_REQUEST[st_id])
 { 
 global $con;
   $sql= "SELECT * from student_add where st_id=$_REQUEST[st_id]";
   $rs= mysqli_query($con, $sql);
   $data=mysqli_fetch_assoc($rs);
}
?>

<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
	    <div id="er" style="text-align: center;font-weight: bold;color: #FFC; padding-bottom: 10px; "></div>
		<form name="student_frm" method="POST" action="lib/student.php" enctype="multipart/form-data">
			<table width="90%" align="center" border="2">
				<tr>
					<th colspan="4" style="font-size: 20px;padding-bottom: 5px;padding-top: 5px;"> Student Registration</th>
				</tr>
				<tr>
					<th>Name</th>
					<td><input type="text" name="st_name" id="st_name" value="<?= $data[st_name] ?>"></td>
					<th>Father's Name</th>
					<td><input type="text" name="st_father" id="st_father" value="<?= $data[st_father] ?>"></td>
				</tr>
				<tr>
					<th>Address1</th>
					<td><textarea name="st_add1" id="st_add1"><?= $data[st_add1] ?></textarea></td>
					<th>Address2</th>
					<td><textarea name="st_add2" id="st_add2"><?= $data[st_add2] ?></textarea></td>
				</tr>
				<tr>
					<th>City</th>
					<td><select id="st_city" name="st_city">
					<?php echo get_option_list("city","city_id","city_name",$data[st_city]); ?>
					</select></td>
					<th>State</th>
					<td><select id="st_state" name="st_state">
					<?php echo get_option_list("state","state_id","state_name",$data[st_state]); ?>
					</select></td>
				</tr>
				<tr>
					<th>Country</th>
					<td>
					<select id="st_country" name="st_country">
					<?php echo get_option_list("country","country_id","country_name",$data[st_country]); ?>
					</select>
				</td>
				<th>Nationality</th>
				<td><input type="text" id="st_nat" name="st_nat" value="<?= $data[st_nat] ?>"></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td><input type="radio" name="st_gender" id="st_gender" value="Male" <?php if ($data[st_gender]== "male") { echo "checked";	}?> >Male
				<input type="radio"id="st_gender" name="st_gender" value="Female" <?php if ($data[st_gender]== "female") { echo "checked";	}?>>Female
			</td>
			<th>Qualification</th>
			<td> <div style="height:30; overflow:scroll;">
			<?php echo get_checkbox_list("qualification","qualification_id","qualification_name","st_qul[]",$data[$col_id]);?>
			</div></td>
		</tr>
		<tr>
			<th>Course</th>
			<td><select name="st_course" id="st_course" >
			<?php echo get_option_list("course","course_id","course_name",$data[st_course]); ?>
			</select></td>
			<th>Photo</th>
			<td><input name="st_photo" id="st_photo" type="file">
			<?php 
				if ($data[st_photo]) 
				{
					echo "<br><img src='$SERVER_PATH/uploads/$data[st_photo]' height=50>";
				}
			?>
		</td>
	</tr>
	<tr>
		<th>Hobbies</th>
		<td><textarea id="st_hobbies" name="st_hobbies"><?= $data[st_hobbies] ?></textarea></td>
		<th>Mobile</th>
		<td><input type="text" id="st_mobile" name="st_mobile" maxlength="10" minlength="10" value="<?= $data[st_mobile]?>"></td>
	</tr>
	<tr>
		<th>Date of birth</th>
		<td><input type="text" id="st_dob" class='datepicker' name="st_dob" value="<?= $data[st_dob] ?>"></td>
		<th>Date of Admission</th>
		<td><input type="text" id="st_doa" name="st_doa" class='datepicker' value="<?= $data[st_doa] ?>"></td>
	</tr>
	<tr>
		<th colspan="4" style="padding: 3px;height: 30px;"><input type="submit" value="Submit" id="submit" name="submit">
		<input type="reset" value="Reset" name="submit2" id="submit2"></th>
	</tr>
</table>
<input type="hidden" name="act" value="save_student">
<input type="hidden" name="st_id" value="<?=$data[st_id]?>">
<input type="hidden" name="st_photo" value="<?=$data[st_photo]?>">
</form>
</body>
</html>
<?php include_once("includes/footer.php") ?>

