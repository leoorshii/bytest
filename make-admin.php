<?php

include_once "config.php";

if(isset($_POST["submit"])){

	$user_id = (int)$_POST['user_id'];
	$result = mysql_query("update users set role_id = 2 where id = {$user_id}");
	
	if(!$result) {
      die('Could not update data: ' . mysql_error());
   }
   
   header("Location: students.php");
}
