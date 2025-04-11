<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    
</head>
<body>
     <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name"><br>

        <div class="main-input">
            <div class="password">
                <label for="password">Password</label>
                <label><input type="checkbox" onclick="toggleVisibility()" id="show-password"></label>
            </div>
            <input type="password" id="password" name="password" placeholder="Password"> 
        </div>
     
        <br>
        
       <center>
        <button class="btn btn-warning" name="login" <?php if(ISSET($_SESSION['msg'])){ echo $_SESSION['msg'];}?>>
				<span class="glyphicon glyphicon-log-in"></span> Login</button>
                
            <br>
           
        </center>
        <br>
        <p>Don't have an account?<a href="signup.php" class="ca">Sign up</a></p>

     </form>

     <script>
       function toggleVisibility() {  
        var getPassword = document.getElementById("password");  
        var checkbox = document.getElementById("show-password");
        getPassword.type = checkbox.checked ? "text" : "password";  
    } 
    </script>
</body>
</html>
