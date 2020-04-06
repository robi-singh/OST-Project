<?php include('function.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Email Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
<h1>Login Here</h1>
</div>
<form method="post" action="login.php">
	<?php include('bugs.php'); ?>
<table>
<tr>
<td>username:</td>
<td><input type="text" name="username" class="textInput"></td>
<tr>
<td>Password:</td>
<td><input type="password" name="password1" class="textInput"></td>
<tr>
<tr>
<td></td>
<td><input type="Submit" name="login_btn" value="Login"></td>
</tr>
</table>
</form>
</body>
</html>