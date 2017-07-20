<?php error_reporting('E_ALL ^ E_NOTICE');?>
<?php include_once("db_connect.php"); ?>
<?php include_once("functions.php"); ?>
<?php 
     $SERVER_PATH="http://localhost/RegistrationPHP"; 
?>
<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" type="text/css" href="css/student.css">
	<title>Registration Form</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script src="js/validation.js"></script>
</head>
<body>

      <p>Student Information System</p>
      <table width="90%" align="center" border="2">
      	<tr>
      		<th style="font-size: 20px; "><a href="student_view.php"> Student</a></th>
      		<th style="font-size: 20px;">Staff</th>
      		<th style="font-size: 20px;">Fee</th>
      		<th style="font-size: 20px;">Salary</th>
      		<th style="font-size: 20px;">logout</th>
      	</tr>
      </table>
      <br>
</body>
</html>
