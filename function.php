<?php

session_start();

$username = "";
$email = "";
$errors = array(); 

//connect to database
$db=mysqli_connect("localhost", "root", "", "authentication");

if(isset($_POST['register_btn'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	$username = mysqli_real_escape_string($db, $username);
	$email = mysqli_real_escape_string($db, $email);
	$password = mysqli_real_escape_string($db, $password1);

	if(empty($username)){
		array_push($errors, "username is required");
	}

	if(empty($email)){
		array_push($errors, "Email is required");
	}

	if(empty($password1)){
		array_push($errors, "Password is required");
	}

	if($password1 != $password2){
		array_push($errors, "Password and confirmed password are not same");
	}
		//create user
	if(count($errors) == 0){
		$password = md5($password1);

		$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password') ";
		mysqli_query($db, $sql);

		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: home.php');
	}
}



//code for login 

if(isset($_POST['login_btn'])){
	$username = $_POST['username'];
	$password1 = $_POST['password1'];

	$username = mysqli_real_escape_string($db, $username);
	$password = mysqli_real_escape_string($db, $password1);

	if(empty($username)){
		array_push($errors, "username is required");
	}

	if(empty($password1)){
		array_push($errors, "Password is required");
	}

	if(count($errors) == 0){
		$password = md5($password1);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
		$result = mysqli_query($db, $sql);

		if(mysqli_num_rows($result) == 1){
			$_SESSION['username'] =  $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: home1.php');
		} else {
			$_SESSION['message'] = "Username/Password do not match";
			header('location: login.php');
		}
	}
}

if(isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header('location: index.php');

}

?>
