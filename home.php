<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <div class="box">
          <h1>Hello, <?php echo $_SESSION['user_name']; ?></h1>
          
          <nav class="home-nav">
               <a href="change-password.php">Change Password</a>
               <a href="logout.php">Logout</a>
          </nav>
     </div>
          
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>