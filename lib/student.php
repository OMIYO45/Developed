<?php error_reporting('E_ALL ^ E_NOTICE');
include_once("../includes/db_connect.php");

if (isset($_REQUEST['act']))
 {
	save_student();
}
if (isset($_REQUEST['actdelete']))
 {
		delete_student();
}
function save_student()
{
	global $con;
	$_REQUEST['st_qul']=implode(",",$_REQUEST['st_qul']);
	$img_name=$_FILES[st_photo][name];
	if ($img_name) 
	{
		$img_location=$_FILES[st_photo][tmp_name];
		$img_arr=explode(".",$img_name );
		$img_name=$img_arr[0]."_".time().".".$img_arr[1];
		move_uploaded_file($img_location, "../uploads/$img_name");
	}
	else
	{
	$img_name=$_REQUEST[st_photo];
	}
if ($_REQUEST['st_id'])
{
	$query="UPDATE `student_add` SET `st_name` = '".$_REQUEST['st_name']."',
	`st_father` = '".$_REQUEST['st_father']."', `st_add1` = '".$_REQUEST['st_add1']."',
	`st_add2` = '".$_REQUEST['st_add2']."', `st_city` = '".$_REQUEST['st_city']."',
	`st_state` = '".$_REQUEST['st_state']."',`st_country` = '".$_REQUEST['st_country']."',
				`st_nat` = '".$_REQUEST['st_nat']."', `st_gender` = '".$_REQUEST['st_gender']."',
				`st_qul` = '".$_REQUEST['st_qul']."', `st_course` = '".$_REQUEST['st_course']."',
				`st_photo` = '$img_name',`st_hobbies` = '".$_REQUEST['st_hobbies']."',
				`st_mobile` = '".$_REQUEST['st_mobile']."',
				`st_dob` = '".$_REQUEST['st_dob']."',
				`st_doa` = '".$_REQUEST['st_doa']."'
				WHERE `st_id` = $_REQUEST[st_id];";
				
				$msg="Data Updated Successfully..";
}
else{
		$query="INSERT INTO `student_add` (`st_name`, `st_father`, `st_add1`, `st_add2`, `st_city`, `st_state`, `st_country`, `st_nat`, `st_gender`, `st_qul`, `st_course`, `st_photo`, `st_hobbies`, `st_mobile`,`st_dob`,`st_doa`,) VALUES ('".$_REQUEST['st_name']."', '".$_REQUEST['st_father']."', '".$_REQUEST['st_add1']."', '".$_REQUEST['st_add2']."', '".$_REQUEST['st_city']."', '".$_REQUEST['st_state']."', '".$_REQUEST['st_country']."', '".$_REQUEST['st_nat']."', '".$_REQUEST['st_gender']."', '".$_REQUEST['st_qul']."', '".$_REQUEST['st_course']."', '$img_name', '".$_REQUEST['st_hobbies']."', '".$_REQUEST['st_mobile']."','".$_REQUEST['st_dob']."','".$_REQUEST['st_doa']."');";
		
		$msg="Data Saved Successfully..";
}
	$rs=mysqli_query($con,$query);
	if ($rs)
	 {
		header("Location:../student_view.php?msg=$msg");
	 }
}
#### Function for deleting student
function delete_student()
{
	global $con;
	##Delete photo from database
	$sql="SELECT * from student_add where st_id='".$_REQUEST['st_id']."'";
	$rs=mysqli_query($con,$sql);
	$data=mysqli_fetch_assoc($rs);
	if ($data['st_photo']) {
	 	unlink("../uploads/".$data['st_photo']);
	 } 
	
	
	## Delete data from database
	$sql="DELETE from student_add where st_id='".$_REQUEST['st_id']."'";
	$rs=mysqli_query($con,$sql);
	if ($rs) 
	{
	header("Location:../student_view.php?msg=Student Deleted Successfully..");
	}
}

#### Function for deleting multiple student
function delete_multiple()
{
	global $con;
    $st_id_array=$_REQUEST['st_id_multiple'];
    foreach ($st_id_array as $st_id) {
	##Delete photo from database
	$sql="SELECT * from student_add where st_id='$st_id'";
	$rs=mysqli_query($con,$sql);
	$data=mysqli_fetch_assoc($rs);
	if ($data['st_photo']) {
	 	unlink("../uploads/".$data['st_photo']);
	 } 
	
	## Delete data from database
	$sql="DELETE from student_add where st_id=$st_id";
	$rs=mysqli_query($con,$sql);
}
header("Location:../student_view.php?msg=Students are Deleted Successfully..");
}
?>