<?php 
session_start(); 
include "connect.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'uname='. $uname. '&name='. $name;

	if (empty($uname)) {
		header("Location: signup.php?error=User Name is required&$user_data");
	    exit();
	} elseif(empty($pass)) {
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	} elseif(empty($re_pass)) {
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	} elseif(empty($name)) {
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	} elseif($pass !== $re_pass) {
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
	    exit();
	} else {
		// Hash the password using password_hash()
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

	    $sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken, try another&$user_data");
	        exit();
		} else {
           $sql2 = "INSERT INTO users(user_name, password, name) VALUES('$uname', '$hashed_password', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           } else {
	           	header("Location: signup.php?error=Unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
} else {
	header("Location: signup.php");
	exit();
}
?>
