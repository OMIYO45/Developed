<?php include_once("includes/header.php");
			$condition=1;
                 // $_REQUEST['st_qul']=explode(",",$_REQUEST['st_qul']);
			if ($_REQUEST['search_text'])
			 {
			 	$st=$_REQUEST['search_text'];
				$condition.=" AND st_name LIKE '%$st%'";
			 }
			 $query="SELECT * from student_add where $condition order by st_id"; 
             
      		$rs=mysqli_query($con,$query) or die(mysqli_error("Error"));
?>
<!DOCTYPE html>
<html>
<head>
	  <script src="plugins/facebox/src/jquery.js" type="text/javascript"></script>
        <link href="plugins/facebox/src/facebox.css" media="screen" rel="stylesheet" type="text/css"/>       
        <script src="plugins/facebox/src/facebox.js" type="text/javascript"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox()
})</script>
</head>
<body>
<div id="viewDiv" style="text-align: center;font-weight: bold;color: RED;"> <?= $_REQUEST['msg']; ?></div>

<form name="search_text"  action="#">
	<table border="0" align="center" style="background-color: #F65;">
	<tr><th align="right" style="background-color: #F65;">Search Text :
			<input type="text" name="search_text">
			<input type="submit" name="search" id="search" value="Search">
		</th>
	</tr>
	</table>
	
</form>

<form name="student_view" method="POST" action="lib/student.php">
      <table  border=2 align="center" width="90%">
      <tr><th colspan="6" align="right" style="padding: 5px;"> <a href="student_add.php">Student Add</a> | <a href="Javascript:delete_multiple()">Deletes</a> </th></tr>
      	<tr>
                  <th> <input type=checkbox name="c_all" id="c_all" onclick="check_all(this)"></th>
      		<th>Student ID</th>
      		<th>Name</th>
      		<th>Father's Name</th>
      		<th>Mobile No.</th>
      		<th>Action</th>
      	</tr>
      	<br>
      	<?php
      		while ($data=mysqli_fetch_assoc($rs)) {
      	?>
      	<tr align="center">
      	    <td ><?php echo "<input type=checkbox name=st_id_multiple[] value=$data[st_id]>"?></td>
      		<td > <?php echo $data[st_id]; ?></td>
      		<td ><a href="student_details.php?st_id=<?=$data[st_id]?>" rel="facebox"><?php echo $data['st_name']; ?></a></td>
      		<td ><?php echo $data['st_father']; ?></td>
      		<td ><?php echo $data['st_mobile']; ?></td>
      		<td ><a href="student_add.php?st_id=<?= $data[st_id] ?>">EDIT</a> | <a href="Javascript:delete_student(<?=$data[st_id]?>)">DELETE</a></td>
      	</tr>
      	<?php } ?>
      </table>
      <br>
      <input type="hidden" name="st_id">
      <input type="hidden" name="actdelete" value="delete_student">
      <input type="hidden" name="acts" value="delete_multiple">
  </form>
</body>
</html>
<?php include_once("includes/footer.php"); ?>
