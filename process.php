<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php

$fullname= $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if(isset($_POST['submit'])){

	if(($_POST['fullname']) &&(($_POST['username'])) && ($_POST['email'])
	&& ($_POST['password'])){
	
	
	mysql_connect("localhost", "root", "")
	or die("We could connect");
	$db = mysql_select_db("yudimy");
	
	//check the no of rows where the typed user exist(s)
		$count = mysqli_fetch_array($db, MYSQLI_NUM);
		if($count !=0){     #if there are users with that name already
		die("Name already exists! Please type another name");
		}else{
					  
		mysql_query("INSERT INTO (fullname, username, username, password) VALUES ('$fullname', '$username', '$email', sha1('$password'))");

		echo 'You have successfully registered!';
			}
		 
		echo 'Type in your details';
	  }else{
		   }
}

?>
</body>
</html>
