<?php

session_start();

include_once('config.php');

if($_POST['submit']){

	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	
	$result = mysql_query("select * from users where username = '{$username}' and password = sha1('{$password}')");
	$exist = mysql_num_rows($result);
	
	//print("<pre>");
	//print_r(mysql_fetch_assoc($result));
	//print("</pre>");
	//exit();
	
	if($exist !== 0){
	
		$_SESSION["user"] = mysql_fetch_assoc($result);
		//mysql_fetch_row($result);
		header("Location: students.php");
		
	}else{
	
		header("Location: login.php?q=Unable to login");
	}
	
	echo $exist;
}