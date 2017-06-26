<?php

session_start();

if(isset($_SESSION["user"]) && $_SESSION["user"]["role_id"] != 2){
	
	header("Location: login.php");
	exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>


<?php

include_once('config.php');
include_once('adnav.php');

$result = mysql_query("SELECT u.id as user_id,u.fullname,u.username, r.name as role FROM (users u join roles r on r.id) where r.id = u.role_id");

//while($row = mysql_fetch_array($result)){

$num = mysql_num_rows($result);
mysql_close();?>

<br/>
<br/>

<table border="1" cellspacing="2" cellpadding="2">
<tr>
<td>
<font face="Arial, Helvetica, sans-serif">Fullname</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Username</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Role</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Action</font>
</td>

</tr>

<?php $i=0;
while ($i < $num) {

$f1=mysql_result($result,$i,"fullname");
$f2=mysql_result($result,$i,"username");
$f3=mysql_result($result,$i,"role");
$user_id = mysql_result($result,$i,"user_id");
?>

<tr>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font>
</td>
<td>
<?php
if($f3 != "admin"){
?>

<form action="make-admin.php" method="post">
<input type="hidden" name="user_id" value="<?=$user_id;?>" />
<button type="submit" name="submit" value="make_admin">Make Admin</button>
</form>
<?php
}
?>
</td>

</tr>
<?php
$i++;

}



/*
<table border="1" width="30%">
<tr>
<th>FULLNAME</th>
<th>USERNAME</th>
<th>ROLE</th>
<th>ACTION</th>
</tr>



<tr>
<td></td>
<td>Central Wisconsin Airport</td>
</tr>

<tr>
<td>ORD</td>
<td>Chicago O’Hare</td>
</tr>

<tr>
<td>LHR</td>
<td>London Heathrow</td>
</tr>
</table>
*/
?>
</body>
</html>
