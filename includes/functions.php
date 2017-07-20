<?php 

### Function  for generating dynamic option  list

function get_option_list($table,$col_id,$col_value,$sel=0)
{
    global $con;
	$query= "SELECT * from $table";
	$rs=mysqli_query($con,$query) or die(mysqli_error("Error"));
	$optionlist="<option value=0>Select</option>";
	while ($data=mysqli_fetch_assoc($rs))
	 {
        if ($data[$col_id]== $sel) {
                    $optionlist.= "<option value=".$data[$col_id]." selected>".$data[$col_value]."</option>";
        }
        else {
                    $optionlist.= "<option value=".$data[$col_id].">".$data[$col_value]."</option>";

        }
	}
	return $optionlist;
}

### Function  for generating dynamic checkbox  list

function get_checkbox_list($table,$col_id,$col_value,$name,$sel=0)
{
	global $con;
     $query= "SELECT * from $table";
     $rs=mysqli_query($con,$query) or die(mysqli_error("error"));
     $optionlist="";
     $sel=explode(",", $sel);

     while ($data=mysqli_fetch_assoc($rs))
      {


        if (in_array($data[$col_id], $sel)) {

            	$optionlist.="<input type=checkbox name=$name id=$data[$col_id] checked> $data[$col_value] <br>";
            }
            else{
                                $optionlist.="<input type=checkbox name=$name id=$data[$col_id]> $data[$col_value] <br>";  
            }
     }
     return $optionlist;
}




  ?>