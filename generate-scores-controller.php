<?php

include_once "config.php";

if(isset($_POST["generate"])){

	$result = mysql_query("SELECT u.id as user_id FROM (users u join roles r on r.id) where r.id = u.role_id");
	
	if(!$result) {
      die('Could not fetch data: ' . mysql_error());
   }
   
   $arr = [];
   
   while($row = mysql_fetch_array($result)){
   
    REGENERATE:
   	$score = rand(1,100);
	
	if(in_array($score,$arr)){
		
		goto REGENERATE;
	}
	
    $arr[] = $score;
	
	$subject = $_POST["subjectname"];
	$student_id = $row["user_id"];
	
	mysql_query("insert into scores set subject = '{$subject}', student_id = {$student_id}, score = {$score} on duplicate key update score = {$score}");
   
    print("<pre>");
   	print_r($row);
	print("</pre>");
	
   }
   exit;
   header("Location: students.php");
}
