<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="loginform.css" rel="stylesheet" type="text/css" />
</head>
<body>

   	

<div id="login" style="width: 400px;">
SCORING APP

<br/><br/>
<?=@$_GET["q"];?>
<form action="login-controller.php" method="post"></br>

<input type="text" name="username" placeholder="Username"/> </br></br>

<input type="password"  name="password" placeholder="Password"/></br></br>

<input type="submit" name="submit" value="Submit"/>



</form>

</div>

</body>
</html>
