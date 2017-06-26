<?php

include_once('config.php');

$fullname= $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


if($fullname && $username && $email && $password) {

/** #check the no of rows where the typed user exist(s)

    if($count !=0){     #if there are users with that name already
	include("links.php");
	die("Name already exists! Please type another name");
}
**/


$b = mysql_query("INSERT INTO users (fullname, username, email, password) VALUES ('$fullname', '$username', '$email', sha1('$password'))");

 //$reg = mysql_affected_rows($b);

echo 'You have successfully registered!';
}else{ 

echo "Fill in you details";

}

?>