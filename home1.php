<?php
include('function.php');
if(empty($_SESSION['username'])) {
	header('location: login.php');
}

?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<title>Email Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
<h1>Email Registration</h1>
</div>
<h1>HOME<h1>
<div>
	<h4>WELCOME  <?php echo $_SESSION['username'];?>!! You are successfully Logged In...</h4>

</div>

<a href=login.php>Logout</a>

</body>
</html>