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

$result = mysql_query("SELECT u.fullname,s.subject,s.score FROM (users u join scores s on s.student_id) where s.student_id = u.id");

$arr = [];
while($row = mysql_fetch_array($result)){
	
	$arr[$row["subject"]][] = $row;
}

foreach($arr as $subject=>$scores){
?>
<caption><h3><?=$subject;?></h3></caption>
<table border="1">
<thead>
<tr><th>#</th><th>Student Name</th><th>Score</th></tr>
</thead>
<tbody>
<?php
$i = 1;
foreach($scores as $score){
?>
<tr><td><?=$i;?></td><td><?=$score['fullname'];?></td><td><?=$score['score'];?></td></tr>
<?php
$i++;
}
?>
</tbody>
</table>

<?php
}
?>
</body>
</html>
